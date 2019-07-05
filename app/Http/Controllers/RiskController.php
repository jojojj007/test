<?php

namespace App\Http\Controllers;
use Validator;
use Illuminate\Http\Request;
use App\Risk;
use App\DepartmentYear;
use App\RiskType;
use App\RiskImpact;
use App\RiskStrategy;

class RiskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $risks = Risk::all();
        return view('allTable.risk.viewRisk', compact('risks',$risks));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($department_year_id = null,
    $risk_type_id = null,$risk_impact_id = null,$risk_strategy_id = null)
    {
        $departmentYears=null;
        $riskTypes=null;
        $riskImpacts=null;
        $riskStrategies=null;
        if(!$department_year_id)
        {
            $departmentYears = DepartmentYear::all();
        }
        if(!$risk_type_id)
        {
            $riskTypes = RiskType::all();
        }
        if(!$risk_impact_id)
        {
            $riskImpacts = RiskImpact::all();
        }
        if(!$risk_strategy_id)
        {
            $riskStrategies = RiskStrategy::all();
        }
        return view('allTable.risk.createRisk',
        array('department_year_id'=>$department_year_id,'departmentYears'=>$departmentYears,
        'risk_type_id'=>$risk_type_id,'riskTypes'=>$riskTypes,
        'risk_impact_id'=>$risk_impact_id,'riskImpacts'=>$riskImpacts,
        'risk_strategy_id'=>$risk_strategy_id,'riskStrategies'=>$riskStrategies
    ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,
    $department_year_id = null,$risk_type_id = null,
    $risk_impact_id = null,$risk_strategy_id = null)
    {
        $validator = Validator::make($request ->all(), [
            'department_year_id' => 'required',
            'name' => 'required',
            'risk_type_id' => 'required',
            'likelihood' => 'required|integer|between:1,5',
            'risk_impact_id' => 'required',
            'impact' => 'required|integer|between:1,5',
            'risk_strategy_id' => 'required'
        ]);
       
        if($validator->fails()){
            $status_code='400';
            $risks = null;
        }
        else{
            $status_code='201';
            $risks = new Risk(); 
            $risks->department_year_id = request('department_year_id');
            $risks->name = request('name');
            $risks->risk_type_id = request('risk_type_id');
            $risks->likelihood = request('likelihood');
            $risks->risk_impact_id = request('risk_impact_id');
            $risks->impact = request('impact');
            $risks->risk_strategy_id = request('risk_strategy_id');
            $risks->created_by = request('created_by');
            $risks->updated_by = request('updated_by');
            $risks->save();
        }
        return response()->json(array($risks),$status_code);
        //return redirect('/risks/create');
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
        $departmentYears = DepartmentYear::all();
        $riskTypes = RiskType::all();
        $riskImpacts = RiskImpact::all();
        $riskStrategies = RiskStrategy::all();

        $risks = Risk::find($id);
        return view('allTable.risk.editRisk'
        ,array('risks' => $risks,'id'=> $id
        ,'departmentYears'=>$departmentYears,'riskTypes'=>$riskTypes
        ,'riskImpacts'=>$riskImpacts,'riskStrategies'=>$riskStrategies));
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
            'department_year_id' => 'required',
            'name' => 'required',
            'risk_type_id' => 'required',
            'likelihood' => 'required|integer|between:1,5',
            'risk_impact_id' => 'required',
            'impact' => 'required|integer|between:1,5',
            'risk_strategy_id' => 'required'
        ]);
       
        if($validator->fails()){
            $status_code='400';
            $risks = null;
        }
        else{
            $status_code='200';
            $risks = Risk::find($id);
            $risks ->update($request->all());
        }
        return response()->json(array($risks),$status_code);
        //return redirect('risks');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $risk_response = [];
        $errormsg = "";
        try{
            $risks= Risk::findOrFail($id);
        } catch(Exception $exception){
            dd($exception);
            $errormsg = 'No Risk to de!' . $exception->getCode();
            return Response::json(['errormsg'=>$errormsg]);
        }
        
        $result = $risks->delete();
        if ($result) {
            $risk_response['result'] = true;
            $risk_response['message'] = "Risk Successfully Deleted!";
        } else {
            $risk_response['result'] = false;
            $risk_response['message'] = "Risk was not Deleted, Try Again!";
        }
        return json_encode($risk_response);
        // $risks= Risk::find($id);
        // $risks->delete();
        // return response()->json(array($risks),200);
        //return redirect('risks');
    }
}
