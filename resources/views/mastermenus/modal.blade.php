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
            <form id="create">
            <div class="modal-body">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Name menu</label>
                        <input type="text" name="menu" class="form-control" id="inputEmail4" placeholder="menu">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">access menu</label>
                        <select class="js-example-basic-multiple form-control" name="accessmenu[]" multiple="multiple">
                            @foreach($accessgroup as $value)
                            <option value="{{$value->access_menus}}">{{$value->access_menus}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputAddress">submenu</label>
                    <select id="submenu" name="sub_menu" class="form-control">
                        <option value="true">True</option>
                        <option value="false">False</option>
                    </select> </div>
                <div class="form-group">
                    <label for="inputAddress">Url</label>
                    <input type="text" name="url" class="form-control" id="inputAddress" placeholder="url">
                </div>
                <div class="form-group" id="hiddenchild">
                    <label for="inputAddress2">Child For</label>
                    <?php
                        $data = DB::table('menus')->where('sub_menu',"true")->get();
                        ?>
                    <select class="form-control"name="child" id="exampleFormControlSelect1">
                        @foreach($data as $key => $value)
                        <option value="{{$value->id}}">{{$value->menu}}</option>
                        @endforeach

                    </select>
                </div>
</form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary save">Save changes</button>
            </div>
        </div>
    </div>
</div>
