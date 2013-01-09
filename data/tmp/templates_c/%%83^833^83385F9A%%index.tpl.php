<?php /* Smarty version 2.6.19, created on 2012-08-21 04:04:25
         compiled from index/index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'addunderscore', 'index/index.tpl', 8, false),array('function', 'geturl', 'index/index.tpl', 19, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "layouts/".($this->_tpl_vars['layout'])."/header.tpl", 'smarty_include_vars' => array('lightbox' => true)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'index/_partials/leftContainer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div id="rightContainer" class="box">
    <?php $_from = $this->_tpl_vars['availableTags']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['tagKey'] => $this->_tpl_vars['tag']):
?>
		<div id="postTagID-<?php echo smarty_function_addunderscore(array('phrase' => $this->_tpl_vars['tag']['tag']), $this);?>
" class="postTagSections box <?php if ($this->_tpl_vars['tagKey'] != 0 && $this->_tpl_vars['currentTag'] != $this->_tpl_vars['tag']): ?>hidden<?php endif; ?>">
        <?php $_from = $this->_tpl_vars['posts']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['Tag'] => $this->_tpl_vars['post']):
?>
        	<?php if ($this->_tpl_vars['Tag'] == $this->_tpl_vars['tag']['tag']): ?>
                    <?php $_from = $this->_tpl_vars['post']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['postItem']):
?>
                    <div class="box" style="float:left; margin-bottom:15px;">

                        <div class="post-header" style="float:left; width:735px;">
                        	<span>
                            <?php echo $this->_tpl_vars['postItem']['title']; ?>

                            </span>
                            <?php if ($this->_tpl_vars['authenticated']): ?>
                            <a href="<?php echo smarty_function_geturl(array('controller' => 'blogmanager','action' => 'edit'), $this);?>
?id=<?php echo $this->_tpl_vars['postItem']['post_id']; ?>
" style="float:right; padding-right:20px;">
                            	<img src="/public/resources/css/images/edit.png"/>

                            </a>
                            <?php endif; ?>
                        </div>
                        <div class="post-content" style="float:left; padding-right:20px;">
                            <?php echo $this->_tpl_vars['postItem']['content']; ?>

                        </div>
                        <div class="post-remaining-images" style="float:left;">
                        	<ul class='post-images'>
                        		<?php $_from = $this->_tpl_vars['postItem']['images']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['images']):
?>
                                <li><a rel="<?php echo $this->_tpl_vars['Tag']; ?>
" href="/public/resources/userdata/uploaded-files/<?php echo $this->_tpl_vars['images']['username']; ?>
/blogposts/<?php echo $this->_tpl_vars['images']['image_id']; ?>
.jpg" class="colorBox"><img src="/public/resources/userdata/tmp/thumbnails/<?php echo $this->_tpl_vars['images']['username']; ?>
/blogposts/<?php echo $this->_tpl_vars['images']['image_id']; ?>
.W150_homeFrontFour.jpg" /></a></li>
                                	
                            	<?php endforeach; endif; unset($_from); ?>
                            </ul>
                        </div>
                    </div>
                    <?php endforeach; endif; unset($_from); ?>
            <?php endif; ?>
        <?php endforeach; endif; unset($_from); ?>
        	
        </div>
	<?php endforeach; endif; unset($_from); ?>
    
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "layouts/".($this->_tpl_vars['layout'])."/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?> 