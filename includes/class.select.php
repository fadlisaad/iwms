<?php
/**
 * Copyright 2013 apadmedia.com
 * Developed by: Mohd Fadli Saad
 * This file is part of IWMS
 * Function to generate select dropdown (generic)
 */
class select
{
	function dropdown($name)
	{
		$query 	= "SELECT * FROM $name ORDER BY name ASC";
		$result = mysql_query($query);
		
		if($name == 'years'){
			$form 	= '<select id="'.$name.'" name="'.$name.'[]" class="validate[required] chzn-select xxlarge" multiple data-placeholder="Choose year...">';
				while($data = mysql_fetch_assoc($result))
				{
					$form .= '<option value="'.$data['name'].'" class="add">'.$data['name'].'</option>';
				}
			$form .= '</select>';
		}
		else {
			$form 	= '<select id="'.$name.'" name="'.$name.'" class="validate[required]">';
			$form 	.= '<option value="0" class="add">Please select '.$name.'</option>';
				while($data = mysql_fetch_assoc($result))
				{
					$form .= '<option value="'.$data['id'].'" class="add">'.$data['name'].'</option>';
				}
			$form .= '</select>';
		}
		return $form;
	}
	
	function drop_edit($name,$id)
	{
		$query 	= "SELECT * FROM $name ORDER BY name ASC";
		$result = mysql_query($query);
		
		$form 	= '<select id="'.$name.'" name="'.$name.'" class="validate[required]">';
			while($data = mysql_fetch_assoc($result))
			{
				if($id == $data['id']){
					$form  .= '<option value="'.$data['id'].'" selected="selected" class="edit">'.$data['name'].'</option>';
				}
				$form .= '<option value="'.$data['id'].'" class="edit">'.$data['name'].'</option>';
			}
		$form .= '</select>';
		return $form;
	}
}
?>