@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <br />
        <h3 align="center">Show Risk</h3>
        @if($message = Session::get('sucess'))
        <div class="alert alert-sucess">
            <p>{{$message}}</p>
        </div>
        @endif
        <div align="right">
            <a href="{{route('risks.create')}}" class=btnbtn-primary>Add Risk</a>
        </div>
        <table class="table table-bordered">
            <tr>     
                <th>Department Year ID</th>
                <th>Name</th>
                <th>Risk Type ID</th>
                <th>Likelihood</th>
                <th>Risk Impact ID</th>
                <th>Impact</th>
                <th>Risk Strategy ID</th>
                <th>Created By</th>
                <th>Updated By</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            @foreach($risks as $row)
            <tr>
                <td>{{$row['department_year_id']}}</td>
                <td>{{$row['name']}}</td>
                <td>{{$row['risk_type_id']}}</td>
                <td>{{$row['likelihood']}}</td>
                <td>{{$row['risk_impact_id']}}</td>
                <td>{{$row['impact']}}</td>
                <td>{{$row['risk_strategy_id']}}</td>
                <td>{{$row['created_by']}}</td>
                <td>{{$row['updated_by']}}</td>
                <td><a href="{{action('RiskController@edit',$row['id'])}}">
                Edit</a></td>
                <td>
                    <form id="frm{{ $row['id'] }}" action="{{url('/risks/' .$row['id'])}}"
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