<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class MenistryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menistries = User::where('role','=',1)->get();
        return view('admin.menistry.list',['menistries' => $menistries]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.menistry.create');
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
            'menistry-name'           => 'required',
            'email'          => 'required|email',
            'password'       => 'required'
        ]);

        foreach($users as $user){
            if($user['email'] === $request->input('email')){
                return redirect()->route('menistry.create.form')->with(["invalid" => "Email đã tồn tại"]);
            }
        }
        //  Store data in database
        $user = new User([
            'name'     => $validated['menistry-name'],
            'email'    => $validated['email'],
            'password' => bcrypt($validated['password']),
            'role'     => 1
        ]);
        $user->save();
        return redirect()->route('menistry.list')->with("success", "Tạo tài khoản thành công.");
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
        $user = User::find($id);
        return view('admin.menistry.edit',['user' => $user]);
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
            'menistry-name'           => 'required',
            'email'          => 'required|email',
            'password'       => 'required'
        ]);

        $user = User::find($id);
        $user->name = $validated['menistry-name'];
        $user->email = $validated['email'];
        if($user['password'] == $validated['password']){
            $user->password = $validated['password'];
        }else{
            $user->password = bcrypt($validated['password']);
        }
        $user->save();
        return redirect()->route('menistry.list')->with("success", "Cập nhật tài khoản thành công.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('menistry.list')->with("success", "Xóa tài khoản thành công.");
    }
}
