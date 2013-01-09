<?php

	class DatabaseObject_Helper_UserManager extends DatabaseObject
	{
		
		
		public static function loadByReferral($db, $referralID){
			$select=$db->select();
			$select->from('users',array('referral_id', 'referee_id'))
				->where('referee_id =? ', $referralID);
			
			$result = $db->fetchAll($select);
			//Zend_Debug::dump($result);
			if(count($result)==1){
				return true;
			}else{
				return false;
			}
		}
		
		public static function addRewardPointToUser($db, $userPointAdded, $amount, $resource, $ipOfEvent, $userCausedUsername, $userCausedId, $userCausedPointAdded=''){
			
			//update reward point in user
			$select = $db->select();
			$select->from('users', 'reward_point')
				->where('referee_id = ?', $userPointAdded);
			$currentAvailablePoint = $db->fetchAll($select);
			
			$data = array('reward_point' => $currentAvailablePoint[0]['reward_point']+$amount);
			
			$db->update('users', $data, "referee_id = '$userPointAdded'");
			
			//track reward point for user
			$data2 = array(
				  'user_points_added' => $userPointAdded,
				  'point'      => $amount,
				  'name_of_event' => $resource,
				  'location_id'      => $ipOfEvent,
				  'user_caused_Username' => $userCausedUsername,
				  'user_caused_id' =>$userCausedId,
				  'user_caused_point_addition' =>$userCausedPointAdded
			  );			
			$db->insert('reward_point_tracking', $data2);
		}
		
		public static function loadRewardPointTracking($db, $userUniqueCode){
			$select = $db->select();
			$select->from('reward_point_tracking', '*')
			->where('user_points_added = ?', $userUniqueCode)
			->order('time DESC');
			//echo '<br />here at selecting reward point: '.$select.'<br />';
			return $db->fetchAll($select);
		}		
		
		public static function loadUserReviews($db, $userUniqueId){
			$select = $db->select();
			$select->from('user_review','*')
				->where('User_id = ?', $userUniqueId)
				->order('ts_created DESC');
			return $db->fetchAll($select);
		}
		
		public static function loadUserEmail($db, $userID){
			$select = $db->select();
			$select->from('users', 'email')
				->where('userID = ?', $userID);
			//echo $select;
			return $db->fetchOne($select);
		}
		
		public static function loadUserMeasurements($db, $userRefereeID, $userSex){
			$select = $db->select();
			if($userSex=='man'){
			$select->from('user_men_measurement', '*')
				->where('User_referee_id = ?', $userRefereeID);
			}elseif($userSex=='woman'){
			$select->from('user_women_measurement', '*')
				->where('User_referee_id = ?', $userRefereeID);
			}
			//echo $select;
			return $db->fetchAll($select);
		}
		
		public static function saveUserMeasurements($db, $userID, $measurements=array()){
			
		}
		
		public static function saveUserShoesAttribute($db, $userID, $measurments=array()){
			
		}
		
		public static function applyforpromotionalcode($db, $application=array()){
			
			$select=$db->select();
			$select->from('user_promotion', '*')
			->where('user_promotion_id = ?', $application['user_promotion_id']);
			
			$result = $db->fetchAll($select);
			
			if(count($result)==1){
				
				if($result[0]['event_id'] && $result[0]['event_id']!='0'){
				$data=array('status'=>'NA');
				$db->update('events', $data, 'event_id='.$result[0]['event_id']);
				}
				
				$data2=array(
							'user_promotion_id'=>$application['user_promotion_id'],
							'organization_type'=>$application['organization_type'], 
							'primary_contact'=>$application['primary_contact'], 
							'promotion_type'=>$application['promotion_type'], 
							'promotion_application_status'=>'Reapplying', 
							'address_one'=>$application['address_one'], 
							'city'=>$application['city'], 
							'state'=>$application['state'], 
							'zip'=>$application['zip'], 
							'country'=>$application['country'], 
							'phone_number'=>$application['phone_number'], 
							'email'=>$application['email'], 
							'name_of_organization'=>$application['name_of_organization'], 
							'event_id'=>'', 
							'organization_website'=>$application['organization_website'],
							'last_updated'=>date('Y-m-d G:i:s'));
			
				if($db->update('user_promotion', $data2, 'user_promotion_id = '.$application['user_promotion_id'])){
					
					return $application['user_promotion_id'];
				}else{
					return false;
				}
			}else{
			
			
			$data=array(
						'user_promotion_id'=>$application['user_promotion_id'], 
						'organization_type'=>$application['organization_type'], 
						'primary_contact'=>$application['primary_contact'], 
						'promotion_type'=>$application['promotion_type'],
						'promotion_application_status'=>'In_Process', 
						'address_one'=>$application['address_one'], 
						'city'=>$application['city'], 
						'state'=>$application['state'], 
						'zip'=>$application['zip'], 
						'country'=>$application['country'], 
						'phone_number'=>$application['phone_number'], 
						'email'=>$application['email'], 
						'name_of_organization'=>$application['name_of_organization'], 
						'event_id'=>'', 
						'organization_website'=>$application['organization_website'],
						'last_updated'=>date('Y-m-d G:i:s'));
			$db->insert('user_promotion', $data);
			
			return $db->lastInsertId();
			//return true;
			}
		}
		
		public static function loadDistributorApplication($db, $params=array()){
			$select=$db->select();
			$select->from(array('p'=>'user_promotion'), 'p.*')
			->order('p.name_of_organization ASC');
			
			$applications= $db->fetchAll($select);
			
			
			return $applications;
		}
		
		public static function assignCreatedPromotionCode($db, $applicationID, $eventID, $params=array()){
			//creating events
			$data=array('event_id'=>$eventID, 'promotion_application_status'=>'Completed');
			$db->update('user_promotion', $data, "user_promotion_id = $applicationID");
		}
		
		public static function retrieveEmailForPromotionCode($db, $applicationID){
			
			$select=$db->select();
			$select->from(array('p'=>'user_promotion'), '*')
			->where('p.user_promotion_id = ?', $applicationID);
			
			return $db->fetchAll($select);
		}
		
		
		public static function loadUserPromotionCode($db, $eventID){
			
			$select=$db->select();	
			$select->from(array('p'=>'user_promotion'), '*')
			->where('p.event_id = ?', $eventID);
			
			$result = $db->fetchAll($select);
			
			return $result;
		}
		
		public static function userApplicationRetrieval($db, $applicationID, $params=array()){
			
			$select = $db->select();
			$select->from('user_promotion', '*')
			->where('user_promotion_id = ?', $applicationID);
			
			$result = $db->fetchAll($select);
			
			if(count($result)==1){
				if($result[0]['event_id'] && $result[0]['event_id']!='0'){
					$select2=$db->select();
					$select2->from('events_profile','*')
					->where('event_id = ?',$result[0]['event_id'])
					->where("profile_key='promotion_code'");
					$result[0]['promotion_code']=$db->fetchAll($select2);
					//echo $select2;
				}
			}
			return $result;
		}
	}
?>