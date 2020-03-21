
    @section('adminlte_js')
    <script>
        $(document).ready(function(params) {
            $("#table_id").DataTable();
            $('.js-example-basic-multiple').select2();
            $('#hiddenchild').hide();
            $('#submenu').change(function() {
                if($(this).val() == "false"){
                    $('#hiddenchild').show();
                }else{
                    $('#hiddenchild').hide();
                }
            });
           $('.save').click(function () {
           var serializeArray = $('#create').serializeArray();
           $.ajax({
               type:'POST',
               url:'{{route('menu.store')}}',
               data: {
                "_token": "{{ csrf_token() }}",
                "data" : serializeArray,
               },
               success:function(data) {
                    $('#exampleModal').modal('hide')
                    // location.reload();
               }
            });   
           });
        });

    </script>
@stop