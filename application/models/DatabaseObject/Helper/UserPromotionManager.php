<?php

	class DatabaseObject_Helper_UserPromotionManager extends DatabaseObject
	{
			public static function verifyDuplicateEmail($db, $email){
				$select = $db->select();
				$select->from('user_promtion', '*')
				->where('email= ?', $email);
				$result = $db->fetchAll($select);
				if(count($result)==0){
					return true;	
				}else{
					return false;	
				}
			}
			
			public static function verifyDuplicateOrganiztionName($db, $name){
				$select = $db->select();
				$select->from('user_promtion', '*')
				->where('name_of_organization= ?', $name);
				$result = $db->fetchAll($select);
				if(count($result)==0){
					return true;	
				}else{
					return false;	
				}
			}
			
			public static function updatePromotionApplicationStatus($db, $status, $id){
				
				$data = array('promotion_application_status'=>$status);
				return $db->update('user_promotion', $data, 'user_promotion_id = '.$id);
			}
	
	}
?>