<?php
/*
////////////// Teameyo Project Management System  //////////////////////
//////////////////// All Clients page  //////////////////////////
*/
$debug = true;
if ($debug) {
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL & ~E_NOTICE);
}
ob_start();
include("../includes/lib-initialize.php");
$title = "Clients | ". $syatem_title;
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

if(isset($_POST['user_id'])){
$SESSION['user_id'] = $_POST['user_id'];
}

//condition check for login
$id = $user_info->id;  //id of the current logged in user 
$user = UserModel::repo()->find($id); //take the record of current user in an object array 	
$username=$user->firstname;
$email=$user->email;
$account_stat=$user->role;
$user->date_creation;

if ($request->isPost() && $request->postVar('val-auth')){
     $id= $request->postVar('id', true);
     $state_auth=$request->postVar('state_auth', true);
     $user = new UserModel(compact('id','state_auth'));
    if ($user->save()) {
        Core::alert('Correcto','La autorizacion ha sido actualizada',$base_url."admin/clients.php");
    }
    else{
       Core::alert('Error','No se pudo cambiar el estado de autorizacion del usuario',$base_url."admin/clients.php");
    }
}


?>
    
<div class="page-container">
<div class="container-fluid">
<div class="row row-eq-height">
<?php  
include("../templates/sidebar.php"); 
?>	
<div class="page-content col-lg-9 col-md-12 col-sm-12 col-lg-push-3">
<?php include('../templates/top-header.php'); ?>
        <br />
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-header bg-light">
                        <h4>
                            <div class="dropdown">
                                <i class="fa fa-list"></i> Lista de clientes
                                <button class="btn btn-primary dropdown-toggle bg-primary" type="button" id="Menu_herramienta"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Exportar</button>
                                <div class="dropdown-menu bg-light" class="Menu_herramienta_cliente_admin" aria-labelledby="Menu_herramienta_cliente_admin" id="Menu_herramienta_cliente_admin">

                                </div>
                            </div>
                        </h4>
                    </div>               
                    <div class="card-body">
                         <?php $client = UserModel::repo()->GetAllUserClient(); 
                        if(count($client)>0){
                         ?>
                        <div class="table-responsive">
                            <table id="Tabla_cliente_admin" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                    <th>Identificacion</th>
                                    <th>Nombres</th>
                                    <th>Apellidos</th>
                                    <th>Movil</th>
                                    <th>email</th>
                                    <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     <?php
		            	            foreach($client as $client){	
                                    				    
			    	            ?>
                                    <tr>
                                        <td><?php echo $client->dni; ?> </td>
                                        <td><?php echo $client->firstname; ?></td>
                                        <td><?php echo $client->lastname; ?> </td>
                                        <td><?php echo $client->cellphone; ?></td>
                                        <td><?php echo $client->email;?></td>
                                        <td>
                                            <a href="#" id="btnon_modal_usuario" data-target="#Modal_usuario" data-id="<?php echo $client->id; ?>"
                                                data-toggle="modal"
                                                class="btnon_modal_usuario btn btn-success btn-circle btn-sm" title="Ver"
                                                data-placement="top"> <i class="fa fa-eye" aria-hidden="true"></i></a>
                                            <a href="<?php echo $base_url . "admin/edit-user.php?id=".$client->id; ?>" method="post"
                                                class="btn btn-danger btn-circle btn-sm" title="Editar"
                                                data-id="<?php echo $client->id; ?>"
                                                data-toggle="tooltip" data-placement="top" data-method="DELETE"><i class="fa fa-pencil"></i>
                                            </a>
                                            <?php if($client->state_auth) : ?>                                       
                                                <a type="button" id="btnoff_state_auth" class="btnoff_state_auth btn btn-info btn-circle btn-sm"  onclick="Alert('btnoff_state_auth','¿Desea desautorizar la edición del cliente?');" title="Desautorizar permisos de edicion de perfil" data-value="false" data-id="<?php echo $client->id; ?>" ><i class="fas fa-user-slash"></i></a>
                                            <?php else : ?>
                                                <a type="button" id="btnon_state_auth" class="btnon_state_auth btn btn-info btn-circle btn-sm" onclick="Alert('btnon_state_auth','¿Desea autorizar la edición del cliente?');" title="Autorizar permiso de edicion de perfil"  data-value="1" data-id="<?php echo $client->id; ?>"><i class="fas fa-user-plus"></i></a>
                                            <?php endif; ?>

                                        </td>
                                    </tr>
                                    <?php  }  ?>
                                </tbody>
                            </table>
                        </div>
                       </div> <?php }else{ ?>
							<div class="col-12 py-3">
								<div class="alert alert-indangerfo" role="alert">
									No hay clientes registrados ... 
								</div>
							</div><?php } ?>
                    </div>
                </div>
            </div>
        </div> <!-- mix-grid -->
            </div>--> 
        </div><!-- row -->
    </div>
    <div class="clearfix"></div> 
    <!-- VENTANA MODAL STATE AUTH -->
    <div id="Modal_state_auth" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 id="modal-title" class="modal-title text-light">
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body bg-light"></div> 
            </div>
        </div>
    </div>
    <!-- VENTANA MODAL USUARIO -->
    <div id="Modal_usuario" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="Modal_usuario" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary text-light">
                    <h5 id="modal-title" class="modal-title">Datos personales </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                </div> 
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
<?php include("../templates/admin-footer.php"); ?>