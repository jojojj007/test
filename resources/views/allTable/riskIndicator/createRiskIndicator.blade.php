@extends('layouts.app')

@section('content')
<div class="createTest">
    <form class="create_test" method="post" action="{{route('riskIndicators.store')}}">
    {{ csrf_field() }}
        Add Risk Indicator<br>

        Risk ID:
            <select class="form-control" name="risk_id" id="risk_id">
            @foreach ($risks as $risk)
                    <option value="{{ $risk->id }}">{{$risk->id }}</option>
            @endforeach
            </select>
        Name : <input id="name" type="text" name="name" ><br>
        Goal : <input id="goal" type="text" name="goal" ><br>
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