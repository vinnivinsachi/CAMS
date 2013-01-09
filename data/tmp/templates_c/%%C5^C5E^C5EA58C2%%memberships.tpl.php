<?php /* Smarty version 2.6.19, created on 2013-01-08 17:17:23
         compiled from index/memberships.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'addunderscore', 'index/memberships.tpl', 10, false),array('function', 'counter', 'index/memberships.tpl', 16, false),array('function', 'geturl', 'index/memberships.tpl', 29, false),array('modifier', 'count', 'index/memberships.tpl', 34, false),)), $this); ?>
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
                	 <div id='productTagBody' class='box' style="width:100%;">

    <?php $_from = $this->_tpl_vars['availableTags']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['tagKey'] => $this->_tpl_vars['tag']):
?>
		<div id="postTagID-<?php echo smarty_function_addunderscore(array('phrase' => $this->_tpl_vars['tag']['tag']), $this);?>
" class="postTagSections box <?php if ($this->_tpl_vars['tagKey'] != 0 && $this->_tpl_vars['currentTag'] != $this->_tpl_vars['tag']): ?>hidden<?php endif; ?>">
           <div class="box" style="margin-bottom:15px;">

                <div class="post-header" style="float:left;">
                   <?php echo $this->_tpl_vars['tag']['tag']; ?>

                </div>
                 <?php echo smarty_function_counter(array('assign' => 'pictureNumber','start' => 1,'skip' => 1), $this);?>



                <div class="post-content" style="float:left;">
                    <?php $_from = $this->_tpl_vars['posts']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['Tag'] => $this->_tpl_vars['post']):
?>
                        <?php if ($this->_tpl_vars['Tag'] == $this->_tpl_vars['tag']['tag']): ?>
                            
                            <?php $_from = $this->_tpl_vars['post']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['postItem']):
?>
                            
                            
                             <div class='productBox2' style='float:left; width:100px; background:#eeeeee;padding:5px; margin-right:9px; margin-top:5px;'>
								<div class="postFirstImage" style="float:left; width:100px; height:150px; ">
                                	<?php if ($this->_tpl_vars['authenticated']): ?>
                                        <a href="<?php echo smarty_function_geturl(array('controller' => 'blogmanager','action' => 'edit'), $this);?>
?id=<?php echo $this->_tpl_vars['postItem']['post_id']; ?>
" title='edit' style="float:right;z-index:10; margin-bottom: -24px; position:relative;">
                                            <img src="/public/resources/css/images/edit.png"/>
            
                                        </a>
                                    <?php endif; ?>
                                    <?php if (count($this->_tpl_vars['postItem']['images']) > 0): ?>
                                    <img src="/public/resources/userdata/tmp/thumbnails/<?php echo $this->_tpl_vars['postItem']['images']['0']['username']; ?>
/blogposts/<?php echo $this->_tpl_vars['postItem']['images']['0']['image_id']; ?>
.W100_memberPostImage.jpg"/>
                                    <?php else: ?>
                                        No image
                                    <?php endif; ?>

                                </div>
                                
                                <div class="<?php if ($this->_tpl_vars['pictureNumber']%6 == 0 || $this->_tpl_vars['pictureNumber'] == 5 || $this->_tpl_vars['pictureNumber']%11 == 0 || $this->_tpl_vars['pictureNumber']%17 == 0 || $this->_tpl_vars['pictureNumber']%23 == 0): ?>tooltipControlLast<?php else: ?>tooltipControl<?php endif; ?> box" style='cursor:pointer; width:90px; height:26px; padding:5px; text-align: center; background:white; font-size:10px;'><?php echo $this->_tpl_vars['postItem']['title']; ?>
</div>
								<?php echo smarty_function_counter(array(), $this);?>

                            
                                <div class='tooltip' style='width:600px; height:400px; background-color:white; border:1px solid #eee; z-index:50;'>
                                    <!-- now comes the partials -->
                                        <div class='box' style='width:300px; height:100%;'>
                                            <table>
                                            <tr style='height:350px;'><td style='padding:0px; margin:0px; width:300px;'>
                                            <div class="productFirstImage">
                                                <div class="productDescription">
                                                   
                                                </div>
                                                <?php if (count($this->_tpl_vars['postItem']['images']) > 0): ?>
                                                <img src="/public/resources/userdata/tmp/thumbnails/<?php echo $this->_tpl_vars['postItem']['images']['0']['username']; ?>
/blogposts/<?php echo $this->_tpl_vars['postItem']['images']['0']['image_id']; ?>
.W250_productDetailImage.jpg"/>
                                                <?php else: ?>
                                                    No image
                                                <?php endif; ?>
                                            </div>
                                            
                                            </td></tr>
                                            
                                           </table>
                                            <div class="productDetails box">
                                            <div class="productMedia">
                                                <div class="productImages">
                                                    <?php $_from = $this->_tpl_vars['postItem']['images']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['image']):
?>
                                                        <div class="productIndividualImage">
                                                        <img src="<?php echo $this->_tpl_vars['siteRoot']; ?>
/public/resources/userdata/tmp/thumbnails/<?php echo $this->_tpl_vars['image']['username']; ?>
/blogposts/<?php echo $this->_tpl_vars['image']['image_id']; ?>
.W50_productSmallPreview.jpg" />
                                                        <span class="imageLargeAddress" style="display:none">
                                                        <img src="<?php echo $this->_tpl_vars['siteRoot']; ?>
/public/resources/userdata/tmp/thumbnails/<?php echo $this->_tpl_vars['image']['username']; ?>
/blogposts/<?php echo $this->_tpl_vars['image']['image_id']; ?>
.W250_productDetailImage.jpg"/></span>					
                                                        </div>
                                                    <?php endforeach; endif; unset($_from); ?>
                                                    
                                                </div>
                                            </div>
                                            </div>
                                            
                                    </div>
                                    <div class='productProfiles' style='width:260px; float:right; text-align: left; padding:0px 10px 0px 30px; background-color:#eee; height:100%; overflow-y:scroll'>
                                            <?php echo $this->_tpl_vars['postItem']['content']; ?>

                                            
                                            
                                    </div>
                                 </div>
                             
                             </div>
                            <?php endforeach; endif; unset($_from); ?>
                        <?php endif; ?>
                    <?php endforeach; endif; unset($_from); ?>
                    
                </div>
            </div>
        </div>
	<?php endforeach; endif; unset($_from); ?>
    </div>
</div>

<?php echo '

<script src="/public/resources/javascripts/productPreview/productImagePreviews.js" type="text/javascript"></script>

<script type="text/javascript">
new productPreviewImage(\'productTagBody\');
$j(".tooltipControl").tooltip({position: \'top center\'});
$j(".tooltipControlLast").tooltip({position: \'top left\'});
$j(\'a.fullOrderDetailsColorBox\').colorbox({width:\'800\', height:\'100%\'});
$j(\'a.videoColorBox\').colorbox({width:\'480\', height:\'385\', iframe:true});
</script>
'; ?>
    
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "layouts/".($this->_tpl_vars['layout'])."/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?> 