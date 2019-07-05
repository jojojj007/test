<?php

namespace App\Http\Controllers;
use Validator;
use Illuminate\Http\Request;
use App\RiskType;
class RiskTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $riskTypes = RiskType::all();
        return view('allTable.riskType.viewRiskType', compact('riskTypes',$riskTypes));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('allTable.riskType.createRiskType');
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
            $riskTypes = null;
        }
        else{
            $status_code='201';
            $riskTypes = new RiskType(); 
            $riskTypes->symbol = request('symbol');
            $riskTypes->name = request('name');
            $riskTypes->detail = request('detail');
            $riskTypes->created_by = request('created_by');
            $riskTypes->updated_by = request('updated_by');
            $riskTypes->save();
        }
        return response()->json(array($riskTypes),$status_code);
       // return redirect('/riskTypes/create');
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
        $riskTypes = RiskType::find($id);
        return view('allTable.riskType.editRiskType',array('riskTypes' => $riskTypes,'id'=> $id));
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
            $riskTypes = null;
        }
        else{
            $status_code='200';
            $riskTypes = RiskType::find($id);
            $riskTypes ->update($request->all());
        }
        return response()->json(array($riskTypes),$status_code);
        //return redirect('riskTypes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $riskType_response = [];
        $errormsg = "";
        try{
            $riskTypes= RiskType::findOrFail($id);
        } catch(Exception $exception){
            dd($exception);
            $errormsg = 'No RiskIndicatorResult to de!' . $exception->getCode();
            return Response::json(['errormsg'=>$errormsg]);
        }
        
        $result = $riskTypes->delete();
        if ($result) {
            $riskType_response['result'] = true;
            $riskType_response['message'] = "RiskType Successfully Deleted!";
        } else {
            $riskType_response['result'] = false;
            $riskType_response['message'] = "RiskType was not Deleted, Try Again!";
        }
        return json_encode($riskType_response);
        // $riskTypes= RiskType::find($id);
        // $riskTypes->delete();
        // return response()->json(array($riskTypes),200);
        //return redirect('riskTypes');
    }
}
