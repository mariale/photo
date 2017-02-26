<?php 
error_reporting(0);
include("controllers/index_c.php"); ?>
<?php 
$typo=validar(); 
session_start();
$correo=$_SESSION['correo']; 
?>
<?php include("controllers/excursion.php"); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php head("PHOTOPASS | HOME"); ?> 
    </head>
    <body>
        <style>
            .custom-input-file {
                float:left;
                overflow:hidden;
                position:relative;
                cursor:pointer;
                width:100%;
                border:1px solid #ccc;
                border-radius:1px;
                margin-top: 10px;
                margin-bottom: 10px;
            }
            .custom-input-file:hover {
                background-color:#ccc;
            }
            .custom-input-file input[type=file] {
                margin-bottom: 10px;
                padding:0;
                outline:0;
                border:10000px solid transparent;
                opacity:0px;
                filter:alpha(opacity=0);
                position:absolute;
                cursor:pointer;
            }
            .files {
                font-size:14px;
            }
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
    <!--Menu -->
    <section id="container" class="">  
        <?php
	      	headerSuperior($correo);
	      	menu($typo, 0, 0); 
        ?>
      	<section id="main-content">
          	<section class="wrapper"> 
                <div  id="index">
                    
                </div>           
          	</section>
  		</section>
	</section>
  <?php //foot(); ?>
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
    <script src="js/owl.carousel.js" ></script>
    <script src="js/fullcalendar.min.js"></script> 
	  <script src="assets/fullcalendar/fullcalendar/fullcalendar.js"></script>
    <script src="js/calendar-custom.js"></script>
	  <script src="js/jquery.rateit.min.js"></script>
    <script src="js/jquery.customSelect.min.js" ></script>
	  <script src="assets/chart-master/Chart.js"></script>
    <script src="js/scripts.js"></script>
    <script src="js/sparkline-chart.js"></script>
    <script src="js/easy-pie-chart.js"></script>
  	<script src="js/jquery-jvectormap-1.2.2.min.js"></script>
  	<script src="js/jquery-jvectormap-world-mill-en.js"></script>
  	<script src="js/xcharts.min.js"></script>
  	<script src="js/jquery.autosize.min.js"></script>
  	<script src="js/jquery.placeholder.min.js"></script>
  	<script src="js/gdp-data.js"></script>	
  	<script src="js/morris.min.js"></script>
  	<script src="js/sparklines.js"></script>	
  	<script src="js/charts.js"></script>
  	<script src="js/jquery.slimscroll.min.js"></script>
  	<script src="js/acciones/index.js"></script>
    <script src="js/acciones/excursion.js"></script>
    <script src="js/acciones/profile.js"></script>
    <script src="js/acciones/user.js"></script>
    <script src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script src="js/jquery.gmap.js"></script>
    <script src="js/acciones/gallery.js"></script>
    <script src="js/acciones/lista.js"></script>
    <script src="js/acciones/code.js"></script>
    <script src="js/acciones/myphotopass.js"></script>
    <script src="js/acciones/inbox.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script src="js/acciones/paymet.js"></script>
   </body>
</html>
