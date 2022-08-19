@extends('layout.master')


@section('content')

<!-- Daftar Seluruh Kelompok -->
<section class="content">
    <div class="container-fluid">
        <div class="row">

        <div class="callout callout-warning col-4 mr-5">
                <div class="col-12">
                    <form action="{{route('dashboard')}}" method="get">
                        <select class="form-control text-darker pl-2" id="select" name="select">
                            <option value="region">Select REGION</option>
                            <option value="area">AREA</option>
                            <option value="sales_area">SALES AREA</option>
                            <option value="cluster">CLUSTER</option>
                            <option value="micro_cluster">MICRO CLUSTER</option>
                        </select>
                        <div class="col-xl-1 pt-3">
                                            <button type="submit" class="btn btn-primary">Filter  </button>
                                        </div>
                    </form>
                </div>
            </div>
            <div class="callout callout-warning col-4">
                <div class="col-12">
                    <div class="row">
                        <div class="col-6">
                            <form action="{{route('dashboard')}}" method="get">
                                    <input type="text" name="datepicker" id="datepicker" value="Date" class="form-control form-control-sm"
                                        placeholder="Pilih Bulan" required />
                                        <div class="col-xl-1 pt-3">
                                            <button type="submit" class="btn btn-primary">Filter  </button>
                                        </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
<table id="tableboard" class="col-12">
                <thead id="theadboard">
                    <tr id="trboard">
                        <th id="thboard" rowspan="3">Tanggal</th>
                        <th id="thboard1" rowspan="3">CLUSTER</th>
                        <th id="thboard" colspan="5">SP</th>
                        <th id="thboard" colspan="3">Voucher</th>
                        <th id="thboard1" rowspan="3">ACTION</th>
                    </tr>
                    <tr id="trboard1">

                        <th id="thboard" colspan="3">#Outlet </th>

                        <th id="thboard" colspan="2">Growth QTY (LMTD-MTD) </th>
                        <th id="thboard" colspan="2">#Outlet </th>
                        <th id="thboard" rowspan="2">%Growth </th>
                    </tr>
                    <tr id="trboard">
                        <th id="thboard" colspan="1">SP 0K (
                            5Pcs )</th>
                        <th id="thboard" colspan="1">SP 3GB (
                            5Pcs )</th>
                        <th id="thboard" colspan="1">SP 9GB ( 2Pcs )
                        </th>
                        <th id="thboard" rowspan="1">SP Reguler</th>
                        <th id="thboard" rowspan="1">SP Ori</th>
                        <th id="thboard" rowspan="1">FI 3GB (10Pcs)</th>
                        <th id="thboard" rowspan="1">FI 2.5GB  (5Pcs)</th>
                    </tr>
                    
                </thead>
                <tbody id="sell_in">
                    @foreach($result as $item)
                    <tr id="trboard">
                        <td id="tdboard">{{$item['tanggal']}}</td>
                        <td id="tdboard1">{{$item['cluster']}}</td>
                        <td id="tdboard">{{$item['ach_sp0k']}}%</td>
                        <td id="tdboard">{{$item['ach_sp3gb']}}%</td>
                        <td id="tdboard">{{$item['ach_sp9gb']}}%</td>
                        <td id="tdboard">{{$item['spori_growth']}}%</td>
                        <td id="tdboard">{{$item['spreg_growth']}}%</td>
                        <td id="tdboard">{{$item['ach_fi3gb']}}%</td>
                        <td id="tdboard">{{$item['ach_fi25gb']}}%</td>
                        <td id="tdboard">{{$item['vou_growth']}}%</td>
                        <td>
                                        <span class="badge bg-success"><a
                                                href="{{route('detail.summary',[$item['cluster']])}}"
                                                class="text-dark">Detail<i class="far fa-eye"></i></a></span>
                                    </td>
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

@endsection