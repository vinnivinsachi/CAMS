<?php
	class DatabaseObject_ShoppingCartProfile extends DatabaseObject
	{
		public $productShippingAddress=null;
		public $profile =null;
		
		public function __construct($db){
			parent::__construct($db, 'shopping_cart_profile', 'shopping_cart_profile_id');
			
			$this->add('order_unique_id');
			$this->add('cart_id');
			$this->add('product_id'); 
			$this->add('product_type');
			$this->add('purchase_type');
			$this->add('inventory_attribute_table'); //need
			$this->add('product_inventory_id');
			$this->add('uploader_username');
			$this->add('uploader_email'); //need
			$this->add('uploader_id');
			$this->add('product_country_origin'); //need
			$this->add('product_name');
			$this->add('product_price');
			$this->add('product_tag');
			$this->add('backorder_time');
			$this->add('product_image_id');
			$this->add('reward_points_awarded');
			$this->add('domestic_shipping_rate'); //need
			$this->add('international_shipping_rate'); //need
			$this->add('current_shipping_rate'); //need
			$this->add('product_type_added_to_shopping_cart'); //need
			$this->add('order_shipping_id');
			$this->add('seller_receivable');//for seller
			$this->add('buyer_name');
			$this->add('buyer_id');
			$this->add('buyer_username');
			$this->add('buyer_email');
			$this->add('buyer_country');//buyer_network;
			$this->add('ts_created',time(), self::TYPE_TIMESTAMP);
			
			$this->profile= new Profile_ShoppingCartProfileAttribute($db);
		}
		
		protected function preInsert(){
			
			return true;
		}
		
		protected function postInsert(){
			$this->profile->setProfileId($this->getId());
			$this->profile->save(false);
			return true;
		}
		
		protected function preDelete(){
			echo 'here at profile detlete';
			$this->profile->delete();
			echo 'here at profile delete 2';
			return true;
		}
		
		protected function postLoad(){
			//$this->shippingAddress->load($this->order_shipping_id);	
			$this->profile->setProfileId($this->getId());
			$this->profile->load();
		}
	
		public function loadCartOnly($order_unique_id){
			$select = $this->_db->select();
			$select->from('shopping_cart')
				   ->where('order_unique_id = ?', $order_unique_id);
			//echo $select;
			return $this->_load($select);
		}
		public function loadShippingAddressForProduct(){
			$this->productShippingAddress= new DatabaseObject_OrderShippingAddress($this->db);
			$this->productShippingAddress->load($this->order_shipping_address_id);
		}
	}
?>