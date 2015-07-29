<?php 

if(isset($_POST))
{
	$tab = $_POST['tab'];
	$condition1 = get_user_meta(get_current_user_id(),'lespas',true);
	$condition2 = get_user_meta(get_current_user_id(),'totalpas',true); 
	if($condition1 != '')
	{
		$valeur1 = unserialize($condition1);
	}
	else
	{
		$valeur1 = serialize($tab);
	}
	$stockage = array_merge($tab, $valeur1);
	$stockage = serialize($stockage);
	$condition2 = $condition2 + $tab['nbpas'];
	update_user_meta(get_current_user_id(), 'lespas', $stockage);
	update_user_meta(get_current_user_id(), 'totalpas', $condition2);
	echo count(unserialize($stockage));
	die();
}

?>