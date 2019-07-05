
@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <br />
        <h3 >Edit Record</h3>
        <br />
        <form method="POST" action="{{route('riskActivityResults.update',$riskActivityResults->id)}}">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
            <div class="form-group">
            Risk Activity ID:
                <select class="form-control" name="risk_activity_id" id="risk_activity_id">
                @foreach ($riskActivities as $riskActivity)
                    <option value="{{ $riskActivity->id }}">{{$riskActivity->id }}</option>
                @endforeach
                </select>
            </div>
            <div class="form-group">
            Ordinal :
                <input type="text" name="ordinal" class="form-control" value="{{$riskActivityResults->ordinal}}"
                placeholder="Enter Ordinal" />
            </div>
            <div class="form-group">
            Risk Activity Status ID:
                <select class="form-control" name="risk_activity_status_id" id="risk_activity_status_id">
                @foreach ($riskActivityStatuses as $riskActivityStatus)
                    <option value="{{ $riskActivityStatus->id }}">{{$riskActivityStatus->id }}</option>
                @endforeach
                </select>
            </div>
            <div class="form-group">
            Note :
                <input type="text" name="note" class="form-control" value="{{$riskActivityResults->note}}"
                placeholder="Enter Note" />
            </div>
            <div class="form-group">
            Create By :
                <input type="text" name="created_by" class="form-control" value="{{$riskActivityResults->created_by}}"
                placeholder="Enter Created By" />
            </div>
            <div class="form-group">
            Updated By :
                <input type="text" name="updated_by" class="form-control" value="{{$riskActivityResults->updated_by}}"
                placeholder="Enter Updated By" />
            </div>
            <div class="form-group">
                <input type="submit" class="btnbtn-primary" value="Edit"/>
            </button>
        
    </div>
</div>
@endsection