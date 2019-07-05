
@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <br />
        <h3 >Edit Record</h3>
        <br />
        <form method="POST" action="{{route('users.update',$users->id)}}">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
            <div class="form-group">
            Department ID :
                <select class="form-control" name="department_id" id="department_id">
                    @foreach ($departments as $department)
                        <option value="{{ $department->id }}">{{$department->id }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
            Employee ID :
                <input type="text" name="employee_id" class="form-control" value="{{$users->employee_id}}"
                placeholder="Enter Employee ID" />
            </div>
            <div class="form-group">
            Role ID :
                <select class="form-control" name="role_id" id="role_id">
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}">{{$role->id }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
            Create By :
                <input type="text" name="created_by" class="form-control" value="{{$users->created_by}}"
                placeholder="Enter Created By" />
            </div>
            <div class="form-group">
            Updated By :
                <input type="text" name="updated_by" class="form-control" value="{{$users->updated_by}}"
                placeholder="Enter Updated By" />
            </div>
            <div class="form-group">
                <input type="submit" class="btnbtn-primary" value="Edit"/>
            </button>
        
    </div>
</div>
@endsection