<?php

	class DatabaseObject_OrderReview extends DatabaseObject
	{
		
		public function __construct($db){
			parent::__construct($db, 'order_review', 'order_review_id');
			$this->add('order_unique_id');
			$this->add('order_review');
			$this->add('ts_created', time(), self::TYPE_TIMESTAMP);
		}
		
		protected function preInsert(){
			return true;
		}
		
		protected function postInsert(){
			return true;
		}
		
		protected function postLoad(){
			//$this->shippingAddress->load($this->order_shipping_id);	
		}
		
			
		public function loadByID($id)
		{
			$select = $this->_db->select();
			
			$select->from('order_review')
				   ->where('order_review_id = ?', $id);
				   
				 //  echo "<br />$select<br />";
		
			return $this->_load($select);
		}
	
	}
?>