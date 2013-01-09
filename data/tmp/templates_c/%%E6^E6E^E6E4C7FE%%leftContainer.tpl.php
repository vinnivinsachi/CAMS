<?php /* Smarty version 2.6.19, created on 2012-08-21 04:04:25
         compiled from index/_partials/leftContainer.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'addunderscore', 'index/_partials/leftContainer.tpl', 12, false),)), $this); ?>
<div id="leftContainer" style="width:250px;">




    <div class="secondaryHeader">
        <a style="padding-left:25px;"><?php echo $this->_tpl_vars['category']; ?>
</a>
    </div>
    <div id='subCategory'>
    	<?php $_from = $this->_tpl_vars['availableTags']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['tagKey'] => $this->_tpl_vars['tag']):
?>
    	<div class="subCategoryHeader <?php if ($this->_tpl_vars['tagKey'] == 0): ?>categoryActive<?php endif; ?>" onclick=<?php echo '"togglePostFromTag(this)"'; ?>
>
        	<div id="tagID-<?php echo smarty_function_addunderscore(array('phrase' => $this->_tpl_vars['tag']['tag']), $this);?>
" ><?php echo $this->_tpl_vars['tag']['tag']; ?>
</div>
        </div>
        <?php endforeach; endif; unset($_from); ?>
       
    </div>
</div>