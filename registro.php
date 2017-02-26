<?php 
error_reporting(0);
include("controllers/registro.php"); 
unset($_SESSION['correo']); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php head("PHOTOPASS | NEW USER"); ?>
</head>
<style>
#map {
    height: 100%;
}
.controls {
  margin-top: 10px;
  border: 1px solid transparent;
  border-radius: 2px 0 0 2px;
  box-sizing: border-box;
  -moz-box-sizing: border-box;
  height: 32px;
  outline: none;
  box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
}
#pac-input {
  background-color: #fff;
  font-family: Roboto;
  font-size: 15px;
  width: 70%;
  margin-left: 12px;
  margin-top: 10px;
  padding: 0 11px 0 13px;
  text-overflow: ellipsis;
  
}
#pac-input:focus {
  border-color: #4d90fe;
}
.pac-container {
  font-family: Roboto;
}
#type-selector {
  color: #fff;
  background-color: #4d90fe;
  padding: 5px 11px 0px 11px;
}
#type-selector label {
  font-family: Roboto;
  font-size: 13px;
  font-weight: 300;
}
</style>
<body style="background-image: url('img/img.jpg'); background-size: cover;">
       <header class="" style="background: rgba(6, 6, 6, 0.7); height: 118px;">
            <a href="index.php" class="logo">
                <img src="img/Login/Log_login.png" height="100 px" style="margin-left: 20px;">
            </a>
            <div class="hidden-xs">
                <div class="top-nav notification-row" style="width: 400px; margin-right: 7px;" id="loginClav">
                    <ul class="nav pull-right top-menu" >
                        <li style="width: 250px;">
                            <div class="input-group" style="margin-top: 0px;">
                                <span class="input-group-addon"><i class="icon_profile" style="color: #607D8B;"></i></span>
                                <input type="text" class="form-control" placeholder="Username" autofocus id="user" width="200px">
                            </div>
                            <div class="input-group" style="margin-top: 2px;">
                                <span class="input-group-addon"><i class="icon_key_alt" style="color: #607D8B;"></i></span>
                                <input type="password" class="form-control" placeholder="Password" id="passw" width="200px">
                            </div>
                            <div id="msn" style="display:none; margin-bottom: 0px" >
                                <span style="color:#00BCD4;">user and password invalidates</span>
                            </div>
                            <span class="pull-right" style="margin-top: 0px"> <a style="cursor: pointer;color: #ffffff; margin-top: -5px" onclick="recordarClave();"> Forgot Password?</a></span>
                        </li>
                        <li>
                            <input class="btn btn-primary btn-lg btn-block" type="button"  onclick="login();" value="Login" style="width: 100px; padding: 5px;">
                            <input class="btn btn-info btn-lg btn-block" type="button" onclick="registro();" value="New User" style="width: 100px; padding: 5px;">
                        </li>
                    <ul>
                </div>
                <div class="top-nav notification-row" id="recuperarCla" style="width: 400px;display:none">        
                    <ul class="nav pull-right top-menu" >
                        <li style="width: 250px;margin-right: 110px;">
                            <div class="input-group" style="margin-top: 0px;">
                                <span class="input-group-addon">
                                    <i class="icon_profile" style="color: #607D8B;"></i>
                                </span>
                                <input type="text" class="form-control" placeholder="Email" autofocus id="emailUser" width="200px">
                            
                            </div>
                            <ul class="nav top-menu" >
                                <li>
                                  <input class="btn btn-primary btn-lg btn-block" type="button"  onclick="recuperarClaveUser();" value="Send" style="width: 120px; padding: 5px;margin-right:  5px; margin-top: 5px; margin-left: -10px;">
                                <li>
                                </li>
                                  <input class="btn btn-info btn-lg btn-block" type="button" onclick="cancelarRecuperacion();" value="Cancel" style="width: 120px; padding: 5px;margin-left: 10px; margin-top: 5px; margin-right:  -5px;">
                                </li>
                            <ul>
                        </li>
                    <ul>
                </div>
            </div>
      </header>
      <br>
        <div class="row">
            <div class="col-lg-2 col-sm-2 col-md-2 col-xs-1">
            </div>
             <div class="col-lg-8 col-sm-8 col-md-8 col-xs-10">
                <section class="panel" style="background: rgba(252, 254, 255, 0.9);">                               
                    <div class="panel-body bio-graph-info">
                        <form class="form-horizontal" role="form">  
                          <div class="row">
                            <div class="col-lg-12" id="informacionUsuarioRegistro">
                              <h2>Personal Information</h2>     
                              <div class="form-group">
                                <label class="col-lg-2 control-label" style=" margin-top: 10px;"> Name *</label>
                                <div class="col-lg-10" style=" margin-top: 10px;">
                                  <input type="text" class="form-control" id="f-name" placeholder=" " required>
                                </div>
                                <label class="col-lg-2 control-label" style=" margin-top: 10px;">Last Name *</label>
                                <div class="col-lg-10" style=" margin-top: 10px;">
                                  <input type="text" class="form-control" id="f-l-name" placeholder=" " required>
                                </div>
                                <label class="col-lg-2 control-label" style=" margin-top: 10px;">Birthdate *</label>
                                <div class="col-lg-10" style=" margin-top: 10px;">
                                  <input type="date" class="form-control" id="b-day" placeholder=" " required>
                                </div>
                                <label class="col-lg-2 control-label" style=" margin-top: 10px;">E-mail *</label>
                                <div class="col-lg-10" style=" margin-top: 10px;">
                                  <input type="email" class="form-control" id="email" placeholder=" " required>
                                </div>
                                <div class="" style="display:none">
                                  <label class="col-lg-2 control-label" style=" margin-top: 10px;">Mobile</label>
                                  <div class="col-lg-10" style=" margin-top: 10px;">
                                    <input type="text" class="form-control" id="mobile" placeholder=" ">
                                  </div>
                                  <label class="col-lg-2 control-label" style=" margin-top: 10px;">Correspondence</label>
                                  <div class="col-lg-10" style=" margin-top: 10px;">
                                    <input type="text" class="form-control" id="correspondence" placeholder=" ">
                                  </div>
                                </div>
                                
                              </div>
                              <div class="form-group">
                                <label class="col-lg-2 control-label">Location *</label>
                                <div class="col-lg-10">
                                  <div id="map"  width="100%" style="height: 200px;" ></div>
                                    <input type="text" class="form-control" id="pac-input" placeholder=" " required>
                                    <input type="hidden" class="form-control" id="lat" >
                                    <input type="hidden" class="form-control" id="lon" >
                                </div>
                              </div>
                            </div>
                            <div class="col-lg-12" id="informacionUsuarioRegistroVer" >
                              <h2>User Information</h2>
                              <div class="form-group">
                                <label class="col-lg-2 control-label" style=" margin-top: 10px;">Username *</label>
                                <div class="col-lg-10" style=" margin-top: 10px;">
                                  <input type="text" class="form-control" id="u-name" placeholder=" " required>
                                </div>
                                <label class="col-lg-2 control-label" style=" margin-top: 10px;">Password *</label>
                                <div class="col-lg-10" style=" margin-top: 10px;">
                                  <input type="password" class="form-control" id="1-pass" placeholder=" " required>
                                </div>
                                <label class="col-lg-2 control-label" style=" margin-top: 10px;">Confirm Password *</label>
                                <div class="col-lg-10" style=" margin-top: 10px;">
                                  <input type="password" class="form-control" id="2-pass" placeholder=" " required>
                                </div>
                              </div>
                            </div><br>
                            <div class="row">
                              <div class="col-lg-12">
                                <div class="form-group">
                                   <label class="col-lg-2 control-label"></label>
                                    <div class="col-lg-3 col-md-3"  id="colSave">
                                      <a data-toggle="modal" id="guardarRegistro" class="btn btn-primary btn-block" onclick="continuarRegistrousUario();" >Save</a>
                                    </div>
                                    <div class="col-lg-3 col-md-3" id="colNext" style="display:none">
                                      <a data-toggle="modal" id="nextRegistro" class="btn btn-primary btn-block" onclick="continuarRegistrousUario();" >Next</a>
                                    </div>
                                    <div class="col-lg-3 col-md-3">
                                      <a data-toggle="modal" class="btn btn-info btn-block" onclick="cancelarRegistro();">Cancel</a>
                                    <br></div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </section>
              </div>
            </div>
          </div>
        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModalVer" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                    <h4 class="modal-title"><span>Information</span><span id="modalConfirmacion"></span></h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="col-lg-12" id="textoConfirmacion">
                            <h3 style="color: black;">It has successfully saved this information.</h3>
                            <h3 style="color: black;">To continue registering an email to the address provided will be sent with the activation code . Check information for validation.</h3>
                            <br>
                            <input type="button" class="btn btn-primary btn-block" onclick="continuarRegistro();" value="Next">
                        </div>
                        <div class="col-lg-12" id="codigoConfirmacion" style="display: none">
                            <input type="text" class="form-control" id="code_act" placeholder="Confirmation of code " required>
                            <br>
                            <input type="button" class="btn btn-primary btn-block" onclick="confirmarRegistro();" value="Confirmation">
                        </div>
                        <div class="col-lg-12" id="codigofinalizar" style="display: none">
                            <h3 style="color: black;">!!!User activation was successful , continue to enter the system!!!</h3>
                            <br>
                            <input type="button" class="btn btn-primary btn-block" onclick="finalizarRegistro();" value="Confirmation">
                        </div>
                    </div>
                </div>
            </div>
      </div>
    </div>
    </section>
    <?php foot(); ?>
    <div aria-hidden="true" aria-labelledby="MContactoB" role="dialog" tabindex="-1" id="MContactoB" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content" style="    border: 0px; background: rgb(250, 250, 250);">
                <div class="modal-header" style="border: 0px;background: #074a7f;">
                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">X</button>
                    <h4 class="modal-title">Contact</h4>
                </div>
                <div class="modal-body" id="contenidoContacto">
                    <input type="text" class="form-control" placeholder="Email *" autofocus id="eUser" style="margin-bottom: 5px;">
                    <input type="text" class="form-control" placeholder="Ful name *"  id="fname" style="margin-bottom: 5px;">
                    <textarea class="form-control" rows=10 style="margin-bottom: 5px;" id="despComentario"></textarea> 
                    <input class="btn btn-primary" type="button"  onclick="enviarCorreoContacto();" value="Send">
                    <input class="btn btn-info" type="button" onclick="Ccontacto();" value="Cancel">
                </div>
            </div>
        </div>
    </div>
    <div aria-hidden="true" aria-labelledby="MContactoB" role="dialog" tabindex="-1" id="MAviso" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content" style="    border: 0px; background: rgb(250, 250, 250);">
                <div class="modal-header" style="border: 0px;background: #074a7f;">
                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">X</button>
                    <h4 class="modal-title">Contact</h4>
                </div>
                <div class="modal-body" id="contenidoContacto" >
                    <p style="color: #000;">The message has been sent correctly, our team is working to help you with all your needs.</p>
                    <input class="btn btn-info" type="button" onclick="CAviso();" value="Cancel">
                </div>
            </div>
        </div>
    </div>
    <div aria-hidden="true" aria-labelledby="MHelp" role="dialog" tabindex="-1" id="MHelp" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content" style="    border: 0px; background: rgb(250, 250, 250);">
                <div class="modal-header" style="border: 0px;background: #074a7f;">
                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">X</button>
                    <h4 class="modal-title">HELP</h4>
                </div>
                <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
                    <li class="active"><a href="#English1" data-toggle="tab">English</a></li>
                    <li><a href="#spanish1" data-toggle="tab">Spanish</a></li>
                </ul>
                <div id="my-tab-content" class="tab-content">
                    <div class="tab-pane active" id="English1">
                        <div class="modal-body" style="color: #000;">
                            <p>Welcome to the Photopass Excursions® help section where you can find what you need to enjoy your experience, view your photos online or download them to your device.</p>
                            <p>• How do I find my photos?</p>
                            <p>When you enter our website, you must complete the registration form and activate your account before you can view the photos. Registration is completely free and your information is kept private and secure.</p>
                            <p>• I have filled out the registration form, but I have not received the activation email Email activation is automatically sent at the time of initial enrollment, however, junk mail and spam filters can sometimes filter the message from your account. We recommend that you check it in your spam folder or add "info@photopassexcursions.com" to your list of trusted senders, or write to cs@photopass.com.do to activate your account manually.</p>
                            <p>• Once registered, there are two ways to locate your pictures.</p>
                            <p>If you were given a card or a ticket with a bar code, you can search for the photos by their alphanumeric code, which is printed under the bar code of your card or brand.
                            <p>Go to the section of the account and click the "MY PHOTOPASS" button in the side menu, pressing the "PassCode" button will get a window where you must enter your code (make sure your barcode is attached to your account ) User code "</p>
                            <p>• If you paid the photo gallery in the place where they were taken, you will see the photo gallery with the "SAVE" button, instantly the photos will be uploaded to your account, where you can enjoy them, share them and download them on your device.</p>
                            <p>• If you did not pay the payment at the place where the photographs were taken and you want to exchange them online, you will see the "AddCart" button that will take you to the platform where you can make a secure payment with your credit card OR Paypal account.</p>
                            <p>When you complete the payment process, you will return to MY PHOTOPASS / PassCode and enter your code again, you will see the "SAVE" option, the photos will be uploaded to your account, where you can enjoy them, share them and download them to your device.</p>
                            <p>You can always view your photos in Photopass Excursions® by clicking on "MY GALLERY"</p>
                            <p>• I have difficulty finding my photos.</p>
                            <p>If you have a problem finding your photos, please send an email to photohelp@photopass.com.do with a description of you and your family, what trip or excursion you were in, approx. Time and date, any bar code that was provided, and we will gladly open a support ticket for the solution of your case.</p>
                            <p>• Is this site safe?</p>
                            <p>The answer is Yes. The connection to this site is encrypted and authenticated by strong protocol (TLS 1.2), strong key exchange (ECDHE_RSA with P-256) and strong encryption (AES_256_GCM). This means that any data you send us will be encrypted by your computer and decrypted by us and the same will happen when we send the data. This encryption is verified by COMODO SRA. Any page that prompts you to enter personal information (log screens, log screens, account details, shopping cart and checkout) is protected, all other pages are transmitted unencrypted, which can cause your Browser to display a warning when moving from an encrypted page to an unencrypted page.</p>
                        </div>
                    </div>
                    <div class="tab-pane" id="spanish1">
                        <div class="modal-body" style="color: #000;">
                            <p>Bienvenido a la sección de ayuda de Photopass Excursions®, donde podrá conocer lo necesario para poder disfrutar de su experiencia, visualizando sus fotos en línea o descargándolas en su dispositivo.</p> 
                            <p>• ¿Cómo encuentro mis fotos?</p>
                            <p>Al ingresar en nuestra página web, debe llenar el formulario de registro y activar su cuenta antes de poder ver las fotos. El registro es totalmente gratuito y su información se mantiene privada y segura.</p>
                            <p>•  He llenado el formulario de registro, pero no he recibido el correo de activación</p>
                            <p>El correo electrónico de activación se le envía automáticamente en el momento del registro inicial, sin embargo, el spam de correo electrónico y los filtros basura a veces pueden filtrar el mensaje de su cuenta. Le recomendamos le revisar en su carpeta de spam o bien agregue “info@photopassexcursions.com” a su lista de remitentes de confianza, o escribanos a cs@photopass.com.do para que su cuenta se active manualmente.</p>
                            <p>• Una vez registrado, hay dos maneras de localizar sus imágenes.</p>
                            <p>Si le dieron una tarjeta o boleto con un código de barras en él, usted puede buscar las fotos por su código alfanumérico, que se imprime bajo el código de barras en su tarjeta o tiket.</p>
                            <p>Ir a la sección de cuenta y Pulsar en el botón “MY PHOTOPASS” del menú lateral, al pulsar el botón “PassCode” le aparecerá una ventana donde deberá introducir su código (asegúrese de que su código de barras se adjunta a su cuenta)  “UserCode”</p>
                            <p>• Si saldó el pago de la galería de fotos en el lugar que fueron tomadas le aparecerá la galería de fotos con el botón “SAVE”, al instante serán cargadas las fotos a su cuenta, donde podrá disfrutar de ellas, compartirlas y descargarlas en su dispositivo.</p>
                            <p>• Si no saldó el pago en el lugar que se tomaron las fotografías y desea combrarlas en línea, le aparecerá el botón “AddCart” que le llevará a la plataforma donde podrá hacer un pago seguro con su tarjeta de crédito o cuenta de Paypal.</p>
                            <p>Al completar el proceso de pago Regresará a MY PHOTOPASS / PassCode e introducirá su código nuevamente, le aparecerá la opción  “SAVE” al instante serán cargadas las fotos a su cuenta, donde disfrutar de ellas, compartirlas y descargarlas en su dispositivo.</p>
                            <p>Siempre podrá ver sus fotos en Photopass Excursions® pulsando el botón “MY GALLERY”</p>
                            <p>• Tengo inconvenientes para encontrar mis fotos.</p>
                            <p>Si tiene algún inconveniente para encontrar sus fotos, favor envíe un correo electrónico a photohelp@photopass.com.do con una descripción de usted y su familia, en qué viaje o excursión estaba, aprox. Hora y fecha, cualquier código de barras que se le proporcionó, y con gusto abriremos un ticket de soporte para la solución de su caso.</p>
                            <p>• ¿Es este sitio seguro?</p>
                            <p>La Respuesta es Sí. La conexión a este sitio está encriptada y autenticada mediante un protocolo fuerte (TLS 1.2), un intercambio fuerte de claves (ECDHE_RSA con P-256) y un cifrado fuerte (AES_256_GCM). Esto significa que cualquier dato que nos envíe será cifrado por su computadora y descifrado por nosotros y lo mismo ocurrirá cuando le enviemos los datos. Este cifrado es verificado por COMODO SRA. Cualquier página en la que se le pida que ingrese información personal (pantallas de registro, pantallas de registro, detalles de la cuenta, carrito de compras y comprobación) está protegida, todas las demás páginas se transmiten sin cifrar, lo que puede hacer que su navegador muestre una advertencia al pasar de una página cifrada a una página sin cifrar.</p>
                        </div>
                    </div>  
                </div>
            </div> 
        </div>
    </div>
    <div aria-hidden="true" aria-labelledby="MAbout" role="dialog" tabindex="-1" id="MAbout" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content" style="    border: 0px; background: rgb(250, 250, 250);">
                <div class="modal-header" style="border: 0px;background: #074a7f;">
                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">X</button>
                    <h4 class="modal-title">ABOUT US</h4>
                </div>
                <div id="content">
                    <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
                        <li class="active"><a href="#English2" data-toggle="tab">English</a></li>
                        <li><a href="#spanish2" data-toggle="tab">Spanish</a></li>
                    </ul>
                    <div id="my-tab-content" class="tab-content">
                        <div class="tab-pane active" id="English2">
                            <div class="modal-body" style="color: #000;">
                                <p>Photopass® excursions was born with the purpose of bringing to the modern and technological world, the traditional system of delivering photographs to the clients in the different parks, excursions and attractions in the Dominican Republic.</p>
                                <p>Operated by 2S Internetwork Corp., a company that develops innovative ideas in different professional areas with more than 20 years of experience in the field of digital images and printing.</p>
                                <p>Moved to evolve from the delivery of printed images or CD's, USB to a robust and innovative system of delivery of photographs in the clouds, where our visitors will enjoy a true experience when receiving your photos.</p>
                                <p>We are committed to our partners and visitors to continue to innovate and strengthen this platform so that it continues to be the most modern, practical and fast way to deliver and receive in the present what will be memories of unforgettable moments.
                                <p>Thank you for your trust</p>
                                <p>The PHOTOPASS® Team</p>
                            </div>
                        </div>
                        <div class="tab-pane" id="spanish2">
                            <div class="modal-body" style="color: #000;">
                                <p>Photopass® excursions nace con el proposito de traer al mundo moderno y tecnologico, el sistema tradicional de entregas de fotografias a los clientes en los distintos parques, excursiones y atracciones en la República Dominicana.</p>
                                <p>Operado por 2S Internetwork Corp. empresa desarrolladora de ideas innovadoras en distintas áreas profesionales con mas de 20 años de experiencia en el área de imagenes digitales e impresión.</p>
                                <p>Movidos a evolucionar de la entrega de imagenes impresas o CD's, USB a un robusto e innovador sistema de entrega de fotografias en las nubes, donde nuestros visitantes disfrutaran de una verdadera experiencia al momento de recibir sus fotos.</p>
                                <p>Estamos comprometidos con nuestros asociados y visitantes a continuar innovando y fortaleciendo esta plataforma para que continue siendo la via mas moderna, práctica y rápida al momento de entregar y recibir en el presente lo que serán recuerdos de momentos inolvidables.</p>
                                <p>Gracias por su confianza</p>
                                <p>El Equipo de PHOTOPASS®</p>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>
    <div aria-hidden="true" aria-labelledby="MLocalizacion" role="dialog" tabindex="-1" id="MLocalizacion" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content" style="    border: 0px; background: rgb(250, 250, 250);">
                <div class="modal-header" style="border: 0px;background: #074a7f;">
                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">X</button>
                    <h4 class="modal-title">2S INTERNETWORK CORP. Bávaro, Punta Cana, La Altagracia.</h4>
                </div>
                <div class="modal-body"  >
                   <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d8707.769634719829!2d-68.44413086589161!3d18.693312465205445!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8ea8eb9681cb2fbd%3A0xd2f0b44f2d9fd047!2sB%C3%A1varo%2C+23000%2C+Rep%C3%BAblica+Dominicana!5e0!3m2!1ses!2sve!4v1486227929826" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                    <p style="color: #000;">Tel.: 809-552-1281 / 829-376-726 / 809-879-7041</p>
                    <p style="color: #000;">info@photopass.com.do</p>
                </div>
            </div>
        </div>
    </div>
    <div aria-hidden="true" aria-labelledby="MPolitica" role="dialog" tabindex="-1" id="MPolitica" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content" style="    border: 0px; background: rgb(250, 250, 250);">
                <div class="modal-header" style="border: 0px;background: #074a7f;">
                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">X</button>
                    <h4 class="modal-title">HELP</h4>
                </div>
                <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
                    <li class="active"><a href="#English3" data-toggle="tab">English</a></li>
                    <li><a href="#spanish3" data-toggle="tab">Spanish</a></li>
                </ul>
                <div id="my-tab-content" class="tab-content">
                    <div class="tab-pane active" id="English3">
                        <div class="modal-body" style="color: #000;">
                            <p>What are cookies?</p>
                            <p>A cookie is a file that is downloaded to the computer / smartphone / tablet when accessing certain web pages. Cookies allow you to store and retrieve information about the browsing habits that are performed from the mentioned equipment.</p>
                            <p>The user's browser memorizes cookies on the hard disk only while the session is open. Cookies do not contain any specific personal information, and most are deleted from the hard disk at the end of the browser session (so-called session cookies).</p>
                            <p>Most browsers accept cookies as standard and, regardless of the cookies, allows or prevents temporary or memorized cookies in the security settings.</p>
                            <p>What types of cookies does this website use?</p>
                            <p>Techniques and session:</p>
                            <p>They allow the user to navigate through a web page remembering your username while browsing identified. These cookies are necessary for the use of the web by the registered users for the use of the functionalities associated to the different user profiles.</p>
                            <p>Analysis Cookies:</p>
                            <p>They are those that well treated, allow us to quantify the number of users and thus carry out the measurement and statistical analysis of the use that users make of the offered service. For this, we analyze your navigation on our website in order to improve the offer of products or services that we offer.</p>
                            <p>Integrated services: on some pages there is the possibility of inserting third-party content, sharing or interacting with social networks. In these cases the services of third parties use cookies to offer the service. YouTube, Google+, Twitter, Facebook.</p>
                            <p>Acceptance of cookie usage:</p>
                            <p>By using this website, you expressly accept the processing of the information collected in the form and for the aforementioned purposes and also acknowledge the possibility of refusing the processing of data and information by blocking the use of cookies by means of the appropriate configuration in the browser . Keep in mind that this option of blocking cookies can make it difficult to fully use all the features of the website.</p>
                            <p>Photopass Excursions is not responsible for the content of the privacy policies of third parties included in this cookie policy. If you have questions about this cookie policy, you can contact us by writing to cs@photopassexcursions.com</p>
                        </div>
                    </div>
                    <div class="tab-pane" id="spanish3">
                        <div class="modal-body" style="color: #000;">
                            <p>Que son las Cookies</p>
                            <p>Una cookie es un fichero que se descarga en el ordenador/smartphone/tablet al acceder a páginas web determinadas. Las cookies permiten almacenar y recuperar información sobre los hábitos de navegación que se realizan desde el equipo mencionado.</p>
                            <p>El navegador del usuario memoriza cookies en el disco duro solamente mientras permanece abierta la sesión. Las cookies no contienen ninguna clase de información personal específica, y la mayoría se borra del disco duro al finalizar la sesión de navegador (las denominadas cookies de sesión).</p>
                            <p>La mayoría de los navegadores acepta como estándar las cookies y, con independencia de las mismas, permite o impide en los ajustes de seguridad las cookies temporales o memorizadas.</p>
                            <p>¿Qué tipos de cookies utiliza este sitio web?</p>
                            <p>Técnicas y de sesión: </p>
                            <p>Permiten al usuario la navegación a través de una página web recordando tu nombre de usuario mientras navegas identificado. Estas cookies son necesarias para la utilización de la web por parte de los usuarios registrados para el uso de las funcionalidades asociadas a los distintos perfiles de usuario.</p>
                            <p>Cookies de análisis:</p>
                            <p>Son aquellas que bien tratadas, nos permiten cuantificar el número de usuarios y así realizar la medición y análisis estadístico de la utilización que hacen los usuarios del servicio ofertado. Para ello se analiza su navegación en nuestra página web con el fin de mejorar la oferta de productos o servicios que le ofrecemos.</p>
                            <p>Servicios integrados: en algunas páginas existe la posibilidad de insertar contenidos de terceros, compartir o interactuar con redes sociales. En estos casos los servicios de terceros utilizan cookies para ofrecer el servicio. YouTube, Google+, Twitter, Facebook.</p>
                            <p>Aceptación de uso de cookie:</p>
                            <p>Con la utilización de este sitio web, aceptas expresamente el tratamiento de la información recabada en la forma y con los fines anteriormente mencionados y asimismo reconoces la posibilidad de rechazar el tratamiento de datos e información bloqueando el uso de cookies mediante la configuración apropiada en el navegador. Ten en cuenta que esta opción de bloqueo de cookies puede dificultar el uso pleno de todas las funcionalidades del sitio web.</p>
                            <p>Photopass Excursions no se hace responsable del contenido de las políticas de privacidad de los terceros incluidos en esta política de cookies. Si tiene dudas sobre esta política de cookies, puedes contactar con nosotros escribiendonos a cs@photopassexcursions.com</p>
                        </div>
                    </div>  
                </div>
            </div> 
        </div>
    </div>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assets/jquery-knob/js/jquery.knob.js"></script>
    <script src="js/scripts.js"></script>
    <script src="js/acciones/login.js"></script>
    <script src="js/acciones/registro.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCVzBmsnNTmxuYNlx0umvuR-b1MznMuWh4&libraries=places&callback=initialize" async defer></script>
    </body>
</html>
