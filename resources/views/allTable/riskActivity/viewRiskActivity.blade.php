@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <br />
        <h3 align="center">Show Risk Activity</h3>
        @if($message = Session::get('sucess'))
        <div class="alert alert-sucess">
            <p>{{$message}}</p>
        </div>
        @endif
        <div align="right">
            <a href="{{route('riskActivities.create')}}" class=btnbtn-primary>Add Department Year</a>
        </div>
        <table class="table table-bordered">
            <tr>     
                <th>Risk ID</th>
                <th>Name</th>
                <th>Risk Activity Status ID</th>
                <th>Deadline</th>
                <th>Oic</th>
                <th>Created By</th>
                <th>Updated By</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            @foreach($riskActivities as $row)
            <tr>
                <td>{{$row['risk_id']}}</td>
                <td>{{$row['name']}}</td>
                <td>{{$row['risk_activity_status_id']}}</td>
                <td>{{$row['deadline']}}</td>
                <td>{{$row['oic']}}</td>
                <td>{{$row['created_by']}}</td>
                <td>{{$row['updated_by']}}</td>
                <td><a href="{{action('RiskActivityController@edit',$row['id'])}}">
                Edit</a></td>
                <td>
                    <form id="frm{{ $row['id'] }}" action="{{url('/riskActivities/' .$row['id'])}}"
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