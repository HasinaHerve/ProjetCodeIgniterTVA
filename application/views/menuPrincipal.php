<!DOCTYPE html>
<html>
<head>
	<title>Menu principal</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../../../maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="../../../ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="../../../cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="../../../maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
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
h5{
	color: #999999;	
}
h5:hover,
h5:focus{
    color: white;
}

</style>
<script> 
$(document).ready(function(){
  $("body").on({
    mouseenter: function(){
		var div = $("h3");  
		div.animate({left: '100px'}, "slow");
		div.animate({fontSize: '3em'}, "slow");
    } 
  });
});
</script>
<body style=" font-family: 'Times New Roman', 'Times', 'serif';background-color:white;">
	<nav class="navbar navbar-expand-sm fixed-top" style="background-color:#006622;">
    <!-- Brand/logo -->
		<a href=""><img class="img-fluid" src="../../../image/dgi.jpg" style="width: 80px;position: absolute;left: 0px;top:0px;height: 100%;"></a>

		
		<!-- Links -->
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar" onmouseover="document.getElementById('menu').src='../../../image/menu.png'" onclick="document.getElementById('menu').src='../../../image/menu.png'" onmouseout="document.getElementById('menu').src='../../../image/menu1.png'">
			<img src="../../../image/menu1.png" id="menu" alt="">
		</button>
		<div class="collapse navbar-collapse" id="collapsibleNavbar">
			<ul class="navbar-nav" style="padding-left:70px;;font-size:1.5vw">
				<li class="nav-item">
					<a class="nav-link" data-toggle="tooltip" data-placement="bottom" title="Page d'accueil" href="#"><h5 style="color:white">Accueil</h5></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="tooltip" data-placement="bottom" title="Espace reservée aux personnels qui travaillent à la direction des impôts"  href=<?php echo base_url().'Controlleur/menuPrincipal1'?>><h5>Espace administrateur</h5></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="tooltip" data-placement="bottom" title="Espace reservée aux contribuables ayant un numéro d'identification fiscal(NIF)"  href=<?php echo base_url().'Controlleur/menuPrincipal2'?>><h5>Espace contribuable</h5></a>
				</li>
				
			</ul>
			
		</div>
    
    
    </nav>
	<div class="container-fluid" style="padding-top: 85px;padding-left:1%;padding-right:1%;height: 600px;">
		
		<div class="image" style="background-color:white">
			<div class="row">
				<div class="col-6">
					<img src="../../../image/c.png" style="width:100%;height:50%">
				</div>
				<div class="col-6">
					<img src="../../../image/b.png" style="width:100%;height:50%">
				</div>
			</div>
			
		</div>
		<div class="image" style="background-color:white">
			<div class="row">
				<div class="col-6">
					<img src="../../../image/b.png" style="width:104.5%;height:50%">
				</div>
				<div class="col-6">
					<img src="../../../image/a.png" style="width:100%;height:50%">
				</div>
			</div>
			
		</div>
		<div class="image" style="background-color:white">
			<div class="row">
				<div class="col-6">
					<img src="../../../image/a.png" style="width:100%;height:50%">
				</div>
				<div class="col-6">
					<img src="../../../image/dd.png" style="width:100%;height:50%">
				</div>
			</div>	
				
		</div>
		<div class="image" style="background-color:white">
			<div class="row">
				<div class="col-6">
					<img src="../../../image/dd.png" style="width:104.5%;height:50%">
				</div>
				<div class="col-6">
					<img src="../../../image/e.png" style="width:100%;height:50%">
				</div>
			</div>
			
		</div>
		<div class="image" style="background-color:white">
			<div class="row">
				<div class="col-6">
					<img src="../../../image/e.png" style="width:100%;height:50%">
				</div>
				<div class="col-6">
					<img src="../../../image/c.png" style="width:100%;height:50%">
				</div>
			</div>
			
		</div>
		<div class="row">
			<div class="col-12">
				<h3 style="color:#999999;">Direction Générale des Impôts</h3> <br>
			</div>
		</div>
		
	</div>
	<div class="jumbotron jumbotron-fluid text-center" style="margin-bottom:0;background-color:#e6e6e6;color:#999999;">
		<p>Social: <span class="col-6"><a href=""><img src="../../../image/fb1.png" alt=""></a></span><span class="col-6"><a href=""><img src="../../../image/gmail1.png" alt=""></a></span></p> 
		<br><p>copyright DGI | 2022 All Right Reserved</p>
	</div>
</body>
</html>
<script>
	var myIndex = 0;
	carousel();

	function carousel() {
	var i;
	var x = document.getElementsByClassName("image");
	for (i = 0; i < x.length; i++) {
		x[i].style.display = "none";  
	}
	myIndex++;
	if (myIndex > x.length) {myIndex = 1}    
	x[myIndex-1].style.display = "block";  
	setTimeout(carousel, 4000);    
	}

	$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
    });
	$(document).ready(function(){
	$("body").mouseenter(function(){
		var b = $(".bienvenue");  
		b.animate({left: '100px'}, "slow");
		b.animate({fontSize: '3em'}, "slow");
	});
	});

	history.pushState(null,null,location.href);
	window.onpopstate=function(){
	history.go(1);}
</script>