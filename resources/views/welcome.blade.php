@include('layouts.includes.head')

<body class="bg-light">

    <main class="">

        <div class="container bg-light col-lg-9">

            <div class="d-md-flex justify-content-between">

                <div class="d-flex align-items-center py-2">
                    <div class="shadow rounded-8">
                        <img class="" src="{{ asset('images/logos/icon.png') }}" alt="MyADC" style="width: 80px">
                    </div>
                    <div class="ms-4">
                        <h1 class="text-primary mt-3 fw-bold mb-0">Amar College</h1>
                        <p>A college social media platform</p>
                    </div>
                </div>

                <div class="d-flex align-items-center justify-content-end mb-3">
                    <a class="btn btn-secondary" href="{{ route('admission.procedure') }}"><i
                            class="fas fa-user-edit"></i> Admission</a>
                    @auth
                        <a class="btn btn-primary ms-2" href="{{ route('home') }}"><i class="fas fa-home"></i>
                            Home</a>
                    @else
                        <a class="btn btn-primary ms-2" href="{{ route('register') }}"><i class="fas fa-user-plus"></i>
                            Register</a>
                    @endauth
                </div>
            </div>


            <div class="row d-md-flex align-items-center">
                <div class="col-md-5 col-lg-6 p-3 p-lg-5">
                    <img class="img-fluid mb-3" src="{{ asset('images/asset_img/welcome_art.png') }}" alt="">

                    <div class="d-flex justify-content-center mt-5">
                        <a href="#" class="mx-2 shadow">
                            <img src="{{ asset('images/asset_img/app-store-badge-google-play.png') }}" alt=""
                                style="height: 50px">
                        </a>
                        <a href="#" class="mx-2 shadow">
                            <img src="{{ asset('images/asset_img/Download-On-The-App-Store-PNG-Image.png') }}"
                                alt="" style="height: 50px">
                        </a>
                    </div>
                </div>
                <div class="col-md-7 col-lg-6">
                    <div class="card px-md-4 py-3 rounded-8 shadow-lg">
                        <div class="card-header d-flex justify-content-between align-items-start">
                            <div>
                                <h2>Login</h2>
                                <p>Welcome to Amar College</p>
                            </div>
                            <a class="btn btn-link btn-sm" href="{{ route('admin.login') }}" target="blank">College
                                Login <i class="fas fa-external-link"></i></a>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                {{-- <div class="mb-4">
                                    <label for="exampleInputEmail1" class="form-label">Select your college</label>
                                    <select name="college" class="form-control py-2" id="">
                                        <option disabled selected>Choose</option>
                                        <option value="MC College">MC College</option>
                                        <option value="Sylhet Govt. College">Sylhet Govt. College</option>
                                        <option value="Sylhet Govt. Womens College">Sylhet Govt. Womens College</option>
                                        <option value="Blue Bird High School and College">Blue Bird High School and
                                            College</option>
                                        <option value="Scholarshome Mejortila College">Scholarshome Mejortila College
                                        </option>
                                        <option value="Al-Emdad Degree College">Al-Emdad Degree College</option>
                                    </select>
                                </div> --}}

                                <div class="mb-4">
                                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                                    <input type="email" class="form-control py-2 @error('email') is-invalid @enderror"
                                        id="email" name="email" aria-describedby="emailHelp">
                                    @error('email')
                                        <p class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </p>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="exampleInputPassword1" class="form-label">Password</label>
                                    <input type="password"
                                        class="form-control py-2 @error('password') is-invalid @enderror" id="password"
                                        name="password">
                                    @error('password')
                                        <p class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </p>
                                    @enderror
                                </div>

                                <div class="mb-4 form-check">
                                    <input type="checkbox" class="form-check-input" id="remember_me" name="remember">
                                    <label class="form-check-label" for="exampleCheck1">Remember me</label>
                                </div>

                                <div class="d-flex justify-content-between pt-3">

                                    <button type="button" class="btn btn-link px-0 forgetPassBtn"
                                        onclick="location.href='{{ route('password.request') }}'"
                                        @auth disabled @endauth>Forgot your password?</button>

                                    <button type="submit" class="btn btn-primary " @auth disabled @endauth>
                                        <div class="d-flex">Login <i class="fas fa-sign-in-alt mt-1 ms-1"></i></div>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </main>


    <footer class="py-3 mt-5">
        <div class="container">
            <div class="d-flex justify-content-center">
                <img src="{{ asset('images/logos/Digital-Bangladesh.png') }}" alt="" style="height: 45px">
                <img class="ms-4" src="{{ asset('images/logos/ICT.png') }}" alt="" style="height: 45px">
                <img class="ms-4" src="{{ asset('images/logos/a2i-logo.png') }}" alt="" style="height: 40px">
                <img class="ms-4" src="{{ asset('images/logos/UNICEF_login_icon.svg') }}" alt=""
                    style="height: 40px">
            </div>
            <div class="d-md-flex justify-content-center small mt-3">
                <div class="text-muted">&copy;
                    <script>
                        document.write(new Date().getFullYear())
                    </script>. Developed and supported by <a href="https://github.com/mr-mamun-50"
                        target="blank">Fleet Coders</a>
                </div>
                <div class="ms-1">
                    &middot;
                    <a href="#">Privacy Policy</a>
                    &middot;
                    <a href="#">Terms &amp; Conditions</a>
                </div>
            </div>
        </div>
    </footer>


    @include('layouts.includes.scripts')
</body>

</html>
