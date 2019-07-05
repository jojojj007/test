@extends('layouts.app')

@section('content')
<div class="createTest">
    <form class="create_test" method="post" action="{{route('riskIndicatorResults.store')}}">
    {{ csrf_field() }}
        Add Risk Indicator Result<br>

        Risk ID:
            <select class="form-control" name="risk_indicator_id" id="risk_indicator_id">
            @foreach ($riskIndicators as $riskIndicator)
                    <option value="{{ $riskIndicator->id }}">{{$riskIndicator->id }}</option>
            @endforeach
            </select>
        Ordinal : <input id="ordinal" type="text" name="ordinal" ><br>
        Result : <input id="result" type="text" name="result" ><br>
        Created By : <input id="created_by" type="text" name="created_by" ><br>
        Updated By : <input id="updated_by" type="text" name="updated_by" ><br>
        <button type="submit" >
            submit
        </button>
        <button type="reset" >
            reset
        </button>
    
    </form>                           
</div>
@endsection