<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class employeeList extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = DB::table('employee')
                ->select('emp_id','pre_name','emp_name','emp_lname','emp_type_name','emp_cid','stat_name','stat_id')
                ->join('prefix','pre_id','emp_prefix_id')
                ->join('employee_type','employee_type.emp_type_id','employee.emp_type_id')
                ->join('employee_status','employee_status.stat_id','employee.emp_status')
                ->get();
        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = DB::table('employee')->where('emp_id',$id)->first();
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
