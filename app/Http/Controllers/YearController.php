<?php

namespace App\Http\Controllers;
use Validator;
use Illuminate\Http\Request;
use App\Year;
class YearController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $years = Year::all();
        return view('allTable.year.viewYear', compact('years',$years));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('allTable.year.createYear');
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
            $years = null;
        }
        else{
            $status_code='201';
            $years = new Year(); 
            $years->symbol = request('symbol');
            $years->name = request('name');
            $years->detail = request('detail');
            $years->created_by = request('created_by');
            $years->updated_by = request('updated_by');
            $years->save();
        }
        return response()->json(array($years),$status_code);
        //return redirect('/years/create');
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
        $years = Year::find($id);
        return view('allTable.year.editYear',array('years' => $years,'id'=> $id));
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
            $years = null;
        }
        else{
            $status_code='200';
            $years = Year::find($id);
            $years ->update($request->all());
        }
        return response()->json(array($years),$status_code);
        //return redirect('years');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $year_response = [];
        $errormsg = "";
        try{
            $years= Year::findOrFail($id);
        } catch(Exception $exception){
            dd($exception);
            $errormsg = 'No Year to de!' . $exception->getCode();
            return Response::json(['errormsg'=>$errormsg]);
        }
        
        $result = $years->delete();
        if ($result) {
            $year_response['result'] = true;
            $year_response['message'] = "Year Successfully Deleted!";
        } else {
            $year_response['result'] = false;
            $year_response['message'] = "Year was not Deleted, Try Again!";
        }
        return json_encode($year_response);
        // $years= Year::find($id);
        // $years->delete();
        // return response()->json(array($years),200);
        //return redirect('years');
    }
}
