// secondHeaderButtonToggle
secondHeaderButtonToggle = Class.create();

secondHeaderButtonToggle.prototype={
	toggleKey:null,
	toggleDiv:null,
	hiddenDivs:null,
	cssCurrentStatus:null,
	otherToggleRemoveCurrentAnchor:null,
	initialize:function(toggleAnchor, hiddenDivs){
		this.toggleKey = $$(toggleAnchor);
		this.hiddenDivs = $$(hiddenDivs);
		this.cssCurrentStatus = 'active';
		
		this.toggleKey.each(function(value){
				 value.observe('click', this.toggleSection.bindAsEventListener(this));

									
									 }.bind(this));
	},
	
	toggleSection:function(e){
		var element = e.element();
		var currentIDContent = element.id+'Content';


			if(!element.hasClassName('active')){
				//alert('here at element no active');
				this.toggleKey.each(function(value){
											// alert('here at class removal');
											 value.removeClassName('active');
											 });
				this.hiddenDivs.each(function(value){
											 value.hide();
											 });
				Effect.BlindDown(currentIDContent);
				element.addClassName('active');
				//alert('here at adding active');
			}
	}
	
}

//accountDetailEnhancement.js
toggleClass = Class.create();

toggleClass.prototype={
	shoutboxDiv:null,
	arrIndividualShoutMessages:null,
	strFormName:null,
	strToggleKey:null,
	strToggleKeyDiv:null,
	initialize:function(div, formName, toggleKey, toggleKeyDiv){
		this.shoutboxDiv = $(div);
		//alert('here');
		this.strFormName=formName;
		//alert('form name is: '+this.strFormName);
		this.strToggleKey=toggleKey;
		this.strToggleKeyDiv = toggleKeyDiv;
		//alert(this.strToggleKey);
		this.arrIndividualShoutMessages = $A(this.shoutboxDiv.getElementsByClassName(this.strToggleKey));
		
		this.arrIndividualShoutMessages.each(function(value){
					value.observe('click', this.openForm.bindAsEventListener(this));
						//value.down(this.strFormName)
					}.bind(this));
		
	},
	openForm:function(e){
		//alert('here at opening form');
		var element = e.element();
		if(element.hasClassName('shoutBoxFormOpen')){
			var formElement = element.up('.'+this.strToggleKeyDiv).down('.'+this.strFormName);
			//alert(formElement.innerHTML);
			formElement.hide();
			element.removeClassName('shoutBoxFormOpen');
			element.addClassName('shoutBoxFormClosed');
		}else{
		//alert(this.strFormName);
		var formElement = element.up('.'+this.strToggleKeyDiv).down('.'+this.strFormName);
		//alert(formElement.innerHTML);
		formElement.show();
		element.addClassName('shoutBoxFormOpen');
		
		}

	}
	
}

//simpleToggle.js
// JavaScript Document
simpleToggle = Class.create();

simpleToggle.prototype={
	toggleKey:null,
	toggleDiv:null,
	cssCurrentStatus:null,
	initialize:function(toggleAnchor, toggleDiv, currentStatus){
		//alert('here');
		this.toggleKey = $(toggleAnchor);
		this.toggleDiv = $(toggleDiv);
		this.cssCurrentStatus = currentStatus;
		
		this.toggleKey.observe('click', this.toggleSection.bindAsEventListener(this));
	},
	
	toggleSection:function(e){
		var element = e.element();
		if(element.hasClassName(this.cssCurrentStatus)){
			this.toggleDiv.hide();
			this.toggleKey.removeClassName(this.cssCurrentStatus);
		}else{	
			this.toggleDiv.show();
			this.toggleKey.addClassName(this.cssCurrentStatus);
		}
	}
}

//orderToggle
// JavaScript Document
orderToggle = Class.create();

orderToggle.prototype={
	messageAnchor:null,
	trackInfoAnchor:null,
	submitTrackingAnchor:null,
	returnTrackInfoAnchor:null,
	returnItemFormAnchor:null,
	cssCurrentStatus:null,
	cancelOrderAnchor:null,
	productReviewAnchor:null,
	marketSide:null,
	sectionRow:null,
	initialize:function(messageAnchor, trackInfoAnchor, returnTrackInfoAnchor, returnItemFormAnchor, submitTrackingAnchor, cancelOrderAnchor, productReviewAnchor, currentStatus, marketSide){
		//alert('here');
		this.marketSide = marketSide;
		this.messageAnchor = $$(messageAnchor);
		this.trackInfoAnchor = $$(trackInfoAnchor);
		this.returnTrackInfoAnchor = $$(returnTrackInfoAnchor);
		this.returnItemFormAnchor = $$(returnItemFormAnchor);
		this.submitTrackingAnchor=$$(submitTrackingAnchor);
		this.cancelOrderAnchor=$$(cancelOrderAnchor);
		this.productReviewAnchor=$$(productReviewAnchor);
		this.cssCurrentStatus = currentStatus;
		this.messageAnchor.each(function(value){
									 value.observe('click', this.toggleSection.bindAsEventListener(this));
									 }.bind(this));
		
		this.trackInfoAnchor.each(function(value){
									 value.observe('click', this.toggleSection.bindAsEventListener(this));
									 }.bind(this));
		this.returnTrackInfoAnchor.each(function(value){
									 value.observe('click', this.toggleSection.bindAsEventListener(this));
									 }.bind(this));
		this.returnItemFormAnchor.each(function(value){
									 value.observe('click', this.toggleSection.bindAsEventListener(this));
									 }.bind(this));
		this.submitTrackingAnchor.each(function(value){
									 value.observe('click', this.toggleSection.bindAsEventListener(this));
									 }.bind(this));
		this.cancelOrderAnchor.each(function(value){
									 value.observe('click', this.toggleSection.bindAsEventListener(this));
									 }.bind(this));
		this.productReviewAnchor.each(function(value){
									 value.observe('click', this.toggleSection.bindAsEventListener(this));
									 }.bind(this));
									 
	},
	
	toggleSection:function(e){
		var element = e.element();
		parser = element.id.split('-');
		strToggleDiv=parser[1]+'-'+parser[2];
		sectionRow = $$('.'+parser[2]);
		sectionRow.each(function(value){
								 currentAchor = $('anchorID-'+value.id);
								 if(value.id==strToggleDiv){
									 if(currentAchor.hasClassName(this.cssCurrentStatus)){
										
								  	 	value.hide();
										currentAchor.removeClassName(this.cssCurrentStatus);

									 }else{	
									 
										if(currentAchor.hasClassName('anchorTrackingStatus') || currentAchor.hasClassName('anchorReturnTrackingStatus')){
											if(value.innerHTML.strip()==''){
											var ttp_width = '745'; var ttp_m_width = '200'; var ttp_key='ead392b782ce2940582aa775'; var ttp_number = currentAchor.title;
											//alert(currentAchor.title);
											if(!ttp_width){var ttp_width=575;}
											if(!ttp_height){var ttp_height=300;}
											if(!ttp_m_width){var ttp_m_width=260;}
											if(!ttp_m_height){var ttp_m_height=200;}
											if(!ttp_debug){var ttp_debug=false;}
											
											value.innerHTML="<iframe src='http://commercial.trackthepack.com/embed?u="+escape(window.location.hostname)+"&k="+ttp_key+"&n="+ttp_number+"&mw="+ttp_m_width+"&mh="+ttp_m_height+"&debug="+ttp_debug+"' height='"+ttp_height+"' width='"+ttp_width+"' frameborder='0' scrolling='no'></iframe>";
											}
											//alert('here');
										}
										value.show();
									 	currentAchor.addClassName(this.cssCurrentStatus);
									 }
								 }else{
									
									 currentAchor.removeClassName(this.cssCurrentStatus);
								  	 value.hide();
								 }
								 }.bind(this));
	}
}

//admin order toggle
// JavaScript Document
adminOrderToggle = Class.create();

adminOrderToggle.prototype={
	buyerMessageAnchor:null,
	sellerMessageAnchor:null,
	messageThreadAnchor:null,
	trackingAnchor:null,
	returnTrackingAnchor:null,
	cssCurrentSTatus:null,
	
	initialize:function(buyerMessageAnchor, sellerMessageAnchor, messageThreadAnchor, trackingAnchor, returnTrackingAnchor, currentStatus){
		//alert('here');
		this.buyerMessageAnchor = $$(buyerMessageAnchor);
		this.sellerMessageAnchor = $$(sellerMessageAnchor);
		this.messageThreadAnchor = $$(messageThreadAnchor);
		this.trackingAnchor = $$(trackingAnchor);
		this.returnTrackingAnchor = $$(returnTrackingAnchor);
		this.cssCurrentStatus = currentStatus;
		
		
		this.buyerMessageAnchor.each(function(value){
									 value.observe('click', this.toggleSection.bindAsEventListener(this));
									 }.bind(this));
		
		this.sellerMessageAnchor.each(function(value){
									 value.observe('click', this.toggleSection.bindAsEventListener(this));
									 }.bind(this));
		this.messageThreadAnchor.each(function(value){
									 value.observe('click', this.toggleSection.bindAsEventListener(this));
									 }.bind(this));
		this.trackingAnchor.each(function(value){
									 value.observe('click', this.toggleSection.bindAsEventListener(this));
									 }.bind(this));
		this.returnTrackingAnchor.each(function(value){
									 value.observe('click', this.toggleSection.bindAsEventListener(this));
									 }.bind(this));
	},
	
	toggleSection:function(e){
		var element = e.element();
		parser = element.id.split('-');
		strToggleDiv=parser[1]+'-'+parser[2];
		//alert('strToggleDiv is: '+strToggleDiv);
		sectionRow = $$('.'+parser[2]);
		//alert('here');
		sectionRow.each(function(value){
								// alert('value id is: '+value.id);
								 currentAchor = $('anchorID-'+value.id);
								// alert(currentAchor);
								 if(value.id==strToggleDiv){
									 if(currentAchor.hasClassName(this.cssCurrentStatus)){
										//alert('here at hiding');
								  	 	value.hide();
										if(currentAchor){
										currentAchor.removeClassName(this.cssCurrentStatus);
										}
									 }else{	
									   // alert('here1');
										if(currentAchor.hasClassName('anchorTrackingStatus') || currentAchor.hasClassName('anchorReturnTrackingStatus')){
										//	alert('here2');
											if(value.innerHTML.strip()==''){
											var ttp_width = '745'; var ttp_m_width = '200'; var ttp_key='86229f7a29121871a58d1ad8'; var ttp_number = currentAchor.title;
										//	alert(currentAchor.title);
											if(!ttp_width){var ttp_width=575;}
											if(!ttp_height){var ttp_height=300;}
											if(!ttp_m_width){var ttp_m_width=260;}
											if(!ttp_m_height){var ttp_m_height=200;}
											if(!ttp_debug){var ttp_debug=false;}
											
											value.innerHTML="<iframe src='http://commercial.trackthepack.com/embed?u="+escape(window.location.hostname)+"&k="+ttp_key+"&n="+ttp_number+"&mw="+ttp_m_width+"&mh="+ttp_m_height+"&debug="+ttp_debug+"' height='"+ttp_height+"' width='"+ttp_width+"' frameborder='0' scrolling='no'></iframe>";
											}
										}
										//alert('here at showing');
										value.show();
									 	currentAchor.addClassName(this.cssCurrentStatus);
									 }
								 }else{
									// alert('here3');
									 if(currentAchor){
										 currentAchor.removeClassName(this.cssCurrentStatus);
									 }
									 
								  	 value.hide();
								 }
								 }.bind(this));
	}
}

//form enhancer
FormEnhancer = Class.create();

FormEnhancer.prototype={
	form : null,
	
	initialize:function(form)
	{
		//alert('at form init');
		this.form=$(form);
		this.form.observe('submit', this.onSubmit.bindAsEventListener(this));
		
		this.resetErrors();
	},
	resetErrors : function(){	
		this.form.getElementsBySelector('.error').invoke('hide');
	},
	
	showError :function(key, val){
		
		//alert('here at show error');
		var formElement=this.form[key];
		//alert('form key is: '+key);
		var container = formElement.up().down('.error');
		//alert('container is: '+container.);
		
		if(container){
			container.update(val);
			container.show();
		}
	},
	onSubmit :function(e){
		Event.stop(e);
		
		var options={
			parameters: this.form.serialize(),
			method: this.form.method,
			onLoaded: showloadingImage(), 
			onSuccess: this.onFormSuccess.bind(this)
		};
		
		this.resetErrors();
		new Ajax.Request(this.form.action, options);
	},
	onFormSuccess: function(transport){
		//alert('on form success');
		hideloadingImage();

		var json = transport.responseText.evalJSON(true);
		var errors = $H(json.errors);
		//alert('error size is: '+errors.size());
		if(errors.size()>0 && errors.size()!=38  &&errors.size()!=43 ){ //38 characters is very strange here because when there is no error, the size of errors is 38... hm..
			//alert('here at form error');
			
			this.form.down('.error').show();
			errors.each(function(pair)
								 {
									// alert(pair.key);
									// alert(pair.value);
									 this.showError(pair.key, pair.value);
								 }.bind(this));
		}else{
			//alert('here at form is going to submit');
			this.form.submit();
		}
	}
};

var loginFormEnhancer = Class.create(FormEnhancer,{
	
}
);



var formEnhancerShoutoutMessage = Class.create(FormEnhancer, {
	onFormSuccess: function(transport){
	hideloadingImage();

	var json = transport.responseText.evalJSON(true);
	var errors = $H(json.errors);
	if(errors.size()>0 && errors.size()!=38  &&errors.size()!=43 ){ //38 characters is very strange here because when there is no error, the size of errors is 38... hm..
		//alert('here at form error');
		
		this.form.down('.error').show();
		errors.each(function(pair)
							 {
								// alert(pair.key);
								// alert(pair.value);
								 this.showError(pair.key, pair.value);
							 }.bind(this));
	}else{
		//alert('here at form is going to submit');
		time=new Date();
		month = time.getMonth()+1;
		new Insertion.Top($('askAndAnswerContent'), "<div class='askAndAnswerPost'><div class='askAndAnswerName'>"
												+json.name
												+"</div><div class='askAndAnswerTime'>"
												+month+'/'+time.getDate()+'/'+time.getFullYear()
												+"</div><div class='askAndAnswerContent'>"
												+json.message
												+"</div></div>"
												);
		//alert('here');
		alert('Thank you for asking a question. The seller will be notified');
		$('askAndAnswerContent').down(0).highlight({ duration: 1, startcolor:'#B1FF91'});
		
		//this.form.submit();
	}
	}
});

var formEnhancerPrivateMessage = Class.create(FormEnhancer, {
	onFormSuccess: function(transport){
	hideloadingImage();

	var json = transport.responseText.evalJSON(true);
	var errors = $H(json.errors);
	if(errors.size()>0 && errors.size()!=38  &&errors.size()!=43 ){ //38 characters is very strange here because when there is no error, the size of errors is 38... hm..
		//alert('here at form error');
		
		this.form.down('.error').show();
		errors.each(function(pair){
								// alert(pair.key);
								// alert(pair.value);
								 this.showError(pair.key, pair.value);
							 }.bind(this));
	}else{
		//alert('here at form is going to submit');
		time=new Date();
		month = time.getMonth()+1;
		
		alert('Thank you for sending a private message. The seller will be notified');		
		//this.form.submit();
	}
	}
});

var formEnhancerPromotion = Class.create(FormEnhancer,{
	onFormSuccess: function(transport){
	hideloadingImage();

	var json = transport.responseText.evalJSON(true);
	var errors = json.errors;
	//alert('here');
	if(errors!='none' ){ //38 characters is very strange here because when there is no error, the size of errors is 38... hm..
		//alert('here at form error');
			//alert(json.errors);

		//this.form.down('.error').show();
		var formElement=this.form[0];
		//alert('form key is: '+key);
		var container = formElement.up().down('.error');
		//alert('container is: '+container.);
		
		if(container){
			container.update(errors);
			container.show();
		}
	}else{
		//alert('here at good promotions');
		var code = json.promotion;
		var tempTotalCost=json.tempTotalCost;
		var totalCost=json.totalCost;
		var amount_deducted=json.amount_deducted;
		var promotion_quote=json.promotion_previledge;
		//updateSection=$(
		//this.form.submit();
		promotionInsert = $('promotionInformation');
		promotionInsert.innerHTML = '<td colspan="3"><table width="100%;"><tr><td colspan="2">Promotion used: '
							+code
							+'</td><td style="text-align: right; color:#ED1C4E;">&shy;$'
							+amount_deducted
							+'</td></tr><tr><td colspan="2">Final Cost:</td><td style="text-align: right; ">$'
							+totalCost
							+'</td></tr>'
							+"<tr><td style='background:#333; color:white;' colspan='3'>"+promotion_quote+'</td></tr></table></td>';
				
	}
	}							 
									
});
		
//checkout enhancer
// JavaScript Document
checkOutEnhancer = Class.create();

checkOutEnhancer.prototype={
	form : null,
	boolResponseRequestUpdate:null,
	strResponseRequestUpdateDiv:null,
	arrShippingDelete:null,
	arrMakeShipping:null,
	btnProceedToComfirmation:null,
	initialize:function(form, boolResponseUpdate, strUpdateDiv)
	{
		////alert('at form init');
		this.form=$(form);
		this.form.observe('submit', this.onSubmit.bindAsEventListener(this));
		this.resetErrors();
		if(boolResponseUpdate==1){
			this.boolResponseRequestUpdate=1;
			this.strResponseRequestUpdateDiv=$(strUpdateDiv);
		}
		
		this.arrShippingDelete = $A($$('.deleteShippingAddressAnchor'));

		
		this.arrShippingDelete.each(function(value){
							 value.observe('click', this.ajaxDeleteShippingAddress.bindAsEventListener(this))
										  }.bind(this));
		this.arrMakeShipping = $A($$('.makeShippingAddressAnchor'));

		
		this.arrMakeShipping.each(function(value){
							 value.observe('click', this.ajaxMakeShippingAddress.bindAsEventListener(this))
										  }.bind(this));
		
		this.btnProceedToComfirmation=$("proceedToComfirmation");
		this.btnProceedToComfirmation.observe('click', this.proceedToComfirmationAction.bindAsEventListener(this));
							 
		//check all the delete shipping address buttons. 
	},
	resetErrors : function(){	
		this.form.getElementsBySelector('.error').invoke('hide');
	},
	
	showError :function(key, val){
		////alert('here at show error');
		var formElement=this.form[key];
		////alert('form key is: '+key);
		var container = formElement.up().down('.error');
		////alert('container is: '+container.innerHTML);
		if(container){
			container.update(val);
			container.show();
		}
	},
	onSubmit :function(e){
		Event.stop(e);
		showloadingImage();
		var options={
			parameters: this.form.serialize(),
			method: this.form.method,
			onSuccess: this.onFormSuccess.bind(this)
		};
		
		this.resetErrors();
		new Ajax.Request(this.form.action, options);
	},
	onFormSuccess: function(transport){
		////alert('on form success');
		hideloadingImage();
		var shippingAddressDiv=$("allShippingAddresses");

		var json = transport.responseText.evalJSON(true);
		var errors = $H(json.errors);
		////alert('error size is: '+errors.size());
		if(errors.size()>0 && errors.size()!=38  &&errors.size()!=43 ){ //38 characters is very strange here because when there is no error, the size of errors is 38... hm..
			////alert('here at form error');
			
			this.form.down('.error').show();
			errors.each(function(pair)
								 {
									// //alert(pair.key);
									// //alert(pair.value);
									 this.showError(pair.key, pair.value);
								 }.bind(this));
		}else{
			//alert('here1');
			var address=this.createShippingAddressHtml(json);

			if(json.defaultShipping=='off' && json.previousDefaultShipping!=0 ){
				//alert('here2');
				lastShippingAddress = $$('.shippingAddressBox').last();
				new Insertion.After(lastShippingAddress, address);
				//alert('here3');
				$('toggleAddShipping').removeClassName('selectionOn');
				$('editShippingForm').hide();
				
				$('makeShippingAddress_'+json.shippingId).observe('click', this.ajaxMakeShippingAddress.bindAsEventListener(this));
				
			}else if(json.defaultShipping=='on' || json.previousDefaultShipping==0){
				
				//alert('-here1');
				//if there is a previous tag, adding make default button next to the previous defaul tag
				if(json.previousDefaultShipping!=0){
					//alert('-here1.5');
				$('shippingAddress_'+json.previousDefaultShipping).innerHTML=$('shippingAddress_'+json.previousDefaultShipping).innerHTML+'<a id="makeShippingAddress_'+json.previousDefaultShipping+'" class="makeShippingAddressAnchor" href="/account/makedefaultshipping?editAddress='+json.previousDefaultShipping+'"><img src="/public/resources/css/images/ShippingButton.gif" /></a><br />';
				$("deleteShippingAddress_"+json.previousDefaultShipping).observe('click', this.ajaxDeleteShippingAddress.bindAsEventListener(this));
				$('makeShippingAddress_'+json.previousDefaultShipping).observe('click', this.ajaxMakeShippingAddress.bindAsEventListener(this));
				//alert('-here1.9');
				}
				
								//alert('-here2');

				if(json.previousDefaultShipping!=0 || (json.previousDefaultShipping==0 && json.existingAddresses>1)){ //need to add the fact that it has shipping. 

				lastShippingAddress = $$('.shippingAddressBox').last();
								//alert('-here3'); 

				new Insertion.After(lastShippingAddress, address);
								//alert('-here4');
					if(json.defaultShipping!='on'){
					$('makeShippingAddress_'+json.shippingId).observe('click', this.ajaxMakeShippingAddress.bindAsEventListener(this));
					}
				}else{
				$("allShippingAddresses").innerHTML=address;
				}
				//add event listiner here for the new deleteShippingAddress_Key object.
				$("deleteShippingAddress_"+json.shippingId).observe('click', this.ajaxDeleteShippingAddress.bindAsEventListener(this));
				//alert('defaultShipping is: '+json.defaultShipping);
				if(json.defaultShipping=='on' || json.existingAddresses==1){
				$('finalUserOrderShippingInfo').innerHTML=this.createShippingAddressHtmlForDelivery(json);
				//alert('here5');
				$('nextToRewardPointAnchor').show();
				}
				$('toggleAddShipping').removeClassName('selectionOn');
				$('editShippingForm').hide();
			}
		}
	}, 
	
	createShippingAddressHtml:function(jsonObject){
		if((jsonObject.defaultShipping=='off' && jsonObject.previousDefaultShipping!=0)||(jsonObject.previousDefaultShipping==0 &&jsonObject.existingAddresses>1 &&jsonObject.defaultShipping=='off')){
			//alert('ba');
		var shippingAddressString = '<div class="shippingAddressBox" id="shippingAddress_'+jsonObject.shippingId+'">'+jsonObject.address_one+'<br/>';
		
		if(jsonObject.address_two!=''){
			shippingAddressString+=''+jsonObject.address_two+'<br/>';}
			
			shippingAddressString+=''+jsonObject.city+', '+jsonObject.state+' '+jsonObject.zip+'<br/>'
								+	''+jsonObject.country+'<br/><a id="deleteShippingAddress_'+jsonObject.shippingId+'" class="deleteShippingAddressAnchor" href="/account/deleteshipping?editAddress='+jsonObject.shippingId+'">Delete</a><br/><a id="makeShippingAddress_'+jsonObject.shippingId+'" class="makeShippingAddressAnchor" href="/account/makedefaultshipping?editAddress='+jsonObject.shippingId+'"><img src="/public/resources/css/images/ShippingButton.gif"></a><br/></div>';
		}else if(jsonObject.defaultShipping=='on' || jsonObject.previousDefaultShipping=='0'){
			//alert('ba2');
			var shippingAddressString = '<div class="shippingAddressBox" id="shippingAddress_'+jsonObject.shippingId+'">'+jsonObject.address_one+'<br/>';
			if(jsonObject.address_two!=''){

			shippingAddressString+=  ''+jsonObject.address_two+'<br/>';}
			
								shippingAddressString+=	''+jsonObject.city+', '+jsonObject.state+' '+jsonObject.zip+'<br/>'
								+	''+jsonObject.country+'<br/><a id="deleteShippingAddress_'+jsonObject.shippingId+'" class="deleteShippingAddressAnchor" href="/account/deleteshipping?editAddress='+jsonObject.shippingId+'">Delete</a><br/></div>';
		}
		return shippingAddressString;
		
	},
	createShippingAddressHtmlForDelivery:function(jsonObject){
		//alert('jsonobject1');
		var deliveryShippingAddressString = jsonObject.name+'<br/>'+jsonObject.address_one+'<br/>';
		if(jsonObject.address_two!=''){
			deliveryShippingAddressString = deliveryShippingAddressString+jsonObject.address_two+'<br/>';
		}
		//alert('jsonobject2');
		deliveryShippingAddressString=deliveryShippingAddressString+jsonObject.city+', '+jsonObject.state+' '+jsonObject.zip+'<br/>'+jsonObject.country;
		//alert(deliveryShippingAddressString);
		return deliveryShippingAddressString;
	},
	ajaxDeleteShippingAddress:function(e){Event.stop(e);
			var parentClass = this;
			var dialog = $j('<div></div>').html('Are you sure you want to delete this address?').dialog({
			autoOpen: false,
			title: 'Stop!',
			maxHeight: 200,
			minHeight:50,
			modal: true,
			buttons:{"ok":function(){
				parentClass.sendAjaxRequestToDeleteShippingAddress(e);
				$j(this).dialog("close");
			},
			"cancel":function(){
				//alert('here2');
				$j(this).dialog("close");
			}}
		});
		dialog.dialog('open');
	},
	sendAjaxRequestToDeleteShippingAddress:function(e){
		var element = e.element();
		strParsed = element.id.split('_');
		parentClass = this;
		showloadingImage();

		var options={
			parameters: {'editAddress':strParsed[1]},
			method: 'get',
			onSuccess: parentClass.onDeleteShippingSuccess
		};
		
		new Ajax.Request('/account/deleteshipping', options);
		
		//alert('element id is: '+strParsed[1]);
	},
	onDeleteShippingSuccess:function(transport){
		hideloadingImage();
		var json = transport.responseText.evalJSON(true);
		//alert(json);
		if(json.deletedShippingId != json.defaultShippingAddressId){
			//alert('deleting top section');
			$("shippingAddress_"+json.deletedShippingId).remove();
		}
		if(json.defaultShippingAddressId==null){
			//alert('deleting second section');
			$('finalUserOrderShippingInfo').innerHTML="Please add or select a delivery address from above.";
			$('nextToRewardPointAnchor').hide();
		}
		//alert('deleted id is: '+json.deletedShippingId);
		//alert('default shipping id is: '+json.defaultShippingAddressId);
	},
	ajaxMakeShippingAddress:function(e){Event.stop(e);
		var parentClass = this;
		var dialog2 = $j('<div></div>').html('Are you sure you want to ship to this address?').dialog({
				autoOpen: false,
				title: 'Stop!',
				maxHeight: 200,
				minHeight:50,
				modal: true,
				buttons:{"ok":function(){
					parentClass.sendAjaxRequestToMakeShippingAddress(e);
					$j(this).dialog("close");
				},
				"cancel":function(){
					//alert('here2');
					$j(this).dialog("close");
				}}
			});
			dialog2.dialog('open');
	},
	sendAjaxRequestToMakeShippingAddress:function(event){
		//alert('here at send ajax request');
		//alert(event);
		var element = event.element().up('a');
		////alert('element is: '+element);
		////alert('element id is: '+element.id);
		strParsed = element.id.split('_');
		parentClass = this;

		var options={
			parameters: {'editAddress':strParsed[1]},
			method: 'get',
			onSuccess: parentClass.onMakeShippingSuccess.bind(this)
		};
		
		new Ajax.Request('/account/makedefaultshipping', options);
		
		//alert('element id is: '+strParsed[1]);
		
	},

	onMakeShippingSuccess:function(transport){
		var json = transport.responseText.evalJSON(true);
		//alert('here at make default successfull');
		if(json.previousShippingAddressId!=null){
			
		}
		if(json.newShippingAddress>0){
			//alert('adding 1');
			$('finalUserOrderShippingInfo').innerHTML=this.createShippingAddressHtmlForDelivery(json);
			$('nextToRewardPointAnchor').show();
			//alert('adding 2');
			$('makeShippingAddress_'+json.newShippingAddress).remove();
			
			//alert('adding 3');
			$('shippingAddress_'+json.previousShippingAddressId).innerHTML=$('shippingAddress_'+json.previousShippingAddressId).innerHTML+'<a id="makeShippingAddress_'+json.previousShippingAddressId+'" class="makeShippingAddressAnchor" href="/account/makedefaultshipping?editAddress='+json.previousShippingAddressId+'"><img src="/public/resources/css/images/ShippingButton.gif" /></a>';
			//alert('adding 4');
			$("deleteShippingAddress_"+json.previousShippingAddressId).observe('click', this.ajaxDeleteShippingAddress.bindAsEventListener(this));
			$('makeShippingAddress_'+json.previousShippingAddressId).observe('click',  this.ajaxMakeShippingAddress.bindAsEventListener(this));
		}
			
	},
	proceedToComfirmationAction:function(e){
		Event.stop(e);
		rewardPoints = $$('#rewardPointSelection option').find(function(ele){return !!ele.selected})
		//alert(rewardPoints.value);
		promotionCode = $('promotionCode').value;
		//alert(promotionCode);
		//alert('here at paused href');
		
		var options = {
			parameters: {'rewardPoints': rewardPoints.value, 'promotionCode': promotionCode},
			method: 'get',
			onSuccess: this.onCalcPromotionSuccessful.bind(this)
		};
		
		new Ajax.Request('/checkout/rewardsandpromotions/', options);
	},
	onCalcPromotionSuccessful:function(transport){
		//alert('here at response');
		var json = transport.responseText.evalJSON(true);
		//alert(json);
		//alert(json.successful);
		//alert(json.rewardPoints);
		//alert(json.promotionCode);
		if(json.successful!=true){
			var dialog2 = $j('<div></div>').html('We are sorry, but either your reward points or promotion code is incorrect.').dialog({
				autoOpen: false,
				title: 'Warning!',
				maxHeight: 200,
				minHeight:50,
				modal: true,
				buttons:{"ok":function(){
					$j(this).dialog("close");
				}}
			});
			dialog2.dialog('open');
		}else{
			//alert('here at json true');
			window.location= 'http://www.vedance.com/checkout/confirmation';
		}
	}
	
}

//productImagePreview
//'this' can be bind to function like function(){...}.bind(this)
//or it can be bind to methods such as with in observe('action', this.Methods.bindAsEventListener(this))
productPreviewImage = Class.create();

productPreviewImage.prototype={
	
	productsTable:null,
	products:null,
	initialize:function(productsTableDiv){
		
		this.productsTable=$(productsTableDiv);
		//alert(this.productsTable.innerHTML);
		//this.productsBoxes = $A(this.productsTable.getElementsByClassName('productBox'));
		this.productsImages = $A(this.productsTable.getElementsByClassName('productIndividualImage'));
		this.productsImages.each(function(value){
										 // alert(value.innerHTML);
     									value.observe('click', 
													  	this.switchImage.bindAsEventListener(this)
													  );
									}.bind(this));
	},
	switchImage:function(e){
		element = e.element();
		element.up('.productBox2').down('.productFirstImage').innerHTML = element.up('.productIndividualImage').down('.imageLargeAddress').innerHTML;
		
		$A(element.up('.productBox2').getElementsByClassName('productIndividualImage')).each(function(value){
																								 value.removeClassName('currentImage');
																								 });
		element.up('.productIndividualImage').addClassName('currentImage');
		$j('a.colorBox').colorbox({width:'800',height:'100%'});

	}
}