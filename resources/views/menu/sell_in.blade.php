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

                                    <td>{{$item->created_at}}</td>
                                    <td>{{$item->dest_saldomobo_id}}</td>
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
<!-- Bootstrap 4 -->
<script src="{{asset('public/asset/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>
<script src="https://cdn.datatables.net/datetime/1.1.2/js/dataTables.dateTime.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>






<script>
$(document).ready(function() {
    $('#example').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
});
var minDate, maxDate;

// Custom filtering function which will search data in column four between two values
$.fn.dataTable.ext.search.push(
    function(settings, data, dataIndex) {
        var min = minDate.val();
        var max = maxDate.val();
        var date = new Date(data[0]);

        if (
            (min === null && max === null) ||
            (min === null && date <= max) ||
            (min <= date && max === null) ||
            (min <= date && date <= max)
        ) {
            return true;
        }
        return false;
    }
);

$(document).ready(function() {
    // Create date inputs
    minDate = new DateTime($('#min'), {
        format: 'YYYY-MM-DD'
    });
    maxDate = new DateTime($('#max'), {
        format: 'YYYY-MM-DD'
    });

    // DataTables initialisation
    var table = $('#example').DataTable();

    // Refilter the table
    $('#min, #max').on('change', function() {
        table.draw();
    });
});
</script>

@endsection