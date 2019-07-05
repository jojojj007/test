
@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <br />
        <h3 >Edit Record</h3>
        <br />
        <form method="POST" action="{{route('riskResults.update',$riskResults->id)}}">
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
            Ordinal :
                <input type="text" name="ordinal" class="form-control" value="{{$riskResults->ordinal}}"
                placeholder="Enter Ordinal" />
            </div>
            <div class="form-group">
            Likelihood :
                <input type="text" name="likelihood" class="form-control" value="{{$riskResults->likelihood}}"
                placeholder="Enter Likelihood" />
            </div>
            <div class="form-group">
            Impact :
                <input type="text" name="impact" class="form-control" value="{{$riskResults->impact}}"
                placeholder="Enter Impact" />
            </div>
            <div class="form-group">
            Create By :
                <input type="text" name="created_by" class="form-control" value="{{$riskResults->created_by}}"
                placeholder="Enter Created By" />
            </div>
            <div class="form-group">
            Updated By :
                <input type="text" name="updated_by" class="form-control" value="{{$riskResults->updated_by}}"
                placeholder="Enter Updated By" />
            </div>
            <div class="form-group">
                <input type="submit" class="btnbtn-primary" value="Edit"/>
            </button>
        
    </div>
</div>
@endsection