<?php

namespace App\Http\Controllers;
use Validator;
use Illuminate\Http\Request;
use App\Risk;
use App\RiskIndicator;
class RiskIndicatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $riskIndicators = RiskIndicator::all();
        return view('allTable.riskIndicator.viewRiskIndicator',
        compact('riskIndicators',$riskIndicators));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($risk_id = null) 
    {
        $risks=null;
        if(!$risk_id)
        {
            $risks = Risk::all();
        }
        return view('allTable.riskIndicator.createRiskIndicator',
        array('risk_id'=>$risk_id,'risks'=>$risks));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$risk_id = null)
    {
        $validator = Validator::make($request ->all(), [
            'risk_id' => 'required',
            'name' => 'required',
            'goal' => 'required'
        ]);
       
        if($validator->fails()){
            $status_code='400';
            $riskIndicators = null;
        }
        else{
            $status_code='201';
            $riskIndicators = new RiskIndicator(); 
            $riskIndicators->risk_id = request('risk_id');
            $riskIndicators->name = request('name');
            $riskIndicators->goal = request('goal');
            $riskIndicators->created_by = request('created_by');
            $riskIndicators->updated_by = request('updated_by');
            $riskIndicators->save();
        }
        return response()->json(array($riskIndicators),$status_code);
        //return redirect('/riskIndicators/create');
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
        $riskIndicators = RiskIndicator::find($id);
        return view('allTable.riskIndicator.editRiskIndicator',
        array('riskIndicators' => $riskIndicators,'id'=> $id,
        'risks'=>$risks));
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
            'goal' => 'required'
        ]);
       
        if($validator->fails()){
            $status_code='400';
            $riskIndicators = null;
        }
        else{
            $status_code='200';
            $riskIndicators = RiskIndicator::find($id);
            $riskIndicators ->update($request->all());
        }
        return response()->json(array($riskIndicators),$status_code);
       // return redirect('riskIndicators');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $riskIndicator_response = [];
        $errormsg = "";
        try{
            $riskIndicators= RiskIndicator::findOrFail($id);
        } catch(Exception $exception){
            dd($exception);
            $errormsg = 'No RiskIndicator to de!' . $exception->getCode();
            return Response::json(['errormsg'=>$errormsg]);
        }
        
        $result = $riskIndicators->delete();
        if ($result) {
            $riskIndicator_response['result'] = true;
            $riskIndicator_response['message'] = "RiskIndicator Successfully Deleted!";
        } else {
            $riskIndicator_response['result'] = false;
            $riskIndicator_response['message'] = "RiskIndicator was not Deleted, Try Again!";
        }
        return json_encode($riskIndicator_response);
        // $riskIndicators= RiskIndicator::find($id);
        // $riskIndicators->delete();
        // return response()->json(array($riskIndicators),200);
        //return redirect('riskIndicators');
    }
}
