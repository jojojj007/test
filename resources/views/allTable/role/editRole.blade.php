
@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <br />
        <h3 >Edit Record</h3>
        <br />
        <form method="POST" action="{{route('roles.update',$roles->id)}}">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
            <div class="form-group">
            Symbol :
                <input type="text" name="symbol" class="form-control" value="{{$roles->symbol}}"
                placeholder="Enter Symbol" />
            </div>
            <div class="form-group">
            Name :
                <input type="text" name="name" class="form-control" value="{{$roles->name}}"
                placeholder="Enter Name" />
            </div>
            <div class="form-group">
            Detail :
                <input type="text" name="detail" class="form-control" value="{{$roles->detail}}"
                placeholder="Enter Detail" />
            </div>
            <div class="form-group">
            Created By :
                <input type="text" name="created_by" class="form-control" value="{{$roles->created_by}}"
                placeholder="Enter Created By" />
            </div>
            <div class="form-group">
            Updated By :
                <input type="text" name="updated_by" class="form-control" value="{{$roles->updated_by}}"
                placeholder="Enter Updated By" />
            </div>
            <div class="form-group">
                <input type="submit" class="btnbtn-primary" value="Edit"/>
            </button>
        
    </div>
</div>
@endsection