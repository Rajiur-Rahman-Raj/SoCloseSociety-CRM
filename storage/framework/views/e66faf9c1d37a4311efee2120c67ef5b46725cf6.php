<?php $__env->startSection('content'); ?>

<?php if(Auth::user()->role_id == 1): ?>
<div class="container-fluid px-4">
    <!--==========Team Header==========-->
    <div class="current_ticket mt-3 d-flex justify-content-between flex-wrap">
        <div class="current_ticket__left">
            <div class="current_ticket__left__btn">
                <button class="btn item active">Current Ticket</button>
                <button class="btn item">Open Ticket</button>
                <button class="btn item">Closed Ticket</button>
                <button class="btn item">Solved Ticket</button>
                <button class="btn item">All</button>
            </div>
        </div>

        <div class="current_ticket__right">
            <div class="current_ticket__right__btn d-flex">
                <div class="current_ticket__right__btn__div me-2">
                    <button class="btn" data-bs-toggle="modal" data-bs-target="#createTicket" data-bs-whatever="@mdo">
                        <span><i class="fa-solid fa-circle-plus me-2"></i></span>
                        Create Ticket
                    </button>
                </div>

                <!--=====Create Tickets=====-->
                <div class="modal fade" id="createTicket" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header border-bottom-0">
                                <h5 style="color: #6C7BFF;" class="modal-title" id="exampleModalLabel">Create Ticket</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="<?php echo e(route('ticket.store')); ?>" method="post">
                                    <?php echo csrf_field(); ?>
                                    <div class="offcanvas-body">
                                        <label for="#">Roles</label>
                                        <select name="role" id="role_dropdown" class="form-select mt-1">
                                            <option selected disabled>Select Role</option>
                                            <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($item->id); ?>"><?php echo e($item->role); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>

                                        <label class="mt-3" for="#">Customers</label>
                                        
                                        <select name="customer" id="user_dropdown" class="form-select mt-1" aria-label="Default select example">
                                            <?php
                                                $show_users = [];
                                            ?>
                                            <?php echo $__env->make('includes.user_dropdown', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        </select>

                                        <label class="mt-3" for="#">Subject</label>
                                        <input type="text" name="subject" class="form-control mt-2" value="<?php echo e(old('subject')); ?>">

                                        <label class="mt-3" for="#">Department</label>
                                        <select name="department" class="form-select mt-1" aria-label="Default select example">
                                            <option selected disabled>Select Department</option>
                                            <?php $__currentLoopData = $department; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        </select>

                                        <label class="mt-3" for="#">Status</label>
                                        <select name="status" class="form-select mt-1" aria-label="Default select example">
                                            <option selected disabled>Select Ticket Status</option>
                                            <?php $__currentLoopData = $status; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>

                                        <label class="mt-3" for="#">Priority</label>
                                        <select name="priority" class="form-select mt-1" aria-label="Default select example">
                                            <option selected disabled>Select Ticket Priority</option>
                                            <?php $__currentLoopData = $priority; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>

                                        <label class="mt-3" for="#">Ticket Body</label>
                                        <textarea name="ticket_body" class="form-control" id="ticket_body" cols="30" rows="4"><?php echo e(old('ticket_body')); ?></textarea>

                                        <input type="hidden" name="creator" class="form-control mt-2" value="1">


                                        <button class="btn w-100 create_ticket_btn mt-3">Create Ticket</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                <!--======End Create Tickets=====-->
            </div>
        </div>

    </div>

    <div class="current_tickets_heading d-flex justify-content-between mt-5 mb-0">
        <div class="current_tickets_heading__left">
            <h3>Current Tickets</h3>
        </div>
        <div class="current_tickets_heading__right">
            <div class="input-group mb-3">
                <button class="btn bg-white type=" button " id="button-addon1 ">
                    <i class="fa-solid fa-magnifying-glass "></i>
                </button>
                <input type="text " class="form-control border-0 " placeholder="Search Tickets.. "
                    aria-label="Example text with button addon " aria-describedby="button-addon1 ">
            </div>
        </div>
    </div>
    <!--==========Current Ticket Table===========-->
    <div class="current_tickets_table ">
        <div class="support_ticket ">
            <div class="col-lg-12 ">
                <div class="support ">
                    <div class="support_table table-responsive" style="overflow: unset">
                        <table id="myTable " class="table table-hover b-t " class="display nowrap "
                            style="width:100% ">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Department</th>
                                    <th>Subjects</th>
                                    <th>Status</th>
                                    <th>Priority</th>
                                    <th>Created Date</th>
                                    <th>Reply</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <?php $__currentLoopData = $tickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr id="tr1 ">
                                    <td>#<?php echo e($item->id); ?></td>
                                    <td>
                                        <?php echo e($item->get_customer->name ?? ''); ?>

                                    </td>
                                    <td><?php echo e($item->get_department->name); ?></td>
                                    <td><?php echo e($item->subject); ?></td>
                                    <td><?php echo e($item->get_status->name ?? ''); ?></td>
                                    <td><?php echo e($item->get_priority->name ?? ''); ?></td>
                                    <td><?php echo e($item->created_at->format('d-M-Y')); ?></td>

                                    <td>
                                        <?php
                                            $all_replies = App\Models\Ticket_reply::where('ticket_id', $item->id)->get();
                                        ?>
                                        <a href=" <?php echo e(route('ticket.reply', $item->id)); ?> "> <i class="fa-solid fa-reply-all" class="replay-icon-css"></i> <span> ( <?php echo e(count($all_replies)); ?> )</span> </a>
                                    </td>
                                    <td class="text-center ">
                                        <div class="dropdown">

                                            <a class="btn bg-transparent dropdown-toggle" href="#"
                                                role="button" id="dropdownMenuLink"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fa-solid fa-ellipsis-vertical"></i>
                                            </a>

                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <li class="m-2">
                                                    <a style="cursor: pointer;"  href="<?php echo e(route('ticket.show', $item->id)); ?>">
                                                        <span><i class="fa-solid fa-eye me-2"></i></span>
                                                        Show
                                                    </a>
                                                </li>
                                                <li class="m-2">

                                                    <?php if($item->creator == 1): ?>
                                                    <a style="cursor: pointer" data-bs-toggle="modal" data-bs-target="#editTicket_<?php echo e($item->id); ?>" data-bs-whatever="@mdo">
                                                        <span><i class="fa-solid fa-edit me-2"></i></span>
                                                        Edit
                                                    </a>
                                                    <?php else: ?>
                                                    <a style="cursor: pointer" data-bs-toggle="modal" data-bs-target="#edit_admin_customer_Ticket_<?php echo e($item->id); ?>" data-bs-whatever="@mdo">
                                                        <span><i class="fa-solid fa-edit me-2"></i></span>
                                                        Edit
                                                    </a>
                                                    <?php endif; ?>

                                                </li>
                                                <li class="m-2">
                                                    <a style="cursor: pointer" data-bs-toggle="modal" data-bs-target="#deleteTicket_<?php echo e($item->id); ?>" data-bs-whatever="@mdo">
                                                        <span><i class="fa-solid fa-trash me-2"></i></span>
                                                        Delete
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>



                                
                                <div class="modal fade" id="editTicket_<?php echo e($item->id); ?>" tabindex="-1" aria-labelledby="editModalLabel"
                                aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header border-bottom-0">
                                                <h5 style="color: #6C7BFF;" class="modal-title" id="editModalLabel">Update Ticket</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="<?php echo e(route('ticket.update', $item->id)); ?>" method="post">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field("PUT"); ?>
                                                    <div class="offcanvas-body">
                                                        <label for="#">Roles</label>
                                                        <select name="role" id="role_drop" class="form-select mt-1">
                                                            <option selected disabled>Select Role</option>
                                                            <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($role->id); ?>" <?php echo e($role->id == $item->id ? 'selected' : ''); ?>><?php echo e($role->role); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>

                                                        <label class="mt-3" for="#">Customers</label>
                                                        
                                                        <select name="customer" id="user_drop" class="form-select mt-1" aria-label="Default select example">
                                                            <?php
                                                                $show_users = [];
                                                            ?>
                                                            <?php echo $__env->make('includes.user_dropdown', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                        </select>

                                                        <label class="mt-3" for="#">Subject</label>
                                                        <input type="text" name="subject" class="form-control mt-2" value="<?php echo e($item->subject); ?>">

                                                        <label class="mt-3" for="#">Department</label>
                                                        <select name="department" class="form-select mt-1" aria-label="Default select example">
                                                            <option selected disabled>Select Department</option>
                                                            <?php $__currentLoopData = $department; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dept): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($dept->id); ?>" <?php echo e($dept->id == $item->id ? 'selected' : ''); ?>><?php echo e($dept->name); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>


                                                        <label class="mt-3" for="#">Status</label>
                                                        <select name="status" class="form-select mt-1" aria-label="Default select example">
                                                            <option selected disabled>Select Ticket Status</option>
                                                            <?php $__currentLoopData = $status; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($stat->id); ?>" <?php echo e($stat->id == $item->id ? 'selected' : ''); ?>><?php echo e($stat->name); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>

                                                        <label class="mt-3" for="#">Priority</label>
                                                        <select name="priority" class="form-select mt-1" aria-label="Default select example">
                                                            <option selected disabled>Select Ticket Priority</option>
                                                            <?php $__currentLoopData = $priority; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($prio->id); ?>" <?php echo e($prio->id == $item->id ? 'selected' : ''); ?>><?php echo e($prio->name); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>

                                                        <label class="mt-3" for="#">Ticket Body</label>
                                                        <textarea name="ticket_body" class="form-control" id="ticket_body" cols="30" rows="4"><?php echo e($item->ticket_body); ?></textarea>

                                                        <button class="btn w-100 create_ticket_btn mt-3">Update Ticket</button>
                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                
                                <div class="modal fade" id="edit_admin_customer_Ticket_<?php echo e($item->id); ?>" tabindex="-1" aria-labelledby="editModalLabel"
                                aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header border-bottom-0">
                                                <h5 style="color: #6C7BFF;" class="modal-title" id="editModalLabel">Update Ticket</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="<?php echo e(route('ticket.update', $item->id)); ?>" method="post">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field("PUT"); ?>
                                                    <div class="offcanvas-body">


                                                        <label class="mt-3" for="#">Ticket Id</label>
                                                        <input type="text" name="customer" class="form-control mt-1" value="<?php echo e($item->id); ?>">

                                                        <label class="mt-3" for="#">Subject</label>
                                                        <input type="hidden" name="subject" class="form-control mt-1" value="<?php echo e($item->subject); ?>">


                                                        <label class="mt-3" for="#">Status</label>
                                                        <select name="status" class="form-select mt-1" aria-label="Default select example">
                                                            <option value="" disabled selected>--Select One--</option>
                                                            <?php $__currentLoopData = $status; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($stat->id); ?>"><?php echo e($stat->name); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>

                                                        <label class="mt-3" for="#">Priority</label>
                                                        <select name="priority" class="form-select mt-1" aria-label="Default select example">
                                                            <option value="" disabled selected>--Select One--</option>
                                                            <?php $__currentLoopData = $priority; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($prio->id); ?>"><?php echo e($prio->name); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>




                                                        <label class="mt-3" for="#">Department</label>
                                                        <select name="department" id="" class="form-control">
                                                            <?php $__currentLoopData = $department; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $single_dept): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                            <?php if( $item->get_department->id == $single_dept->id ): ?>
                                                            <option value="<?php echo e($item->get_department->id); ?>"><?php echo e($single_dept->name); ?></option>
                                                            <?php endif; ?>

                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>

                                                        <label class="mt-3" for="agent_id">Agent</label>

                                                        <select name="agent_id[]" id="agent_dropdown<?php echo e($item->id); ?>" class="form-select mt-1" aria-label="Default select example" multiple="multiple" style="width: 100%">
                                                            <?php
                                                                $all_agent = json_decode($item->get_department->user_id);
                                                            ?>

                                                            <?php $__currentLoopData = $all_agent; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $agent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php
                                                                $agent_name = App\Models\User::find($agent)->name;
                                                                $agent_id = App\Models\User::find($agent)->id;
                                                                $agent_email = App\Models\User::find($agent)->email;
                                                            ?>

                                                            <option value="<?php echo e($agent_id); ?>"><?php echo e(ucwords($agent_name)); ?></option>

                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>

                                                            <?php $__currentLoopData = $all_agent; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $agent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php
                                                                $agent_email = App\Models\User::find($agent)->email;
                                                            ?>

                                                            <input type="hidden" value="<?php echo e($agent_email); ?>" name="agent_email[]">

                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                        <button class="btn w-100 create_ticket_btn mt-3">Update Ticket</button>
                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>


                                
                                <div class="modal fade" id="deleteTicket_<?php echo e($item->id); ?>" tabindex="-1" aria-labelledby="daleteModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="daleteModalLabel">Delete Ticket</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <h6>Are You Sure?</h6>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                                    <form action="<?php echo e(route('ticket.destroy', $item->id)); ?>" method="POST">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field("DELETE"); ?>
                                                        <button type="submit" class="btn btn-danger">Delete
                                                    </form>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php else: ?>
<div class="container-fluid px-4">
    <!--==========Team Header==========-->
    <div class="current_ticket mt-3 d-flex justify-content-between flex-wrap">
        <div class="current_ticket__left">

        </div>

        <div class="current_ticket__right">
            <div class="current_ticket__right__btn d-flex">
                <div class="current_ticket__right__btn__div me-2">
                    <button class="btn" data-bs-toggle="modal" data-bs-target="#createTicket" data-bs-whatever="@mdo">
                        <span><i class="fa-solid fa-circle-plus me-2"></i></span>
                        Create Ticket
                    </button>
                </div>

                <!--=====Create Tickets=====-->
                <div class="modal fade" id="createTicket" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header border-bottom-0">
                                <h5 style="color: #6C7BFF;" class="modal-title" id="exampleModalLabel">Create Ticket</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="<?php echo e(route('customer_ticket.store')); ?>" method="post">
                                    <?php echo csrf_field(); ?>
                                    <div class="offcanvas-body">
                                        <label class="mt-3" for="#">Subject</label>
                                        <input type="text" name="subject" class="form-control mt-2" value="<?php echo e(old('subject')); ?>">

                                        <label class="mt-3" for="#">Department</label>
                                        <select name="department" class="form-select mt-1" aria-label="Default select example">
                                            <option selected disabled>Select Department</option>
                                            <?php $__currentLoopData = $department; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        </select>


                                        <label class="mt-3" for="#">Ticket Body</label>
                                        <input type="hidden" name="ticket_body" id="ticket_body" class="form-control mt-2">
                                        <textarea name="ticket_body" class="form-control" id="ticket_body" cols="30" rows="4"><?php echo e(old('ticket_body')); ?></textarea>

                                        <input type="hidden" name="creator" class="form-control mt-2" value="2">
                                        <button class="btn w-100 create_ticket_btn mt-3">Create Ticket</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                <!--======End Create Tickets=====-->
            </div>
        </div>

    </div>

    <div class="current_tickets_heading d-flex justify-content-between mt-5 mb-0">
        <div class="current_tickets_heading__left">

            <h3>Your Tickets</h3>
        </div>
        <div class="current_tickets_heading__right">
            <div class="input-group mb-3">
                <button class="btn bg-white" type="button" id="button-addon1">
                    <i class="fa-solid fa-magnifying-glass "></i>
                </button>
                <input type="text " class="form-control border-0 " placeholder="Search Tickets.. "
                    aria-label="Example text with button addon " aria-describedby="button-addon1 ">
            </div>
        </div>
    </div>
    <!--==========Current Ticket Table===========-->
    <div class="current_tickets_table ">
        <div class="support_ticket ">
            <div class="col-lg-12 ">
                <div class="support ">
                    <div class="support_table table-responsive" style="overflow: unset">
                        
                        <?php
                        $customer_ticket = App\Models\Ticket::where('customer', Auth::id())->get();
                        ?>
                        <table id="myTable " class="table table-hover b-t " class="display nowrap "
                        style="width:100% ">
                        <?php if($customer_ticket): ?>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Department</th>
                                    <th>Subjects</th>
                                    <th>Status</th>
                                    <th>Priority</th>
                                    <th>Created Date</th>
                                    <th>Reply</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $__currentLoopData = $customer_ticket; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr id="tr1 ">

                                    <td>#<?php echo e($item->id); ?></td>
                                    <td><?php echo e($item->get_customer->name); ?></td>
                                    <td><?php echo e($item->get_department->name); ?></td>
                                    <td><?php echo e($item->subject); ?></td>
                                    <td><?php echo e($item->get_status->name ?? ''); ?></td>
                                    <td><?php echo e($item->get_priority->name ?? ''); ?></td>
                                    <td><?php echo e($item->created_at->format('d-M-Y')); ?></td>
                                    <?php
                                       $all_replies = App\Models\Ticket_reply::where('ticket_id', $item->id)->get();
                                    ?>
                                    <td>

                                        <a href=" <?php echo e(route('ticket.reply', $item->id)); ?> "> <i class="fa-solid fa-reply-all" class="replay-icon-css"></i> <span> ( <?php echo e(count($all_replies)); ?> )</span> </a>

                                    </td>
                                    <td class="text-center ">
                                        <div class="dropdown">

                                            <a class="btn bg-transparent dropdown-toggle" href="#"
                                                role="button" id="dropdownMenuLink"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fa-solid fa-ellipsis-vertical"></i>
                                            </a>

                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <li class="m-2">
                                                    <a style="cursor: pointer" href="<?php echo e(route('customer_ticket.show', $item->id)); ?>" data-bs-whatever="@mdo">
                                                        <span><i class="fa-solid fa-edit me-2"></i></span>
                                                        Show
                                                    </a>
                                                </li>
                                                
                                                <li class="m-2">
                                                    <a style="cursor: pointer" data-bs-toggle="modal" data-bs-target="#editCustomerTicket_<?php echo e($item->id); ?>" data-bs-whatever="@mdo">
                                                        <span><i class="fa-solid fa-edit me-2"></i></span>
                                                        Edit
                                                    </a>
                                                </li>
                                                <li class="m-2">
                                                    <a style="cursor:pointer" data-bs-toggle="modal" data-bs-target="#deleteCustomerTicket_<?php echo e($item->id); ?>" data-bs-whatever="@mdo">
                                                        <span><i class="fa-solid fa-trash me-2"></i></span>
                                                        Delete
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>

                                
                                <div class="modal fade" id="deleteCustomerTicket_<?php echo e($item->id); ?>" tabindex="-1" aria-labelledby="daleteModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="daleteModalLabel">Delete Ticket</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <h6>Are You Sure?</h6>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                                    <form action="<?php echo e(route('customer_ticket.destroy', $item->id)); ?>" method="POST">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field("DELETE"); ?>
                                                        <button type="submit" class="btn btn-danger">Delete
                                                    </form>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                
                                <div class="modal fade" id="editCustomerTicket_<?php echo e($item->id); ?>" tabindex="-1" aria-labelledby="editModalLabel"
                                    aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header border-bottom-0">
                                                    <h5 style="color: #6C7BFF;" class="modal-title" id="editModalLabel">Update Ticket</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="<?php echo e(route('ticket.update', $item->id)); ?>" method="post">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field("PUT"); ?>
                                                        <div class="offcanvas-body">

                                                            <label class="mt-3" for="#">Subject</label>
                                                            <input type="text" name="subject" class="form-control mt-2" value="<?php echo e($item->subject); ?>">

                                                            <label class="mt-3" for="#">Department</label>
                                                            <select name="department" class="form-select mt-1" aria-label="Default select example">
                                                                <option selected disabled>Select Department</option>
                                                                <?php $__currentLoopData = $department; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dept): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($dept->id); ?>" <?php echo e($dept->id == $item->id ? 'selected' : ''); ?>><?php echo e($dept->name); ?></option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </select>
                                                            </select>

                                                            <label class="mt-3" for="#">Ticket Body</label>

                                                            <textarea name="ticket_body" class="form-control" id="ticket_body" cols="30" rows="4"><?php echo e($item->ticket_body); ?></textarea>

                                                            <button class="btn w-100 create_ticket_btn mt-3">Update Ticket</button>
                                                        </div>
                                                    </form>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php echo $__env->make('admin.agent.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </tbody>
                            <?php endif; ?>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>


<?php $__env->stopSection(); ?>



<?php $__env->startSection('js'); ?>



<?php $__currentLoopData = $tickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <script>

        $(document).ready(function() {
            $('#agent_dropdown<?php echo e($item->id); ?>').select2({theme: "classic"});
        });

    </script>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


<script>
    $(document).ready(function() {
        $('#role_dropdown').change(function() {

            var role_id = $(this).val();
            // alert(role_id)
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'POST',
                url: "<?php echo e(route('get.users')); ?>",
                data: {
                    role_id: role_id
                },
                success: function(data) {
                    $('#user_dropdown').html(data.data)
                    // console.log(data);
                }
            })
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#role_drop').change(function() {

            var role_id = $(this).val();
            // alert(role_id)
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'POST',
                url: "<?php echo e(route('edit.users')); ?>",
                data: {
                    role_id: role_id
                },
                success: function(data) {
                    $('#user_drop').html(data.data)
                    // console.log(data);
                }
            })
        });
    });
</script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app_backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\HP\Desktop\SoCloseSociety-CRM\resources\views/admin/ticket/index.blade.php ENDPATH**/ ?>