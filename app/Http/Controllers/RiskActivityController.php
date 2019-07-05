<?php

namespace App\Http\Controllers;
use Validator;
use App\RiskActivity;
use App\Risk;
use App\RiskActivityStatus;
use Illuminate\Http\Request;

class RiskActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $riskActivities = RiskActivity::all();
        return view('allTable.riskActivity.viewRiskActivity',
        compact('riskActivities',$riskActivities));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($risk_id = null,$risk_activity_status_id = null) 
    {
        $risks=null;
        $riskActivityStatuses=null;
        if(!$risk_id)
        {
            $risks = Risk::all();
        }
        if(!$risk_activity_status_id)
        {
            $riskActivityStatuses = RiskActivityStatus::all();
        }
        return view('allTable.riskActivity.createRiskActivity',
        array('risk_id'=>$risk_id,'risks'=>$risks,
        'risk_activity_status_id'=>$risk_activity_status_id,'riskActivityStatuses'=>$riskActivityStatuses));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$risk_id = null,$risk_activity_status_id = null)
    {
        $validator = Validator::make($request ->all(), [
            'risk_id' => 'required',
            'name' => 'required',
            'risk_activity_status_id' => 'required',
            'deadline' => 'required',
            'oic' => 'required'
        ]);
       
        if($validator->fails()){
            $status_code='400';
            $riskActivities = null;
        }
        else{
            $status_code='201';
            $riskActivities = new RiskActivity(); 
            $riskActivities->risk_id = request('risk_id');
            $riskActivities->name = request('name');
            $riskActivities->risk_activity_status_id = request('risk_activity_status_id');
            $riskActivities->deadline = request('deadline');
            $riskActivities->oic = request('oic');

            $riskActivities->created_by = request('created_by');
            $riskActivities->updated_by = request('updated_by');
            $riskActivities->save();
        }
        return response()->json(array($riskActivities),$status_code);
        //return redirect('/riskActivities/create');
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
        $risks = Risk::all();
        $riskActivityStatuses = RiskActivityStatus::all();
        $riskActivities = RiskActivity::find($id);
        return view('allTable.riskActivity.editRiskActivity',
        array('riskActivities' => $riskActivities,'id'=> $id,
        'risks'=>$risks,'riskActivityStatuses'=>$riskActivityStatuses));
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
        'risk_id' => 'required',
        'name' => 'required',
        'risk_activity_status_id' => 'required',
        'deadline' => 'required',
        'oic' => 'required'
    ]);
   
    if($validator->fails()){
        $status_code='400';
        $riskActivities = null;
    }
    else{
        $status_code='200';
        $riskActivities = RiskActivity::find($id);
        $riskActivities ->update($request->all());
    }
        return response()->json(array($riskActivities),$status_code);
        //return redirect('riskActivities');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $riskActivity_response = [];
        $errormsg = "";
        try{
            $riskActivities= RiskActivity::findOrFail($id);
        } catch(Exception $exception){
            dd($exception);
            $errormsg = 'No RiskActivity to de!' . $exception->getCode();
            return Response::json(['errormsg'=>$errormsg]);
        }
        
        $result = $riskActivities->delete();
        if ($result) {
            $riskActivity_response['result'] = true;
            $riskActivity_response['message'] = "RiskActivity Successfully Deleted!";
        } else {
            $riskActivity_response['result'] = false;
            $riskActivity_response['message'] = "RiskActivity was not Deleted, Try Again!";
        }
        return json_encode($riskActivity_response);
        // $riskActivities= RiskActivity::find($id);
        // $riskActivities->delete();
        // return response()->json(array($riskActivities),200);
        //return redirect('riskActivities');
    }
}
