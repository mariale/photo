<?php error_reporting(0);  
include("controllers/activate_c.php");
unset($_SESSION['correo']); 
$valor=$_REQUEST['code'];
if($valor!=""){
	unset($_SESSION['code']); 
	verificar($valor);
}else{
	echo "<script>window.location=' 404.html'</script>";
}

?>
