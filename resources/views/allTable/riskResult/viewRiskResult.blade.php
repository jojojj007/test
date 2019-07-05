@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <br />
        <h3 align="center">Show Risk Result</h3>
        @if($message = Session::get('sucess'))
        <div class="alert alert-sucess">
            <p>{{$message}}</p>
        </div>
        @endif
        <div align="right">
            <a href="{{route('riskResults.create')}}" class=btnbtn-primary>Add Risk Results</a>
        </div>
        <table class="table table-bordered">
            <tr>     
                <th>Risk ID</th>
                <th>Ordinal</th>
                <th>Likelihood</th>
                <th>Impact</th>
                <th>Created By</th>
                <th>Updated By</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            @foreach($riskResults as $row)
            <tr>
                <td>{{$row['risk_id']}}</td>
                <td>{{$row['ordinal']}}</td>
                <td>{{$row['likelihood']}}</td>
                <td>{{$row['impact']}}</td>
                <td>{{$row['created_by']}}</td>
                <td>{{$row['updated_by']}}</td>
                <td><a href="{{action('RiskResultController@edit',$row['id'])}}">
                Edit</a></td>
                <td>
                    <form id="frm{{ $row['id'] }}" action="{{url('/riskResults/' .$row['id'])}}"
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