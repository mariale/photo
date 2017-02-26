<?php 
include("./models/conexion.php");
$carpeta=$_REQUEST['codigo_foto'];
$cambio=$_REQUEST['cambio'];
$id=$_REQUEST['id_galeria'];
$carpetaAdjunta="./file/".$carpeta.'/'; 
$Imagenes =count($_FILES['imagenes']['name']);
$infoImagenesSubidas = array();
for($i = 0; $i < $Imagenes; $i++) {
	$exif = exif_read_data($_FILES['imagenes']['tmp_name'], 0, true);
	$tipo=$_FILES['imagenes']['type'][$i];
	$nombreArchivo=isset($_FILES['imagenes']['name'][$i])?$_FILES['imagenes']['name'][$i]:null;
	$nombreTemporal=isset($_FILES['imagenes']['tmp_name'][$i])?$_FILES['imagenes']['tmp_name'][$i]:null;
	$rutaArchivo=$carpetaAdjunta.$nombreArchivo;
	move_uploaded_file($nombreTemporal,$rutaArchivo);

	$conn=get_db_conn();
	$exif = exif_read_data($rutaArchivo, "FILE,COMPUTED,ANY_TAG,IFD0,THUMBNAIL,COMMENT,EXIF", true);
	$linea=strip_tags( $exif['IFD0']['Comments'], '\0');
	$cSQL= "INSERT INTO gaimg_pass(ID_GA, RUTA_GAMI, CODE_PHO_GAIM, FECHA_GAIM, TIPO_GAIM, NAME_GAIM) 
	        VALUES('".$id."', '".$rutaArchivo."', '".$linea."', NOW(),  '".$tipo."' ,  '".$nombreArchivo."')";
	$valor = mysql_query($cSQL,$conn);
	$ultimo_id =  mysql_insert_id();
    get_db_desconn($conn);
    $infoImagenesSubidas[$i]=array("caption"=>"$nombreArchivo","height"=>"120px","url"=>"borrar.php?accion=borrar_img&ruta_img=".$carpeta."/".$nombreArchivo."&id=".$ultimo_id." ","key"=>$carpetaAdjunta);
	if($cambio==1){
		$ImagenesSubidas[$i]=$rutaArchivo;
	}else{
		$ImagenesSubidas[$i]="<img  height='120px'  src='$rutaArchivo' class='kv-preview-data file-preview-image'>";
	}
}
$arr = array("file_id"=>0,"overwriteInitial"=>true,"initialPreviewConfig"=>$infoImagenesSubidas, "initialPreview"=>$ImagenesSubidas);
echo json_encode($arr);
function str2bin($str){
	$str_arr = str_split($str, 4);
	for($i = 0; $i<count($str_arr); $i++)
		$bin = $bin.str_pad(decbin(hexdec(bin2hex($str_arr[$i]))), strlen($str_arr[$i])*8, "0", STR_PAD_LEFT);
	return $bin;
} 
?>