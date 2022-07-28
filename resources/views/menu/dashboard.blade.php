@extends('layout.master')


@section('content')

<!-- Daftar Seluruh Kelompok -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="callout callout-warning col-4 mr-5">
                <div class="col-12">
                    <form action="{{route('filter')}}" method="get">
                        <select class="form-control text-darker pl-2" name="select">
                            <option value="" disabled selected>Select REGION</option>
                            <option value="area">AREA</option>
                            <option value="sales_area">SALES AREA</option>
                            <option value="cluster">CLUSTER</option>
                            <option value="micro_cluster">MICRO CLUSTER</option>
                        </select>
                        <div class="col-xl-1 pt-2">
                            <button type="submit" class="btn btn-primary">Filter </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="callout callout-warning col-7">
                <div class="col-12">
                    <div class="row">
                        <div class="col-6">
                            <input type="text" id="min" name="min" class="form-control form-control-sm"
                                placeholder="Min" required />
                        </div>
                        <div class="col-6">
                            <input type="text" id="max" name="max" class="form-control form-control-sm"
                                placeholder="Max" required />
                        </div>
                    </div>
                    <div class="col-xl-1 pt-2">
                            <button type="submit" class="btn btn-primary">Filter </button>
                        </div>
                </div>
            </div>

            <table id="tableboard" class="col-12">
                <thead id="theadboard">
                    <tr id="trboard">
                        <th id="thboard" rowspan="4">Tanggal</th>
                        <th id="thboard1" rowspan="4">CLUSTER</th>
                        <th id="thboard" colspan="12">Distribusi SP 0K , 3GB, 9GB
                        </th>
                    </tr>
                    <tr id="trboard1">

                        <th id="thboard" colspan="7">#Outlet PJP Sell In </th>
                        <th id="thboard" colspan="3">Total SP ( QTY ) </th>

                        <th id="thboard" colspan="2">Growth QTY (LMTD-MTD) </th>
                    </tr>
                    <tr id="trboard">
                        <th id="thboard" rowspan="2">Outlet PJP</th>
                        <th id="thboard" colspan="2">SP 0K (
                            5Pcs )</th>
                        <th id="thboard" colspan="2">SP 3GB (
                            5Pcs )</th>
                        <th id="thboard" colspan="2">SP 9GB ( 2Pcs )
                        </th>
                        <th id="thboard" rowspan="2">#SP Ori</th>
                        <th id="thboard" rowspan="2">#SP Reg</th>
                        <th id="thboard" rowspan="2">#SP Ori</th>
                        <th id="thboard" rowspan="2">SP Reguler</th>
                        <th id="thboard" rowspan="2">SP Ori</th>
                    </tr id="trboard">
                    <tr>
                        <th id="thboard">#Outlet</th>
                        <th id="thboard">%Ach</th>
                        <th id="thboard">#Outlet</th>
                        <th id="thboard">%Ach</th>
                        <th id="thboard">#Outlet</th>
                        <th id="thboard">%Ach</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $item)
                    <tr id="trboard">
                        <td id="tdboard">{{Str::limit($item->transaction_datetimes, 11)}}</td>
                        <td id="tdboard1">{{$item->dest_region}}</td>
                        <td id="tdboard">{{$item->outlet}}</td>
                        <td id="tdboard">jumlah outlet</td>
                        <td id="tdboard">Hasil Ach</td>
                        <td id="tdboard">jumlah outlet</td>
                        <td id="tdboard">Hasil Ach</td>
                        <td id="tdboard">jumlah outlet</td>
                        <td id="tdboard">Hasil Ach</td>
                        <td id="tdboard">SP Ori</td>
                        <td id="tdboard">SP Reg</td>
                        <td id="tdboard">SP Ori</td>
                        <td id="tdboard">SP Reg</td>
                        <td id="tdboard">SP Ori</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

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
<script src="{{asset('public/asset/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>
<script src="https://cdn.datatables.net/datetime/1.1.2/js/dataTables.dateTime.min.js"></script>






<script>
$(document).ready(function() {
    $('#example').DataTable();
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
<script type="text/javascript">
        $(document).ready(function(){
            $('#merks').on('change', function(e){
                var id = e.target.value;
                $.get('{{ url('merk')}}/'+id, function(data){
                    console.log(id);
                    console.log(data);
                    $('#motors').empty();
                    $.each(data, function(index, element){
                        $('#motors').append("<tr><td>"+element.id_motor+"</td><td>"+element.id_merk+"</td>"+
                        "<td>"+element.nama_motor+"</td></tr>");
                    });
                });
            });
        });
    </script>

@endsection