
@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <br />
        <h3 >Edit Record</h3>
        <br />
        <form method="POST" action="{{route('departmentYears.update',$departmentYears->id)}}">
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
            Year ID :
                <select class="form-control" name="year_id" id="year_id">
                    @foreach ($years as $year)
                        <option value="{{ $year->id }}">{{$year->id }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
            Confirmed By :
                <input type="text" name="confirmed_by" class="form-control" value="{{$departmentYears->confirmed_by}}"
                placeholder="Enter Confirmed By" />
            </div>
            <div class="form-group">
            Approved By :
                <input type="text" name="approved_by" class="form-control" value="{{$departmentYears->approved_by}}"
                placeholder="Enter Approved By" />
            </div>
            <div class="form-group">
            Create By :
                <input type="text" name="created_by" class="form-control" value="{{$departmentYears->created_by}}"
                placeholder="Enter Created By" />
            </div>
            <div class="form-group">
            Updated By :
                <input type="text" name="updated_by" class="form-control" value="{{$departmentYears->updated_by}}"
                placeholder="Enter Updated By" />
            </div>
            <div class="form-group">
                <input type="submit" class="btnbtn-primary" value="Edit"/>
            </button>
        
    </div>
</div>
@endsection