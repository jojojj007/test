<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Department;
class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::all();
        return view('allTable.department.viewDepartment', compact('departments',$departments));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('allTable.department.createDepartment');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request ->all(), [
            'department_code' => 'required',
            'name' => 'required'
        ]);
       
        if($validator->fails()){
            $status_code='400';
            $departments = null;
        }
        else{
            $status_code='201';
            $departments = new Department(); 
            $departments->department_code = request('department_code');
            $departments->name = request('name');
            $departments->created_by = request('created_by');
            $departments->updated_by = request('updated_by');
            $departments->save();
        }
        //Department::create($request->all());
        
        return response()->json(array($departments),$status_code);
        //return redirect('/departments/create');
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
        $departments = Department::find($id);
        return view('allTable.department.editDepartment',array('departments' => $departments,'id'=> $id));
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
            'department_code' => 'required',
            'name' => 'required'
        ]);
       
        if($validator->fails()){
            $status_code='400';
            $departments = null;
        }
        else{
            $status_code='200';
            $departments = Department::find($id);
            $departments ->update($request->all());
        }
        
        return response()->json(array($departments),$status_code);
        //return redirect('departments');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $department_response = [];
        $errormsg = "";
        try{
            $departments= Department::findOrFail($id);
        } catch(Exception $exception){
            dd($exception);
            $errormsg = 'No Department to de!' . $exception->getCode();
            return Response::json(['errormsg'=>$errormsg]);
        }
        
        $result = $departments->delete();
        if ($result) {
            $department_response['result'] = true;
            $department_response['message'] = "Department Successfully Deleted!";
        } else {
            $department_response['result'] = false;
            $department_response['message'] = "Department was not Deleted, Try Again!";
        }
        return json_encode($department_response);
        // $departments= Department::find($id);
        // $departments->delete();
        // return response()->json(array($departments),200);
        //return redirect('departments');
    }
}
