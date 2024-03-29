<?php


	function smarty_function_get_banner($params, $smarty)
	{
		$options = array();
		
		$object=$params['object'];
		
		$options['brand']='Banner';
		
		$db = Zend_Registry::get('db');

		$post = new DatabaseObject_BlogPost($db);
		
		if(isset($params['page']))
		{
			//echo "here at page: ".$params['page']."<br/>";
					$options['style']=$params['page'];
					
			//echo "here at style params: ".$options['style']."<br/>";

		}
		else
		{
					$options['style'] = 'Home';

		}
		
		if(!isset($params['order']))
		{
		
			$options['order'] ='p.ts_created desc';
		}
		
		
		if($object =='post')
		{
			//echo "here at post";
			if(isset($params['liveOnly']) && $params['liveOnly'])
			{
				//echo "here at setting status: ";
				$options['status'] = DatabaseObject_BlogPost::STATUS_LIVE;
			}
		}
		else if($object =='product')
		{
			if(isset($params['liveOnly']) && $params['liveOnly'])
			{
				$options['status'] = DatabaseObject_Product::PRODUCT_STATUS_LIVE;
			}
		}
		else if($object =='event')
		{
			if(isset($params['liveOnly']) && $params['liveOnly'])
			{
				$options['status'] = DatabaseObject_Event::EVENT_STATUS_LIVE;
			}
		}
		
		else if($object =='universal_dues')
		{
			if(isset($params['liveOnly']) && $params['liveOnly'])
			{
				$options['status'] = DatabaseObject_UniversalDue::UNIVERSAL_DUE_STATUS_LIVE;
			}
		}
		
		
		if(isset($params['user_id']))
		{
			$options['user_id'] = (int) $params['user_id'];
		}
		$db = Zend_Registry::get('db');
		
	
		
		if($object =='post')
		{
			$summary= $post->GetObjects($db, $options);
		}
		
		if(isset($params['assign']) && strlen($params['assign'])>0)
		{
			$smarty->assign($params['assign'], $summary);
		}
	}
?>