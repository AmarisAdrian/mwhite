<?php
class FileManager 
{
	public function fileUploader($dni,$file){
			$nombre_img = $_FILES['imagen']['name'].''.$dni;
			if ($dni<> null || empty($dni)) {
				$nombre_img = $_FILES['imagen']['name'];
				$tipo = $_FILES['imagen']['type'];
				$tamano = $_FILES['imagen']['size'];
   				//indicamos los formatos que permitimos subir a nuestro servidor
			if (($_FILES["imagen"]["type"] == "image/gif")
			   ($_FILES["imagen"]["type"] == "image/jpeg")
			   ($_FILES["imagen"]["type"] == "image/jpg")
			   ($_FILES["imagen"]["type"] == "image/png")){
				$directorio = $_SERVER['DOCUMENT_ROOT'].'/uploads/dni/';
				move_uploaded_file($_FILES['imagen']['tmp_name'],$directorio.$nombre_img);
				}
				else;
				{
					echo "No se puede subir una imagen con ese formato ";
				}
			}

	}	
    
}
?>
