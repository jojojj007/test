@extends('layouts.app')

@section('content')
<div class="createTest">
    <form class="create_test" method="post" action="{{route('users.store')}}">
    {{ csrf_field() }}
        Add Role <br>

        Department ID:
            <select class="form-control" name="department_id" id="department_id">
            @foreach ($departments as $department)
                    <option value="{{ $department->id }}">{{$department->id }}</option>
            @endforeach
            </select>
        Employee ID : <input id="employee_id" type="text" name="employee_id" ><br>    
        Role ID : 
        <select class="form-control" name="role_id" id="role_id">
            @foreach ($roles as $role)
                    <option value="{{ $role->id }}">{{$role->id }}</option>
            @endforeach
            </select>

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