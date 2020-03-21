@section('adminlte_js')
    <script>
    $(document).ready(function (params) {
        $('.access_group_create').select2();
      
            $('.access_menus').change(function () {
            $('.access_group_create').prop("disabled", false)
            var data = []
            $.get($(this).find(':selected').attr('data-url'), function(data, status){
                $('.access_group_create').select2({
                    data : data
                });
            });
   
        });
        $('.addrow').click(function (params) {
        var myvar = '<tr class="aso">'+
                    '                            <th scope="row">1</th>'+
                    '                            <td> <input type="text" class="form-control" name="name[]"placeholder="Name" aria-label="Username"'+
                    '                                    aria-describedby="basic-addon1"></td>'+
                    '                            <td><select class="form-control access_menus">'+
                    '                            @foreach($getmenu as $data)'+
                    '                                    <option value="{{$data->id}}" data-url="{{route('edit.roles',$data->id)}}">{{$data->menu}}</option>'+
                    '                            @endforeach'+
                    '                                </select>'+
                    '                                '+
                    '                            </td>'+
                    '                            <td> '+
                    '                            <select class="form-control access_group_create"  name="access_groups[]" multiple="multiple" disabled>'+
                    '                               '+
                    '                            </select>'+
                    '                            </td>'+
                    '                            <td><button type="button"  class="btn btn-danger delete-row">Delete</button>'+
                    '                            </td>'+
                    '                        </tr>';
                        
                   var  tableBody = $(".tablemodal tbody").append(myvar) 
                   $('.access_group_create').select2();
        });
        $(".delete-row").click(function(){
           $(this).parents("tr").remove();  
        });
    })

    </script>

@stop