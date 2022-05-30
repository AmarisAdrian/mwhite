<?php
/*
//////////////////// Main Top Header Bar //////////////////////////
*/
?>
<div class="row message-tbar">
	<div class="col-lg-9 col-md-8 msg-lft">
		<div class="mobile-menu"><i class="fa fa-bars" aria-hidden="true"></i>
			<?php if ($mobile_logo) : ?>
				<img src="<?php echo $url . $img_path . $mobile_logo; ?>" class="img-fluid" />
			<?php else : ?>
				<img src="<?php echo $url; ?>images/users/teameyo-mobile-logo.png" class="img-fluid" />
			<?php endif; ?>
		</div>
		<div class="msg-date">
			<?php echo $date_today; ?>
		</div>
		<div class="msg-icons">
			<div class="msg-icon-img">
				<i class="fa fa-envelope-o" aria-hidden="true"></i>
				<span> 0 </span>
				<div class="msg-menu">
					<div class="msg-menuww">
						<i class="fa fa-caret-up"></i>
						<h4>Nueva notificacion</h4>
						<div class="unread-scroll">
							<ul>
								<li>No tiene notificaciones pendientes.</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="msg-icon-price" data-toggle="tooltip" data-placement="bottom" title="Total Earnings"> $500.000.00</div>
		</div>
	</div>
	<div class="mobile-mils">Total Earnings: $500.000.00</div>
	<div class="col-lg-3 col-md-4 msg-rt">
		<div class="msr-wrapc">
			<div class="msg-welcome">
				<span>Bienvenido </span>
				<br>
				<?php echo $username; ?>
			</div>
			<div class="msg-img">
				<img src="<?php echo $base_url; ?>assets/images/upload-img.jpg" class="img-fluid rounded-circle" />
				<i class="fa fa-caret-down"></i>
			</div>
			<div class="logout-menu">
				<div class="logout-menuwrap">
					<i class="fa fa-caret-up"></i>
					<ul>
						<li>
							<?php if($user_info->role==1):?>
							<a href="<?php echo $base_url; ?>admin/edit-profile.php">
								<i class="fa fa-user" aria-hidden="true"></i>
								Editar informacion
							</a>
							<a href="<?php echo $base_url; ?>admin/security.php">
								<i class="fas fa-shield-alt"></i>
								Seguridad
							</a>
							<?php else: ?>
							<a href="<?php echo $base_url; ?>client/edit-profile.php">
								<i class="fa fa-user" aria-hidden="true"></i>
								Editar informacion
							</a>
							<a href="<?php echo $base_url; ?>client/security.php">
								<i class="fas fa-shield-alt"></i>
								Seguridad
							</a>
							<?php endif; ?>	
						</li>
						<li>
							<a href="<?php echo $base_url; ?>logout.php">
								<i class="fa fa-sign-out" aria-hidden="true"></i>
								Cerrar sesion
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>