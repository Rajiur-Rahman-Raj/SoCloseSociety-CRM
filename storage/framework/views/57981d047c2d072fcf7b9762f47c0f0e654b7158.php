<!DOCTYPE html>
<html lang="en">
    
    <?php echo $__env->make('layouts.dashboard_css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


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
                                <img class="img-fluid" src="<?php echo e(asset('dashboard_assets/assets')); ?>/images/login-left.svg" alt="">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card-body p-md-4 mx-md-4">

                                <div class="text-center login-right mb-5 mt-4">
                                    <h4>Login to Brand Name</h4>
                                    <p>Welcome back! login with your date that you entered during registraion </p>
                                </div>

                                <form method="POST" action="<?php echo e(route('login')); ?>">
                                    <?php echo csrf_field(); ?>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control" id="exampleFormControlInput1"
                                            placeholder="Enter Email Address">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Password</label>
                                        <input type="password" class="form-control" name="password" id="exampleFormControlInput1"
                                            placeholder="Enter Password">
                                    </div>
                                    <div class="remfor d-flex justify-content-between">
                                        <label class="list-group-item">
                                            <input class="form-check-input me-1" type="checkbox" value="">
                                            Remember Me
                                        </label>
                                        <a class="forget_pss" href="#">Forgot your password?</a>
                                    </div>
                                    <button type="submit" class="btn w-100 login-btn mt-3">Login</button>
                                </form>
                                <p class="timeline">or</p>

                                <button class="btn w-100 loginWithGoogle">
                                    <img class="img-fluid me-2" src="<?php echo e(asset('dashboard_assets/assets')); ?>/images/Logo.png" alt="logo">
                                    <span>Continue With Google</span>
                                </button>

                                <a class="dont_account mt-4" href="signUp.html">Don’t have an account? Sign Up</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

    <?php echo $__env->make('layouts.dashboard_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</body>

</html><?php /**PATH C:\Users\HP\Desktop\SoCloseSociety-CRM\resources\views/auth/login.blade.php ENDPATH**/ ?>