<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = DB::table('list')->get();
        return view('income.index',['data'=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate(
            [
                'list_date' => 'required',
                'list_no' => 'required',
                'list_name' => 'required',
                'list_amount' => 'required',
            ],
            [
                'list_date.required' => 'กรุณาระบุ วันที่',
                'list_no.required' => 'กรุณาระบุ ฏีกา / หมายเลขเอกสารอ้างอิง',
                'list_name.required' => 'กรุณาระบุ ชื่อรายการ',
                'list_amount.required' => 'กรุณาระบุ ยอดเงิน',
            ],
        );
        $date = date("Y-m-d", strtotime($request->list_date));

        DB::table('list')->insert(
            [
                "list_date" => $date,
                "list_no" => $request->list_no,
                "list_name" => $request->list_name,
                "list_amount" => $request->list_amount,
            ]
        );
        return back()->with('success','เพิ่มรายการ : '.$request->list_name);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('income.show');
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

    public function report()
    {
        return view('income.report');
    }
}
