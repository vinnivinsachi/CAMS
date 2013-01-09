<?php

	class DatabaseObject_Helper_BlogManager extends DatabaseObject
	{
		static function verifyBlogForUser($db, $userID, $projectID){
			$select = $db->select();
			$select->from('blog_posts', '*')
			->where('post_id = ?', $projectID)
			->where('uploader_id = ?', $userID);
		}
		
		static function retrieveTagsForCategory($db, $category, $language, $options=array()){
			
			$select = $db->select();
			$select->from(array('t'=>'blog_posts_tags'),'t.tag');
			
			$select->joinInner(array('b'=>'blog_posts'), 'b.post_id = t.post_id', array())
			->joinInner(array('c'=>'blog_posts_category'), 'c.post_id = b.post_id', array())
			->where('c.tag = ?', $category)
			->where('b.status = ?', 'L')
			->where('b.language = ?', $language)

			
			
			->distinct();
			
			if(isset($options['order_by'])){
				$select->order('t.tag ASC');
			}
			//echo $select;
			return $db->fetchAll($select);

		}
		
		
		static function retrievePostForCategory($db, $category, $language){
			
			$select = $db->select();
			
			$select->from(array('b'=>'blog_posts'), array('b.*'))
				->from(array('c'=>'blog_posts_category'), 'c.tag as category')
				->from(array('t'=>'blog_posts_tags'),'t.tag as tag')
				->from(array('p'=>'blog_posts_profile'), 'p.profile_value as content')
			->where('b.language = ?', $language)
			->where('c.post_id = b.post_id')
			->where('t.post_id = b.post_id')
			->where('p.post_id = b.post_id')
			->where('p.profile_key = ?', 'content')
			->where('c.tag = ?', $category)
			->where('b.status = ?', 'L');
			
			//echo $select;
			$post = $db->fetchAll($select);
			
			$existingTags = array();
			foreach($post as $k =>$v){
				
				$imageSelect = $db->select();
				$imageSelect->from(array('i'=>'blog_posts_images'), '*')
				->where('i.Product_id = ?', $v['post_id']);
				$post[$k]['images']=$db->fetchAll($imageSelect);
				
				$profileSelect = $db->select();
				$profileSelect->from(array('p'=>'blog_posts_profile'), '*')
				->where('p.post_id = ?', $v['post_id']);
				$post[$k]['profile']=$db->fetchAll($profileSelect);
				
				
				if(!array_key_exists($v['tag'], $existingTags)){
					//echo '--------------'.Zend_Debug::dump($existingTags).'-------------';
					$existingTags[$v['tag']]=array();
					//echo '<br />'.$v['tag'].'is not in array and tag: '.$v['tag'].' is being added<br />';
				}
				
				//Zend_Debug::dump($post[$k]);
				$existingTags[$v['tag']][]=$post[$k];
			}
			
			//Zend_Debug::dump($existingTags);
			return $existingTags;
		}
		
		static function retrievePostForCategoryAndTag($db, $category, $tag, $language){
			$select = $db->select();
			
			$select->from(array('p'=>'blog_posts', '*'))
			->where('language = ?', $language);
			
			if(strlen($category)>0 && $category!="none")
			{
				$select->joinInner(array('t'=>'blog_posts_category'), 't.post_id = p.post_id', array())
				->where('t.tag = ?', $category);
			}
			if(strlen($tag)>0 && $tag!="none")
			{		
				$select->joinInner(array('g'=>'blog_posts_tags'), 'g.post_id = p.post_id', array())
				->where('g.tag = ?', $tag);
			}
			
			//echo $select;
			
			$post = $db->fetchAll($select);
			$postArray=array();
			foreach($post as $k=>$v){
				$postTemp = new DatabaseObject_BlogPost($db);
				$postTemp->load($v['post_id']);
				$postArray[]=$postTemp;
			}
			return $postArray;
		}
	}
?>