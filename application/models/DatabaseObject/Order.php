<?php

	class DatabaseObject_Order extends DatabaseObject
	{
		public $shippingAddress;
				public $products = array();

		public function __construct($db){
			parent::__construct($db, 'orders', 'order_id');
				$this->add('order_unique_id');
			$this->add('purchase_type');
			$this->add('buyer_email');
			$this->add('buyer_name');
			$this->add('buyer_phone_number');
			$this->add('buyer_address');
			$this->add('buyer_city');
			$this->add('buyer_state');
			$this->add('buyer_zip');
			$this->add('buyer_country');
			$this->add('partner_organization_name');
			$this->add('partner_organization_primary_contact');
			$this->add('partner_organization_email');
			$this->add('partner_organization_phone');
			$this->add('partner_organization_address');
			$this->add('partner_organization_city');
			$this->add('partner_organization_state');
			$this->add('partner_organization_zip');
			$this->add('partner_organization_country');
			$this->add('total_number_items');
			$this->add('cart_costs');
			$this->add('promotion_code_used');
			$this->add('promotion_amount_deducted');
			$this->add('final_total_costs');
			$this->add('tracking');
			$this->add('status','ORDER_PLACED');
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
	
		public function loadOrderByUniqueID($order_unique_id){
			$select = $this->_db->select();
			$select->from('orders')
				   ->where('order_unique_id = ?', $order_unique_id);
			//echo $select;
			return $this->_load($select);
		}
		
		public function loadOrderProducts(){
			$select = $this->_db->select();
			$select->from('order_profile_simple', '*')
					->where('order_unique_id = ?', $this->order_unique_id);
			//echo $select;
			$productArray = $this->_db->fetchAll($select);
			//Zend_Debug::dump($productArray);
			$this->products = $productArray;
		}
		
		public function loadOrderProductsForSeller($seller_id){
			$select = $this->_db->select();
			$select->from(array('o'=>'order_profile'), '*')
					->where('uploader_id = ?', $seller_id)
					->where('order_unique_id = ?', $this->order_unique_id)
					->join(array('s'=>'order_profile_status_and_delivery'), 's.order_profile_id=o.order_profile_id');
			//echo $select;
			$productArray = $this->_db->fetchAll($select);
			//Zend_Debug::dump($productArray);
			foreach($productArray as $k=>$v){
				$attributeSelect = $this->_db->select();
				$attributeSelect->from('order_profile_attribute', '*')
				->where('order_profile_attribute_id = ? ', $v['order_profile_id']);
				$productAttribute = $this->_db->fetchAll($attributeSelect);
				$this->products[$v['order_profile_id']]=$v;
				$this->products[$v['order_profile_id']]['profile']=$productAttribute;
			}
			
		}
	}
?>