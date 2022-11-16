<!doctype html>
<html lang="en">

<head>
    <title>Login Report</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{asset('public/asset_regis/css/style.css')}}">

</head>

<body>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <div class="wrap d-md-flex">
                        <div class="img" style="background-image: url(public/asset_regis/images/bg-1.jpg);">
                        </div>
                        <div class="login-wrap p-4 p-md-5">
                            <div class="d-flex">
                                <div class="w-100">
                                    <h3 class="mb-4">Sign In</h3>
                                </div>
                            </div>
                            <form action="{{route('login_user') }}" method="post" class="signin-form">
                                @csrf
                                <div class="form-group mb-3">
                                    <label class="label" for="name">Email</label>
                                    <input type="email" class="form-control" value="admin@gmail.com" name="email" placeholder="Username"
                                        required>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label" for="password">Password</label>
                                    <input type="password" name="password" value="admin" class="form-control" placeholder="Password"
                                        required>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="form-control btn btn-primary rounded submit px-3">Sign
                                        In</button>
                                </div>
                                <div class="form-group d-md-flex">
                                    <div class="w-50 text-left">
                                        <label class="checkbox-wrap checkbox-primary mb-0">Remember Me
                                            <input type="checkbox" checked>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="w-50 text-md-right">
                                        <a href="#">Forgot Password</a>
                                    </div>
                                </div>
                            </form>
                            <p class="text-center">tidak punya akun? <a data-toggle="tab" href="{{route('halaman.register') }}">Register</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="{{asset('public/asset_regis/js/jquery.min.')}}"></script>
    <script src="{{asset('public/asset_regis/js/popper.js')}}"></script>
    <script src="{{asset('public/asset_regis/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/asset_regis/js/main.js')}}"></script>


	<!-- allert -->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


	<script>
	@if (Session::has('success')) {
		swal("Good job!", "You clicked the button!", "success");
	}
	@endif
	</script>
	<script>
	@if (Session::has('error')) {
		swal({
			title: "Gagal!",
			text: "{{Session::get('error')}}",
			icon: "error",
			button: "kembali"
		});
	}
	@endif
	</script>

</body>

</html>
