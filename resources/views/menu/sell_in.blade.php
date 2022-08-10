@extends('layout.master')


@section('content')

<!-- Daftar Seluruh Kelompok -->
<section class="content">
    <div class="container-fluid">
    <div class="callout callout-warning col-4 mr-5">
                <div class="col-12">
                    <form action="{{route('sell_in')}}" method="get">
                        <select class="form-control text-darker pl-2" id="select" name="tanggal">
                            <option value="" disabled selected>Pilih Tanggal</option>
                            @foreach ($tanggal as $val)
                                  <option value="{{$val->tanggal}}" @if($val->tanggal == $tahun) {{'selected="selected"'}} @endif >{{$val->tanggal}}</option>
                            @endforeach
                        </select>
                        <div class="col-xl-1 pt-3">
                  <button type="submit" class="btn btn-primary">Filter  </button>
                </div>
            </div>
                    </form>
                </div>
            </div>
        <div class="row">
            <div class="col-12">
                <div class="row">
                </div>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Report Sell</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <!-- <th>TANGGAL</th> -->
                                    <th>TANGGAL</th>
                                    <th>DEST SALDOMOBO ID</th>
                                    <th>DEST MIKRO CLUSTER</th>
                                    <th>DEST CLUSTER</th>
                                    <th>PRODUK NAME</th>
                                    <th>QTY</th>
                                    <th>PRODUK</th>
                                    <th>ACTON</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                <tr >

                                    <td>{{$item->transaction_datetimes}}</td>
                                    <td>{{$item->dest_saldomobo_id}}</td>
                                    <td>{{$item->dest_micro_cluster}}</td>
                                    <td>{{$item->dest_cluster}}</td>
                                    <td>{{$item->produk_name}}</td>
                                    <td>{{$item->qty}}</td>
                                    <?php 
                                       $produk = $item->produk_name;
                                    ?>

                                    @if ($produk=="SP DAT 16GB EJBN LTE"||$produk=="SP DAT 2GB EJBN LTE"||$produk=="SP DAT 8GB EJBN LTE"||$produk=="SP DATA 3GB EJBN"||$produk=="SP DATA 9GB EJBN" || $produk=="SP DATA 9GB EJBN N")
                                    <td>SP ORI</td>

                                    @elseif ($produk=="SP IM3 90D LTE (QN)" || $produk=="SP IM3 90D LTE (N)")

                                    <td>SP REG</td>
                                    @elseif ($produk=="VOU FU 20GB/30hr Jatim Madura" || $produk=="VORI FI 2GB/3GB 30D JATIM"|| $produk=="VOUCORI FI2.5GB/5D EJBN"|| $produk=="VORI FU 3GB JATIM"|| $produk=="VOU FI3GB/30hr Jatim Madura"|| $produk=="VOU FI Sachet 2.5GB EJBN"|| $produk=="VOU FI3GB/30hr Balnus"|| $produk=="VORI FI 2GB/3GB 30D BALINUSRA"|| $produk=="FI Sachet 2.5GB EJBN"|| $produk=="FI3GB/30hr Jatim,Madura"|| $produk=="FU 20GB/30hr Jatim,Madura"|| $produk=="FI3GB/30hr Balnus"|| $produk=="FI3GB/30hr Jatim_New"|| $produk=="FI3GB/30hr Balnus_New")

                                    <td>VOU ORI</td>
                                    @else

                                    <td>0</td>

                                    @endif
                                    <td>
                                        <span class="badge bg-success"><a
                                                href="{{route('detail.sell_in',[$item->dest_saldomobo_id])}}"
                                                class="text-dark">Detail<i class="far fa-eye"></i></a></span>
                                    </td>
                                </tr>
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


<!-- jQuery -->
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



<script>
$('#example').DataTable({
    "paging": true,
    "lengthChange": true,
    "searching": true,
    "ordering": true,
    "info": true,
    "autoWidth": true,
    "responsive": true,
    "buttons": ["csv", "excel", "pdf", "print"]
}).buttons().container().appendTo('#example_wrapper .col-md-6:eq(0)');
</script>
@endsection