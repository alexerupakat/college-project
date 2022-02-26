<?php include 'includes/connection.php'; ?>
<header class="header menu_fixed">
		<div id="logo">
			<a href="index.php" title="GetMyBus">
				<img src="img/logo1.png" width="400" height="70" alt="" class="logo_normal">
				<img src="img/logo.png" width="250" height="50" alt="" class="logo_sticky">
			</a>
		</div>
		<ul id="top_menu">
			<?php 
			if(!isset($_SESSION['c_email']))
			{
		?>
				<li><a href="login/login.php" class="btn_add">Signin</a></li>
				<li><a href="login/register.php" class="btn_add">Signup</a></li>
		<?php
			}
			else
			{
		 ?>
		 <li><a href="customer/index.php" class="btn_add">My Account</a></li>
		 <li><a href="includes/logout.php" class="btn_add">Logout</a></li>
		 <?php
		}
		?>
		</ul>
		<!-- /top_menu -->
		<a href="#menu" class="btn_mobile">
			<div class="hamburger hamburger--spin" id="hamburger">
				<div class="hamburger-box">
					<div class="hamburger-inner"></div>
				</div>
			</div>
		</a>
		<nav id="menu" class="main-menu">
                        <ul>
                            <li><span><a href="index.php">Home</a></span>
                            </li>
                            <li><span><a href="media-gallery.php">Buses</a></span>
                            </li>
                            <li><span><a href="about.php">About</a></span>
                            </li>
                            <li><span><a href="contacts.php">Contact</a></span>
                            </li>
                            <!-- <li><span><a href="faq.php">FAQ</a></span></li> -->
                        </ul>
                    </nav>
	</header>