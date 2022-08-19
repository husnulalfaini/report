@extends('layout.master')


@section('content')

<!-- Daftar Seluruh Kelompok -->
<section class="content">
    <div class="container-fluid">
    </div>
    <div class="row">
        <div class="col-3">
            <div class="card">
                <div class="card-header card-yellow card-outline">
                    <h3 class="card-title">Report All</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="col-12">
                            <div class="col-xl-1 pt-5 offset-3">
                                <a class="btn btn-primary" href="{{route('download.file')}}" type="submit">
                                    <i class="fas fa-save"></i> Download
                                </a>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.col -->

        
        <div class="col-3">
            <div class="card">
                <div class="card-header card-yellow card-outline">
                    <h3 class="card-title">Report Month</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="col-12">
                            <input type="text" name="datepicker" id="datepicker"  class="form-control form-control-sm"
                                placeholder="Pilih Bulan" required />
                            <div class="col-xl-1 pt-3 offset-3">
                                <a class="btn btn-primary" href="{{route('download.month')}}" type="submit">
                                    <i class="fas fa-save"></i> Download
                                </a>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.col -->

        <div class="col-3">
            <div class="card">
                <div class="card-header card-yellow card-outline">
                    <h3 class="card-title">Report Daily</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="col-12">
                            <input type="text" name="datepicker" id="datepicker" class="form-control form-control-sm"
                                placeholder="Pilih Bulan" required />
                            <div class="col-xl-1 pt-3 offset-3">
                                <a class="btn btn-primary" href="{{route('download.daily')}}" type="submit">
                                    <i class="fas fa-save"></i> Download
                                </a>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.col -->

        <div class="col-3">
            <div class="card">
                <div class="card-header card-yellow card-outline">
                    <h3 class="card-title">Report Range</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="col-12">
                        <form action="#" method="get">
                            <input type="text" name="datepicker" id="datepicker" class="form-control form-control-sm"
                                placeholder="Pilih Bulan" required />
                            <div class="col-xl-1 pt-3 offset-3">
                                <a class="btn btn-primary" type="submit">
                                    <i class="fas fa-save"></i> Download
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
    <!-- /.container-fluid -->
</section>
<!-- END Daftar Seluruh Kelompok -->


<script src="{{asset('public/asset/plugins/jquery/jquery.min.js')}}"></script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="https://netdna.bootstrapcdn.com/bootstrap/2.3.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.min.js"></script>
<script>
var dp = $("#datepicker").datepicker({
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