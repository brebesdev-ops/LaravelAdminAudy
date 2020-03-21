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
    
    				<th>Actions</th>
    			</tr>
    		</thead>
    		<tbody>
            @foreach($roles as $key => $value)
    			<tr>
                <td>{{++$key}}</td>
    				<td>{{$value->roles_name}}</td>
                    <?php
                        $json = json_decode($value->menus);
                    ?>
                    <td>
                    @foreach($json as $konci => $menu)
                        <?php
                            $menus = DB::table('menus')->where('id',$konci)->first()->menu;
                        ?>
                        <span class="badge badge-primary">{{$menus}} : {{json_encode($menu)}}</span>
                    @endforeach
                    </td>
                    <td>
                    <button type="button" class="btn btn-primary">Edit</button>
                     <button type="button" class="btn btn-primary">delete</button>
                    </td>
    			</tr>
             @endforeach   
    		</tbody>
    	</table>
    </div>

@stop
@include('roles.modal')
@include('roles.additional')