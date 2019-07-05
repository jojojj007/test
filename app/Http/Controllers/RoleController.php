<?php

namespace App\Http\Controllers;
use Validator;
use Illuminate\Http\Request;
use App\Role;
class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        return view('allTable.role.viewRole', compact('roles',$roles));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('allTable.role.createRole');
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
            'symbol' => 'required',
            'name' => 'required',
            'detail' => 'required'
        ]);
       
        if($validator->fails()){
            $status_code='400';
            $roles = null;
        }
        else{
            $status_code='201';
            $roles = new Role(); 
            $roles->symbol = request('symbol');
            $roles->name = request('name');
            $roles->detail = request('detail');
            $roles->created_by = request('created_by');
            $roles->updated_by = request('updated_by');
            $roles->save();
        }
        return response()->json(array($roles),$status_code);
        // ->setCallback($request->input('callback'));
        // return redirect('/roles/create');
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
        $roles = Role::find($id);
        return view('allTable.role.editRole',array('roles' => $roles,'id'=> $id));
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
            'symbol' => 'required',
            'name' => 'required',
            'detail' => 'required'
        ]);
       
        if($validator->fails()){
            $status_code='400';
            $roles = null;
        }
        else{
            $status_code='200';
            $roles = Role::find($id);
            $roles ->update($request->all());
        }
        return response()->json(array($roles),$status_code);
        //return redirect('roles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role_response = [];
        $errormsg = "";
        try{
            $roles= Role::findOrFail($id);
        } catch(Exception $exception){
            dd($exception);
            $errormsg = 'No Role to de!' . $exception->getCode();
            return Response::json(['errormsg'=>$errormsg]);
        }
        
        $result = $roles->delete();
        if ($result) {
            $role_response['result'] = true;
            $role_response['message'] = "Role Successfully Deleted!";
        } else {
            $role_response['result'] = false;
            $role_response['message'] = "Role was not Deleted, Try Again!";
        }
        return json_encode($role_response);
        // $roles= Role::find($id);
        // $roles->delete();
        // return response()->json(array($roles),200);
        //return redirect('roles');
    }
}
