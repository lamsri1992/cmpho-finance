<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bank = DB::table('banks')->get();
        $prefix = DB::table('prefix')->get();
        $type = DB::table('account_type')->get();
        $emp_type = DB::table('employee_type')->get();
        return view('employee.index',['bank'=>$bank,'prefix'=>$prefix,'type'=>$type,'emp_type'=>$emp_type]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate(
            [
                'prefix' => 'required',
                'emp_name' => 'required',
                'emp_lname' => 'required',
                'emp_cid' => 'required',
                'emp_type_id' => 'required',
                'acc_bank_id' => 'required',
                'acc_code' => 'required',
                'acc_name' => 'required',
                'acc_branch' => 'required',
                'acc_type_id' => 'required',
            ],
            [
                'prefix.required' => 'กรุณาระบุ คำนำหน้า',
                'emp_name.required' => 'กรุณาระบุ ชื่อ',
                'emp_lname.required' => 'กรุณาระบุ นามสกุล',
                'emp_cid.required' => 'กรุณาระบุ หมายเลขบัตรประชาชน',
                'emp_type_id.required' => 'กรุณาระบุ ประเภทบุคลากร',
                'acc_bank_id.required' => 'กรุณาระบุ บัญชีธนาคาร',
                'acc_code.required' => 'กรุณาระบุ เลขบัญชีธนาคาร',
                'acc_name.required' => 'กรุณาระบุ ชื่อบัญขีธนาคาร',
                'acc_branch.required' => 'กรุณาระบุ สาขา',
                'acc_type_id.required' => 'กรุณาระบุ ประเภทบัญชี',
            ],
        );

        // Insert Employee
        $lastInsertedId = DB::table('employee')->insertGetId(
            [
                'emp_prefix_id' => $request->prefix,
                'emp_name' => $request->emp_name,
                'emp_lname' => $request->emp_lname,
                'emp_cid' => $request->emp_cid,
                'emp_type_id' => $request->emp_type_id,
            ]
        );

        // Insert Account
        DB::table('account')->insert(
            [
                'acc_bank_id' => $request->acc_bank_id,
                'acc_code' => $request->acc_code,
                'acc_name' => $request->acc_name,
                'acc_branch' => $request->acc_branch,
                'acc_type_id' => $request->acc_type_id,
                'emp_id' => $lastInsertedId,
                'employee_emp_cid' => $request->emp_cid,
            ]
        );

        return back()->with('success','เพิ่มข้อมูลบุคลากรสำเร็จ');
    }

    public function store_account(Request $request)
    {
        $validatedData = $request->validate(
            [
                'emp_id' => 'required',
                'emp_cid' => 'required',
                'acc_bank_id' => 'required',
                'acc_code' => 'required',
                'acc_name' => 'required',
                'acc_branch' => 'required',
                'acc_type_id' => 'required',
            ],
            [
                'emp_id.required' => 'กรุณาระบุ Employee ID',
                'emp_cid.required' => 'กรุณาระบุ Employee CID',
                'acc_bank_id.required' => 'กรุณาระบุ บัญชีธนาคาร',
                'acc_code.required' => 'กรุณาระบุ เลขบัญชีธนาคาร',
                'acc_name.required' => 'กรุณาระบุ ชื่อบัญขีธนาคาร',
                'acc_branch.required' => 'กรุณาระบุ สาขา',
                'acc_type_id.required' => 'กรุณาระบุ ประเภทบัญชี',
            ],
        );


        // Insert Account
        DB::table('account')->insert(
            [
                'acc_bank_id' => $request->acc_bank_id,
                'acc_code' => $request->acc_code,
                'acc_name' => $request->acc_name,
                'acc_branch' => $request->acc_branch,
                'acc_type_id' => $request->acc_type_id,
                'emp_id' => $request->emp_id,
                'employee_emp_cid' => $request->emp_cid,
            ]
        );
        return back()->with('success','เพิ่มข้อมูลบัญชีธนาคารสำเร็จ');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $emp_id = base64_decode($id);
        $emp = DB::table('employee')
                ->select('emp_id','pre_id','pre_name','emp_name','emp_lname','employee.emp_type_id','emp_type_name','emp_cid'
                ,'emp_prefix_id')
                ->join('prefix','pre_id','emp_prefix_id')
                ->join('employee_type','employee_type.emp_type_id','employee.emp_type_id')
                ->where('emp_id',$emp_id)
                ->first();
        $data = DB::table('account')
                ->leftjoin('account_type','type_id','acc_type_id')
                ->leftjoin('banks','bank_id','acc_bank_id')
                ->where('emp_id',$emp_id)
                ->get();
        $prefix = DB::table('prefix')->get();
        $type = DB::table('account_type')->get();
        $emp_type = DB::table('employee_type')->get();
        $bank = DB::table('banks')->get();
        return view('employee.account',['emp'=>$emp,'data'=>$data,'prefix'=>$prefix,'type'=>$type,'emp_type'=>$emp_type,'bank'=>$bank]);
    }

    public function account_show(string $id)
    {
        $acc_id = base64_decode($id);
        $data = DB::table('account')
                ->leftjoin('account_type','type_id','acc_type_id')
                ->leftjoin('banks','bank_id','acc_bank_id')
                ->leftjoin('employee','employee.emp_id','account.emp_id')
                ->leftjoin('prefix','pre_id','employee.emp_prefix_id')
                ->where('acc_id',$acc_id)
                ->first();
        $type = DB::table('account_type')->get();
        $bank = DB::table('banks')->get();

        return view('employee.account_show',['data'=>$data,'type'=>$type,'bank'=>$bank]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate(
            [
                'prefix' => 'required',
                'emp_name' => 'required',
                'emp_lname' => 'required',
                'emp_cid' => 'required',
                'emp_type_id' => 'required',
            ],
            [
                'prefix.required' => 'กรุณาระบุ คำนำหน้า',
                'emp_name.required' => 'กรุณาระบุ ชื่อ',
                'emp_lname.required' => 'กรุณาระบุ นามสกุล',
                'emp_cid.required' => 'กรุณาระบุ หมายเลขบัตรประชาชน',
                'emp_type_id.required' => 'กรุณาระบุ ประเภทบุคลากร',
            ],
        );

        // Update Employee
        DB::table('employee')->where('emp_id',$id)->update(
            [
                'emp_prefix_id' => $request->prefix,
                'emp_name' => $request->emp_name,
                'emp_lname' => $request->emp_lname,
                'emp_cid' => $request->emp_cid,
                'emp_type_id' => $request->emp_type_id,
            ]
        );

        return back()->with('success','แก้ไขข้อมูล\n'.$request->emp_name.' '.$request->emp_lname);
    }

    public function account_update(Request $request, string $id)
    {
        $validatedData = $request->validate(
            [
                'acc_bank_id' => 'required',
                'acc_code' => 'required',
                'acc_name' => 'required',
                'acc_branch' => 'required',
                'acc_type_id' => 'required',
            ],
            [
                'acc_bank_id.required' => 'กรุณาระบุ บัญชีธนาคาร',
                'acc_code.required' => 'กรุณาระบุ เลขบัญชีธนาคาร',
                'acc_name.required' => 'กรุณาระบุ ชื่อบัญขีธนาคาร',
                'acc_branch.required' => 'กรุณาระบุ สาขา',
                'acc_type_id.required' => 'กรุณาระบุ ประเภทบัญชี',
            ],
        );

        // Update Account
        DB::table('account')->where('acc_id',$id)->update(
            [
                'acc_bank_id' => $request->acc_bank_id,
                'acc_code' => $request->acc_code,
                'acc_name' => $request->acc_name,
                'acc_branch' => $request->acc_branch,
                'acc_type_id' => $request->acc_type_id,
            ]
        );
        return back()->with('success','แก้ไขข้อมูลบัญชีธนาคาร\n'.$request->acc_name);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function account(string $id)
    {
        $data = DB::table('employee')
            ->join('prefix','pre_id','emp_prefix_id')
            ->join('employee_type','employee_type.emp_type_id','employee.emp_type_id')
            ->where('emp_id',$id)
            ->first();
        
        $accn = DB::table('account')
            ->join('account_type','type_id','account.acc_type_id')
            ->where('emp_id',$id)
            ->get();

        dd($data,$accn);
        return view('employee.account',['data'=>$data,'accn'=>$accn]);
    }

    public function changed(Request $request)
    {
       $check = DB::table('employee')->where('emp_id',$request->id)->first();
       if($check->emp_status == 1){
           DB::table('employee')->where('emp_id',$request->id)->update(
               [
                   'emp_status' => 2
               ]
           );
        }else if($check->emp_status == 2){
            DB::table('employee')->where('emp_id',$request->id)->update(
                [
                    'emp_status' => 1
                ]
            );
         }
    }

    public function acc_changed(Request $request)
    {
       $check = DB::table('account')->where('acc_id',$request->id)->first();
       if($check->acc_status == 1){
           DB::table('account')->where('acc_id',$request->id)->update(
               [
                   'acc_status' => 2
               ]
           );
        }else if($check->acc_status == 2){
            DB::table('account')->where('acc_id',$request->id)->update(
                [
                    'acc_status' => 1
                ]
            );
         }
    }
}
