<!DOCTYPE html>
<html>
<head>
	<title>Validation</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../../../maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../Datatables/dt/css/dataTables.bootstrap4.min.css">
	<script src="../../../ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="../../../cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="../../../maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="../../../Datatables/dt/js/jquery.dataTables.min.js"></script>
    <script src="../../../ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
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
.centre {
  margin: auto;
  width: 60%;
  padding: 10px;
}
td{
    color:#737373;
}
.calculer:hover,
.calculer:focus{
    cursor: pointer;
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
<body ng-app="myApp" 
    data-ng-init="
    expt=<?php echo $this->session->flashdata("expt");?>;
    expnt=<?php echo $this->session->flashdata("expnt");?>;
    oppat=<?php echo $this->session->flashdata("oppat");?>;
    oppnat=<?php echo $this->session->flashdata("oppnat");?>;
    oppant=<?php echo $this->session->flashdata("oppant");?>;
    oppnant=<?php echo $this->session->flashdata("oppnant");?>;
    at=<?php echo $this->session->flashdata("at");?>;
    ant=<?php echo $this->session->flashdata("ant");?>;
    taux1=<?php echo $this->session->flashdata("taux1");?>;
    taux2=<?php echo $this->session->flashdata("taux2");?>;
    taux3=<?php echo $this->session->flashdata("taux3");?>;
    bl=<?php echo $this->session->flashdata("bl");?>;
    al=<?php echo $this->session->flashdata("al");?>;
    sl=<?php echo $this->session->flashdata("sl");?>;
    bi=<?php echo $this->session->flashdata("bi");?>;
    ai=<?php echo $this->session->flashdata("ai");?>;
    si=<?php echo $this->session->flashdata("si");?>;
    rl=<?php echo $this->session->flashdata("rl");?>;
    ri=<?php echo $this->session->flashdata("ri");?>; 
    montant=<?php echo $this->session->flashdata("montant");?>;
    penalite=<?php echo $this->session->flashdata("penalite");?>;
    "
    style=" font-family: 'Times New Roman', 'Times', 'serif';font-size:14px">
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
                    <a onmouseover="document.getElementById('liste').src='../../../image/liste1.png'" onclick="document.getElementById('liste').src='../../../image/liste1.png'" onmouseout="document.getElementById('liste').src='../../../image/liste0.png'" class="nav-link" data-toggle="tooltip" data-placement="bottom" title="Voir toutes les listes des déclarations, personnels, contribuables, comptes contribuables, comptes administrateurs" class="active" href=<?php echo base_url().'Controlleur/acceuilAdmin'?> ><h5><img src="../../../image/liste0.png" id="liste" alt="">Toutes les listes</h5></a>
				</li>
				<li class="nav-item">
                    <a class="nav-link" data-toggle="tooltip" data-placement="bottom" title="Afficher le formulaire d'ajout de personnel" href=<?php echo base_url().'Controlleur/personnel'?>><h5>Personnel</h5></a>
				</li>
				<li class="nav-item">
                    <a  class="nav-link" data-toggle="tooltip" data-placement="bottom" title="Afficher le formulaire d'ajout de contribuable" href=<?php echo base_url().'Controlleur/contribuable'?>><h5>Contribuable</h5></a>
				</li>
                <li>
                    <a class="nav-link" data-toggle="tooltip" data-placement="bottom" title="Valider une déclaration de TVA" href="#"><h5  style="color:white">Validation</h5></a>
                </li>
                <li class="notification">
                    <a onmouseover="document.getElementById('notif').src='../../../image/notif1.png'" onmouseover="document.getElementById('notif').src='../../../image/notif1.png'" onmouseout="document.getElementById('notif').src='../../../image/notif0.png'" class="nav-link" data-toggle="tooltip" data-placement="bottom" title="Voir touts les historiques des utilisateurs" href=<?php echo base_url().'Controlleur/historique'?>><h5><img src="../../../image/notif0.png" id="notif" alt=""><span class="badge">
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
    <div class="container-fluid" style="padding-top:80px; padding-left:80px;padding-right:80px;">
        
    <form name="form1" action=<?php echo base_url().'Controlleur/declarationtvaAdmin';?> method="POST">
    <div class="shadow p-4 mb-4 bg-white" style="background-color:white;border-radius:5px;padding-top:10px;padding-bottom:5px;">
        <div class="row">
            <div class="col-4" style="text-align:right">
            </div>
            <div class="col-8" style="text-align:right;padding-right:7%">
            <?php echo ("Déclaration n°:".$this->session->userdata('numDec1'));?> 
            </div>
        </div><br>
        <div class="row">
            <div class="col-4" style="text-align:right">
                <label for="np" class="mr-sm-2">RAISON SOCIALE ou Nom et prénoms: </label>
            </div>
            <div class="col-8" style="text-align:left">
                <input value="<?php echo $this->session->flashdata('rs');?>" name="np" style="width:50%;border:none;border-bottom:2px solid #999999" type="text" placeholder="Nom et prénoms...">
            </div>
        </div><br>
        <div class="row">
            <div class="col-4" style="text-align:right">
                <label for="np" class="mr-sm-2">Nom commercial: </label>
            </div>
            <div class="col-8" style="text-align:left">
                <input value="<?php echo $this->session->flashdata('nc');?>" name="nc" style="width:50%;border:none;border-bottom:2px solid #999999" type="text" placeholder="Nom commercial...">
            </div>
        </div><br>
        <div class="row">
            <div class="col-4" style="text-align:right">
                <label for="np" class="mr-sm-2">Adresse: </label>
            </div>
            <div class="col-8" style="text-align:left">
                <input value="<?php echo $this->session->flashdata('ad');?>" name="ad" style="width:50%;border:none;border-bottom:2px solid #999999" type="text" placeholder="Adresse...">
            </div>
        </div><br>
        <div class="row">
            <div class="col-4" style="text-align:right">
                <label for="np" class="mr-sm-2">Activité ou profession: </label>
            </div>
            <div class="col-8" style="text-align:left">
                <select name="act" class="custom-select" style="width:50%">
                        <?php
                            foreach ($act as $act) {?>
                                <option <?php echo $this->session->flashdata("a".$act['numAct']);?>><?php echo $act['numAct']."-".$act['act']?></option>
                            <?php
                            }
                        ?>
                </select><br>
                <label for="np" class="mr-sm-2" id="ctrlact" style="color:white">Vous devez au moins avoir un activité pour faire une déclaration</label>
            </div>
        </div><br>
        <div class="row">
            <div class="col-4" style="text-align:right">
                <label for="np" class="mr-sm-2">Année: </label>
            </div>
            <div class="col-8" style="text-align:left">
                <input value="<?php echo $this->session->flashdata("annee");?>" id="annee" name="annee" onkeypress="return event.charCode>=48 && event.charCode<=57" style="width:50%;border:none;border-bottom:2px solid #999999" type="number" min="2020" placeholder="TVA année..." >
                <br>
                <label for="np" class="mr-sm-2" id="ctrlannee" style="color:white">Champ obligatoire</label>
            </div>
        </div>
        <div class="row">
            <div class="col-4" style="text-align:right">
            </div>
            <div class="col-8" style="text-align:left">
                <button class="btn btn-secondary" value="pro" name="pro" style="color:white" data-toggle="tooltip" data-placement="bottom" title="Appliquer à cette déclaration le prorata provisoire">Prorata</button>
            </div>
        </div>
        <br>
        
        <div class="row">
            <div class="col-4" style="text-align:right">
                <label for="np" class="mr-sm-2">Mois de: </label>
            </div>
            <div class="col-8" style="text-align:left">
                <select name="mois" class="custom-select" style="width:50%">
                    <option <?php echo $this->session->flashdata("Janvier");?>>Janvier</option>
                    <option <?php echo $this->session->flashdata("Février");?>>Février</option>
                    <option <?php echo $this->session->flashdata("Mars");?>>Mars</option>
                    <option <?php echo $this->session->flashdata("Avril");?>>Avril</option>
                    <option <?php echo $this->session->flashdata("Mai");?>>Mai</option>
                    <option <?php echo $this->session->flashdata("Juin");?>>Juin</option>
                    <option <?php echo $this->session->flashdata("Juillet");?>>Juillet</option>
                    <option <?php echo $this->session->flashdata("Août");?>>Août</option>
                    <option <?php echo $this->session->flashdata("Septembre");?>>Septembre</option>
                    <option <?php echo $this->session->flashdata("Octobre");?>>Octobre</option>
                    <option <?php echo $this->session->flashdata("Novembre");?>>Novembre</option>
                    <option <?php echo $this->session->flashdata("Décembre");?>>Décembre</option>
                </select>
            </div>
        </div><br>
    </div><br>
    
    <div onclick="verifA()" onmouseover="verifA()" style="">
        <div class="shadow p-4 mb-4 bg-white" style="background-color:white;border-radius:5px;padding-top:30px;padding-left:5%;padding-right:5%;padding-bottom:5px;color:#006622">
            <table class="table table-bordered">
                <thead style="text-align:center">
                <tr>
                    <th rowspan="2"><p style="color:#006622;font-size:18px">OPERATIONS</p></th>
                    <th colspan="2">Chiffre d'affaires</th>
                    <th rowspan="2">Total<br>(c)=(a)+(b)</th>
                    <th rowspan="2">Taux<br>(d)</th>
                    <th rowspan="2">TVA Collectée<br>(e)=(a)x(d)</th>
                        <tr>
                            <th>Taxable(a)</th>
                            <th>Non taxable(b)</th>
                        </tr>
                    
                </tr>
                </thead>
                <tbody style="color:#737373">
                <tr>
                    <td>1-Opérations à l'exportation:</td>
                    <td><input onkeypress="return event.charCode>=48 && event.charCode<=57" min="0" type="number" name="expt" ng-model="expt"  data-toggle="tooltip" data-placement="bottom" title="Opérations à l'exportation taxable" style="width:100%;border:none;border-bottom:2px solid #999999" placeholder="........."></td>
                    <td><input onkeypress="return event.charCode>=48 && event.charCode<=57" min="0" type="number" name="expnt" ng-model="expnt" data-toggle="tooltip" data-placement="bottom" title="Opérations à l'exportation non taxable" style="width:100%;border:none;border-bottom:2px solid #999999" placeholder="........."></td>
                    <td><input value="{{expt+expnt}}" readonly style="width:100%;border:none;border-bottom:2px solid #999999" placeholder="........."></td>
                    <td><input style="width:100%;border:none;border-bottom:2px solid #999999" readonly type="text" placeholder="0%"></td>
                    <td><input style="width:100%;border:none;border-bottom:2px solid #999999" readonly type="text" placeholder="\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"></td>
                </tr>
                <tr>
                    <td>2-Opération locales:<br>
                    <div class="row">
                        <span class="col-2"></span><span class="col-10">-à des personnes assujeties:</span>
                    </div>
                    <div>
                        <span class="col-2"></span><span class="col-10">-à des personnes non assujeties:</span>
                    </div>
                    </td>
                    <td>
                        <div class="container">
                            <div class="row">
                            
                            </div><br>
                            <div class="row">
                                <input onkeypress="return event.charCode>=48 && event.charCode<=57" min="0" type="number" id="oppat" name="oppat" ng-model="oppat" data-toggle="tooltip" data-placement="bottom" title="Opérations locales à des personnes assujeties(taxable)" style="width:100%;border:none;border-bottom:2px solid #999999" placeholder=".........">
                            </div>
                            <div class="row">
                                <input onkeypress="return event.charCode>=48 && event.charCode<=57" min="0" type="number" id="oppnat" name="oppnat" ng-model="oppnat" data-toggle="tooltip" data-placement="bottom" title="Opérations locales à des personnes non assujeties(taxable)" style="width:100%;border:none;border-bottom:2px solid #999999" placeholder=".........">
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="container">
                            <div class="row">
                            
                            </div><br>
                            <div class="row">
                                <input onkeypress="return event.charCode>=48 && event.charCode<=57" min="0" type="number" name="oppant" ng-model="oppant" data-toggle="tooltip" data-placement="bottom" title="Opérations locales à des personnes assujeties(non taxable)" style="width:100%;border:none;border-bottom:2px solid #999999" placeholder=".........">
                            </div>
                            <div class="row">
                                <input onkeypress="return event.charCode>=48 && event.charCode<=57" min="0" type="number" name="oppnant" ng-model="oppnant" data-toggle="tooltip" data-placement="bottom" title="Opérations locales à des personnes non assujeties(non taxable)" style="width:100%;border:none;border-bottom:2px solid #999999" placeholder=".........">
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="container">
                            <div class="row">
                                
                            </div><br>
                            <div class="row">
                                <input value="{{oppat+oppant}}" style="width:100%;border:none;border-bottom:2px solid #999999" readonly placeholder=".........">
                            </div>
                            <div class="row">
                                <input value="{{oppnat+oppnant}}" style="width:100%;border:none;border-bottom:2px solid #999999" readonly type="text" placeholder=".........">
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="container">
                            <div class="row">
                                
                            </div><br>
                            <div class="row">
                                <input list="taux1" id="taux1" name="taux1" ng-model="taux1" onclick="return affTotal1();" style="width:100%;border:none;border-bottom:2px solid #999999" data-toggle="tooltip" data-placement="bottom" title="Valeur accepté: 0.2 pour 20%" placeholder=".........">
                                <datalist id="taux1">
                                    <option value="0.2">
                                    <option value="0.3">
                                </datalist>
                            </div>
                            <div class="row">
                                <input list="taux2" id="taux2" name="taux2" ng-model="taux2" onclick="return affTotal1()" style="width:100%;border:none;border-bottom:2px solid #999999" data-toggle="tooltip" data-placement="bottom" title="Valeur accepté: 0.2 pour 20%" type="text" placeholder=".........">
                                <datalist id="taux2">
                                    <option value="0.2">
                                    <option value="0.3">
                                </datalist>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="container">
                            <div class="row">

                            </div><br>
                            <div class="row">
                                <input value={{oppat*taux1}} name="tc1" style="width:100%;border:none;border-bottom:2px solid #999999" readonly placeholder=".........">
                            </div>
                            <div class="row">
                                <input value={{oppnat*taux2}} name="tc2" style="width:100%;border:none;border-bottom:2px solid #999999" readonly type="text" placeholder=".........">
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>3-Autres régularisation:</td>
                    <td><input onkeypress="return event.charCode>=48 && event.charCode<=57" min="0"  type="number" id="ataxable" name="at" ng-model="at" data-toggle="tooltip" data-placement="bottom" title="Autres régularisations(taxable)" style="width:100%;border:none;border-bottom:2px solid #999999" placeholder="........."></td>
                    <td><input onkeypress="return event.charCode>=48 && event.charCode<=57" min="0" type="number" name="ant" ng-model="ant" data-toggle="tooltip" data-placement="bottom" title="Autres régularisations(non taxable)" style="width:100%;border:none;border-bottom:2px solid #999999" placeholder="........."></td>
                    <td><input value="{{at+ant}}" style="width:100%;border:none;border-bottom:2px solid #999999" readonly type="text" placeholder="........."></td>
                    <td><input list="taux3" id="taux3t" name="taux3" ng-model="taux3" onclick="return affTotal1()" data-toggle="tooltip" data-placement="bottom" title="Valeur accepté: 0.2 pour 20%" style="width:100%;border:none;border-bottom:2px solid #999999" placeholder="........."></td>
                    <datalist id="taux3">
                        <option value="0.2">
                        <option value="0.3">
                    </datalist>
                    <td><input value={{at*taux3}} name="tc3" style="width:100%;border:none;border-bottom:2px solid #999999" readonly type="text" placeholder="........."></td>
                </tr>
                <tr>
                    <td>4-TOTAL:</td>
                    <td><input name="t1" value="{{expt+oppat+oppnat+at}}" style="width:100%;border:none;border-bottom:2px solid #999999" readonly placeholder="........."></td>
                    <td><input name="t2" value="{{expnt+oppant+oppnant+ant}}" style="width:100%;border:none;border-bottom:2px solid #999999" readonly placeholder="........."></td>
                    <td><input style="width:100%;border:none;border-bottom:2px solid #999999" readonly name="t" placeholder="........."></td>
                    <td><input style="width:100%;border:none;border-bottom:2px solid #999999" readonly type="text" placeholder="\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"></td>
                    <td><input name="totalC" value="<?php echo $this->session->flashdata("totalC");?>" style="width:100%;border:none;border-bottom:2px solid #999999" readonly type="text" placeholder="........."></td>
                </tr>
                </tbody>
            </table>
            <div style="text-align:right" >
            <span onclick="calculer()" class="btn btn-success calculer">Calculer</span>
            </div><br>
            <table class="table table-bordered ">
                <thead style="text-align:center">
                <tr>
                    <th ><p style="color:#006622;font-size:18px">DEDUCTIONS</p></th>
                    <th >Locaux <br>(f)</th>
                    <th >Importations<br>(g)</th>
                    <th >TOTAL<br>(h)=(f)+(g)</th>
                    
                </tr>
                </thead>
                <tbody style="color:#737373">
                <tr>
                    <td>5-Taxe déductible:<br>
                    <div class="row">
                        <span class="col-2"></span><span class="col-10">5. 1-sur biens d'équipements et immeubles:</span>
                    </div>
                    <div>
                        <span class="col-2"></span><span class="col-10">5. 2-sur les autres biens:</span>
                    </div>
                    <div>
                        <span class="col-2"></span><span class="col-10">5. 3-sur les services:</span>
                    </div>
                    </td>
                    <td>
                        <div class="container">
                            <div class="row">
                            
                            </div><br>
                            <div class="row">
                                <input name="bl" ng-model="bl" data-toggle="tooltip" data-placement="bottom" title="Sur biens d'équipements et immeubles(locaux)" style="width:100%;border:none;border-bottom:2px solid #999999" onkeypress="return event.charCode>=48 && event.charCode<=57" min="0" type="number" placeholder=".........">
                            </div>
                            <div class="row">
                                <input name="al" ng-model="al" data-toggle="tooltip" data-placement="bottom" title="Sur les autres biens(locaux)" style="width:100%;border:none;border-bottom:2px solid #999999" onkeypress="return event.charCode>=48 && event.charCode<=57" min="0" type="number" placeholder=".........">
                            </div>
                            <div class="row">
                                <input name="sl" ng-model="sl" data-toggle="tooltip" data-placement="bottom" title="Sur les services(locaux)" style="width:100%;border:none;border-bottom:2px solid #999999" onkeypress="return event.charCode>=48 && event.charCode<=57" min="0" type="number" placeholder=".........">
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="container">
                            <div class="row">
                            
                            </div><br>
                            <div class="row">
                                <input name="bi" ng-model="bi" data-toggle="tooltip" data-placement="bottom" title="Sur biens d'équipements et immeubles(importations)" style="width:100%;border:none;border-bottom:2px solid #999999" onkeypress="return event.charCode>=48 && event.charCode<=57" min="0" type="number" placeholder=".........">
                            </div>
                            <div class="row">
                                <input name="ai" ng-model="ai" data-toggle="tooltip" data-placement="bottom" title="Sur les autres biens(importations)" style="width:100%;border:none;border-bottom:2px solid #999999" onkeypress="return event.charCode>=48 && event.charCode<=57" min="0" type="number" placeholder=".........">
                            </div>
                            <div class="row">
                                <input name="si" ng-model="si" data-toggle="tooltip" data-placement="bottom" title="Sur les services(importations)" style="width:100%;border:none;border-bottom:2px solid #999999" onkeypress="return event.charCode>=48 && event.charCode<=57" min="0" type="number" placeholder=".........">
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="container">
                            <div class="row">
                            
                            </div><br>
                            <div class="row">
                                <input name="tb" value="{{bl+bi}}" style="width:100%;border:none;border-bottom:2px solid #999999" readonly type="text" placeholder=".........">
                            </div>
                            <div class="row">
                                <input name="tab" value="{{al+ai}}" style="width:100%;border:none;border-bottom:2px solid #999999" readonly type="text" placeholder=".........">
                            </div>
                            <div class="row">
                                <input name="ts" value="{{sl+si}}" style="width:100%;border:none;border-bottom:2px solid #999999" readonly type="text" placeholder=".........">
                            </div>
                        </div>
                    </td>
                    
                </tr>
                <tr>
                    <td>6-Autres régularisation:</td>
                    <td><input name="rl" ng-model="rl" onkeypress="return event.charCode>=48 && event.charCode<=57" data-toggle="tooltip" data-placement="bottom" title="Autres régularisations(locaux)" style="width:100%;border:none;border-bottom:2px solid #999999" type="number" min="0" placeholder="........."></td>
                    <td><input name="ri" ng-model="ri" onkeypress="return event.charCode>=48 && event.charCode<=57" data-toggle="tooltip" data-placement="bottom" title="Autres régularisations(importations)" style="width:100%;border:none;border-bottom:2px solid #999999" type="number" min="0" placeholder="........."></td>
                    <td><input name="ta" value="{{rl+ri}}" style="width:100%;border:none;border-bottom:2px solid #999999" readonly type="text" placeholder="........."></td>
                </tr>
                <tr>
                    <td style="border-right:none">7-Total de la colonne(h):</td>
                    <td style="border-left:none;border-right:none"></td>
                    <td style="border-left:none;border-right:none"></td>
                    <td onclick="totalH()"><input onclick="totalH()" name="totalH" value="<?php echo $this->session->flashdata("totalH");?>" style="width:100%;border:none;border-bottom:2px solid #999999" data-toggle="tooltip" data-placement="bottom" title="Cliquez ici pour voir la totalité de la colonne(h)" readonly type="text" placeholder="........."></td>
                    
                </tr>
                <tr>
                    <td style="border-right:none">
                        <form class="form-inline">
                            <div class="form-group"><label>8-Prorata de déduction</label><input min="0" name="prorata" value="<?php echo $this->session->flashdata("prorata");?>"  style="width:10%;border:none;border-bottom:2px solid #999999" placeholder=".........">%TVA déductible de la période((7) x taux prorata)):
                                <div class="dropdown dropleft" id="num">
                                    <button class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" style="color:white">Calcul du prorata</button>
                                    <div class="dropdown-menu" style="background-color:#999999;text-align:center">
                                        <p style="color:#006622;font-size:18px">Calcul du prorata</p>
                                        <input name="cataxable" value="<?php echo $this->session->userdata('cataxable');?>" data-toggle="tooltip" data-placement="bottom" title="Total C.A taxable de l'année précédente" type="number" placeholder=".........">
                                        <input name="cantaxable" value="<?php echo $this->session->userdata('cantaxable');?>" data-toggle="tooltip" data-placement="bottom" title="Total C.A non taxable de l'année précédente" type="number" placeholder=".........">
                                        <br>
                                        <p>
                                            <div style="width:90%" onclick="calculP()" class="btn btn-success calculer">Calculer</div>
                                        </p><br>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </td>
                    <td style="border-left:none;border-right:none"></td>
                    <td style="border-left:none;border-right:none"></td>
                    <td><input name="l8" value="<?php echo $this->session->flashdata("l8");?>" onclick="p()" style="width:100%;border:none;border-bottom:2px solid #999999" data-toggle="tooltip" data-placement="bottom" title="Cliquez ici pour voir la valeur sur cette ligne" readonly type="text" placeholder="........."></td>
                    
                </tr>
                <tr>
                    <td style="border-right:none">9-Report de crédit de la période précédente:</td>
                    <td style="border-left:none;border-right:none"></td>
                    <td style="border-left:none;border-right:none"></td>
                    <td><input name="rcp" value="<?php echo $this->session->flashdata("rcp");?>" onkeypress="return event.charCode>=48 && event.charCode<=57" style="width:100%;border:none;border-bottom:2px solid #999999" type="number" min="0" placeholder="........."></td>
                   
                </tr>
                <tr>
                    <td style="border-right:none">10-TOTAL TVA DEDUCTIBLE (8) + (9):</td>
                    <td style="border-left:none;border-right:none"></td>
                    <td style="border-left:none;border-right:none"></td>
                    <td><input name="totalD" value="<?php echo $this->session->flashdata("totalD");?>" style="width:100%;border:none;border-bottom:2px solid #999999" readonly type="text" placeholder="........."></td>
                    
                </tr>
                </tbody>
            </table>
            <div style="text-align:right" >
                <span onclick="calculer1()" class="btn btn-success calculer">Calculer</span>
            </div><br>
            <table class="table table-bordered ">
                <tr>
                    <td>11. Total TVA à verser [Total colonne(e)] - (10):</td>
                    <td><input name="tvav" value="<?php echo $this->session->flashdata("tvav");?>" style="width:100%;border:none;border-bottom:2px solid #999999" readonly type="text" placeholder="........."></td>
                </tr>
                <tr>
                    <td>12. Total de crédit de TVA (10) - [Total colonne (e)]:</td>
                    <td><input name="ctva" value="<?php echo $this->session->flashdata("ctva");?>" style="width:100%;border:none;border-bottom:2px solid #999999" readonly type="number" placeholder="........."></td>
                </tr>
                <tr>
                    <td>13. Remboursement de crédit de TVA demandé:</td>
                    <td><input name="rctva" value="<?php echo $this->session->flashdata("rctva");?>" data-toggle="tooltip" data-placement="bottom" title="Remboursement de crédit de TVA demandé" style="width:100%;border:none;border-bottom:2px solid #999999" type="number" min="0" placeholder="........."></td>
                </tr>
                <tr>
                    <td>14. Crédit de TVA reportable : (12) - (13):</td>
                    <td><input name="ctvar" value="<?php echo $this->session->flashdata("ctvar");?>" style="width:100%;border:none;border-bottom:2px solid #999999" readonly type="text" placeholder="........."></td>
                </tr>
            </table>
            
                   
        </div>
    </div><br>  
    <div class="shadow p-4 mb-4 bg-white" style="padding-left:5%;padding-right:5%;background-color:white;border-radius:5px;padding-top:30px;padding-bottom:5px;">
        <table class="table table-bordered ">
            <tbody style="color:#737373">
                <tr>
                    <td>Montant TVA</td>
                    <td>Pénalité</td>
                    <td>Total à payer</td>
                    <td>Total versé</td>
                    <td>Reste à recouvrer</td>
                </tr>
                <tr>
                    <td><input name="montant" ng-model="montant" style="width:100%;border:none;border-bottom:2px solid #999999" onkeypress="return event.charCode>=48 && event.charCode<=57" min="0" type="number" placeholder="........."></td>
                    <td><input name="penalite" ng-model="penalite" style="width:100%;border:none;border-bottom:2px solid #999999" onkeypress="return event.charCode>=48 && event.charCode<=57" min="0" type="number" placeholder="........."></td>
                    <td><input name="tp" value={{montant+penalite}} style="width:100%;border:none;border-bottom:2px solid #999999" type="text" readonly  placeholder="........."></td>
                    <td><input name="tv" style="width:100%;border:none;border-bottom:2px solid #999999" onkeypress="return event.charCode>=48 && event.charCode<=57" min="0" type="number" placeholder="........." value=<?php echo $this->session->flashdata("totalVerse");?>></td>
                    <td><input name="rrc" style="width:100%;border:none;border-bottom:2px solid #999999" onkeypress="return event.charCode>=48 && event.charCode<=57" min="0" readonly placeholder="........."></td>

                </tr>
            
            </tbody>
        </table>
        <div class="row">
            <div class="col-md-8" id="imprimer">
                <a onmouseover="verifTous()"   data-toggle="tooltip" data-placement="bottom" title="Veuiller valider avant d'imprimer" href="<?php echo base_url().'Controlleur/impression';?>" target="_blank" class="btn btn-secondary">Imprimer <img class="img-fluid" src="../../../image/imprimer.png"></a>
            </div>
            <div class="col-md-2" style="text-align:right">
                <button formaction="<?php echo base_url().'Controlleur/tvaAdmin';?>" class="btn btn-danger" >Annuler <img class="img-fluid" src="../../../image/cancel.png"></button>
            </div>
            <div class="col-md-2" style="text-align:right">
                <button onmouseover="verifTous()" class="btn btn-success" id="enregistrer" name="enregistrer" value="enregistrer">Valider <img class="img-fluid" src="../../../image/yes.png"></button>	        
            </div> 
        </div><br><br>
    </div><br><br><br>     
    </form>
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
<?php
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
    $('#listeDec').DataTable({

    });
    function verifTous(){
        verifAct();
        verifA();
        calculer();
        nan();
        calculer1();
        calculer2();
        p();
        totalH();
        affTotal1();
        affRrc();
    }
    function c(){
        document.getElementById("us").src='../../../image/utA.png'
    }
    function verifMdp(){
		if(!document.forms['form']['amdp'].value=="" && document.forms['form']['nmdp'].value.length<5){
			alert("Le mot de passe est trop court(doit contenir au moins 5 caractères)");
			document.getElementById('nmdp').focus();
		}
	}
    var app = angular.module('myApp', []);
    var app1 = angular.module('myApp1', []);
function verifAct(){
    
    if(document.forms['form1']['act'].value==""){
        document.getElementById('ctrlact').style.color="red";
        document.getElementById('annee').focus();
        document.getElementById('enregistrer').disabled=true;
        document.getElementById('imprimer').display="none";
    }
    else{
        document.getElementById('ctrlannee').style.color="white";
        document.getElementById('enregistrer').disabled=false;
    }
    

}
function verifA(){
    verifAct();
    if(document.forms['form1']['annee'].value==""){
        document.getElementById('ctrlannee').style.color="red";
        document.getElementById('enregistrer').disabled=true;
        document.getElementById('annee').focus();
        
    }
    else{
        document.getElementById('ctrlannee').style.color="white";
        document.getElementById('enregistrer').disabled=false;
    }
    

}
function calculer(){
    affTotal1();
    if(!document.forms['form1']['oppat'].value=="" && document.forms['form1']['taux1'].value==""){
        document.getElementById('taux1').focus();
    }
    if(document.forms['form1']['oppat'].value=="" && !document.forms['form1']['taux1'].value==""){
        document.getElementById('oppat').focus();
    }
    if(!document.forms['form1']['oppnat'].value=="" && document.forms['form1']['taux2'].value==""){
        document.getElementById('taux2').focus();
    }
    if(document.forms['form1']['oppnat'].value=="" && !document.forms['form1']['taux2'].value==""){
        document.getElementById('oppnat').focus();
    }
    if(!document.forms['form1']['ataxable'].value=="" && document.forms['form1']['taux3t'].value==""){
        document.getElementById('taux3t').focus();
    }
    if(document.forms['form1']['ataxable'].value=="" && !document.forms['form1']['taux3t'].value==""){
        document.getElementById('ataxable').focus();
    }
    var a=document.forms['form1']['tc1'].value;
    var b=document.forms['form1']['tc2'].value;
    var c=document.forms['form1']['tc3'].value;
    if(a=="NaN"){
        a=0;
    }
    if(b=="NaN"){
        b=0;
    }
    if(c=="NaN"){
        c=0;
    }
    
    document.forms['form1']['totalC'].value=parseFloat(a)+parseFloat(b)+parseFloat(c);
    

}
function nan(){
    var a=document.forms['form1']['tc1'].value;
    var b=document.forms['form1']['tc2'].value;
    var c=document.forms['form1']['tc3'].value;
    if(document.forms['form1']['tc1'].value=="NaN"){
        document.forms['form1']['tc1'].value=0;
    }
    if(b=="NaN"){
        document.forms['form1']['tc2'].value=0;
    }
    if(c=="NaN"){
        document.forms['form1']['tc3'].value=0;
    }
}
function calculer1(){
    totalH();
    p();
    var a=document.forms['form1']['l8'].value;
    var b=document.forms['form1']['rcp'].value;
    if(a=="NaN" || ""){
        a=0;
    }
    if(b==""){
        b=0;
    }
    document.forms['form1']['totalD'].value=parseFloat(a)+parseFloat(b);
    calculer2();

}
function calculer2(){
    var a=document.forms['form1']['totalC'].value;
    var b=document.forms['form1']['totalD'].value;
    if(parseFloat(a)>parseFloat(b)){
        document.forms['form1']['tvav'].value=parseFloat(a)-parseFloat(b);
        document.forms['form1']['ctva'].value="";
        document.forms['form1']['rctva'].value="";
        document.forms['form1']['ctvar'].value="";
    }
    else{
        document.forms['form1']['tvav'].value="";
        if(document.forms['form1']['totalC'].value==""){
            a=0;
            document.forms['form1']['totalC'].value=0;
        }
        if(document.forms['form1']['totalD'].value==""){
            b=0;
            document.forms['form1']['totalB'].value=0;
        }
        var c=document.forms['form1']['ctva'].value=parseFloat(b)-parseFloat(a);
        var d=document.forms['form1']['rctva'].value;
        if(c==""){
            c=0;
        }
        if(d==""){
            d=0;
        }
        
        document.forms['form1']['ctvar'].value=parseFloat(c)-parseFloat(d);
    }
    

}
function p(){
    var a=document.forms['form1']['prorata'].value;
    if(a==""){
        a=100;
        document.forms['form1']['prorata'].value=100;
    }
    var b=parseFloat(a)/100;
    var c=document.forms['form1']['totalH'].value;
    if(document.forms['form1']['totalH'].value==""){
        c=0;
    }
    document.forms['form1']['l8'].value=parseFloat(c)*b;

}
function totalH(){
    var a=document.forms['form1']['tb'].value;
    var b=document.forms['form1']['tab'].value;
    var c=document.forms['form1']['ts'].value;
    var d=document.forms['form1']['ta'].value;
    if(a==""){
        a=0;
    }
    if(b==""){
        b=0;
    }
    if(c==""){
        c=0;
    }
    if(d==""){
        d=0;
    }
    document.forms['form1']['totalH'].value=parseInt(a)+parseInt(b)+parseInt(c)+parseInt(d);

}
function affTotal1(){
    var a=document.forms['form1']['t1'].value;
    var b=document.forms['form1']['t2'].value;
    if(a==""){
        a=0;
    }
    if(b==""){
        b=0;
    }
    document.forms['form1']['t'].value=parseInt(a)+parseInt(b);
}
function affRrc(){
    var a=document.forms['form1']['tp'].value;
    var b=document.forms['form1']['tv'].value;
    if(a==""){
        a=0;
    }
    if(b==""){
        b=0;
    }
    document.forms['form1']['rrc'].value=parseInt(a)-parseInt(b);
}
function verifMdp(){
    if(!document.forms['form']['amdpc'].value=="" && document.forms['form']['nmdpc'].value.length<5){
        alert("Le mot de passe est trop court(doit contenir au moins 5 caractères)");
        document.getElementById('nmdpc').focus();
    }
}
function calculP(){
    var a=0;
    var b=0;
    var c=0;
    if(!document.forms['form1']['cataxable'].value==""){
        var a=document.forms['form1']['cataxable'].value;
    }
    if(!document.forms['form1']['cantaxable'].value==""){
        var b=document.forms['form1']['cantaxable'].value;
    }
    if(a==0 && b==0){
        document.forms['form1']['prorata'].value="Valeur du C.A taxable invalid";
    }
    else{
        c=(parseFloat(a)/(parseFloat(a)+parseFloat(b)))*100;
        document.forms['form1']['prorata'].value=c;
    }
    
}
</script>
</body>
</html>