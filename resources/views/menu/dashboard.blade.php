@extends('layout.master')


@section('content')

<!-- Daftar Seluruh Kelompok -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Dashboard</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead style=" width: 2px;">
                                <tr>
                                    <th rowspan="4" style="background-color: grey;"  class="text-center">CLUSTER</th>
                                    <th colspan="7" class="text-center"
                                        style="background-color: #665014; color: white;">Distribusi SP 0K , 3GB, 9GB
                                    </th>
                                </tr>
                                <tr>

                                    <th colspan="7" class="text-center" style="background-color: grey;">#Outlet PJP Sell
                                        In </th>
                                </tr>
                                <tr>
                                    <th rowspan="2" style="background-color: grey;">Outlet PJP</th>
                                    <th colspan="2" style="background-color: #28ab11;" class="text-center">SP 0K ( Min
                                        5Pcs )</th>
                                    <th colspan="2" style="background-color: yellow;" class="text-center">SP 3GB ( Min
                                        5Pcs )</th>
                                    <th colspan="2" style="background-color: grey;" class="text-center">SP 9GB ( 2Pcs )
                                    </th>
                                </tr>
                                <tr>
                                    <th style="background-color: #28ab11;">#Outlet</th>
                                    <th style="background-color: #28ab11;">%Ach</th>
                                    <th style="background-color: yellow;">#Outlet</th>
                                    <th style="background-color: yellow;">%Ach</th>
                                    <th style="background-color: grey;">#Outlet</th>
                                    <th style="background-color: grey;">%Ach</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $item)
                                <tr>
                                    <td>{{$item->initiator_cluster}}</td>
                                    <td>{{$item->outlet}}</td>
                                    <td>coba</td>
                                    <td>coba</td>
                                    <td>coba</td>
                                    <td>coba</td>
                                    <td>coba</td>
                                    <td>coba</td>
                                <tr>
                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
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
<script src="{{asset('public/asset/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- DataTables  & Plugins -->
<script src="{{asset('public/asset/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('public/asset/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('public/asset/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('public/asset/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('public/asset/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('public/asset/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('public/asset/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('public/asset/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('public/asset/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('public/asset/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('public/asset/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('public/asset/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js">
</script>
<!-- js dari data table -->
<script>
$('#example2').DataTable({
    "paging": true,
    "lengthChange": true,
    "searching": true,
    "ordering": true,
    "info": true,
    "autoWidth": true,
    "responsive": true,
    "buttons": ["csv", "excel", "pdf", "print"]
}).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
</script>

@endsection