@extends('layouts.app')

@section('content')
<div class="createTest">
    <form class="create_test" method="post" action="{{route('departmentYears.store')}}">
    {{ csrf_field() }}
        Add Department Year<br>

        Department ID:
            <select class="form-control" name="department_id" id="department_id">
            @foreach ($departments as $department)
                    <option value="{{ $department->id }}">{{$department->id }}</option>
            @endforeach
            </select>
        Year ID : 
        <select class="form-control" name="year_id" id="year_id">
            @foreach ($years as $year)
                    <option value="{{ $year->id }}">{{$year->id }}</option>
            @endforeach
            </select>

        Confirmed By : <input id="confirmed_by" type="text" name="confirmed_by" ><br>
        Approved By : <input id="approved_by" type="text" name="approved_by" ><br>
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