@extends('layout.master')

@section('header_kanan')
<a class="btn btn-warning btn-md float-right" href="{{route('sell_in')}}" role="button">Kembali</a>
@endsection


@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="callout callout-warning">
                    <h5><i class="fas fa-info"></i> Note:</h5>
                    Untuk mengetahui detail tiap item, silahkan klik kolom item yang diinginkan.
                </div>


                <!-- Main content -->
                <div class="invoice p-3 mb-3">
                    <!-- Table row -->
                    <div class="row">
                        <div class="col-12 table-responsive">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <!-- <th>TANGGAL</th> -->
                                        <th>TANGGAL</th>
                                        <th>DEST SALDOMOBO ID</th>
                                        <th>DEST CLUSTER</th>
                                        <th>PRODUK NAME</th>
                                        <th>QTY</th>
                                        <th>PRODUK</th>
                                        <th>ACTON</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data_sellin as $item)
                                    <tr>

                                        <td>{{ Str::limit($item->transaction_datetimes, 11) }}</td>
                                        <td>{{$item->dest_saldomobo_id}}</td>
                                        <td>{{$item->dest_cluster}}</td>
                                        <td>{{$item->produk_name}}</td>
                                        <td>{{$item->qty}}</td>
                                        <?php 
                                       $produk = $item->produk_name;
                                    ?>


                                        @if ($produk=="SP DAT 16GB EJBN LTE"||$produk=="SP DAT 2GB EJBN
                                        LTE"||$produk=="SP
                                        DAT 8GB EJBN LTE")
                                        <td>SP ORI</td>

                                        @elseif ($produk=="SP IM3 90D LTE (QN)")

                                        <td>SP REG</td>
                                        @else

                                        <td>VOU ORI</td>

                                        @endif
                                        <td>
                                            <span class="badge bg-success"><a
                                                    href="{{route('detail.item.sell_in',[$item->id])}}"
                                                    class="text-dark">Detail<i class="far fa-eye"></i></a></span>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.invoice -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->


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


<!-- js dari data table -->
<script>
$('#example2').DataTable({
    "paging": true,
    "lengthChange": false,
    "searching": false,
    "ordering": true,
    "info": true,
    "autoWidth": false,
    "responsive": true,
});
</script> @endsection