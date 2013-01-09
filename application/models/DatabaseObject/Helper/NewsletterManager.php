<?php

	class DatabaseObject_Helper_NewsletterManager extends DatabaseObject
	{
		static public function loadAllSubscribers($db, $options=array()){
			
			$select= $db->select();
			$select->from('newsletter_signup', '*');
			return $db->fetchAll($select);
		}
		
		static public function setSubscriberAsCame($db, $id){
			
			$data = array('promotion_used'=>'1');
			
			$db->update('newsletter_signup', $data, "newsletter_signup_id = '".$id."'");
		}
		
		static public function setSubscriberAsUnCame($db, $id){
			
			$data = array('promotion_used'=>'0');
			
			$db->update('newsletter_signup', $data, "newsletter_signup_id = '".$id."'");
		}
				
	}
?>