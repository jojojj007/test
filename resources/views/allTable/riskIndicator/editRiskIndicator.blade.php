
@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <br />
        <h3 >Edit Record</h3>
        <br />
        <form method="POST" action="{{route('riskIndicators.update',$riskIndicators->id)}}">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
            <div class="form-group">
            Risk ID :
                <select class="form-control" name="risk_id" id="risk_id">
                    @foreach ($risks as $risk)
                        <option value="{{ $risk->id }}">{{$risk->id }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
            Name :
                <input type="text" name="name" class="form-control" value="{{$riskIndicators->name}}"
                placeholder="Enter Name" />
            </div>
            <div class="form-group">
            Goal :
                <input type="text" name="goal" class="form-control" value="{{$riskIndicators->goal}}"
                placeholder="Enter Goal" />
            </div>
            <div class="form-group">
            Create By :
                <input type="text" name="created_by" class="form-control" value="{{$riskIndicators->created_by}}"
                placeholder="Enter Created By" />
            </div>
            <div class="form-group">
            Updated By :
                <input type="text" name="updated_by" class="form-control" value="{{$riskIndicators->updated_by}}"
                placeholder="Enter Updated By" />
            </div>
            <div class="form-group">
                <input type="submit" class="btnbtn-primary" value="Edit"/>
            </button>
        
    </div>
</div>
@endsection