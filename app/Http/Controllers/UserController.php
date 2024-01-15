<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display login page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.register');
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
            'name'           => 'required',
            'email'          => 'required|email',
            'password'       => 'required'
        ]);

        foreach($users as $user){
            if($user['email'] === $request->input('email')){
                return redirect()->route('register')->with(["invalid" => "Email đã tồn tại"]);
            }
        }
        //  Store data in database
        $user = new User([
            'name'     => $validated['name'],
            'email'    => $validated['email'],
            'password' => bcrypt($validated['password'])
        ]);
        $user->save();
        return redirect()->route('index')->with("success", "Tạo tài khoản thành công.");
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
        //
    }

    /**
     * Login account
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
         // Form validation
         $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])){
           $user = User::where([['email','=',$request->input('email')]])->first();
           Auth::login($user);
           if($user['role'] != 2){
               return redirect()->route('dashboard')->with("success","Đăng nhập thành công.");
           }else{
               return redirect()->route('form.list')->with("success","Đăng nhập thành công.");
           }
        }
        else{
            return redirect()->route('index')->with("invalid","Email hoặc mật khẩu không đúng.");
        }
    }

    /**
     * Logout account
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        if(Auth::check()){
            Auth::logout();
            return redirect()->route('index')->with("success","Đăng xuất thành công.");
        }
    }
}
