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

                        
<script>
    var minDate, maxDate;
 
 // Custom filtering function which will search data in column four between two values
 $.fn.dataTable.ext.search.push(
     function( settings, data, dataIndex ) {
         var min = minDate.val();
         var max = maxDate.val();
         var date = new Date( data[4] );
  
         if (
             ( min === null && max === null ) ||
             ( min === null && date <= max ) ||
             ( min <= date   && max === null ) ||
             ( min <= date   && date <= max )
         ) {
             return true;
         }
         return false;
     }
 );
  
 $(document).ready(function() {
     // Create date inputs
     minDate = new DateTime($('#min'), {
         format: 'MMMM Do YYYY'
     });
     maxDate = new DateTime($('#max'), {
         format: 'MMMM Do YYYY'
     });
  
     // DataTables initialisation
     var table = $('#example').DataTable();
  
     // Refilter the table
     $('#min, #max').on('change', function () {
         table.draw();
     });
 });
 



</script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>
<script src="https://cdn.datatables.net/datetime/1.1.2/js/dataTables.dateTime.min.js"></script>


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

{{ Str::limit($item->transaction_datetimes, 11) }}

                                    <!-- @foreach ($tanggal as $val)
                                    <option value="{{$val->year}}" @if($val->year == $tahun)
                                        {{'selected="selected"'}} @endif >{{$val->year}}</option>
                                    @endforeach

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


@extends('layout.master')


@section('content')

<!-- Daftar Seluruh Kelompok -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="row">
                </div>
                <div class="card mt-5">
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
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>#transaction_datetimes</td>
                                    <td>#dest_saldomobo_id</td>
                                    <td>#dest_micro_cluster</td>
                                    <td>#dest_cluster</td>
                                    <td>#produk_name</td>
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


<!-- <script src="{{asset('public/asset/plugins/jquery/jquery.min.js')}}"></script> -->


<!-- jQuery -->
<!-- <script src="{{asset('public/asset/plugins/jquery/jquery.min.js')}}"></script> -->
<!-- Bootstrap 4 -->
<!-- <script src="{{asset('public/asset/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script> -->
<!-- DataTables  & Plugins -->
<!-- <script src="{{asset('public/asset/plugins/datatables/jquery.dataTables.min.js')}}"></script>
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
<script src="{{asset('public/asset/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script> -->

<!-- jQuery CDN -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Datatables JS CDN -->
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<!-- 
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
</script> -->

<!-- Script -->
<script type="text/javascript">
    $(document).ready(function(){

      // DataTable
      $('#example').DataTable({
         processing: true,
         serverSide: true,
         ajax: "{{route('getsell_in')}}",
         columns: [
            { data: 'transaction_datetimes' },
            { data: 'dest_saldomobo_id' },
            { data: 'dest_micro_cluster' },
            { data: 'dest_cluster' },
            { data: 'produk_name' },
         ]
      });

    });
    </script>
@endsection

<tbody id="sell_in">
                    @foreach($data as $item)
                    <tr id="trboard">
                        
                        <td id="tdboard">{{$item->tanggal}}</td>
                        <td id="tdboard1" >{{$item->region}}</td>
                        <td id="tdboard">{{$item->outlet}}</td>
                        @endforeach

                        @foreach($data_sp0k as $sp0k)
                        <td id="tdboard">{{$sp0k->sp0k}}</td>
                        <td id="tdboard">Hasil Ach</td>
                        @endforeach
                        @foreach($data_sp3gb as $sp3gb)
                        <td id="tdboard">{{$sp3gb->sp3gb}}</td>
                        <td id="tdboard">Hasil Ach</td>
                        @endforeach

                        @foreach($data_sp9gb as $sp9gb)
                        <td id="tdboard">{{$sp9gb->sp9gb}}</td>
                        <td id="tdboard">Hasil Ach</td>
                        @endforeach

                        @foreach($data_spori as $spori)
                        <td id="tdboard">{{$spori->spori}}</td>
                        @endforeach

                        @foreach ($data_spreg as $spreg)
                        <td id="tdboard">{{$spreg->spreg}}</td>
                        @endforeach

                        @foreach($data_spori as $spori)
                        <td id="tdboard">{{$spori->spori}}</td>
                        @endforeach

                        @foreach ($data_spreg as $spreg)
                        <td id="tdboard">{{$spreg->spreg}}</td>
                        @endforeach

                        <td id="tdboard">SP Reg</td>
                        <td id="tdboard">SP Ori</td>
                    </tr>
                </tbody>


<tbody id="sell_in">
                    @foreach($data as $item)
                    <tr id="trboard">
                        
                        <td id="tdboard">{{$item->tanggal}}</td>
                        <td id="tdboard1" >{{$item->region}}</td>
                        <td id="tdboard">{{$item->outlet}}</td>
                        <td id="tdboard">coba</td>
                        <td id="tdboard">Hasil Ach</td>
                        <td id="tdboard">coba</td>
                        <td id="tdboard">Hasil Ach</td>
                        <td id="tdboard">coba</td>
                        <td id="tdboard">Hasil Ach</td>
                        <td id="tdboard">coba</td>
                        <td id="tdboard">coba</td>
                        <td id="tdboard">coba</td>
                        <td id="tdboard">coba</td>
                        <td id="tdboard">SP Reg</td>
                        <td id="tdboard">SP Ori</td>
                    </tr>
                    @endforeach
</tbody>



<!-- if else dashboard -->
if($request->select=="micro_cluster"){
        
        if($request->input ('datepicker') == null){
            $tanggal  = Date("Y-m-d",strtotime('now'));
        }
        else {

            $tanggal = '01-'.$request->datepicker;
        }

        $awalbulanini= date('Y-m-d',strtotime("first day of " . $tanggal));
        $akhirbulanini= date('Y-m-d',strtotime("last day of " . $tanggal));
        $bulankemarin= date('Y-m-d',strtotime($awalbulanini. " -1 month"));

        // Menampilkan jumlah outlet pjp
        $data= DB::table('sell_ins')
        ->select('transaction_datetimes as tanggal','dest_micro_cluster as micro_cluster')
        ->where('transaction_datetimes','>=', $awalbulanini)
        ->where('transaction_datetimes','<=', $akhirbulanini)
        ->whereIn('dest_saldomobo_id', function($query)
        {
            $query->select('id_outlet')
            ->from('outletpjps')
            ->whereRaw('outletpjps.id_outlet = sell_ins.dest_saldomobo_id');
        })
        ->GroupBy('dest_micro_cluster','transaction_datetimes')
        ->get();
        
        // dd($data);

        
        $result= [];
        foreach ($data as $key => $value) {
            
            $outlet_pjp= SellIn::where('transaction_datetimes',$value->tanggal)->where('dest_micro_cluster',$value->micro_cluster)->whereIn('dest_saldomobo_id', function($query)
            {
                $query->select('id_outlet')
                    ->from('outletpjps')
                    ->whereRaw('outletpjps.id_outlet = sell_ins.dest_saldomobo_id');
            })
            ->get()
            ->count();

            $outlet_sp0k =  SellIn::where('transaction_datetimes',$value->tanggal)
            ->where('dest_micro_cluster',$value->micro_cluster)
            ->where('produk_name', "SP IM3 90D LTE (QN)")
            ->where('qty','>', 4)
            ->whereIn('dest_saldomobo_id', function($query)
            {
                $query->select('id_outlet')
                    ->from('outletpjps')
                    ->whereRaw('outletpjps.id_outlet = sell_ins.dest_saldomobo_id');
            })
            ->get()
            ->count();

        
            $outlet_sp0k =  SellIn::where('transaction_datetimes',$value->tanggal)
            ->where('dest_micro_cluster',$value->micro_cluster)
            ->where('produk_name', "SP IM3 90D LTE (QN)")
            ->where('qty','>', 4)
            ->whereIn('dest_saldomobo_id', function($query)
            {
                $query->select('id_outlet')
                    ->from('outletpjps')
                    ->whereRaw('outletpjps.id_outlet = sell_ins.dest_saldomobo_id');
            })
            ->get()
            ->count();


            $outlet_sp3gb =  SellIn::where('transaction_datetimes',$value->tanggal)
            ->where('dest_micro_cluster',$value->micro_cluster)
            ->where('produk_name', "SP DATA 3GB EJBN")
            ->where('qty','>', 4)
            ->whereIn('dest_saldomobo_id', function($query)
            {
                $query->select('id_outlet')
                    ->from('outletpjps')
                    ->whereRaw('outletpjps.id_outlet = sell_ins.dest_saldomobo_id');
            })
            ->get()
            ->count();


            $outlet_sp9gb =  SellIn::where('transaction_datetimes',$value->tanggal)
            ->where('dest_micro_cluster',$value->micro_cluster)
            ->where('produk_name', "SP DATA 9GB EJBN")
            ->where('qty','>', 1)
            ->whereIn('dest_saldomobo_id', function($query)
            {
                $query->select('id_outlet')
                    ->from('outletpjps')
                    ->whereRaw('outletpjps.id_outlet = sell_ins.dest_saldomobo_id');
            })
            ->get()
            ->count();

            $outlet_sp9gb =  SellIn::where('transaction_datetimes',$value->tanggal)
            ->where('dest_micro_cluster',$value->micro_cluster)
            ->where('produk_name', "SP DATA 9GB EJBN")
            ->where('qty','>', 1)
            ->whereIn('dest_saldomobo_id', function($query)
            {
                $query->select('id_outlet')
                    ->from('outletpjps')
                    ->whereRaw('outletpjps.id_outlet = sell_ins.dest_saldomobo_id');
            })
            ->get()
            ->count();

            $spreg_today =  SellIn::where('transaction_datetimes',$value->tanggal)
            ->where('dest_micro_cluster',$value->micro_cluster)
            ->where('produk_name', "SP IM3 90D LTE (QN)")
            ->where('transaction_datetimes','>=', $awalbulanini)
            ->sum('qty')
            ;


            $spori_today =  SellIn::where('transaction_datetimes',$value->tanggal)
            ->where('dest_micro_cluster',$value->micro_cluster)
            ->where('transaction_datetimes','>=', $awalbulanini)
            ->where(function($query)
                {
                    $query->where('produk_name', "SP DAT 16GB EJBN LTE")
                    ->orWhere('produk_name',  "SP DAT 2GB EJBN LTE")
                    ->orWhere('produk_name',  "SP DAT 2GB EJBN LTE")
                    ->orWhere('produk_name',  "SP DAT 8GB EJBN LTE") 
                    ->orWhere('produk_name', "SP DATA 3GB EJBN") 
                    ->orWhere('produk_name', "SP DAT 9GB EJBN");
                })
            ->sum('qty');


            // $spreg_last =  SellIn::where('transaction_datetimes',$value->tanggal)
            $spreg_last =  SellIn::where('dest_micro_cluster',$value->micro_cluster)
            ->where('produk_name', "SP IM3 90D LTE (QN)")
            ->where('transaction_datetimes','>=', $bulankemarin)
            ->where('transaction_datetimes','<', $awalbulanini)
            ->sum('qty');


            // $spori_last =  SellIn::where('transaction_datetimes',$value->tanggal)
            $spori_last =  SellIn::where('dest_micro_cluster',$value->micro_cluster)
            ->where('transaction_datetimes','>=', $bulankemarin)
            ->where('transaction_datetimes','<', $awalbulanini)
            ->where(function($query)
                {
                    $query->where('produk_name', "SP DAT 16GB EJBN LTE")
                    ->orWhere('produk_name',  "SP DAT 2GB EJBN LTE")
                    ->orWhere('produk_name',  "SP DAT 2GB EJBN LTE")
                    ->orWhere('produk_name',  "SP DAT 8GB EJBN LTE") 
                    ->orWhere('produk_name', "SP DATA 3GB EJBN") 
                    ->orWhere('produk_name', "SP DAT 9GB EJBN");
                })
            ->sum('qty');
            
            $result[]=[
                'tanggal'=>$value->tanggal,
                'cluster'=>$value->cluster,
                'outlet'=>$outlet_pjp,
                'outlet_sp0k'=>$outlet_sp0k,
                'ach_sp0k'=>$outlet_sp0k/$outlet_pjp,
                'outlet_sp3gb'=>$outlet_sp3gb,
                'ach_sp3gb'=>$outlet_sp3gb/$outlet_pjp,
                'outlet_sp9gb'=>$outlet_sp9gb,
                'ach_sp9gb'=>$outlet_sp9gb/$outlet_pjp,
                'spori_today'=>$spori_today,
                'spreg_today'=>$spreg_today,
                'spori_last'=>$spori_last,
                'spreg_last'=>$spreg_last,
                'spori_growth'=>$spori_today==0||$spori_last==0?0:$spori_today/$spori_last-1,
                'spreg_growth'=>$spreg_today==0||$spreg_last==0?0:$spreg_today/$spreg_last-1,
        
        ];
    }

        return view('menu.dashboard.micro_cluster');
        // return view('menu.dashboard',compact('data', 'data_sp0k','data_sp3gb','data_sp9gb','data_spreg','data_spori'));
        
    } elseif ($request->select=="sales_area") {

        if($request->input ('datepicker') == null){
            $tanggal  = Date("Y-m-d",strtotime('now'));
        }
        else {

            $tanggal = '01-'.$request->datepicker;
        }

        $awalbulanini= date('Y-m-d',strtotime("first day of " . $tanggal));
        $akhirbulanini= date('Y-m-d',strtotime("last day of " . $tanggal));
        $bulankemarin= date('Y-m-d',strtotime($awalbulanini. " -1 month"));
                    // Menampilkan jumlah outlet pjp
        $data= DB::table('sell_ins')
        ->select('transaction_datetimes as tanggal','dest_sales_area as sales_area')
        ->where('transaction_datetimes','>=', $awalbulanini)
        ->where('transaction_datetimes','<=', $akhirbulanini)
        ->whereIn('dest_saldomobo_id', function($query)
        {
            $query->select('id_outlet')
            ->from('outletpjps')
            ->whereRaw('outletpjps.id_outlet = sell_ins.dest_saldomobo_id');
        })
        ->GroupBy('dest_sales_area','transaction_datetimes')
        ->get();
        
        // dd($data);

        
        $result= [];
        foreach ($data as $key => $value) {
            
            $outlet_pjp= SellIn::where('transaction_datetimes',$value->tanggal)->where('dest_sales_area',$value->sales_area)->whereIn('dest_saldomobo_id', function($query)
            {
                $query->select('id_outlet')
                    ->from('outletpjps')
                    ->whereRaw('outletpjps.id_outlet = sell_ins.dest_saldomobo_id');
            })
            ->get()
            ->count();

            $outlet_sp0k =  SellIn::where('transaction_datetimes',$value->tanggal)
            ->where('dest_sales_area',$value->sales_area)
            ->where('produk_name', "SP IM3 90D LTE (QN)")
            ->where('qty','>', 4)
            ->whereIn('dest_saldomobo_id', function($query)
            {
                $query->select('id_outlet')
                    ->from('outletpjps')
                    ->whereRaw('outletpjps.id_outlet = sell_ins.dest_saldomobo_id');
            })
            ->get()
            ->count();

        
            $outlet_sp0k =  SellIn::where('transaction_datetimes',$value->tanggal)
            ->where('dest_sales_area',$value->sales_area)
            ->where('produk_name', "SP IM3 90D LTE (QN)")
            ->where('qty','>', 4)
            ->whereIn('dest_saldomobo_id', function($query)
            {
                $query->select('id_outlet')
                    ->from('outletpjps')
                    ->whereRaw('outletpjps.id_outlet = sell_ins.dest_saldomobo_id');
            })
            ->get()
            ->count();


            $outlet_sp3gb =  SellIn::where('transaction_datetimes',$value->tanggal)
            ->where('dest_sales_area',$value->sales_area)
            ->where('produk_name', "SP DATA 3GB EJBN")
            ->where('qty','>', 4)
            ->whereIn('dest_saldomobo_id', function($query)
            {
                $query->select('id_outlet')
                    ->from('outletpjps')
                    ->whereRaw('outletpjps.id_outlet = sell_ins.dest_saldomobo_id');
            })
            ->get()
            ->count();


            $outlet_sp9gb =  SellIn::where('transaction_datetimes',$value->tanggal)
            ->where('dest_sales_area',$value->sales_area)
            ->where('produk_name', "SP DATA 9GB EJBN")
            ->where('qty','>', 1)
            ->whereIn('dest_saldomobo_id', function($query)
            {
                $query->select('id_outlet')
                    ->from('outletpjps')
                    ->whereRaw('outletpjps.id_outlet = sell_ins.dest_saldomobo_id');
            })
            ->get()
            ->count();

            $outlet_sp9gb =  SellIn::where('transaction_datetimes',$value->tanggal)
            ->where('dest_sales_area',$value->sales_area)
            ->where('produk_name', "SP DATA 9GB EJBN")
            ->where('qty','>', 1)
            ->whereIn('dest_saldomobo_id', function($query)
            {
                $query->select('id_outlet')
                    ->from('outletpjps')
                    ->whereRaw('outletpjps.id_outlet = sell_ins.dest_saldomobo_id');
            })
            ->get()
            ->count();

            $spreg_today =  SellIn::where('transaction_datetimes',$value->tanggal)
            ->where('dest_sales_area',$value->sales_area)
            ->where('produk_name', "SP IM3 90D LTE (QN)")
            ->where('transaction_datetimes','>=', $awalbulanini)
            ->sum('qty')
            ;


            $spori_today =  SellIn::where('transaction_datetimes',$value->tanggal)
            ->where('dest_sales_area',$value->sales_area)
            ->where('transaction_datetimes','>=', $awalbulanini)
            ->where(function($query)
                {
                    $query->where('produk_name', "SP DAT 16GB EJBN LTE")
                    ->orWhere('produk_name',  "SP DAT 2GB EJBN LTE")
                    ->orWhere('produk_name',  "SP DAT 2GB EJBN LTE")
                    ->orWhere('produk_name',  "SP DAT 8GB EJBN LTE") 
                    ->orWhere('produk_name', "SP DATA 3GB EJBN") 
                    ->orWhere('produk_name', "SP DAT 9GB EJBN");
                })
            ->sum('qty');


            // $spreg_last =  SellIn::where('transaction_datetimes',$value->tanggal)
            $spreg_last =  SellIn::where('dest_sales_area',$value->sales_area)
            ->where('produk_name', "SP IM3 90D LTE (QN)")
            ->where('transaction_datetimes','>=', $bulankemarin)
            ->where('transaction_datetimes','<', $awalbulanini)
            ->sum('qty');


            // $spori_last =  SellIn::where('transaction_datetimes',$value->tanggal)
            $spori_last =  SellIn::where('dest_sales_area',$value->sales_area)
            ->where('transaction_datetimes','>=', $bulankemarin)
            ->where('transaction_datetimes','<', $awalbulanini)
            ->where(function($query)
                {
                    $query->where('produk_name', "SP DAT 16GB EJBN LTE")
                    ->orWhere('produk_name',  "SP DAT 2GB EJBN LTE")
                    ->orWhere('produk_name',  "SP DAT 2GB EJBN LTE")
                    ->orWhere('produk_name',  "SP DAT 8GB EJBN LTE") 
                    ->orWhere('produk_name', "SP DATA 3GB EJBN") 
                    ->orWhere('produk_name', "SP DAT 9GB EJBN");
                })
            ->sum('qty');
            
            $result[]=[
                'tanggal'=>$value->tanggal,
                'sales_area'=>$value->sales_area,
                'outlet'=>$outlet_pjp,
                'outlet_sp0k'=>$outlet_sp0k,
                'ach_sp0k'=>$outlet_sp0k/$outlet_pjp,
                'outlet_sp3gb'=>$outlet_sp3gb,
                'ach_sp3gb'=>$outlet_sp3gb/$outlet_pjp,
                'outlet_sp9gb'=>$outlet_sp9gb,
                'ach_sp9gb'=>$outlet_sp9gb/$outlet_pjp,
                'spori_today'=>$spori_today,
                'spreg_today'=>$spreg_today,
                'spori_last'=>$spori_last,
                'spreg_last'=>$spreg_last,
                'spori_growth'=>$spori_today==0||$spori_last==0?0:$spori_today/$spori_last-1,
                'spreg_growth'=>$spreg_today==0||$spreg_last==0?0:$spreg_today/$spreg_last-1,
        
        ];
        }
        return view('menu.dashboard.area');
    } elseif ($request->select=="area") {
        if($request->input ('datepicker') == null){
            $tanggal  = Date("Y-m-d",strtotime('now'));
        }
        else {

            $tanggal = '01-'.$request->datepicker;
        }

        $awalbulanini= date('Y-m-d',strtotime("first day of " . $tanggal));
        $akhirbulanini= date('Y-m-d',strtotime("last day of " . $tanggal));
        $bulankemarin= date('Y-m-d',strtotime($awalbulanini. " -1 month"));
        // Menampilkan jumlah outlet pjp
        $data= DB::table('sell_ins')
        ->select('transaction_datetimes as tanggal','dest_area as area')
        ->where('transaction_datetimes','>=', $awalbulanini)
        ->where('transaction_datetimes','<=', $akhirbulanini)
        ->whereIn('dest_saldomobo_id', function($query)
        {
            $query->select('id_outlet')
            ->from('outletpjps')
            ->whereRaw('outletpjps.id_outlet = sell_ins.dest_saldomobo_id');
        })
        ->GroupBy('dest_area','transaction_datetimes')
        ->get();
        
        // dd($data);

        
        $result= [];
        foreach ($data as $key => $value) {
            
            $outlet_pjp= SellIn::where('transaction_datetimes',$value->tanggal)->where('dest_area',$value->area)->whereIn('dest_saldomobo_id', function($query)
            {
                $query->select('id_outlet')
                    ->from('outletpjps')
                    ->whereRaw('outletpjps.id_outlet = sell_ins.dest_saldomobo_id');
            })
            ->get()
            ->count();

            $outlet_sp0k =  SellIn::where('transaction_datetimes',$value->tanggal)
            ->where('dest_area',$value->area)
            ->where('produk_name', "SP IM3 90D LTE (QN)")
            ->where('qty','>', 4)
            ->whereIn('dest_saldomobo_id', function($query)
            {
                $query->select('id_outlet')
                    ->from('outletpjps')
                    ->whereRaw('outletpjps.id_outlet = sell_ins.dest_saldomobo_id');
            })
            ->get()
            ->count();

        
            $outlet_sp0k =  SellIn::where('transaction_datetimes',$value->tanggal)
            ->where('dest_area',$value->area)
            ->where('produk_name', "SP IM3 90D LTE (QN)")
            ->where('qty','>', 4)
            ->whereIn('dest_saldomobo_id', function($query)
            {
                $query->select('id_outlet')
                    ->from('outletpjps')
                    ->whereRaw('outletpjps.id_outlet = sell_ins.dest_saldomobo_id');
            })
            ->get()
            ->count();


            $outlet_sp3gb =  SellIn::where('transaction_datetimes',$value->tanggal)
            ->where('dest_area',$value->area)
            ->where('produk_name', "SP DATA 3GB EJBN")
            ->where('qty','>', 4)
            ->whereIn('dest_saldomobo_id', function($query)
            {
                $query->select('id_outlet')
                    ->from('outletpjps')
                    ->whereRaw('outletpjps.id_outlet = sell_ins.dest_saldomobo_id');
            })
            ->get()
            ->count();


            $outlet_sp9gb =  SellIn::where('transaction_datetimes',$value->tanggal)
            ->where('dest_area',$value->area)
            ->where('produk_name', "SP DATA 9GB EJBN")
            ->where('qty','>', 1)
            ->whereIn('dest_saldomobo_id', function($query)
            {
                $query->select('id_outlet')
                    ->from('outletpjps')
                    ->whereRaw('outletpjps.id_outlet = sell_ins.dest_saldomobo_id');
            })
            ->get()
            ->count();

            $outlet_sp9gb =  SellIn::where('transaction_datetimes',$value->tanggal)
            ->where('dest_area',$value->area)
            ->where('produk_name', "SP DATA 9GB EJBN")
            ->where('qty','>', 1)
            ->whereIn('dest_saldomobo_id', function($query)
            {
                $query->select('id_outlet')
                    ->from('outletpjps')
                    ->whereRaw('outletpjps.id_outlet = sell_ins.dest_saldomobo_id');
            })
            ->get()
            ->count();

            $spreg_today =  SellIn::where('transaction_datetimes',$value->tanggal)
            ->where('dest_area',$value->area)
            ->where('produk_name', "SP IM3 90D LTE (QN)")
            ->where('transaction_datetimes','>=', $awalbulanini)
            ->sum('qty')
            ;


            $spori_today =  SellIn::where('transaction_datetimes',$value->tanggal)
            ->where('dest_area',$value->area)
            ->where('transaction_datetimes','>=', $awalbulanini)
            ->where(function($query)
                {
                    $query->where('produk_name', "SP DAT 16GB EJBN LTE")
                    ->orWhere('produk_name',  "SP DAT 2GB EJBN LTE")
                    ->orWhere('produk_name',  "SP DAT 2GB EJBN LTE")
                    ->orWhere('produk_name',  "SP DAT 8GB EJBN LTE") 
                    ->orWhere('produk_name', "SP DATA 3GB EJBN") 
                    ->orWhere('produk_name', "SP DAT 9GB EJBN");
                })
            ->sum('qty');


            // $spreg_last =  SellIn::where('transaction_datetimes',$value->tanggal)
            $spreg_last =  SellIn::where('dest_area',$value->area)
            ->where('produk_name', "SP IM3 90D LTE (QN)")
            ->where('transaction_datetimes','>=', $bulankemarin)
            ->where('transaction_datetimes','<', $awalbulanini)
            ->sum('qty');


            // $spori_last =  SellIn::where('transaction_datetimes',$value->tanggal)
            $spori_last =  SellIn::where('dest_area',$value->area)
            ->where('transaction_datetimes','>=', $bulankemarin)
            ->where('transaction_datetimes','<', $awalbulanini)
            ->where(function($query)
                {
                    $query->where('produk_name', "SP DAT 16GB EJBN LTE")
                    ->orWhere('produk_name',  "SP DAT 2GB EJBN LTE")
                    ->orWhere('produk_name',  "SP DAT 2GB EJBN LTE")
                    ->orWhere('produk_name',  "SP DAT 8GB EJBN LTE") 
                    ->orWhere('produk_name', "SP DATA 3GB EJBN") 
                    ->orWhere('produk_name', "SP DAT 9GB EJBN");
                })
            ->sum('qty');
            
            $result[]=[
                'tanggal'=>$value->tanggal,
                'area'=>$value->area,
                'outlet'=>$outlet_pjp,
                'outlet_sp0k'=>$outlet_sp0k,
                'ach_sp0k'=>$outlet_sp0k/$outlet_pjp,
                'outlet_sp3gb'=>$outlet_sp3gb,
                'ach_sp3gb'=>$outlet_sp3gb/$outlet_pjp,
                'outlet_sp9gb'=>$outlet_sp9gb,
                'ach_sp9gb'=>$outlet_sp9gb/$outlet_pjp,
                'spori_today'=>$spori_today,
                'spreg_today'=>$spreg_today,
                'spori_last'=>$spori_last,
                'spreg_last'=>$spreg_last,
                'spori_growth'=>$spori_today==0||$spori_last==0?0:$spori_today/$spori_last-1,
                'spreg_growth'=>$spreg_today==0||$spreg_last==0?0:$spreg_today/$spreg_last-1,
        
        ];
    }
        return view('menu.dashboard.area');
    } elseif ($request->select=="cluster") {
        if($request->input ('datepicker') == null){
            $tanggal  = Date("Y-m-d",strtotime('now'));
        }
        else {

            $tanggal = '01-'.$request->datepicker;
        }

        $awalbulanini= date('Y-m-d',strtotime("first day of " . $tanggal));
        $akhirbulanini= date('Y-m-d',strtotime("last day of " . $tanggal));
        $bulankemarin= date('Y-m-d',strtotime($awalbulanini. " -1 month"));
        // Menampilkan jumlah outlet pjp
        $data= DB::table('sell_ins')
        ->select('transaction_datetimes as tanggal','dest_cluster as cluster')
        ->where('transaction_datetimes','>=', $awalbulanini)
        ->where('transaction_datetimes','<=', $akhirbulanini)
        ->whereIn('dest_saldomobo_id', function($query)
        {
            $query->select('id_outlet')
            ->from('outletpjps')
            ->whereRaw('outletpjps.id_outlet = sell_ins.dest_saldomobo_id');
        })
        ->GroupBy('dest_cluster','transaction_datetimes')
        ->get();
        
        // dd($data);

        
        $result= [];
        foreach ($data as $key => $value) {
            
            $outlet_pjp= SellIn::where('transaction_datetimes',$value->tanggal)->where('dest_cluster',$value->cluster)->whereIn('dest_saldomobo_id', function($query)
            {
                $query->select('id_outlet')
                    ->from('outletpjps')
                    ->whereRaw('outletpjps.id_outlet = sell_ins.dest_saldomobo_id');
            })
            ->get()
            ->count();

            $outlet_sp0k =  SellIn::where('transaction_datetimes',$value->tanggal)
            ->where('dest_cluster',$value->cluster)
            ->where('produk_name', "SP IM3 90D LTE (QN)")
            ->where('qty','>', 4)
            ->whereIn('dest_saldomobo_id', function($query)
            {
                $query->select('id_outlet')
                    ->from('outletpjps')
                    ->whereRaw('outletpjps.id_outlet = sell_ins.dest_saldomobo_id');
            })
            ->get()
            ->count();

        
            $outlet_sp0k =  SellIn::where('transaction_datetimes',$value->tanggal)
            ->where('dest_cluster',$value->cluster)
            ->where('produk_name', "SP IM3 90D LTE (QN)")
            ->where('qty','>', 4)
            ->whereIn('dest_saldomobo_id', function($query)
            {
                $query->select('id_outlet')
                    ->from('outletpjps')
                    ->whereRaw('outletpjps.id_outlet = sell_ins.dest_saldomobo_id');
            })
            ->get()
            ->count();


            $outlet_sp3gb =  SellIn::where('transaction_datetimes',$value->tanggal)
            ->where('dest_cluster',$value->cluster)
            ->where('produk_name', "SP DATA 3GB EJBN")
            ->where('qty','>', 4)
            ->whereIn('dest_saldomobo_id', function($query)
            {
                $query->select('id_outlet')
                    ->from('outletpjps')
                    ->whereRaw('outletpjps.id_outlet = sell_ins.dest_saldomobo_id');
            })
            ->get()
            ->count();


            $outlet_sp9gb =  SellIn::where('transaction_datetimes',$value->tanggal)
            ->where('dest_cluster',$value->cluster)
            ->where('produk_name', "SP DATA 9GB EJBN")
            ->where('qty','>', 1)
            ->whereIn('dest_saldomobo_id', function($query)
            {
                $query->select('id_outlet')
                    ->from('outletpjps')
                    ->whereRaw('outletpjps.id_outlet = sell_ins.dest_saldomobo_id');
            })
            ->get()
            ->count();

            $outlet_sp9gb =  SellIn::where('transaction_datetimes',$value->tanggal)
            ->where('dest_cluster',$value->cluster)
            ->where('produk_name', "SP DATA 9GB EJBN")
            ->where('qty','>', 1)
            ->whereIn('dest_saldomobo_id', function($query)
            {
                $query->select('id_outlet')
                    ->from('outletpjps')
                    ->whereRaw('outletpjps.id_outlet = sell_ins.dest_saldomobo_id');
            })
            ->get()
            ->count();

            $spreg_today =  SellIn::where('transaction_datetimes',$value->tanggal)
            ->where('dest_cluster',$value->cluster)
            ->where('produk_name', "SP IM3 90D LTE (QN)")
            ->where('transaction_datetimes','>=', $awalbulanini)
            ->sum('qty')
            ;


            $spori_today =  SellIn::where('transaction_datetimes',$value->tanggal)
            ->where('dest_cluster',$value->cluster)
            ->where('transaction_datetimes','>=', $awalbulanini)
            ->where(function($query)
                {
                    $query->where('produk_name', "SP DAT 16GB EJBN LTE")
                    ->orWhere('produk_name',  "SP DAT 2GB EJBN LTE")
                    ->orWhere('produk_name',  "SP DAT 2GB EJBN LTE")
                    ->orWhere('produk_name',  "SP DAT 8GB EJBN LTE") 
                    ->orWhere('produk_name', "SP DATA 3GB EJBN") 
                    ->orWhere('produk_name', "SP DAT 9GB EJBN");
                })
            ->sum('qty');


            // $spreg_last =  SellIn::where('transaction_datetimes',$value->tanggal)
            $spreg_last =  SellIn::where('dest_cluster',$value->cluster)
            ->where('produk_name', "SP IM3 90D LTE (QN)")
            ->where('transaction_datetimes','>=', $bulankemarin)
            ->where('transaction_datetimes','<', $awalbulanini)
            ->sum('qty');


            // $spori_last =  SellIn::where('transaction_datetimes',$value->tanggal)
            $spori_last =  SellIn::where('dest_cluster',$value->cluster)
            ->where('transaction_datetimes','>=', $bulankemarin)
            ->where('transaction_datetimes','<', $awalbulanini)
            ->where(function($query)
                {
                    $query->where('produk_name', "SP DAT 16GB EJBN LTE")
                    ->orWhere('produk_name',  "SP DAT 2GB EJBN LTE")
                    ->orWhere('produk_name',  "SP DAT 2GB EJBN LTE")
                    ->orWhere('produk_name',  "SP DAT 8GB EJBN LTE") 
                    ->orWhere('produk_name', "SP DATA 3GB EJBN") 
                    ->orWhere('produk_name', "SP DAT 9GB EJBN");
                })
            ->sum('qty');
            
            $result[]=[
                'tanggal'=>$value->tanggal,
                'cluster'=>$value->cluster,
                'outlet'=>$outlet_pjp,
                'outlet_sp0k'=>$outlet_sp0k,
                'ach_sp0k'=>$outlet_sp0k/$outlet_pjp,
                'outlet_sp3gb'=>$outlet_sp3gb,
                'ach_sp3gb'=>$outlet_sp3gb/$outlet_pjp,
                'outlet_sp9gb'=>$outlet_sp9gb,
                'ach_sp9gb'=>$outlet_sp9gb/$outlet_pjp,
                'spori_today'=>$spori_today,
                'spreg_today'=>$spreg_today,
                'spori_last'=>$spori_last,
                'spreg_last'=>$spreg_last,
                'spori_growth'=>$spori_today==0||$spori_last==0?0:$spori_today/$spori_last-1,
                'spreg_growth'=>$spreg_today==0||$spreg_last==0?0:$spreg_today/$spreg_last-1,
        
        ];
    }
        return view('menu.dashboard.cluster');

    } else {

        @if(count($error)>0)
                    <div class="alert alert-danger">
                        Upload Validasi Error <br> <br>
                        <ul>
                            @foreach($error->all() as $error)
                            <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">x</button>
                        <strong>{{$message}}</strong>
                    </div>
                    @endif