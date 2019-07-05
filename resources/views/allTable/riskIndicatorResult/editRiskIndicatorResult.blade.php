
@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <br />
        <h3 >Edit Record</h3>
        <br />
        <form method="POST" action="{{route('riskIndicatorResults.update',$riskIndicatorResults->id)}}">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
            <div class="form-group">
            Risk Indicator ID :
                <select class="form-control" name="risk_indicator_id" id="risk_indicator_id">
                    @foreach ($riskIndicators as $riskIndicator)
                        <option value="{{ $riskIndicator->id }}">{{$riskIndicator->id }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
            Ordinal :
                <input type="text" name="ordinal" class="form-control" value="{{$riskIndicatorResults->ordinal}}"
                placeholder="Enter Ordinal" />
            </div>
            <div class="form-group">
            Result :
                <input type="text" name="result" class="form-control" value="{{$riskIndicatorResults->result}}"
                placeholder="Enter Result" />
            </div>
            <div class="form-group">
            Create By :
                <input type="text" name="created_by" class="form-control" value="{{$riskIndicatorResults->created_by}}"
                placeholder="Enter Created By" />
            </div>
            <div class="form-group">
            Updated By :
                <input type="text" name="updated_by" class="form-control" value="{{$riskIndicatorResults->updated_by}}"
                placeholder="Enter Updated By" />
            </div>
            <div class="form-group">
                <input type="submit" class="btnbtn-primary" value="Edit"/>
            </button>
        
    </div>
</div>
@endsection