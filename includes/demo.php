<ul id="top_menu">
<?php if(!isset($_SESSION['c_email'])) 
		{?>
		
						<li><a href="includes/logout.php" class="btn_add">Logout</a></li>
					
					<?php}elseif (isset($_SESSION['c_email'])) 
					{
						?>
						
						<li><a href="login.php" class="btn_add">Signin</a></li>
						<li><a href="register.php" class="btn_add">Signup</a></li>
					
					<?php
					}?>