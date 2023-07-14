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
.form-control{
    font-size:14px;
}
.btn{
    font-size:14px;
}
</style>
<body style=" font-family: 'Times New Roman', 'Times', 'serif';background-color:white;font-size:14px">
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
					<a class="nav-link" data-toggle="tooltip" data-placement="bottom" title="Page d'accueil" href=<?php echo base_url().'Controlleur/index'?>><h5>Accueil</h5></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="tooltip" data-placement="bottom" title="Espace reservée aux personnels qui travaillent à la direction des impôts"  href="#"><h5 style="color:white">Espace administrateur</h5></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="tooltip" data-placement="bottom" title="Espace reservée aux contribuables ayant un numéro d'identification fiscal(NIF)"  href=<?php echo base_url().'Controlleur/menuPrincipal2'?>><h5>Espace contribuable</h5></a>
				</li>
				
			</ul>
			
		</div>
    
    
    </nav>
	<div class="container-fluid" style="padding-top: 85px;">
	  	<div class="row" >	
		    <div class="col-md-2" style="padding-top: 20px;position:fixed;z-index:1;">
				
		    </div>
	
		    <div class="col-md-10" id="ea" style="height: 700px;padding-left: 31.25%;padding-right: 5.25%;padding-top: 20px">
		    	<div class="shadow p-4 mb-4 bg-white" style="border-radius: 5px;width: 80%;text-align: center;padding-right:20px;">
					<h4 style="color:#006622"><img class="img-fluid" src="../../../image/aut.png">Authentification</h4></br>
						<?php 
							$alert=$this->session->flashdata('errim');
								if($alert!=""){
								?>
									<div class="alert alert-warning alert-dismissible fade show" style="margin-left:17px">
										<button type="button" class="close" data-dismiss="alert">&times;</button>
										<?php echo $alert?>
									</div>
								<?php
								}
								?>
						<form method="POST"  action=<?php echo base_url().'Controlleur/connexionP';?>>
						<div class="form-group">
							<div class="row">
								<label class="control-label col-md-4" for="nomU">Immatricule:</label>
								<div class="col-md-8" style="column-width: 400px;">
									<input onkeypress="return event.charCode>=48 && event.charCode<=57" maxlength="6" type="text" class="form-control" placeholder="Immatricule" name="conim" value="<?php echo $this->session->flashdata('conim');?>">	
									<span class="container text-left">
										<label class="control-label text-danger"><?php echo form_error('conim'); ?></label> 
									</span>		    
								</div>
							</div></br>
							<div class="row">
								<label class="control-label col-md-4" for="pwd" style="">Mot de passe:</label>
								<div class="col-md-8" style="column-width: 400px;">          
									<input type="password" class="form-control" maxlength="12" id="pwdl" placeholder="Entrez votre mot de passe" name="conmdp" <?php echo $this->session->flashdata('focus');?> value="<?php echo $this->session->flashdata('conmdp');?>"> 
									<span class="container text-left">
										<label class="control-label text-danger"><?php echo form_error('conmdp'); ?></label> 
									</span>
									<span class="container text-center">
										<label class="control-label text-danger"><?php echo $this->session->flashdata('errmdpp');?></label> 
									</span>

								</div>

							</div></br>  
							<div class="row">
								<div class="col-md-4"></div>
								<div class="col-md-8" style="text-align:left">          
									<button type="submit" onmousedown="document.getElementById('spin').style.display='block';document.getElementById('conn').style.display='none'" class="btn btn-success" id="connecter" name="connecter" value="connecter">
										<div id="spin" style="color:white;display:none">
											<span class="spinner-border spinner-border-sm"></span>
											Se connecter
										</div>
										<div id="conn" style="color:white;">
											Se connecter
										</div>
									</button>       	
								</div>

							</div> 
							</form>
						</div>
						<div class="row">
							<div class="col-md-3">
								
							</div>
							<div class="col-md-9" style="font-size: 14px;text-align:right">
								<label class="control-label" for="creer" style="">Avez-vous un compte? si non,</label>
								<button class="btn btn-secondary esp1" name="creer" value="creer" style="border-color: #999999;width:52%;" data-toggle="modal" data-target="#Modal1">Créer un compte <img src="../../../image/add20.png"></button>
							</div>
						
						</div>
				</div>
		    </div>		    
	    </div>
	</div>  		
</div>
<form class="form-horizontal" name="form" method="POST" action=<?php echo base_url().'Controlleur/ajoutCompteP';?>>
<div class="modal fade" id="Modal1">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title" style="color: #006622"><img class="img-fluid" src="../../../image/addUser.png" >Création(compte administrateur)</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body" style="">
		<?php 
			$alert=$this->session->flashdata('alertAjoutCP');
				if($alert!=""){
				?>
					<div class="alert alert-success alert-dismissible fade show" >
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<?php echo $alert?>
					</div>
				<?php
				}
				?>
		<?php 
			$alert=$this->session->flashdata('alertErreurCP');
				if($alert!=""){
				?>
					<div class="alert alert-warning alert-dismissible fade show" >
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<?php echo $alert?>
					</div>
				<?php
				}
				?>		
	        <div class="container text-center" style="border: 1px solid #006622;border-radius: 5px;"><br>
			  	<div class="form-group">
					<div class="row">
						<label class="control-label col-4" for="nomU" style="">Immatricule:</label>
						<div class="col-8" style="column-width: 400px;">
							<input onkeypress="return event.charCode>=48 && event.charCode<=57" maxlength="6" type="text" class="form-control" placeholder="Numéro immatricule" name="im" value="<?php echo $this->session->flashdata('im');?>">	
                            <span class="container text-left">
					    		<label class="control-label text-danger"><?php echo form_error('im'); ?></label> 
					    	</span>				    
						</div>
					</div></br>
					<div class="row">
						<label class="control-label col-4" for="pwd" style="">Mot de passe:</label>
						<div class="col-8" style="column-width: 400px;">          
						    <input type="password" maxlength="12" class="form-control" id="mdp" placeholder="Entrez votre mot de passe" name="mdpp" value="<?php echo $this->session->flashdata('mdpp');?>"></br>
                            <span class="container text-left">
					    		<label class="control-label text-danger"><?php echo form_error('mdpp'); ?></label> 
					    	</span>	
						  	<input type="password" onclick="verifMdp()" maxlength="12" class="form-control" id="pwdl" placeholder="Confirmation du mot de passe" name="cmdpp" value="<?php echo $this->session->flashdata('cmdpp');?>">	
                            <span class="container text-left">
					    		<label class="control-label text-danger"><?php echo form_error('cmdpp'); ?></label> 
					    	</span>		        	
						</div>

					</div>     
				</div>
			</div>	    
		</div>		 
	  	</br></br> 	   
        
        <!-- Modal footer -->
        <div class="modal-footer">
          	<div class="btn-group">
		    	<div class="col-6">
		    		<button type="reset" class="btn btn-danger" id="connecter" name="annuler" value="annuler">Annuler <img class="img-fluid" src="../../../image/cancel.png"></button>
		    	</div>
		        <div class="col-7">
		        	<button type="submit" class="btn btn-success" name="enregistrer" value="enregistrer">Enregistrer<img class="img-fluid" src="../../../image/save.png"></button>
		        </div></form>		        
		    </div>
        </div>
        
      </div>
    </div>
</div>
<div class="jumbotron jumbotron-fluid text-center" style="margin-bottom:0;background-color:#e6e6e6;color:#999999;">
	<p>Social: <span class="col-6"><a href=""><img src="../../../image/fb1.png" alt=""></a></span><span class="col-6"><a href=""><img src="../../../image/gmail1.png" alt=""></a></span></p> 
	<br><p>copyright DGI | 2022 All Right Reserved</p>
</div>

<?php 
    if($this->session->flashdata('affCP')==="afficher"){
        echo "<script>
            $('#Modal1').modal('show');
            </script>";
    }
	
?>
<script>
	$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
    });
	function verifMdp(){
		if(document.forms['form']['mdp'].value.length<5){
			alert("Le mot de passe est trop court(doit contenir au moins 5 caractères)");
			document.getElementById('mdp').focus();
		}
	}
	function prog(){
		document.getElementById('mdp').focus();
	}
</script>
</body>
</html>