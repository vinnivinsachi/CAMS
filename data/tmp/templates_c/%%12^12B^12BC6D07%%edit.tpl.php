<?php /* Smarty version 2.6.19, created on 2012-08-22 02:32:24
         compiled from blogmanager/edit.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'geturl', 'blogmanager/edit.tpl', 8, false),array('function', 'html_select_date', 'blogmanager/edit.tpl', 58, false),array('function', 'html_select_time', 'blogmanager/edit.tpl', 60, false),array('modifier', 'escape', 'blogmanager/edit.tpl', 41, false),array('modifier', 'count', 'blogmanager/edit.tpl', 168, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "layouts/".($this->_tpl_vars['layout'])."/header.tpl", 'smarty_include_vars' => array('lightbox' => true)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'blogmanager/lib/left-column.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div id='rightContainer'>


<form method="post" action="<?php echo smarty_function_geturl(array('action' => 'edit'), $this);?>
?id=<?php echo $this->_tpl_vars['fp']->post->getId(); ?>
" enctype="multipart/form-data" >
	
	<?php if ($this->_tpl_vars['fp']->hasError()): ?>
		<div class="error">
			An error has occured in the form below. Please check the highlighted fields and resubmit the form.
		</div>
	<?php endif; ?>
	
	<fieldset>
		<legend>Blog Post Details</legend>
		<a href="<?php echo smarty_function_geturl(array('controller' => 'blogmanager','action' => 'preview'), $this);?>
?id=<?php echo $this->_tpl_vars['fp']->post->getId(); ?>
" style="float:right;">Preview</a>
		<div class="row" id="form_title_container">
			<label for="form_title">Title:</label>
			<input type="text" id="form_title" name="username" value="<?php echo $this->_tpl_vars['fp']->title; ?>
"/>
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'partials/error.tpl', 'smarty_include_vars' => array('error' => $this->_tpl_vars['fp']->getError('title'))));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		</div>
		
		<div class='row' id='form_langugage'>
			<input type='radio' name='language' value='EN' <?php if ($this->_tpl_vars['fp']->language == 'EN'): ?>checked="checked"<?php endif; ?>/>English
			<input type='radio' name='language' value='CH' <?php if ($this->_tpl_vars['fp']->language == 'CH'): ?>checked="checked"<?php endif; ?>/>Chinese
		</div>
		
		<div class="row" id="form_title_link">
			<label for="form_title">Title Link:</label>
			
			<select name="title_link">
			
			</select>
		</div> 
        
        <div class="row" id="form_location_conatiner">
        
        	<label for="form_location">Event Location:</label>
            <input type="text" id="form_location" name="location" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['fp']->location)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"/>
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'partials/error.tpl', 'smarty_include_vars' => array('error' => $this->_tpl_vars['fp']->getError('location'))));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        </div>
        
        <div class="row" id="form_location_url_container">
        	<label for="form_location_url">Event Google Map URL:</label>
            <input type="text" id="form_location_url" name="location_url" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['fp']->locationURL)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"/> 
        </div>
        
        <div class="row" id="form_facebook_url_container">
        	<label for="form_facebook_url">Facebook URL:</label>
            <input type="text" id="form_facebook_url" name="facebook_url" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['fp']->facebookURL)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"/>
        </div>
        
		
		<div class="row" id="form_date_container">
			<label for="form_date">Date of Entry:</label>
			<?php echo smarty_function_html_select_date(array('prefix' => 'ts_created','time' => $this->_tpl_vars['fp']->ts_created,'start_year' => -5,'end_year' => "+5"), $this);?>

			
			<?php echo smarty_function_html_select_time(array('prefix' => 'ts_created','time' => $this->_tpl_vars['fp']->ts_created,'display_seconds' => false,'use_24_hours' => false), $this);?>

			
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'partials/error.tpl', 'smarty_include_vars' => array('error' => $this->_tpl_vars['fp']->getError('date'))));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		</div>
		
        <div class="row" id="form_startdate_container">
			<label for="form_startdate">Event Start Time:</label>
			<?php echo smarty_function_html_select_date(array('prefix' => 'ev_created','time' => $this->_tpl_vars['fp']->ts_created,'start_year' => -2,'end_year' => "+2"), $this);?>

			
			<?php echo smarty_function_html_select_time(array('prefix' => 'ev_created','time' => $this->_tpl_vars['fp']->ts_created,'display_seconds' => false,'use_24_hours' => false), $this);?>

			
		</div>
		
		<div class="row" id="form_enddate_container">
			<label for="form_enddate">Event End Time:</label>
			<?php echo smarty_function_html_select_date(array('prefix' => 'ev_ended','time' => $this->_tpl_vars['fp']->ts_end,'start_year' => -2,'end_year' => "+2"), $this);?>

			
			<?php echo smarty_function_html_select_time(array('prefix' => 'ev_ended','time' => $this->_tpl_vars['fp']->ts_end,'display_seconds' => false,'use_24_hours' => false), $this);?>

		</div>
		
		<div class="row" id="form_title_tag">
			<label>Title Tag</label>
			<input type="text" name="title_tag"/>
		</div>
        
		<div class="wysiwyg">
        
        	<?php echo '
            <!-- Load jQuery build -->
			<script type="text/javascript" src="/public/resources/jquery/tiny_mce/tiny_mce.js"></script>
            <script type="text/javascript">
            tinyMCE.init({
                    // General options
                    mode : "exact",
                    theme : "advanced",
					elements : "test",
					width : "720",
                    plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",
            
                    // Theme options
                    theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect",
                    theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
                    theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
                    theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak",
                    theme_advanced_toolbar_location : "top",
                    theme_advanced_toolbar_align : "left",
                    theme_advanced_statusbar_location : "bottom",
                    theme_advanced_resizing : true,
            
                    // Example content CSS (should be your site CSS)
                    content_css : "css/example.css",
            
                    // Drop lists for link/image/media/template dialogs
                    template_external_list_url : "js/template_list.js",
                    external_link_list_url : "js/link_list.js",
                    external_image_list_url : "js/image_list.js",
                    media_external_list_url : "js/media_list.js",
            
                    // Replace values for the template plugin
                    template_replace_values : {
                            username : "Some User",
                            staffid : "991234"
                    }
            });
            </script>
            '; ?>

            
            
			 <textarea id='test' name="content" mce_editable="true" style="width:100%"><?php echo $this->_tpl_vars['fp']->content; ?>

        	 </textarea>
		</div>
		
	</fieldset>
	
	
    <div id="imageBlock">
        <div id="image_0" class="imageInput">
        <label>Image :</label>
			<input type="file" name="generalImages[0]" />
		<button type='button'onclick='	this.up().remove();'>Delete</button>
		</div>
	</div>
	
	<button type='button' id='addAnotherImage' onclick='addNewImageBlock()'>Add another image</button>
	
	<br/>
	
	<input type='submit' name='save' value='save and proceed' onclick=showloadingImage() />
	
	
</form>

<?php if (count($this->_tpl_vars['fp']->post->images) > 0): ?>
            <ul id="post_images">
                <?php $_from = $this->_tpl_vars['fp']->post->images; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['image']):
?>
                    <li >
                        <img src="/public/resources/userdata/tmp/thumbnails/<?php echo $this->_tpl_vars['signedInUser']->generalInfo->username; ?>
/blogposts/<?php echo $this->_tpl_vars['image']['image_id']; ?>
.W150_homeFrontFour.jpg" alt="<?php echo $this->_tpl_vars['image']['filename']; ?>
" />
                        <form id='imageForm' method="post" action="<?php echo smarty_function_geturl(array('action' => 'images'), $this);?>
">
                            <div>
                                <input type="hidden" name="id" value="<?php echo $this->_tpl_vars['fp']->post->getId(); ?>
" />
                                <input type="hidden" name="tag" value="blogposts" />
                                <input type="hidden" name='image_type' value="blog_posts_images" />
                                <input type="hidden" name="image" value="<?php echo $this->_tpl_vars['image']['image_id']; ?>
" />
                                <input type='submit' name='delete' value='delete' onclick=showloadingImage() />
                            </div>
                        </form>
                    </li>
                <?php endforeach; endif; unset($_from); ?>
            </ul>
        <?php else: ?>
        no general images uploaded
        <?php endif; ?>
        

</div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "layouts/".($this->_tpl_vars['layout'])."/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>