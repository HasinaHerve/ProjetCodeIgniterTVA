<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Controlleur extends CI_Controller {
	public function index()
	{
		$this->load->view('menuPrincipal');
	}
	public function count()
	{
		$this->load->model('Model');
		$hist=$this->Model->count();
		echo $hist['hist'];
	}
	public function aide()
	{
		$this->load->view('aide');
	}
	public function menuPrincipal1()
	{
		$this->load->view('menuPrincipal1');
	}
	public function menuPrincipal2()
	{
		$this->load->view('menuPrincipal2');
	}
    public function acceuilAdmin()
	{
		$this->session->set_userdata('mC','');
		$this->session->set_flashdata('affSC','');
		$this->session->set_flashdata('affS','');
		$this->load->model('Model');
		$data=array();
		$count=$this->Model->count($this->session->userdata('idCentre'));
		$data['count']=$count;
		$pers=$this->Model->personnel($this->session->userdata('idCentre'));
		$contribuable=$this->Model->contribuable($this->session->userdata('idCentre'));
		$compteP=$this->Model->tousCP($this->session->userdata('idCentre'));
		$compteC=$this->Model->tousCC($this->session->userdata('idCentre'));
		$dec=$this->Model->decAff($this->session->userdata('idCentre'));
		$data['dec']=$dec;
		$data['compteC']=$compteC;
		$data['compteP']=$compteP;
		$data['pers']=$pers;
		$data['contribuable']=$contribuable;
		$this->load->view('acceuilAdmin',$data);
	}
	public function acceuilPers()
	{
		$this->session->set_userdata('mC','');
		$this->session->set_flashdata('affSC','');
		$this->session->set_flashdata('affS','');
		$this->load->model('Model');
		$data=array();
		$count=$this->Model->count1($this->session->userdata('idCentre'));
		$data['count']=$count;
		$contribuable=$this->Model->contribuable($this->session->userdata('idCentre'));
		$dec=$this->Model->decAff($this->session->userdata('idCentre'));
		$data['dec']=$dec;
		$data['contribuable']=$contribuable;
		$this->load->view('acceuilPers',$data);
	}
	public function personnel()
	{
		$this->session->set_userdata('mC','');
		$this->session->set_flashdata('titrePers','Enregistrement de personnel');
		$this->load->model('Model');
		$data=array();
		$count=$this->Model->count($this->session->userdata('idCentre'));
		$data['count']=$count;
		$centre=$this->Model->centre();
		$data['centre']=$centre;
		$this->load->view('personnel',$data);
	}
	public function contribuable()
	{
		$this->load->model('Model');
		$data=array();
		$count=$this->Model->count($this->session->userdata('idCentre'));
		$data['count']=$count;
		$centre=$this->Model->centre();
		$data['centre']=$centre;
		$this->session->set_flashdata('titreC','Enregistrement de contribuable');
		$this->load->view('contribuable',$data);
	}
	public function contribuableP()
	{
		$this->load->model('Model');
		$data=array();
		$count=$this->Model->count1($this->session->userdata('idCentre'));
		$data['count']=$count;
		$centre=$this->Model->centre();
		$data['centre']=$centre;
		$this->session->set_flashdata('titreC','Enregistrement de contribuable');
		$this->load->view('contribuableP',$data);
	}
	public function contribuable1()
	{
		$this->load->view('contribuable1');
	}
	public function validation()
	{
		$this->load->model('Model');
		$data=array();
		$count=$this->Model->count($this->session->userdata('idCentre'));
		$data['count']=$count;
		$this->session->set_userdata('nifMod',"");
		$this->session->set_userdata('numDec1',"");
		$this->session->set_userdata('mC','');
		$this->load->view('validation',$data);
	}
	public function validationP()
	{
		$this->load->model('Model');
		$data=array();
		$count=$this->Model->count1($this->session->userdata('idCentre'));
		$data['count']=$count;
		$this->session->set_userdata('nifMod',"");
		$this->session->set_userdata('numDec1',"");
		$this->session->set_userdata('mC','');
		$this->load->view('validationP',$data);
	}
	public function historique()
	{
		$this->load->model('Model');
		$data=array();
		$hist=$this->Model->historique($this->session->userdata('idCentre'));
		$count=$this->Model->count($this->session->userdata('idCentre'));
		$data['count']=$count;
		$data['hist']=$hist;
		$this->session->set_userdata('mC','');
		$this->load->view('historique',$data);
	}
	public function historiqueP()
	{
		$this->load->model('Model');
		$data=array();
		$hist=$this->Model->historique1($this->session->userdata('idCentre'));
		$count=$this->Model->count1($this->session->userdata('idCentre'));
		$data['count']=$count;
		$data['hist']=$hist;
		$this->session->set_userdata('mC','');
		$this->load->view('historiqueP',$data);
	}
	public function lu(){
		$this->load->model('Model');
		$data=array();
		$table=array();
		$hist=$this->Model->historique($this->session->userdata('idCentre'));
		$data['hist']=$hist;
		$this->session->set_userdata('mC','');
		foreach ($hist as $hist) {
			if(!$this->input->post($hist['numH'])==""){
				$table['lu']="oui";
				$this->Model->modifHist($hist['numH'],$table);
				redirect(base_url()."Controlleur/historique");
			}
		}
	}
	public function lu1(){
		$this->load->model('Model');
		$data=array();
		$table=array();
		$hist=$this->Model->historique1($this->session->userdata('idCentre'));
		$data['hist']=$hist;
		$this->session->set_userdata('mC','');
		foreach ($hist as $hist) {
			if(!$this->input->post($hist['numH'])==""){
				$table['lu']="oui";
				$this->Model->modifHist($hist['numH'],$table);
				redirect(base_url()."Controlleur/historiqueP");
			}
		}
	}
	public function envoyer(){
		$this->load->model('Model');
		$table=array();
		$table1=array();
		$dec=$this->Model->decAff($this->session->userdata('idCentre'));
		$this->session->set_userdata('mC','');
		foreach ($dec as $dec) {
			if(!$this->input->post($dec['numDec'])==""){
				$table['envoyer']="oui";
				$this->Model->modifDec($dec['numDec'],$table);
				$table1['action']="Le contribuable portant le nif ".$this->session->userdata('ut')." a demandé la validation de la déclaration numéro ".$dec['numDec'];
				$d1=new DateTime();
				$table1['date']=$d1->format('Y-m-d');
				$t=date("h:i:sa");
				$table1['heure']=(($t[0].$t[1])+1).substr($t,2);
				$table1['numActeur']=$this->session->userdata('ut');
				$table1['declaration']="oui";
				$this->Model->ajoutH($table1);
				redirect(base_url()."Controlleur/acceuilContribuable");
			}
		}
	}
	public function impression()
	{
		if($this->session->userdata('numDec1')=="" || !$this->session->userdata('modifDec')==="oui"){
			$this->load->view('impression1');
		}
		else{
			$this->load->model('Model');
			$dec=$this->Model->dec1($this->session->userdata('numDec1'));
			$this->session->set_flashdata('annee',$dec['annee']);
			$this->session->set_flashdata('mois',$dec['mois']);
			$this->session->set_flashdata('tvav',$dec['totalTVAV']);
			$this->session->set_flashdata('ctva',$dec['totalCTVA']);
			$this->session->set_flashdata('rctva',$dec['rembTVA']);
			$this->session->set_flashdata('ctvar',$dec['creditTVAR']);
			$this->session->set_flashdata("actimp",$this->Model->act1($this->session->userdata('numDec1'))["act"]);
			$this->session->set_flashdata('rs',$dec['rs']);
			$this->session->set_flashdata('nc',$dec['nc']);
			$this->session->set_flashdata('ad',$dec['ad']);
			if($dec['montantTVA']==""){
				$this->session->set_flashdata('montant',"0");
			}
			else{
				$this->session->set_flashdata('montant',$dec['montantTVA']);
			}
			if($dec['penalite']==""){
				$this->session->set_flashdata('penalite',"0");
			}
			else{
				$this->session->set_flashdata('penalite',$dec['penalite']);
			}
			if($dec['totalVerse']==""){
				$this->session->set_flashdata('totalVerse',"0");
			}
			else{
				$this->session->set_flashdata('totalVerse',$dec['totalVerse']);
			}
			

			$a=$this->Model->tvac($this->session->userdata('numDec1'));
			$this->session->set_flashdata('expt',$a['opExpt']);
			$this->session->set_flashdata('expnt',$a['opExpt']);
			$this->session->set_flashdata('oppat',$a['opLAT']);
			$this->session->set_flashdata('oppnat',$a['opLANT']);
			$this->session->set_flashdata('oppant',$a['opLNT']);
			$this->session->set_flashdata('oppnant',$a['opLNNT']);
			$this->session->set_flashdata('at',$a['autresT']);
			$this->session->set_flashdata('ant',$a['autresNT']);
			$this->session->set_flashdata('taux1',$a['taux1']);
			$this->session->set_flashdata('taux2',$a['taux2']);
			$this->session->set_flashdata('taux3',$a['taux3']);
			$this->session->set_flashdata('totalC',$a['totalC']);

			$b=$this->Model->deduction($this->session->userdata('numDec1'));
			$this->session->set_flashdata('bl',$b['taxeBL']);
			$this->session->set_flashdata('bi',$b['taxeBI']);
			$this->session->set_flashdata('al',$b['taxeAL']);
			$this->session->set_flashdata('ai',$b['taxeAI']);
			$this->session->set_flashdata('sl',$b['taxeSL']);
			$this->session->set_flashdata('si',$b['taxeSI']);
			$this->session->set_flashdata('rl',$b['autresL']);
			$this->session->set_flashdata('ri',$b['autresI']);
			$totalH=$this->session->flashdata("bl")+$this->session->flashdata("bi")+$this->session->flashdata("al")+$this->session->flashdata("ai")+$this->session->flashdata("sl")+$this->session->flashdata("si")+$this->session->flashdata("rl")+$this->session->flashdata("ri");
			$this->session->set_flashdata('totalH',$totalH);
			$this->session->set_flashdata('prorata',$b['prorataD']);
			$l8=$totalH*($b['prorataD']/100);
			$this->session->set_flashdata('l8',$l8);
			$this->session->set_flashdata('rcp',$b['rcp']);
			$this->session->set_flashdata('totalD',$b['totalD']);
			
			$this->session->set_flashdata('nifimp',$this->Model->nifDec($dec['numDec'])['nif']);
			$act=$this->Model->act1($this->session->userdata('numDec1'));
			$this->session->set_flashdata('act',$act['act']);
			$this->session->set_flashdata('bureaur',$this->Model->centreN1($this->Model->c($this->session->flashdata('nifimp'))['idCentre'])['nomCentre']);
			$this->load->view('impression');
		}
	}
	public function imprimer($numDec){
		$this->session->set_userdata('numDec1',$numDec);
		$this->load->model('Model');
		$dec=$this->Model->dec1($this->session->userdata('numDec1'));
		$this->session->set_flashdata('annee',$dec['annee']);
		$this->session->set_flashdata('mois',$dec['mois']);
		$this->session->set_flashdata('tvav',$dec['totalTVAV']);
		$this->session->set_flashdata('ctva',$dec['totalCTVA']);
		$this->session->set_flashdata('rctva',$dec['rembTVA']);
		$this->session->set_flashdata('ctvar',$dec['creditTVAR']);
		$this->session->set_flashdata("actimp",$this->Model->act1($this->session->userdata('numDec1'))["act"]);
		$this->session->set_flashdata('rs',$dec['rs']);
		$this->session->set_flashdata('nc',$dec['nc']);
		$this->session->set_flashdata('ad',$dec['ad']);
		if($dec['montantTVA']==""){
			$this->session->set_flashdata('montant',"0");
		}
		else{
			$this->session->set_flashdata('montant',$dec['montantTVA']);
		}
		if($dec['penalite']==""){
			$this->session->set_flashdata('penalite',"0");
		}
		else{
			$this->session->set_flashdata('penalite',$dec['penalite']);
		}
		if($dec['totalVerse']==""){
			$this->session->set_flashdata('totalVerse',"0");
		}
		else{
			$this->session->set_flashdata('totalVerse',$dec['totalVerse']);
		}
		

		$a=$this->Model->tvac($this->session->userdata('numDec1'));
		$this->session->set_flashdata('expt',$a['opExpt']);
		$this->session->set_flashdata('expnt',$a['opExpt']);
		$this->session->set_flashdata('oppat',$a['opLAT']);
		$this->session->set_flashdata('oppnat',$a['opLANT']);
		$this->session->set_flashdata('oppant',$a['opLNT']);
		$this->session->set_flashdata('oppnant',$a['opLNNT']);
		$this->session->set_flashdata('at',$a['autresT']);
		$this->session->set_flashdata('ant',$a['autresNT']);
		$this->session->set_flashdata('taux1',$a['taux1']);
		$this->session->set_flashdata('taux2',$a['taux2']);
		$this->session->set_flashdata('taux3',$a['taux3']);
		$this->session->set_flashdata('totalC',$a['totalC']);

		$b=$this->Model->deduction($this->session->userdata('numDec1'));
		$this->session->set_flashdata('bl',$b['taxeBL']);
		$this->session->set_flashdata('bi',$b['taxeBI']);
		$this->session->set_flashdata('al',$b['taxeAL']);
		$this->session->set_flashdata('ai',$b['taxeAI']);
		$this->session->set_flashdata('sl',$b['taxeSL']);
		$this->session->set_flashdata('si',$b['taxeSI']);
		$this->session->set_flashdata('rl',$b['autresL']);
		$this->session->set_flashdata('ri',$b['autresI']);
		$totalH=$this->session->flashdata("bl")+$this->session->flashdata("bi")+$this->session->flashdata("al")+$this->session->flashdata("ai")+$this->session->flashdata("sl")+$this->session->flashdata("si")+$this->session->flashdata("rl")+$this->session->flashdata("ri");
		$this->session->set_flashdata('totalH',$totalH);
		$this->session->set_flashdata('prorata',$b['prorataD']);
		$l8=$totalH*($b['prorataD']/100);
		$this->session->set_flashdata('l8',$l8);
		$this->session->set_flashdata('rcp',$b['rcp']);
		$this->session->set_flashdata('totalD',$b['totalD']);
		
		$this->session->set_flashdata('nifimp',$this->Model->nifDec($dec['numDec'])['nif']);
		$act=$this->Model->act1($this->session->userdata('numDec1'));
		$this->session->set_flashdata('act',$act['act']);
		$this->session->set_flashdata('bureaur',$this->Model->centreN1($this->Model->c($this->session->flashdata('nifimp'))['idCentre'])['nomCentre']);
		$this->load->view('impression');
	}
	public function tva()
	{
		$this->load->model('Model');
		$this->session->set_userdata('modifDec',"");
		
		$this->session->set_flashdata('annee',"");
		$this->session->set_flashdata('tvav',"");
		$this->session->set_flashdata('ctva',"");
		$this->session->set_flashdata('rctva',"");
		$this->session->set_flashdata('ctvar',"");
		$this->session->set_flashdata('rs',"");
		$this->session->set_flashdata('nc',"");
		$this->session->set_flashdata('ad',"");
		$this->session->set_flashdata('montant',"");
		$this->session->set_flashdata('penalite',"");
		$this->session->set_flashdata('totalVerse',"");

		$this->session->set_flashdata('expt',"");
		$this->session->set_flashdata('expnt',"");
		$this->session->set_flashdata('oppat',"");
		$this->session->set_flashdata('oppnat',"");
		$this->session->set_flashdata('oppant',"");
		$this->session->set_flashdata('oppnant',"");
		$this->session->set_flashdata('at',"");
		$this->session->set_flashdata('ant',"");
		$this->session->set_flashdata('taux1',"");
		$this->session->set_flashdata('taux2',"");
		$this->session->set_flashdata('taux3',"");
		$this->session->set_flashdata('totalC',"");

		$this->session->set_flashdata('bl',"");
		$this->session->set_flashdata('bi',"");
		$this->session->set_flashdata('al',"");
		$this->session->set_flashdata('ai',"");
		$this->session->set_flashdata('sl',"");
		$this->session->set_flashdata('si',"");
		$this->session->set_flashdata('rl',"");
		$this->session->set_flashdata('ri',"");
		$this->session->set_flashdata('totalH',"");
		$this->session->set_flashdata('prorata',"");
		$this->session->set_flashdata('l8',"");
		$this->session->set_flashdata('rcp',"");
		$this->session->set_flashdata('totalD',"");

		$data=array();
		$act=$this->Model->act($this->session->userdata('ut'));
		$data['act']=$act;
		$this->load->view('tva',$data);
	}
	public function tvaAdmin()
	{
		$this->load->model('Model');
		$data=array();
		$act=$this->Model->act($this->session->userdata('ut'));
		$data['act']=$act;
		if(!$this->session->userdata('fonction')==""){
			$this->load->view('validation',$data);
		}
		else{
			$count=$this->Model->count1($this->session->userdata('idCentre'));
			$data['count']=$count;
			$this->load->view('validationP',$data);
		}
		
	}
	public function acceuilContribuable()
	{
		$this->load->model('Model');
		$data=array();
		$dec=$this->Model->dec($this->session->userdata('ut'));
		$data['dec']=$dec;
		$this->load->view('acceuilContribuable',$data);
	}
	public function rechercher(){
		$this->load->model('Model');
		$this->form_validation->set_rules('d1','Date','required');
		$this->form_validation->set_rules('d2','Date','required');
		if($this->form_validation->run()==false){
			$this->session->set_flashdata('d1',$this->input->post('d1'));
			$this->session->set_flashdata('d2',$this->input->post('d2'));
			$data=array();
			$hist=$this->Model->historique($this->session->userdata('idCentre'));
			$count=$this->Model->count($this->session->userdata('idCentre'));
			$data['count']=$count;
			$data['hist']=$hist;
			$this->session->set_userdata('mC','');
			$this->load->view('historique',$data);
		}
		else{
			$this->session->set_flashdata('d1',$this->input->post('d1'));
			$this->session->set_flashdata('d2',$this->input->post('d2'));
			$data=array();
			$hist=$this->Model->rechH($this->session->userdata('idCentre'),$this->input->post('d1'),$this->input->post('d2'));
			$data['hist']=$hist;
			$count=$this->Model->count($this->session->userdata('idCentre'));
			$data['count']=$count;
			$this->session->set_userdata('mC','');
			$this->load->view('historique',$data);
		}
	}
	public function rechercher1(){
		$this->load->model('Model');
		$this->form_validation->set_rules('d1','Date','required');
		$this->form_validation->set_rules('d2','Date','required');
		if($this->form_validation->run()==false){
			$this->session->set_flashdata('d1',$this->input->post('d1'));
			$this->session->set_flashdata('d2',$this->input->post('d2'));
			$data=array();
			$hist=$this->Model->historique($this->session->userdata('idCentre'));
			$count=$this->Model->count1($this->session->userdata('idCentre'));
			$data['count']=$count;
			$data['hist']=$hist;
			$this->session->set_userdata('mC','');
			$this->load->view('historiqueP',$data);
		}
		else{
			$this->session->set_flashdata('d1',$this->input->post('d1'));
			$this->session->set_flashdata('d2',$this->input->post('d2'));
			$data=array();
			$hist=$this->Model->rechH1($this->session->userdata('idCentre'),$this->input->post('d1'),$this->input->post('d2'));
			$data['hist']=$hist;
			$count=$this->Model->count1($this->session->userdata('idCentre'));
			$data['count']=$count;
			$this->session->set_userdata('mC','');
			$this->load->view('historiqueP',$data);
		}
	}
	public function modifC()
	{
		$this->load->model('Model');
		$data=array();
		$c=$this->Model->tousC();
		foreach ($c as $c) {
			if(!$this->input->post("m".$c['nif'])==""){
				$this->session->set_userdata('nif',$c['nif']);
				$this->session->set_userdata('mC','oui');
				$ce=$this->Model->centreN1($c['idCentre']);
				$this->session->set_flashdata($ce['nomCentre'],'Selected');
				$centre=$this->Model->centre();
				$data['centre']=$centre;
				$contribuable=$this->Model->c($c['nif']);
				$this->session->set_flashdata('cinC',$contribuable['cinC']);
				$this->session->set_flashdata('nomC',$contribuable['nomC']);
				$this->session->set_flashdata('prenomsC',$contribuable['prenomsC']);
				$this->session->set_flashdata('dateNaissC',$contribuable['dateNaissC']);
				if($contribuable['typeC']=="personne physique"){
					$table['typeC']=$this->input->post('pp');
					$this->session->set_flashdata('pp','checked');
					$this->session->set_flashdata('pm','');
				}
				if($contribuable['typeC']=="personne morale"){
					$table['typeC']=$this->input->post('pm');
					$this->session->set_flashdata('pm','checked');
					$this->session->set_flashdata('pp','');
				}
				if($contribuable['sexeC']=="Homme"){
					$this->session->set_flashdata('hommeC',"Selected");
				}
				if($contribuable['sexeC']=="Femme"){
					$this->session->set_flashdata('femmeC',"Selected");
				}
				$this->session->set_flashdata($contribuable['sm'],"Selected");
				
				$this->session->set_flashdata('communeC',$contribuable['communeC']);
				$this->session->set_flashdata('adresseC',$contribuable['adresseC']);
				$this->session->set_flashdata('telC',$contribuable['telC']);
				if(!$this->session->userdata('fonction')==""){
					$count=$this->Model->count($this->session->userdata('idCentre'));
					$data['count']=$count;
					$this->load->view('modifContribuable',$data);
				}
				else{
					$count=$this->Model->count1($this->session->userdata('idCentre'));
					$data['count']=$count;
					$this->load->view('modifContribuableP',$data);
				}
				
			}
			if(!$this->input->post("s".$c['nif'])==""){
				$this->session->set_flashdata('alertSuppC','');
				$this->session->set_flashdata('affSC','afficher');
				$this->session->set_flashdata('affS','');
				$this->session->set_flashdata('cSuppr',"<span style='color:#006622'>".$c['nomC']." ".$c['prenomsC']."</span>, portant le nif <span style='color:#006622'>".$c['nif']."</span>");
				$this->session->set_flashdata('nifSupp',$c['nif']);
				$this->load->model('Model');
				if(!$this->session->userdata('fonction')==""){
					$data=array();
					$pers=$this->Model->personnel($this->session->userdata('idCentre'));
					$contribuable=$this->Model->contribuable($this->session->userdata('idCentre'));
					$compteP=$this->Model->tousCP($this->session->userdata('idCentre'));
					$compteC=$this->Model->tousCC($this->session->userdata('idCentre'));
					$data['compteC']=$compteC;
					$data['compteP']=$compteP;
					$data['pers']=$pers;
					$dec=$this->Model->decAff($this->session->userdata('idCentre'));
					$data['dec']=$dec;
					$data['contribuable']=$contribuable;
					$count=$this->Model->count($this->session->userdata('idCentre'));
					$data['count']=$count;
					$this->load->view('acceuilAdmin',$data);
					$this->session->set_flashdata('affMP',"");
					$this->session->set_flashdata('alertModifmdpp',"");
				}
				else{
					$data=array();
					$contribuable=$this->Model->contribuable($this->session->userdata('idCentre'));
					$data['contribuable']=$contribuable;
					$dec=$this->Model->decAff($this->session->userdata('idCentre'));
					$data['dec']=$dec;
					$count=$this->Model->count1($this->session->userdata('idCentre'));
					$data['count']=$count;
					$this->load->view('acceuilPers',$data);
					$this->session->set_flashdata('affMP',"");
					$this->session->set_flashdata('alertModifmdpp',"");
				}
			}
		}
	}
	public function ajoutPers()
	{
		//modification personnel
		$this->load->model('Model');
		if($this->session->flashdata('op')=='modif'){
			$this->form_validation->set_rules('nom','Nom','required');
			$this->form_validation->set_rules('prenoms','Prenoms','required');
			$this->form_validation->set_rules('dateNaiss','Date de naissance','required');
			$this->form_validation->set_rules('commune','Commune','required');
			$this->form_validation->set_rules('adresse','Adresse','required');
			$this->form_validation->set_rules('fonction','Fonction','required');
			$this->form_validation->set_rules('tel','Numéro téléphone','required');
			if($this->form_validation->run()==false){	
				$this->session->set_flashdata('titrePers','Modification de personnel');
				$this->load->model('Model');
				$data=array();
				$centre=$this->Model->centre();
				$data['centre']=$centre;
				$count=$this->Model->count($this->session->userdata('idCentre'));
				$data['count']=$count;
				$this->load->view('personnel',$data);
			}
			else{
				$im=$this->session->flashdata('im');
				$table['cinP']=$this->session->flashdata('cinP');
				$table['nomP']=$this->input->post('nom');
				$table['prenomsP']=$this->input->post('prenoms');
				$table['dateNaissP']=$this->input->post('dateNaiss');
				$table['sexeP']=$this->input->post('sexe');
				$table['sm']=$this->input->post('sm');
				$table['communeP']=$this->input->post('commune');
				$table['adresseP']=$this->input->post('adresse');
				$table['telP']=$this->input->post('tel');
				$table['fonction']=$this->input->post('fonction');
				$table['idCentre']=$this->Model->centreN($this->input->post('centre'))['idCentre'];
				$this->Model->modifPers($im,$table);

				$table1['action']="Le personnel portant l'im ".$this->session->userdata('ut')." a modifié le personnel portant l'im ".$im;
				$d1=new DateTime();
				$table1['date']=$d1->format('Y-m-d');
				$t=date("h:i:sa");
				$table1['heure']=(($t[0].$t[1])+1).substr($t,2);
				$table1['numActeur']=$this->session->userdata('ut');
				$this->Model->ajoutH($table1);

				$this->session->set_flashdata('alertModifPers','Modification effectué');
				$this->session->set_flashdata('alertSuppPers','');
				$data=array();
				$pers=$this->Model->personnel($this->session->userdata('idCentre'));
				$contribuable=$this->Model->contribuable($this->session->userdata('idCentre'));
				$compteP=$this->Model->tousCP($this->session->userdata('idCentre'));
				$compteC=$this->Model->tousCC($this->session->userdata('idCentre'));
				$data['compteC']=$compteC;
				$data['compteP']=$compteP;
				$data['pers']=$pers;
				$dec=$this->Model->decAff($this->session->userdata('idCentre'));
				$data['dec']=$dec;
				$data['contribuable']=$contribuable;
				$count=$this->Model->count($this->session->userdata('idCentre'));
				$data['count']=$count;
				$this->load->view('acceuilAdmin',$data);			
			}
			

		}
		//Ajout personnel
		else{
			if(!$this->input->post("enregistrer")==""){
				$this->form_validation->set_rules('im','Immatricule','required');
				$this->form_validation->set_rules('cin','Cin','required');
				$this->form_validation->set_rules('nom','Nom','required');
				$this->form_validation->set_rules('prenoms','Prenoms','required');
				$this->form_validation->set_rules('dateNaiss','Date de naissance','required');
				$this->form_validation->set_rules('commune','Commune','required');
				$this->form_validation->set_rules('adresse','Adresse','required');
				$this->form_validation->set_rules('fonction','Fonction','required');
				$this->form_validation->set_rules('tel','Numéro téléphone','required');
				if($this->form_validation->run()==false){
					$this->session->set_flashdata('im',$this->input->post('im'));
					$this->session->set_flashdata('cinP',$this->input->post('cin'));
					$this->session->set_flashdata('nomP',$this->input->post('nom'));
					$this->session->set_flashdata('prenomsP',$this->input->post('prenoms'));
					$this->session->set_flashdata('dateNaissP',$this->input->post('dateNaiss'));
					$this->session->set_flashdata($this->input->post('centre'),"Selected");
					if($this->input->post('sexe')=="Homme"){
						$this->session->set_flashdata('hommeP',"Selected");
					}
					if($this->input->post('sexe')=="Femme"){
						$this->session->set_flashdata('femmeP',"Selected");
					}
					if($this->input->post('sm')=="Célibataire"){
						$this->session->set_flashdata('celibataireP',"Selected");
					}
					if($this->input->post('sm')=="Marié(e)"){
						$this->session->set_flashdata('marieP',"Selected");
					}			
					if($this->input->post('sm')=="Divorvé(e)"){
						$this->session->set_flashdata('divorceP',"Selected");
					}
					if($this->input->post('sm')=="Veuf(ve)"){
						$this->session->set_flashdata('veufP',"Selected");
					}
					$this->session->set_flashdata($this->input->post('centre'),"Selected");
					$this->session->set_flashdata('communeP',$this->input->post('commune'));
					$this->session->set_flashdata('adresseP',$this->input->post('adresse'));
					$this->session->set_flashdata('telP',$this->input->post('tel'));
					$this->session->set_flashdata('fonctionP',$this->input->post('fonction'));
					$this->session->set_flashdata('titrePers','Enregistrement de personnel');
					
					$data=array();
					$centre=$this->Model->centre();
					$data['centre']=$centre;
					$count=$this->Model->count($this->session->userdata('idCentre'));
					$data['count']=$count;
					$this->load->view('personnel',$data);
				}
				else{
					
					$data=array();
					$pers=$this->Model->pers($this->input->post('im'));
					$p=$this->Model->pCin($this->input->post('cin'));
					if(!$pers==null){
						$this->session->set_flashdata('im',$this->input->post('im'));
						$this->session->set_flashdata('cinP',$this->input->post('cin'));
						$this->session->set_flashdata('nomP',$this->input->post('nom'));
						$this->session->set_flashdata('prenomsP',$this->input->post('prenoms'));
						$this->session->set_flashdata('dateNaissP',$this->input->post('dateNaiss'));
						$this->session->set_flashdata($this->input->post('centre'),"Selected");
						if($this->input->post('sexe')=="Homme"){
							$this->session->set_flashdata('hommeP',"Selected");
						}
						if($this->input->post('sexe')=="Femme"){
							$this->session->set_flashdata('femmeP',"Selected");
						}
						if($this->input->post('sm')=="Célibataire"){
							$this->session->set_flashdata('celibataireP',"Selected");
						}
						if($this->input->post('sm')=="Marié(e)"){
							$this->session->set_flashdata('marieP',"Selected");
						}			
						if($this->input->post('sm')=="Divorvé(e)"){
							$this->session->set_flashdata('divorceP',"Selected");
						}
						if($this->input->post('sm')=="Veuf(ve)"){
							$this->session->set_flashdata('veufP',"Selected");
						}
						$this->session->set_flashdata('communeP',$this->input->post('commune'));
						$this->session->set_flashdata('adresseP',$this->input->post('adresse'));
						$this->session->set_flashdata('telP',$this->input->post('tel'));
						$this->session->set_flashdata('fonctionP',$this->input->post('fonction'));
						$this->session->set_flashdata('alertErreurPers','Le personnel portant cette immatricule est déjà enregistré');
						$this->session->set_flashdata('alertAjoutPers','');
						$this->session->set_flashdata('titrePers','Enregistrement de personnel');
						$this->load->model('Model');
						$data=array();
						$centre=$this->Model->centre();
						$data['centre']=$centre;
						$count=$this->Model->count($this->session->userdata('idCentre'));
						$data['count']=$count;
						$this->load->view('personnel',$data);
					}
					elseif(!$p==null){
						$this->session->set_flashdata('im',$this->input->post('im'));
						$this->session->set_flashdata('cinP',$this->input->post('cin'));
						$this->session->set_flashdata('nomP',$this->input->post('nom'));
						$this->session->set_flashdata('prenomsP',$this->input->post('prenoms'));
						$this->session->set_flashdata('dateNaissP',$this->input->post('dateNaiss'));
						$this->session->set_flashdata($this->input->post('centre'),"Selected");
						if($this->input->post('sexe')=="Homme"){
							$this->session->set_flashdata('hommeP',"Selected");
						}
						if($this->input->post('sexe')=="Femme"){
							$this->session->set_flashdata('femmeP',"Selected");
						}
						if($this->input->post('sm')=="Célibataire"){
							$this->session->set_flashdata('celibataireP',"Selected");
						}
						if($this->input->post('sm')=="Marié(e)"){
							$this->session->set_flashdata('marieP',"Selected");
						}			
						if($this->input->post('sm')=="Divorvé(e)"){
							$this->session->set_flashdata('divorceP',"Selected");
						}
						if($this->input->post('sm')=="Veuf(ve)"){
							$this->session->set_flashdata('veufP',"Selected");
						}
						$this->session->set_flashdata('communeP',$this->input->post('commune'));
						$this->session->set_flashdata('adresseP',$this->input->post('adresse'));
						$this->session->set_flashdata('telP',$this->input->post('tel'));
						$this->session->set_flashdata('fonctionP',$this->input->post('fonction'));
						$this->session->set_flashdata('alertErreurPers','Le personnel portant ce numéro cin est déjà enregistré avec le numéro immatricule '.$p['im']);
						$this->session->set_flashdata('alertAjoutPers','');
						$this->session->set_flashdata('titrePers','Enregistrement de personnel');
						$this->load->model('Model');
						$data=array();
						$centre=$this->Model->centre();
						$data['centre']=$centre;
						$count=$this->Model->count($this->session->userdata('idCentre'));
						$data['count']=$count;
						$this->load->view('personnel',$data);	
					}
					else{
						$table['im']=$this->input->post('im');
						$table['cinP']=$this->input->post('cin');
						$table['nomP']=$this->input->post('nom');
						$table['prenomsP']=$this->input->post('prenoms');
						$table['dateNaissP']=$this->input->post('dateNaiss');
						$table['sexeP']=$this->input->post('sexe');
						$table['sm']=$this->input->post('sm');
						$table['communeP']=$this->input->post('commune');
						$table['adresseP']=$this->input->post('adresse');
						$table['telP']=$this->input->post('tel');
						$table['fonction']=$this->input->post('fonction');			
						$centre=$this->Model->centreN($this->input->post('centre'));
						$table['idCentre']=$centre['idCentre'];
						$this->Model->ajoutPers($table);

						$table1['action']="Le personnel portant l'im ".$this->session->userdata('ut')." a enregistré le personnel portant l'im ".$table['im'];
						$d1=new DateTime();
						$table1['date']=$d1->format('Y-m-d');
						$t=date("h:i:sa");
						$table1['heure']=(($t[0].$t[1])+1).substr($t,2);
						$table1['numActeur']=$this->session->userdata('ut');
						$this->Model->ajoutH($table1);

						$this->session->set_flashdata('im','');
						$this->session->set_flashdata('cinP','');
						$this->session->set_flashdata('nomP','');
						$this->session->set_flashdata('prenomsP','');
						$this->session->set_flashdata('dateNaissP','');
						$this->session->set_flashdata('hommeP',"Selected");
						$this->session->set_flashdata('femmeP',"");
						$this->session->set_flashdata('celibataireP',"Selected");
						$this->session->set_flashdata('marieP',"");			
						$this->session->set_flashdata('divorceP',"");
						$this->session->set_flashdata('veufP',"");
						$this->session->set_flashdata('communeP','');
						$this->session->set_flashdata('adresseP','');
						$this->session->set_flashdata('telP','');
						$this->session->set_flashdata('fonctionP','');
						$this->session->set_flashdata('alertAjoutPers','Enregistrement effectué');
						$this->session->set_flashdata('alertErreurPers','');
						$data=array();
						$centre=$this->Model->centre();
						$data['centre']=$centre;
						$count=$this->Model->count($this->session->userdata('idCentre'));
						$data['count']=$count;
						$this->load->view('personnel',$data);
					}
						
				}
			}
		}
		
		
	}
	public function modifPers(){
		$this->load->model('Model');
		$data=array();
		$pers=$this->Model->tousPers();
		foreach ($pers as $pers) {
			if(!$this->input->post("m".$pers['im'])==""){
				$this->session->set_flashdata('op','modif');
				$this->session->set_flashdata('titrePers','Modification de personnel');
				$this->session->set_flashdata('im',$pers['im']);
				$this->session->set_flashdata('cinP',$pers['cinP']);
				$this->session->set_flashdata('nomP',$pers['nomP']);
				$this->session->set_flashdata('prenomsP',$pers['prenomsP']);
				$this->session->set_flashdata('dateNaissP',$pers['dateNaissP']);
				if($pers['sexeP']=="Homme"){
					$this->session->set_flashdata('hommeP',"Selected");
				}
				if($pers['sexeP']=="Femme"){
					$this->session->set_flashdata('femmeP',"Selected");
				}
				if($pers['sm']=="Célibataire"){
					$this->session->set_flashdata('celibataireP',"Selected");
				}
				if($pers['sm']=="Marié(e)"){
					$this->session->set_flashdata('marieP',"Selected");
				}			
				if($pers['sm']=="Divorvé(e)"){
					$this->session->set_flashdata('divorceP',"Selected");
				}
				if($pers['sm']=="Veuf(ve)"){
					$this->session->set_flashdata('veufP',"Selected");
				}
				$this->session->set_flashdata('communeP',$pers['communeP']);
				$this->session->set_flashdata('adresseP',$pers['adresseP']);
				$this->session->set_flashdata('telP',$pers['telP']);
				$this->session->set_flashdata('fonctionP',$pers['fonction']);				
				$centre=$this->Model->centreN1($pers['idCentre']);
				$this->session->set_flashdata($centre['nomCentre'],'Selected');
				$this->session->set_flashdata('disabled','disabled');
				$data=array(); 
				$centre=$this->Model->centre();
				$data['centre']=$centre;
				$count=$this->Model->count($this->session->userdata('idCentre'));
				$data['count']=$count;
				$this->load->view('personnel',$data);
				$this->session->set_flashdata('disabled','disabled');

			}
			if(!$this->input->post("s".$pers['im'])==""){
				$this->session->set_flashdata('alertSuppPers','');
				$this->session->set_flashdata('affS','afficher');
				$this->session->set_flashdata('affSC','');
				$this->session->set_flashdata('persSuppr',"<span style='color:#006622'>".$pers['nomP']." ".$pers['prenomsP']."</span>, portant l'immatricule numéro <span style='color:#006622'>".$pers['im']."</span>");
				$this->session->set_flashdata('imSupp',$pers['im']);
				$this->load->model('Model');
				$data=array();
				$pers=$this->Model->personnel($this->session->userdata('idCentre'));
				$contribuable=$this->Model->contribuable($this->session->userdata('idCentre'));
				$compteP=$this->Model->tousCP($this->session->userdata('idCentre'));
				$compteC=$this->Model->tousCC($this->session->userdata('idCentre'));
				$data['compteC']=$compteC;
				$data['compteP']=$compteP;
				$data['pers']=$pers;
				$dec=$this->Model->decAff($this->session->userdata('idCentre'));
				$data['dec']=$dec;
				$data['contribuable']=$contribuable;
				$count=$this->Model->count($this->session->userdata('idCentre'));
				$data['count']=$count;
				$this->load->view('acceuilAdmin',$data);
			}
		}
	}
	public function supprimerPers(){
		$this->load->model('Model');
		$this->Model->suppCompteP($this->session->flashdata('imSupp'));
		$this->Model->suppPers($this->session->flashdata('imSupp'));
		
		$table1['action']="Le personnel portant l'im ".$this->session->userdata('ut')." a supprimé le personnel portant l'im ".$this->session->flashdata('imSupp');
		$d1=new DateTime();
		$table1['date']=$d1->format('Y-m-d');
		$t=date("h:i:sa");
		$table1['heure']=(($t[0].$t[1])+1).substr($t,2);
		$table1['numActeur']=$this->session->userdata('ut');
		$this->Model->ajoutH($table1);

		$this->session->set_flashdata('alertSuppPers','Le personnel portant l\'im '.$this->session->flashdata('imSupp').' a été supprimer');
		$this->session->set_flashdata('alertModifPers','');
		$this->session->set_flashdata('affS','');
		$data=array();
		$pers=$this->Model->personnel($this->session->userdata('idCentre'));
		$contribuable=$this->Model->contribuable($this->session->userdata('idCentre'));
		$compteP=$this->Model->tousCP($this->session->userdata('idCentre'));
		$compteC=$this->Model->tousCC($this->session->userdata('idCentre'));
		$data['compteC']=$compteC;
		$data['compteP']=$compteP;
		$data['pers']=$pers;
		$dec=$this->Model->decAff($this->session->userdata('idCentre'));
		$data['dec']=$dec;
		$data['contribuable']=$contribuable;
		$count=$this->Model->count($this->session->userdata('idCentre'));
		$data['count']=$count;
		$this->load->view('acceuilAdmin',$data);
	}
	public function supprimerC(){
		$this->load->model('Model');
		$this->Model->suppCompteC($this->session->flashdata('nifSupp'));
		$this->Model->suppAct($this->session->flashdata('nifSupp'));
		$this->Model->suppC($this->session->flashdata('nifSupp'));
		$this->session->set_flashdata('alertSuppC','Le contribuable portant le nif '.$this->session->flashdata('nifSupp').' a été supprimer');
		
		$table1['action']="Le personnel portant l'im ".$this->session->userdata('ut')." a supprimé le contribuable portant le nif ".$this->session->flashdata('nifSupp');
		$d1=new DateTime();
		$table1['date']=$d1->format('Y-m-d');
		$t=date("h:i:sa");
		$table1['heure']=(($t[0].$t[1])+1).substr($t,2);
		$table1['numActeur']=$this->session->userdata('ut');
		$this->Model->ajoutH($table1);

		$this->session->set_flashdata('alertModifC','');
		$this->session->set_flashdata('affS','');
		$this->session->set_flashdata('affSC','');
		if(!$this->session->userdata('fonction')==""){
			$data=array();
			$pers=$this->Model->personnel($this->session->userdata('idCentre'));
			$contribuable=$this->Model->contribuable($this->session->userdata('idCentre'));
			$compteP=$this->Model->tousCP($this->session->userdata('idCentre'));
			$compteC=$this->Model->tousCC($this->session->userdata('idCentre'));
			$data['compteC']=$compteC;
			$data['compteP']=$compteP;
			$data['pers']=$pers;
			$dec=$this->Model->decAff($this->session->userdata('idCentre'));
			$data['dec']=$dec;
			$data['contribuable']=$contribuable;
			$count=$this->Model->count($this->session->userdata('idCentre'));
			$data['count']=$count;
			$this->load->view('acceuilAdmin',$data);
			$this->session->set_flashdata('affMP',"");
			$this->session->set_flashdata('alertModifmdpp',"");
		}
		else{
			$data=array();
			$contribuable=$this->Model->contribuable($this->session->userdata('idCentre'));
			$data['contribuable']=$contribuable;
			$dec=$this->Model->tousDec();
			$data['dec']=$dec;
			$count=$this->Model->count1($this->session->userdata('idCentre'));
			$data['count']=$count;
			$this->load->view('acceuilPers',$data);
			$this->session->set_flashdata('affMP',"");
			$this->session->set_flashdata('alertModifmdpp',"");
		}
	}
	
	public function ajoutC(){
		$this->load->model('Model');
		$table=array();
		if(!$this->input->post('suivant')==""){		
			$this->session->set_flashdata('type','');
			$this->form_validation->set_rules('cin','Cin','required');
			$this->form_validation->set_rules('nom','Nom','required');
			$this->form_validation->set_rules('prenoms','Prenoms','required');
			$this->form_validation->set_rules('dateNaiss','Date de naissance','required');
			$this->form_validation->set_rules('commune','Commune','required');
			$this->form_validation->set_rules('adresse','Adresse','required');
			$this->form_validation->set_rules('tel','Numéro téléphone','required');
			if($this->input->post('pp')=="" && $this->input->post('pm')==""){
				$this->session->set_flashdata('type','Personne physique ou morale(à cocher)');
				$this->session->set_flashdata('im',$this->input->post('im'));
				$this->session->set_flashdata('cinC',$this->input->post('cin'));
				$this->session->set_flashdata('nomC',$this->input->post('nom'));
				$this->session->set_flashdata('prenomsC',$this->input->post('prenoms'));
				$this->session->set_flashdata('dateNaissC',$this->input->post('dateNaiss'));
				$this->session->set_flashdata($this->input->post('centre'),"Selected");
				if($this->input->post('pp')=="personne physique"){
					$this->session->set_flashdata('pp','checked');
					$this->session->set_flashdata('pm','');
				}
				if($this->input->post('pm')=="personne morale"){
					$this->session->set_flashdata('pm','checked');
					$this->session->set_flashdata('pp','');
				}
				if($this->input->post('sexe')=="Homme"){
					$this->session->set_flashdata('hommeC',"Selected");
				}
				if($this->input->post('sexe')=="Femme"){
					$this->session->set_flashdata('femmeC',"Selected");
				}
				if($this->input->post('sm')=="Célibataire"){
					$this->session->set_flashdata('celibataireC',"Selected");
				}
				if($this->input->post('sm')=="Marié(e)"){
					$this->session->set_flashdata('marieC',"Selected");
				}			
				if($this->input->post('sm')=="Divorvé(e)"){
					$this->session->set_flashdata('divorceC',"Selected");
				}
				if($this->input->post('sm')=="Veuf(ve)"){
					$this->session->set_flashdata('veufC',"Selected");
				}
				$this->session->set_flashdata('communeC',$this->input->post('commune'));
				$this->session->set_flashdata('adresseC',$this->input->post('adresse'));
				$this->session->set_flashdata('telC',$this->input->post('tel'));
				$data=array();
				$centre=$this->Model->centre();
				$data['centre']=$centre;
				if(!$this->session->userdata('fonction')==""){
					$count=$this->Model->count($this->session->userdata('idCentre'));
					$data['count']=$count;
					$this->load->view('contribuable',$data);
				}
				else{
					$count=$this->Model->count1($this->session->userdata('idCentre'));
					$data['count']=$count;
					$this->load->view('contribuableP',$data);
				}
			}
			elseif($this->form_validation->run()==false){ 	
				$this->session->set_flashdata('cinC',$this->input->post('cin'));
				$this->session->set_flashdata('nomC',$this->input->post('nom'));
				$this->session->set_flashdata('prenomsC',$this->input->post('prenoms'));
				$this->session->set_flashdata('dateNaissC',$this->input->post('dateNaiss'));
				$this->session->set_flashdata($this->input->post('centre'),"Selected");
				if($this->input->post('pp')=="personne physique"){
					$this->session->set_flashdata('pp','checked');
					$this->session->set_flashdata('pm','');
				}
				if($this->input->post('pm')=="personne morale"){
					$this->session->set_flashdata('pm','checked');
					$this->session->set_flashdata('pp','');
				}
				if($this->input->post('sexe')=="Homme"){
					$this->session->set_flashdata('hommeC',"Selected");
				}
				if($this->input->post('sexe')=="Femme"){
					$this->session->set_flashdata('femmeC',"Selected");
				}
				if($this->input->post('sm')=="Célibataire"){
					$this->session->set_flashdata('celibataireC',"Selected");
				}
				if($this->input->post('sm')=="Marié(e)"){
					$this->session->set_flashdata('marieC',"Selected");
				}			
				if($this->input->post('sm')=="Divorvé(e)"){
					$this->session->set_flashdata('divorceC',"Selected");
				}
				if($this->input->post('sm')=="Veuf(ve)"){
					$this->session->set_flashdata('veufC',"Selected");
				}
				$this->session->set_flashdata('communeC',$this->input->post('commune'));
				$this->session->set_flashdata('adresseC',$this->input->post('adresse'));
				$this->session->set_flashdata('telC',$this->input->post('tel'));
				$data=array();
				$centre=$this->Model->centre();
				$data['centre']=$centre;
				if(!$this->session->userdata('fonction')==""){
					$count=$this->Model->count($this->session->userdata('idCentre'));
					$data['count']=$count;
					$this->load->view('contribuable',$data);
				}
				else{
					$count=$this->Model->count1($this->session->userdata('idCentre'));
					$data['count']=$count;
					$this->load->view('contribuableP',$data);
				}
			}
			else{
				$this->session->set_flashdata('prev','');
				$this->session->set_flashdata('next','oui');
				$this->session->set_flashdata('cinC',$this->input->post('cin'));
				$this->session->set_flashdata('nomC',$this->input->post('nom'));
				$this->session->set_flashdata('prenomsC',$this->input->post('prenoms'));
				$this->session->set_flashdata('dateNaissC',$this->input->post('dateNaiss'));
				$this->session->set_flashdata($this->input->post('centre'),"Selected");
				if($this->input->post('pp')=="personne physique"){
					$table['typeC']=$this->input->post('pp');
					$this->session->set_flashdata('pp','checked');
					$this->session->set_flashdata('pm','');
				}
				if($this->input->post('pm')=="personne morale"){
					$table['typeC']=$this->input->post('pm');
					$this->session->set_flashdata('pm','checked');
					$this->session->set_flashdata('pp','');
				}
				if($this->input->post('sexe')=="Homme"){
					$this->session->set_flashdata('hommeP',"Selected");
				}
				if($this->input->post('sexe')=="Femme"){
					$this->session->set_flashdata('femmeP',"Selected");
				}
				if($this->input->post('sm')=="Célibataire"){
					$this->session->set_flashdata('celibataireP',"Selected");
				}
				if($this->input->post('sm')=="Marié(e)"){
					$this->session->set_flashdata('marieP',"Selected");
				}			
				if($this->input->post('sm')=="Divorvé(e)"){
					$this->session->set_flashdata('divorceP',"Selected");
				}
				if($this->input->post('sm')=="Veuf(ve)"){
					$this->session->set_flashdata('veufP',"Selected");
				}
				$this->session->set_flashdata('communeC',$this->input->post('commune'));
				$this->session->set_flashdata('adresseC',$this->input->post('adresse'));
				$this->session->set_flashdata('telC',$this->input->post('tel'));
				//ajoutC
				
				$table['cinC']=$this->input->post('cin');
				$table['nomC']=$this->input->post('nom');
				$table['prenomsC']=$this->input->post('prenoms');
				$table['dateNaissC']=$this->input->post('dateNaiss');
				$table['sexeC']=$this->input->post('sexe');
				$table['sm']=$this->input->post('sm');
				$table['communeC']=$this->input->post('commune');
				$table['adresseC']=$this->input->post('adresse');
				$table['telC']=$this->input->post('tel');
				$d=new DateTime();
				$table['dateE']=$d->format('Y-m-d');			
				$centre=$this->Model->centreN($this->input->post('centre'));
				$table['idCentre']=$centre['idCentre'];
				$a=$table['idCentre'];
				$data=array();
				$centre=$this->Model->centre();
				$data['centre']=$centre;
				if($this->session->userdata('mC')=="oui"){
					$this->Model->modifC($this->session->userdata('nif'),$table);
					$ac=$this->Model->act($this->session->userdata('nif'));
					$data['ac']=$ac;
					if(!$this->session->userdata('fonction')==""){
						$count=$this->Model->count($this->session->userdata('idCentre'));
						$data['count']=$count;
						$this->load->view('modifContribuable',$data);
					}
					else{
						$count=$this->Model->count1($this->session->userdata('idCentre'));
						$data['count']=$count;
						$this->load->view('modifContribuableP',$data);
					}
					
				}
				else{
					
					$contribuable=$this->Model->cCin($table['cinC']);
					if(!$contribuable==null){
						$this->session->set_flashdata('prev','oui');
						$this->session->set_flashdata('next','');
						$this->session->set_flashdata('alertErreurC','le numéro cin est déjà lié à un contribuable avec le numéro d\'identification fiscal '.$contribuable['nif']);
						$data=array();
						$centre=$this->Model->centre();
						$data['centre']=$centre;
						if(!$this->session->userdata('fonction')==""){
							$count=$this->Model->count($this->session->userdata('idCentre'));
							$data['count']=$count;
							$this->load->view('contribuable',$data);
						}
						else{
							$count=$this->Model->count1($this->session->userdata('idCentre'));
							$data['count']=$count;
							$this->load->view('contribuableP',$data);
						}
						
						$this->session->set_flashdata('alertErreurC','');
					}
					else{
						$c=$this->Model->dernierC($table['idCentre']);
						if($c==null){
							$table['nif']="$a"."0000000";
						}
						else{
							$table['nif']=$c['nif']+1;
						}
						$this->Model->ajoutC($table);
						$this->session->set_userdata('nif',$table['nif']);
						$ac=$this->Model->act($this->session->userdata('nif'));
						$data['ac']=$ac;
						if(!$this->session->userdata('fonction')==""){
							$count=$this->Model->count($this->session->userdata('idCentre'));
							$data['count']=$count;
							$this->load->view('contribuable',$data);
						}
						else{
							$count=$this->Model->count1($this->session->userdata('idCentre'));
							$data['count']=$count;
							$this->load->view('contribuableP',$data);
						}
					}
					
				}
				
			}
		}
		if(!$this->input->post('prev')==""){
			if(!$this->session->userdata('mC')==''){
				$this->session->set_flashdata('prev','oui');
				$this->session->set_flashdata('next','');
				$this->session->set_flashdata('actionAct','');
				$data=array();
				$centre=$this->Model->centre();
				$data['centre']=$centre;
				$contribuable=$this->Model->c($this->session->userdata('nif'));
				$this->session->set_flashdata('cinC',$contribuable['cinC']);
				$this->session->set_flashdata('nomC',$contribuable['nomC']);
				$this->session->set_flashdata('prenomsC',$contribuable['prenomsC']);
				$this->session->set_flashdata('dateNaissC',$contribuable['dateNaissC']);
				$ce=$this->Model->centreN1($contribuable['idCentre']);
				$this->session->set_flashdata($ce['nomCentre'],'Selected');
				if($contribuable['typeC']=="personne physique"){
					$this->session->set_flashdata('pp','checked');
					$this->session->set_flashdata('pm','');
				}
				if($contribuable['typeC']=="personne morale"){
					$this->session->set_flashdata('pm','checked');
					$this->session->set_flashdata('pp','');
				}
				if($contribuable['sexeC']=="Homme"){
					$this->session->set_flashdata('hommeC',"Selected");
				}
				if($contribuable['sexeC']=="Femme"){
					$this->session->set_flashdata('femmeC',"Selected");
				}
				$this->session->set_flashdata($contribuable['sm'],"Selected");
				$this->session->set_flashdata('communeC',$contribuable['communeC']);
				$this->session->set_flashdata('adresseC',$contribuable['adresseC']);
				$this->session->set_flashdata('telC',$contribuable['telC']);
				if(!$this->session->userdata('fonction')==""){
					$count=$this->Model->count($this->session->userdata('idCentre'));
					$data['count']=$count;
					$this->load->view('modifContribuable',$data);
				}
				else{
					$count=$this->Model->count1($this->session->userdata('idCentre'));
					$data['count']=$count;
					$this->load->view('modifContribuableP',$data);
				}

			}
			else{
				$this->session->set_flashdata('prev','oui');
				$this->session->set_flashdata('next','');
				$this->session->set_flashdata('actionAct','');
				$data=array();
				$centre=$this->Model->centre();
				$data['centre']=$centre;
				$contribuable=$this->Model->c($this->session->userdata('nif'));
				$this->session->set_flashdata('cinC',$contribuable['cinC']);
				$this->session->set_flashdata('nomC',$contribuable['nomC']);
				$this->session->set_flashdata('prenomsC',$contribuable['prenomsC']);
				$this->session->set_flashdata('dateNaissC',$contribuable['dateNaissC']);
				$ce=$this->Model->centreN1($contribuable['idCentre']);
				$this->session->set_flashdata($ce['nomCentre'],'Selected');
				$this->session->set_flashdata($this->input->post('centre'),"Selected");
				if($contribuable['typeC']=="personne physique"){
					$this->session->set_flashdata('pp','checked');
					$this->session->set_flashdata('pm','');
				}
				if($contribuable['typeC']=="personne morale"){
					$this->session->set_flashdata('pm','checked');
					$this->session->set_flashdata('pp','');
				}
				if($contribuable['sexeC']=="Homme"){
					$this->session->set_flashdata('hommeC',"Selected");
				}
				if($contribuable['sexeC']=="Femme"){
					$this->session->set_flashdata('femmeC',"Selected");
				}
				$this->session->set_flashdata($contribuable['sm'],"Selected");
				$this->session->set_flashdata('communeC',$contribuable['communeC']);
				$this->session->set_flashdata('adresseC',$contribuable['adresseC']);
				$this->session->set_flashdata('telC',$contribuable['telC']);
				$this->Model->suppAct($this->session->userdata('nif'));
				$this->Model->suppC($this->session->userdata('nif'));
				if(!$this->session->userdata('fonction')==""){
					$count=$this->Model->count($this->session->userdata('idCentre'));
					$data['count']=$count;
					$this->load->view('contribuable',$data);
				}
				else{
					$count=$this->Model->count1($this->session->userdata('idCentre'));
					$data['count']=$count;
					$this->load->view('contribuableP',$data);
				}
			}
			
		}
		if(!$this->input->post('enreA')==""){
			$this->form_validation->set_rules('act','Activité','required');
			$this->form_validation->set_rules('pact','Précision sur l\'activité','required');
			$this->form_validation->set_rules('com','Commune','required');
			$this->form_validation->set_rules('ad','Adresse','required');
			if($this->form_validation->run()==false){
				$this->session->set_flashdata('act',$this->input->post('act'));
				$this->session->set_flashdata('pact',$this->input->post('pact'));
				$this->session->set_flashdata('com',$this->input->post('com'));
				$this->session->set_flashdata('ad',$this->input->post('ad'));
				if($this->input->post('exp')=="oui"){
					$this->session->set_flashdata('ouie',"Selected");
				}
				if($this->input->post('exp')=="non"){
					$this->session->set_flashdata('none',"Selected");
				}
				if($this->input->post('imp')=="oui"){
					$this->session->set_flashdata('ouii',"Selected");
				}
				if($this->input->post('imp')=="non"){
					$this->session->set_flashdata('noni',"Selected");
				}
				$this->session->set_flashdata('next','oui');
				$this->session->set_flashdata('prev','');
				$data=array();
				$centre=$this->Model->centre();
				$data['centre']=$centre;
				$ac=$this->Model->act($this->session->userdata('nif'));
				$data['ac']=$ac;
				if(!$this->session->userdata('mC')==''){
					$count=$this->Model->count($this->session->userdata('idCentre'));
					$data['count']=$count;
					$this->load->view('modifContribuable',$data);
				}
				else{
					if(!$this->session->userdata('fonction')==""){
						$count=$this->Model->count($this->session->userdata('idCentre'));
						$data['count']=$count;
						$this->load->view('contribuable',$data);
					}
					else{
						$count=$this->Model->count1($this->session->userdata('idCentre'));
						$data['count']=$count;
						$this->load->view('contribuableP',$data);
					}
				}
				
			}
			else{
				$table=array();
				$table['act']=$this->input->post('act');
				$table['pact']=$this->input->post('pact');
				$table['commune']=$this->input->post('com');
				$table['adresse']=$this->input->post('ad');
				$table['imp']=$this->input->post('imp');
				$table['exp']=$this->input->post('exp');
				$table['nif']=$this->session->userdata('nif');
				if(!$this->session->flashdata('actionAct')==""){
					$this->Model->modifAct($this->session->flashdata('numAct'),$table);

					$table1['action']="Le personnel portant l'im ".$this->session->userdata('ut')." a modifié l'un des activités du contribuable portant le nif ".$this->session->userdata('nif');
					$d1=new DateTime();
					$table1['date']=$d1->format('Y-m-d');
					$t=date("h:i:sa");
					$table1['heure']=(($t[0].$t[1])+1).substr($t,2);
					$table1['numActeur']=$this->session->userdata('ut');
					$this->Model->ajoutH($table1);

					$this->session->set_flashdata('act','');
					$this->session->set_flashdata('pact','');
					$this->session->set_flashdata('com','');
					$this->session->set_flashdata('ad','');
					$this->session->set_flashdata('ouie',"Selected");
					$this->session->set_flashdata('ouii',"Selected");
				}
				else{
					$this->Model->ajoutAct($table);
					
					$table1['action']="Le personnel portant l'im ".$this->session->userdata('ut')." a ajouté un activités au contribuable portant le nif ".$this->session->userdata('nif');
					$d1=new DateTime();
					$table1['date']=$d1->format('Y-m-d');
					$t=date("h:i:sa");
					$table1['heure']=(($t[0].$t[1])+1).substr($t,2);
					$table1['numActeur']=$this->session->userdata('ut');
					$this->Model->ajoutH($table1);
				}
				$this->session->set_flashdata('next','oui');
				$this->session->set_flashdata('prev','');
				$data=array();
				$ac=$this->Model->act($this->session->userdata('nif'));
				$data['ac']=$ac;
				if(!$this->session->userdata('mC')==''){
					if(!$this->session->userdata('fonction')==""){
						$count=$this->Model->count($this->session->userdata('idCentre'));
						$data['count']=$count;
						$this->load->view('modifContribuable',$data);
					}
					else{
						$count=$this->Model->count1($this->session->userdata('idCentre'));
						$data['count']=$count;
						$this->load->view('modifContribuableP',$data);
					}
				}
				else{
					if(!$this->session->userdata('fonction')==""){
						$count=$this->Model->count($this->session->userdata('idCentre'));
						$data['count']=$count;
						$this->load->view('contribuable',$data);
					}
					else{
						$count=$this->Model->count1($this->session->userdata('idCentre'));
						$data['count']=$count;
						$this->load->view('contribuableP',$data);
					}
				}
			}
		}
		if(!$this->input->post('terminer')==""){
			if(!$this->session->userdata('mC')==''){
				$this->session->set_flashdata('alertModifC','Modification effectuée');

				$table1['action']="Le personnel portant l'im ".$this->session->userdata('ut')." a modifié le contribuable portant le nif ".$this->session->userdata('nif');
				$d1=new DateTime();
				$table1['date']=$d1->format('Y-m-d');
				$t=date("h:i:sa");
				$table1['heure']=(($t[0].$t[1])+1).substr($t,2);
				$table1['numActeur']=$this->session->userdata('ut');
				$this->Model->ajoutH($table1);

				$this->load->model('Model');
				if(!$this->session->userdata('fonction')==""){
					$this->session->set_userdata('mC','');
					$this->session->set_flashdata('affSC','');
					$this->session->set_flashdata('affS','');
					$this->load->model('Model');
					$data=array();
					$pers=$this->Model->personnel($this->session->userdata('idCentre'));
					$contribuable=$this->Model->contribuable($this->session->userdata('idCentre'));
					$compteP=$this->Model->tousCP($this->session->userdata('idCentre'));
					$compteC=$this->Model->tousCC($this->session->userdata('idCentre'));
					$data['compteC']=$compteC;
					$data['compteP']=$compteP;
					$data['pers']=$pers;
					$dec=$this->Model->decAff($this->session->userdata('idCentre'));
					$data['dec']=$dec;
					$data['contribuable']=$contribuable;
					$count=$this->Model->count($this->session->userdata('idCentre'));
					$data['count']=$count;
					$this->load->view('acceuilAdmin',$data);
					$this->session->set_flashdata('connexion','');
					$this->session->set_userdata('mC',"");
				}
				else{
					$data=array();
					$contribuable=$this->Model->contribuable($this->session->userdata('idCentre'));
					$data['contribuable']=$contribuable;
					$dec=$this->Model->decAff($this->session->userdata('idCentre'));
					$data['dec']=$dec;
					$count=$this->Model->count1($this->session->userdata('idCentre'));
					$data['count']=$count;
					$this->load->view('acceuilPers',$data);
					$this->session->set_flashdata('connexion','');
					$this->session->set_userdata('mC',"");
				}
			}
			else{
				$this->session->set_flashdata('terminer',"afficher");
				$contribuable=$this->Model->c($this->session->userdata('nif'));
				
				$table1['action']="Le personnel portant l'im ".$this->session->userdata('ut')." a enregistré le contribuable portant le nif ".$this->session->userdata('nif');
				$d1=new DateTime();
				$table1['date']=$d1->format('Y-m-d');
				$t=date("h:i:sa");
				$table1['heure']=(($t[0].$t[1])+1).substr($t,2);
				$table1['numActeur']=$this->session->userdata('ut');
				$this->Model->ajoutH($table1);

				$this->session->set_flashdata('cinC',"");
				$this->session->set_flashdata('nomC',"");
				$this->session->set_flashdata('prenomsC',"");
				$this->session->set_flashdata('dateNaissC',"");
				$ce=$this->Model->centreN1($contribuable['idCentre']);
				$this->session->set_flashdata($ce['nomCentre'],'Selected');
				$this->session->set_flashdata($this->input->post('centre'),"Selected");
				$this->session->set_flashdata('communeC',"");
				$this->session->set_flashdata('adresseC',"");
				$this->session->set_flashdata('telC',"");
				$this->session->set_flashdata('pp','');
				$this->session->set_flashdata('pm','');
				$this->session->set_flashdata('next','');
				$this->session->set_flashdata('prev','oui');
				$centre=$this->Model->centre();
				$data['centre']=$centre;
				if(!$this->session->userdata('fonction')==""){
					$count=$this->Model->count($this->session->userdata('idCentre'));
					$data['count']=$count;
					$this->load->view('contribuable',$data);
				}
				else{
					$count=$this->Model->count1($this->session->userdata('idCentre'));
					$data['count']=$count;
					$this->load->view('contribuableP',$data);
				}
				$this->session->set_flashdata('terminer',"");
			}
			
		}
				
	}
	public function modifAct(){
		$this->load->model('Model');
		$act=$this->Model->tousAct();
		foreach ($act as $act) {
			if(!$this->input->post("m".$act['numAct'])==""){
				$this->session->set_flashdata('actionAct',"modif");
				$this->session->set_flashdata('numAct',$act['numAct']);
				$this->session->set_flashdata('act',$act['act']);
				$this->session->set_flashdata('pact',$act['pact']);
				$this->session->set_flashdata('com',$act['commune']);
				$this->session->set_flashdata('ad',$act['adresse']);
				if($act['exp']=="oui"){
					$this->session->set_flashdata('ouie',"Selected");
				}
				if($act['exp']=="non"){
					$this->session->set_flashdata('none',"Selected");
				}
				if($act['imp']=="oui"){
					$this->session->set_flashdata('ouii',"Selected");
				}
				if($act['imp']=="non"){
					$this->session->set_flashdata('noni',"Selected");
				}
				$data=array();
				$ac=$this->Model->act($this->session->userdata('nif'));
				$data['ac']=$ac;
				if(!$this->session->userdata('fonction')==""){
					$count=$this->Model->count($this->session->userdata('idCentre'));
					$data['count']=$count;
					$this->load->view('contribuable',$data);
				}
				else{
					$count=$this->Model->count1($this->session->userdata('idCentre'));
					$data['count']=$count;
					$this->load->view('contribuableP',$data);
				}

			}
			if(!$this->input->post("s".$act['numAct'])==""){
				$this->session->set_flashdata('supp',"afficher");
				$this->session->set_flashdata('numActS',$act['numAct']);
				$this->session->set_flashdata('next','oui');
				$this->session->set_flashdata('prev','');
				$data=array();
				$ac=$this->Model->act($this->session->userdata('nif'));
				$data['ac']=$ac;
				if(!$this->session->userdata('fonction')==""){
					$count=$this->Model->count($this->session->userdata('idCentre'));
					$data['count']=$count;
					$this->load->view('contribuable',$data);
				}
				else{
					$count=$this->Model->count1($this->session->userdata('idCentre'));
					$data['count']=$count;
					$this->load->view('contribuableP',$data);
				}
				$this->session->set_flashdata('supp',"");
			}
		}

		 
		
	}
	public function supprimerAct(){
		$this->load->model('Model');
		$this->Model->suppAct1($this->session->flashdata('numActS'));

		$table1['action']="Le personnel portant l'im ".$this->session->userdata('ut')." a supprimé un activité du contribuable portant le nif ".$this->session->userdata('nif');
		$d1=new DateTime();
		$table1['date']=$d1->format('Y-m-d');
		$t=date("h:i:sa");
		$table1['heure']=(($t[0].$t[1])+1).substr($t,2);
		$table1['numActeur']=$this->session->userdata('ut');
		$this->Model->ajoutH($table1);

		$this->session->set_flashdata('next','oui');
		$this->session->set_flashdata('prev','');
		$data=array();
		$ac=$this->Model->act($this->session->userdata('nif'));
		$data['ac']=$ac;
		$this->session->set_flashdata('supp',"");
		if(!$this->session->userdata('fonction')==""){
			$count=$this->Model->count($this->session->userdata('idCentre'));
			$data['count']=$count;
			$this->load->view('contribuable',$data);
		}
		else{
			$count=$this->Model->count1($this->session->userdata('idCentre'));
			$data['count']=$count;
			$this->load->view('contribuableP',$data);
		}
		 
		
	}
	public function ajoutCompteP()
	{
		$this->load->model('Model');
		$this->form_validation->set_rules('im','Immatricule','required');
		$this->form_validation->set_rules('mdpp','Mot de passe','required');
		$this->form_validation->set_rules('cmdpp','Confirmation du mot de passe','required');
		if($this->form_validation->run()==false){
			$this->session->set_flashdata('affCP',"afficher");
			$this->session->set_flashdata('im',$this->input->post('im'));
			$this->session->set_flashdata('mdpp',$this->input->post('mdpp'));
			$this->session->set_flashdata('cmdpp',$this->input->post('cmdpp'));
			$this->load->view('menuPrincipal1');
			$this->session->set_flashdata('affCP',"");
		}
		else{
			$pers=$this->Model->pers($this->input->post('im'));
			$compte=$this->Model->compteP($this->input->post('im'));
			if($pers==null){
				$this->session->set_flashdata('affCP',"afficher");
				$this->session->set_flashdata('alertErreurCP',"Numéro immatricule non existant");
				$this->session->set_flashdata('im',$this->input->post('im'));
				$this->session->set_flashdata('mdpp',$this->input->post('mdpp'));
				$this->session->set_flashdata('cmdpp',$this->input->post('cmdpp'));
				$this->load->view('menuPrincipal1');
				$this->session->set_flashdata('alertErreurCP',"");
				$this->session->set_flashdata('affCP',"");
			}
			elseif(!$compte==null){
				$this->session->set_flashdata('affCP',"afficher");
				$this->session->set_flashdata('alertErreurCP',"Ce numéro immatricule est déjà lié à un compte existant");
				$this->session->set_flashdata('im',$this->input->post('im'));
				$this->session->set_flashdata('mdpp',$this->input->post('mdpp'));
				$this->session->set_flashdata('cmdpp',$this->input->post('cmdpp'));
				$this->load->view('menuPrincipal1');
				$this->session->set_flashdata('alertErreurCP',"");
				$this->session->set_flashdata('affCP',"");
				
			}
			else{
				if($this->input->post('cmdpp')!=$this->input->post('mdpp')){
					$this->session->set_flashdata('affCP',"afficher");
					$this->session->set_flashdata('alertErreurCP',"Confirmation du mot de passe incorrecte");
					$this->session->set_flashdata('im',$this->input->post('im'));
					$this->session->set_flashdata('mdpp',$this->input->post('mdpp'));
					$this->session->set_flashdata('cmdpp',$this->input->post('cmdpp'));
					$this->load->view('menuPrincipal1');
					$this->session->set_flashdata('alertErreurCP',"");
					$this->session->set_flashdata('affCP',"");	
				}
				else{
					$table=array();
					$table['im']=$this->input->post('im');
					$table['mdpP']=$this->input->post('cmdpp');
					$this->Model->ajoutCP($table);
					$this->session->set_flashdata('affCP',"afficher");
					$this->session->set_flashdata('alertAjoutCP',"Création de compte administrateur effectuée, retenez bien votre mot de passe");
					$this->session->set_flashdata('im','');
					$this->session->set_flashdata('mdpp','');
					$this->session->set_flashdata('cmdpp','');
					$this->load->view('menuPrincipal1');
					$this->session->set_flashdata('alertAjoutCP',"");
					$this->session->set_flashdata('affCP',"");
				}
				
			}
			
		}
	}
	public function connexionP(){
		$this->load->model('Model');
		$this->form_validation->set_rules('conim','Numéro immatricule','required');
		$this->form_validation->set_rules('conmdp','Mot de passe','required');
		if($this->form_validation->run()==false){
			$this->session->set_flashdata('conim',$this->input->post('conim'));
			$this->session->set_flashdata('conmdp',$this->input->post('conmdp'));
			$this->load->view('menuPrincipal1');
		}
		else{
			$compte=$this->Model->compteP($this->input->post('conim'));
			if($compte==null){
				$this->session->set_flashdata('errim','Ce compte n\'existe pas');
				$this->session->set_flashdata('conim',$this->input->post('conim'));
				$this->session->set_flashdata('conmdp',$this->input->post('conmdp'));
				$this->load->view('menuPrincipal1');
				$this->session->set_flashdata('errim','');
			}
			else{
				if($compte['mdpP']!=$this->input->post('conmdp')){
					$this->session->set_flashdata('errmdpp','Mot de passe incorrect');
					$this->session->set_flashdata('focus','autofocus style=\'border:solid 1px red\'');
					$this->session->set_flashdata('conim',$this->input->post('conim'));
					$this->session->set_flashdata('conmdp',$this->input->post('conmdp'));
					$this->load->view('menuPrincipal1');
					$this->session->set_flashdata('errmdpp','');
					$this->session->set_flashdata('focus','');
				}
				else{
					$this->session->set_flashdata('connexion','afficher');
					$this->session->set_userdata('ut',$compte['im']);
					$this->session->set_userdata('mdpP',$compte['mdpP']);
					$this->session->set_userdata('numCP',$compte['numCP']);
					$p=$this->Model->pers($compte['im']);
					$this->session->set_userdata('idCentre',$p['idCentre']);
					if($p['fonction']=="Chef de centre"){
						$this->session->set_userdata('fonction',$p['fonction']);
						$this->session->set_userdata('mC','');
						$this->session->set_userdata('fonction','chef de centre');
						$this->session->set_flashdata('affSC','');
						$this->session->set_flashdata('affS','');
						$this->load->model('Model');
						$data=array();
						$pers=$this->Model->personnel($this->session->userdata('idCentre'));
						$contribuable=$this->Model->contribuable($this->session->userdata('idCentre'));
						$compteP=$this->Model->tousCP($this->session->userdata('idCentre'));
						$compteC=$this->Model->tousCC($this->session->userdata('idCentre'));
						$data['compteC']=$compteC;
						$data['compteP']=$compteP;
						$data['pers']=$pers;
						$dec=$this->Model->decAff($this->session->userdata('idCentre'));
						$data['dec']=$dec;
						$data['contribuable']=$contribuable;
						$count=$this->Model->count($this->session->userdata('idCentre'));
						$data['count']=$count;
						$this->load->view('acceuilAdmin',$data);
						$this->session->set_flashdata('connexion','');
					}
					else{
						$this->session->set_userdata('fonction','');
						$data=array();
						$contribuable=$this->Model->contribuable($this->session->userdata('idCentre'));
						$data['contribuable']=$contribuable;
						$dec=$this->Model->decAff($this->session->userdata('idCentre'));
						$data['dec']=$dec;
						$count=$this->Model->count1($this->session->userdata('idCentre'));
						$data['count']=$count;
						$this->load->view('acceuilPers',$data);
						$this->session->set_flashdata('connexion','');
					}
					
				}
			}
		}
		
	}
	public function modifCompteP()
	{
		$table=array();
		$this->load->model('Model');
		$this->form_validation->set_rules('amdp','Ancien mot de passe','required');
		$this->form_validation->set_rules('nmdp','Nouveau mot de passe','required');	
		if($this->form_validation->run()==false){
			$this->session->set_flashdata('affMP',"afficher");
			$this->session->set_flashdata('amdp',$this->input->post('amdp'));
			$this->session->set_flashdata('nmdp',$this->input->post('nmdp'));
			if(!$this->session->userdata('fonction')==""){
				$data=array();
				$pers=$this->Model->personnel($this->session->userdata('idCentre'));
				$contribuable=$this->Model->contribuable($this->session->userdata('idCentre'));
				$compteP=$this->Model->tousCP($this->session->userdata('idCentre'));
				$compteC=$this->Model->tousCC($this->session->userdata('idCentre'));
				$data['compteC']=$compteC;
				$data['compteP']=$compteP;
				$data['pers']=$pers;
				$dec=$this->Model->decAff($this->session->userdata('idCentre'));
				$data['dec']=$dec;
				$data['contribuable']=$contribuable;
				$count=$this->Model->count($this->session->userdata('idCentre'));
				$data['count']=$count;
				$this->load->view('acceuilAdmin',$data);
				$this->session->set_flashdata('affMP',"");
				$this->session->set_flashdata('alertModifmdpp',"");
			}
			else{
				$contribuable=$this->Model->contribuable($this->session->userdata('idCentre'));
				$data['contribuable']=$contribuable;
				$dec=$this->Model->decAff($this->session->userdata('idCentre'));
				$data['dec']=$dec;
				$count=$this->Model->count1($this->session->userdata('idCentre'));
				$data['count']=$count;
				$this->load->view('acceuilPers',$data);
				$this->session->set_flashdata('affMP',"");
				$this->session->set_flashdata('alertModifmdpp',"");
			}
			
		}
		else{
			if($this->session->userdata('mdpP')==$this->input->post('amdp')){
				$table['mdpP']=$this->input->post('nmdp');
				$this->Model->modifCompteP($this->session->userdata('numCP'),$table);
				if(!$this->session->userdata('fonction')==""){
					$this->session->set_flashdata('affMP',"afficher");
					$this->session->set_flashdata('amdp','');
					$this->session->set_flashdata('nmdp','');
					$this->session->set_flashdata('alertModifmdpp',"modification effectuée, votre nouveau mot de passe est '".$table['mdpP']."'");
					$this->session->set_userdata('mdpP',$table['mdpP']);
					$pers=$this->Model->personnel($this->session->userdata('idCentre'));
					$contribuable=$this->Model->contribuable($this->session->userdata('idCentre'));
					$compteP=$this->Model->tousCP($this->session->userdata('idCentre'));
					$compteC=$this->Model->tousCC($this->session->userdata('idCentre'));
					$data['compteC']=$compteC;
					$data['compteP']=$compteP;
					$data['pers']=$pers;
					$dec=$this->Model->decAff($this->session->userdata('idCentre'));
					$data['dec']=$dec;
					$data['contribuable']=$contribuable;
					$count=$this->Model->count($this->session->userdata('idCentre'));
					$data['count']=$count;
					$this->load->view('acceuilAdmin',$data);
					$this->session->set_flashdata('affMP',"");
					$this->session->set_flashdata('alertModifmdpp',"");
				}
				else{
					$this->session->set_flashdata('affMP',"afficher");
					$this->session->set_flashdata('amdp','');
					$this->session->set_flashdata('nmdp','');
					$this->session->set_flashdata('alertModifmdpp',"modification effectuée, votre nouveau mot de passe est '".$table['mdpP']."'");
					$this->session->set_userdata('mdpP',$table['mdpP']);
					$contribuable=$this->Model->contribuable($this->session->userdata('idCentre'));
					$data['contribuable']=$contribuable;
					$dec=$this->Model->decAff($this->session->userdata('idCentre'));
					$data['dec']=$dec;
					$count=$this->Model->count1($this->session->userdata('idCentre'));
					$data['count']=$count;
					$this->load->view('acceuilPers',$data);
					$this->session->set_flashdata('affMP',"");
					$this->session->set_flashdata('alertModifmdpp',"");
				}
			}
			else{
				if(!$this->session->userdata('fonction')==""){
					$this->session->set_flashdata('affMP',"afficher");
					$this->session->set_flashdata('amdp',$this->input->post('amdp'));
					$this->session->set_flashdata('nmdp',$this->input->post('nmdp'));
					$this->session->set_flashdata('alertErrmdpp','Ancien mot de passe incorrect');
					$pers=$this->Model->personnel($this->session->userdata('idCentre'));
					$contribuable=$this->Model->contribuable($this->session->userdata('idCentre'));
					$compteP=$this->Model->tousCP($this->session->userdata('idCentre'));
					$compteC=$this->Model->tousCC($this->session->userdata('idCentre'));
					$data['compteC']=$compteC;
					$data['compteP']=$compteP;
					$data['pers']=$pers;
					$dec=$this->Model->decAff($this->session->userdata('idCentre'));
					$data['dec']=$dec;
					$data['contribuable']=$contribuable;
					$count=$this->Model->count($this->session->userdata('idCentre'));
					$data['count']=$count;
					$this->load->view('acceuilAdmin',$data);
					$this->session->set_flashdata('affMP',"");
					$this->session->set_flashdata('alertErrmdpp',"");
				}
				else{
					$this->session->set_flashdata('affMP',"afficher");
					$this->session->set_flashdata('amdp',$this->input->post('amdp'));
					$this->session->set_flashdata('nmdp',$this->input->post('nmdp'));
					$this->session->set_flashdata('alertErrmdpp','Ancien mot de passe incorrect');
					$contribuable=$this->Model->contribuable($this->session->userdata('idCentre'));
					$data['contribuable']=$contribuable;
					$dec=$this->Model->decAff($this->session->userdata('idCentre'));
					$data['dec']=$dec;
					$count=$this->Model->count1($this->session->userdata('idCentre'));
					$data['count']=$count;
					$this->load->view('acceuilPers',$data);
					$this->session->set_flashdata('affMP',"");
					$this->session->set_flashdata('alertErrmdpp',"");
				}
			}
		}
	}

	
	public function ajoutCompteC()
	{
		$this->load->model('Model');
		$this->form_validation->set_rules('nif','Numéro d\'identification fiscal','required');
		$this->form_validation->set_rules('mdpc','Mot de passe','required');
		$this->form_validation->set_rules('cmdpc','Confirmation du mot de passe','required');
		if($this->form_validation->run()==false){
			$this->session->set_flashdata('affCC',"afficher");
			$this->session->set_flashdata('nif',$this->input->post('nif'));
			$this->session->set_flashdata('mdpc',$this->input->post('mdpc'));
			$this->session->set_flashdata('cmdpc',$this->input->post('cmdpc'));
			$this->load->view('menuPrincipal2');
			$this->session->set_flashdata('affCC',"");
		}
		else{
			$c=$this->Model->c($this->input->post('nif'));
			$compte=$this->Model->compteC($this->input->post('nif'));
			if($c==null){
				$this->session->set_flashdata('affCC',"afficher");
				$this->session->set_flashdata('alertErreurCC',"Numéro d'identification fiscal non existant");
				$this->session->set_flashdata('nif',$this->input->post('nif'));
				$this->session->set_flashdata('mdpc',$this->input->post('mdpc'));
				$this->session->set_flashdata('cmdpc',$this->input->post('cmdpc'));
				$this->load->view('menuPrincipal2');
				$this->session->set_flashdata('alertErreurCC',"");
				$this->session->set_flashdata('affCC',"");
			}
			elseif(!$compte==null){
				$this->session->set_flashdata('affCC',"afficher");
				$this->session->set_flashdata('alertErreurCC',"Ce numéro d'identification fiscal est déjà lié à un compte existant");
				$this->session->set_flashdata('nif',$this->input->post('nif'));
				$this->session->set_flashdata('mdpc',$this->input->post('mdpc'));
				$this->session->set_flashdata('cmdpc',$this->input->post('cmdpc'));
				$this->load->view('menuPrincipal2');
				$this->session->set_flashdata('alertErreurCC',"");
				$this->session->set_flashdata('affCC',"");
				
			}
			else{
				if($this->input->post('cmdpc')!=$this->input->post('mdpc')){
					$this->session->set_flashdata('affCC',"afficher");
					$this->session->set_flashdata('alertErreurCC',"Confirmation du mot de passe incorrecte");
					$this->session->set_flashdata('nif',$this->input->post('nif'));
					$this->session->set_flashdata('mdpc',$this->input->post('mdpc'));
					$this->session->set_flashdata('cmdpc',$this->input->post('cmdpc'));
					$this->load->view('menuPrincipal2');
					$this->session->set_flashdata('alertErreurCC',"");
					$this->session->set_flashdata('affCC',"");	
				}
				else{
					$table=array();
					$table['nif']=$this->input->post('nif');
					$table['mdpC']=$this->input->post('cmdpc');
					$this->Model->ajoutCC($table);
					$this->session->set_flashdata('affCC',"afficher");
					$this->session->set_flashdata('alertAjoutCC',"Création de compte contribuable effectuée, retenez bien votre mot de passe");
					$this->session->set_flashdata('nif','');
					$this->session->set_flashdata('mdpc','');
					$this->session->set_flashdata('cmdpc','');
					$this->load->view('menuPrincipal2');
					$this->session->set_flashdata('alertAjoutCC',"");
					$this->session->set_flashdata('affCC',"");
				}
				
			}
			
		}
	}
	public function connexionC(){
		$this->load->model('Model');
		$this->form_validation->set_rules('connif','Numéro immatricule','required');
		$this->form_validation->set_rules('conmdpc','Mot de passe','required');
		if($this->form_validation->run()==false){
			$this->session->set_flashdata('connif',$this->input->post('connif'));
			$this->session->set_flashdata('conmdpc',$this->input->post('conmdpc'));
			$this->load->view('menuPrincipal2');
		}
		else{
			$compte=$this->Model->compteC($this->input->post('connif'));
			if($compte==null){
				$this->session->set_flashdata('errnif','Ce compte n\'existe pas');
				$this->session->set_flashdata('connif',$this->input->post('connif'));
				$this->session->set_flashdata('conmdpc',$this->input->post('conmdpc'));
				$this->load->view('menuPrincipal2');
				$this->session->set_flashdata('errif','');
			}
			else{
				if($compte['mdpC']!=$this->input->post('conmdpc')){
					$this->session->set_flashdata('errmdpc','Mot de passe incorrect');
					$this->session->set_flashdata('focus','autofocus style=\'border:solid 1px red\'');
					$this->session->set_flashdata('connif',$this->input->post('connif'));
					$this->session->set_flashdata('conmdpc',$this->input->post('conmdpc'));
					$this->load->view('menuPrincipal2');
					$this->session->set_flashdata('errmdpc','');
					$this->session->set_flashdata('focus','');
				}
				else{
					$this->session->set_flashdata('connexion','afficher');
					$this->session->set_userdata('ut',$compte['nif']);
					$this->session->set_userdata('mdpC',$compte['mdpC']);
					$this->session->set_userdata('numCC',$compte['numCC']);
					redirect(base_url()."Controlleur/acceuilContribuable");
					$this->session->set_flashdata('connexion','');
					
				}
			}
		}
		
	}
	public function modifCompteC()
	{
		$table=array();
		$this->load->model('Model');
		$this->form_validation->set_rules('amdpc','Ancien mot de passe','required');
		$this->form_validation->set_rules('nmdpc','Nouveau mot de passe','required');	
		if($this->form_validation->run()==false){
			$this->session->set_flashdata('affMP',"afficher");
			$this->session->set_flashdata('amdpc',$this->input->post('amdpc'));
			$this->session->set_flashdata('nmdpc',$this->input->post('nmdpc'));
			$this->load->model('Model');
			$data=array();
			$dec=$this->Model->dec($this->session->userdata('ut'));
			$data['dec']=$dec;
			$this->load->view('acceuilContribuable',$data);
			$this->session->set_flashdata('affMP',"");
			$this->session->set_flashdata('alertModifmdpp',"");
			$this->session->set_flashdata('alertErrmdpp',"");
			
		}
		else{
			if($this->session->userdata('mdpC')==$this->input->post('amdpc')){
				$table['mdpC']=$this->input->post('nmdpc');
				$this->session->set_flashdata('affMP',"afficher");
				$this->session->set_flashdata('alertModifmdpp',"modification effectuée, votre nouveau mot de passe est '".$table['mdpC']."'");
				$this->Model->modifCompteC($this->session->userdata('numCC'),$table);
				$this->session->set_flashdata('amdpc','');
				$this->session->set_flashdata('nmdpc','');
				$this->session->set_userdata('mdpC',$table['mdpC']);
				$this->load->model('Model');
				$data=array();
				$dec=$this->Model->dec($this->session->userdata('ut'));
				$data['dec']=$dec;
				$this->load->view('acceuilContribuable',$data);
				$this->session->set_flashdata('affMP',"");
				$this->session->set_flashdata('alertModifmdpp',"");
			}
			else{
				$this->session->set_flashdata('affMP',"afficher");
				$this->session->set_flashdata('amdpc',$this->input->post('amdpc'));
				$this->session->set_flashdata('nmdpc',$this->input->post('nmdpc'));
				$this->session->set_flashdata('alertErrmdpp','Ancien mot de passe incorrect');
				$this->load->model('Model');
				$data=array();
				$dec=$this->Model->dec($this->session->userdata('ut'));
				$data['dec']=$dec;
				$this->load->view('acceuilContribuable',$data);
				$this->session->set_flashdata('affMP',"");
				$this->session->set_flashdata('alertErrmdpp',"");
			}
		}
	}
	public function declarationtva(){
		$this->load->model('Model');
		$table1=array();
		$table2=array();
		$table3=array();
		if($this->input->post('pro')=='pro'){
			$this->session->set_flashdata($this->input->post('mois'),'');
			$b="";
			$data=array();
			if(!$this->input->post('annee')=="" && !$this->input->post('act')==""){
				$act=$this->input->post('act');
				$l=strlen($act);
				for($i=0;$i<$l;$i++){
					if($act[$i]=="-"){
						break;
					}
					$b.=$act[$i];
				}
				$c=$this->input->post('annee')-1;
				$tva=$this->Model->tva($b,$c);
				$data['tva']=$tva;
				if (!empty($tva)) {
					$t=0;
					$nt=0;
					foreach ($tva as $tva){
						$t+=$tva['opExpt']+$tva['opLAT']+$tva['opLNT']+$tva['autresT'];
						$nt+=$tva['opExpNT']+$tva['opLANT']+$tva['opLNNT']+$tva['autresNT'];
					}
					$this->session->set_flashdata('cataxable',$t);
					$this->session->set_flashdata('cantaxable',$nt);
				
				}
				else{
					$this->session->set_flashdata('cataxable',"0");
					$this->session->set_flashdata('cantaxable',"0");
				}
				$this->session->set_flashdata('annee',$this->input->post('annee'));
				$this->session->set_flashdata($this->input->post('mois'),'Selected');
				$this->session->set_flashdata('tvav',$this->input->post('tvav'));
				$this->session->set_flashdata('ctva',$this->input->post('ctva'));
				$this->session->set_flashdata('rctva',$this->input->post('rctva'));
				$this->session->set_flashdata('ctvar',$this->input->post('ctvar'));
				$this->session->set_flashdata("a".$b,'Selected');
				$this->session->set_flashdata('rs',$this->input->post('np'));
				$this->session->set_flashdata('nc',$this->input->post('nc'));
				$this->session->set_flashdata('ad',$this->input->post('ad'));
				
				
				$data=array();
				$act=$this->Model->act($this->session->userdata('ut'));
				$data['act']=$act;
				$this->load->view('tva',$data);
			}
			else{
				$this->session->set_flashdata('annee',$this->input->post('annee'));
				$this->session->set_flashdata($this->input->post('mois'),'Selected');
				$this->session->set_flashdata('tvav',$this->input->post('tvav'));
				$this->session->set_flashdata('ctva',$this->input->post('ctva'));
				$this->session->set_flashdata('rctva',$this->input->post('rctva'));
				$this->session->set_flashdata('ctvar',$this->input->post('ctvar'));
				$this->session->set_flashdata("a".$b,'Selected');
				$this->session->set_flashdata('rs',$this->input->post('np'));
				$this->session->set_flashdata('nc',$this->input->post('nc'));
				$this->session->set_flashdata('ad',$this->input->post('ad'));
				

				$data=array();
				$act=$this->Model->act($this->session->userdata('ut'));
				$data['act']=$act;
				$this->load->view('tva',$data);
			}
			
		}
		if($this->input->post('enregistrer')=='enregistrer'){
			$table1['annee']=$this->input->post('annee');
			$table1['mois']=$this->input->post('mois');
			$table1['totalTVAV']=$this->input->post('tvav');
			$table1['totalCTVA ']=$this->input->post('ctva');
			$table1['rembTVA']=$this->input->post('rctva');
			$table1['creditTVAR']=$this->input->post('ctvar');
			//$table1['montantTVA']=$this->input->post('commune');
			//$table1['penalite']=$this->input->post('adresse');
			//$table1['totalApayer ']=$this->input->post('tel');
			$act=$this->input->post('act');
			$l=strlen($act);
			$b="";
			for($i=0;$i<$l;$i++){
				if($act[$i]=="-"){
					break;
				}
				$b.=$act[$i];
			}
			$table1['numAct ']=$b;
			$table1['rs']=$this->input->post('np');
			$table1['nc']=$this->input->post('nc');
			$table1['ad']=$this->input->post('ad');
			

			$table2['opExpt']=$this->input->post('expt');
			$table2['opExpNT']=$this->input->post('expnt');
			$table2['opLAT']=$this->input->post('oppat');
			$table2['opLANT']=$this->input->post('oppnat');
			$table2['opLNT']=$this->input->post('oppant');
			$table2['opLNNT']=$this->input->post('oppnant');
			$table2['autresT']=$this->input->post('at');
			$table2['autresNT']=$this->input->post('ant');
			$table2['taux1']=$this->input->post('taux1');
			$table2['taux2']=$this->input->post('taux2');
			$table2['taux3']=$this->input->post('taux3');
			$table2['totalC']=$this->input->post('totalC');
			

			$table3['taxeBL']=$this->input->post('bl');
			$table3['taxeBI']=$this->input->post('bi');
			$table3['taxeAL']=$this->input->post('al');
			$table3['taxeAI']=$this->input->post('ai');
			$table3['taxeSL']=$this->input->post('sl');
			$table3['taxeSI']=$this->input->post('si');
			$table3['autresL']=$this->input->post('rl');
			$table3['autresI ']=$this->input->post('ri');
			$table3['prorataD ']=$this->input->post('prorata');
			$table3[' rcp ']=$this->input->post('rcp');
			$table3['totalD']=$this->input->post('totalD');
			if(!$this->session->userdata('modifDec')=="oui"){
				$table1['numDec']=$this->session->flashdata('numDec');
				$table2['numDec']=$this->session->flashdata('numDec');
				$table3['numDec']=$this->session->flashdata('numDec');
				$d1=new DateTime();
				$table1['dateDec']=$d1->format('Y-m-d');
				$this->Model->ajoutDec($table1);
				$this->Model->ajoutTvac($table2);
				$this->Model->ajoutDed($table3);
				$this->session->set_flashdata('alertModifDec',"Enregistrement effectué");
			}
			else{
				$this->Model->modifDec($this->session->userdata('numDec1'),$table1);
				$this->Model->modifTvac($this->session->userdata('numDec1'),$table2);
				$this->Model->modifDed($this->session->userdata('numDec1'),$table3);
				$this->session->set_flashdata('alertModifDec',"La déclaration numéro ".$this->session->userdata('numDec1')." a été modifier");
			}
			redirect(base_url()."Controlleur/acceuilContribuable");
			$this->session->set_flashdata('alertModifDec',"");
			$this->session->set_userdata('modifDec',"");

		}
		 
		
	}
	public function declarationtvaAdmin(){
		$this->load->model('Model');
		$table1=array();
		$table2=array();
		$table3=array();
		if($this->input->post('pro')=='pro'){
			$this->session->set_flashdata($this->input->post('mois'),'');
			$b="";
			$data=array();
			if((!$this->input->post('annee')=="" && !$this->input->post('act')=="") || !$this->session->userdata('nifMod')==""){
				$act=$this->input->post('act');
				$l=strlen($act);
				for($i=0;$i<$l;$i++){
					if($act[$i]=="-"){
						break;
					}
					$b.=$act[$i];
				}
				$c=$this->input->post('annee')-1;
				$tva=$this->Model->tva($b,$c);
				$data['tva']=$tva;
				if (!empty($tva)) {
					$t=0;
					$nt=0;
					foreach ($tva as $tva){
						$t+=$tva['opExpt']+$tva['opLAT']+$tva['opLNT']+$tva['autresT'];
						$nt+=$tva['opExpNT']+$tva['opLANT']+$tva['opLNNT']+$tva['autresNT'];
					}
					$this->session->set_flashdata('cataxable',$t);
					$this->session->set_flashdata('cantaxable',$nt);
				
				}
				else{
					$this->session->set_flashdata('cataxable',"0");
					$this->session->set_flashdata('cantaxable',"0");
				}
				$this->session->set_flashdata('annee',$this->input->post('annee'));
				$this->session->set_flashdata($this->input->post('mois'),'Selected');
				$this->session->set_flashdata('tvav',$this->input->post('tvav'));
				$this->session->set_flashdata('ctva',$this->input->post('ctva'));
				$this->session->set_flashdata('rctva',$this->input->post('rctva'));
				$this->session->set_flashdata('ctvar',$this->input->post('ctvar'));
				$this->session->set_flashdata("a".$b,'Selected');
				$this->session->set_flashdata('rs',$this->input->post('np'));
				$this->session->set_flashdata('nc',$this->input->post('nc'));
				$this->session->set_flashdata('ad',$this->input->post('ad'));
				
				$data=array();
				$act=$this->Model->act($this->session->userdata('nifMod'));
				$data['act']=$act;
				if(!$this->session->userdata('fonction')==""){
					$count=$this->Model->count($this->session->userdata('idCentre'));
					$data['count']=$count;
					$this->load->view('validation',$data);
				}
				else{
					$count=$this->Model->count1($this->session->userdata('idCentre'));
					$data['count']=$count;
					$this->load->view('validationP',$data);
				};
			}
			else{
				$this->session->set_flashdata('annee',$this->input->post('annee'));
				$this->session->set_flashdata($this->input->post('mois'),'Selected');
				$this->session->set_flashdata('tvav',$this->input->post('tvav'));
				$this->session->set_flashdata('ctva',$this->input->post('ctva'));
				$this->session->set_flashdata('rctva',$this->input->post('rctva'));
				$this->session->set_flashdata('ctvar',$this->input->post('ctvar'));
				$this->session->set_flashdata("a".$b,'Selected');
				$this->session->set_flashdata('rs',$this->input->post('np'));
				$this->session->set_flashdata('nc',$this->input->post('nc'));
				$this->session->set_flashdata('ad',$this->input->post('ad'));
				if(!$this->session->userdata('fonction')==""){
					$count=$this->Model->count($this->session->userdata('idCentre'));
					$data['count']=$count;
					$this->load->view('validation');
				}
				else{
					$count=$this->Model->count1($this->session->userdata('idCentre'));
					$data['count']=$count;
					$this->load->view('validationP');
				}
				
			}
			
		}
		if($this->input->post('enregistrer')=='enregistrer'){
			$table1['annee']=$this->input->post('annee');
			$table1['mois']=$this->input->post('mois');
			$table1['totalTVAV']=$this->input->post('tvav');
			$table1['totalCTVA ']=$this->input->post('ctva');
			$table1['rembTVA']=$this->input->post('rctva');
			$table1['creditTVAR']=$this->input->post('ctvar');
			$table1['montantTVA']=$this->input->post('montant');
			$table1['penalite']=$this->input->post('penalite');
			$table1['totalVerse']=$this->input->post('tv');
			$act=$this->input->post('act');
			$l=strlen($act);
			$b="";
			for($i=0;$i<$l;$i++){
				if($act[$i]=="-"){
					break;
				}
				$b.=$act[$i];
			}
			$table1['numAct ']=$b;
			$table1['rs']=$this->input->post('np');
			$table1['nc']=$this->input->post('nc');
			$table1['ad']=$this->input->post('ad');
			$table1['validation']="oui";

			$table2['opExpt']=$this->input->post('expt');
			$table2['opExpNT']=$this->input->post('expnt');
			$table2['opLAT']=$this->input->post('oppat');
			$table2['opLANT']=$this->input->post('oppnat');
			$table2['opLNT']=$this->input->post('oppant');
			$table2['opLNNT']=$this->input->post('oppnant');
			$table2['autresT']=$this->input->post('at');
			$table2['autresNT']=$this->input->post('ant');
			$table2['taux1']=$this->input->post('taux1');
			$table2['taux2']=$this->input->post('taux2');
			$table2['taux3']=$this->input->post('taux3');
			$table2['totalC']=$this->input->post('totalC');
			

			$table3['taxeBL']=$this->input->post('bl');
			$table3['taxeBI']=$this->input->post('bi');
			$table3['taxeAL']=$this->input->post('al');
			$table3['taxeAI']=$this->input->post('ai');
			$table3['taxeSL']=$this->input->post('sl');
			$table3['taxeSI']=$this->input->post('si');
			$table3['autresL']=$this->input->post('rl');
			$table3['autresI ']=$this->input->post('ri');
			$table3['prorataD ']=$this->input->post('prorata');
			$table3[' rcp ']=$this->input->post('rcp');
			$table3['totalD']=$this->input->post('totalD');
			$this->Model->modifDec($this->session->userdata('numDec1'),$table1);
			$this->Model->modifTvac($this->session->userdata('numDec1'),$table2);
			$this->Model->modifDed($this->session->userdata('numDec1'),$table3);

			if(!$this->session->userdata('validation')==""){
				$table4['action']="Le personnel portant l'im ".$this->session->userdata('ut')." a modifié la déclaration numéro ".$this->session->userdata('numDec1');
			}
			else{
				$table4['action']="Le personnel portant l'im ".$this->session->userdata('ut')." a validé la déclaration numéro ".$this->session->userdata('numDec1');
			}
			$d1=new DateTime();
			$table4['date']=$d1->format('Y-m-d');
			$t=date("h:i:sa");
			$table4['heure']=(($t[0].$t[1])+1).substr($t,2);
			$table4['numActeur']=$this->session->userdata('ut');
			$this->Model->ajoutH($table4);

			$this->session->set_flashdata('alertModifDec',"La déclaration numéro ".$this->session->userdata('numDec1')." a été modifier");
			if(!$this->session->userdata('fonction')==""){
				redirect(base_url()."Controlleur/acceuilAdmin");
			}
			else{
				redirect(base_url()."Controlleur/acceuilPers");
			}
			
			$this->session->set_flashdata('alertModifDec',"");
			$this->session->set_userdata('modifDec',"");

		}
		 
		
	}
	public function modifDecAdmin()
	{
		$this->load->model('Model');
		$dec=$this->Model->decAff($this->session->userdata('idCentre'));
		foreach ($dec as $dec) {
			if(!$this->input->post("m".$dec['numDec'])==""){
				$this->session->set_userdata('numDec1',$dec['numDec']);
				
				$b=$dec['numAct'];
				$c=$dec['annee']-1;
				$tva=$this->Model->tva($b,$c);
				$data['tva']=$tva;
				if (!empty($tva)) {
					$t=0;
					$nt=0;
					foreach ($tva as $tva){
						$t+=$tva['opExpt']+$tva['opLAT']+$tva['opLNT']+$tva['autresT'];
						$nt+=$tva['opExpNT']+$tva['opLANT']+$tva['opLNNT']+$tva['autresNT'];
					}
					$this->session->set_flashdata('cataxable',$t);
					$this->session->set_flashdata('cantaxable',$nt);
				
				}
				else{
					$this->session->set_flashdata('cataxable',"0");
					$this->session->set_flashdata('cantaxable',"0");
				}

				$this->session->set_flashdata('annee',$dec['annee']);
				$this->session->set_flashdata($dec['mois'],'Selected');
				$this->session->set_flashdata('tvav',$dec['totalTVAV']);
				$this->session->set_flashdata('ctva',$dec['totalCTVA']);
				$this->session->set_flashdata('rctva',$dec['rembTVA']);
				$this->session->set_flashdata('ctvar',$dec['creditTVAR']);
				$this->session->set_flashdata("a".$dec['numAct'],'Selected');
				$this->session->set_flashdata('rs',$dec['rs']);
				$this->session->set_flashdata('nc',$dec['nc']);
				$this->session->set_flashdata('ad',$dec['ad']);
				$this->session->set_userdata('validation',$dec['validation']);
				if($dec['montantTVA']==""){
					$this->session->set_flashdata('montant',"0");
				}
				else{
					$this->session->set_flashdata('montant',$dec['montantTVA']);
				}
				if($dec['penalite']==""){
					$this->session->set_flashdata('penalite',"0");
				}
				else{
					$this->session->set_flashdata('penalite',$dec['penalite']);
				}
				if($dec['totalVerse']==""){
					$this->session->set_flashdata('totalVerse',"0");
				}
				else{
					$this->session->set_flashdata('totalVerse',$dec['totalVerse']);
				}
				

				$a=$this->Model->tvac($this->session->userdata('numDec1'));
				$this->session->set_flashdata('expt',$a['opExpt']);
				$this->session->set_flashdata('expnt',$a['opExpt']);
				$this->session->set_flashdata('oppat',$a['opLAT']);
				$this->session->set_flashdata('oppnat',$a['opLANT']);
				$this->session->set_flashdata('oppant',$a['opLNT']);
				$this->session->set_flashdata('oppnant',$a['opLNNT']);
				$this->session->set_flashdata('at',$a['autresT']);
				$this->session->set_flashdata('ant',$a['autresNT']);
				$this->session->set_flashdata('taux1',$a['taux1']);
				$this->session->set_flashdata('taux2',$a['taux2']);
				$this->session->set_flashdata('taux3',$a['taux3']);
				$this->session->set_flashdata('totalC',$a['totalC']);

				$b=$this->Model->deduction($this->session->userdata('numDec1'));
				$this->session->set_flashdata('bl',$b['taxeBL']);
				$this->session->set_flashdata('bi',$b['taxeBI']);
				$this->session->set_flashdata('al',$b['taxeAL']);
				$this->session->set_flashdata('ai',$b['taxeAI']);
				$this->session->set_flashdata('sl',$b['taxeSL']);
				$this->session->set_flashdata('si',$b['taxeSI']);
				$this->session->set_flashdata('rl',$b['autresL']);
				$this->session->set_flashdata('ri',$b['autresI']);
				$this->session->set_flashdata('prorata',$b['prorataD']);
				$this->session->set_flashdata('rcp',$b['rcp']);
				$this->session->set_flashdata('totalD',$b['totalD']);

				$data=array();
				$act=$this->Model->act($this->Model->nifDec($dec['numDec'])['nif']);
				$this->session->set_userdata('nifMod',$this->Model->nifDec($dec['numDec'])['nif']);
				$data['act']=$act;
				if(!$this->session->userdata('fonction')==""){
					$count=$this->Model->count($this->session->userdata('idCentre'));
					$data['count']=$count;
					$this->load->view('validation',$data);
				}
				else{
					$count=$this->Model->count1($this->session->userdata('idCentre'));
					$data['count']=$count;
					$this->load->view('validationP',$data);
				}
				

			}
		}
		if(!$this->input->post('supprimer')==""){
			$this->session->set_userdata('numDec1',$this->input->post('supprimer'));
			$this->session->set_flashdata('affS1',"oui");
			if(!$this->session->userdata('fonction')==""){
				redirect(base_url()."Controlleur/acceuilAdmin");
			}
			else{
				redirect(base_url()."Controlleur/acceuilPers");
			}
			
		}
		if(!$this->input->post('supprimerDec')==""){
			$this->Model->suppDec($this->session->userdata('numDec1'));

			$table1['action']="Le personnel portant l'im ".$this->session->userdata('ut')." a supprimé la déclaration numéro ".$this->session->userdata('numDec1');
			$d1=new DateTime();
			$table1['date']=$d1->format('Y-m-d');
			$t=date("h:i:sa");
			$table1['heure']=(($t[0].$t[1])+1).substr($t,2);
			$table1['numActeur']=$this->session->userdata('ut');
			$this->Model->ajoutH($table1);

			$this->session->set_flashdata('alertSupp',"La déclaration numéro ".$this->session->userdata('numDec1')." a été supprimée");
			if(!$this->session->userdata('fonction')==""){
				redirect(base_url()."Controlleur/acceuilAdmin");
			}
			else{
				redirect(base_url()."Controlleur/acceuilPers");
			}
			$this->session->set_flashdata('alertSupp',"");
			$this->session->set_userdata('numDec1',"");
		}

		
	}
	public function modifDec()
	{
		$this->load->model('Model');
		$dec=$this->Model->dec($this->session->userdata('ut'));
		foreach ($dec as $dec) {
			if(!$this->input->post("m".$dec['numDec'])==""){
				$this->session->set_userdata('modifDec',"oui");
				$this->session->set_userdata('numDec1',$dec['numDec']);
				
				$this->session->set_flashdata('annee',$dec['annee']);

				$b=$dec['numAct'];
				$c=$dec['annee']-1;
				$tva=$this->Model->tva($b,$c);
				$data['tva']=$tva;
				if (!empty($tva)) {
					$t=0;
					$nt=0;
					foreach ($tva as $tva){
						$t+=$tva['opExpt']+$tva['opLAT']+$tva['opLNT']+$tva['autresT'];
						$nt+=$tva['opExpNT']+$tva['opLANT']+$tva['opLNNT']+$tva['autresNT'];
					}
					$this->session->set_flashdata('cataxable',$t);
					$this->session->set_flashdata('cantaxable',$nt);
				
				}
				else{
					$this->session->set_flashdata('cataxable',"0");
					$this->session->set_flashdata('cantaxable',"0");
				}

				$this->session->set_flashdata($dec['mois'],'Selected');
				$this->session->set_flashdata('tvav',$dec['totalTVAV']);
				$this->session->set_flashdata('ctva',$dec['totalCTVA']);
				$this->session->set_flashdata('rctva',$dec['rembTVA']);
				$this->session->set_flashdata('ctvar',$dec['creditTVAR']);
				$this->session->set_flashdata("a".$dec['numAct'],'Selected');
				$this->session->set_flashdata('rs',$dec['rs']);
				$this->session->set_flashdata('nc',$dec['nc']);
				$this->session->set_flashdata('ad',$dec['ad']);
				$this->session->set_flashdata('montant',$dec['montantTVA']);
				$this->session->set_flashdata('penalite',$dec['penalite']);
				$this->session->set_flashdata('totalVerse',$dec['totalVerse']);

				$a=$this->Model->tvac($this->session->userdata('numDec1'));
				$this->session->set_flashdata('expt',$a['opExpt']);
				$this->session->set_flashdata('expnt',$a['opExpt']);
				$this->session->set_flashdata('oppat',$a['opLAT']);
				$this->session->set_flashdata('oppnat',$a['opLANT']);
				$this->session->set_flashdata('oppant',$a['opLNT']);
				$this->session->set_flashdata('oppnant',$a['opLNNT']);
				$this->session->set_flashdata('at',$a['autresT']);
				$this->session->set_flashdata('ant',$a['autresNT']);
				$this->session->set_flashdata('taux1',$a['taux1']);
				$this->session->set_flashdata('taux2',$a['taux2']);
				$this->session->set_flashdata('taux3',$a['taux3']);
				$this->session->set_flashdata('totalC',$a['totalC']);

				$b=$this->Model->deduction($this->session->userdata('numDec1'));
				$this->session->set_flashdata('bl',$b['taxeBL']);
				$this->session->set_flashdata('bi',$b['taxeBI']);
				$this->session->set_flashdata('al',$b['taxeAL']);
				$this->session->set_flashdata('ai',$b['taxeAI']);
				$this->session->set_flashdata('sl',$b['taxeSL']);
				$this->session->set_flashdata('si',$b['taxeSI']);
				$this->session->set_flashdata('rl',$b['autresL']);
				$this->session->set_flashdata('ri',$b['autresI']);
				$totalH=$this->session->flashdata("bl")+$this->session->flashdata("bi")+$this->session->flashdata("al")+$this->session->flashdata("ai")+$this->session->flashdata("sl")+$this->session->flashdata("si")+$this->session->flashdata("rl")+$this->session->flashdata("ri");
				$this->session->set_flashdata('totalH',$totalH);
				$this->session->set_flashdata('prorata',$b['prorataD']);
				$l8=$totalH*($b['prorataD']/100);
				$this->session->set_flashdata('l8',$l8);
				$this->session->set_flashdata('rcp',$b['rcp']);
				$this->session->set_flashdata('totalD',$b['totalD']);

				$data=array();
				$act=$this->Model->act($this->session->userdata('ut'));
				$data['act']=$act;
				$this->load->view('tva',$data);

			}
		}
		if(!$this->input->post('supprimer')==""){
			$this->session->set_userdata('numDec1',$this->input->post('supprimer'));
			$this->session->set_flashdata('affS',"oui");
			redirect(base_url()."Controlleur/acceuilContribuable");
		}
		if(!$this->input->post('supprimerDec')==""){
			$this->Model->suppDec($this->session->userdata('numDec1'));
			$this->session->set_flashdata('alertSupp',"La déclaration numéro ".$this->session->userdata('numDec1')." a été supprimée");
			redirect(base_url()."Controlleur/acceuilContribuable");
			$this->session->set_flashdata('alertSupp',"");
			$this->session->set_userdata('numDec1',"");
		}

		
	}


	public function essai(){
		echo $this->session->flashdata("expt")+$this->session->flashdata("expnt");
		 
		
	}
}