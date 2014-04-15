<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" media="all" href="style.css">
  <link rel="stylesheet" type="text/css" media="all" href="css/multiselect.css">
  <link rel="stylesheet" type="text/css" media="all" href="css/spinner.css">
  <link rel="stylesheet" type="text/css" media="all" href="js/libs/miniTip/miniTip.css">
  <link rel="stylesheet" type="text/css" media="all" href="js/libs/pnotify/jquery.pnotify.css">
  <link rel="stylesheet" type="text/css" media="all" href="js/libs/mCustomScrollbar/jquery.mCustomScrollbar.css">
</head>

<body>

	<section id="container">
		<h2 > Crear usuario </h2>
		<form name="web" id="web-form" method="post" action="action.php">
		<div id="wrapping" class="clearfix">
			<section class="aligned">
				<h3> Datos b&aacute;sicos <span class="required">*</span>
					 <span class="tip" title="Nombre v&aacute;lido y un email de dominio iaw."></span>
				</h3>
				
				<input required type="text" name="name" id="name" placeholder="Nombre" autocomplete="off" class="txtinput">
			
				<input required type="email" name="email" id="email" placeholder="email@mail.com" autocomplete="off" class="txtinput">
			</section>
			<section class="aligned">
				<h3>Tipo de usuario <span class="required">*</span>
					 <span class="tip" title="Determine el perfil del usuario."></span>
				</h3>
				<span class="radiobadge">
					<input type="radio" id="admin" name="userType" value="admin" checked>
					<label for="low">Admin</label>
				</span>
			
				<span class="radiobadge">
					<input type="radio" id="med" name="userType" value="common" >
					<label for="med">Com&uacute;n</label>
				</span>
			</section>
			
			<section class="aligned clearfix" >
				<h3> Comercios a administrar 
					 <span class="tip" title="S&oacute;lo disponible para usuarios administradores. Comercios del Chubut."></span>
			    </h3>
				<div id="commerces-container">
					<div class="spinner">
				        <div class="bounce1"></div>
				        <div class="bounce2"></div>
				        <div class="bounce3"></div>
				    </div>
					<div class="disable-mask">
					</div>
				</div>
				<input type="hidden" id="commerces" name="commerces" value="" >
				
			</section>

			<section class="aligned">
				<h3> Adjuntos
					 <span class="tip" title="Si desea agregar un CV o info extra."></span>
				</h3>
				<div class="drag-input">
					<input type="file" name="attach">
					<p> Arrastrar archivo o hacer click </p>			
				</div>
			</section>
		</div>


		<section id="buttons">
			<input type="reset" name="reset" id="resetbtn" class="resetbtn" value="Reset">
			<input type="submit" name="submit" id="submitbtn" class="submitbtn" tabindex="7" value="Enviar">
			<br style="clear:both;">
		</section>
		</form>
	</section>
	<script type="text/javascript" src="js/libs/jquery/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="js/libs/miniTip/miniTip.min.js"></script>
	<script type="text/javascript" src="js/libs/pnotify/jquery.pnotify.min.js"></script>
	<script type="text/javascript" src="js/libs/mCustomScrollbar/jquery.mCustomScrollbar.min.js"></script>
	<script type="text/javascript" src="js/libs/mCustomScrollbar/jquery.mousewheel.min.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
</body>
</html>