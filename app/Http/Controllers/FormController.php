<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form;
use App\Models\User;
use App\Models\FormDetail;
use Illuminate\Support\Facades\Auth;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $forms = Form::where('user_id','=',Auth::user()->id)->get();
        return view('admin.form.list',['forms' => $forms]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::join('major','major.major_id','=','users.major_id')
        ->join('class','class.class_id','=','users.class_id')
        ->join('course_subject','class.course_id','=','course_subject.course_id')
        ->join('course','course.course_id','=','class.course_id')
        ->join('subject_book','course_subject.subject_id','=','subject_book.subject_id')
        ->join('book','subject_book.book_id','=','book.book_id')
        ->where('users.id','=',Auth::user()->id)
        ->get(['users.name AS username','course.name AS course_name','major.name AS major_name','book.*']);
        $books = FormDetail::join('form','form.id','=','form_detail.form_id')->get('form_detail.book_id');
        $bookIds = [];
        if (!is_null($books)) {
            foreach ($books as $item) {
                $bookIds[] = $item['book_id'];
            }
        }

        return view('admin.form.create',['user' => $user, 'bookIds' => $bookIds]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Form validation
        $this->validate($request, [
            'book' => 'required'
        ]);
        $form = new Form([
            'user_id' => Auth::user()->id
        ]);
        $form->save();
        foreach($request->input('book') as $item){
            $formDetail = new FormDetail([
                'form_id' => $form['id'],
                'book_id' => $item
            ]);
            $formDetail->save();
        }
        return redirect()->route('form.list')->with("success","Đăng ký thành công.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $books = FormDetail::where('form_id','=',$id)->join('book','book.book_id','=','form_detail.book_id')->get('book.name');
        return view('admin.dashboard.show',['books'=>$books]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        FormDetail::where('form_id','=',$id)->delete();
        $form = Form::find($id);
        $form->delete();
        return redirect()->route('form.list')->with("success","Xóa thành công.");
    }
}
