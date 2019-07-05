@extends('layouts.app')

@section('content')
<div class="createTest">
    <form class="create_test" method="post" action="{{route('risks.store')}}">
    {{ csrf_field() }}
        Add Risk<br>

        Department Year ID:
            <select class="form-control" name="department_year_id" id="department_year_id">
            @foreach ($departmentYears as $departmentYear)
                    <option value="{{ $departmentYear->id }}">{{$departmentYear->id }}</option>
            @endforeach
            </select>
        Name : <input id="name" type="text" name="name" ><br>
        Risk Type ID : 
        <select class="form-control" name="risk_type_id" id="risk_type_id">
            @foreach ($riskTypes as $riskType)
                    <option value="{{ $riskType->id }}">{{$riskType->id }}</option>
            @endforeach
            </select>
        Likelihood : <input id="likelihood" type="text" name="likelihood" ><br>
        
        Risk Impact ID : 
        <select class="form-control" name="risk_impact_id" id="risk_impact_id">
            @foreach ($riskImpacts as $riskImpact)
                    <option value="{{ $riskImpact->id }}">{{$riskImpact->id }}</option>
            @endforeach
            </select>
        Impact : <input id="impact" type="text" name="impact" ><br>
        
        Risk Strategy ID : 
        <select class="form-control" name="risk_strategy_id" id="risk_strategy_id">
            @foreach ($riskStrategies as $riskStrategy)
                    <option value="{{ $riskStrategy->id }}">{{$riskStrategy->id }}</option>
            @endforeach
            </select>
        Created_by : <input id="created_by" type="text" name="created_by" ><br>
        Updated_by : <input id="updated_by" type="text" name="updated_by" ><br>
        <button type="submit" >
            submit
        </button>
        <button type="reset" >
            reset
        </button>
    
    </form>                           
</div>
@endsection