<header class="header white-bg">
              <div class="sidebar-toggle-box">
                  <i class="fa fa-bars"></i>
              </div>
            <!--logo start-->
            <a href="index.php" class="logo"><img src="img/1.png" width="250" height="45" alt="" class="logo_sticky"></a>
            <!--logo end-->
            <div class="nav notify-row" id="top_menu">
                <!--  notification start -->
                <ul class="nav top-menu">
                    <!-- settings start -->
                    
                    <!-- inbox dropdown end -->
                    <!-- notification dropdown start-->
                    <li id="header_notification_bar" class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <i class="fa fa-bell-o"></i>
                            <span class="badge badge-warning"><?php 
                            $no=mysqli_num_rows(mysqli_query($con,"SELECT * from notify WHERE notify_to=$_SESSION[cid]")); 
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
                        <ul class="dropdown-menu extended notification">
                            <div class="notify-arrow notify-arrow-yellow"></div>
                            <li>
                                <p class="yellow">You have <?php 
                            $no=mysqli_num_rows(mysqli_query($con,"SELECT * from notify WHERE notify_to=$_SESSION[cid]")); 
                            if($no)
                            {
                                echo $no;
                            }
                            else
                            {
                                echo 0;
                            }
                            ?> new notifications</p>
                            </li>
                            <?php 
                                            $query=mysqli_query($con,"SELECT * FROM notify WHERE notify_to=$_SESSION[cid]") or die(mysqli_error($con));
                                            if(mysqli_num_rows($query)){
                                            while($row=mysqli_fetch_array($query)){
                                            ?>
                            <li>
                                <a href="#">
                                    <span class="label label-danger"><i class="fa fa-bolt"></i></span>
                                    <?php echo $row['subject']; ?>
                                    <!-- <span class="small italic">34 mins</span> -->
                                </a>
                            </li>
                            
                            <?php
                                            }
                                            }
                                         ?>
                        </ul>
                    </li>
                        </ul>
                    </li>
                    <!-- notification dropdown end -->
                </ul>
                <!--  notification end -->
            </div>
            
            <div class="top-nav ">
                <!--search & user info start-->
                <ul class="nav pull-right top-menu">
                    
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <img alt="" src="img/avatar1_small.png" width="30">
                            <span class="username"><span class="username"><?php
              $query=mysqli_query($con,"SELECT * from customer where customer_id=$_SESSION[cid]") or die(mysqli_error($con));
        if(mysqli_num_rows($query)){
          if($fetch=mysqli_fetch_array($query))
          {
             echo $fetch['customer_name']; 
               
            }
          }
          ?></span></span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout dropdown-menu-right">
                            <div class="log-arrow-up"></div>
                            <li><a href="profile.php"><i class=" fa fa-suitcase"></i>Profile</a></li>
                            <!-- <li><a href="../index.php"><i class="fa fa-cog"></i> Home</a></li> -->
                           
                            <li><a href="includes/logout.php"><i class="fa fa-key"></i> Log Out</a></li>
                        </ul>
                    </li>
                    <li class="sb-toggle-right">
                        <i class="fa  fa-align-right"></i>
                    </li>
                    <!-- user login dropdown end -->
                </ul>
                <!--search & user info end-->
            </div>
        </header>