@extends('layouts.app')

@section('content')
<div class="createTest">
    <form class="create_test" method="post" action="{{route('riskActivityResults.store')}}">
    {{ csrf_field() }}
        Add Risk Activity Result<br>

        Risk Activity ID:
            <select class="form-control" name="risk_activity_id" id="risk_activity_id">
            @foreach ($riskActivities as $riskActivity)
                    <option value="{{ $riskActivity->id }}">{{$riskActivity->id }}</option>
            @endforeach
            </select>
        Ordinal : <input id="ordinal" type="text" name="ordinal" ><br>
        Risk Activity Status ID:
            <select class="form-control" name="risk_activity_status_id" id="risk_activity_status_id">
            @foreach ($riskActivityStatuses as $riskActivityStatus)
                    <option value="{{ $riskActivityStatus->id }}">{{$riskActivityStatus->id }}</option>
            @endforeach
            </select>
        Note : <input id="note" type="text" name="note" ><br>
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