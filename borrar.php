<?php  
if($_REQUEST['accion']=="borrar_img"){
	include("./models/gallery_m.php");
	$carpetaAdjunta="./file/";
	$id=$_REQUEST['id'];
	$key=$_REQUEST['ruta_img'];
	$_REQUEST['ruta_img']="";
	$_REQUEST['id']="";
	$borrar=$carpetaAdjunta.$key;
    if(unlink($borrar)){
    	borrar_img($id);
    }
	echo 0;
}
?>