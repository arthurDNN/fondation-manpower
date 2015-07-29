<?php
class date{

	var $days = array('Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi','Dimanche');
	var $months = array('JANVIER','FEVRIER','MARS','AVRIL','MAI','JUIN','JUILLET','AOUT',
						'SEPTEMBRE','OCTOBRE','NOVEMBRE','DECEMBRE');

	function get_all($year)
	{
		$r = array();
		$date = new DateTime($year.'-01-01');
		// Ce que nous voulons : $r[ANNEE][MOIS][JOUR] = JOUR DE LA SEMAINE :
		while ($date->format('Y')<= $year) 
		{
			$y = $date->format('Y');
			$m = $date->format('n');
			$j = $date->format('j');
			$w = str_replace('0','7',$date->format('w'));
			$r[$y][$m][$j] = $w;
			$date->add(new DateInterval('P1D')); 
		}
		return $r;
	}
}
?>