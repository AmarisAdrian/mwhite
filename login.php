<?php
/*
////////////// Teameyo Project Management System  //////////////////////
//////////////////// Login Page  //////////////////////////
*/

$debug = true;

if ($debug) {
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
}

$filename =  __DIR__ . '/includes/config.php';
if (!file_exists($filename)) {
	$myfile = fopen('includes/config.php', "w");
	if ($myfile) {
		header('Location: install/index.php');
	}
} else {
	require_once("./includes/initialize.php");
	$title = "Login | " . $syatem_title;
	date_default_timezone_set($time_zone);

	if ($auth->isLoggedIn()) {
		$user = $auth->getUser();
		if ($user['role'] == ROLES['CLIENT']) {
			redirectTo($url . "client/index.php");
		} else if ($user['role'] == ROLES['ADMIN']) {
			redirectTo($url . "admin/index.php");
		} else if ($user['role'] == ROLES['STAFF']) {
			redirectTo($url . "staff/index.php");
		}
	}

	if ($request->isPost() && $request->postVar('val-login') ) {
		$email = $request->postVar('email', true);
		$password = $request->postVar('password');
		$userToken = null;
		$userEntry = UserModel::repo()->findOneBy(array('email' => $email));
		if (isset($userEntry->password)) {
			$bool = ComplementModel::HashVerifyPassword($password,$userEntry->password);
			if($bool){
			$userToken = array(
					'id'    => $userEntry->id,
					'name'  => $userEntry->firstname . ' ' . $userEntry->lastname,
					'role' => $userEntry->role
				);
				if (!isset($userEntry->info)) {
					$userEntry->info = array();
				}
				$userEntry->info['ip'] = $request->getIp();
				$userEntry->save();
			}else{?>
			<div class="error-message">
				Error al iniciar sesion, por favor verifique sus datos.
			</div>
		<?php }	
		if ($userToken) {
			$auth->setUser($userToken['id'], $userToken['name'], $userToken['role']);
			if ($userToken['role'] == ROLES['CLIENT']) {
				redirectTo($url . "client/index.php");
			} else if ($userToken['role'] == ROLES['ADMIN']) {
				redirectTo($url . "admin/index.php");
			} else if ($userToken['role'] == ROLES['STAFF']) {
				redirectTo($url . "staff/index.php");
			}
			exit;
		}

		$errors = true;
	}
}
?>
	<?php include("templates/frontend-header.php"); ?>
	<div class="login-area">
		<div class="content container">
			<div class="row">
				<div class="col-sm-5">
					<div class="logo">
						<a class="signLogo" href="<?php echo $url; ?>">
							<?php if ($login_page_logo) : ?>
								<img src="<?php echo $url . $img_path . $login_page_logo; ?>" alt="" />
							<?php else : ?>
								<img src="<?php echo $url; ?>assets/images/login-logo.png" alt="" />
							<?php endif; ?>
						</a>
					</div>
				</div>
				<div class="col-sm-6">
					<form class="login-form grey" action="<?php echo $url . "login.php"; ?>" method="post">
						<h3 class="form-title grey offset-md-3">
							<?php if ($login_page_title) {
								echo $login_page_title;
							} else { ?>
								Hello and welcome, <br />Please Login
							<?php } ?>
						</h3>
						<?php if (isset($message) && (!empty($message))) { ?>
							<div class="row">
								<div class="col-md-3"></div>
								<div class="col-sm-8">
									<div class="alert alert-danger">
										<button class="close" data-close="alert"></button>
										<span style="display:block;"><?php echo $message; ?></span>
									</div>
								</div>
							</div>
						<?php } ?>
						<div class="form-group row">
							<label class="control-label col-sm-3 padding-right-0"><?php echo $lang['Email Address']; ?></label>
							<div class="input-icon col-sm-8">
								<input class="form-control placeholder-no-fix logemail" type="text" autocomplete="off" name="email" />
							</div>
							<div class="clearfix"></div>
						</div>
						<div class="clearfix"></div>
						<div class="form-group row">
							<label class="control-label col-sm-3 padding-right-0"><?php echo $lang['Password']; ?></label>
							<div class="input-icon col-sm-8 ">
								<input class="form-control placeholder-no-fix pass" type="password" autocomplete="off" name="password"  />
								<input type="hidden" name="val-login" value="val-login">
								<input type="submit" name="submit" class="btn orange" value="<?php echo $lang['LOG IN']; ?> ">
								<div class="row" style="margin:0;">
									<!-- <label class="checkbox col-lg-6">
										<input type="checkbox" name="remember" value="1" /> <span></span><?php echo $lang['Remember me']; ?>
									</label> -->
									<div class="col-lg-6">
										<a href="register.php" id="register"><?php echo $lang['Register']; ?></a>
									</div>
									<div class="col-lg-6">
										<a href="forgot-password.php" id="forget-password"><?php echo $lang['Forgot your password?']; ?></a>
									</div>
								</div>
								<div class="clearfix"></div>
							</div>
						</div>
					</form>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div><!-- login-area-->
<?php include("templates/frontend-footer.php");
}
?>