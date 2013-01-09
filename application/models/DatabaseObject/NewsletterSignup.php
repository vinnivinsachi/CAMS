<?php

	class DatabaseObject_NewsletterSignup extends DatabaseObject
	{
		public $profile=null;
		public $images = array();
		
		const EVENT_STATUS_DRAFT = 'D';
		const EVENT_STATUS_LIVE = 'L';
		
		public function __construct($db)
		{
		
			parent::__construct($db, 'newsletter_signup', 'newsletter_signup_id');
			$this->add('promotion_id', Text_Password::create(8, 'unpronounceable'));
			$this->add('ts_created', time(), self::TYPE_TIMESTAMP);
			$this->add('ts_end');
			$this->add('signed_off', 0);
			$this->add('promotion_used', 0);
			$this->add('email_signup');
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
			//$this->profile->ts_expire=$this->ts_end;

			return true;
		}
		
		protected function preDelete()
		{
			
			return true;
		}
		
		protected function preInsert()
		{
			
			return true;
		}
		
		public function loadByEmail($email){
			$select=$this->_db->select();
			$select->from('newsletter_signup', '*')
			->where('email_signup = ?', $email);
			
			return $this->_load($select);
		}
	}


?>