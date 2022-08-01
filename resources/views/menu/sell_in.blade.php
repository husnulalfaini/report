@extends('layout.master')


@section('content')

<!-- Daftar Seluruh Kelompok -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-2">
                        <input type="text" id="min" name="min" class="form-control form-control-sm" placeholder="Min"
                            required />
                    </div>
                    <div class="col-2">
                        <input type="text" id="max" name="max" class="form-control form-control-sm" placeholder="Max"
                            required />
                    </div>
                </div>
                <div class="card mt-5">
                    <div class="card-header">
                        <h3 class="card-title">Report Sell</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example" class="table table-bordered table-hover">
                            <thead >
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
                                <tr>

                                    <td>{{$item->transaction_datetimes}}</td>
                                    <td>{{$item->dest_saldomobo_id}}</td>
                                    <td>{{$item->dest_micro_cluster}}</td>
                                    <td>{{$item->dest_cluster}}</td>
                                    <td>{{$item->produk_name}}</td>
                                    <td>{{$item->qty}}</td>
                                    <?php 
                                       $produk = $item->produk_name;
                                    ?>


                                    @if ($produk=="SP DAT 16GB EJBN LTE"||$produk=="SP DAT 2GB EJBN LTE"||$produk=="SP
                                    DAT 8GB EJBN LTE")
                                    <td>SP ORI</td>

                                    @elseif ($produk=="SP IM3 90D LTE (QN)")

                                    <td>SP REG</td>
                                    @else

                                    <td>VOU ORI</td>

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




<script>
$('#example').DataTable({
    "paging": true,
    "lengthChange": true,
    "searching": true,
    "ordering": true,
    "info": true,
    "autoWidth": false,
    "responsive": false,
    "buttons": ["csv", "excel", "pdf", "print"]
}).buttons().container().appendTo('#example_wrapper .col-md-6:eq(0)');
</script>
@endsection