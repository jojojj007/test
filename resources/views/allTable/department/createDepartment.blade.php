@extends('layouts.app')

@section('content')
<div class="createTest">
    <form class="create_test" method="post" action="{{route('departments.store')}}">
    {{ csrf_field() }}
        Add Department <br>
        Department_code : <input id="department_code" type="text" name="department_code" ><br>
        Name : <input id="name" type="text" name="name" ><br>
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