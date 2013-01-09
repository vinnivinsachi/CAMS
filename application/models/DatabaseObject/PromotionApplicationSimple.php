<?php

	//pg 221
	class DatabaseObject_PromotionApplicationSimple extends DatabaseObject
	{		
		const STATUS_DRAFT = 'D';
		const STATUS_LIVE = 'L';
		
		
		private $databaseColumn = 'id';


		public function __construct($db)
		{
			parent::__construct($db, 'promotionapplicationsimple', 'promotion_application_simple_id'); //database, table, idField
			$this->add('organization_name');
			$this->add('organization_email');
			$this->add('organization_primary_contact');
			$this->add('organization_primary_phone');
			$this->add('ts_created', time(), self::TYPE_TIMESTAMP);
						
		}
		
		protected function preInsert()
		{
			return true;
		}
		
		
		
		protected function postLoad()
		{
			
	
		}
		
		protected function postInsert()
		{
			
			return true;
		}
		
		protected function postUpdate()
		{
			
			return true;
		}
		
		protected function preDelete() 
		{
		
			return true;
		}
		
		public function sendLive()
		{
			
		}		
		
		public function loadByID($id)
		{
			$select = $this->_db->select();
			
			$select->from('promotionapplicationsimple')
				   ->where('promotion_application_simple_id = ?', $id);
				   		
			return $this->_load($select);
		}
		
		public static function GetObjects($db, $options=array()) 
		{
			
		}

	}
?>