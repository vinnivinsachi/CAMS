<?php

	//must have getProductForUser()
	//must have generateGSDetailsSession()
	class DatabaseObject_UserPromotion extends DatabaseObject
	{
		
		public function __construct($db){
			parent::__construct($db, 'user_promotion', 'user_promotion_id');
			$this->add('event_id', '');
			$this->add('promotion_type');
			$this->add('organization_type');
			$this->add('promotion_application_status', 'In_process');
			$this->add('name_of_organization');
			$this->add('primary_contact');
			$this->add('address_one');
			$this->add('city');
			$this->add('state');
			$this->add('zip');
			$this->add('country');
			$this->add('phone_number');
			$this->add('email');
			$this->add('organization_website');
			$this->add('ts_created', time(), self::TYPE_TIMESTAMP);
			$this->add('last_updated');
			//this attribute is purely for the sake of passing it to other objects
		}
		
		
		//because of all the constraints make sure that all the profile stuff that is connected iwth the product must have something done to it when messing with the database. 
		protected function postLoad(){
			return true;
		}
		
	
		protected function preUpdate()
        {
			return true;
        }
		
		
		
		protected function preDelete(){
			return true;
		}
		
		protected function preInsert(){
			return true;
		}
		
		protected function postInsert(){
			return true;
		}
		
		
		
	}

?>