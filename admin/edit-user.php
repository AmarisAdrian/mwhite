<?php $debug = true;
if ($debug) {
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL & ~E_NOTICE );
}
ob_start();
include("../includes/lib-initialize.php");
$title = "Editar usuario | " . $syatem_title;
include("../templates/admin-header.php");

if ($auth->isLoggedIn()) {
	$user = $auth->getUser();
	if ($user['role'] == ROLES['CLIENT']) {
		redirectTo($url . "client/index.php");
	} else if ($user['role'] == ROLES['STAFF']) {
		redirectTo($url . "staff/index.php");
	}
}
 else {
	redirectTo($base_url . "login.php");
}

if($user_info->role==1){
$step = isset($_GET['step']) ? $_GET['step'] : 'basic-information';	
if(isset($_GET['id']) && !empty($_GET['id'])){  
$user_id = $_GET['id'];
$user = UserModel::repo()->GetUserById($user_id);
$user_profile =  UserProfileModel::repo()->GetUserById($user_id);
$provinces = ProvinceModel::repo()->GetAll();
$education_levels = ComplementModel::repo()->GetAllEducationLevel();
$marital_states = ComplementModel::repo()->GetAllMaritalState();
$types_housing = ComplementModel::repo()->GetAllTypeHousing();
$activity = ComplementModel::repo()->GetAllActivity();
if ($request->isPost() && $request->postVar('val-client') || $request->isPost() && $request->postVar('val-client-labour') || $request->isPost() && $request->postVar('val-client-references') || $request->isPost() && $request->postVar('val-client-documents') || $request->isPost() && $request->postVar('val-client-security')) {	
	$flag = 0;
	if($request->postVar('val-client-security')){
		if ($request->postVar('password') <> $request->postVar('password_repeat')) {
			Core::alert('Error','Las contraseñas no coinciden',$base_url . "admin/edit-user.php?step=security&id=".$user_id);
			$flag =1;
		}
	}
	if ($flag == 0) {
		$id    =     $user_id;
		$id_user    = $user_id;
		$firstname	= $request->postVar('firstname', true);			
		$lastname	= $request->postVar('lastname', true);
		$role		=  $request->postVar('role', true);
		$cellphone	=   $request->postVar('cellphone', true);
		$email		= $request->postVar('email', true);
		if(!empty($request->postVar('password', true)))
		{
			$password= ComplementModel::HashPassword($request->postVar('password', true));
		}
		$adress	    = $request->postVar('adress', true);
		$phone		= $request->postVar('phone', true);
		// CAMPOS COMPLEMENTARIOS 
		$date_birth	= $request->postVar('date_birth', true);
		$dni_type		= $request->postVar('dni_type', true);
		$dni_date 		= $request->postVar('dni_date', true);
		$dni			= $request->postVar('dni', true);
		$stratum		= $request->postVar('stratum', true);
		$neighborhood	= $request->postVar('neighborhood', true);
		$province		= $request->postVar('province', true);
		$city			= $request->postVar('city', true);
		$recidence		= $request->postVar('recidence', true);
		$marital_status	= $request->postVar('marital_status', true);
		$dependants		= $request->postVar('dependants', true);
		$activity		= $request->postVar('activity', true);
		$sons			= $request->postVar('sons', true);
		$type_housing	= $request->postVar('type_housing', true);
		$education_level = $request->postVar('education_level', true);
		$profession	= $request->postVar('profession', true);

		$company		= $request->postVar('company', true);
		$company_tax_number	= $request->postVar('company_tax_number', true);
		$company_adress	= $request->postVar('company_adress', true);
		$company_economic_activity	= $request->postVar('company_economic_activity', true);
		$monthly_earnings	= $request->postVar('monthly_earnings', true);
		$monthly_profit	= $request->postVar('monthly_profit', true);
		$company_date	= $request->postVar('company_date', true);
		$company_phone	= $request->postVar('company_phone', true);

		$supplier_name	= $request->postVar('supplier_name', true);
		$supplier_phone	= $request->postVar('supplier_phone', true);
		$supplier_adress	= $request->postVar('supplier_adress', true);
		$supplier_company	= $request->postVar('supplier_company', true);
		$supplier_tax_number	= $request->postVar('supplier_tax_number', true);
		$supplier_tax_document	= $request->postVar('supplier_tax_document', true);

		$p_reference_name	= $request->postVar('p_reference_name', true);
		$p_reference_lastname	= $request->postVar('p_reference_lastname', true);
		$p_reference_time	= $request->postVar('p_reference_time', true);
		$p_reference_phone	= $request->postVar('p_reference_phone', true);
		$p_reference_email	= $request->postVar('p_reference_email', true);

		$f_reference_name	= $request->postVar('f_reference_name', true);
		$f_reference_lastname	= $request->postVar('f_reference_lastname', true);
		$f_reference_phone	= $request->postVar('f_reference_phone', true);
		$f_reference_email	= $request->postVar('f_reference_email', true);
		$dni_front_view = FileManager::fileUploader($user_info->dni,'dni_front_view');
		$dni_rear_view =  FileManager::fileUploader($user_info->dni ,'dni_rear_view');	
	
		$user = new UserModel(compact('id','firstname', 'lastname','dni_type','dni','dni_date','email', 'password', 'role', 'cellphone'));
		$user_prof = new UserProfileModel(compact(
			'id_user',
			'date_birth',
			'adress',
			'stratum',
			'neighborhood',
			'province',
			'city',
			'recidence',
			'marital_status',
			'dependants',
			'activity',
			'sons',
			'type_housing',
			'phone',
			'education_level',
			'profession',
			'company',
			'company_tax_number',
			'company_adress',
			'company_economic_activity',
			'monthly_earnings',
			'monthly_profit',
			'company_date',
			'company_phone',
			'supplier_name',
			'supplier_phone',
			'supplier_adress',
			'supplier_company',
			'supplier_tax_number',
			'supplier_tax_document',
			'p_reference_name',
			'p_reference_lastname',
			'p_reference_time',
			'p_reference_phone',
			'p_reference_email',
			'f_reference_name',
			'f_reference_lastname',
			'f_reference_phone',
			'f_reference_email',
			'dni_front_view',
			'dni_rear_view'
		));
		if  ($user->save() && $user_prof->save()) {
			if ($request->postVar('val-client')) {
				redirectTo($base_url . "admin/edit-user.php?step=economic-labour&id=".$user_id);
			}
			if ($request->postVar('val-client-labour')) {
				redirectTo($base_url . "admin/edit-user.php?step=references&id=".$user_id);
			}
			if ($request->postVar('val-client-references')) {
				redirectTo($base_url . "admin/edit-user.php?step=documents&id=".$user_id);
			}
			if ($request->postVar('val-client-documents')) {
				redirectTo($base_url . "admin/edit-user.php?step=security&id=".$user_id);
			}
			if($request->postVar('val-client-security')){
				Core::alert('Correcto','Sus datos han sido enviados',$base_url . "admin/index.php");
			}
		} 
		else {
			$error = $connect->error;
			header('location: register.php?message=error');		
		}
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
					<h2 class="page-title flex-grow-1">Información personal</h2>
					<nav class="nav nav-pills">
						<a class="nav-item nav-link <?php if ($step == "basic-information") {
														echo "active";
													} ?>" href="<?php echo $base_url . "admin/edit-user.php?step=basic-information&id=".$user_id; ?>" id="pills-basic-information" role="tab" aria-controls="pills-basic-information"><i class="fa fa-address-card" aria-hidden="true"></i> Informacíon básica</a>
						<a class="nav-item nav-link <?php if ($step == "economic-labour") {
														echo "active";
													} ?>" href="<?php echo $base_url . "admin/edit-user.php?step=economic-labour&id=".$user_id; ?>" id="pills-economic-labour" role="tab" aria-controls="pills-economic-labour"><i class="fa fa-briefcase" aria-hidden="true"></i> Laboral y Económica</a>
						<a class="nav-item nav-link <?php if ($step == "references") {
														echo "active";
													} ?>" href="<?php echo $base_url . "admin/edit-user.php?step=references&id=".$user_id; ?>" id="pills-references" role="tab" aria-controls="pills-references"><i class="fa fa-users" aria-hidden="true"></i> Referencias</a>
						<a class="nav-item nav-link <?php if ($step == "documents") {
														echo "active";
													} ?>" href="<?php echo $base_url . "admin/edit-user.php?step=documents&id=".$user_id; ?>" id="pills-documents" role="tab" aria-controls="pills-documents"><i class="fas fa-file"></i> Documentos</a>
						<a class="nav-item nav-link <?php if ($step == "security") {
														echo "active";
													} ?>" href="<?php echo $base_url . "admin/edit-user.php?step=security&id=".$user_id; ?>" id="pills-security" role="tab" aria-controls="pills-security"><i class="fas fa-shield-alt"></i> Seguridad</a>							
					</nav>
				</div>

				<?php
				if ( is_array( $provinces) && (is_array($education_levels)) && (is_array($marital_states)) && (is_array($types_housing)) && (is_array($activity)) ) {
				if ((count($provinces) > 0) && (count($education_levels) > 0) && (count($marital_states) > 0) && (count($types_housing) > 0 && (count($activity) > 0))) {
				?>
					<div class="add-client">
						<form id="Frmcliente" enctype="multipart/form-data" method="POST" action="<?php echo $base_url . "admin/edit-user.php?id=".$user_id; ?>">
							<div class="row">
								<div class="col-12 py-3">
									<div class="alert alert-info" role="alert">
										Para continuar ingresa tu información, no olvides completar todos los campos obligatorios:
									</div>
								</div>
								<div class="tab-content col-12" id="pills-tabContent">
									<?php if ("basic-information" == $step) { ?>
										<div class="tab-pane fade show <?php echo 'active' ?>" id="basic-information" role="tabpanel" aria-labelledby="basic-information-tab">
											<div class="col-md-12">
												<div class="row">
													<div class="col-md-4">
														<div class="form-group">
															<div class="field-label"><label for="firstname">Nombres *</label></div>
															<input class="form-control" id="firstname" type="text" name="firstname" value="<?php echo $user->firstname; ?>" required>
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<div class="field-label"><label for="lastname">Apellidos *</label></div>
															<input class="form-control" type="text" id="lastname" name="lastname" value="<?php echo $user->lastname; ?>" required placeholder="Apellidos">
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<div class="field-label"><label for="date_birth">Fecha de nacimiento *</label></div>
															<input class="form-control" type="date" id="date_birth" name="date_birth" value="<?php echo $user_profile->date_birth; ?>" required placeholder="Apellidos">
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<div class="field-label"><label for="dni_type">Tipo de Documento *</label></div>
															<select class="form-control" value="<?php echo $user->dni_type; ?>" type="text" id="dni_type" name="dni_type" required>
																<option value="0" disabled>Tipo de documento</option>
																<?php foreach (DNI_TYPE as $key => $value) : ?>
																	<option value="<?php echo $value; ?>" <?php if ($user->dni_type === $value) : echo "selected";
																											endif; ?>><?php echo $key; ?></option>
																<?php endforeach; ?>
															</select>
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<div class="field-label"><label for="dni">No. documento *</label></div>
															<input class="form-control" type="text" id="dni" name="dni" value="<?php echo $user->dni; ?>" required placeholder="No. documento">
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<div class="field-label"><label for="dni_date">Fecha de expedición *</label></div>
															<input class="form-control" type="date" id="dni_date" name="dni_date" value="<?php echo $user->dni_date; ?>" required placeholder="">
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<div class="field-label"><label for="adress">Direccion *</label></div>
															<input class="form-control" type="text" id="adress" name="adress" value="<?php echo $user_profile->adress; ?>" required placeholder="">
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<div class="field-label"><label for="stratum">Estrato *</label></div>
															<input class="form-control" type="number" id="stratum" name="stratum" value="<?php echo $user_profile->stratum; ?>" required placeholder="">
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<div class="field-label"><label for="neighborhood">Barrio *</label></div>
															<input class="form-control" type="text" id="neighborhood" name="neighborhood" value="<?php echo $user_profile->neighborhood; ?>" required placeholder="">
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<div class="field-label"><label for="province">Provincia *</label></div>
															<select class="form-control" type="text" id="province" name="province" required>
																<?php if (is_null($user_profile->province) || empty($user_profile->province)) : ?>
																		<option disabled value="0">Selecciona una opción</option>
																	<?php endif; ?>
																<?php foreach ($provinces as $province) : ?>																	
																	<?php if (!empty($user_profile->province) && $user_profile->province == $province->id) : ?>
																		<option value="<?php echo $province->id; ?>" selected>
																	<?php else : ?>
																		<option value="<?php echo $province->id; ?>">
																	<?php endif; ?>
																		<?php echo $province->nombre; ?>
																		</option>
																<?php endforeach; ?>
															</select>
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<div class="field-label"><label for="city">Ciudad *</label></div>
															<select class="form-control" type="text" id="city" name="city" required>
																<?php if (!empty($user_profile->city) && !empty($user_profile->province)) :
																	$cities = CityModel::repo()->GetAllCiudadById($user_profile->province);
																	foreach ($cities as $city) : ?>
																		<?php if ($user_profile->city == $city->id) : ?>
																			<option value="<?php echo $city->id; ?>" selected> <?php echo $city->nombre; ?> </option>
																		<?php else : ?>
																			<option value="<?php echo $city->id; ?>"> <?php echo $city->nombre; ?> </option>
																		<?php endif; ?>
																	<?php endforeach; ?>
																<?php endif; ?>
															</select>
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<div class="field-label"><label for="recidence">Tiempo de residencia *</label></div>
															<input class="form-control" type="number" id="recidence" name="recidence" value="<?php echo $user_profile->recidence; ?>" required placeholder="">
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<div class="field-label"><label for="marital_status">Estado civil *</label></div>

															<select class="form-control" type="text" id="marital_status" name="marital_status" required>
																 <?php if (empty($user_profile->marital_status)) : ?>
																		<option disabled value="0">Selecciona una opción</option>
																	<?php endif; ?>
																<?php foreach ($marital_states as $marital_state) : ?>
														
																	<?php if (!empty($user_profile->marital_status) && $user_profile->marital_status == $marital_state->id) : ?>
																		<option value="<?php echo $marital_state->id; ?>" selected>
																		<?php else : ?>
																		<option value="<?php echo $marital_state->id; ?>">
																		<?php endif; ?>
																		<?php echo $marital_state->nombre; ?>
																		</option>
																	<?php endforeach; ?>
															</select>

														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<div class="field-label"><label for="dependants">Personas a cargo *</label></div>
															<input class="form-control" type="number" id="dependants" name="dependants" value="<?php echo $user_profile->dependants; ?>" required placeholder="">
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<div class="field-label"><label for="activity">Actividad economica *</label></div>
															<select class="form-control" type="text" id="activity" name="activity" required>
																	<?php if (empty($user_profile->activity)) : ?>
																		<option disabled value="0">Selecciona una opción</option>
																	<?php endif; ?>
																<?php foreach ($activity as $activity) : ?>													
																	<?php if (!empty($user_profile->activity) && $user_profile->activity == $type_housing->id) : ?>
																		<option value="<?php echo  $activity->id; ?>" selected>
																		<?php else : ?>
																		<option value="<?php echo  $activity->id; ?>">
																		<?php endif; ?>
																		<?php echo  $activity->nombre; ?>
																		</option>
																	<?php endforeach; ?>
															</select>
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<div class="field-label"><label for="sons">Hijos *</label></div>
															<input class="form-control" type="number" id="sons" name="sons" value="<?php echo $user_profile->sons; ?>" required placeholder="">
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<div class="field-label"><label for="type_housing">Tipo de vivienda *</label></div>
															<select class="form-control" type="text" id="type_housing" name="type_housing" required>
																<?php if (empty($user_profile->type_housing)) : ?>
																		<option disabled value="0">Selecciona una opción</option>
																<?php endif; ?>
																<?php foreach ($types_housing as $type_housing) : ?>														
																	<?php if (!empty($user_profile->type_housing) && $user_profile->type_housing == $type_housing->id) : ?>
																		<option value="<?php echo  $type_housing->id; ?>" selected>
																		<?php else : ?>
																		<option value="<?php echo  $type_housing->id; ?>">
																		<?php endif; ?>
																		<?php echo  $type_housing->nombre; ?>
																		</option>
																	<?php endforeach; ?>
															</select>
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<div class="field-label"><label for="phone">Celular *</label></div>
															<input class="form-control" type="text" id="phone" name="phone" value="<?php echo $user->cellphone; ?>" required placeholder="">
														</div>
													</div>

													<div class="col-md-4">
														<div class="form-group">
															<div class="field-label"><label for="education_level">Nivel de educacion *</label></div>

															<select class="form-control" type="text" id="education_level" name="education_level" required>
																	<?php if (empty($user_profile->education_level)) : ?>
																		<option disabled value="0">Selecciona una opción</option>
																	<?php endif; ?>
																<?php foreach ($education_levels as $education_level) : ?>
																	<?php if (!empty($user_profile->education_level) && $user_profile->education_level == $education_level->id) : ?>
																		<option value="<?php echo  $education_level->id; ?>" selected>
																		<?php else : ?>
																		<option value="<?php echo  $education_level->id; ?>">
																		<?php endif; ?>
																		<?php echo  $education_level->nombre; ?>
																		</option>
																	<?php endforeach; ?>
															</select>
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<div class="field-label"><label for="profession">Profesión *</label></div>
															<input class="form-control" type="text" id="profession" name="profession" value="<?php echo $user_profile->profession; ?>" required placeholder="">
														</div>
													</div>
												</div>
												<div class="col-md-12 submit-btnal">
													<div class="form-group row">
														<input type="hidden" name="val-client" value="val-client">
														<input class="button btn btn-primary" value="Siguiente" name="add-client" type="submit" />
													</div>
												</div>
											</div>
										</div>
									<?php }
									if ("economic-labour" == $step) { ?>
										<div class="tab-pane fade show <?php echo 'active' ?>" id="economic-labour" role="tabpanel" aria-labelledby="economic-labour-tab">
											<div class="col-md-12">
												<div class="row">
													<div class="col-md-4">
														<div class="form-group">
															<div class="field-label"><label for="company">Compañia *</label></div>
															<input class="form-control" type="text" id="company" name="company" value="<?php echo $user_profile->company; ?>" required placeholder="">
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<div class="field-label"><label for="company_tax_number">NIT de compañia *</label></div>
															<input class="form-control" type="text" id="company_tax_number" name="company_tax_number" value="<?php echo $user_profile->company_tax_number; ?>" required placeholder="">
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<div class="field-label"><label for="company_adress">Direccion de compañia *</label></div>
															<input class="form-control" type="text" id="company_adress" name="company_adress" value="<?php echo $user_profile->company_adress; ?>" required placeholder="">
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<div class="field-label"><label for="company_economic_activity">Actividad economica de compañia *</label></div>
															<input class="form-control" type="text" id="company_economic_activity" name="company_economic_activity" value="<?php echo $user_profile->company_economic_activity; ?>" required placeholder="">
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<div class="field-label"><label for="monthly_earnings">Ingresos mensuales estimados *</label></div>
															<input class="form-control" type="text" id="monthly_earnings" name="monthly_earnings" value="<?php echo $user_profile->monthly_earnings; ?>" required placeholder="">
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<div class="field-label"><label for="monthly_profit">Ganancias mensuales *</label></div>
															<input class="form-control" type="text" id="monthly_profit" name="monthly_profit" value="<?php echo $user_profile->monthly_profit; ?>" required placeholder="">
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<div class="form-group">
																<div class="field-label"><label for="company_date">Fecha de ingreso*</label></div>
																<input class="form-control" type="date" id="company_date" name="company_date" value="<?php echo $user_profile->company_date ?>" required placeholder="">
															</div>
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<div class="field-label"><label for="company_phone">Telefono de compañia *</label></div>
															<input class="form-control" type="number" id="company_phone" name="company_phone" value="<?php echo $user_profile->company_phone; ?>" required placeholder="">
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<div class="field-label"><label for="supplier_name">Nombre de proveedor *</label></div>
															<input class="form-control" type="text" id="supplier_name" name="supplier_name" value="<?php echo $user_profile->supplier_name; ?>" required placeholder="">
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<div class="field-label"><label for="supplier_phone">Telefono de proveedor *</label></div>
															<input class="form-control" type="number" id="supplier_phone" name="supplier_phone" value="<?php echo $user_profile->supplier_phone; ?>" required placeholder="">
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<div class="field-label"><label for="supplier_adress">Direccion de proveedor *</label></div>
															<input class="form-control" type="text" id="supplier_adress" name="supplier_adress" value="<?php echo $user_profile->supplier_adress; ?>" required placeholder="">
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<div class="field-label"><label for="supplier_company">Proveedor *</label></div>
															<input class="form-control" type="text" id="supplier_company" name="supplier_company" value="<?php echo $user_profile->supplier_company; ?>" required placeholder="">
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<div class="field-label"><label for="supplier_tax_number">Numero de tax proveedor *</label></div>
															<input class="form-control" type="text" id="supplier_tax_number" name="supplier_tax_number" value="<?php echo $user_profile->supplier_tax_number; ?>" required placeholder="">
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<div class="field-label"><label for="supplier_tax_document">Documento tax de proveedor *</label></div>
															<input class="form-control" type="text" id="supplier_tax_document" name="supplier_tax_document" value="<?php echo $user_profile->supplier_tax_document; ?>" required placeholder="">
														</div>
													</div>
												</div>
												<div class="col-md-12 submit-btnal">
													<div class="form-group row">
														<input type="hidden" name="val-client-labour" value="val-client-labour">
														<a type="button" class="btn btn-primary nav-item nav-link <?php if ($step == "economic-labour") {
																														echo "active";
																													} ?>" href="<?php echo $base_url . "admin/edit-user.php?step=basic-information&id=".$user_id; ?>" id="pills-basic-information" aria-controls="pills-basic-information" role="button">Atras</a>
														&nbsp
														<input class="button btn btn-primary" value="Siguiente" name="add-client" type="submit" />
													</div>
												</div>
											</div>
										</div>
									<?php }
									if ("references" == $step) { ?>
										<div class="tab-pane fade  show <?php echo 'active' ?>" id="references" role="tabpanel" aria-labelledby="references-tab">
											<div class="col-md-12">
												<div class="row">
													<div class="col-md-4">
														<div class="form-group">
															<div class="field-label"><label for="p_reference_name">Nombre referencia personal *</label></div>
															<input class="form-control" type="text" id="p_reference_name" name="p_reference_name" value="<?php echo $user_profile->p_reference_name; ?>" required placeholder="">
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<div class="field-label"><label for="p_reference_lastname">Apellidos referencia personal *</label></div>
															<input class="form-control" type="text" id="p_reference_lastname" name="p_reference_lastname" value="<?php echo $user_profile->p_reference_lastname; ?>" required placeholder="">
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<div class="field-label"><label for="p_reference_time">Tiempo de conocidos en años *</label></div>
															<input class="form-control" type="number" id="p_reference_time" name="p_reference_time" value="<?php echo $user_profile->p_reference_time; ?>" required placeholder="">
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<div class="field-label"><label for="p_reference_phone">Telefono referencia personal *</label></div>
															<input class="form-control" type="number" id="p_reference_phone" name="p_reference_phone" value="<?php echo $user_profile->p_reference_phone; ?>" required placeholder="">
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<div class="field-label"><label for="p_reference_email">Email referencia personal *</label></div>
															<input class="form-control" type="email" id="p_reference_email" name="p_reference_email" value="<?php echo $user_profile->p_reference_email; ?>" required placeholder="">
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<div class="field-label"><label for="f_reference_name">Nombre referencia familiar *</label></div>
															<input class="form-control" type="text" id="f_reference_name" name="f_reference_name" value="<?php echo $user_profile->f_reference_name; ?>" required placeholder="">
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<div class="field-label"><label for="f_reference_lastname">Apellido referencia familiar *</label></div>
															<input class="form-control" type="text" id="f_reference_lastname" name="f_reference_lastname" value="<?php echo $user_profile->f_reference_lastname; ?>" required placeholder="">
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<div class="field-label"><label for="f_reference_phone">Telefono referencia familiar *</label></div>
															<input class="form-control" type="number" id="f_reference_phone" name="f_reference_phone" value="<?php echo $user_profile->f_reference_phone; ?>" required placeholder="">
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<div class="field-label"><label for="f_reference_email">Email referencia familiar *</label></div>
															<input class="form-control" type="text" id="f_reference_email" name="f_reference_email" value="<?php echo $user_profile->f_reference_email; ?>" required placeholder="">
														</div>
													</div>
												</div>
												<div class="col-md-12 submit-btnal">
													<div class="form-group row">
														<input type="hidden" name="val-client-references" value="val-client-references">
														<a type="button" class="btn btn-primary nav-item nav-link <?php if ($step == "references") {
																														echo "active";
																													} ?>" href="<?php echo $base_url . "admin/edit-user.php?step=economic-labour&id=".$user_id; ?>" id="pills-basic-information" aria-controls="pills-basic-information" role="button">Atras</a>
														&nbsp
														<input class="button btn btn-primary" value="Siguiente" name="add-client" type="submit" />
													</div>
												</div>
											</div>
										</div>
									<?php }
									if ("documents" == $step) { ?>
										<div class="tab-pane fade  show <?php echo 'active' ?>" id="documents" role="tabpanel" aria-labelledby="documents-tab">
											<div class="col-md-12">
												<div class="row">
													<div class="col-md-4">
														<div class="form-group">
															<div class="field-label"><label for="dni_front_view">Vista frontal dni *</label></div>
															<input class="form-control" type="file" id="dni_front_view" name="dni_front_view" value="<?php echo $user_profile->dni_front_view; ?>" required placeholder="">
															<div class="field-label"><label class="text-danger" for="dni_front_view">Tamaño maximo 2.5 MB</label></div>
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<div class="field-label"><label for="dni_rear_view">Vista de respaldo dni *</label></div>
															<input class="form-control" type="file" id="dni_rear_view" name="dni_rear_view" value="<?php echo $user_profile->dni_rear_view; ?>" required placeholder="">
															<div class="field-label"><label class="text-danger" for="dni_rear_view">Tamaño maximo 2.5 MB</label></div>
														</div>
													</div>
												</div>
												<div class="col-md-12 submit-btnal">
													<div class="col-md-12 submit-btnal">
														<div class="form-group row">
															<input type="hidden" name="val-client-documents" value="val-client-documents">
															<a type="button" class="btn btn-primary nav-item nav-link <?php if ($step == "documents") { echo "active";} ?>" href="<?php echo $base_url . "admin/edit-user.php?step=references&id=".$user_id; ?>" id="pills-references" aria-controls="pills-references" role="button">Atras</a>
															&nbsp
															<input class="button btn btn-primary" value="Siguiente" name="add-client" type="submit" />
														</div>
													</div>
												</div>
											</div>
										</div>
									<?php } 
									if("security" == $step){?>
										<div class="tab-pane fade show <?php echo 'active' ?>" id="security" role="tabpanel" aria-labelledby="security-tab">
											<div class="col-md-12">
												<div class="row">
													 <div class="col-md-4">
														<div class="form-group">
															<div class="field-label"><label for="id">Id *</label></div>
															<input type="text" class="form-control" id="id" name="id" value="<?php echo $user->id; ?>" required readonly>
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<div class="field-label"><label for="role">Rol *</label></div>
															<select class="form-control" value="<?php echo $user->role; ?>" type="text" id="role" name="role" required>
																<option value="0" disabled>ROL</option>
																<?php foreach (ROLES as $key => $value) : ?>
																	<option value="<?php echo $value; ?>" <?php if ($user->role === $value) : echo "selected";
																		endif; ?>><?php echo $key; ?></option>
																<?php endforeach; ?>
															</select>
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<div class="field-label"><label for="password">Contraseña *</label></div>
															<input type="password" class="form-control" id="password" name="password">
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<div class="field-label"><label for="password_repeat">Repetir contraseña *</label></div>
															<input type="password" class="form-control" id="password_repeat" name="password_repeat">		
														</div>
													</div>
												</div>
												<div class="col-md-12 submit-btnal">
													<input type="hidden" name="val-client-security" id="val-client-security" value="val-client-security">
													<div class="form-group row">
														<a type="button" class="btn btn-primary nav-item nav-link <?php if ($step == "security") {echo "active";} ?>" href="<?php echo $base_url . "admin/edit-user.php?step=documents&id=".$user_id; ?>" id="pills-documents" aria-controls="pills-documents" role="button">Atras</a>												
														&nbsp
														<input class="button btn btn-primary" value="Guardar Cambios" name="add-client" type="submit" />
													</div>
												</div>
											</div>
										</div>
									<?php } ?>
								</div>
							</div>
					</div> <?php  }else { ?>
					<div class="col-12 py-3">
						<div class="alert alert-danger" role="alert">
							Problemas al consultar campos primordiales con la base de datos .Verifique que los datos de esos campos existan
						</div>
					</div><?php }  }else { ?>
					<div class="col-12 py-3">
						<div class="alert alert-success" role="alert">
							Procesando solicitud ... 
						</div>
					</div><?php } ?>
			</div>
			<div class="clearfix"></div>
			</form>
		</div>
	</div>
	<div class="clearfix"></div>
</div>
</div>
</div>
<?php 
include("../templates/admin-footer.php");
}else{ ?>
	<div class="col-12 py-3">
		<div class="alert alert-danger" role="alert">
			No está autorizado entrar en ésta pagina 1
			</div>
		</div><?php //redirectTo($base_url . "admin/clients.php");
		 }
	  }else{ ?>
	<div class="col-12 py-3">
		<div class="alert alert-danger" role="alert">
			No está autorizado entrar en ésta pagina 2
			</div>
		</div><?php //redirectTo($base_url . "admin/clients.php"); 
	} ?> 
