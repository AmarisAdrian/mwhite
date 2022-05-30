<?php if( isset($_GET['id']) && !empty($_GET['id'])){  
ob_start();
include("../includes/lib-initialize.php");
$debug = true;
if ($debug) {
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL & ~E_NOTICE );
}
$user = UserModel::repo()->GetUserById($_GET['id']);
$user_profile = UserProfileModel::repo()->GetUserById($_GET['id']);
$user_credit = CreditModel::repo()->GetMontoUserById($_GET['id']); 
?>

<!--INFORMACION DE SEGURIDAD-->
<div class="card">
  <div class="card-header alert-primary">
    Informacion de seguridad
  </div>
  <div class="card-body">
    <div class="col-md-12">
      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <div class="field-label"><label for="id">Id personal </label></div>
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
            <div class="field-label"><label for="email">Correo electronico</label></div>
            <input class="form-control" type="email" id="email" name="email"
              value="<?php echo $user->email; ?>" 
              placeholder="repetir password" readonly>
          </div>										
        </div>
        </div>
    </div>
  </div>
</div>
<br />
<!--INFORMACION PERSONAL-->
<div class="card">
  <div class="card-header alert-primary">
    Informacion personal
  </div>
  <div class="card-body">
    <div class="col-md-12">
        <div class="row">
    <div class="col-md-4">
      <div class="form-group">
        <div class="field-label"><label for="firstname">Nombres *</label></div>
        <input class="form-control" id="firstname" type="text" name="firstname" value="<?php echo $user->firstname; ?>"
          readonly>
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <div class="field-label"><label for="lastname">Apellidos *</label></div>
        <input class="form-control" type="text" id="lastname" name="lastname" value="<?php echo $user->lastname; ?>"
          readonly>
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <div class="field-label"><label for="date_birth">Fecha de nacimiento *</label></div>
        <input class="form-control" type="date" id="date_birth" name="date_birth"
          value="<?php echo $user_profile->date_birth; ?>" readonly>
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <div class="field-label"><label for="dni_type">Tipo de Documento *</label></div>
        <select class="form-control" value="<?php echo $user->dni_type; ?>" type="text" id="dni_type" name="dni_type"
          disabled>
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
        <input class="form-control" type="text" id="dni" name="dni" value="<?php echo $user->dni; ?>" readonly>
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <div class="field-label"><label for="dni_date">Fecha de expedición *</label></div>
        <input class="form-control" type="date" id="dni_date" name="dni_date" value="<?php echo $user->dni_date; ?>"readonly>
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <div class="field-label"><label for="adress">Direccion *</label></div>
        <input class="form-control" type="text" id="adress" name="adress" value="<?php echo $user_profile->adress; ?>" readonly>
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <div class="field-label"><label for="stratum">Estrato *</label></div>
        <input class="form-control" type="number" id="stratum" name="stratum" value="<?php echo $user_profile->stratum; ?>" readonly>
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <div class="field-label"><label for="neighborhood">Barrio *</label></div>
        <input class="form-control" type="text" id="neighborhood" name="neighborhood"
          value="<?php echo $user_profile->neighborhood; ?>"readonly>
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <div class="field-label"><label for="province">Provincia *</label></div>
          <?php  $province = ProvinceModel::repo()->GetProvinceById($user_profile->province); ?>
           <input class="form-control" type="text" id="province" name="province"  value="   <?php echo $province->nombre; ?>" readonly>
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <div class="field-label"><label for="city">Ciudad *</label></div>
        <?php $city = CityModel::repo()->GetCiudadById($user_profile->city); ?>
        <input class="form-control" type="text" id="city" name="city" value="<?php  echo $city->nombre; ?>" readonly>
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <div class="field-label"><label for="recidence">Tiempo de residencia *</label></div>
        <input class="form-control" type="number" id="recidence" name="recidence"
          value="<?php echo $user_profile->recidence; ?>" readonly>
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <div class="field-label"><label for="marital_status">Estado civil *</label></div>
        <?php $marital_states = ComplementModel::repo()->GetMaritalStateById($user_profile->marital_status); ?>
        <input class="form-control" type="text" id="marital_status" name="marital_status" value="<?php  echo $marital_states[0]->nombre; ?>" readonly>
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <div class="field-label"><label for="dependants">Personas a cargo *</label></div>
        <input class="form-control" type="number" id="dependants" name="dependants"
          value="<?php echo $user_profile->dependants; ?>"readonly>
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <div class="field-label"><label for="activity">Actividad economica *</label></div>
        <?php $activity = ComplementModel::repo()->GetEducationLevelById($user_profile->activity); ?>
        <input class="form-control" type="text" id="marital_status" name="marital_status" value="<?php  echo $activity[0]->nombre; ?>" readonly>
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <div class="field-label"><label for="sons">Hijos *</label></div>
        <input class="form-control" type="number" id="sons" name="sons" value="<?php echo $user_profile->sons; ?>" readonly>
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <div class="field-label"><label for="type_housing">Tipo de vivienda *</label></div>
          <?php $house = ComplementModel::repo()->GetTypeHousingById($user_profile->type_housing); ?>
          <input class="form-control" type="text" id="type_housing"  value=" <?php echo  $house[0]->nombre; ?>" name="type_housing" readonly>
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <div class="field-label"><label for="phone">Celular *</label></div>
        <input class="form-control" type="text" id="phone" name="phone" value="<?php echo $user->cellphone; ?>" readonly>
      </div>
    </div>
    
    <div class="col-md-4">
      <div class="form-group">
        <div class="field-label"><label for="education_level">Nivel de educacion *</label></div>
             <?php $education = ComplementModel::repo()->GetEducationLevelById($user_profile->education_level); ?>                                              
        <input class="form-control" type="text" id="education_level" value="<?php echo  $education[0]->nombre; ?>" name="education_level" readonly>
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <div class="field-label"><label for="profession">Profesión *</label></div>
        <input class="form-control" type="text" id="profession" name="profession"
          value="<?php echo $user_profile->profession; ?>"readonly>
      </div>
    </div>
    </div>
  </div>
</div>
</div>
<br />
<!--INFORMACION ECONOMICA-->
<div class="card">
  <div class="card-header alert-primary">
    Informacion economica
  </div>
  <div class="card-body">
    <div class="col-md-12">
      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <div class="field-label"><label for="company">Compañia *</label></div>
            <input class="form-control" type="text" id="company" name="company"
              value="<?php echo $user_profile->company; ?>" readonly>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <div class="field-label"><label for="company_tax_number">NIT de compañia *</label></div>
            <input class="form-control" type="text" id="company_tax_number" name="company_tax_number"
              value="<?php echo $user_profile->company_tax_number; ?>" readonly>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <div class="field-label"><label for="company_adress">Direccion de compañia *</label></div>
            <input class="form-control" type="text" id="company_adress" name="company_adress"
              value="<?php echo $user_profile->company_adress; ?>" readonly>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <div class="field-label"><label for="company_economic_activity">Actividad economica de compañia *</label></div>
            <input class="form-control" type="text" id="company_economic_activity" name="company_economic_activity"
              value="<?php echo $user_profile->company_economic_activity; ?>" readonly>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <div class="field-label"><label for="monthly_earnings">Ingresos mensuales estimados *</label></div>
            <input class="form-control" type="text" id="monthly_earnings" name="monthly_earnings"
              value="<?php echo $user_profile->monthly_earnings; ?>" readonly>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <div class="field-label"><label for="monthly_profit">Ganancias mensuales *</label></div>
            <input class="form-control" type="text" id="monthly_profit" name="monthly_profit"
              value="<?php echo $user_profile->monthly_profit; ?>" readonly>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <div class="form-group">
              <div class="field-label"><label for="company_date">Fecha de ingreso*</label></div>
              <input class="form-control" type="date" id="company_date" name="company_date"
                value="<?php echo $user_profile->company_date ?>" readonly>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <div class="field-label"><label for="company_phone">Telefono de compañia *</label></div>
            <input class="form-control" type="number" id="company_phone" name="company_phone"
              value="<?php echo $user_profile->company_phone; ?>" readonly>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <div class="field-label"><label for="supplier_name">Nombre de proveedor *</label></div>
            <input class="form-control" type="text" id="supplier_name" name="supplier_name"
              value="<?php echo $user_profile->supplier_name; ?>" readonly>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <div class="field-label"><label for="supplier_phone">Telefono de proveedor *</label></div>
            <input class="form-control" type="number" id="supplier_phone" name="supplier_phone"
              value="<?php echo $user_profile->supplier_phone; ?>" readonly>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <div class="field-label"><label for="supplier_adress">Direccion de proveedor *</label></div>
            <input class="form-control" type="text" id="supplier_adress" name="supplier_adress"
              value="<?php echo $user_profile->supplier_adress; ?>" readonly>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <div class="field-label"><label for="supplier_company">Proveedor *</label></div>
            <input class="form-control" type="text" id="supplier_company" name="supplier_company"
              value="<?php echo $user_profile->supplier_company; ?>" readonly>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <div class="field-label"><label for="supplier_tax_number">Numero de tax proveedor *</label></div>
            <input class="form-control" type="text" id="supplier_tax_number" name="supplier_tax_number"
              value="<?php echo $user_profile->supplier_tax_number; ?>" readonly>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <div class="field-label"><label for="supplier_tax_document">Documento tax de proveedor *</label></div>
            <input class="form-control" type="text" id="supplier_tax_document" name="supplier_tax_document"
              value="<?php echo $user_profile->supplier_tax_document; ?>" readonly>
          </div>
        </div>
      </div>
  </div>
</div>
</div>
</div>
<br />
<!--INFORMACION REFERENCIAS PERSONALES Y FAMILIARES-->
<div class="card">
  <div class="card-header alert-primary">
    Referencia personales y familiares
  </div>
  <div class="card-body">
    <div class="col-md-12">
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <div class="field-label"><label for="p_reference_name">Nombre referencia personal *</label></div>
              <input class="form-control" type="text" id="p_reference_name" name="p_reference_name" value="<?php echo $user_profile->p_reference_name; ?>" readonly>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <div class="field-label"><label for="p_reference_lastname">Apellidos referencia personal *</label></div>
              <input class="form-control" type="text" id="p_reference_lastname" name="p_reference_lastname" value="<?php echo $user_profile->p_reference_lastname; ?>" readonly>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <div class="field-label"><label for="p_reference_time">Tiempo de conocidos en años *</label></div>
              <input class="form-control" type="number" id="p_reference_time" name="p_reference_time" value="<?php echo $user_profile->p_reference_time; ?>" readonly>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <div class="field-label"><label for="p_reference_phone">Telefono referencia personal *</label></div>
              <input class="form-control" type="number" id="p_reference_phone" name="p_reference_phone" value="<?php echo $user_profile->p_reference_phone; ?>" readonly>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <div class="field-label"><label for="p_reference_email">Email referencia personal *</label></div>
              <input class="form-control" type="email" id="p_reference_email" name="p_reference_email" value="<?php echo $user_profile->p_reference_email; ?>" readonly>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <div class="field-label"><label for="f_reference_name">Nombre referencia familiar *</label></div>
              <input class="form-control" type="text" id="f_reference_name" name="f_reference_name" value="<?php echo $user_profile->f_reference_name; ?>" readonly>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <div class="field-label"><label for="f_reference_lastname">Apellido referencia familiar *</label></div>
              <input class="form-control" type="text" id="f_reference_lastname" name="f_reference_lastname" value="<?php echo $user_profile->f_reference_lastname; ?>" readonly>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <div class="field-label"><label for="f_reference_phone">Telefono referencia familiar *</label></div>
              <input class="form-control" type="number" id="f_reference_phone" name="f_reference_phone" value="<?php echo $user_profile->f_reference_phone; ?>" readonly>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <div class="field-label"><label for="f_reference_email">Email referencia familiar *</label></div>
              <input class="form-control" type="text" id="f_reference_email" name="f_reference_email" value="<?php echo $user_profile->f_reference_email; ?>" readonly>
            </div>
          </div>
        </div>
      </div>
  </div>
</div>
<br />
<!--DOCUMENTOS ENVIADOS-->
<div class="card">
  <div class="card-header alert-primary">
    Visualizar documentos
  </div>
  <div class="card-body">
    <div class="col-md-12">
       <div class="row">
      <div class="col-md-4">
        <div class="form-group">
           <div class="field-label"><label for="f_dni_front_view">Imagen frontal</label></div>
               <?php if($user_profile->dni_front_view <> NULL || !empty($user_profile->dni_front_view)): ?>
              <img src="<?php echo $user_profile->dni_front_view; ?>" class="float-left img-fluid img-thumbnail" alt="" width="300" height="300">
               <?php else: ?>
                <img src=" ../uploads/dni/default.png" class="float-left img-fluid img-thumbnail" alt="" width="300" height="300">
               <?php endif; ?>
            </div>
          </div>
            <div class="col-md-4">
              <div class="form-group">
   
            <div class="field-label"><label for="f_dni_front_view">Imagen trasera</label></div>
                <?php if($user_profile->dni_rear_view <> null || !empty($user_profile->dni_rear_view)): ?>
              <img src="<?php echo $user_profile->dni_rear_view; ?>" class="float-right img-fluid img-thumbnail" alt="" width="300" height="300">
               <?php else: ?>
                <img src=" ../uploads/dni/default.png" class="float-left img-fluid img-thumbnail" alt="" width="300" height="300">
               <?php endif; ?>
            </div>
          </div>
            </div>
            </div>
      </div>
  </div>
<br />
<!--CREDITOS SOLICITADOS-->
<div class="card">
  <div class="card-header alert-primary">
    Creditos solicitados
  </div>
  <div class="card-body">
    <?php 
    if(is_array($user_credit)){ 
      if(count($user_credit)>0) {  ?>
     <div class="table-responsive">
        <table id="Tabla_modal_credit_user" class="table table-bordered table-striped">
            <thead>
                <tr>
                <th>Tipo de credito </th>
                <th>Monto solicitado</th>
                <th>Monto aprobado</th>
                <th>numero de cuotas</th>
                <th>Fecha de solicitud</th>
                </tr>
            </thead>
            <tbody>
             <?php foreach($user_credit as $user_credit){	
                $type_credit = ComplementModel::Repo()->GetTypeCreditById($user_credit->type_credit);
                ?>
                <tr>
                    <td><?php echo $type_credit[0]->nombre; ?> </td>
                    <td><?php  if($user_credit->amount_requested==null): echo '0'; else: echo $user_credit->amount_requested; endif; ?></td>
                    <td><?php  if($user_credit->amount_approved==null): echo '0';else: echo$user_credit->amount_approved;  endif; ?> </td>
                    <td><?php  if($user_credit->number_quotas==null): echo '0';else:echo $user_credit->amount_approved;  endif; ?></td>
                    <td><?php echo $user_credit->date_creation;?></td>
                </tr>
                <?php  }  ?>
            </tbody>
        </table>
    </div>   
      <?php } else { ?>
  <div class="alert alert-primary">
    <span>
        <b>No hay creditos registrados</b>
    </span>                                                            
   </div>                                    
  <?php } } else { ?>
  <div class="alert alert-danger">
    <span>
        <b>Error en base de datos </b>
    </span>                                                            
  </div><?php } ?>                                                  
  </div>
</div>

<?php } else { ?>
  <div class="alert alert-danger">
    <span>
        <b>Error de base de datos.Hay datos vacios</b>
    </span>                                                            
   </div>                                    
  <?php } ?>                  