<?php
$debug = true;

if ($debug) {
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
}

/*!
 * Creditos MWhite v2.0.0 (https://creditos.mwhite.com.co/)
 * Register Client Page
 * Copyright 2019-2020 Muto Estudio
 * Copyright 2019-2020 MWhite Store.
 * 
 */
/* validate if installed */

$config_file = __DIR__ . '/includes/config.php';
if (!file_exists($config_file)) {
	$new_config_file = fopen('includes/config.php', "w");
	if ($new_config_file) {
		header('Location: install/index.php');
	}
	echo "You don't have the necessary permissions please contact technical support";
	exit;
}

/* initialize webapp */
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require_once("includes/initialize.php");


$title = "Registrar | " . $syatem_title;
date_default_timezone_set($time_zone);
$auth->clearUser();
if ($auth->isLoggedIn()) {
	$user = $auth->getUser();
	echo json_encode($user);
	if ($user['role'] == ROLES['CLIENT']) {
		redirectTo($url . "client/index.php");
	} else if ($user['role'] == ROLES['ADMIN']) {
		redirectTo($url . "admin/index.php");
	} else if ($user['role'] == ROLES['STAFF']) {
		redirectTo($url . "staff/index.php");
	}
}


$message = "";
if ($request->isPost() && $request->postVar('register-client')) {

	$flag = 0;

	if ($request->postVar('password') !== $request->postVar('password')) {
		$message = "<p><i class='fa fa-times'></i>" . $lang["The passwords do not match!"] . "</p>";
		$flag++;
	}
	if (!filter_var($request->postVar('email'), FILTER_VALIDATE_EMAIL)) {
		$message = "<p><i class='fa fa-times'></i>" . $lang["The Email format is incorrect!"] . "</p>";
		$flag++;
	}

	// Validate if exist email or dni
	$validate = UserModel::repo()->findBy(array('email' => $request->postVar('email'), 'dni' => $request->postVar('dni')), 'OR');
	if ($validate) {
		$message = "<p <i class='fa fa-times'></i> " . $lang['This email address has already registered. Try a different one.'] . "</p>";
		$flag++;
	}

	if ($flag == 0) {
		$firstname  = $request->postVar('firstname', true);
		$lastname 	= $request->postVar('lastname', true);
		$email      = ComplementModel::HashPassword($request->postVar('email', true));
		$password   = $request->postVar('password', true);
		$cellphone 	= $request->postVar('phone', true);
		$dni 		= $request->postVar('dni', true);
		$dni_type 	= $request->postVar('dni_type', true);
		$phone 	= $request->postVar('phone', true);
		$role 		= ROLES['CLIENT'];
		$user = new UserModel(compact('firstname', 'lastname', 'dni', 'dni_type', 'email', 'password', 'role', 'cellphone'));
		if ($user->save()) {
			$id_user = $user->id;
			$user_profile = new UserProfileModel(compact('id_user','phone'));	
			if($user_profile->saveRegister()){
				   $auth->setUser($user->id, $user->firstname, $user->role);				
				try{
					$mail = new PHPMailer;				
					$mail->IsSMTP();
					$mail->SMTPDebug = SMTP::DEBUG_SERVER;
					$mail->Host="smtp.gmail.com";
					$mail->SMTPSecure ="tls";	
					$mail->Port = 587;
					$mail->SMTPAuth   = true;
					$mail->SetLanguage("es", 'includes/PHPMailer/language/');
					$mail->Username = 'mwhitestore.notification@gmail.com';
					$mail->Password='wutrjnnredxcwmwt';
				//	$mail->Password='Mau200487';
					$mail->setFrom('mwhitestore.notification@gmail.com', 'MWHITE STORE');
					$mail­->addAddress($email,$firstname.' '.$lastname);
					$mail­->Subject = "Tu cuenta ha sido creada en nuestra plataforma";
					$mail->msgHTML(file_get_contents($dash_settings->create_account_email));
					$mail­>Send();						
					if(!$mail­){
						 $msgstatus == 'fail';
					}
					else{
						redirectTo($url . "client/index.php");
					} 	
				}catch (Exception $e){
   					echo $e->errorMessage();
				}
			} 
		}
	}
}
if (isset($_GET['message'])) {
	$msgstatus = $_GET['message'];
	if ($msgstatus == 'success') {
		$message = "<p class='alert alert-success'><i class='fa fa-check'></i>";
		$message = $lang["Client has been registered successfully!"];
		$message = "</p>";
	}
	if ($msgstatus == 'fail') {
		$message = "<p class='alert alert-danger'><i class='fa fa-times'></i>";
		$message = $lang["Client have been registered but Error sending the Email Please contact site administrator or Check System Setting Email Field!"];
		$message = "</p>";
	}
	if ($msgstatus == 'error') {
		$message = "<p class='alert alert-danger'><i class='fa fa-times'></i>" . $lang['Error registering user.'] . $sql . $lang['Please Try Again later.Error:'] . $error . "</p>";
	}

	if ($msgstatus == 'equal') {
		$message .= "<p><i class='fa fa-times'></i>";
		$message .= $lang["The passwords do not match!"];
		$message .= "</p>";
	}
}
?>
<?php
include("templates/frontend-header.php");
?>
<div class="register-area">
	<div class="content container">
		<div class="row">
			<div class="col-sm-5">
				<div class="logo">
					<a class="signLogo mt-6" style="display: block;" href="<?php echo $url; ?>">
						<img src="<?php echo $url; ?>assets/images/logo-mwhite-light.png" alt="Mwhite Store" />
					</a>
				</div>
			</div>
			<div class="col-sm-6">
				<form class="form-horizontal m-t-20" action="<?php echo $url . "register.php"; ?>" method="post">
					<h3 class="form-title grey">
						Crea tu cuenta <br><small>Completa los datos a continuación para registrarte y poder realizar una solicitud de <b>crédito MWhite</b>, así de fácil es comprar lo que quieras a modicas cuotas.</small>
					</h3>
					<?php if (isset($message) && (!empty($message))) : ?>
						<div class="row">
							<div class="col-sm-12">
								<div class="alert alert-danger">
									<button class="close" data-close="alert"></button>
									<span style="display:block;">
										<?php echo $message; ?>
									</span>
								</div>
							</div>
						</div>
					<?php endif; ?>
					<div class="form-group row">
						<div class="col-6">
							<input class="form-control" type="text" name="firstname" required placeholder="Nombres">
						</div>
						<div class="col-6">
							<input class="form-control" type="text" name="lastname" required placeholder="Apellidos">
						</div>
					</div>

					<div class="form-group row">
						<div class="col-6">
							<select class="form-control" type="text" name="dni_type" required>
								<option value="0" disabled selected>Tipo de documento</option>
								<option value="1">Cédula de ciudadanía</option>
								<option value="3">Tarjeta de identidad</option>
								<option value="2">Cédula de extranjería </option>
								<option value="4">Pasaporte</option>
							</select>
						</div>
						<div class="col-6">
							<input class="form-control" type="text" name="dni" required placeholder="No. documento">
						</div>
					</div>

					<div class="form-group row">
						<div class="col-6">
							<input class="form-control" type="text" name="phone" required placeholder="Celular">
						</div>
						<div class="col-6">
							<input class="form-control" type="email" name="email" required placeholder="Correo Electrónico">
						</div>
					</div>

					<div class="form-group row">
						<div class="col-6">
							<input class="form-control" type="password" name="password" required placeholder="Contraseña">
						</div>
						<div class="col-6">
							<input class="form-control" type="password" name="password2" required placeholder="Repetir contraseña">
						</div>
					</div>

					<div class="form-group row">
						<div class="col-12">
							<div class="custom-checkbox">
								<label class="checkbox col-lg-12">
									<input type="checkbox" required id="habeas-data" value="accept" /> <span></span> Acepto los <a href="#">términos y condiciones</a>
								</label>
							</div>
						</div>
					</div>

					<div class="form-group text-center row mt-2">
						<div class="col-12">
							<input type="hidden" name="register-client" value="register-client">
							<button class="btn btn-primary btn-block waves-effect waves-light" type="submit">Registrar</button>
						</div>
					</div>

					<div class="form-group mt-2 mb-0 row">
						<div class="col-12 text-center">
							<a href="login.php">¿Ya tienes una cuenta? <b>inicias sesíon</b>.</a>
						</div>
					</div>
				</form>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div><!-- login-area-->
<?php
include("templates/frontend-footer.php");

?>