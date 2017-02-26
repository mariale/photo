<?php 
    error_reporting(0);
    include("controllers/restructura_c.php"); 
    session_start();
    unset($_SESSION['correo']); 
    $valor=$_REQUEST['code'];
    verificar($valor);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php head("PHOTOPASS | LOGIN") ?>
</head>
    <body class="login-img3-body">
         
        <div class="container" id="login">
            <div id="loginClav">
                <form class="login-form">        
                    <div class="login-wrap">
                        <p class="login-img"><img src="img/Login/Log_login.png" width="100%"></p>
                        <div class="input-group">
                            <span class="input-group-addon" id="p1"><i class="icon_key_alt"></i></span>
                            <input type="password" class="form-control" placeholder="Password" autofocus id="passw1">
                        </div>
                        <div class="input-group" >
                            <span class="input-group-addon" id="p2"><i class="icon_key_alt"></i></span>
                            <input type="password" class="form-control" placeholder="Repeat password" id="passw2">
                        </div>
                        <input class="btn btn-primary btn-lg btn-block" type="button"  <?php echo 'onclick="cambiar(\''.$valor.'\' )"'?> value="Change Password">
                        <input class="btn btn-info btn-lg btn-block" type="button" onclick="cancelar();" value="Cancel">
                    </div>
                </form>
            </div> 
        </div> 
    </body>
    <script src="js/acciones/restructura.js"></script>
    <script src="js/jquery.js"></script>
    <script src="js/jquery-1.8.3.min.js"></script>
</html>
