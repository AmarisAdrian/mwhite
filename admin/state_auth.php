<?php if( isset($_GET['id']) && !empty($_GET['id'])){  

ob_start();
include("../includes/lib-initialize.php");
$client = UserModel::repo()->GetUserById($_GET['id']);
$state_auth = $_GET['state']; 
 
?>
<form class="form-horizontal" method="POST" id="Frm_state_auth" role="form" action="<?php echo $base_url . "admin/clients.php"; ?>">
    <br />
    <input id="id" name="id" type="hidden" value="<?php echo $client->id; ?>"> 
    <input id="state_auth" name="state_auth" type="hidden" value="<?php echo $state_auth; ?>"> 
    <input type="hidden" name="val-auth" value="val-auth">
    <h6 class="text-center"><i class="fas fa-user"></i>  <b> <?php echo $client->firstname.' '.$client->lastname; ?><b></h6> 
    <br />
</form>
 <div class="modal-footer">
    <button type="submit " class="btn btn-primary">Confirmar</button>   
    <button class="btn btn-secondary" data-dismiss="modal">Cancelar</button>   
  
 </div>
<?php } else { ?>
  <div class="alert alert-danger">
    <span>
        <b>Error de base de datos.Hay datos vacios</b>
    </span>                                                            
   </div>        
<?php }

 ?>