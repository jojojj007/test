<?php

namespace App\Http\Controllers;
use Validator;
use Illuminate\Http\Request;
use App\RiskStrategy;
class RiskStrategyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $riskStrategies = RiskStrategy::all();
        return view('allTable.RiskStrategy.viewRiskStrategy', compact('riskStrategies',$riskStrategies));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('allTable.RiskStrategy.createRiskStrategy');
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
            $riskStrategies = null;
        }
        else{
            $status_code='201';
            $riskStrategies = new RiskStrategy(); 
            $riskStrategies->symbol = request('symbol');
            $riskStrategies->name = request('name');
            $riskStrategies->detail = request('detail');
            $riskStrategies->created_by = request('created_by');
            $riskStrategies->updated_by = request('updated_by');
            $riskStrategies->save();
        }
        return response()->json(array($riskStrategies),$status_code);
        //return redirect('/riskStrategies/create');
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
        $riskStrategies = RiskStrategy::find($id);
        return view('allTable.RiskStrategy.editRiskStrategy',array('riskStrategies' => $riskStrategies,'id'=> $id));
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
            $riskStrategies = null;
        }
        else{
            $status_code='200';
            $riskStrategies = RiskStrategy::find($id);
            $riskStrategies ->update($request->all());
        }
        return response()->json(array($riskStrategies),$status_code);
        //return redirect('riskStrategies');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $riskStrategy_response = [];
        $errormsg = "";
        try{
            $riskStrategies= RiskStrategy::findOrFail($id);
        } catch(Exception $exception){
            dd($exception);
            $errormsg = 'No RiskStrategy to de!' . $exception->getCode();
            return Response::json(['errormsg'=>$errormsg]);
        }
        
        $result = $riskStrategies->delete();
        if ($result) {
            $riskStrategy_response['result'] = true;
            $riskStrategy_response['message'] = "RiskStrategy Successfully Deleted!";
        } else {
            $riskStrategy_response['result'] = false;
            $riskStrategy_response['message'] = "RiskStrategy was not Deleted, Try Again!";
        }
        return json_encode($riskStrategy_response);
        // $riskStrategies= RiskStrategy::find($id);
        // $riskStrategies->delete();
        // return response()->json(array($riskStrategies),200);
        //return redirect('riskStrategies');
    }
}
