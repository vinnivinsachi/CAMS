<?php
	class DatabaseObject_OrderProfileSimpleNotes extends DatabaseObject
	{
		
		
		public function __construct($db){
			parent::__construct($db, 'order_profile_simple_notes', 'order_profile_simple_notes_id');
		
			$this->add('order_unique_id');
			$this->add('notes');
			$this->add('ts_created',time(), self::TYPE_TIMESTAMP);
			//$this->profile= new Profile_ShoppingCartProfileAttribute($db);
		}
		
		protected function preInsert(){
			return true;
		}
		
		protected function postInsert(){
			//$this->profile->setProfileId($this->getId());
			//$this->profile->save(false);
			return true;
		}
		
		protected function preDelete(){
		
			return true;
		}
		
		protected function postLoad(){
		
		}
	}
?>