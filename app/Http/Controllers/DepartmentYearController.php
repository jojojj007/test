<?php

namespace App\Http\Controllers;
use Validator;
use App\DepartmentYear;
use App\Department;
use App\Year;
use DateTime;
use Illuminate\Http\Request;

class DepartmentYearController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departmentYears = DepartmentYear::all();
        return view('allTable.departmentYear.viewDepartmentYear',
        compact('departmentYears',$departmentYears));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($department_id = null,$year_id = null) 
    {
        $departments=null;
        $years=null;
        if(!$department_id)
        {
            $departments = Department::all();
        }
        if(!$year_id)
        {
            $years = Year::all();
        }
        return view('allTable.departmentYear.createDepartmentYear',
        array('department_id'=>$department_id,'departments'=>$departments,
        'year_id'=>$year_id,'years'=>$years));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$department_id = null,$year_id = null)
    {
        $validator = Validator::make($request ->all(), [
            'department_id' => 'required',
            'year_id' => 'required'
        ]);
       
        if($validator->fails()){
            $status_code='400';
            $departmentYears = null;
        }
        else{
            $status_code='201';
            $departmentYears = new DepartmentYear(); 
            $departmentYears->department_id = request('department_id');
            $departmentYears->year_id = request('year_id');
            $departmentYears->confirmed_by = request('confirmed_by');
            $departmentYears->approved_by = request('approved_by');

            $departmentYears->confirmed_at = new DateTime();
            $departmentYears->approved_at =new DateTime();

            $departmentYears->created_by = request('created_by');
            $departmentYears->updated_by = request('updated_by');
            $departmentYears->save();
        }
        return response()->json(array($departmentYears),$status_code);
        //return redirect('/departmentYears/create');
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
        $departments = Department::all();
        $years = Year::all();
        $departmentYears = DepartmentYear::find($id);
        return view('allTable.departmentYear.editDepartmentYear',
        array('departmentYears' => $departmentYears,'id'=> $id,
        'departments'=>$departments,'years'=>$years));
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
        $validator = Validator::make($request ->all(), [
            'department_id' => 'required',
            'year_id' => 'required'
        ]);
       
        if($validator->fails()){
            $status_code='400';
            $departmentYears = null;
        }
        else{
            $status_code='200';
            $departmentYears = DepartmentYear::find($id);
            $departmentYears ->update($request->all());
        }
        return response()->json(array($departmentYears),$status_code);
        //return redirect('departmentYears');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $departmentYear_response = [];
        $errormsg = "";
        try{
            $departmentYears= DepartmentYear::findOrFail($id);
        } catch(Exception $exception){
            dd($exception);
            $errormsg = 'No DepartmentYear to de!' . $exception->getCode();
            return Response::json(['errormsg'=>$errormsg]);
        }
        
        $result = $departmentYears->delete();
        if ($result) {
            $departmentYear_response['result'] = true;
            $departmentYear_response['message'] = "DepartmentYear Successfully Deleted!";
        } else {
            $departmentYear_response['result'] = false;
            $departmentYear_response['message'] = "DepartmentYear was not Deleted, Try Again!";
        }
        return json_encode($departmentYear_response);
        // $departmentYears= DepartmentYear::find($id);
        // $departmentYears->delete();
        // return response()->json(array($departmentYears),200);
        //return redirect('departmentYears');
    }
}
