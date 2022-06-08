   <nav class="navbar navbar-expand-lg navbar-light bg-white px-4">
    <div class="d-flex align-items-center">
        <i class="fas fa-align-left primary-text fs-4 me-3 icon" id="menu-toggle"></i>
        <div class="input-group m-0">
            <button class="btn border-0" type="button" id="button-addon1">
                <i class="fa-solid fa-magnifying-glass"></i>
            </button>
            <input type="text" class="form-control border-0" placeholder="Find Something..."
                aria-label="Example text with button addon" aria-describedby="button-addon1">
        </div>
    </div>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <div class="dropdown nav-item ms-auto border-0">
            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1"
                data-bs-toggle="dropdown" aria-expanded="false">
                <span class="me-2 flag-icon">
                    <img src="<?php echo e(asset('dashboard_assets/assets')); ?>/images/lang.png" alt="lang.png">
                </span>
                Eng
                <i class="fa-solid fa-chevron-down"></i>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="#">
                        <span class="me-2 flag-icon">
                            <img src="<?php echo e(asset('dashboard_assets/assets')); ?>/images/lang2.png" alt="lang2.png">
                        </span>
                        france
                    </a></li>
            </ul>
        </div>

        <div class="nav-item me-2 ms-2">
            <button type="button" class="btn position-relative bell_icon p-0">
                <i class=" fa-solid fa-bell"></i>
                <span style="background-color: #FCB045;"
                    class="position-absolute top-0 start-100 translate-middle p-1 border border-light rounded-circle">
                    <span class="visually-hidden">New alerts</span>
                </span>
            </button>
        </div>

        <ul class="navbar-nav  mb-2 mb-lg-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown"
                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img width="50" height="50" class="rounded-circle" src="<?php echo e(Auth::user()->profile_photo_url); ?>"> <?php echo e(Auth::user()->name); ?>

                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="<?php echo e(url('user/profile')); ?>"><i class="mr-50"
                        data-feather="user"></i> Profile</a></li>
                    
                    <form method="POST" action="<?php echo e(route('logout')); ?>">
                        <?php echo csrf_field(); ?>
                        <a class="dropdown-item" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
                        this.closest('form').submit();"><i class="mr-50"
                                data-feather="power"></i>Logout</a>
                    </form>
                </ul>
            </li>
        </ul>
    </div>
</nav>
<?php /**PATH C:\Users\HP\Desktop\SoCloseSociety-CRM\resources\views/layouts/nav.blade.php ENDPATH**/ ?>