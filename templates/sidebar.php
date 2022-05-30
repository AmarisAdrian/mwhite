<?php
/*
////////////// Teameyo Project Management System  //////////////////////
//////////////////// All Pages Sidebar //////////////////////////
*/

function active($currect_page)
{
	$base_url_array =  explode('/', $_SERVER['REQUEST_URI']);
	$base_url = end($base_url_array);
	if ($currect_page == $base_url) {
		return 'active'; //class name in css 
	}
}

?>
<div class="sidebar-admin col-lg-3 col-md-3 col-sm-12">
	<div class="logo-admin-area">
		<div class="cross-mobile"><i class="fa fa-times" aria-hidden="true"></i></div>
		<div class="mobile-welcome">
			<div class="msr-wrapc">
				<div class="msg-img">
					<img src="<?php echo $base_url; ?>assets/images/upload-img.jpg" class="img-fluid rounded-circle" />
				</div>
				<div class="msg-welcome">
					<span>Bienvenid@</span>
					<br>
					<?php echo $username; ?>
				</div>
			</div>
		</div>
		<?php if ($logo) { ?>
			<img src="<?php echo $base_url . $img_path . $logo; ?>" class="img-fluid" />
		<?php } else { ?>
			<img src="<?php echo $base_url; ?>images/users/client-side-logo.png" class="img-fluid" />
		<?php } ?>
	</div><!-- logo-admin-area -->
	<div class="admin-nav-area">
		<?php if ($user_info->role == 1) { ?>
			<div class="bigbutton"><a href="<?php echo $base_url; ?>admin/add-new-project.php"><?php echo $lang['Create project']; ?> <span>+</span></a></div>
			<ul class="list-unstyled">
				<li class="<?php echo active('index.php'); ?>"> <a href="<?php echo $base_url; ?>admin/index.php"><span><i class="fa fa-tachometer" aria-hidden="true"></i></span><?php echo $lang['Dashboard']; ?> <i class="fa fa-chevron-right"></i></a></li>
				<li class="<?php echo active('clients.php');
							echo active('add-client.php'); ?>"> <a href="#" data-toggle="collapse" data-target="#client-menu"><span><i class="fa fa-user" aria-hidden="true"></i></span> <?php echo $lang['Clients']; ?> <i class="fa fa-plus" aria-hidden="true"></i></a>
					<ul id="client-menu" class="collapse">
						<li class="<?php echo active('clients.php'); ?>"><a href="<?php echo $base_url; ?>admin/clients.php">-- <?php echo $lang['View All Clients']; ?> <i class="fa fa-chevron-right"></i></a></li>
						<li class="<?php echo active('add-client.php'); ?>"><a href="<?php echo $base_url; ?>admin/add-client.php">-- <?php echo $lang['Add New Client']; ?> <i class="fa fa-chevron-right"></i></a></li>
					</ul>
				</li>
				<li class="<?php echo active('staff.php'); ?>"> <a href="#" data-toggle="collapse" data-target="#staff-menu"><span><i class="fa fa-users" aria-hidden="true"></i></span><?php echo $lang['Staff']; ?> <i class="fa fa-plus" aria-hidden="true"></i></a>
					<ul id="staff-menu" class="collapse">
						<li class="<?php echo active('staff.php'); ?>"><a href="<?php echo $base_url; ?>admin/staff.php">-- <?php echo $lang['View All Staff']; ?> <i class="fa fa-chevron-right"></i></a></li>
						<li class="<?php echo active('add-staff.php'); ?>"><a href="<?php echo $base_url; ?>admin/add-staff.php">-- <?php echo $lang['Add Staff']; ?> <i class="fa fa-chevron-right"></i></a></li>
					</ul>
				</li>
				<li class="<?php echo active('projects.php'); ?>"> <a href="<?php echo $base_url; ?>admin/projects.php"><span><i class="fa fa-tasks" aria-hidden="true"></i></span><?php echo $lang['Projects']; ?> <i class="fa fa-chevron-right"></i></a></li>
				<li class="<?php echo active('paid-invoices.php');
							echo active('unpaid-invoices.php'); ?>"> <a href="#" data-toggle="collapse" data-target="#financials-menu"><span><i class="fa fa-university" aria-hidden="true"></i></span> <?php echo $lang['Financials']; ?> <i class="fa fa-plus" aria-hidden="true"></i></a>
					<ul id="financials-menu" class="collapse">
						<li class="<?php echo active('paid-invoices.php'); ?>"><a href="<?php echo $base_url; ?>admin/paid-invoices.php">-- <?php echo $lang['Paid Invoices']; ?> <i class="fa fa-chevron-right"></i></a></li>
						<li class="<?php echo active('unpaid-invoices.php'); ?>"><a href="<?php echo $base_url; ?>admin/unpaid-invoices.php">-- <?php echo $lang['Unpaid Invoices']; ?> <i class="fa fa-chevron-right"></i></a></li>
					</ul>
				</li>
				<li class="<?php echo active('messages.php'); ?>">
					<form action="<?php echo $base_url; ?>messages.php?project_id=0" method="post"><input type="hidden" name="project_id" value="0" /><button type="submit" name="chat"><span><i class="fa fa-comments-o" aria-hidden="true"></i></span><?php echo $lang['Team Chat']; ?><i class="fa fa-chevron-right"></i></button></form>
				</li>
				<li class="<?php echo active('system-settings.php'); ?>"> <a href="<?php echo $base_url; ?>admin/system-settings.php"><span><i class="fa fa-cogs" aria-hidden="true"></i></span><?php echo $lang['System Settings']; ?> <i class="fa fa-chevron-right"></i></a></li>
				<li class="<?php echo active('edit-profile.php'); ?> mobile-show"> <a href="<?php echo $base_url; ?>admin/edit-profile.php"><span><i class="fa fa-user" aria-hidden="true"></i></span><?php echo $lang['Profile']; ?> <i class="fa fa-chevron-right"></i></a></li>
				<li class="<?php echo active('logout.php'); ?> mobile-show"> <a href="<?php echo $base_url; ?>logout.php"><span><i class="fa fa-sign-out" aria-hidden="true"></i></span><?php echo $lang['Logout']; ?> <i class="fa fa-chevron-right"></i></a></li>
			</ul>
		<?php } else if ($user_info->role == 3) { ?>
			<ul class="list-unstyled">
				<li class="<?php echo active('index.php'); ?>"> <a href="<?php echo $base_url; ?>staff/index.php"><span><i class="fa fa-tachometer" aria-hidden="true"></i></span><?php echo $lang['Dashboard']; ?> <i class="fa fa-chevron-right"></i></a></li>
				<li class="<?php echo active('staff.php'); ?>"> <a href="<?php echo $base_url; ?>staff/staff.php"><span><i class="fa fa-users" aria-hidden="true"></i></span><?php echo $lang['Staff']; ?> <i class="fa fa-chevron-right"></i></a></li>
				<li class="<?php echo active('projects.php'); ?>"> <a href="<?php echo $base_url; ?>staff/projects.php"><span><i class="fa fa-tasks" aria-hidden="true"></i></span><?php echo $lang['Projects']; ?> <i class="fa fa-chevron-right"></i></a></li>
				<li class="<?php echo active('messages.php'); ?>">
					<form action="<?php echo $base_url; ?>messages.php?project_id=0" method="post"><input type="hidden" name="project_id" value="0" /><button type="submit" name="chat"><span><i class="fa fa-comments-o" aria-hidden="true"></i></span><?php echo $lang['Team Chat']; ?><i class="fa fa-chevron-right"></i></button></form>
				</li>
				<li class="<?php echo active('edit-profile.php'); ?>"> <a href="<?php echo $base_url; ?>staff/edit-profile.php"><span><i class="fa fa-user" aria-hidden="true"></i></span><?php echo $lang['Edit Profile']; ?> <i class="fa fa-chevron-right"></i></a></li>
				<li class="<?php echo active('logout.php'); ?>"> <a href="<?php echo $base_url; ?>logout.php"><span><i class="fa fa-sign-out" aria-hidden="true"></i></span><?php echo $lang['Logout']; ?><i class="fa fa-chevron-right"></i></a></li>
			</ul>
		<?php } else { ?>
			<ul class="list-unstyled">
				<li class="<?php echo active('index.php'); ?>">
					<a href="<?php echo $base_url; ?>client/index.php">
						<span><i class="fa fa-tachometer" aria-hidden="true"></i></span>
						Resumen
						<i class="fa fa-chevron-right"></i>
					</a>
				</li>
				<li class="<?php echo active('credits.php'); ?>">
					<a href="<?php echo $base_url; ?>client/credits.php">
						<span><i class="fa fa-tasks" aria-hidden="true"></i></span>
						Creditos
						<i class="fa fa-chevron-right"></i>
					</a>
				</li>
				<li class="<?php echo active('payment-history.php'); ?>"> <a href="<?php echo $base_url; ?>client/payment-history.php"><span><i class="fa fa-credit-card" aria-hidden="true"></i></span><?php echo $lang['Payment History']; ?><i class="fa fa-chevron-right"></i></a></li>
				<li class="<?php echo active('edit-profile.php'); ?>"> <a href="<?php echo $base_url; ?>client/edit-profile.php"><span><i class="fa fa-user" aria-hidden="true"></i></span><?php echo $lang['Profile']; ?><i class="fa fa-chevron-right"></i></a></li>
				<li class="<?php echo active('logout.php'); ?>"> <a href="<?php echo $base_url; ?>logout.php"><span><i class="fa fa-sign-out" aria-hidden="true"></i></span><?php echo $lang['Logout']; ?><i class="fa fa-chevron-right"></i></a></li>
			</ul>
		<?php } ?>

		<p class="copyright"><?php echo $copy_rights; ?></p>


	</div><!-- admin-nav-area -->
</div>