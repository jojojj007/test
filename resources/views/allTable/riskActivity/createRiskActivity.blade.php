@extends('layouts.app')

@section('content')
<div class="createTest">
    <form class="create_test" method="post" action="{{route('riskActivities.store')}}">
    {{ csrf_field() }}
        Add Risk Activity<br>

        Risk ID:
            <select class="form-control" name="risk_id" id="risk_id">
            @foreach ($risks as $risk)
                    <option value="{{ $risk->id }}">{{$risk->id }}</option>
            @endforeach
            </select>
        Name : <input id="name" type="text" name="name" ><br>
        Risk Activity Status ID : 
            <select class="form-control" name="risk_activity_status_id" id="risk_activity_status_id">
            @foreach ($riskActivityStatuses as $riskActivityStatus)
                    <option value="{{ $riskActivityStatus->id }}">{{$riskActivityStatus->id }}</option>
            @endforeach
            </select>

        Deadline : <input id="deadline" type="text" name="deadline" ><br>
        Oic : <input id="oic" type="text" name="oic" ><br>
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