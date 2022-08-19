@extends('layout.master')


@section('content')

<!-- Daftar Seluruh Kelompok -->
<section class="content">
    <div class="container-fluid">
        <div class="row">

            @yield('content_dashboard')


            <!-- /.card-body -->

            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
    <!-- /.container-fluid -->
</section>
<!-- END Daftar Seluruh Kelompok -->


<script src="{{asset('public/asset/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<!-- <script src="{{asset('public/asset/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>
<script src="https://cdn.datatables.net/datetime/1.1.2/js/dataTables.dateTime.min.js"></script> -->






<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="https://netdna.bootstrapcdn.com/bootstrap/2.3.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.min.js"></script>
<script>
var dp=$("#datepicker").datepicker( {
    format: "mm-yyyy",
    startView: "months", 
    minViewMode: "months"
});

   $("#submitMe").click(function() {
       $.ajax({
          type: 'POST',
          url: "/index/getDate",
          method: "POST",
          data: $('#myform').serialize(),
          success: function(data) {
             console.log(data);
             $('#dateSelected').text(data);
          }
       });
       return false;
    })
</script>

<!-- <script type="text/javascript">
        $(document).ready(function(){
            $('#select').on('change', function(e){
                var id = e.target.value;
                $.get('http://localhost/report/filter?select='+id, function(data){
                    console.log(id);
                    console.log(data);
                    $('#sell_in').empty();
                    $.each(data, function(index, element){
                        console.log(element)
                        if(id == 'area'){
                            $('#sell_in').append("<tr ><td>"+element.transaction_datetimes+"</td><td>"+element.dest_area+"</td><td>"+element.outlet+"</td></tr>");
                        }
                        else if(id == 'sales_area'){
                            $('#sell_in').append("<tr><td>"+element.transaction_datetimes+"</td><td>"+element.dest_sales_area+"</td><td>"+element.outlet+"</td></tr>");
                        }
                        else if(id == 'cluster'){
                            $('#sell_in').append("<tr><td>"+element.transaction_datetimes+"</td><td>"+element.dest_cluster+"</td><td>"+element.outlet+"</td></tr>");
                        }
                        else if(id == 'micro_cluster'){
                            $('#sell_in').append("<tr><td>"+element.transaction_datetimes+"</td><td>"+element.dest_micro_cluster+"</td><td>"+element.outlet+"</td></tr>");
                        }
                        else{
                            $('#sell_in').append("<tr><td>"+element.transaction_datetimes+"</td><td>"+element.region+"</td><td>"+element.outlet+"</td></tr>");
                        }
                    });
                });
            });
        });
    </script> -->

@endsection