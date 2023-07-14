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
.centre {
  margin: auto;
  width: 50%;
  padding: 10px;
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
                    <a onmouseover="document.getElementById('liste').src='../../../image/liste1.png'" onclick="document.getElementById('liste').src='../../../image/liste1.png'" onmouseout="document.getElementById('liste').src='../../../image/liste0.png'" class="nav-link" data-toggle="tooltip" data-placement="bottom" title="Voir toutes les listes des déclarations et des contribuables" href=<?php echo base_url().'Controlleur/acceuilPers'?>><h5><img src="../../../image/liste0.png" id="liste" alt="">Toutes les listes</h5></a>
				</li>
				<li class="nav-item">
                    <a class="nav-link" data-toggle="tooltip" data-placement="bottom" title="Afficher le formulaire d'ajout de contribuable"  href="#"><h5 style="color:white">Contribuable</h5></a>
				</li>
                <li class="nav-item">
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
        <div class="centre shadow p-4 mb-4 bg-white" id="etape1" style="background-color:white;border-radius:5px;padding-left:50px;padding-right:0px;padding-bottom:5px;">
            <?php 
                $alert=$this->session->flashdata('alertErreurC');
                    if($alert!=""){
                    ?>
                        <div class="alert alert-warning alert-dismissible fade show" style="margin-right:45px">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <?php echo $alert?>
                        </div>
                    <?php
                    }
                    ?>
            <h5 style="border-bottom:2px solid #006622;width:48.5%;font-size:18px;color:#006622;">Etape 1: Informations sur le contribuable</h5></br>
            <form class="form-horizontal" method="POST" name="form1" action=<?php echo base_url().'Controlleur/ajoutC';?>>
			  	<div class="form-group">
                    <div class="row">
                        <div class="col-6">
                            <input type="checkbox" id="pp" onclick="document.getElementById('pm').checked=false;document.getElementById('inpp').value='personne physique';document.getElementById('inpm').value=''" <?php echo $this->session->flashdata('pp');?>>
                            <input type="text" id="inpp" name="pp" style="display:none">
                            <label for="defaultCheck" >personne physique</label>
                        </div>
                        <div class="col-6" style="text-align:left">
                            <input type="checkbox" id="pm" name="npm" value="pm" onclick="document.getElementById('pp').checked=false;document.getElementById('inpm').value='personne morale';document.getElementById('inpp').value=''" <?php echo $this->session->flashdata('pm');?>>
                            <input type="text" id="inpm" name="pm" style="display:none">
                            <label for="defaultCheck">personne morale</label>
                            
                        </div>
                        <span class="container text-left">
                            <label class="control-label text-danger"><?php echo $this->session->flashdata('type'); ?></label> 
                        </span>

                    </div>
					<div class="row" >
						<div class="col-8" style="">
                            <label class="control-label" style="">Cin:</label>
							<input id="cin" onkeypress="return event.charCode>=48 && event.charCode<=57" maxlength="12" type="text" class="form-control" placeholder="Numéro de la carte d'identité nationale" name="cin" <?php echo $this->session->flashdata('disabled');?> value="<?php echo $this->session->flashdata('cinC');?>">				    
                            <span class="container text-left">
					    		<label class="control-label text-danger"><?php echo form_error('cin'); ?></label> 
					    	</span>
                        </div>
					</div></br>
                    <div class="row" >
						<div class="col-8" style="">
                            <label class="control-label" style="">Nom:</label>
							<input onclick="verifCin()" type="text" class="form-control" placeholder="Nom du personnel" name="nom" value="<?php echo $this->session->flashdata('nomC');?>">
                            <span class="container text-left">
					    		<label class="control-label text-danger"><?php echo form_error('nom'); ?></label> 
					    	</span>				    
						</div>
					</div></br>
					<div class="row" >
						<div class="col-8" style="">
                            <label class="control-label" style="">Prénoms:</label>
							<input type="text" class="form-control" placeholder="Prénoms du personnel" name="prenoms" value="<?php echo $this->session->flashdata('prenomsC');?>">
                            <span class="container text-left">
					    		<label class="control-label text-danger"><?php echo form_error('prenoms'); ?></label> 
					    	</span>				    
						</div>
					</div></br>
                    <div class="row" >
						<div class="col-8" style="">
                            <label class="control-label" style="">Date de naissance:</label>
							<input type="date" class="form-control" name="dateNaiss" value="<?php echo $this->session->flashdata('dateNaissC');?>">
                            <span class="container text-left">
					    		<label class="control-label text-danger"><?php echo form_error('dateNaiss'); ?></label> 
					    	</span>				    
						</div>
					</div></br>
					<div class="row" >
						<div class="col-8" style="">
                            <label class="control-label" style="">Sexe:</label>
                            <select name="sexe" class="custom-select mb-3 form-control">
                                <option <?php echo $this->session->flashdata('hommeC');?>>Homme</option>
                                <option <?php echo $this->session->flashdata('femmeC');?>>Femme</option>
                            </select>
						</div>
					</div></br>
                    <div class="row" >
						<div class="col-8" style="">
                            <label class="control-label" style="">Situation matrimoniale:</label>
                            <select name="sm" class="custom-select mb-3 form-control">
                                <option <?php echo $this->session->flashdata('celibataireC');?>>Célibataire</option>
                                <option <?php echo $this->session->flashdata('marieC');?>>Marié(e)</option>
                                <option <?php echo $this->session->flashdata('divorceC');?>>Dicorcé(e)</option>
                                <option <?php echo $this->session->flashdata('veufC');?>>Veuf(ve)</option>
                                
                            </select>
						</div>
					</div></br>
                    <div class="row" >
						<div class="col-8" style="">
                            <label class="control-label" style="">Commune:</label>
							<input type="text" class="form-control" placeholder="Commune urbaine" name="commune" value="<?php echo $this->session->flashdata('communeC');?>">
                            <span class="container text-left">
					    		<label class="control-label text-danger"><?php echo form_error('commune'); ?></label> 
					    	</span>				    
						</div>
					</div></br>
					<div class="row" >
						<div class="col-8" style="">
                            <label class="control-label" style="">Adresse:</label>
							<input type="text" class="form-control" placeholder="Fokontany/lot" name="adresse" value="<?php echo $this->session->flashdata('adresseC');?>">	
                            <span class="container text-left">
					    		<label class="control-label text-danger"><?php echo form_error('adresse'); ?></label> 
					    	</span>			    
						</div>
					</div></br>
                    <div class="row" >
						<div class="col-8" style="">
                            <label class="control-label" style="">Tel:</label>
							<input onkeypress="return event.charCode>=48 && event.charCode<=57" maxlength="10" type="text" class="form-control" placeholder="Numéro téléphone mobile" name="tel" value="<?php echo $this->session->flashdata('telC');?>">	
                            <span class="container text-left">
					    		<label class="control-label text-danger"><?php echo form_error('tel'); ?></label> 
					    	</span>			    
						</div>
					</div></br>
					
                    <div class="row" >
                    <div class="col-8" style="">
                            <label class="control-label" style="">CentreFiscal:</label>
                            <select name="centre" class="custom-select mb-3 form-control">
                                <?php
                                foreach ($centre as $centre) {?>
                                    <option <?php echo $this->session->flashdata($centre['nomCentre']) ?>><?php echo $centre['nomCentre']?></option>
                                <?php
                                }
                                ?>
                            </select>
						</div>
					</div></br>
                    
                    <div class="row">
                        <div class="col-12" style="text-align:right;padding-right:20px;">
                            <button onmouseover="verifCin()" type="submit" class="btn btn-success" name="suivant" value="suivant">Suivant<img class="img-fluid" src="../../../image/next1.png"></button>	        
                        </div>
                    </div>
                    
                        
				</div>
            
            
        
        </div></br>
        </form>
        <div class="centre shadow p-4 mb-4 bg-white" id="etape2" style="background-color:white;border-radius:5px;display:none;padding-left:50px;padding-right:0px;padding-bottom:5px;">
            <h5 style="border-bottom:2px solid #006622;width:41%;font-size:18px;color:#006622;">Etape 2: informations sur l'activité</h5></br>
            <div class="table-responsive-sm">
            <table class="table table-hover" id="listePers" style="font-size:14px;">
                    <thead>
                    <tr>
                        <th>Activité</th>
                        <th>Commune</th>
                        <th>Modifier</th>
                        <th>Supprimer</th>

                        
                    </tr>
                    </thead>
                    <tbody style="color:#737373">
                    <tr>
                    <form method="POST" action=<?php echo base_url().'Controlleur/modifAct'?> >
                    <?php 
                        if (!empty($ac)) {
                            foreach ($ac as $ac) {?>
                                <tr>
                                    <td><?php echo $ac['act']?></td>
                                    <td><?php echo $ac['commune']?></td>
                                    <td><button type="submit" class="btn btn-info" value="modifier" style="font-size:14px" name=<?php echo "m".$ac['numAct']?>>Modifer</button></td>
                                    <td><button type="submit" class="btn btn-danger" value="supprimer" style="font-size:14px" name=<?php echo "s".$ac['numAct']?>>Supprimer</button></td>
                                    
                                </tr>
                            <?php
                            }
                        }?>
                    </tr>
                    </form>
                    
                    
                    </tbody>
                </table>
            </div>
            <form class="form-horizontal" method="POST" action=<?php echo base_url().'Controlleur/ajoutC';?>>
			  	<div class="form-group">
					<div class="row" >
						<div class="col-8" style="">
                            <label class="control-label" style="">Activité:</label>
							<input type="text" class="form-control" placeholder="Votre activité" name="act" value="<?php echo $this->session->flashdata('act');?>">				    
						</div>
                        <span class="container text-left">
                            <label class="control-label text-danger"><?php echo form_error('act'); ?></label> 
                        </span>
					</div></br>
                    <div class="row" >
						<div class="col-8" style="">
                            <label class="control-label" style="">Précision sur l'activité:</label>
							<textarea class="form-control" rows="5" name="pact"><?php echo $this->session->flashdata('pact');?></textarea>				    
						</div>
                        <span class="container text-left">
                            <label class="control-label text-danger"><?php echo form_error('pact'); ?></label> 
                        </span>
					</div></br>
					
                    <div class="row" >
						<div class="col-8" style="">
                            <label class="control-label" style="">Commune:</label>
							<input type="text" class="form-control" placeholder="Commune urbaine" name="com" value="<?php echo $this->session->flashdata('com');?>">				    
						</div>
                        <span class="container text-left">
                            <label class="control-label text-danger"><?php echo form_error('com'); ?></label> 
                        </span>
					</div></br>
					<div class="row" >
						<div class="col-8" style="">
                            <label class="control-label" style="">Adresse:</label>
							<input type="text" class="form-control" placeholder="Fokontany/adresse précis" name="ad" value="<?php echo $this->session->flashdata('ad');?>">
                            <span class="container text-left">
                                <label class="control-label text-danger"><?php echo form_error('ad'); ?></label> 
                            </span>				    
						</div>
					</div></br>
                    <div class="row" >
						<div class="col-4" style="">
                            <label class="control-label" style="">Importateur</I>:</label>
                            <select name="imp" class="custom-select mb-3 form-control">
                                <option <?php echo $this->session->flashdata('ouii');?>>oui</option>
                                <option <?php echo $this->session->flashdata('noni');?>>non</option>
                            </select>				    
						</div>
                        
					</div></br>
                    <div class="row" >
						<div class="col-4" style="">
                            <label class="control-label" style="">Exportateur</I>:</label>	
                            <select name="exp" class="custom-select mb-3 form-control">
                                <option <?php echo $this->session->flashdata('ouie');?>>oui</option>
                                <option <?php echo $this->session->flashdata('none');?>>non</option>
                            </select>			    
						</div>
                        
					</div></br>
                    <div class="row" >
                        <div class="col-3" style="margin-right:0px">
                            <button type="reset" class="btn btn-danger" id="connecter" name="connecter" value="connecter">Annuler <img src="../../../image/cancel.png" alt=""></button>
                        </div></br>
                        <div class="col-9" style="padding-left:0px">
                            <button class="btn btn-success" name="enreA" value="enreA" >Enregistrer <img src="../../../image/yes.png" alt=""></button>
                        </div> 
					</div></br></br>
                    <div class="row" >
                        <div class="col-4">
                            <button class="btn btn-secondary" name="prev" value="prev" ><img src="../../../image/prev.png" alt="" >Précédent</button>
                        </div>
                        <div class="col-8" style="text-align:right;padding-right:10%">
                            <div class="" style="margin-right:0px">
                            </div></br>
                            <div class="" style="">
                                <button type="submit" class="btn btn-success" name="terminer" value="terminer">Terminer</button>
                            </div>
                        </div>
					</div>
					
                        
				</div>
            </form>
        </div></br>
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
    <div class="jumbotron jumbotron-fluid text-center" style="margin-bottom:0;background-color:#e6e6e6;color:#999999;">
		<p>Social: <span class="col-6"><a href=""><img src="../../../image/fb1.png" alt=""></a></span><span class="col-6"><a href=""><img src="../../../image/gmail1.png" alt=""></a></span></p> 
		<br><p>copyright DGI | 2022 All Right Reserved</p>
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
                    <label class="control-label">êtes-vous sûr de vouloir supprimer</label>
                </div>
                
                <!-- Modal footer -->
                <div class="modal-footer">
                    <div class="btn-group">
                        <div class="col-6">
                            <button type="submit" class="btn btn-secondary" data-dismiss="modal">Non</button>
                        </div>
                        <form method="POST" action=<?php echo base_url().'Controlleur/supprimerAct'?>>
                        <div class="col-7">
                            <button type="submit" class="btn btn-danger" name="supprimerP">Oui</button>
                        </div></form>		        
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <div class="modal fade" id="ModalT">
        <div class="modal-dialog">
            <div class="modal-content">
            
                <!-- Modal Header -->
                <div class="modal-header">
                <h5 class="modal-title text-success">Enregistrement effectué</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                
                <!-- Modal body -->
                <div class="modal-body" style="font-size: 14px;color:#737373">
                    <label class="control-label">Le contribuable portant le numéro d'identification fiscal : <?php echo $this->session->userdata('nif')?> a été enregistrer avec succès</label>
                </div>
                
                <!-- Modal footer -->
                <div class="modal-footer">
                    <div class="btn-group">
                        <div class="col-6">
                        </div>
                        <div class="col-7">
                            <button type="submit" class="btn btn-secondary" data-dismiss="modal">OK</button>
                        </div>		        
                    </div>
                </div>
                
            </div>
        </div>
    </div>  
<?php
    if($this->session->flashdata("next")==="oui"){
        echo("<script>document.getElementById('etape2').style.display='block';document.getElementById('etape1').style.display='none';</script>");
    }
    if($this->session->flashdata("prev")==="oui"){
        echo("<script>document.getElementById('etape1').style.display='block';document.getElementById('etape2').style.display='none';</script>");
    }
    if($this->session->flashdata("supp")==="afficher"){
        echo "<script>
            $('#ModalS').modal('show');
            </script>";
    }
    if($this->session->flashdata("terminer")==="afficher"){
        echo "<script>
            $('#ModalT').modal('show');
            </script>";
    }
    if($this->session->flashdata('affMP')==="afficher"){
        echo "<script>
            $('#Modal1').modal('show');
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
    if(document.getElementById('pp').checked==true){
        document.getElementById('inpp').value="personne physique";
    }
    if(document.getElementById('pm').checked==true){
        document.getElementById('inpm').value="personne morale";
    }
    function verifMdp(){
		if(!document.forms['form']['amdp'].value=="" && document.forms['form']['nmdp'].value.length<5){
			alert("Le mot de passe est trop court(doit contenir au moins 5 caractères)");
			document.getElementById('nmdp').focus();
		}
	}
    function verifCin(){
		if(document.forms['form1']['cin'].value.length<12){
			alert("Le numéro de la carte d'identité nationale doit contenir exactement 12 chiffres");
			document.getElementById('cin').focus();
		}
	}
</script>
</body>
</html>