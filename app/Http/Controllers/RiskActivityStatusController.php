<?php

namespace App\Http\Controllers;
use Validator;
use Illuminate\Http\Request;
use App\RiskActivityStatus;
class RiskActivityStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $riskActivityStatuses = RiskActivityStatus::all();
        return view('allTable.RiskActivityStatus.viewRiskActivityStatus', compact('riskActivityStatuses',$riskActivityStatuses));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('allTable.RiskActivityStatus.createRiskActivityStatus');
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
            $riskActivityStatuses = null;
        }
        else{
            $status_code='201';
            $riskActivityStatuses = new RiskActivityStatus(); 
            $riskActivityStatuses->symbol = request('symbol');
            $riskActivityStatuses->name = request('name');
            $riskActivityStatuses->detail = request('detail');
            $riskActivityStatuses->created_by = request('created_by');
            $riskActivityStatuses->updated_by = request('updated_by');
            $riskActivityStatuses->save();
        }
            return response()->json(array($riskActivityStatuses),$status_code);
        
            //return redirect('/riskActivityStatuses/create');
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
        $riskActivityStatuses = RiskActivityStatus::find($id);
        return view('allTable.RiskActivityStatus.editRiskActivityStatus',array('riskActivityStatuses' => $riskActivityStatuses,'id'=> $id));
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
            $riskActivityStatuses = null;
        }
        else{
            $status_code='200';
            $riskActivityStatuses = RiskActivityStatus::find($id);
            $riskActivityStatuses ->update($request->all());
        }
        return response()->json(array($riskActivityStatuses),$status_code);
        //return redirect('riskActivityStatuses');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $riskActivityStatus_response = [];
        $errormsg = "";
        try{
            $riskActivityStatuses= RiskActivityStatus::findOrFail($id);
        } catch(Exception $exception){
            dd($exception);
            $errormsg = 'No RiskActivityStatus to de!' . $exception->getCode();
            return Response::json(['errormsg'=>$errormsg]);
        }
        
        $result = $riskActivityStatuses->delete();
        if ($result) {
            $riskActivityStatus_response['result'] = true;
            $riskActivityStatus_response['message'] = "RiskActivityStatus Successfully Deleted!";
        } else {
            $riskActivityStatus_response['result'] = false;
            $riskActivityStatus_response['message'] = "RiskActivityStatus was not Deleted, Try Again!";
        }
        return json_encode($riskActivityStatus_response);
        // $riskActivityStatuses= RiskActivityStatus::find($id);
        // $riskActivityStatuses->delete();
        // return response()->json(array($riskActivityStatuses),200);
       // return redirect('riskActivityStatuses');
    }
}
