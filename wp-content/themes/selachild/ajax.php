<?php 

if(isset($_POST))
{
	$tab = $_POST['tab'];
	$condition1 = get_user_meta(get_current_user_id(),'lespas',true);
	$condition2 = get_user_meta(get_current_user_id(),'totalpas',true); 
	if($condition1 != '')
	{
		$valeur1 = unserialize($condition1); //string to array
	}
	else
	{
		$valeur1 = serialize($tab);	// array to string
	}
	$stockage = array_merge($tab, $valeur1);
	console.log($stockage);
	$stockage = serialize($stockage); // array to string
	$condition2 = $condition2 + $tab['nbpas'];
	update_user_meta(get_current_user_id(), 'lespas', $stockage);
	update_user_meta(get_current_user_id(), 'totalpas', $condition2);
	echo count(unserialize($stockage));
	die();
}

?>