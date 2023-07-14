<!DOCTYPE html>
<html>
<head>
	<title>Acceuil</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../../../maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../Datatables/dt/css/dataTables.bootstrap4.min.css">
	<script src="../../../ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="../../../cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="../../../maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="../../../Datatables/dt/js/jquery.dataTables.min.js"></script>
    <script src="../../../Datatables/dt/js/dataTables.bootstrap4.min.js"></script>
	
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

.dec:hover,
.dec:focus{
    width:20%;
}
h5,
.modif{
	color: #999999;	
}
h5:hover,
h5:focus{
    color: white;
}
.nav-link{
	color: white;	
}
.nav-link:hover,
.nav-link:focus,
.modif:hover,
.modif:focus{
    color: #006622;
}
.form-control{
    font-size:14px;
}
.btn{
    font-size:14px;
}

.user{
    position:fixed;right:5px;top:1px;
}
.user1{
    position:fixed;left:5px;top:1px;
}
@media screen and (max-width: 600px) {
  .user{
    position:fixed;right:70px;top:1px;
  }
 
} 
/* The grid: Three equal columns that floats next to each other */
.column {
  width: 50%;
  height:50px;
  padding: 10px;
  text-align:center;
  font-size: 18px;
  cursor: pointer;
  color: #006622;
  background-color:#e6e6e6;
}

.column:hover,
.column:focus,{
    background-color: white;
}
.containerTab {
  padding: 20px;
  color: white;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Closable button inside the container tab */
.closebtn {
  float: right;
  color: white;
  font-size: 35px;
  cursor: pointer;
}
.notification {
  color: white;
  text-decoration: none;
  position: relative;
  display: inline-block;
  border-radius: 2px;
}

.notification .badge {
  position: absolute;
  top: -2px;
  right: -4px;
  padding: 5px 10px;
  border-radius: 50%;
  background-color: #e60000;
  color: white;
}
</style>
<script>
function myFunction() {
  var x = document.getElementById("user");
  if (x.className === "dropdown dropbottom user") {
    x.className = "dropdown dropbottom user1";
  } else {
    x.className = "dropdown dropbottom topnav";
  }
}
function openTab(tabName) {
  var i, x;
  x = document.getElementsByClassName("containerTab");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  document.getElementById(tabName).style.display = "block";
}
</script>
<body style=" font-family: 'Times New Roman', 'Times', 'serif';font-size:14px">
    <nav class="navbar navbar-expand-sm fixed-top" style="background-color:#006622;">
    <!-- Brand/logo -->
		<a href=""><img class="img-fluid" src="../../../image/dgi.jpg" style="width: 80px;position: absolute;left: 0px;top:0px;height: 100%;"></a>

		
		<!-- Links -->
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar" onmouseover="document.getElementById('menu').src='../../../image/menu.png'" onclick="document.getElementById('menu').src='../../../image/menu.png'" onmouseout="document.getElementById('menu').src='../../../image/menu1.png'">
			<img src="../../../image/menu1.png" id="menu" alt="">
		</button>
        <div class="dropdown dropbottom user" id="user" onmouseover="c()" onclick="c()" onmouseout="document.getElementById('us').src='../../../image/utB.png'">
            <a class="nav-link" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" style="color:#999999" href="#"><h5><img src="../../../image/utB.png" id="us" alt="">Utilisateur</h5></a>
            <div class="dropdown-menu shadow p-4 mb-4 bg-white" style="text-align:center">
                <p>IM: <?php echo $this->session->userdata('ut');?></p>
                <a class="nav-link" data-toggle="modal" data-target="#Modal1" href="#"><p class="modif" style="font-size:14px;">Modification</p></a>
                <a data-toggle="tooltip" data-placement="bottom" title="Se déconnecter" href=<?php echo base_url().'Controlleur/index'?>><img class="dec" src="../../../image/dec1.png" alt=""></a>
            </div>
        </div>
		<div class="collapse navbar-collapse" id="collapsibleNavbar">
			<ul class="navbar-nav" style="padding-left:70px;;font-size:1.5vw">
				<li class="nav-item">
                    <a class="nav-link" data-toggle="tooltip" data-placement="bottom" title="Voir toutes les listes des déclarations et des contribuables" href="#" ><h5 style="color:white"><img src="../../../image/liste1.png" id="liste" alt="">Toutes les listes</h5></a>
				</li>
				<li class="nav-item">
                    <a class="nav-link" data-toggle="tooltip" data-placement="bottom" title="Afficher le formulaire d'ajout de contribuable"  href=<?php echo base_url().'Controlleur/contribuableP'?>><h5>Contribuable</h5></a>
				</li>
                <li>
                    <a class="nav-link" data-toggle="tooltip" data-placement="bottom" title="Valider une déclaration de TVA" href=<?php echo base_url().'Controlleur/validationP'?>><h5>Validation</h5></a>
                </li>
                <li class="notification">
                    <a onmouseover="document.getElementById('notif').src='../../../image/notif1.png'" onmouseover="document.getElementById('notif').src='../../../image/notif1.png'" onmouseout="document.getElementById('notif').src='../../../image/notif0.png'" class="nav-link" data-toggle="tooltip" data-placement="bottom" title="Voir les demandes de validation" href=<?php echo base_url().'Controlleur/historiqueP'?>><h5><img src="../../../image/notif0.png" id="notif" alt=""><span class="badge">
                    <?php 
                        if (!empty($count)) {
                            echo $count['hist'];
                        }
                                
                    ?>

                    </span></h5></a>
                    
                </li>
                
				
			</ul>
			
		</div>
    
    
    </nav> 
    <div class="container-fluid" style="padding-top:80px;">
        <div class="shadow p-4 mb-4 bg-white" style="background-color:white;border-radius:5px;padding-top:10px;padding-left:5px;padding-right:5px;padding-bottom:5px;color:#006622">
            <?php 
                $alert=$this->session->flashdata('alertModifDec');
                    if($alert!=""){
                    ?>
                        <div class="alert alert-success alert-dismissible fade show" style="margin-right:45px">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <?php echo $alert?>
                        </div>
                    <?php
                    }
                    ?>
            <?php 
                $alert=$this->session->flashdata('alertSupp');
                    if($alert!=""){
                    ?>
                        <div class="alert alert-danger alert-dismissible fade show" style="margin-right:45px">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <?php echo $alert?>
                        </div>
                    <?php
                    }
                    ?>
                    <?php 
            $alert=$this->session->flashdata('alertModifC');
                if($alert!=""){
                ?>
                    <div class="alert alert-success alert-dismissible fade show" style="margin-right:45px">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <?php echo $alert?>
                    </div>
                <?php
                }
                ?>
            <?php 
                $alert=$this->session->flashdata('alertSuppC');
                    if($alert!=""){
                    ?>
                        <div class="alert alert-danger alert-dismissible fade show" style="margin-right:45px">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <?php echo $alert?>
                        </div>
                    <?php
                    }
                    ?>
            <div class="row">
                <div id="c1" class="column" onclick="openTab('b1');document.getElementById('c1').style.background='white';document.getElementById('c2').style.background='#e6e6e6';" style="border:solid 1.5px #e6e6e6;border-bottom:none;border-left:none;background-color:white">
                    Listes des déclarations
                </div>
                <div id="c2" class="column" onclick="openTab('b2');document.getElementById('c2').style.background='white';document.getElementById('c1').style.background='#e6e6e6';" style="border:solid 1.5px #e6e6e6;border-bottom:none;border-right:none;border-left:solid 1.5px white;">
                    Listes des contribuables
                </div>
            </div>
            <div id="b1" class="containerTab">
                <div class="table-responsive">
                    <table class="table table-hover" id="listeDec" style="font-size:14px;">
                        <thead>
                        <tr>
                            <th>NumDec</th>
                            <th>Nif</th>
                            <th>Annee</th>
                            <th>Mois</th>
                            <th>Activité</th>
                            <th>DateDec</th>
                            <th>Validation</th>
                            <th>Modifier</th>
                            <th>Supprimer</th>
                            <th>Imprimer</th>
                        </tr>
                        </thead>
                        <tbody style="color:#737373">
                            <?php 
                            if (!empty($dec)) {
                                    foreach ($dec as $dec) {?>
                                        <tr>
                                            <td><?php echo $dec['numDec']?></td>
                                            <td><?php echo $this->Model->nifDec($dec['numDec'])['nif']?></td>
                                            <td><?php echo $dec['annee']?></td>
                                            <td><?php echo $dec['mois']?></td>
                                            <td><?php echo $dec['numAct']?></td>
                                            <td><?php echo $dec['dateDec']?></td>
                                            <td><?php if($dec['validation']=="oui"){
                                                            $this->session->set_flashdata('disable',"disabled");
                                                            echo "<img src='../../../image/oui.png' alt=''>";
                                            }
                                            else{
                                                $this->session->set_flashdata('disable',"");
                                                echo "<img src='../../../image/no.png' alt=''>";
                                            }
                                            
                                            ?>
                                        
                                            </td>
                                            <form method="POST" action=<?php echo base_url().'Controlleur/modifDecAdmin'?> >
                                                <td><button type="submit" class="btn btn-info" value="modifier" style="font-size:14px" name=<?php echo "m".$dec['numDec']?>>Modifer</button></td>
                                                <td><button value="<?php echo $dec['numDec']?>" name="supprimer" class="btn btn-danger" value="supprimer" style="font-size:14px">Supprimer</button></td>
                                                <td><a href=<?php echo base_url().'Controlleur/imprimer/'.$dec['numDec']?> type="submit" target="_blank" class="btn btn-secondary" value="supprimer" style="font-size:14px" name=<?php echo "i".$dec['numDec']?>>Imprimer <img class="img-fluid" src="../../../image/imprimer.png"></a></td>
                                            </form>
                                            
                                            
                                            
                                        </tr>
                                    <?php
                                    }
                                }?>
                            </tbody>
                    </table>
                </div>
            </div>
            <div id="b2" class="containerTab" style="display:none;">
                <div class="table-responsive">
                    <table class="table table-hover" id="listeC" style="font-size:14px;">
                        <thead>
                        <tr>
                            <th>Nif</th>
                            <th>type</th>
                            <th>Cin</th>
                            <th>Nom</th>
                            <th>Prénoms</th>
                            <th>DateNaiss</th>
                            <th>Sexe</th>
                            <th>Sm</th>
                            <th>Commune</th>
                            <th>Adresse</th>
                            <th>NumTel</th>
                            <th>Modification</th>
                            <th>Suppréssion</th>
                            <th>Centre</th>
                        </tr>
                        </thead>
                        <tbody style="color:#737373">
                            <?php 
                            if (!empty($contribuable)) {
                                    foreach ($contribuable as $contribuable) {?>
                                        <tr>
                                            <td><?php echo $contribuable['nif']?></td>
                                            <td><?php echo $contribuable['typeC']?></td>
                                            <td><?php echo $contribuable['cinC']?></td>
                                            <td><?php echo $contribuable['nomC']?></td>
                                            <td><?php echo $contribuable['prenomsC']?></td>
                                            <td><?php echo $contribuable['dateNaissC']?></td>
                                            <td><?php echo $contribuable['sexeC']?></td>
                                            <td><?php echo $contribuable['sm']?></td>
                                            <td><?php echo $contribuable['communeC']?></td>
                                            <td><?php echo $contribuable['adresseC']?></td>
                                            <td><?php echo $contribuable['telC']?></td>
                                            <form method="POST" action=<?php echo base_url().'Controlleur/modifC'?> >
                                                <td><button type="submit" class="btn btn-info" value="modifier" style="font-size:14px" name=<?php echo "m".$contribuable['nif']?>>Modifer</button></td>
                                                <td><button type="submit" class="btn btn-danger" value="supprimer" style="font-size:14px" name=<?php echo "s".$contribuable['nif']?>>Supprimer</button></td>
                                            </form>
                                            <td><?php echo $this->Model->centreN1($contribuable['idCentre'])['nomCentre']?></td>
                                            
                                            
                                        </tr>
                                    <?php
                                    }
                                }?>
                            </tbody>
                    </table>
                </div>
            </div>
            
            
        </div>
    
    </div><br><br><br><br><br><br><br><br>
	<div class="jumbotron jumbotron-fluid text-center" style="margin-bottom:0;background-color:#e6e6e6;color:#999999;">
		<p>Social: <span class="col-6"><a href=""><img src="../../../image/fb1.png" alt=""></a></span><span class="col-6"><a href=""><img src="../../../image/gmail1.png" alt=""></a></span></p> 
		<br><p>copyright DGI | 2022 All Right Reserved</p>
	</div>
    <div class="modal fade" id="Modal1">
        <div class="modal-dialog">
            <form class="form-horizontal" name="form" method="POST" action=<?php echo base_url().'Controlleur/modifCompteP';?>>
                <div class="modal-content">
                
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title" style="color: #006622"><img class="img-fluid" src="../../../image/modP.png" >Modification du mot de passe</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    
                    <!-- Modal body -->
                    <div class="modal-body" style="">
                    <?php 
                    $alert=$this->session->flashdata('alertModifmdpp');
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
                    $alert=$this->session->flashdata('alertErrmdpp');
                        if($alert!=""){
                        ?>
                            <div class="alert alert-warning alert-dismissible fade show" >
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <?php echo $alert?>
                            </div>
                        <?php
                        }
                        ?>
                        <div class="container text-center" style="border: 1px solid #006622;border-radius: 5px;"></br>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="control-label col-4" style="">Ancien mot de passe:</label>
                                        <div class="col-8" style="column-width: 400px;">
                                            <input type="password" maxlength="12" class="form-control" placeholder="Entrez votre ancien mot de passe" name="amdp" value="<?php echo $this->session->flashdata('amdp');?>">
                                            <span class="container text-left">
                                                <label class="control-label text-danger"><?php echo form_error('amdp'); ?></label> 
                                            </span>					    
                                        </div>
                                    </div></br>
                                    <div class="row">
                                        <label class="control-label col-4" for="pwd" onclick="verif()" style="">Nouveau mot de passe:</label>
                                        <div class="col-8" style="column-width: 400px;">          
                                            <input maxlength="12" type="password" class="form-control" id="nmdp" placeholder="Entrez votre nouveau mot de passe" name="nmdp" value="<?php echo $this->session->flashdata('nmdp');?>">
                                            <span class="container text-left">
                                                <label class="control-label text-danger"><?php echo form_error('nmdp'); ?></label> 
                                            </span>	 
                                        </div>
                                    </div>                                 
                                </div>     
                        </div>
                    </div>
                    
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <div class="btn-group">
                            <div class="col-6">
                                <button type="reset" class="btn btn-danger" id="connecter" name="annuler" value="annuler">Annuler <img class="img-fluid" src="../../../image/cancel.png"></button>
                            </div>
                            <div class="col-7">
                                <button type="submit" onmouseover="verifMdp()" class="btn btn-success" name="enregistrer" value="enregistrer">Enregistrer<img class="img-fluid" src="../../../image/save.png"></button>
                            </div>	        
                        </div>
                    </div>
                </div>
            </form>		    
        </div>
    </div>
    
    <div class="modal fade" id="ModalS">
        <div class="modal-dialog">
            <div class="modal-content">
            
                <!-- Modal Header -->
                <div class="modal-header">
                <h5 class="modal-title text-danger">Suppréssion</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                
                <!-- Modal body -->
                <div class="modal-body" style="font-size: 14px;color:#737373">
                    <label class="control-label">êtes-vous sûr de vouloir supprimer <?php echo $this->session->flashdata('persSuppr')?>?</label>
                </div>
                
                <!-- Modal footer -->
                <div class="modal-footer">
                    <div class="btn-group">
                        <div class="col-6">
                            <button type="submit" class="btn btn-secondary" data-dismiss="modal">Non</button>
                        </div>
                        <form method="POST" action=<?php echo base_url().'Controlleur/supprimerPers'?>>
                        <div class="col-7">
                            <button type="submit" class="btn btn-danger" name="supprimerP">Oui</button>
                        </div></form>		        
                    </div>
                </div>
                
            </div>
        </div>
    </div> 
    <div class="modal fade" id="ModalSC">
        <div class="modal-dialog">
            <div class="modal-content">
            
                <!-- Modal Header -->
                <div class="modal-header">
                <h5 class="modal-title text-danger">Suppréssion</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                
                <!-- Modal body -->
                <div class="modal-body" style="font-size: 14px;color:#737373">
                    <label class="control-label">êtes-vous sûr de vouloir supprimer <?php echo $this->session->flashdata('cSuppr')?>?</label>
                </div>
                
                <!-- Modal footer -->
                <div class="modal-footer">
                    <div class="btn-group">
                        <div class="col-6">
                            <button type="submit" class="btn btn-secondary" data-dismiss="modal">Non</button>
                        </div>
                        <form method="POST" action=<?php echo base_url().'Controlleur/supprimerC'?>>
                        <div class="col-7">
                            <button type="submit" class="btn btn-danger" name="supprimerC">Oui</button>
                        </div></form>		        
                    </div>
                </div>
                
            </div>
        </div>
    </div> 	
    <div class="modal fade" id="ModalS1">
        <div class="modal-dialog">
            <div class="modal-content">
            
                <!-- Modal Header -->
                <div class="modal-header">
                <h5 class="modal-title text-danger">Suppréssion</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                
                <!-- Modal body -->
                <div class="modal-body" style="font-size: 14px;color:#737373">
                    <label class="control-label">êtes-vous sûr de vouloir supprimer la déclaration numéro <?php echo $this->session->userdata('numDec1');?>?</label>
                </div>
                
                <!-- Modal footer -->
                <div class="modal-footer">
                    <div class="btn-group">
                        <div class="col-6">
                            <button type="submit" class="btn btn-secondary" data-dismiss="modal">Non</button>
                        </div>
                        <form method="POST" action=<?php echo base_url().'Controlleur/modifDecAdmin'?>>
                        <div class="col-7">
                            <button type="submit" class="btn btn-danger" name="supprimerDec" value="oui">Oui</button>
                        </div></form>		        
                    </div>
                </div>
                
            </div>
        </div>
    </div> 
    <div class="modal fade" id="connexRéussie">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body" style="font-size: 14px;color:#737373">
                    <label class="control-label text-success">Connexion réussie</label>
                </div>
                
                <!-- Modal footer -->
                <div class="modal-footer">
                    <div class="btn-group">
                        <div class="col-6">
                            <button type="submit" class="btn btn-secondary" data-dismiss="modal">OK</button>
                        </div>	        
                    </div>
                </div>
                
            </div>
        </div>
    </div> 
<?php 
	$b=$this->session->flashdata('affS');
	if($b==="afficher"){
	    echo "<script>
            $('#ModalS').modal('show');
            </script>";
	}
    if($this->session->flashdata('affSC')==="afficher"){
        echo "<script>
            $('#ModalSC').modal('show');
            </script>";
    }
    if($this->session->flashdata('affMP')==="afficher"){
        echo "<script>
            $('#Modal1').modal('show');
            </script>";
    }
    if($this->session->flashdata('connexion')==="afficher"){
        echo "<script>
            $('#connexRéussie').modal('show');
            </script>";
    }
	if($this->session->flashdata('affS1')==="oui"){
        echo "<script>
            $('#ModalS1').modal('show');
            </script>";
    }
?>	
<script>
    function myFunction() {
        var x = document.getElementById("myTopnav");
        if (x.className === "topnav") {
            x.className += " responsive";
        } else {
            x.className = "topnav";
        }
    }
    $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
    });
    function c(){
        document.getElementById("us").src='../../../image/utA.png'
    }
    $('#listePers').DataTable({

    });
    $('#listeC').DataTable({

});
$('#listeDec ').DataTable({

});
    function verifMdp(){
		if(!document.forms['form']['amdp'].value=="" && document.forms['form']['nmdp'].value.length<5){
			alert("Le mot de passe est trop court(doit contenir au moins 5 caractères)");
			document.getElementById('nmdp').focus();
		}
	}
</script>
</body>
</html>