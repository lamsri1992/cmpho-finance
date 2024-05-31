<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = DB::table('users')
                ->join('roles','role_id','role')
                ->get();
        $role = DB::table('roles')->get();
        return view('users.index',['data'=>$data,'role'=>$role]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate(
            [
                'name' => 'required',
                'email' => 'required',
                'role' => 'required',
            ],
            [
                'name.required' => 'กรุณาระบุชื่อผู้ใช้งาน',
                'email.required' => 'กรุณาระบุ Email',
                'role.required' => 'กรุณาระบุสิทธิ์การใช้งาน',
            ],
        );

        DB::table('users')->insert(
            [
                "name" => $request->name,
                "email" => $request->email,
                "password" => Hash::make(00037),
                "role" => $request->role
            ]
        );
        return back()->with('success','เพิ่มข้อมูลผู้ใช้งานสำเร็จ');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = DB::table('users')
                ->join('roles','role_id','role')
                ->where('id',$id)
                ->first();
        $role = DB::table('roles')->get();
        return view('users.show',['data'=>$data,'role'=>$role]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate(
            [
                'name' => 'required',
                'email' => 'required',
                'role' => 'required',
            ],
            [
                'name.required' => 'กรุณาระบุชื่อผู้ใช้งาน',
                'email.required' => 'กรุณาระบุ Email',
                'role.required' => 'กรุณาระบุสิทธิ์การใช้งาน',
            ],
        );

        DB::table('users')->where('id',$id)->update(
            [
                "name" => $request->name,
                "email" => $request->email,
                "role" => $request->role
            ]
        );
        return back()->with('success','แก้ไขข้อมูลผู้ใช้งานสำเร็จ');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
