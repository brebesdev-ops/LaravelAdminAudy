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
    				<th>Menu</th>
    				<th>Access Menu</th>
    				<th>Submenu</th>
    				<th>child for</th>
    				<th>Actions</th>
    			</tr>
    		</thead>
    		<tbody>
            @foreach($data as $key => $value)
    			<tr>
    				<td>{{++$key}}</td>
    				<td>{{$value->menu}}</td>
                    @if($value->access_menus)
    				<td><span class="badge badge-danger">  {{$value->access_menus}}</span></td>
                    @else
    				<td></td>
                    @endif
    				<td>{{$value->sub_menu}}</td>
                    @if($value->child)
                    <?php
                        $datas = DB::table('menus')->where('id',$value->child)->first()->menu;
                    ?>
    				<td>
                    <span class="badge badge-primary"> {{$datas}}</span>
                    </td>
                    @else
    				<td><span class="badge badge-danger"> No Have CHild</span></td>
                    
                    @endif
    				<td>
                    <button type="button" class="btn btn-primary">Edit</button>
                <button type="button" class="btn btn-secondary">delete</button>

                    </td>

    			</tr>
             @endforeach   
    		</tbody>
    	</table>
    </div>

@stop
@include('mastermenus.additional')
@include('mastermenus.modal')
