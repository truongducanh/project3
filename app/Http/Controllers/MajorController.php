<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Major;
use App\Models\User;

class MajorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $majors = Major::all();
        return view('admin.major.list',['majors' => $majors]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.major.create');
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
            'major-name' => 'required'
        ]);
        //  Store data in database
        $major = new Major([
            'name' => $request->input('major-name')
        ]);
        $major->save();
        return redirect()->route('major.list')->with("success","Tạo mới thành công.");
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
        $major = Major::find($id);
        return view('admin.major.edit',['major' => $major]);
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
            'major-name' => 'required'
        ]);
        $major = Major::find($id);
        $major->name = $request->input('major-name');
        $major->save();
        return redirect()->route('major.list')->with("success","Cập nhật thành công.");
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
            if($user['major_id'] == $id){
                return redirect()->route('major.list')->with("invalid","Hiện đang có một số sinh viên đang theo học chuyên ngành này, bạn không thể xóa.");
            }
        }
        $major = Major::find($id);
        $major->delete();
        return redirect()->route('major.list')->with("success","Xóa thành công.");
    }
}
