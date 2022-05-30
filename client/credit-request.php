<?php
/*
////////////// Mwhite credit system  //////////////////////
//////////////////// Credit request page  //////////////////////////
*/

ob_start();
include("../includes/lib-initialize.php");
$title = "Solicitud de credito | " . $syatem_title;
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

$user_profile =  UserProfileModel::repo()->GetUserById($user_info->id);

$pending_request_credit = CreditModel::repo()->getPendingByUserId($user_info->id);

$pending_study_credit = StudyModel::repo()->getPendingByUserId($user_info->id);

if ($request->isPost()) {
    $flag = 0;
    if ($flag == 0) {
        $amount_request = $request->postVar('amount_request', true);

        

        if ($user->save() && $user_prof->save()) {
            if ($request->postVar('val-client')) {
                redirectTo($base_url . "client/edit-profile.php?step=economic-labour");
            }
            if ($request->postVar('val-client-labour')) {
                redirectTo($base_url . "client/edit-profile.php?step=references");
            }
            if ($request->postVar('val-client-references')) {
                redirectTo($base_url . "client/edit-profile.php?step=documents");
            }
            if ($request->postVar('val-client-documents')) {
                redirectTo($base_url . "client/edit-profile.php?step=request");
            }
            if ($request->postVar('val-client-request')) {
                if ($user_request->save()) {
                    Core::alert('Correcto', 'Sus datos han sido enviados', $base_url . "client/index.php");
                }
            }
        } else {
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
                    <h2 class="page-title flex-grow-1"></h2>
                </div>
                <div class="credit-request col-lg-9 col-md-8">
                    <div class="card">
                        <div class="card-header">
                            Solicitud de credito
                        </div>
                        <div class="card-body">
                            <h3 class="card-title">🎉 Tú información personal ha sido actualizada 🎉</h3>
                            <h6 class="card-subtitle mb-2 text-muted">Estas a solo un paso de poder comprar eso que más deseas, continua con la siguiente información requerida para proceder con el pago del estudio.</h6>

                            <form id="form_credit-request" method="POST" action="<?php echo $base_url . "client/credit-request.php"; ?>">
                                <div class="form-group">
                                    <div class="field-label"><label for="amount_requested">Monto a solicitar *</label></div>
                                    <input class="form-control" type="number" id="amount_request" name="amount_request" required placeholder="$2000000 - $10000000">
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="val-client-request" value="val-client-request">
                                    <input type="hidden" name="state_auth" id="state_auth" value="false">
                                    <button class="bigbutton" id="pay-study">Pagar estudio</button>
                                </div>
                            </form>

                            <div class="alert alert-info" role="alert">
                                Para continuar ingresa tu información, no olvides completar todos los campos obligatorios marcados con (*).
                            </div>

                            <!-- <p> Hemos recibido su solicitud, entrará en un periodo de revisión y estudio, le notificaremos vía Email cuando finalice el proceso y obtengamos respuesta. <br>
                            Lo invitamos a continuar viendo nuestros productos.</p> -->

                            <!-- <p class="card-text"></p> -->
                            <!-- <a href="#" class="card-link">Card link</a> -->
                            <!-- <a href="#" class="card-link">Another link</a> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <!--add-client -->

    </div>
    <div class="clearfix"></div>
</div>
</div>
</div>
<script>

</script>
<?php
include("../templates/admin-footer.php");
?>