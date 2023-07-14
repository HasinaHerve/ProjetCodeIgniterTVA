<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Impréssion</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	
	
</head>
<style>
    .a{
        position: absolute;
        top: 35px;
        left: 30px;
        width: 250px;
        
    }
    .b{
        position: absolute;
        top: 30px;
        right: 30px;
        width: 300px;
    }
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
        
    }
    table{
        width:100%;
    }
</style>
<body onload="window.print();" style=" font-family: 'Times New Roman', 'Times', 'serif';font-size:14px;padding-left:30px;padding-right:30px;">  
    <div style="text-align:center">
        <p>
            <b>REPOBLIKAN'I MADAGASIKARA</b><br>
            Fitiavana-<span style="text-decoration: underline;">Tanindrazana</span>-Fandrosoana
        </p>
          
    </div>
    <div>
        <div class="a">
            <p style="text-align:center;font-style:bold">
                <b>MINISTERE DES FINANCES<br>ET DU BUDGET</b> 
            </p>
            <p style="text-align:center;">
                SECRETARIAT GENERAL 
            </p>
            <p style="text-align:center;">
                DIRECTION GENERALE DES IMPOTS 
            </p>
            
        </div>
        <div class="b">
            <p style="text-align:right;margin-right:15px;"><?php echo ("Déclaration n°:".$this->session->userdata('numDec1'));?></p>
            
            <p style="text-align:center;font-size:16px">
                <b>DECLARATION DE LA TAXE SUR LA VALEUR AJOUTEE(TVA)</b> 
            </p>
            <p style="margin-left:20px;">Déclaration <span style="margin-left:15px;">MOIS: <?php echo $this->session->flashdata("mois");?></span></p>
            <p style="margin-left:100px;">ANNEE: <?php echo $this->session->flashdata("annee");?></p>
            <p style="margin-left:20px;">Numéro d'identification fiscal: <?php echo $this->session->flashdata('nifimp');?></p>
            
        </div>
    </div><br><br><br><br><br><br><br><br><br>
    <div>
        <b>Bureau de recette: <?php echo $this->session->flashdata('bureaur');?></b>
    </div>
    <div style="border: 1px solid;margin-top:15px;padding-left:5px">
        <p>
            RAISON SOCIALE ou Nom et prénoms: <?php echo $this->session->flashdata('rs');?><br>
            Nom commercial: <?php echo $this->session->flashdata('nc');?><br>
            Adresse: <?php echo $this->session->flashdata('ad');?><br>
            Activité ou profession: <?php echo $this->session->flashdata("actimp");?>
        </p>
    </div><br>
    <table style="text-align:center">
        <tr>
            <th rowspan="2">OPERATIONS</th>
            <th colspan="2">Chiffre d'affaires</th>
            <th rowspan="2">Total<br>(c)=(a)+(b)</th>
            <th rowspan="2">Taux<br>(d)</th>
            <th rowspan="2">TVA Collectée<br>(e)=(a)x(d)</th>
                <tr>
                    <th>Taxable(a)</th>
                    <th>Non taxable(b)</th>
                </tr>
            
        </tr>
        <tr>
            <td style="text-align:left;padding-left:20px;padding-right:0px">1-Opérations à l'exportation:....................................</td>
            <td><?php echo $this->session->flashdata("expt");?></td>
            <td><?php echo $this->session->flashdata("expnt");?></td>
            <td><?php echo $this->session->flashdata("expt")+$this->session->flashdata("expnt");?></td>
            <td>0%</td>
            <td>\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\</td>
        </tr>
        <tr>
            <td style="text-align:left;padding-left:20px">2-Opération locales:<br>
            <ul style="list-style-type:none;">
                <li>-à des personnes assujeties:....................................</li>
                <li>-à des personnes non assujeties:....................................</li>
            </ul>
            
            </td>
            <td>
                <div class="container">
                    <div class="row">
                    
                    </div><br>
                    <div class="row">
                        <?php echo $this->session->flashdata("oppat");?>
                    </div>
                    <div class="row">
                        <?php echo $this->session->flashdata("oppnat");?>
                    </div>
                </div>
            </td>
            <td>
                <div class="container">
                    <div class="row">
                    
                    </div><br>
                    <div class="row">
                        <?php echo $this->session->flashdata("oppant");?>
                    </div>
                    <div class="row">
                        <?php echo $this->session->flashdata("oppnant");?>
                    </div>
                </div>
            </td>
            <td>
                <div class="container">
                    <div class="row">
                        
                    </div><br>
                    <div class="row">
                        <?php echo $this->session->flashdata("oppat")+$this->session->flashdata("oppant");?>                    
                    </div>
                    <div class="row">
                        <?php echo $this->session->flashdata("oppnat")+$this->session->flashdata("oppnant");?>
                    </div>
                </div>
            </td>
            <td>
                <div class="container">
                    <div class="row">
                        
                    </div><br>
                    <div class="row">
                        <?php echo $this->session->flashdata("taux1");?>
                        <datalist id="taux1">
                            <option value="0.2">
                            <option value="0.3">
                        </datalist>
                    </div>
                    <div class="row">
                        <?php echo $this->session->flashdata("taux2");?>
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
                        <?php echo $this->session->flashdata("oppat")*$this->session->flashdata("taux1");?>
                    </div>
                    <div class="row">
                        <?php echo $this->session->flashdata("oppnat")*$this->session->flashdata("taux2");?>
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <td style="text-align:left;padding-left:20px">3-Autres régularisation:....................................</td>
            <td><?php echo $this->session->flashdata("at");?></td>
            <td><?php echo $this->session->flashdata("ant");?></td>
            <td><?php echo $this->session->flashdata("at")+$this->session->flashdata("ant");?></td>
            <td><?php echo $this->session->flashdata("taux3");?></td>
            <datalist id="taux3">
                <option value="0.2">
                <option value="0.3">
            </datalist>
            <td><?php echo $this->session->flashdata("at")*$this->session->flashdata("taux3");?></td>
        </tr>
        <tr>
            <td style="text-align:left;padding-left:20px">4-TOTAL:....................................</td>
            <td><?php echo $this->session->flashdata("expt")+$this->session->flashdata("oppat")+$this->session->flashdata("oppnat")+$this->session->flashdata("at");?></td>
            <td><?php echo $this->session->flashdata("expnt")+$this->session->flashdata("oppant")+$this->session->flashdata("oppnant")+$this->session->flashdata("ant");?></td>
            <td><?php echo $this->session->flashdata("expt")+$this->session->flashdata("oppat")+$this->session->flashdata("oppnat")+$this->session->flashdata("at")+$this->session->flashdata("expnt")+$this->session->flashdata("oppant")+$this->session->flashdata("oppnant")+$this->session->flashdata("ant");?></td>
            <td>\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\</td>
            <td><?php echo $this->session->flashdata("totalC");?></td>
        </tr>
    </table><br>
    <table style="text-align:center">
        <tr>
            <th>DEDUCTIONS</h5></th>
            <th >Locaux <br>(f)</th>
            <th >Importations<br>(g)</th>
            <th >TOTAL<br>(h)=(f)+(g)</th>
            
        </tr>
        <tr>
            <td style="text-align:left;padding-left:20px">5-Taxe déductible:<br>
            <ul style="list-style-type:none;">
                <li>5. 1-sur biens d'équipements et immeubles:....................................</li>
                <li>5. 2-sur les autres biens:....................................</li>
                <li>5. 3-sur les services:....................................</li>
            </ul>
            </td>
            <td>
                <div class="container">
                    <div class="row">
                    
                    </div><br>
                    <div class="row">
                        <?php echo $this->session->flashdata("bl");?>
                    </div>
                    <div class="row">
                        <?php echo $this->session->flashdata("al");?>
                    </div>
                    <div class="row">
                        <?php echo $this->session->flashdata("sl");?>
                    </div>
                </div>
            </td>
            <td>
                <div class="container">
                    <div class="row">
                    
                    </div><br>
                    <div class="row">
                        <?php echo $this->session->flashdata("bi");?>
                    </div>
                    <div class="row">
                        <?php echo $this->session->flashdata("ai");?>
                    </div>
                    <div class="row">
                        <?php echo $this->session->flashdata("si");?>
                    </div>
                </div>
            </td>
            <td>
                <div class="container">
                    <div class="row">
                    
                    </div><br>
                    <div class="row">
                        <?php echo $this->session->flashdata("bl")+$this->session->flashdata("bi");?>
                    </div>
                    <div class="row">
                        <?php echo $this->session->flashdata("al")+$this->session->flashdata("ai");?>
                    </div>
                    <div class="row">
                        <?php echo $this->session->flashdata("sl")+$this->session->flashdata("si");?>
                    </div>
                </div>
            </td>
            
        </tr>
        <tr>
            <td style="text-align:left;padding-left:20px">6-Autres régularisation:....................................</td>
            <td><?php echo $this->session->flashdata("rl");?></td>
            <td><?php echo $this->session->flashdata("ri");?></td>
            <td><?php echo $this->session->flashdata("rl")+$this->session->flashdata("ri");?></td>
        </tr>
        <tr>
            <td style="text-align:left;padding-left:20px;border-right:none">7-Total de la colonne(h):....................................</td>
            <td style="border-left:none;border-right:none"></td>
            <td style="border-left:none;border-right:none"></td>
            <td><?php echo $this->session->flashdata("totalH");?></td>
            
        </tr>
        <tr>
            <td style="text-align:left;padding-left:20px;border-right:none"><form class="form-inline"><div class="form-group"><label>8-Prorata de déduction</label> <?php echo $this->session->flashdata("prorata");?>%TVA déductible de la période((7) x taux prorata)):....................................</div></form></td>
            <td style="border-left:none;border-right:none"></td>
            <td style="border-left:none;border-right:none"></td>
            <td><?php echo $this->session->flashdata("l8");?></td>
            
        </tr>
        <tr>
            <td style="text-align:left;padding-left:20px;border-right:none">9-Report de crédit de la période précédente:....................................</td>
            <td style="border-left:none;border-right:none"></td>
            <td style="border-left:none;border-right:none"></td>
            <td><?php echo $this->session->flashdata("rcp");?></td>
            
        </tr>
        <tr>
            <td style="text-align:left;padding-left:20px;border-right:none">10-TOTAL TVA DEDUCTIBLE (8) + (9):....................................</td>
            <td style="border-left:none;border-right:none"></td>
            <td style="border-left:none;border-right:none"></td>
            <td><?php echo $this->session->flashdata("totalD");?></td>
            
        </tr>
    </table><br>
    <table>
        <tr>
            <td style="text-align:left;padding-left:20px">11. Total TVA à verser [Total colonne(e)] - (10):</td>
            <td><?php echo $this->session->flashdata("tvav");?></td>
        </tr>
        <tr>
            <td style="text-align:left;padding-left:20px">12. Total de crédit de TVA (10) - [Total colonne (e)]:</td>
            <td><?php echo $this->session->flashdata("ctva");?></td>
        </tr>
        <tr>
            <td style="text-align:left;padding-left:20px">13. Remboursement de crédit de TVA demandé:</td>
            <td><?php echo $this->session->flashdata("rctva");?></td>
        </tr>
        <tr>
            <td style="text-align:left;padding-left:20px">14. Crédit de TVA reportable : (12) - (13):</td>
            <td><?php echo $this->session->flashdata("ctvar");?></td>
        </tr>
    </table><br> 
    <table style="text-align:center">
        <tr>
            <td colspan="5"><b>CADRE RESERVE A L'ADMINISTRATION</b></td>
        </tr>
        <tr>
            <td>Montant TVA</td>
            <td>Pénalité</td>
            <td>Total à payer</td>
            <td>Total versé</td>
            <td>Reste à recouvrer</td>
        </tr>
        <tr>
            <td><?php echo $this->session->flashdata("montant");?></td>
            <td><?php echo $this->session->flashdata("penalite");?></td>
            <td><?php echo $this->session->flashdata("montant")+$this->session->flashdata("penalite");?></td>
            <td><?php echo $this->session->flashdata("totalVerse");?></td>
            <td><?php echo ($this->session->flashdata("montant")+$this->session->flashdata("penalite"))-$this->session->flashdata("totalVerse");?></td>

        </tr>
    </table><br>
    <p>
        <div>
            <pre style="font-family: 'Times New Roman', 'Times', 'serif';">Crédit de taxe:                                                          Numéro récépissé:</pre><br>
        </div>
        <div>
            <span>Mode de paiement: (E)spèce</span> <br>
            <span style="padding-left:110px">(C)hèque N°</span><br>
            <span style="padding-left:110px">(D)épôt sans paiement</span>
        </div>
        <div>
            <pre style="font-family: 'Times New Roman', 'Times', 'serif';">Banque                                                                    N° compte bancaire:</pre>
        </div>
        
            
    </p>
</body>
</html>