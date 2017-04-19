<!DOCTYPE html>
<html>
<head>
  <!--Import Google Icon Font-->
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->

  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.1/css/materialize.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>

<body>

  <!--Import jQuery before materialize.js-->
  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.1/js/materialize.min.js"></script>
<div class="container">

<div class="row">


</div>
</div>


<div class="row">
    <div class="col l6 offset-l4">
      <ul style="width:100%" class="tabs">
        <li class="tab col s3"><a class="blue-text" href="#test1">Jefes de familia</a></li>
        <li class="tab col s3"><a class="blue-text" href="#test2">Carga familiar</a></li>
      </ul>
    </div>
    <div id="test1" class="col l6 offset-l4">
    <div class="row">
	<div class="col l6">
		<div class="card-panel z-depth-2">
		<h5 class="blue-text"><a class="fa fa-user" href=""></a> Jefe de familia</h5>
		<form action="certificados_jefes_basemision.php" method="GET">
		<div class="input-field col s12">
		    <input type="number" name="municipio" placeholder="municipio" required>
		</div>

		<div class="input-field col s12">
		    <input type="number" name="parroquia" placeholder="parroquia" required>
		</div>
		<div class="input-field col s12">
		    <input type="number" name="bodega_id" placeholder="bodega id" required>
		</div>
		<div class="input-field col s12">
		    <input type="number" name="basemisiones" placeholder="base de misiones" required>
		</div>
		  <div class="input-field col s12">
		    <select name="tipo">
		    	<option value="1">si certificados</option>
		    	<option value="0">no certificados</option>
		    </select>
		  </div>
		  <button  style="width: 100%;" class="btn blue waves-effect waves-light" type="submit">
		  	Descargar <i class="fa fa-download"></i>
		</form>
		</div>
	</div>
    </div>
    </div>
    <div id="test2" class="col l6 offset-l4">
    <div class="row">
	<div class="col l6">
		<div class="card-panel z-depth-2">
		<h5 class="blue-text"><a class="fa fa-users" href=""></a> Carga familiar</h5>
		<form action="certificados_familias_basemision.php" method="GET">
		<div class="input-field col s12">
		    <input type="number" name="municipio" placeholder="municipio" required>
		</div>

		<div class="input-field col s12">
		    <input type="number" name="parroquia" placeholder="parroquia" required>
		</div>
		<div class="input-field col s12">
		    <input type="number" name="bodega_id" placeholder="bodega id" required>
		</div>
		<div class="input-field col s12">
		    <input type="number" name="basemisiones" placeholder="base de misiones" required>
		</div>
		  <div class="input-field col s12">
		    <select name="tipo">
		    	<option value="1">si certificados</option>
		    	<option value="0">no certificados</option>
		    </select>
		  </div>
		  <button  style="width: 100%;" class="btn blue waves-effect waves-light" type="submit">
		  	Descargar <i class="fa fa-download"></i>
		</form>
		</div>
	</div>
    </div>

    </div>
  </div>

  <script>
  	  $(document).ready(function() {
    $('select').material_select();
  });

  	    $(document).ready(function(){
    $('ul.tabs').tabs();
  });
        
  </script>
</body>
</html>