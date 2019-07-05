<?php

namespace App\Http\Controllers;
use Validator;
use Illuminate\Http\Request;
use App\RiskImpact;
class RiskImpactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $riskImpacts = RiskImpact::all();
        return view('allTable.riskImpact.viewRiskImpact', compact('riskImpacts',$riskImpacts));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('allTable.riskImpact.createRiskImpact');
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
            $riskImpacts = null;
        }
        else{
            $status_code='201';
            $riskImpacts = new RiskImpact(); 
            $riskImpacts->symbol = request('symbol');
            $riskImpacts->name = request('name');
            $riskImpacts->detail = request('detail');
            $riskImpacts->created_by = request('created_by');
            $riskImpacts->updated_by = request('updated_by');
            $riskImpacts->save();
        }
        return response()->json(array($riskImpacts),$status_code);
        //return redirect('/riskImpacts/create');
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
        $riskImpacts = RiskImpact::find($id);
        return view('allTable.riskImpact.editRiskImpact',array('riskImpacts' => $riskImpacts,'id'=> $id));
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
            $riskImpacts = null;
        }
        else{
            $status_code='200';
            $riskImpacts = RiskImpact::find($id);
            $riskImpacts ->update($request->all());
        }
        return response()->json(array($riskImpacts),$status_code);
        //return redirect('riskImpacts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $riskImpact_response = [];
        $errormsg = "";
        try{
            $riskImpacts= RiskImpact::findOrFail($id);
        } catch(Exception $exception){
            dd($exception);
            $errormsg = 'No RiskImpact to de!' . $exception->getCode();
            return Response::json(['errormsg'=>$errormsg]);
        }
        
        $result = $riskImpacts->delete();
        if ($result) {
            $riskImpact_response['result'] = true;
            $riskImpact_response['message'] = "RiskImpact Successfully Deleted!";
        } else {
            $riskImpact_response['result'] = false;
            $riskImpact_response['message'] = "RiskImpact was not Deleted, Try Again!";
        }
        return json_encode($riskImpact_response);
        // $riskImpacts= RiskImpact::find($id);
        // $riskImpacts->delete();
        // return response()->json(array($riskImpacts),200);
        //return redirect('riskImpacts');
    }
}
