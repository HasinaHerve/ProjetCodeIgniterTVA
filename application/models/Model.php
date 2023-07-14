<?php
class Model extends CI_Model {
	public function count($idCentre)
	{
		return $a=$this->db->query("SELECT count('numH') as hist FROM historique where lu is null and (numActeur in (SELECT im from personnel where idCentre=".$idCentre.") or numActeur in (SELECT nif from contribuable where idCentre=".$idCentre."))")->row_array();
	}
	public function count1($idCentre)
	{
		return $a=$this->db->query("SELECT count('numH') as hist FROM historique where (lu is null and (numActeur in (SELECT im from personnel where idCentre=".$idCentre.") or numActeur in (SELECT nif from contribuable where idCentre=".$idCentre."))) and declaration is not null")->row_array();
	}
	public function ajoutPers($table)
	{
		$this->db->insert('personnel', $table);
	}
	public function tva($numAct,$annee){
		return $tvac=$this->db->query("SELECT * FROM tvac where numDec in (SELECT numDec from declarationtva where numAct=".$numAct." and annee=".$annee." )")->result_array();
	}
	public function ajoutDec($table)
	{
		$this->db->insert('declarationtva', $table);
	}
	public function ajoutTvac($table)
	{
		$this->db->insert('tvac', $table);
	}
	public function ajoutDed($table)
	{
		$this->db->insert('deduction', $table);
	}
	public function ajoutC($table)
	{
		$this->db->insert('contribuable', $table);
	}
	public function ajoutAct($table)
	{
		$this->db->insert('activite', $table);
	}
	public function ajoutH($table)
	{
		$this->db->insert('historique', $table);
	}
	public function tousDec()
	{
		return $dec=$this->db->get('declarationtva')->result_array();
	}
	public function dec($nif)
	{
		return $dec=$this->db->query("SELECT * FROM declarationtva where numAct in (SELECT numAct from activite where nif=".$nif.")")->result_array();
	}
	public function tvac($numDec)
	{
		return $tvac=$this->db->query("SELECT * FROM tvac where numDec=".$numDec)->row_array();
	}
	public function deduction($numDec)
	{
		return $deduction=$this->db->query("SELECT * FROM deduction where numDec=".$numDec)->row_array();
	}

	public function tousPers()
	{
		return $perso=$this->db->get('personnel')->result_array();
	}
	public function tousAct()
	{
		return $act=$this->db->get('activite')->result_array();
	}
	public function tousC()
	{
		return $act=$this->db->get('contribuable')->result_array();
	}
	public function act($nif)
	{
		return $act=$this->db->query("SELECT * FROM Activite where nif=".$nif)->result_array();
	}
	public function act1($numDec)
	{
		return $act=$this->db->query("SELECT * FROM Activite where numAct in (SELECT numAct from Declarationtva where numDec=".$numDec.")")->row_array();
	}
	public function nifDec($numDec)
	{
		return $nif=$this->db->query("SELECT nif FROM Activite where numAct in (SELECT numAct from Declarationtva where numDec=".$numDec.")")->row_array();
	}
	public function dec1($numDec)
	{
		return $dec=$this->db->query("SELECT * from Declarationtva where numDec=".$numDec)->row_array();
	}
	public function pers($im)
	{
		$this->db->where('im',$im);
		return $centre=$this->db->get('personnel')->row_array();
	}
	public function c($nif)
	{
		$this->db->where('nif',$nif);
		return $c=$this->db->get('contribuable')->row_array();
	}
	public function cCin($cin)
	{
		$this->db->where('cinC',$cin);
		return $c=$this->db->get('contribuable')->row_array();
	}
	public function pCin($cin)
	{
		$this->db->where('cinP',$cin);
		return $c=$this->db->get('personnel')->row_array();
	}
	public function modifHist($num,$table)
	{
		$this->db->where('numH',$num);
		$this->db->update('historique',$table);
	}
	public function modifPers($im,$table)
	{
		$this->db->where('im',$im);
		$this->db->update('personnel',$table);
	}
	public function modifDec($numDec,$table)
	{
		$this->db->where('numDec',$numDec);
		$this->db->update('declarationtva',$table);
	}
	public function modifTvac($numDec,$table)
	{
		$this->db->where('numDec',$numDec);
		$this->db->update('tvac',$table);
	}
	public function modifDed($numDec,$table)
	{
		$this->db->where('numDec',$numDec);
		$this->db->update('deduction',$table);
	}

	public function modifAct($numAct,$table)
	{
		$this->db->where('numAct',$numAct);
		$this->db->update('activite',$table);
	}
	public function modifC($nif,$table)
	{
		$this->db->where('nif',$nif);
		$this->db->update('contribuable',$table);
	}
	public function suppPers($im)
	{
		$this->db->query("DELETE FROM historique where numActeur=".$im);
		$this->db->where('im',$im);
		$this->db->delete('personnel');
	}
	public function suppAct($nif)
	{
		$this->db->query("DELETE FROM tvac where numDec in (SELECT numDec from declarationtva where numAct in (SELECT numAct from activite where nif=".$nif."))");
		$this->db->query("DELETE FROM deduction where numDec in (SELECT numDec from declarationtva where numAct in (SELECT numAct from activite where nif=".$nif."))");
		$this->db->query("DELETE FROM declarationtva where numAct in (SELECT numAct from activite where nif=".$nif.")");
		$this->db->where('nif',$nif);
		$this->db->delete('activite');
	}
	public function suppAct1($numAct)
	{
		$this->db->query("DELETE FROM tvac where numDec in (SELECT numDec from declarationtva where numAct=".$numAct.")");
		$this->db->query("DELETE FROM deduction where numDec in (SELECT numDec from declarationtva where numAct=".$numAct.")");
		$this->db->query("DELETE FROM declarationtva where numAct=".$numAct);
		$this->db->where('numAct',$numAct);
		$this->db->delete('activite');
		
	}
	public function centre()
	{
		return $centre=$this->db->get('centreFiscal')->result_array();
	}
	public function centreN($nomCentre)
	{
		$this->db->where('nomCentre',$nomCentre);
		return $centre=$this->db->get('centreFiscal')->row_array();
	}
	public function centreN1($idCentre)
	{
		$this->db->where('idCentre',$idCentre);
		return $centre=$this->db->get('centreFiscal')->row_array();
	}
	public function dernierC($idCentre)  
	{
		return $c=$this->db->query("SELECT * FROM Contribuable where idCentre=".$idCentre." order by nif desc limit 1")->row_array();
	}
	public function dernierDec()  
	{
		return $dec=$this->db->query("SELECT * FROM declarationtva order by numDec desc limit 1")->row_array();
	}
	public function suppC($nif)
	{
		$this->db->where('nif',$nif);
		$this->db->delete('contribuable');
	}
	public function suppDec($numDec)
	{
		$this->db->query("DELETE FROM tvac where numDec=".$numDec);
		$this->db->query("DELETE FROM deduction where numDec=".$numDec);
		$this->db->query("DELETE FROM declarationtva where numDec=".$numDec);
	}
	public function contribuable($idCentre)
	{
		$this->db->where('idCentre',$idCentre);
		return $c=$this->db->get('contribuable')->result_array();
	}
	public function historique($idCentre)  
	{
		return $hist=$this->db->query("SELECT * FROM historique where numActeur in (SELECT im from personnel where idCentre=".$idCentre.") or numActeur in (SELECT nif from contribuable where idCentre=".$idCentre.") order by numH asc")->result_array();
	}
	public function historique1($idCentre)  
	{
		return $hist=$this->db->query("SELECT * FROM historique where (numActeur in (SELECT im from personnel where idCentre=".$idCentre.") or numActeur in (SELECT nif from contribuable where idCentre=".$idCentre.")) and declaration is not null")->result_array();
	}
	public function rechH($idCentre,$date1,$date2)  
	{
		return $hist=$this->db->query("SELECT * FROM historique where (numActeur in (SELECT im from personnel where idCentre=".$idCentre.") or numActeur in (SELECT nif from contribuable where idCentre=".$idCentre.")) and historique.date BETWEEN \"".$date1."\" AND \"".$date2."\"")->result_array();
	}
	public function rechH1($idCentre,$date1,$date2)  
	{
		return $hist=$this->db->query("SELECT * FROM historique where numActeur in (SELECT nif from contribuable where idCentre=".$idCentre.") and declaration is not null and historique.date BETWEEN \"".$date1."\" AND \"".$date2."\"")->result_array();
	}
	public function decAff($idCentre)  
	{
		return $dec=$this->db->query("SELECT * FROM declarationtva where numAct in (SELECT numAct from activite where nif in (SELECT nif from contribuable where idCentre=".$idCentre."))")->result_array();
	}
	public function personnel($idCentre)
	{
		$this->db->where('idCentre',$idCentre);
		return $p=$this->db->get('personnel')->result_array();
	}
	//compte personnel
	public function ajoutCP($table)
	{
		$this->db->insert('comptep', $table);
	}
	public function compteP($im)
	{
		$this->db->where('im',$im);
		return $p=$this->db->get('compteP')->row_array();
	}
	public function modifCompteP($num,$table)
	{
		$this->db->where('numCP',$num);
		$this->db->update('compteP',$table);
	}
	public function tousCP($idCentre)
	{
		return $p=$this->db->query("SELECT * FROM compteP where im in (SELECT DISTINCT im FROM personnel where idCentre=".$idCentre.")")->result_array();
	}
	public function suppCompteP($im)
	{
		$this->db->where('im',$im);
		$this->db->delete('compteP');
	}

	//compte contribuable
	public function ajoutCC($table)
	{
		$this->db->insert('comptec', $table);
	}
	public function compteC($nif)
	{
		$this->db->where('nif',$nif);
		return $c=$this->db->get('compteC')->row_array();
	}
	public function tousCC($idCentre)
	{
		return $p=$this->db->query("SELECT * FROM compteC where nif in (SELECT DISTINCT nif FROM contribuable where idCentre=".$idCentre.")")->result_array();
	}
	public function modifCompteC($num,$table)
	{
		$this->db->where('numCC',$num);
		$this->db->update('compteC',$table);
	}
	public function suppCompteC($nif)
	{
		$this->db->where('nif',$nif);
		$this->db->delete('compteC');
	}



	public function getPers($im)
	{
		$this->db->where('im',$im);
		return $pers=$this->db->get('personnel')->row_array();
	}
	



	public function getU($im)
	{
		$this->db->where('im',$im);
		return $ut=$this->db->get('utilisateur')->row_array();
	}
	public function allUt()
	{
		return $ut=$this->db->get('utilisateur')->result_array();
	}
	public function getUt($im)
	{
		$this->db->where('im',$im);
		return $ut=$this->db->get('utilisateur')->row_array();
	}
	
	public function updateR($im,$tab)
	{
		$this->db->where('im',$im);
		$this->db->update('reclassement',$tab);
	}
	public function deleteP($im)
	{
		$this->db->where('im',$im);
		$this->db->delete('personnel');
	}
	public function deleteR($im)
	{
		$this->db->where('im',$im);
		$this->db->delete('reclassement');
	}
	public function deleteU($im)
	{
		$this->db->where('im',$im);
		$this->db->delete('utilisateur');
	}
	public function updateU($im,$tab)
	{
		$this->db->where('im',$im);
		$this->db->update('utilisateur',$tab);
	}
	public function getMsg($imU,$imR)
	{
		$this->db->where('im',$imU);
		$this->db->where('imR',$imR);
		$this->db->group_by('dateE');
		$this->db->order_by('heureE');
		return $ut=$this->db->get('message')->result_array();
	}
	public function getMsg1($imU,$imR)
	{
		$this->db->where('im',$imR);
		$this->db->where('imR',$imU);
		$this->db->group_by('dateE');
		$this->db->order_by('heureE');
		return $ut=$this->db->get('message')->result_array();
	}
}