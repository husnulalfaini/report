@extends('layout.master')


@section('content')
<section class="content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-md-5">
            <div class="card card-yellow card-outline">
               <div class="card-body box-profile">

                  <!-- /.card-header -->
                  <div class="card-body">
                     <strong>
                        <i class="fas fa-user mr-1"></i> Nama </strong>
                     <p class="text-muted">{{ Auth::user()->name }}</p>
                     <hr>
                     <strong>
                        <i class="fas fa-envelope mr-1"></i>Email </strong>
                     <p class="text-muted">{{ Auth::user()->email }}</p>
                     <hr>
                     <strong>
                        <i class="fas fa-briefcase mr-1"></i>Jabatan </strong>
                     <p class="text-muted">{{ Auth::user()->role }}</p>
                     <hr>
                  </div>
                  <!-- /.card-body -->
                  <!-- /.card -->


               </div>
               <!-- /.card-body -->
            </div>
         </div>
         <!-- /.card -->

         <div class="col-md-7">
            <div class="card card-warning">
               <div class="card-header ">
                  <h3 class="card-title">Perbaharui Info Anda</h3>
               </div>
               <div class="card-body">
               <form action="{{route('update.profile', Auth::user()->id)}}" method="post" enctype="multipart/form-data">
                     {{ csrf_field() }}
                     

                     <!-- Nama -->
                     <div class="form-group">
                        <div class="input-group">
                           <div class="input-group-prepend">
                              <span class="input-group-text ">
                                 <i class="far fa-user"></i>
                              </span>
                           </div>
                           <input type="Text" class="form-control" name="name" id="name" value="{{ Auth::user()->name }}">
                        </div>
                     </div>
                     <!-- end  Nama -->


                     <!-- Email -->
                     <div class="form-group">
                        <div class="input-group">
                           <div class="input-group-prepend">
                              <span class="input-group-text">
                                 <i class="fas fa-envelope"></i>
                              </span>
                           </div>
                           <input type="email" class="form-control" name="email" id="email" value="{{ Auth::user()->email }}">
                        </div>
                     </div>
                     <!-- end  Email -->


                     <!-- Password -->
                     <div class="form-group">
                        <div class="input-group">
                           <div class="input-group-prepend">
                              <span class="input-group-text">
                                 <i class="fas fa-lock"></i>
                              </span>
                           </div>
                           <input type="password" class="form-control" name="password" id="password" value="{{ Auth::user()->password }}">
                        </div>
                     </div>
                     <!-- end Password -->

                     <!-- tombol update -->
                     <div class="col-md-4 mx-auto text-center pt-4">
                        <button type="submit" class="btn btn-warning btn-block"> Update</button>
                     </div>
               </div>
               <!-- /.card-body -->
            </div>
            <!-- /.card -->
            </form>
            <!-- /.card -->
         </div>
      </div>
   </div>
</section> 
<!-- /.content -->
 @endsection