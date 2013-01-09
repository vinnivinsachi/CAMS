<?php
	class DatabaseObject_OrderProfileSimple extends DatabaseObject
	{
		public $productShippingAddress=null;
		public $profile =null;
		
		public function __construct($db){
			parent::__construct($db, 'order_profile_simple', 'order_profile_simple_id');
		
			$this->add('order_unique_id');
			$this->add('product_id'); 
			$this->add('product_type');
			$this->add('inventory_attribute_table'); //need
			$this->add('product_name');
			$this->add('product_price');
			$this->add('product_tag');
			$this->add('ts_created',time(), self::TYPE_TIMESTAMP);
			//$this->profile= new Profile_ShoppingCartProfileAttribute($db);
		}
		
		protected function preInsert(){
			return true;
		}
		
		protected function postInsert(){
			//$this->profile->setProfileId($this->getId());
			//$this->profile->save(false);
			return true;
		}
		
		protected function preDelete(){
			echo 'here at profile detlete';
		//	$this->profile->delete();
			echo 'here at profile delete 2';
			return true;
		}
		
		protected function postLoad(){
			//$this->shippingAddress->load($this->order_shipping_id);	
		//	$this->profile->setProfileId($this->getId());
		//	$this->profile->load();
		}
	
		public function loadCartOnly($order_unique_id){
			$select = $this->_db->select();
			$select->from('shopping_cart')
				   ->where('order_unique_id = ?', $order_unique_id);
			//echo $select;
			return $this->_load($select);
		}
		public function loadShippingAddressForProduct(){
		//	$this->productShippingAddress= new DatabaseObject_OrderShippingAddress($this->db);
		//	$this->productShippingAddress->load($this->order_shipping_address_id);
		}
	}
?>