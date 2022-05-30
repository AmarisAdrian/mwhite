<?php
/*
////////////// Teameyo Project Management System  //////////////////////
//////////////////// Edit Client Profile page  //////////////////////////
*/

$debug = true;
if ($debug) {
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL & ~E_NOTICE );
}

ob_start();
include("../includes/lib-initialize.php");
$title = "Seguridad de cuenta | " . $syatem_title;
include("../templates/admin-header.php");

if ($auth->isLoggedIn()) {
	$user = $auth->getUser();
	if ($user['role'] == ROLES['ADMIN']) {
		redirectTo($base_url . "admin/index.php");
	} else if ($user['role'] == ROLES['STAFF']) {
		redirectTo($base_url . "staff/index.php");
	}
} else {
	redirectTo($base_url . "login.php");
}

$user =  UserModel::repo()->GetUserById($user_info->id);
if ($request->isPost() && $request->postVar('val-security')) {
	$flag = 0;
	if(($request->postVar('password')) <> ($request->postVar('password_repeat'))){
		$flag = 1;
	}
	if($flag == 0){
		$id    		= $user_info->id;
		$email		= $request->postVar('email_repeat', true);
		if(!empty($request->postVar('password', true)))
		{
			$password= ComplementModel::HashPassword($request->postVar('password', true));
		}
		$user = new UserModel(compact('id','email', 'password'));
		if  ($user->save()) {
			Core::alert('Correcto','Datos actualizados',$base_url . "client/index.php");	
		}
	} 
	else if($flag == 1){
		Core::alert('Error','Las contraseñas no coinciden',$base_url . "client/security.php ");
	}
	else{
		$error = $connect->error;
		Core::alert('Error','Se ha presentado un problema',$base_url . "client/index.php");	
	}
}
?>
<div class="page-container">
	<div class="container-fluid">
		<div class="row row-eq-height">
			<?php include("../templates/sidebar.php"); ?>
			<div class="page-content col-lg-9 col-md-12 col-sm-12 col-lg-push-3">
				<?php include('../templates/top-header.php'); ?>
				<div class="page-header">
					<h2 class="page-title flex-grow-1">Información personal de seguridad</h2>
				</div>
				<?php	?>
				<div class="add-security-client">
					<form id="FrmSecurity" enctype="multipart/form-data" method="POST"
						action="<?php echo $base_url . "client/security.php"; ?>">
						<div class="row">
							<div class="col-12 py-3">
								<div class="alert alert-primary" role="alert">
									Recuerde no compartir la informacion de seguridad con ninguna persona
								</div>
							</div>
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<div class="field-label"><label for="id">Id personal</label></div>
											<input class="form-control" id="id" type="text" name="id"
												value="<?php echo $user->id; ?>"  readonly>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<div class="field-label"><label for="last_activity">Ultima actividad</label></div>
											<input class="form-control" type="text" id="last_activity" name="last_activity"
												value="<?php echo $user->last_activity; ?>" 
												placeholder="Actividad" readonly>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<div class="field-label"><label for="date_creation">Fecha de creacion</label></div>
											<input class="form-control" type="text" id="date_creation" name="date_creation"
												value="<?php echo $user->date_creation; ?>" 
												placeholder="Fecha de creacion" readonly>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<div class="field-label"><label for="state_auth">Estado de autorizacion</label></div>
											<?php if( $user->state_auth):?>
											<input class="form-control" type="text" id="state_auth" name="state_auth" value="Activo"  placeholder="state_auth" readonly>
											<?Php else: ?>
											<input class="form-control" type="text" id="state_auth" name="state_auth" value="Inactivo"  placeholder="state_auth" readonly>
											<?Php endif; ?>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<div class="field-label"><label for="state_auth">Nueva contraseña</label></div>
											<input class="form-control" type="password" id="password" name="password" placeholder="Password" >
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<div class="field-label"><label for="state_auth">Repetir contraseña</label></div>
											<input class="form-control" type="password" id="password_repeat" name="password_repeat" placeholder="repetir password" >
										</div>										
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<div class="field-label"><label for="email">Correo electronico</label></div>
											<input class="form-control" type="email" id="email" name="email"
												value="<?php echo $user->email; ?>" 
												placeholder="repetir password" readonly>
										</div>										
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<div class="field-label"><label for="email">nuevo correo electronico</label></div>
											<input class="form-control" type="email" id="email_repeat" name="email_repeat" value=""
												placeholder="Nuevo correo electronico" >
										</div>
									</div>
								</div>
								<div class="col-md-12 submit-btnal">							
									<div class="form-group row">
										<input type="hidden" name="val-security" id="val-security" value="val-security">
										<input class="button btn btn-primary" value="Guardar Cambios" name="add-security-client" type="submit" />
									</div>
								</div>
						</div>
					</form>
				</div>
				<!--add-client -->
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<?php 
	include("../templates/admin-footer.php"); 
?>