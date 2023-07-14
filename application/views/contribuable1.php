<!DOCTYPE html>
<html>
<head>
	<title>Contribuable</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../../../maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="../../../ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="../../../cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="../../../maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="../../ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
	
</head>
<style type="text/css">
.esp1 {
  background-color: #999999;
  font-size: 110%;
  width: 100%;
  padding-bottom: 10px;

}


.esp1:hover,
.esp1:focus {
  background-color: #006622;
}
.nav-link{
    color:white;
}
.dec{
    color:white;
}
.dec:hover,
.dec:focus{
    color: #9E0406;
}
.nav-link:hover,
.nav-link:focus{
    color: #006622;
}
.btn{
	font-size:1.25vw;
}
 
.centre {
  margin: auto;
  width: 50%;
  padding: 10px;
}
 
</style>
<body style=" font-family: 'Times New Roman', 'Times', 'serif';background-color:#e6e6e6">
<form method="POST" action=<?php echo base_url().'Controlleur/essai';?>>
<div ng-app="">
  <input data-toggle="tooltip" data-placement="bottom" title="Opérations à l'exportation non taxable" onkeypress="return event.charCode>=48 && event.charCode<=57" type="number" ng-model="a">
  <input type="number" ng-model="b">
  <div ng-init="quantity=1;cost=5">
  <input value="{{ a + b }}" readonly>
 
  </div>
</div>
</form>
      
</body>
</html>