<?php

namespace App\Http\Controllers;
use Validator;
use Illuminate\Http\Request;
use App\Risk;
use App\RiskResult;
class RiskResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $riskResults = RiskResult::all();
        return view('allTable.riskResult.viewRiskResult',
        compact('riskResults',$riskResults));
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
        return view('allTable.riskResult.createRiskResult',
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
            'ordinal' => 'required|not_in:0',
            'likelihood' => 'required|integer|between:1,5',
            'impact' => 'required|integer|between:1,5'
        ]);
       
        if($validator->fails()){
            $status_code='400';
            $riskResults = null;
        }
        else{
            $status_code='201';
            $riskResults = new RiskResult(); 
            $riskResults->risk_id = request('risk_id');
            $riskResults->ordinal = request('ordinal');
            $riskResults->likelihood = request('likelihood');
            $riskResults->impact = request('impact');
            $riskResults->created_by = request('created_by');
            $riskResults->updated_by = request('updated_by');
            $riskResults->save();
        }
        return response()->json(array($riskResults),$status_code);
        //return redirect('/riskResults/create');
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
        $riskResults = RiskResult::find($id);
        return view('allTable.riskResult.editRiskResult',
        array('riskResults' => $riskResults,'id'=> $id,
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
            'ordinal' => 'required|not_in:0',
            'likelihood' => 'required|integer|between:1,5',
            'impact' => 'required|integer|between:1,5'
        ]);
       
        if($validator->fails()){
            $status_code='400';
            $riskResults = null;
        }
        else{
            $status_code='200';
            $riskResults = RiskResult::find($id);
            $riskResults ->update($request->all());
        }
        return response()->json(array($riskResults),$status_code);
        //return redirect('riskResults');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $riskResult_response = [];
        $errormsg = "";
        try{
            $riskResults= RiskResult::findOrFail($id);
        } catch(Exception $exception){
            dd($exception);
            $errormsg = 'No RiskResult to de!' . $exception->getCode();
            return Response::json(['errormsg'=>$errormsg]);
        }
        
        $result = $riskResults->delete();
        if ($result) {
            $riskResult_response['result'] = true;
            $riskResult_response['message'] = "RiskResult Successfully Deleted!";
        } else {
            $riskResult_response['result'] = false;
            $riskResult_response['message'] = "RiskResult was not Deleted, Try Again!";
        }
        return json_encode($riskResult_response);
        // $riskResults= RiskResult::find($id);
        // $riskResults->delete();
        // return response()->json(array($riskResults),200);
        //return redirect('riskResults');
    }
}
