	<header class="header_in is_sticky menu_fixed">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-12">
					<div id="logo">
						<a href="index.php">
							<img src="img/1.png" width="250" height="45" alt="" class="logo_sticky">
						</a>
					</div>
				</div>
				<div class="col-lg-9 col-12">
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
		 <li><a href="customer/includes/logout.php" class="btn_add">Logout</a></li>
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
<!--                             <li><span><a href="faq.php">FAQ</a></span></li> -->
                        </ul>
                    </nav>
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->		
	</header>