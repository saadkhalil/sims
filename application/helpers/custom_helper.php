<?php
if (! defined('BASEPATH')) exit('No direct script access allowed');
 
if (! function_exists('last_insert_id')) {
    function last_insert_id($tablename)
    {

        $ci = get_instance();
		$ci->db->select('ID');
		$ci->db->order_by('ID','DESC');
		$ci->db->limit(1);
		$query=$ci->db->get($tablename);
		
		$result=$query->row();
		if(!empty($result)){
			$lastid=$result->ID;
		}else{
			$lastid=1;
		}
       	return $lastid;
        
    }
}
?>