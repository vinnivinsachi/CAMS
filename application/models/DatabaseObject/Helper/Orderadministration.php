<?php

	class DatabaseObject_Helper_Orderadministration extends DatabaseObject
	{
		public static function retrieveallorders($db){
			$select = $db->select();
			$select->from('orders', '*');
			return $db->fetchAll($select);
		}
		
		public static function retrieveNotesForOrders($db, $unique_id){
			$select = $db->select();
			$select->from('order_profile_simple_notes', '*')
			->where('order_unique_id = ?', $unique_id);
			return $db->fetchAll($select);
		}
		
	}
?>