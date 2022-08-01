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
