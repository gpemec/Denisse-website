<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Boda Den &amp; David </title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<link rel="stylesheet" type="text/css" href="style.css">
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet"> 
<script src="js/jquery.js" type="text/javascript"></script>


</head>

<body class="my-login-page">
<section class="h-100">
<div class="container h-100">
<div class="row justify-content-md-center h-100">
<div class="card-wrapper">
<div class="brand">
<img src="image/multimedia.svg" alt="logo">
</div>
<div class="card fat">
<div class="card-body">

<form class="form-horizontal" name="form" action="login.php?q=index.php" method="POST">
<h4 class="card-title">Confirmar asistencia</h4>

<div class="form-group">
    <label for="email">Nombre</label>
    <input id="email" type="text" class="form-control input'md" name="email" value="" required autofocus>
</div>

<div class="form-group">
    <label for="password">Código en invitación
        <a href="forgot.html" class="float-right">
            ¿Cómo lo encuentro?
        </a>
    </label>
    <input id="password" type="password" class="form-control input-md" name="password" required data-eye>
    <div class="invalid-feedback">
        El código es necesario
    </div>
</div>

<div class="form-group">
    <div class="custom-checkbox custom-control">
        <input type="checkbox" name="remember" id="remember" class="custom-control-input">
        <label for="remember" class="custom-control-label">Recordarme</label>
    </div>
</div>

<div class="form-group m-0">
    <button type="submit" class="btn btn-primary btn-block">
        Ingresar
    </button>
</div>
</form>
</div>
</div>
<div class="footer">
Copyright &copy; 2020 &mdash; Den&amp;David 
</div>
</div>
</div>
</div>
	</section>
   


<div class="col-md-4 panel">


<?php if(@$_GET['q7'])
{ echo'<p style="color:red;font-size:15px;">'.@$_GET['q7'];} ?>


<!--Footer starts-->
<div class=" footer">
</div>


</body>
</html>
