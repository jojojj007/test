<?php

namespace App\Http\Controllers;
use Validator;
use Illuminate\Http\Request;
use App\RiskIndicatorResult;
use App\RiskIndicator;
class RiskIndicatorResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $riskIndicatorResults = RiskIndicatorResult::all();
        return view('allTable.riskIndicatorResult.viewRiskIndicatorResult',
        compact('riskIndicatorResults',$riskIndicatorResults));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($risk_indicator_id = null) 
    {
        $riskIndicators=null;
        if(!$risk_indicator_id)
        {
            $riskIndicators = RiskIndicator::all();
        }
        return view('allTable.riskIndicatorResult.createRiskIndicatorResult',
        array('risk_indicator_id'=>$risk_indicator_id,'riskIndicators'=>$riskIndicators));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$risk_indicator_id = null)
    {
        $validator = Validator::make($request ->all(), [
            'risk_indicator_id' => 'required',
            'ordinal' => 'required|not_in:0',
            'result' => 'required'
        ]);
       
        if($validator->fails()){
            $status_code='400';
            $riskIndicatorResults = null;
        }
        else{
            $status_code='201';
            $riskIndicatorResults = new RiskIndicatorResult(); 
            $riskIndicatorResults->risk_indicator_id = request('risk_indicator_id');
            $riskIndicatorResults->ordinal = request('ordinal');
            $riskIndicatorResults->result = request('result');
            $riskIndicatorResults->created_by = request('created_by');
            $riskIndicatorResults->updated_by = request('updated_by');
            $riskIndicatorResults->save();
        }
        return response()->json(array($riskIndicatorResults),$status_code);
        //return redirect('/riskIndicatorResults/create');
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
        $riskIndicators = RiskIndicator::all();
        $riskIndicatorResults = RiskIndicatorResult::find($id);
        return view('allTable.riskIndicatorResult.editRiskIndicatorResult',
        array('riskIndicatorResults' => $riskIndicatorResults,'id'=> $id,
        'riskIndicators'=>$riskIndicators));
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
            'risk_indicator_id' => 'required',
            'ordinal' => 'required|not_in:0',
            'result' => 'required'
        ]);
       
        if($validator->fails()){
            $status_code='400';
            $riskIndicatorResults = null;
        }
        else{
            $status_code='200';
            $riskIndicatorResults = RiskIndicatorResult::find($id);
            $riskIndicatorResults ->update($request->all());
        }
        return response()->json(array($riskIndicatorResults),$status_code);
        //return redirect('riskIndicatorResults');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $riskIndicatorResult_response = [];
        $errormsg = "";
        try{
            $riskIndicatorResults= RiskIndicatorResult::findOrFail($id);
        } catch(Exception $exception){
            dd($exception);
            $errormsg = 'No RiskIndicatorResult to de!' . $exception->getCode();
            return Response::json(['errormsg'=>$errormsg]);
        }
        
        $result = $riskIndicatorResults->delete();
        if ($result) {
            $riskIndicatorResult_response['result'] = true;
            $riskIndicatorResult_response['message'] = "RiskIndicatorResult Successfully Deleted!";
        } else {
            $riskIndicatorResult_response['result'] = false;
            $riskIndicatorResult_response['message'] = "RiskIndicatorResult was not Deleted, Try Again!";
        }
        return json_encode($riskIndicatorResult_response);
        // $riskIndicatorResults= RiskIndicatorResult::find($id);
        // $riskIndicatorResults->delete();
        // return response()->json(array($riskIndicatorResults),200);
        //return redirect('riskIndicatorResults');
    }
}
