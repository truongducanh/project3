<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\Cls;
use App\Models\CourseSubject;
use App\Models\Subject;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::all();
        return view('admin.course.list',['courses' => $courses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subjects = Subject::all();
        return view('admin.course.create',['subjects' => $subjects]);
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
            'course-name' => 'required',
            'content'     => 'required'
        ]);
        //  Store data in database
        $course = new Course([
            'name' => $request->input('course-name'),
            'content' => $request->input('content')
        ]);
        $course->save();
        $subjectIds = $request->input('subject_ids');
        if(!is_null($subjectIds)){
            $subjectArr = explode(',', rtrim($subjectIds, ','));
        }
        if(isset($subjectArr)){
            foreach($subjectArr as $item){
                $courseSubject = CourseSubject::create([
                    'subject_id' => $item,
                    'course_id'  => $course['course_id']
                ]);
                $courseSubject->save();
            }
        }
        return redirect()->route('course.list')->with("success","Tạo mới thành công.");
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
        $data = [];
        $course = Course::find($id);
        $subject = CourseSubject::where('course_id',$id)->get();
        foreach($subject as $item){
            $data[] = $item['subject_id'];
        }
        $subjects = Subject::all();
        return view('admin.course.edit',['course' => $course,'subject' => $data,'subjects' => $subjects]);
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
            'course-name' => 'required',
            'content'     => 'required'
        ]);
        $course = Course::find($id);
        $course->name = $request->input('course-name');
        $course->content = $request->input('content');
        $course->save();
        $subjectIds = $request->input('subject_ids');
        if(!is_null($subjectIds)){
            $subjectArr = explode(',', rtrim($subjectIds, ','));
        }
        CourseSubject::where('course_id','=',$id)->delete();
        if(isset($subjectArr)){
            foreach($subjectArr as $item){
                if(!empty($item)){
                    $courseSubject = CourseSubject::create([
                        'subject_id' => $item,
                        'course_id'  => $course['course_id']
                    ]);
                    $courseSubject->save();
                }
            }
        }
        return redirect()->route('course.list')->with("success","Cập nhật thành công.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $classes = Cls::all();
        foreach($classes as $class){
            if($class['course_id'] == $id){
                return redirect()->route('course.list')->with("invalid","Hiện khóa học này đang có một số lớp học, bạn không thể xóa.");
            }
        }
        $course = Course::find($id);
        $course->delete();
        return redirect()->route('course.list')->with("success","Xóa thành công.");
    }
}
