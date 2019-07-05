@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <br />
        <h3 align="center">Show Department</h3>
        @if($message = Session::get('sucess'))
        <div class="alert alert-sucess">
            <p>{{$message}}</p>
        </div>
        @endif
        <div align="right">
            <a href="{{route('departments.create')}}" class=btnbtn-primary>Add Department</a>
        </div>
        <table class="table table-bordered">
            <tr>
                <th>Department Code</th>
                <th>Name</th>
                <th>Created By</th>
                <th>Updated By</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            @foreach($departments as $row)
            <tr>
                <td>{{$row['department_code']}}</td>
                <td>{{$row['name']}}</td>
                <td>{{$row['created_by']}}</td>
                <td>{{$row['updated_by']}}</td>
                <td><a href="{{action('DepartmentController@edit',$row['id'])}}">
                Edit</a></td>
                <td>
                    <form id="frm{{ $row['id'] }}" action="{{url('/departments/' .$row['id'])}}"
                    method="post">
                    {{ method_field('DELETE') }}
                    <input type="hidden" for="frm{{ $row['id'] }}" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                    <button for="frm{{ $row['id'] }}" type="submit" class="btn btn-danger">DELETE</button>
                </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>

@endsection