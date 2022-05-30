<?php 
if(!empty($_GET["id"])){ 

ob_start();
include("../includes/lib-initialize.php");
$title = "Mi perfil | " . $syatem_title;
$Ciudad = CityModel::repo()->GetAllCiudadById($_GET["id"]);
?> 
     <select class="form-control" name="city" id="city" type="text">         
              <option value="">Selecione una opcion</option>        
              <?php 
                foreach($Ciudad as $Ciudad)
                { 
                  ?>                         
                <option value="<?php echo $Ciudad->id;?> "> <?php echo $Ciudad->nombre; ?></option>  
                  <?php 
                }  
              ?>
    </select>

<?php } else { ?>
  <div class="alert alert-danger">
    <span>
        <b>Error de base de datos.Hay datos vacios</b>
    </span>                                                            
   </div>                                    
  <?php } ?>                  