<!DOCTYPE html>
<html lang="en">

    @include('layouts.dashboard_css')

<body>

    <section class="h-100 gradient-form"">
        <div class=" container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-xl-10">
                <div class="card rounded-3 text-black">
                    <div class="row g-0">
                        <div class="col-lg-6 text-center login_left px-2 pt-3">
                            <h4>WelCome To Name</h4>
                            <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a
                                piece of classical Latin literature from 45 BC, making it over 2000 years old. </p>

                            <div class="img">
                                <img class="img-fluid" src="{{ asset('dashboard_assets/assets') }}/images/login-left.svg" alt="">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card-body p-md-4 mx-md-4">

                                <div class="text-center login-right mb-5 mt-4">
                                    <h4>Login to Brand Name</h4>
                                    <p>Welcome back! login with your date that you entered during registraion </p>
                                </div>

                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Name</label>
                                        <input type="text" name="name" class="form-control" id="exampleFormControlInput1"
                                            placeholder="Enter Your Name">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control" id="exampleFormControlInput1"
                                            placeholder="Enter Email Address">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control" id="exampleFormControlInput1"
                                            placeholder="Enter Password">
                                    </div>

                                    <div class="mb-3">
                                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                                        <input type="password" name="password_confirmation" class="form-control" id="password_confirmation"
                                            placeholder="Enter Password">
                                    </div>

                                    <button type="submit" class="btn w-100 login-btn mt-3">Register</button>
                                </form>
                                <p class="timeline">or</p>

                                <button class="btn w-100 loginWithGoogle">
                                    <img class="img-fluid me-2" src="{{ asset('dashboard_assets/assets') }}/images/Logo.png" alt="logo">
                                    <span>Continue With Google</span>
                                </button>

                                <a class="dont_account mt-4" href="#">Don’t have an account? Sign Up</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

    @include('layouts.dashboard_js')

</body>

</html>
