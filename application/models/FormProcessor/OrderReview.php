<?php

	class FormProcessor_OrderReview extends FormProcessor
	{
		
		static $tags=array(
			'a' =>array('href', 'target','name'),
			'img' =>array('src', 'alt'),
			'b' =>array(),
			'strong' =>array(),
			'em' =>array(),
			'i' =>array(),
			'ul' =>array(),
			'li' =>array(),
			'ol' =>array(),
			'p' =>array(),
			'br' =>array(),
			);
		public function __construct($db, $id='')
		{
			parent::__construct();
			
			$this->db = $db;
			$this->review= new DatabaseObject_OrderReview($db);	
			$this->order_unique_id = $id;
		}
		
		public function process(Zend_Controller_Request_Abstract $request)
		{
			//echo "<br/>here at process.";
			
			$this->order_unique_id = $this->sanitize($request->getParam('order_unique_id'));
			if($this->order_unique_id =='' || $this->order_unique_id =='Order id'){
				$this->addError('order_unique_id', 'Please enter your order id for your review');	
			}
			
			$idCheck=DatabaseObject_Helper_Ordermanager::retrieveorderidforreview($this->db, $this->order_unique_id);
			if($idCheck==0){
			$this->addError('order_unique_id', 'Please enter a correct order id for your review');
			}elseif($idCheck==2){
			$this->addError('order_unique_id', 'You have already wrote a review for this order. Please enter another order id for your review');
			}
			
			$this->order_review = self::cleanHtml($request->getParam('order_review'));

			if($this->order_review==''){
				$this->addError('order_review', 'Please enter your review');
			}
			
			if(!$this->hasError())
			{
				$this->review->order_unique_id = $this->order_unique_id;
				$this->review->order_review = $this->order_review;
				$this->review->save();
			}
			
			return !$this->hasError();
		}
		
		//temporary placeholder for clean HTML
		public static function cleanHtml($html)
		{
			$chain = new Zend_filter();
			//$chain->addFilter(new Zend_Filter_StripTags(self::$tags));
			$chain->addFilter(new Zend_Filter_StringTrim());
			//$chain = new Zend_Filter_HtmlEntities();
			
			$html = $chain->filter($html);
			$html = stripslashes($html);
		
			//echo $html;
			$temp = $html;			
		while(1)
			{
				$html = preg_replace('/(<[^>]*)javascript:([^>]*>)/i', '$1$2', $html);
				
				//if nothing changed this iteration then break the loop
				if($html==$temp)
				{
					break;
				}
				
				$temp = $html;
			}
				

			return $html;
		}
		
	}
?>