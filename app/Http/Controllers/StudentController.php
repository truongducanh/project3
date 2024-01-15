<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Cls;
use App\Models\Major;
use App\Models\Form;
use App\Models\FormDetail;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = User::join('class','users.class_id','=','class.class_id')
        ->join('major','major.major_id','=','users.major_id')->where('users.role','=',2)
        ->get(['users.*','major.name AS major_name','class.code']);
        return view('admin.student.list',['students' => $students]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classes = Cls::all();
        $majors  = Major::all();
        return view('admin.student.create',['majors' => $majors, 'classes' => $classes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $users = User::all();
        // Form validation
        $validated = $request->validate([
            'student-name'   => 'required',
            'email'          => 'required|email',
            'password'       => 'required',
            'major_id'       => 'required',
            'class_id'       => 'required'
        ]);

        foreach($users as $user){
            if($user['email'] === $request->input('email')){
                return redirect()->route('student.create.form')->with(["invalid" => "Email đã tồn tại"]);
            }
        }
        //  Store data in database
        $user = new User([
            'name'     => $validated['student-name'],
            'class_id' => $validated['class_id'],
            'major_id' => $validated['major_id'],
            'email'    => $validated['email'],
            'password' => bcrypt($validated['password']),
            'role'     => 2
        ]);
        $user->save();
        return redirect()->route('student.list')->with("success", "Tạo tài khoản thành công.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Book already receive
        $bookRec = Form::where([['user_id','=',$id],['status','=',1]])
        ->join('form_detail','form_detail.form_id','=','form.id')
        ->join('book','book.book_id','=','form_detail.book_id')
        ->get('book.name');
        // Book not receive
        $bookNotRec = Form::where([['user_id','=',$id],['status','=',0]])
        ->join('form_detail','form_detail.form_id','=','form.id')
        ->join('book','book.book_id','=','form_detail.book_id')
        ->get('book.name');
        // Book register
        $bookReg = Form::where('user_id','=',$id)
        ->join('form_detail','form_detail.form_id','=','form.id')
        ->join('book','book.book_id','=','form_detail.book_id')
        ->get('book.name');
        return view('admin.student.show',['bookRec' => $bookRec,'bookNotRec' => $bookNotRec,'bookReg' => $bookReg]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $majors = Major::all();
        $classes = Cls::all();
        $student  = User::find($id);
        return view('admin.student.edit',['student' => $student,'majors' => $majors,'classes' => $classes]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $users = User::all();
        // Form validation
        $validated = $request->validate([
            'student-name'   => 'required',
            'email'          => 'required|email',
            'password'       => 'required',
            'major_id'       => 'required',
            'class_id'       => 'required'
        ]);

        $student = User::find($id);
        $student->name =  $validated['student-name'];
        $student->class_id = $validated['class_id'];
        $student->major_id = $validated['major_id'];
        $student->email = $validated['email'];
        if($validated['password'] == $student['password']){
            $student->password = $student['password'];
        }else{
            $student->password = bcrypt($validated['password']);
        }
        $student->save();

        return redirect()->route('student.list')->with("success", "Cập nhật tài khoản thành công.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = User::find($id);
        $student->delete();
        return redirect()->route('student.list')->with("success", "Xóa tài khoản thành công.");
    }
}
