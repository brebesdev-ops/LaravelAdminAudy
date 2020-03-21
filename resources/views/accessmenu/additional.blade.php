
    @section('adminlte_js')
    <script>
        $(document).ready(function(params) {
            $("#table_id").DataTable();

            $('.save').click(function (params) {
                $.ajax({
               type:'POST',
               url:'{{route('accessmenu')}}',
               data: {
                "_token": "{{ csrf_token() }}",
                "accessmenu" : $('#accessmenu').val()
               },
               success:function(data) {
                    $('#exampleModal').modal('hide')
                    location.reload();
               }
            }); 
            });
           $('.edit').click(function () {
               var name = $(this).data('name')
               $('#update').modal('show');
               $('.updates').data('id',$(this).data('id'))
               $('#updatemenus').val(name)
           });    
        $('.updates').click(function () {
            $.ajax({
               type:'POST',
               url:'{{route('accessmenu.getedit')}}',
               data: {
                "_token": "{{ csrf_token() }}",
                "accessmenu" : $('#updatemenus').val(),
                "id" : $(this).data('id'),
               },
               success:function(data) {
                    $('#update').modal('hide')
                    // location.reload();
               }
            });   
        });

           
        });

    </script>
@stop