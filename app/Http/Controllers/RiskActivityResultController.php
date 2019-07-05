<?php

namespace App\Http\Controllers;
use Validator;
use App\RiskActivityResult;
use App\RiskActivity;
use App\RiskActivityStatus;
use Illuminate\Http\Request;

class RiskActivityResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $riskActivityResults = RiskActivityResult::all();
        return view('allTable.riskActivityResult.viewRiskActivityResult',
        compact('riskActivityResults',$riskActivityResults));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($risk_activity_id = null,$risk_activity_status_id = null) 
    {
        $riskActivities=null;
        $riskActivityStatuses=null;
        if(!$risk_activity_id)
        {
            $riskActivities = RiskActivity::all();
        }
        if(!$risk_activity_status_id)
        {
            $riskActivityStatuses = RiskActivityStatus::all();
        }
        return view('allTable.riskActivityResult.createRiskActivityResult',
        array('risk_activity_id'=>$risk_activity_id,'riskActivities'=>$riskActivities,
        'risk_activity_status_id'=>$risk_activity_status_id,'riskActivityStatuses'=>$riskActivityStatuses));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$risk_activity_id = null,$risk_activity_status_id = null)
    { 
        $validator = Validator::make($request ->all(), [
        'risk_activity_id' => 'required',
        'ordinal' => 'required|not_in:0',
        'risk_activity_status_id' => 'required',
        'note' => 'required'
        ]);
    
        if($validator->fails()){
            $status_code='400';
            $riskActivityResults = null;
        }
        else{
            $status_code='201';
            $riskActivityResults = new RiskActivityResult(); 
            $riskActivityResults->risk_activity_id = request('risk_activity_id');
            $riskActivityResults->ordinal = request('ordinal');
            $riskActivityResults->risk_activity_status_id = request('risk_activity_status_id');
            $riskActivityResults->note = request('note');
            $riskActivityResults->created_by = request('created_by');
            $riskActivityResults->updated_by = request('updated_by');
            $riskActivityResults->save();
        }
        return response()->json(array($riskActivityResults),$status_code);
        //return redirect('/riskActivityResults/create');
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
        $riskActivities = RiskActivity::all();
        $riskActivityStatuses = RiskActivityStatus::all();
        $riskActivityResults = RiskActivityResult::find($id);
        return view('allTable.riskActivityResult.editRiskActivityResult',
        array('riskActivityResults' => $riskActivityResults,'id'=> $id,
        'riskActivities'=>$riskActivities,
        'riskActivityStatuses'=>$riskActivityStatuses));
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
            'risk_activity_id' => 'required',
            'ordinal' => 'required|not_in:0',
            'risk_activity_status_id' => 'required',
            'note' => 'required'
        ]);
        
        if($validator->fails()){
            $status_code='400';
            $riskActivityResults = null;
        }
        else{
            $status_code='200';
            $riskActivityResults = RiskActivityResult::find($id);
            $riskActivityResults ->update($request->all());
        }
        return response()->json(array($riskActivityResults),$status_code);
        //return redirect('riskActivityResults');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $riskActivityResult_response = [];
        $errormsg = "";
        try{
            $riskActivityResults= RiskActivityResult::findOrFail($id);
        } catch(Exception $exception){
            dd($exception);
            $errormsg = 'No RiskActivityResult to de!' . $exception->getCode();
            return Response::json(['errormsg'=>$errormsg]);
        }
        
        $result = $riskActivityResults->delete();
        if ($result) {
            $riskActivityResult_response['result'] = true;
            $riskActivityResult_response['message'] = "RiskActivityResult Successfully Deleted!";
        } else {
            $riskActivityResult_response['result'] = false;
            $riskActivityResult_response['message'] = "RiskActivityResult was not Deleted, Try Again!";
        }
        return json_encode($riskActivityResult_response);
        // $riskActivityResults = RiskActivityResult::find($id);
        // $riskActivityResults->delete();
        // return response()->json(array($riskActivityResults),200);
        //return redirect('riskActivityResults');
    }
}
