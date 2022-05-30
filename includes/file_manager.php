<?php
class FileManager 
{
	public static function fileUploader($dni,$file){
			if (!is_null($file) && !empty($file)) {
				$nombre = $_FILES[$file]['name'];
				$nombre_img = $dni.$nombre;
				$tipo = $_FILES[$file]['type'];
				$tamano = $_FILES[$file]['size'];
			    if (($_FILES[$file]["type"] == "image/gif")|| ($_FILES[$file]["type"] == "image/jpeg")||($_FILES[$file]["type"] == "image/jpg")|| ($_FILES[$file]["type"] == "image/png") ||$tamano<20048){
					$directorio = '../uploads/dni/';
					move_uploaded_file($_FILES[$file]['tmp_name'],$directorio.$nombre_img);
					$nombr_img = $directorio.$nombre_img;
				}
				else
				{
					echo "No se puede subir una imagen con ese formato ";
				}
			}else{
				echo "Campos vacios o nulos ";
			}
			return $nombr_img;

	}	
    
}
?>
