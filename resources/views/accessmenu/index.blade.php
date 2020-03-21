@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
<h1>Menus </h1>
@stop

@section('content')

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
Add
</button>


<table class="table table-bordered" id="table_id">

    <thead>
        <tr>
            <th>No</th>
            <th>Access Menu</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($access as $key => $val)
        <tr>
            <td>{{++$key}}</td>
            <td>{{$val->access_menus}}</td>
            <td> 
            <button type="button" class="btn btn-primary edit"data-id="{{$val->id}}"data-name="{{$val->access_menus}}" >Edit</button>
            <button type="button" onclick="window.location.href='{{route('accessmenu.destroy',$val->id)}}'" class="btn btn-secondary">delete</button>
          </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>

@stop
@include('accessmenu.additional')
@include('accessmenu.modal')

