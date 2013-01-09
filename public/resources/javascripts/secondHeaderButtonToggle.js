// JavaScript Document
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