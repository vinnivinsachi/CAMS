<?php

	class FormProcessor_PromotionApplicationSimple extends FormProcessor
	{
		protected $db = null;
		//public $user = null;
		public $post = null;
		protected $_validateOnly = false;

		
		public function __construct($db)
		{
			parent::__construct();
			
			$this->db = $db;
			
			$this->post= new DatabaseObject_PromotionApplicationSimple($db);			
			
		}
		
		public function validateOnly($flag)
		{
			$this->_validateOnly =(bool)$flag;
		}
		
		public function process(Zend_Controller_Request_Abstract $request)
		{
			//echo "<br/>here at process.";
			
			$this->organization_name = $this->sanitize($request->getPost('organization_name'));
			//$this->last_name =$this->sanitize($request->getPost('last_name'));
			
			if(strlen($this->organization_name)==0 || $this->organization_name=='Organization name')
			{
				$this->addError('organization_name', 'Please enter your organizations name');//this is a giving FormProcessor.php function. 
			}
			
			$this->organization_primary_contact = $this->sanitize($request->getPost('organization_primary_contact'));
			//$this->last_name =$this->sanitize($request->getPost('last_name'));
			
			if(strlen($this->organization_primary_contact)==0 || $this->organization_primary_contact=='Organization primary contact')
			{
				$this->addError('organization_primary_contact', 'Please enter your organizations primary contact');//this is a giving FormProcessor.php function. 
			}
			
			
			$this->organization_primary_phone = $this->sanitize($request->getPost('organization_primary_phone'));
			if(strlen($this->organization_primary_phone)==0 || $this->organization_primary_phone=='Organization primary phone')
			{
				$this->addError('organization_primary_phone', 'Please enter your organizations primary phone contact');//this is a giving FormProcessor.php function. 
			}
			
			
			$this->organization_email = $this->sanitize($request->getPost('organization_email'));
			$validator = new Zend_Validate_EmailAddress();
			
			if(strlen($this->organization_email)==0)
			{
				$this->addError('organization_email', 'Please enter your primary email address');
			}
			elseif(!$validator->isValid($this->organization_email))
			{
				$this->addError('organization_email', 'Please enter a valid email address');
			}
			else
			{
				$this->organization_email = strtolower($this->organization_email);
			}
			
			
			
			
			//echo "<br/>here before there is error().";
			
			if(!$this->_validateOnly && !$this->hasError())
			{
				$this->post->organization_name = $this->organization_name;
				$this->post->organization_email = $this->organization_email;
				$this->post->organization_primary_contact=$this->organization_primary_contact;
				$this->post->organization_primary_phone = $this->organization_primary_phone;
				
				
				//$this->post->description = $this->description;
				$this->post->save();
			
			}
			
			return !$this->hasError();
		
		}
	}
?>