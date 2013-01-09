<?php
	class FormProcessor_PromotionApplication extends FormProcessor
	{
	
		protected $db = null;
		protected $_validateOnly = false;
		public $application = array();
		public $applicationID;
		public $userPromotion = NULL;

		public function __construct($db, $applicationID='')
		{
			parent::__construct();
			$this->db = $db;
			$this->applicationID = $applicationID;
			
			if($this->applicationID !=''){
				//echo 'here at retrival';
				$this->userPromotion = new DatabaseObject_UserPromotion($this->db);
					
				$this->userPromotion->load($applicationID);
				
				//Zend_Debug::dump($this->userPromotion);
				
				$this->application = DatabaseObject_Helper_UserManager::userApplicationRetrieval($db, $this->applicationID);
				if($this->application){
					foreach($this->application[0] as $k =>$v){
						$this->$k = $v;
					}
				}
				
				//Zend_Debug::dump($this->application);
			}
		
		}
		
		public function validateOnly($flag)
		{
			$this->_validateOnly =(bool)$flag;
		}
		
		public function process(Zend_Controller_Request_Abstract $request)
		{
			
			$application['promotion_type']=$request->getParam('promotion_type');
			$application['organization_type']=$request->getParam('organization_type');
			$application['address_one']=$request->getParam('address_one');
			$application['primary_contact']=$request->getParam('primary_contact');
			$application['email']=$request->getParam('email');
			$application['name_of_organization']=$request->getParam('name_of_organization');
			$application['city']=$request->getParam('city');
			$application['zip']=$request->getParam('zip');
			$application['state']=$request->getParam('state');
			$application['country']=$request->getParam('country');
			$application['phone_number']=$request->getParam('phone_number');
			$application['email']=$request->getParam('email');
			$application['user_promotion_id']=$request->getParam('id');
			$application['organization_website']=$request->getParam('organization_website');
			$application['status']=$request->getParam('status');
			
			//echo 'here at processing <br />';
			$this->organization_website=$application['organization_website'];
			//echo $this->organization_website;
			if(!isset($application['organization_website'])){
				
				$application['organization_website']='';
				$this->organization_website = '';
			}
			if($application['promotion_type']=='' or !isset($application['promotion_type'])){
				$this->addError('promotion_type', 'Please select a valid promotion type.');
			}else{
				$this->promotion_type = $application['promotion_type'];
			}
			
			if($application['organization_type']=='' or !isset($application['organization_type'])){
				$this->addError('organization_type', 'Please select a valid organization type.');
			}else{
				$this->organization_type = $application['organization_type'];
			}
			
			if($application['name_of_organization']=='' or !isset($application['name_of_organization'])){
				$this->addError('name_of_organization', 'Please enter a name for your organization');
			
			}else{
				$this->name_of_organization = $application['name_of_organization'];
			}
			
			
			if($application['primary_contact']=='' or !isset($application['primary_contact'])){
				$this->addError('primary_contact', 'Please enter a name for your organization');
			}else{
				$this->primary_contact = $application['primary_contact'];
			}
			
			if($application['address_one']=='' or !isset($application['address_one'])){
				$this->addError('address_one', 'Please enter an address for your organization');
			}else{
				$this->address_one = $application['address_one'];
			}	
			
			if($application['city']=='' or !isset($application['city'])){
				$this->addError('city', 'Please enter a city for your organization');
			}else{
				$this->city = $application['city'];
			}
			
			if($application['zip']=='' or !isset($application['zip'])){
				$this->addError('zip', 'Please enter a zip for your organization');
			}else{
				$this->zip = $application['zip'];
			}
			
			if($application['state']=='' or !isset($application['state'])){
				$this->addError('state', 'Please enter a state for your organization');
			}else{
				$this->state = $application['state'];
			}
			
			if($application['country']=='' or !isset($application['country'])){
				$this->addError('country', 'Please enter a country for your organization');
			}else{
				$this->country = $application['country'];
			}
			
			if($application['phone_number']=='' or !isset($application['phone_number'])){
				$this->addError('phone_number', 'Please enter a phone number for your organization');
			}else{
				$this->phone_number = $application['phone_number'];
			}
			
			
			
			
			
			$validator = new Zend_Validate_EmailAddress();
			
			if(strlen($application['email'])==0)
			{

				$this->addError('email', 'Please enter you email address');
			}
			elseif(!$validator->isValid($application['email']))
			{
				$this->addError('email', 'Please enter a valid email address');
			}else{
				$this->email = $application['email'];
			}
			
			if(!$this->hasError()){
				
				
					
				if($this->userPromotion->getId()){
					
					
					if($this->userPromotion->event_id && $this->userPromotion->event_id!='0'){
						$data=array('status'=>'NA');
						$this->db->update('events', $data, 'event_id='.$this->userPromotion->event_id);						
					}
					
					$this->userPromotion->promotion_application_status = 'Reapplying';

				}
				
				$this->userPromotion->organization_type = $this->organization_type;
				$this->userPromotion->promotion_type =	$this->promotion_type;
				$this->userPromotion->name_of_organization =	$this->name_of_organization;
				$this->userPromotion->primary_contact =	$this->primary_contact;
				$this->userPromotion->address_one =	$this->address_one;
				$this->userPromotion->city =	$this->city;
				$this->userPromotion->zip =	$this->zip;
				$this->userPromotion->state =	$this->state;
				$this->userPromotion->country =	$this->country;
				$this->userPromotion->phone_number = $this->phone_number;
				$this->userPromotion->email =	$this->email;
				$this->userPromotion->event_id='';
				$this->userPromotion->organization_website =$this->organization_website;
				//echo 'here at setting organization_website: '.$this->organization_website;
				
				$this->userPromotion->last_updated = date('Y-m-d G:i:s');					

				$this->userPromotion->save();
				
				//Zend_Debug::dump($this->userPromotion);
				
				//echo 'saved: '.$this->userPromotion->organization_website;
			}
			
			return !$this->hasError(); 
		}
	}	