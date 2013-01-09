<?php

	class FormProcessor_ShippingAddress extends FormProcessor
	{
		protected $db = null;
		public $shippingAddress;
		protected $_validateOnly = false;
		
		public function __construct($db, &$shipping)
		{
			parent::__construct();
		
			$this->shippingAddress = $shipping;
		}
	
		public function validateOnly($flag)
		{
			$this->_validateOnly =(bool)$flag;
		}
		
		public function process(Zend_Controller_Request_Abstract $request)
		{ 
		
			$this->buyer_name=$request->getPost('buyer_name');
			$this->buyer_phone_number=$request->getPost('buyer_phone_number');
			$this->buyer_email = $request->getPost('buyer_email');
			$this->buyer_address=$request->getPost('buyer_address');
			$this->buyer_city=$request->getPost('buyer_city');
			$this->buyer_state=$request->getPost('buyer_state');
			$this->buyer_zip=$request->getPost('buyer_zip');
			$this->buyer_country = $request->getPost('buyer_country');
			
			
			if(strlen($this->buyer_name)==0 || $this->buyer_name=='Your name')
			{
				$this->addError('buyer_name', 'Please enter your name');
			}
			
			$this->buyer_email = $this->sanitize($request->getPost('buyer_email'));
			$validator = new Zend_Validate_EmailAddress();
			
			if(strlen($this->buyer_email)==0 || $this->buyer_email=='Email')
			{

				$this->addError('buyer_email', 'Please enter you email address');
			}
			elseif(!$validator->isValid($this->buyer_email))
			{
				$this->addError('buyer_email', 'Please enter a valid email address');
			}
			
			if(strlen($this->buyer_phone_number)==0 || $this->buyer_phone_number=='Phone number')
			{
				$this->addError('buyer_phone_number', 'Please enter your phone number');
			}
			
			if(strlen($this->buyer_address)==0 || $this->buyer_address=='Address')
			{
				$this->addError('buyer_address', 'Please enter a valid address');
			}
			
			if(strlen($this->buyer_city)==0 || $this->buyer_city=='City')
			{
				$this->addError('buyer_city', 'Please enter a valid city');
			}
			
			if(strlen($this->buyer_state)==0 || $this->buyer_state=='State')
			{
				$this->addError('buyer_state', 'Please enter a valid state');
			}
			if(strlen($this->buyer_zip)==0 || $this->buyer_zip=='Zip')
			{
				$this->addError('buyer_zip', 'Please enter a valid zip');
			}
			if(strlen($this->buyer_country)==0 || $this->buyer_country=='Country')
			{
				$this->addError('buyer_country', 'Please enter a valid country');
			}
			
			if(!$this->_validateOnly && !$this->hasError()){
				
			$shippingInfo =  new Zend_Session_Namespace('shoppingCartInfoSession');
			$shippingInfo->shipping->buyer_name = $this->buyer_name;
			$shippingInfo->shipping->buyer_phone_number = $this->buyer_phone_number;
			$shippingInfo->shipping->buyer_city = $this->buyer_city;
			$shippingInfo->shipping->buyer_address = $this->buyer_address;
			$shippingInfo->shipping->buyer_state = $this->buyer_state;
			$shippingInfo->shipping->buyer_zip = $this->buyer_zip;
			$shippingInfo->shipping->buyer_email = $this->buyer_email;
			$shippingInfo->shipping->buyer_country = $this->buyer_country;
			$this->shippingAddress = $shippingInfo->shipping;	
			//Zend_Debug::dump($shippingInfo->shipping);
			}
			return !$this->hasError();
		}
	
	}