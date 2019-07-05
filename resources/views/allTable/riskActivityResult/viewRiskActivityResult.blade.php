@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <br />
        <h3 align="center">Show Risk Activity Result</h3>
        @if($message = Session::get('sucess'))
        <div class="alert alert-sucess">
            <p>{{$message}}</p>
        </div>
        @endif
        <div align="right">
            <a href="{{route('riskActivityResults.create')}}" class=btnbtn-primary>Add Risk Activity Results</a>
        </div>  
        <table class="table table-bordered">
            <tr>     
                <th>Risk Activity ID</th>
                <th>Ordinal</th>
                <th>Risk Activity Status ID</th>
                <th>Note</th>
                <th>Created By</th>
                <th>Updated By</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            @foreach($riskActivityResults as $row)
            <tr>
                <td>{{$row['risk_activity_id']}}</td>
                <td>{{$row['ordinal']}}</td>
                <td>{{$row['risk_activity_status_id']}}</td>
                <td>{{$row['note']}}</td>
                <td>{{$row['created_by']}}</td>
                <td>{{$row['updated_by']}}</td>
                <td><a href="{{action('RiskActivityResultController@edit',$row['id'])}}">
                Edit</a></td>
                <td>
                    <form id="frm{{ $row['id'] }}" action="{{url('/riskActivityResults/' .$row['id'])}}"
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