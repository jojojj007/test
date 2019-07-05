
@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <br />
        <h3 >Edit Record</h3>
        <br />
        <form method="POST" action="{{route('risks.update',$risks->id)}}">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
            <div class="form-group">
            Department Year ID :
                <select class="form-control" name="department_year_id" id="department_year_id">
                    @foreach ($departmentYears as $departmentYear)
                        <option value="{{ $departmentYear->id }}">{{$departmentYear->id }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
            Name :
                <input type="text" name="name" class="form-control" value="{{$risks->name}}"
                placeholder="Enter Name" />
            </div>

            <div class="form-group">
            Risk Type ID :
                <select class="form-control" name="risk_type_id" id="risk_type_id">
                    @foreach ($riskTypes as $riskType)
                        <option value="{{ $riskType->id }}">{{$riskType->id }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
            Likelihood :
                <input type="text" name="likelihood" class="form-control" value="{{$risks->likelihood}}"
                placeholder="Enter Likelihood" />
            </div>

            <div class="form-group">
            Risk Impact ID :
                <select class="form-control" name="risk_impact_id" id="risk_impact_id">
                    @foreach ($riskImpacts as $riskImpact)
                        <option value="{{ $riskImpact->id }}">{{$riskImpact->id }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
            Impact :
                <input type="text" name="impact" class="form-control" value="{{$risks->impact}}"
                placeholder="Enter Impact" />
            </div>

            <div class="form-group">
            Risk Strategy ID :
                <select class="form-control" name="risk_strategy_id" id="risk_strategy_id">
                    @foreach ($riskStrategies as $riskStrategy)
                        <option value="{{ $riskStrategy->id }}">{{$riskStrategy->id }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
            Create_by :
                <input type="text" name="created_by" class="form-control" value="{{$risks->created_by}}"
                placeholder="Enter Create_by" />
            </div>
            
            <div class="form-group">
            Updated_by :
                <input type="text" name="updated_by" class="form-control" value="{{$risks->updated_by}}"
                placeholder="Enter Updated_by" />
            </div>
            
            <div class="form-group">
                <input type="submit" class="btnbtn-primary" value="Edit"/>
            </button>
    </div>
</div>
@endsection