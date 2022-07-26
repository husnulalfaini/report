@extends('layout.master')

@section('header_kanan')
<a class="btn btn-warning btn-md float-right" href="{{route('all.user')}}" role="button">Kembali</a>
@endsection


@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="callout callout-warning">

                    <h3 class="pb-3">Edit Data</h3>

                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{route('update.user',$user->id) }}" method="post" class="signin-form">
                    @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama</label>
                            <input type="name" name="name" value="{{ $user->name }}" class="form-control" id="exampleInputEmail1"
                                placeholder="Masukan Nama">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" class="form-control" value="{{ $user->email }}" name="email" id="exampleInputEmail1"
                                placeholder="Masukan email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" name="password" value="{{ $user->password }}" id="exampleInputPassword1"
                                placeholder="Password">
                        </div>
                        <button type="submit" class="btn btn-danger">Submit</button>
                    </form>
                </div>
                <!-- /.card -->

            </div>

            <!-- /.invoice -->
        </div><!-- /.col -->
    </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection