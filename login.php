<?php 
error_reporting(0);
include("controllers/login.php"); ?>
<?php 
limpiar();
unset($_SESSION['correo']);  ?>
<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
 <meta charset="UTF-8">
    <?php head("PHOTOPASS | LOGIN") ?>
    <style>
        #makeMeScrollable
        {
            width:100%;
            height: 330px;
            position: relative;
        }
        #makeMeScrollable div.scrollableArea *
        {
            position: relative;
            display: block
            float: left;
            margin: 0;
            padding: 0;
            -webkit-user-select: none;
            -khtml-user-select: none;
            -moz-user-select: none;
            -o-user-select: none;
            user-select: none;
        }
html
{
    position: relative; 
    min-height: 100%;
}
body
{
    margin: 0 0 65px;
}
footer
{
    width: 100%;
    bottom: 0;
    position: absolute;
    height: 65px;
}
    </style>
</head>
    <body style="background-image: url('img/img.jpg'); background-size: cover;">
       <header class="" style="background: rgba(6, 6, 6, 0.8); height: 118px;">
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
        <div class="container visible-xs" id="login">
            <div id="loginClav">
                <form class="login-form" style="background: rgb(18, 18, 19);  ">        
                    <div class="login-wrap">
                        <p class="login-img"><img src="img/is.png" width="50%"></p>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="icon_profile"></i></span>
                            <input type="text" class="form-control" placeholder="Username" autofocus id="user1">
                        </div>
                        <div class="input-group" >
                            <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                            <input type="password" class="form-control" placeholder="Password" id="passw1">
                        </div>
                        <div id="msn" style="display: none;" >
                            <span style="color:#fd0505;">user and password invalidates</span>
                        </div>
                        <label class="checkbox">
                            <span class="pull-right"> <a style="cursor: pointer" onclick="recordarClave();"> Forgot Password?</a></span>
                        </label>
                        <input class="btn btn-primary btn-lg btn-block" type="button"  onclick="login1();" value="Login">
                        <input class="btn btn-info btn-lg btn-block" type="button" onclick="registro();" value="New User">
                    </div>
                </form>
            </div>            
            <div id="recuperarCla" style="display:none">
                <form class="login-form">        
                    <div class="login-wrap">
                        <p class="login-img"><img src="img/Login/Log_login.png" width="100%"></p>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="icon_profile"></i></span>
                            <input type="text" class="form-control" placeholder="Email" autofocus id="emailUser">
                        </div>
                        <input class="btn btn-primary btn-lg btn-block" type="button"  onclick="recuperarClaveUser();" value="Send">
                        <input class="btn btn-info btn-lg btn-block" type="button" onclick="cancelarRecuperacion();" value="Cancel">
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
        <div class="col-mx-5 col-md-5 col-lg-5 col-md-push-7 col-mx-push-7 col-lg-push-7 " > 
            <div class="" style="background: rgb(18, 18, 18); padding: 8px; margin: 10px; border-radius: 0px; box-shadow: 1px 1px 1px #000">
                <div id="makeMeScrollable" style="height: 100%;">
                    <img src="img/fot1.png" width="100%" id="img_1">
                </div>
                <br>
                <div><p style="color:#FFF">View the photos of their excursions. Share them on social network of your choice. </p>Download them to you device. <a href="registro.php" style="cursor: pointer;">CREATE YOUR ACCOUNT</a></p></div>
            </div>
        </div> 
        </div>
    </body>
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
                            <p>Welcome to the Photopass Excursions help section where you can find what you need to enjoy your experience, view your photos online or download them to your device.</p>
                            <p>Please register to access this information.</p>
                            <p><a href="registro.php" style="cursor: pointer;">CREATE YOUR ACCOUNT</a></p>
                        </div>
                    </div>
                    <div class="tab-pane" id="spanish1">
                        <div class="modal-body" style="color: #000;">
                            <p>Bienvenido a la seccion de ayuda de Photopass Excursions, donde podra conocer lo necesario para poder disfrutar de su experiencia, visualizando sus fotos en linea o descargandolas en su dispositivo.</p> 
                            <p>Por favor registrese para tener acceso a esta informacion.</p>
                            <p><a href="registro.php" style="cursor: pointer;">CREATE YOUR ACCOUNT</a></p>
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
                                <p>Photopass excursions was born with the purpose of bringing to the modern and technological world, the traditional system of delivering photographs to the clients in the different parks, excursions and attractions in the Dominican Republic.</p>
                                <p>Operated by 2S Internetwork Corp., a company that develops innovative ideas in different professional areas with more than 20 years of experience in the field of digital images and printing.</p>
                                <p>Moved to evolve from the delivery of printed images or CD's, USB to a robust and innovative system of delivery of photographs in the clouds, where our visitors will enjoy a true experience when receiving your photos.</p>
                                <p>We are committed to our partners and visitors to continue to innovate and strengthen this platform so that it continues to be the most modern, practical and fast way to deliver and receive in the present what will be memories of unforgettable moments.
                                <p>Thank you for your trust</p>
                                <p>The PHOTOPASS Team</p>
                            </div>
                        </div>
                        <div class="tab-pane" id="spanish2">
                            <div class="modal-body" style="color: #000;">
                                <p>Photopass excursions nace con el proposito de traer al mundo moderno y tecnologico, el sistema de entregas de fotografias a los clientes en los distintos parques, excursiones y atracciones en la Republica Dominicana.</p>
                                <p>Operado por 2S Internetwork Corp. empresa desarrolladora de ideas innovadoras en distintas areas profesionales con mas de 20 años de experiencia en el area de imagenes digitales e impresion.</p>
                                <p>Movidos a evolucionar de la entrega de imagenes impresas o CD's, USB a un robusto e innovador sistema de entrega de fotografias en las nubes, donde nuestros visitantes disfrutaran de una verdadera experiencia al momento de recibir sus fotos.</p>
                                <p>Estamos comprometidos con nuestros asociados y visitantes a continuar innovando y fortaleciendo esta plataforma para que continue siendo la via mas moderna, practica y rapida al momento de entregar y recibir en el presente lo que seran recuerdos de momentos inolvidables.</p>
                                <p>Gracias por su confianza</p>
                                <p>El Equipo de PHOTOPASS</p>
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
                    <h4 class="modal-title">2S INTERNETWORK CORP. Bavaro, Punta Cana, La Altagracia.</h4>
                </div>
                <div class="modal-body"  >
                   <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d8707.769634719829!2d-68.44413086589161!3d18.693312465205445!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8ea8eb9681cb2fbd%3A0xd2f0b44f2d9fd047!2sB%C3%A1varo%2C+23000%2C+Rep%C3%BAblica+Dominicana!5e0!3m2!1ses!2sve!4v1486227929826" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe></p>
                    <p style="color: #000;">2S INTERNETWORK CORP. Bavaro, Punta Cana, La Altagracia
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
    <script src="js/acciones/login.js"></script>
    <script src="js/jquery.js"></script>
    <script src="js/jquery.js"></script>
    <script src="js/jquery-ui-1.10.4.min.js"></script>
    <script src="js/jquery-1.8.3.min.js"></script>
    <script src="js/jquery-ui-1.9.2.custom.min.js"></script>
    <script src="js/fileinput.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assets/jquery-knob/js/jquery.knob.js"></script>
    <script src="js/jquery.sparkline.js" type="text/javascript"></script>
    <script src="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
</html>
