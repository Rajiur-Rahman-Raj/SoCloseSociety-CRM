

<?php $__env->startSection('content'); ?>

<div class="container-fluid px-4">
    <div class="row row-cols-xxl-5 row-cols-lg-4 row-cols-md-3 row-cols-sm-2 row-cols-1 g-3 my-2">
        <div class="col">
            <div
                class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded cards">
                <img src="<?php echo e(asset('dashboard_assets/assets')); ?>/images/content_icon/tickets.svg"
                    class="img-fluid border rounded-full  cards__common cards__bg1" alt="">
                <div>
                    <p class="fs-5">Total Tickets</p>
                    <h3 class="fs-2">1500</h3>
                </div>
            </div>
        </div>

        <div class="col">
            <div
                class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded cards">
                <img src="<?php echo e(asset('dashboard_assets/assets')); ?>/images/content_icon/open.svg"
                    class="img-fluid border rounded-full  cards__common cards__bg2" alt="">
                <div>
                    <p class="fs-5">Open Tickets</p>
                    <h3 class="fs-2">1500</h3>
                </div>
            </div>
        </div>

        <div class="col">
            <div
                class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded cards">
                <img src="<?php echo e(asset('dashboard_assets/assets')); ?>/images/content_icon/closed.svg"
                    class="img-fluid border rounded-full  cards__common cards__bg3" alt="closed">
                <div>
                    <p class="fs-5">Closed Ticket</p>
                    <h3 class="fs-2">1500</h3>
                </div>
            </div>
        </div>

        <div class="col">
            <div
                class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded cards">
                <img src="<?php echo e(asset('dashboard_assets/assets')); ?>/images/content_icon/solved.svg"
                    class="img-fluid border rounded-full  cards__common cards__bg4" alt="closed">
                <div>
                    <p class="fs-5">Solved Tickets</p>
                    <h3 class="fs-2">1500</h3>
                </div>
            </div>
        </div>

        <div class="col">
            <div
                class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded cards">
                <img src="<?php echo e(asset('dashboard_assets/assets')); ?>/images/content_icon/solved.svg"
                    class="img-fluid border rounded-full  cards__common cards__bg4" alt="closed">
                <div>
                    <p class="fs-5">Solved Tickets</p>
                    <h3 class="fs-2">1500</h3>
                </div>
            </div>
        </div>
    </div>
    <!--Other Chart Here -->
    <div class="chart mt-3">
        <div class="row">
            <div class="col-lg-8">
                <div class="chart__left bg-white p-3 rounded">
                    <div class=" chart__left__heading d-flex justify-content-between">
                        <div class="chart_left_heading_left">
                            <h4>Ticket Analyticks</h4>
                        </div>
                        <div class="chart_left_heading_right">
                            <select class="form-select border-0" aria-label="Default select example">
                                <option selected>Yearly</option>
                                <option value="1">month</option>
                            </select>
                        </div>
                    </div>
                    <div id="chart"></div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="chart__right bg-white p-3">
                    <div class="chart__right__heading d-flex justify-content-between align-items-center">
                        <div class="chart_right_heading_left">
                            <h4>Current Issues</h4>
                        </div>
                        <div class="chart_right_heading_right">
                            <select class="form-select border-0" aria-label="Default select example">
                                <option selected>This Year</option>
                                <option value="1">previous</option>
                            </select>
                        </div>
                    </div>
                    <div id="chart2"></div>
                </div>
            </div>
        </div>
    </div>

    <!--=====Ticket & Map=====-->

    <div class="cutomerTicket">
        <div class="row g-0">
            <div class="col-lg-8">
                <div class="customerTicket__tickets bg-white mt-3 rounded p-3">
                    <div class="customerTicket__tickets_heading_dropdown d-flex justify-content-between">
                        <div class="heading">
                            <h3>Customers With Most Ticket</h3>
                        </div>
                        <div class="day">
                            <div class="dropdown">
                                <button
                                    class="btn btn-secondary bg-transparent text-dark border-0 dropdown-toggle"
                                    type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    Today
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="#">Tommorow</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="customerTicket_table table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Customer Name</th>
                                    <th scope="col">Tickets</th>
                                    <th scope="col">Location</th>
                                    <th scope="col">Last Reply</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">Ashley Donald Mortez</th>
                                    <td>17</td>
                                    <td>
                                        <div class="rounded-circle" style="width: 30%;">
                                            <img src="<?php echo e(asset('dashboard_assets/assets')); ?>/images/flag-icon/1png.png" alt="1">
                                        </div>
                                    </td>
                                    <td>12:30 P:M</td>
                                </tr>
                                <tr>
                                    <th scope="row">Ashley Donald</th>
                                    <td>17</td>
                                    <td>
                                        <div class="rounded-circle" style="width: 30%;">
                                            <img src="<?php echo e(asset('dashboard_assets/assets')); ?>/images/flag-icon/2.png" alt="2">
                                        </div>
                                    </td>
                                    <td>12:30 P:M</td>
                                </tr>
                                <tr>
                                    <th scope="row">Ashley Donald</th>
                                    <td>17</td>
                                    <td>
                                        <div class="rounded-circle" style="width: 30%;">
                                            <img src="<?php echo e(asset('dashboard_assets/assets')); ?>/images/flag-icon/3.png" alt="3">
                                        </div>
                                    </td>
                                    <td>12:30 P:M</td>
                                </tr>
                                <tr>
                                    <th scope="row">Ashley Donald</th>
                                    <td>17</td>
                                    <td>
                                        <div class="rounded-circle" style="width: 30%;">
                                            <img src="<?php echo e(asset('dashboard_assets/assets')); ?>/images/flag-icon/4.png" alt="4">
                                        </div>
                                    </td>
                                    <td>12:30 P:M</td>
                                </tr>
                                <tr>
                                    <th scope="row">Ashley Donald</th>
                                    <td>17</td>
                                    <td>
                                        <div class="rounded-circle" style="width: 30%;">
                                            <img src="<?php echo e(asset('dashboard_assets/assets')); ?>/images/flag-icon/5.png" alt="5">
                                        </div>
                                    </td>
                                    <td>12:30 P:M</td>
                                </tr>
                                <tr>
                                    <th scope="row">Ashley Donald</th>
                                    <td>17</td>
                                    <td>
                                        <div class="rounded-circle" style="width: 30%;">
                                            <img src="<?php echo e(asset('dashboard_assets/assets')); ?>/images/flag-icon/6.png" alt="6">
                                        </div>
                                    </td>
                                    <td>12:30 P:M</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="map bg-white p-3 mt-3">
                    <div class="map__map_heading text-center">
                        <p class="p-0 m-0">China</p>
                        <h5 class="mt-3">55</h5>
                    </div>
                    <div class="customer_count d-flex justify-content-between text-center">
                        <div class=" customer_count_total cmn_style">
                            <p class="mb-2">Total Customer</p>
                            <h3 style="color: #6C7BFF;">2548</h3>
                        </div>
                        <div class="divider"></div>
                        <div class="customer_count_active cmn_style">
                            <p class="mb-2">Active Customer</p>
                            <h3 style="color: #34DDAA;">1600</h3>
                        </div>
                    </div>
                    <div class="map_show">
                        <div id="vmap" style="height: 276px;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--=====Support Tickets=====-->

    <div class="support_tickets_modal">
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header border-0">
                        <!-- <h5 class="modal-title" id="exampleModalLabel">New message</h5> -->
                        <div class="modal_btn">
                            <button class="modal_btn__ind">Assign individually</button>
                            <button class="modal_btn_team bg-transparent border-0">Assign To Team</button>
                        </div>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label"><b>Select</b></label>
                                <input type="text" class="form-control" id="recipient-name">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer border-0">
                        <button type="button" class="btn modal_close_btn"
                            data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn modal_save_btn">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="support_ticket">
        <div class="col-lg-12">
            <div class="support mt-5">
                <div class="support_heading">
                    <h3>All Support Tickets</h3>
                    <p>List of ticket open by customers</p>
                </div>
                <div class="support_table table-responsive">
                    <table id="myTable" class="table table-hover b-t" class="display nowrap"
                        style="width:100%">
                        <thead>
                            <tr>
                                <th>
                                    <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                </th>
                                <th>ID</th>
                                <th>Request Name</th>
                                <th>Subjects</th>
                                <th>Status</th>
                                <th>Priority</th>
                                <th>Assignee</th>
                                <th>Created Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr id="tr1">
                                <td><input type="checkbox" id="vehicle1" name="vehicle1" value="Bike"></td>
                                <td>#70</td>
                                <td>Wiliam Carey</td>
                                <td>Installion Issues</td>
                                <td>Open</td>
                                <td>High</td>
                                <td class="avatar">
                                    <ul>
                                        <li>
                                            <a href="#">
                                                <img src="<?php echo e(asset('dashboard_assets/assets')); ?>/images/avatar/avatar1.png"
                                                    alt="avatar1.png">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <img src="<?php echo e(asset('dashboard_assets/assets')); ?>/images/avatar/avatar2.png"
                                                    alt="avatar2.png">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <img src="<?php echo e(asset('dashboard_assets/assets')); ?>/images/avatar/avatar3.png"
                                                    alt="avatar3.png">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <img src="<?php echo e(asset('dashboard_assets/assets')); ?>/images/avatar/avatar4.png"
                                                    alt="avatar4.png">
                                            </a>
                                        </li>
                                    </ul>
                                </td>
                                <td>23/11/2021</td>
                                <td class="text-center">
                                    <div class="dropdown">
                                        <a class="btn bg-transparent dropdown-toggle" href="#" role="button"
                                            id="dropdownMenuLink" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            <i class="fa-solid fa-ellipsis-vertical"></i>
                                        </a>

                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <li><a class="dropdown-item mt-2" href="#">
                                                    <span><i class="fa-solid fa-eye me-2"></i></span>
                                                    Details
                                                </a></li>
                                            <li><a class="dropdown-item mt-2" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal" data-bs-whatever="@mdo"
                                                    href="#">
                                                    <span><i
                                                            class="fa-solid fa-circle-check me-2"></i></span>
                                                    Asignee
                                                </a></li>
                                            <li><a class="dropdown-item mt-2" href="#">
                                                    <span><i
                                                            class="fa-solid fa-pen-to-square me-2"></i></span>
                                                    Edit
                                                </a>
                                            </li>
                                            <li><a class="dropdown-item mt-2" href="#">
                                                    <span><i class="fa-solid fa-trash me-2"></i></span>
                                                    Delete
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr id="tr2">
                                <td><input type="checkbox" id="vehicle1" name="vehicle1" value="Bike"></td>
                                <td>#31</td>
                                <td>Wiliam Carey</td>
                                <td>Installion Issues</td>
                                <td>Open</td>
                                <td>High</td>
                                <td class="avatar">
                                    <ul>
                                        <li>
                                            <a href="#">
                                                <img src="<?php echo e(asset('dashboard_assets/assets')); ?>/images/avatar/avatar1.png"
                                                    alt="avatar1.png">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <img src="<?php echo e(asset('dashboard_assets/assets')); ?>/images/avatar/avatar2.png"
                                                    alt="avatar2.png">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <img src="<?php echo e(asset('dashboard_assets/assets')); ?>/images/avatar/avatar3.png"
                                                    alt="avatar3.png">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <img src="<?php echo e(asset('dashboard_assets/assets')); ?>/images/avatar/avatar4.png"
                                                    alt="avatar4.png">
                                            </a>
                                        </li>
                                    </ul>
                                </td>
                                <td>23/11/2021</td>
                                <td class="text-center">
                                    <div class="dropdown">
                                        <a class="btn bg-transparent dropdown-toggle" href="#" role="button"
                                            id="dropdownMenuLink" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            <i class="fa-solid fa-ellipsis-vertical"></i>
                                        </a>

                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <li><a class="dropdown-item mt-2" href="#">
                                                    <span><i class="fa-solid fa-eye me-2"></i></span>
                                                    Details
                                                </a></li>
                                            <li><a class="dropdown-item mt-2" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal" data-bs-whatever="@mdo"
                                                    href=" #">
                                                    <span><i
                                                            class="fa-solid fa-circle-check me-2"></i></span>
                                                    Asignee
                                                </a></li>
                                            <li><a class="dropdown-item mt-2" href="#">
                                                    <span><i
                                                            class="fa-solid fa-pen-to-square me-2"></i></span>
                                                    Edit
                                                </a>
                                            </li>
                                            <li><a class="dropdown-item mt-2" href="#">
                                                    <span><i class="fa-solid fa-trash me-2"></i></span>
                                                    Delete
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr id="tr3">
                                <td><input type="checkbox" id="vehicle1" name="vehicle1" value="Bike"></td>
                                <td>#39</td>
                                <td>Wiliam Carey</td>
                                <td>Installion Issues</td>
                                <td>Open</td>
                                <td>High</td>
                                <td class="avatar">
                                    <ul>
                                        <li>
                                            <a href="#">
                                                <img src="<?php echo e(asset('dashboard_assets/assets')); ?>/images/avatar/avatar1.png"
                                                    alt="avatar1.png">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <img src="<?php echo e(asset('dashboard_assets/assets')); ?>/images/avatar/avatar2.png"
                                                    alt="avatar2.png">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <img src="<?php echo e(asset('dashboard_assets/assets')); ?>/images/avatar/avatar3.png"
                                                    alt="avatar3.png">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <img src="<?php echo e(asset('dashboard_assets/assets')); ?>/images/avatar/avatar4.png"
                                                    alt="avatar4.png">
                                            </a>
                                        </li>
                                    </ul>
                                </td>
                                <td>24/11/2021</td>
                                <td class="text-center">
                                    <div class="dropdown">
                                        <a class="btn bg-transparent dropdown-toggle" href="#" role="button"
                                            id="dropdownMenuLink" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            <i class="fa-solid fa-ellipsis-vertical"></i>
                                        </a>

                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <li><a class="dropdown-item mt-2" href="#">
                                                    <span><i class="fa-solid fa-eye me-2"></i></span>
                                                    Details
                                                </a></li>
                                            <li><a class="dropdown-item mt-2" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal" data-bs-whatever="@mdo"
                                                    href=" #">
                                                    <span><i
                                                            class="fa-solid fa-circle-check me-2"></i></span>
                                                    Asignee
                                                </a></li>
                                            <li><a class="dropdown-item mt-2" href="#">
                                                    <span><i
                                                            class="fa-solid fa-pen-to-square me-2"></i></span>
                                                    Edit
                                                </a>
                                            </li>
                                            <li><a class="dropdown-item mt-2" href="#">
                                                    <span><i class="fa-solid fa-trash me-2"></i></span>
                                                    Delete
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr id="tr4">
                                <td><input type="checkbox" id="vehicle1" name="vehicle1" value="Bike"></td>
                                <td>#09</td>
                                <td>Wiliam Carey</td>
                                <td>Installion Issues</td>
                                <td>Close</td>
                                <td>Low</td>
                                <td class="avatar">
                                    <ul>
                                        <li>
                                            <a href="#">
                                                <img src="<?php echo e(asset('dashboard_assets/assets')); ?>/images/avatar/avatar1.png"
                                                    alt="avatar1.png">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <img src="<?php echo e(asset('dashboard_assets/assets')); ?>/images/avatar/avatar2.png"
                                                    alt="avatar2.png">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <img src="<?php echo e(asset('dashboard_assets/assets')); ?>/images/avatar/avatar3.png"
                                                    alt="avatar3.png">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <img src="<?php echo e(asset('dashboard_assets/assets')); ?>/images/avatar/avatar4.png"
                                                    alt="avatar4.png">
                                            </a>
                                        </li>
                                    </ul>
                                </td>
                                <td>25/11/2021</td>
                                <td class="text-center">
                                    <div class="dropdown">
                                        <a class="btn bg-transparent dropdown-toggle" href="#" role="button"
                                            id="dropdownMenuLink" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            <i class="fa-solid fa-ellipsis-vertical"></i>
                                        </a>

                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <li><a class="dropdown-item mt-2" href="#">
                                                    <span><i class="fa-solid fa-eye me-2"></i></span>
                                                    Details
                                                </a></li>
                                            <li><a class="dropdown-item mt-2" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal" data-bs-whatever="@mdo"
                                                    href=" #">
                                                    <span><i
                                                            class="fa-solid fa-circle-check me-2"></i></span>
                                                    Asignee
                                                </a></li>
                                            <li><a class="dropdown-item mt-2" href="#">
                                                    <span><i
                                                            class="fa-solid fa-pen-to-square me-2"></i></span>
                                                    Edit
                                                </a>
                                            </li>
                                            <li><a class="dropdown-item mt-2" href="#">
                                                    <span><i class="fa-solid fa-trash me-2"></i></span>
                                                    Delete
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr id="tr4">
                                <td><input type="checkbox" id="vehicle1" name="vehicle1" value="Bike"></td>
                                <td>#11</td>
                                <td>Wiliam Carey</td>
                                <td>Installion Issues</td>
                                <td>Open</td>
                                <td>Medium</td>
                                <td class="avatar">
                                    <ul>
                                        <li>
                                            <a href="#">
                                                <img src="<?php echo e(asset('dashboard_assets/assets')); ?>/images/avatar/avatar1.png"
                                                    alt="avatar1.png">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <img src="<?php echo e(asset('dashboard_assets/assets')); ?>/images/avatar/avatar2.png"
                                                    alt="avatar2.png">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <img src="<?php echo e(asset('dashboard_assets/assets')); ?>/images/avatar/avatar3.png"
                                                    alt="avatar3.png">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <img src="<?php echo e(asset('dashboard_assets/assets')); ?>/images/avatar/avatar4.png"
                                                    alt="avatar4.png">
                                            </a>
                                        </li>
                                    </ul>
                                </td>
                                <td>26/11/2021</td>
                                <td class="text-center">
                                    <div class="dropdown">
                                        <a class="btn bg-transparent dropdown-toggle" href="#" role="button"
                                            id="dropdownMenuLink" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            <i class="fa-solid fa-ellipsis-vertical"></i>
                                        </a>

                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <li><a class="dropdown-item mt-2" href="#">
                                                    <span><i class="fa-solid fa-eye me-2"></i></span>
                                                    Details
                                                </a></li>
                                            <li><a class="dropdown-item mt-2" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal" data-bs-whatever="@mdo"
                                                    href=" #">
                                                    <span><i
                                                            class="fa-solid fa-circle-check me-2"></i></span>
                                                    Asignee
                                                </a></li>
                                            <li><a class="dropdown-item mt-2" href="#">
                                                    <span><i
                                                            class="fa-solid fa-pen-to-square me-2"></i></span>
                                                    Edit
                                                </a>
                                            </li>
                                            <li><a class="dropdown-item mt-2" href="#">
                                                    <span><i class="fa-solid fa-trash me-2"></i></span>
                                                    Delete
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr id="tr4">
                                <td><input type="checkbox" id="vehicle1" name="vehicle1" value="Bike"></td>
                                <td>#03</td>
                                <td>Wiliam Carey</td>
                                <td>Installion Issues</td>
                                <td>Close</td>
                                <td>High</td>
                                <td class="avatar">
                                    <ul>
                                        <li>
                                            <a href="#">
                                                <img src="<?php echo e(asset('dashboard_assets/assets')); ?>/images/avatar/avatar1.png"
                                                    alt="avatar1.png">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <img src="<?php echo e(asset('dashboard_assets/assets')); ?>/images/avatar/avatar2.png"
                                                    alt="avatar2.png">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <img src="<?php echo e(asset('dashboard_assets/assets')); ?>/images/avatar/avatar3.png"
                                                    alt="avatar3.png">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <img src="<?php echo e(asset('dashboard_assets/assets')); ?>/images/avatar/avatar4.png"
                                                    alt="avatar4.png">
                                            </a>
                                        </li>
                                    </ul>
                                </td>
                                <td>23/11/2021</td>
                                <td class="text-center">
                                    <div class="dropdown">
                                        <a class="btn bg-transparent dropdown-toggle" href="#" role="button"
                                            id="dropdownMenuLink" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            <i class="fa-solid fa-ellipsis-vertical"></i>
                                        </a>

                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <li><a class="dropdown-item mt-2" href="#">
                                                    <span><i class="fa-solid fa-eye me-2"></i></span>
                                                    Details
                                                </a></li>
                                            <li><a class="dropdown-item mt-2" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal" data-bs-whatever="@mdo"
                                                    href=" #">
                                                    <span><i
                                                            class="fa-solid fa-circle-check me-2"></i></span>
                                                    Asignee
                                                </a></li>
                                            <li><a class="dropdown-item mt-2" href="#">
                                                    <span><i
                                                            class="fa-solid fa-pen-to-square me-2"></i></span>
                                                    Edit
                                                </a>
                                            </li>
                                            <li><a class="dropdown-item mt-2" href="#">
                                                    <span><i class="fa-solid fa-trash me-2"></i></span>
                                                    Delete
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr id="tr4">
                                <td><input type="checkbox" id="vehicle1" name="vehicle1" value="Bike"></td>
                                <td>#10</td>
                                <td>Wiliam Carey</td>
                                <td>Installion Issues</td>
                                <td>Open</td>
                                <td>High</td>
                                <td class="avatar">
                                    <ul>
                                        <li>
                                            <a href="#">
                                                <img src="<?php echo e(asset('dashboard_assets/assets')); ?>/images/avatar/avatar1.png"
                                                    alt="avatar1.png">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <img src="<?php echo e(asset('dashboard_assets/assets')); ?>/images/avatar/avatar2.png"
                                                    alt="avatar2.png">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <img src="<?php echo e(asset('dashboard_assets/assets')); ?>/images/avatar/avatar3.png"
                                                    alt="avatar3.png">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <img src="<?php echo e(asset('dashboard_assets/assets')); ?>/images/avatar/avatar4.png"
                                                    alt="avatar4.png">
                                            </a>
                                        </li>
                                    </ul>
                                </td>
                                <td>23/11/2021</td>
                                <td class="text-center">
                                    <div class="dropdown">
                                        <a class="btn bg-transparent dropdown-toggle" href="#" role="button"
                                            id="dropdownMenuLink" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            <i class="fa-solid fa-ellipsis-vertical"></i>
                                        </a>

                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <li><a class="dropdown-item mt-2" href="#">
                                                    <span><i class="fa-solid fa-eye me-2"></i></span>
                                                    Details
                                                </a></li>
                                            <li><a class="dropdown-item mt-2" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal" data-bs-whatever="@mdo"
                                                    href=" #">
                                                    <span><i
                                                            class="fa-solid fa-circle-check me-2"></i></span>
                                                    Asignee
                                                </a></li>
                                            <li><a class="dropdown-item mt-2" href="#">
                                                    <span><i
                                                            class="fa-solid fa-pen-to-square me-2"></i></span>
                                                    Edit
                                                </a>
                                            </li>
                                            <li><a class="dropdown-item mt-2" href="#">
                                                    <span><i class="fa-solid fa-trash me-2"></i></span>
                                                    Delete
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr id="tr4">
                                <td><input type="checkbox" id="vehicle1" name="vehicle1" value="Bike"></td>
                                <td>#06</td>
                                <td>Wiliam Carey</td>
                                <td>Installion Issues</td>
                                <td>Open</td>
                                <td>High</td>
                                <td class="avatar">
                                    <ul>
                                        <li>
                                            <a href="#">
                                                <img src="<?php echo e(asset('dashboard_assets/assets')); ?>/images/avatar/avatar1.png"
                                                    alt="avatar1.png">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <img src="<?php echo e(asset('dashboard_assets/assets')); ?>/images/avatar/avatar2.png"
                                                    alt="avatar2.png">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <img src="<?php echo e(asset('dashboard_assets/assets')); ?>/images/avatar/avatar3.png"
                                                    alt="avatar3.png">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <img src="<?php echo e(asset('dashboard_assets/assets')); ?>/images/avatar/avatar4.png"
                                                    alt="avatar4.png">
                                            </a>
                                        </li>
                                    </ul>
                                </td>
                                <td>23/11/2021</td>
                                <td class="text-center">
                                    <div class="dropdown">
                                        <a class="btn bg-transparent dropdown-toggle" href="#" role="button"
                                            id="dropdownMenuLink" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            <i class="fa-solid fa-ellipsis-vertical"></i>
                                        </a>

                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <li><a class="dropdown-item mt-2" href="#">
                                                    <span><i class="fa-solid fa-eye me-2"></i></span>
                                                    Details
                                                </a></li>
                                            <li><a class="dropdown-item mt-2" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal" data-bs-whatever="@mdo"
                                                    href="#">
                                                    <span><i
                                                            class="fa-solid fa-circle-check me-2"></i></span>
                                                    Asignee
                                                </a></li>
                                            <li><a class="dropdown-item mt-2" href="#">
                                                    <span><i
                                                            class="fa-solid fa-pen-to-square me-2"></i></span>
                                                    Edit
                                                </a>
                                            </li>
                                            <li><a class="dropdown-item mt-2" href="#">
                                                    <span><i class="fa-solid fa-trash me-2"></i></span>
                                                    Delete
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app_backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ck\Desktop\work\SoCloseSociety-CRM\resources\views/layouts/dashboard.blade.php ENDPATH**/ ?>