            <!-- Start right Content here -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">

                    <!-- Top Bar Start -->
                    <div class="topbar">

                        <nav class="navbar-custom"> 
                            <!-- Search input -->
                            

                            <ul class="list-inline float-right mb-0">
                                <!-- Search -->
                               
                                <!-- Fullscreen -->
                                <li class="list-inline-item dropdown notification-list hidden-xs-down">
                                    <a class="nav-link waves-effect" href="#" id="btn-fullscreen">
                                        <i class="mdi mdi-fullscreen noti-icon"></i>
                                    </a>
                                </li>
                                <!-- notification-->
                                <li class="list-inline-item dropdown notification-list">
                                    <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#" role="button"
                                       aria-haspopup="false" aria-expanded="false">
                                        <i class="ion-ios7-bell noti-icon"></i>
                                        <span class="badge badge-danger noti-icon-badge"><?php 
                            $no=mysqli_num_rows(mysqli_query($con,"SELECT * from notify WHERE notify_to=$_SESSION[agency_id]")); 
                            if($no)
                            {
                                echo $no;
                            }
                            else 
                            {
                                echo 0;
                            }
                            ?></span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-menu-lg">
                                        <!-- item-->
                                        <div class="dropdown-item noti-title">
                                            <h5>Notification (<?php 
                            $no=mysqli_num_rows(mysqli_query($con,"SELECT * from notify WHERE notify_to=$_SESSION[agency_id]")); 
                            if($no)
                            {
                                echo $no;
                            }
                            else 
                            {
                                echo 0;
                            }
                            ?>)</h5>
                                        </div>

                                        <!-- item-->
                                        

                                        <!-- item-->
                                        

                                        <!-- item-->
                                        <?php 
                                            $query=mysqli_query($con,"SELECT * FROM notify WHERE notify_to=$_SESSION[agency_id]") or die(mysqli_error($con));
                                            if(mysqli_num_rows($query)){
                                            while($row=mysqli_fetch_array($query)){
                                            ?>
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="notify-icon bg-info"><i class="mdi mdi-martini"></i></div>
                                            <p class="notify-details"><b><?php echo $row['subject']; ?></b><small class="text-muted"><?php echo $row['message']; ?></small></p>
                                        </a>
                                        <?php
                                            }
                                            }
                                         ?>
                                        <!-- All-->
                                        

                                    </div>
                                </li>
                                <!-- User-->
                                <li class="list-inline-item dropdown notification-list">
                                    <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button"
                                       aria-haspopup="false" aria-expanded="false">
                                        <img src="assets/images/users/avatar-1.png" alt="user" class="rounded-circle">
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                        <!-- <a class="dropdown-item" href="#"><i class="dripicons-user text-muted"></i> Profile</a> -->
                                        
                                        <a class="dropdown-item" href="includes/logout.php"><i class="dripicons-exit text-muted"></i> Logout</a>
                                    </div>
                                </li>
                            </ul>
