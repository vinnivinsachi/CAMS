</div>

		</div>

		<div id="footerImage" style="width:1000px; padding-bottom:30px; padding-top:10px; float:left;">
        	{if $authenticated}
                <div style="float:left; width:1000px; text-align:left;height:80px;"><br/>
                	<a href="{geturl controller='blogmanager' action='index'} ">Post manager</a> 
                    <a href="{geturl controller='newsletter' action='index'} ">Newsletter manager</a>
                    <a href="{geturl controller='account' action='logout'}">Log out</a>
                </div>
            {/if}
            <div style="float:right; text-align:right; width:1000px; padding:0px;"><br/>
            	&copy; 2011 ChineseAMS | <a href="{geturl controller='index' action='terms'}">Terms of Use</a>
    	
            </div>
		</div>
		<div id="UIMessage">
		</div>
        <div id='loadingImage' style='position:absolute; margin:0px; width:100%; height:100%; padding-left:30%; z-index: 100; display:none; opacity:0.8;'>
            <img src='/public/resources/css/images/loading.gif'/>
        </div>

	</div>
</div>
{literal}
<script type="text/javascript">
$j('a.colorBox').colorbox();
$j('a.videoBox').colorbox({iframe:true, innerWidth:425, innerHeight:344});
$j('a.documentBox').colorbox({iframe:true, innerWidth:700, innerHeight:'90%'});


 var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-33301367-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();



</script>
{/literal}
</body>
</html>