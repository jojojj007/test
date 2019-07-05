@extends('layouts.app')

@section('content')
<div class="createTest">
    <form class="create_test" method="post" action="{{route('riskFactors.store')}}">
    {{ csrf_field() }}
        Add Risk Factor<br>

        Risk ID:
            <select class="form-control" name="risk_id" id="risk_id">
            @foreach ($risks as $risk)
                    <option value="{{ $risk->id }}">{{$risk->id }}</option>
            @endforeach
            </select>
        Detail : <input id="detail" type="text" name="detail" ><br>
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