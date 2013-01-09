<?php

	class DatabaseObject_ShoppingCart extends DatabaseObject
	{
		public $shippingAddress;
		public $products = array();
		public function __construct($db){
			parent::__construct($db, 'shopping_cart', 'cart_id');
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
			$this->add('ts_created', time(), self::TYPE_TIMESTAMP);
			//$this->shippingAddress = new DatabaseObject_OrderShippingAddress($db);
		}
		
		protected function preInsert(){
			return true;
		}
		
		protected function postInsert(){
			return true;
		}
		
		protected function preDelete(){
			
			return true;
				
		}
		
		protected function postLoad(){
			//$this->shippingAddress->load($this->order_shipping_id);	
		}
	
		public function loadCartOnly($order_unique_id){
			$select = $this->_db->select();
			$select->from('shopping_cart')
				   ->where('order_unique_id = ?', $order_unique_id);
			echo $select;
			return $this->_load($select);
		}
		
		/*public function loadCartProductsForDeletion(){
			$select = $this->_db->select();
			$select->from('shopping_cart_profile', 'shopping_cart_profile_id')
					->where('order_unique_id = ?', $this->order_unique_id);
			//echo $select;
			$idArray = $this->_db->fetchAll($select);
			//Zend_Debug::dump($productArray);
			foreach($idArray as $k=>$v){
			echo $v['shopping_cart_profile_id'];
			$this->products[$v['shopping_cart_profile_id']]=new DatabaseObject_ShoppingCartProfile($this->_db);
			$this->products[$v['shopping_cart_profile_id']]->load($v);
			}
			
		}*/
		
		
		public function loadCartProducts(){
			$select = $this->_db->select();
			$select->from('shopping_cart_profile_simple', '*')
					->where('order_unique_id = ?', $this->order_unique_id);
			echo $select;
			$productArray = $this->_db->fetchAll($select);
			//Zend_Debug::dump($productArray);
			return $productArray;
		}
	}
?>