<?php

namespace App\Http\Controllers;
use Validator;
use Illuminate\Http\Request;
use App\Department;
use App\Role;
use App\Users;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = Users::all();
        return view('allTable.user.viewUser', compact('users',$users));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($department_id = null,$role_id = null)
    {
        $departments=null;
        $roles=null;
        if(!$department_id)
        {
            $departments = Department::all();
        }
        if(!$role_id)
        {
            $roles = Users::all();
        }
        return view('allTable.user.createUser',
        array('department_id'=>$department_id,'departments'=>$departments,
        'role_id'=>$role_id,'roles'=>$roles));
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
            'employee_id' => 'required',
            'role_id' => 'required'
        ]);
       
        if($validator->fails()){
            $status_code='400';
            $users = null;
        }
        else{
            $status_code='201';
            $users = new Users(); 
            $users->department_id = request('department_id');
            $users->employee_id = request('employee_id');
            $users->role_id = request('role_id');
            $users->created_by = request('created_by');
            $users->updated_by = request('updated_by');
            $users->save();
        }
        return response()->json(array($users),$status_code);
        //return redirect('/users/create');
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
        $roles = Users::all();

        $users = Users::find($id);
        return view('allTable.user.editUser',
        array('users' => $users,'id'=> $id,
        'departments'=>$departments,'roles'=>$roles));
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
            'employee_id' => 'required',
            'role_id' => 'required'
        ]);
       
        if($validator->fails()){
            $status_code='400';
            $users = null;
        }
        else{
            $status_code='200';
            $users = Users::find($id);
            $users ->update($request->all());
        }
        return response()->json(array($users),$status_code);
        //return redirect('users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user_response = [];
        $errormsg = "";
        try{
            $users= Users::findOrFail($id);
        } catch(Exception $exception){
            dd($exception);
            $errormsg = 'No User to de!' . $exception->getCode();
            return Response::json(['errormsg'=>$errormsg]);
        }
        
        $result = $users->delete();
        if ($result) {
            $user_response['result'] = true;
            $user_response['message'] = "User Successfully Deleted!";
        } else {
            $user_response['result'] = false;
            $user_response['message'] = "User was not Deleted, Try Again!";
        }
        return json_encode($user_response);
        // $users= Users::find($id);
        // $users->delete();
        // return response()->json(array($users),200);
        //return redirect('users');
    }
}
