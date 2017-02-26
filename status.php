<?php
include("models/conexion.php");
//$url="https://www.sandbox.paypal.com/cgi-bin/webscr";// modo prueba
$url="https://www.paypal.com/cgi-bin/webscr";//modo pago +real
$item_name = $_POST['item_name']; //El nombre de nuestro artículo o pucto.
$order_id = $_POST['item_number']; //El numero o ID de nuestro producto o invoice.
$payment_status = $_POST['payment_status']; //El estado del pago
$amount = $_POST['mc_gross']; //El monto total pagado
$payment_currency = $_POST['mc_currency']; //La moneda con que se ha hecho el pago
$transaction_id = $_POST['txn_id']; //EL ID o Código de transacción.
$receiver_email = $_POST['receiver_email'];//La cuenta que ha recibido el pago. 
$email_validacion="photopassexcursions@gmail.com";
$customer_email = $_POST['payer_email']; //La cuenta que ha enviado el pago.
//bitacora('status.php','Entro en proceso de validacion de pago en paypal', $customer_email, 2);
//si el correo de pago fue hecho a nombre de la empresa
if($receiver_email==$email_validacion){
  bitacora('status.php','Se valido que el correo al que se deposito es el de la cuenta oficial', $customer_email, 2);
  if($payment_currency == "USD") { 
    bitacora('status.php','Se valido que el pago se realizara Con el tipo de moneda corresponiente USD', $customer_email, 2);
    //se completo el pago con el monto completo
    if($payment_status == "Completed") {
      bitacora('status.php','Se valido que el monto pagado sea completo', $customer_email, 2);
      $id_pay=agregarPago($amount, $order_id , $payment_currency, $item_name, $receiver_email, $customer_email, $transaction_id);
      if($id_pay!=0){
        $porciones = explode(" ", $item_name);
        for($i=0;$i<sizeof($porciones);$i++){
          modificarCode($porciones[$i], $id_pay);  
        }
        bitacora('status.php','se logro registrar con exito el pago completo de paypal',$customer_email, 0);
      }else{
        bitacora('status.php','No se logro registrar la confirmacion completa del pago en paypal',$customer_email, 4);
      }
    }else{//se realizo el pago pero no se cancelo todo el monto
      bitacora('status.php','Se realizo el pago correspondiente pero no fue completado solo una parte de '.$amount, $customer_email, 2);
      $id_pay=agregarPago($amount, $order_id , $payment_currency, $item_name, $receiver_email, $customer_email, $transaction_id);
      if($id_pay!=0){
        bitacora('status.php','se logro registrar con exito el pago pero el pago no fue completo en  paypal',$customer_email, 1);
      }else{
        bitacora('status.php','No se logro registrar la confirmacion  del pago en paypal',$customer_email, 2);
      }
    }
  }else{// la moneda con que se pago no es la usada (USA)
     bitacora('status.php','La moneda con que se realizo el pago no fue USD sino :'.$payment_currency, $customer_email, 2);
    if($payment_status == "Completed") { 
      bitacora('status.php','Se valido que el monto pagado sea completo', $customer_email, 2);
      $id_pay=agregarPago($amount, $order_id , $payment_currency, $item_name, $receiver_email, $customer_email, $transaction_id);
      if($id_pay!=0){
        $porciones = explode(" ", $item_name);
        for($i=0;$i<sizeof($porciones);$i++){
          modificarCode($porciones[$i], $id_pay);  
          modificarshopping($porciones[$i]);
        }
        bitacora('status.php',$id_pay.'se logro registrar con exito el pago completo de paypal con moneda diferente',$customer_email, 4);
      }else{
        bitacora('status.php',$id_pay.'No se logro registrar la confirmacion completa del pago en paypal',$customer_email, 4);
      }
    }else{//se realizo el pago pero no se cancelo todo el monto
      bitacora('status.php','Se realizo el pago correspondiente pero no fue completado solo una parte de '.$amount, $customer_email, 2);
      $id_pay=agregarPago($amount, $order_id , $payment_currency, $item_name, $receiver_email, $customer_email, $transaction_id);
      if($id_pay!=0){
        bitacora('status.php','Se logro registrar con exito el pago pero el pago no fue completo en  paypal y se uso una moneda diferente',$customer_email, 2);
      }else{
        bitacora('status.php','No se logro registrar la confirmacion  del pago en paypal',$customer_email, 4);
      }
    }
  }
}else{
  bitacora('status.php','El pago se realizo pero no a la cuenta de paypal indicada la cuenta donde se realizo el pago fue: '.$receiver_email ,$customer_email, 5);
}
/*------------------------------------------------------------------------*/
function agregarPago($monto, $codigo_art, $moneda, $nombre_art, $email_rec, $email_env, $code_transf){
  $conn=get_db_conn();
  mysql_set_charset('utf8');
  $cSQL= "INSERT INTO payment_pass(TYPE_PAY, DATE_PAY, ESTATE_PAY, MONTO_PAY, CODIGO_ART_PAY, TYPE_MONEY_PAY, NAME_ART_PAY, EMAIL_REC_PAY,  EMAIL_ENV_PAY, CODE_TRANSFERENCIA_PAY)
    VALUES ('PAYPAL', NOW(), '1', '".$monto."', '".$codigo_art."', '".$moneda."', '".$nombre_art."', '".$email_rec."', '".$email_env."', '".$code_transf."') ";
  if(mysql_query($cSQL, $conn)){ 
      $val = mysql_insert_id();  
      emeil_codigo($monto, $email_rec, $code_transf, $nombre_art );    
  }else{
      $val = 0;
  }
  get_db_desconn($conn);
  return $val;
}
function bitacora($modulo, $detalle, $usuario, $grado){
  $conn=get_db_conn();
  mysql_set_charset('utf8');
  $ip=getRealIP();
  $cSQL= "INSERT INTO bitacora_pass(MODULO_BI, DETALLE_BI, ID_US_BI, DATE_BI, IP_BI, GRADO_BI)
    VALUES ('".$modulo."', '".$detalle."', '".$usuario."', NOW(), '".$ip."', '".$grado."') ";
  mysql_query($cSQL, $conn);
  get_db_desconn($conn);
}
function getRealIP() {
  if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
      $ip = $_SERVER['HTTP_CLIENT_IP'];
  }elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
      $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
  }else{
      $ip = $_SERVER['REMOTE_ADDR'];
  }
  return $ip;
}
function modificarCode($code, $id_pay){
  $conn=get_db_conn();
  mysql_set_charset('utf8');
  $ip=getRealIP();
  $cSQL= "UPDATE code_pass SET ESTADO_CPASS = 'PAYMENT', ID_PAGO_CPASS = '".$id_pay."' WHERE CODE_CPASS = '".$code."'; ";
  if(mysql_query($cSQL, $conn)){ 
    $val = 1;      
  }else{
    $val = 0;
  }
  get_db_desconn($conn);
  return $val;
}
function modificarshopping( $code){
  $conn=get_db_conn();
  mysql_set_charset('utf8');
  $ip=getRealIP();
  $cSQL= "UPDATE shopping_cart  SET STATE_SC = 1  WHERE ID_CPASS_SC = '".$code."'; ";
  if(mysql_query($cSQL, $conn)){ 
    $val = 1;      
  }else{
    $val = 0;
  }
  get_db_desconn($conn);
  return $val;
}
function emeil_codigo($monto, $person_email,   $nfactura, $articulos){
  $headers = 'MIME-Version: 1.0' . "\r\n";
  $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
  $headers .= 'From: info@photopassexcursions.com' . '\r\n' .
  'Reply-To: info@photopassexcursions.com' . "\r\n" .
  'X-Mailer: PHP/' . phpversion();
       
  $mensaje = "
  <font face='verdana' size='2'>Photopass has registered a payment via paypal with your email
  <br><br>
  
  Payment detail:<br><br>
  N° payment: <b>$nfactura</b> <br>
  Way to pay: <b>Paypal</b> <br>
  Cost: <b>$monto US $</b> <br>
  Paid track code: <b>$articulos</b> <br>
  <br><br>
  
  If you have problems with the payment made, contact us through the mail.<br><br>
  Thanks for choosing us.<br><br>

  visit us in <b>PHOTOPASS</b><br >
  <a href='www.photopassexcursions.com'>www.photopassexcursions.com</a><br></font>
  <br><br>";
  mail($person_email,"Photopass has registered a payment via paypal with your email",$mensaje,$headers);
}
?>
