@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <br />
        <h3 align="center">Test</h3>
        <table class="table table-bordered">
            <tr>     
            <th>Department Code</th>
                <th>Name</th>
                <th>Created By</th>
                <th>Updated By</th>
            </tr>
            @foreach ($tests as $row) 
            <tr>
                <td>{{$row['department_code']}}</td>
                <td>{{$row['name']}}</td>
                <td>{{$row['created_by']}}</td>
                <td>{{$row['updated_by']}}</td>
            </tr>
            @endforeach
        </table>
    </div>
</div>

@endsection