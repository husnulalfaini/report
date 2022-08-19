@extends('layout.master')

@section('header_kanan')
<a class="btn btn-warning btn-md float-right" href="{{route('logout')}}" role="button">Kembali</a>
@endsection


@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="callout callout-warning">

                    <h3 class="pb-3">Tambah Akun</h3>

                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{route('tambah.user') }}" method="post" class="signin-form">
                    @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama</label>
                            <input type="name" name="name" class="form-control" id="exampleInputEmail1"
                                placeholder="Masukan Nama">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" class="form-control" name="email" id="exampleInputEmail1"
                                placeholder="Masukan email"> format email harus @ioh.co.id
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Telepon</label>
                            <input type="number" class="form-control"  name="telepon" id="exampleInputEmail1"
                                placeholder="Masukan telepon">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" name="password" id="exampleInputPassword1"
                                placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label>Jabatan</label>
                            <select name="role" id="select" class="form-control">
                                <option value="0">Pilih Jabatan</option>
                                <option value="admin">Admin</option>
                                <option value="user">Team</option>
                            </select>
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