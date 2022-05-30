<?php
/*
////////////// Teameyo Project Management System  //////////////////////
//////////////////// Client Dashboard  //////////////////////////
*/

$debug = true;

if ($debug) {
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL & ~E_NOTICE);
}

ob_start();

include("../includes/lib-initialize.php");
$title = "Dashboard | " . $syatem_title;
include("../templates/admin-header.php");

if ($auth->isLoggedIn()) {
	$user = $auth->getUser();
	if ($user['role'] == ROLES['ADMIN']) {
		redirectTo($base_url . "admin/index.php");
	} else if ($user['role'] == ROLES['STAFF']) {
		redirectTo($base_url . "staff/index.php");
	}
}

if (isset($_POST['savenote'])) {
	$flag = 0;
	if ($flag == 0) {
		$usera->id        		=  $user_info->id;
		$usera->note		= $_POST['snote'];
		$saveUser = $usera->save();
		if ($saveUser) {
			header("Location:index.php");
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
				<div class="row">
					<div class="col-md-12 margin-top-10 clients">
						<div class="client-dashboard client-dashnew">
							<div class="row">
								<div class="col-md-7">
									<div class="cliproject-box">
										<div class="cliproj-head">
											<div class="row">
												<div class="col-md-6 cliproj-heading">Creditos</div>
											</div>
										</div>
										<div class="cliproj-body">
											<div class="row">
												<div class="col-md-3 cliproj-bodybox">
													<div class="cliproj-bhead">Valor cuota</div>
													<div class="cliproj-bcont">$200.000</div>
												</div>
												<div class="col-md-3 cliproj-bodybox">
													<div class="cliproj-bhead">Limite de pago</div>
													<div class="cliproj-bcont">29 de Julio del 2020</div>
												</div>
												<div class="col-md-3 cliproj-bodybox">
													<div class="cliproj-bhead">Estado</div>
													<div class="cliproj-bcont inprogress">Pendiente</div>
												</div>
												<div class="col-md-3 cliproj-bodybox btnaligncls">
													<a href="#" data-toggle="collapse" data-target="#toggleact-2" class="btn-action btnnewtab">Acciones</a>
													<div id="toggleact-2" class="toggle-action collapse">
														<ul>
															<li><a href="<?php echo $base_url; ?>client/payments.php?projectId=&clientId="><i class="fa fa-credit-card" aria-hidden="true"></i> Realizar pago</a></li>
														</ul>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="blankproject">
										<div class="blankprotxt">
											<div class="row">
												<div class="col-md-12">
													<h3>Hola <?php echo $username; ?></h3>
												</div>
												<div class="col-md-12">
													<h1> Bienvenid@ a <br><?php echo $company_name ?></h1>
												</div>
												<div class="col-md-12">
													<h2>Nos complace que se haya unido a nosotros.</h2>
												</div>
												<div class="col-md-12">
													<?php if ($user_info->state_auth == 1) : ?>
														<div class="bigbutton blankprofile">
															<a href="edit-profile.php">Completa tu información</a>
														</div>
													<?php endif; ?>
												</div>

											</div>
										</div>
									</div>
									<div class="cliviweallpro">
										<a href="<?php echo $base_url; ?>client/credit.php" class="proallbtn">Ver todos los creditos</a>
									</div>
								</div>
								<div class="col-md-5">
									<div class="clidashright">
										<div class="clidashr-ac">
											<div class="clidashr-achead">Resumen</div>
											<div class="clidash-acmile">
												<div class="row">
													<div class="col-md-6 clidash-acmiletm">
														<div class="clidash-acmiletmhead">Cupo total</div>
														<div class="clidash-acmilebody">$ 0.00</div>
													</div>
													<div class="col-md-6 clidash-acmilepm">
														<div class="clidash-acmiletmhead">Cupo disponible</div>
														<div class="clidash-acmilebody">$ 0.00</div>
													</div>
												</div>
											</div>
											<div class="clidash-acmileb">
												<div class="row">
													<div class="col-md-12 clidash-acmiletmb">
														<div class="clidash-acmiletmheadb">Cuotas por pagar</div>
														<div class="clidash-acmilebodyb">$ 0.00</div>
													</div>
												</div>
											</div>

										</div>
										<div class="clidashr-pi">
											<div class="clidash-pihead">Creditos</div>
											<div class="clidash-pibod">
												<div class="row">
													<div class="col-md-4 clidash-pibodcont">
														<div class="clidash-pibodconth">Activos</div>
														<div class="clidash-pibodconn">0</div>
													</div>
													<div class="col-md-4 clidash-pibodcont">
														<div class="clidash-pibodconth">Pendientes</div>
														<div class="clidash-pibodconn">0</div>
													</div>
													<div class="col-md-4 clidash-pibodcont">
														<div class="clidash-pibodconth">Finalizados</div>
														<div class="clidash-pibodconn">0</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="clearfix"></div>

		</div>
	</div>
</div>
<?php include("../templates/admin-footer.php"); ?>