
@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <br />
        <h3 >Edit Record</h3>
        <br />
        <form method="POST" action="{{route('riskActivities.update',$riskActivities->id)}}">
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
                <input type="text" name="name" class="form-control" value="{{$riskActivities->name}}"
                placeholder="Enter Name" />
            </div>
            <div class="form-group">
            Risk Activity Status ID : 
                <select class="form-control" name="risk_activity_status_id" id="risk_activity_status_id">
                @foreach ($riskActivityStatuses as $riskActivityStatus)
                        <option value="{{ $riskActivityStatus->id }}">{{$riskActivityStatus->id }}</option>
                @endforeach
                </select>
            </div>
            <div class="form-group">
            Deadline :
                <input type="text" name="deadline" class="form-control" value="{{$riskActivities->deadline}}"
                placeholder="Enter Deadline" />
            </div>
            <div class="form-group">
            Oic :
                <input type="text" name="oic" class="form-control" value="{{$riskActivities->oic}}"
                placeholder="Enter Oic" />
            </div>
            <div class="form-group">
            Create By :
                <input type="text" name="created_by" class="form-control" value="{{$riskActivities->created_by}}"
                placeholder="Enter Created By" />
            </div>
            <div class="form-group">
            Updated By :
                <input type="text" name="updated_by" class="form-control" value="{{$riskActivities->updated_by}}"
                placeholder="Enter Updated By" />
            </div>
            <div class="form-group">
                <input type="submit" class="btnbtn-primary" value="Edit"/>
            </button>
        
    </div>
</div>
@endsection