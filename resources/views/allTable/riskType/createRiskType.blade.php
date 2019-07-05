@extends('layouts.app')

@section('content')
<div class="createTest">
    <form class="create_test" method="post" action="{{route('riskTypes.store')}}">
    {{ csrf_field() }}
        Add Role <br>
        Symbol : <input id="symbol" type="text" name="symbol" ><br>
        Name : <input id="name" type="text" name="name" ><br>
        Detail : <input id="detail" type="text" name="detail" ><br>
        Created By : <input id="created_by" type="text" name="created_by" ><br>
        Updated By : <input id="updated_by" type="detail" name="updated_by" ><br>
        <button type="submit" >
            submit
        </button>
        <button type="reset" >
            reset
        </button>
    
    </form>                           
</div>
@endsection