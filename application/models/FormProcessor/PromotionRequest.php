<?php
	class FormProcessor_PromotionRequest extends FormProcessor
	{
	
		protected $db = null;
		protected $_validateOnly = false;
		public $application = array();
		public $userID;

		public function __construct($db, $userID)
		{
			parent::__construct();
			$this->db = $db;
			$this->userID = $userID;
			$this->application = DatabaseObject_Helper_UserManager::userApplicationRetrieval($db, $this->userID);
			if($this->application){
				foreach($this->application[0] as $k =>$v){
					
					$this->$k = $v;
				}
			}
		}
		
		public function validateOnly($flag)
		{
			$this->_validateOnly =(bool)$flag;
		}
		
		public function process(Zend_Controller_Request_Abstract $request)
		{
			
			$application['promotion_type']=$request->getParam('promotion_type');
			$application['address_one']=$request->getParam('address_one');
			$application['name_of_organization']=$request->getParam('name_of_organization');
			$application['city']=$request->getParam('city');
			$application['zip']=$request->getParam('zip');
			$application['state']=$request->getParam('state');
			$application['country']=$request->getParam('country');
			$application['phone_number']=$request->getParam('phone_number');
			$application['user_id']=$this->userID;
			$application['status']='in process';
			
			if($application['promotion_type']=='' or !isset($application['promotion_type'])){
				$this->addError('promotion_type', 'Please select a valid promotion type.');
			}else{
				$this->promotion_type = $application['promotion_type'];
			}
			
			if($application['name_of_organization']=='' or !isset($application['name_of_organization'])){
				$this->addError('name_of_organization', 'Please enter a name for your organization');
			}else{
				$this->name_of_organization = $application['name_of_organization'];
			}
			
			if($application['address_one']=='' or !isset($application['address_one'])){
				$this->addError('address_one', 'Please enter a name for your organization');
			}else{
				$this->address_one = $application['address_one'];
			}	
			
			if($application['city']=='' or !isset($application['city'])){
				$this->addError('city', 'Please enter a name for your organization');
			}else{
				$this->city = $application['city'];
			}
			
			if($application['zip']=='' or !isset($application['zip'])){
				$this->addError('zip', 'Please enter a name for your organization');
			}else{
				$this->zip = $application['zip'];
			}
			
			if($application['state']=='' or !isset($application['state'])){
				$this->addError('state', 'Please enter a name for your organization');
			}else{
				$this->state = $application['state'];
			}
			
			if($application['country']=='' or !isset($application['country'])){
				$this->addError('country', 'Please enter a name for your organization');
			}else{
				$this->country = $application['country'];
			}
			
			if($application['phone_number']=='' or !isset($application['phone_number'])){
				$this->addError('phone_number', 'Please enter a name for your organization');
			}else{
				$this->phone_number = $application['phone_number'];
			}
			
			
			if(!$this->hasError()){
				$result=DatabaseObject_Helper_UserManager::applyforpromotionalcode($this->db, $application);
			}
			
			return !$this->hasError(); 
		}
	}	