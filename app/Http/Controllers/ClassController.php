<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cls;
use App\Models\Course;
use App\Models\User;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cls = Cls::join('course','course.course_id','=','class.course_id')->get(['class.*','course.name AS course_name']);
        return view('admin.class.list',['classes' => $cls]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::all();
        return view('admin.class.create',['courses' => $courses]);
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
            'code'        => 'required',
            'course_id'      => 'required'
        ]);
        $classes = Cls::all();
        foreach($classes as $item){
            if($item['code'] == $request->input('code')){
                return redirect()->route('class.create')->with("invalid","Mã lớp học này đã tồn tại.");
            }
        }
        //  Store data in database
        $class = new Cls([
            'code' => $request->input('code'),
            'course_id' => $request->input('course_id')
        ]);
        $class->save();
        return redirect()->route('class.list')->with("success","Tạo mới thành công.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $class = Cls::find($id);
        $courses = Course::all();
        return view('admin.class.edit',['class' => $class,'courses' => $courses]);
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
        // Form validation
        $this->validate($request, [
            'code'        => 'required',
            'course_id'      => 'required'
        ]);
        $classes = Cls::all();
        foreach($classes as $item){
            if($item['code'] == $request->input('code')){
                return redirect()->route('class.edit.form',['id' => $id])->with("invalid","Mã lớp học này đã tồn tại.");
            }
        }
        $class = Cls::find($id);
        $class->code = $request->input('code');
        $class->course_id = $request->input('course_id');
        $class->save();
        return redirect()->route('class.list')->with("success","Cập nhật thành công.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = User::all();
        foreach($users as $user){
            if($user['class_id'] == $id){
                return redirect()->route('class.list')->with("invalid","Hiện đang có một số sinh viên đang theo học lớp này, bạn không thể xóa.");
            }
        }
        $class = Cls::find($id);
        $class->delete();
        return redirect()->route('class.list')->with("success","Xóa thành công.");
    }
}
