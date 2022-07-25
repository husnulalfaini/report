@extends('layout.master')

@section('header_kanan')
<a class="btn btn-warning btn-md float-right" href="{{route('detail.sell_in',[$data_sellin->dest_saldomobo_id])}}" role="button">Kembali</a>
@endsection


@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                
                <!-- Main content -->
                <div class="invoice p-3 mb-3">
                    <!-- title row -->
                    <div class="row">
                        <div class="col-12">
                            <h4>
                                <i class="fas fa-home"></i> Outlet : {{$data_sellin->dest_organizationname}} ({{$data_sellin->dest_saldomobo_id}})
                                <small class="float-right">Tanggal: {{Str::limit($data_sellin->transaction_datetimes,11)}}</small>
                            </h4>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- info row -->
                    <div class="row invoice-info pt-3">
                        <div class="col-sm-4 invoice-col">
                            <strong>Distributor Type: {{$data_sellin->distributor_type?:$empty}}</strong><br>
                            <b>Transaction ID :</b> {{$data_sellin->transaction_id?:$empty}}<br>
                            <b>Reference Order Number :</b> {{$data_sellin->reference_order_number?:$empty}}<br>
                            <b>Created By:</b> {{$data_sellin->distributor_type?:$empty}}<br>
                            <b>Created By Desc:</b> {{$data_sellin->crtd_by?:$empty}}<br>
                            <b>Organization ID:</b> {{$data_sellin->crtd_by_desc?:$empty}}<br>
                            <br>
                            <b>Saldomobo ID:</b>{{$data_sellin->organization_id?:$empty}}<br>
                            <b>Nama Organisai :</b> {{$data_sellin->nama_organisasi?:$empty}}<br>
                            <b>Outlet Type:</b> {{$data_sellin->outlet_type?:$empty}}<br>
                            <b>Dari Node:</b> {{$data_sellin->dari_node?:$empty}}<br>
                            <b>Dari Nama Node:</b> {{$data_sellin->dari_nama_node?:$empty}}
                        </div>
                        <!-- /.col -->

                        <div class="col-sm-4 invoice-col">
                            <b>Initiator Region :</b> {{$data_sellin->initiator_region?:$empty}}<br>
                            <b>Initiator Area :</b> {{$data_sellin->initiator_area?:$empty}}<br>
                            <b>Initiator Sales Area :</b> {{$data_sellin->initiator_sales_area?:$empty}}<br>
                            <b>Initiator Cluster:</b> {{$data_sellin->initiator_cluster?:$empty}}<br>
                            <b>Initiator Micro Cluster:</b> {{$data_sellin->initiator_micro_cluster?:$empty}}<br>
                            <b>Initiator Teritoryid:</b> {{$data_sellin->initiator_teritoryid?:$empty}}<br>
                            <br>
                            <b>Dest Organization ID:</b> {{$data_sellin->dest_organizationid?:$empty}}<br>
                            <b>To Outlet Type:</b> {{$data_sellin->to_outlet_type?:$empty}}<br>
                            <b>Ke Node:</b> {{$data_sellin->ke_node?:$empty}}<br>
                            <b>Ke Nama Node:</b> {{$data_sellin->ke_nama_node?:$empty}}<br>
                        </div>
                        <!-- /.col -->

                        <div class="col-sm-4 invoice-col">
                            <b>Dest Region :</b> {{$data_sellin->dest_region?:$empty}}<br>
                            <b>Dest Area :</b> {{$data_sellin->dest_area?:$empty}}<br>
                            <b>Dest Sales Area:</b> {{$data_sellin->dest_sales_area?:$empty}}<br>
                            <b>Dest Cluster:</b> {{$data_sellin->dest_cluster?:$empty}}<br>
                            <b>Dest Micro Cluster:</b> {{$data_sellin->dest_micro_cluster?:$empty}}<br>
                            <b>Dest Teritoryid:</b> {{$data_sellin->dest_teritoryid?:$empty}}<br>
                            <br>
                            <b>Produk Kategory:</b> {{$data_sellin->produk_kategory?:$empty}}<br>
                            <b>Produk Kode:</b> {{$data_sellin->produk_kode?:$empty}}<br>
                            <b>Produk Name:</b> {{$data_sellin->produk_name?:$empty}}<br>
                            <b>Quantity:</b> {{$data_sellin->qty?:$empty}}<br>
                            <b>Rate/Unit:</b> Rp. {{$data_sellin->rate_unit?:$empty}},-<br>
                            <b>Operator ID:</b> {{$data_sellin->operator_id?:$empty}}<br>
                            <b>Operator Name:</b> {{$data_sellin->operator_name?:$empty}}<br>
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
 @endsection