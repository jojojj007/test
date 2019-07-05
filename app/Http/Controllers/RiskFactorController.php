<?php

namespace App\Http\Controllers;
use Validator;
use Illuminate\Http\Request;
use App\RiskFactor;
use App\Risk;

class RiskFactorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $riskFactors = RiskFactor::all();
        return view('allTable.riskFactor.viewRiskFactor',
        compact('riskFactors',$riskFactors));
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
        return view('allTable.riskFactor.createRiskFactor',
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
            'detail' => 'required'
        ]);
       
        if($validator->fails()){
            $status_code='400';
            $riskFactors = null;
        }
        else{
            $status_code='201';
            $riskFactors = new RiskFactor(); 
            $riskFactors->risk_id = request('risk_id');
            $riskFactors->detail = request('detail');
            $riskFactors->created_by = request('created_by');
            $riskFactors->updated_by = request('updated_by');
            $riskFactors->save();
        }
        return response()->json(array($riskFactors),$status_code);
       // return redirect('/riskFactors/create');
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
        $riskFactors = RiskFactor::find($id);
        return view('allTable.riskFactor.editRiskFactor',
        array('riskFactors' => $riskFactors,'id'=> $id,
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
            'detail' => 'required'
        ]);
       
        if($validator->fails()){
            $status_code='400';
            $riskFactors = null;
        }
        else{
            $status_code='200';
            $riskFactors = RiskFactor::find($id);
            $riskFactors ->update($request->all());
        }
        return response()->json(array($riskFactors),$status_code);
        //return redirect('riskFactors');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $riskFactor_response = [];
        $errormsg = "";
        try{
            $riskFactors= RiskFactor::findOrFail($id);
        } catch(Exception $exception){
            dd($exception);
            $errormsg = 'No RiskFactor to de!' . $exception->getCode();
            return Response::json(['errormsg'=>$errormsg]);
        }
        
        $result = $riskFactors->delete();
        if ($result) {
            $riskFactor_response['result'] = true;
            $riskFactor_response['message'] = "RiskFactor Successfully Deleted!";
        } else {
            $riskFactor_response['result'] = false;
            $riskFactor_response['message'] = "RiskFactor was not Deleted, Try Again!";
        }
        return json_encode($riskFactor_response);
        // $riskFactors= RiskFactor::find($id);
        // $riskFactors->delete();
        // return response()->json(array($riskFactors),200);
        //return redirect('riskFactors');
    }
}
