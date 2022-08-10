@extends('layout.master')


@section('content')

<!-- Daftar Seluruh Kelompok -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="callout callout-warning col-4 mr-5">
                <div class="col-12">
                    <form action="{{route('filter')}}" method="get">
                        <select class="form-control text-darker pl-2" id="select" name="select">
                            <option value="" disabled selected>Select REGION</option>
                            <option value="area">AREA</option>
                            <option value="sales_area">SALES AREA</option>
                            <option value="cluster">CLUSTER</option>
                            <option value="micro_cluster">MICRO CLUSTER</option>
                        </select>
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
                        <th id="thboard" rowspan="4">Tanggal</th>
                        <th id="thboard1" rowspan="4">CLUSTER</th>
                        <th id="thboard" colspan="14">Distribusi SP 0K , 3GB, 9GB
                        </th>
                    </tr>
                    <tr id="trboard1">

                        <th id="thboard" colspan="7">#Outlet PJP Sell In </th>
                        <th id="thboard" colspan="4">Total SP ( QTY ) </th>

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
                        <th id="thboard" rowspan="2">#SP Ori MTD</th>
                        <th id="thboard" rowspan="2">#SP Reg MTD</th>
                        <th id="thboard" rowspan="2">#SP Ori LMTD</th>
                        <th id="thboard" rowspan="2">#SP Reg LMTD</th>
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
                <tbody id="sell_in">
                    @foreach($result as $item)
                    <tr id="trboard">
                        <td id="tdboard">{{$item['tanggal']}}</td>
                        <td id="tdboard1">{{$item['cluster']}}</td>
                        <td id="tdboard">{{$item['outlet']}}</td>
                        <td id="tdboard">{{$item['outlet_sp0k']}}</td>
                        <td id="tdboard">{{$item['ach_sp0k']}}</td>
                        <td id="tdboard">{{$item['outlet_sp3gb']}}</td>
                        <td id="tdboard">{{$item['ach_sp3gb']}}</td>
                        <td id="tdboard">{{$item['outlet_sp9gb']}}</td>
                        <td id="tdboard">{{$item['ach_sp9gb']}}</td>
                        <td id="tdboard">{{$item['spori_today']}}</td>
                        <td id="tdboard">{{$item['spreg_today']}}</td>
                        <td id="tdboard">{{$item['spori_last']}}</td>
                        <td id="tdboard">{{$item['spreg_last']}}</td>
                        <td id="tdboard">{{$item['spori_growth']}}</td>
                        <td id="tdboard">{{$item['spreg_growth']}}</td>
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

<script type="text/javascript">
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
    </script>

@endsection