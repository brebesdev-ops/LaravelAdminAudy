<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <button type="button" class="btn btn-secondary addrow">Add Row</button>

                <table class="tablemodal">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Name</th>
                            <th scope="col">Access Menu</th>
                            <th scope="col">Access Group</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="aso">
                            <th scope="row">1</th>
                            <td> <input type="text" name="name[]" class="form-control" placeholder="Name" aria-label="Username"
                                    aria-describedby="basic-addon1"></td>
                            <td><select class="form-control access_menus" id="access_menus">
                            @foreach($getmenu as $data)
                                    <option value="{{$data->id}}" data-url="{{route('edit.roles',$data->id)}}">{{$data->menu}}</option>
                            @endforeach
                                </select>
                                
                            </td>
                            <td> 
                            <select class="form-control access_group_create" id="access_group_create" name="access_groups[]" multiple="multiple" disabled>
                               
                            </select>
                            </td>
                            <td><button type="button" class="btn btn-danger delete-row">Delete</button>
                            </td>
                        </tr>

                    </tbody>
                </table>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
