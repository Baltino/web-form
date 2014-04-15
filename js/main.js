var isValidEmail= function(email) {
    email = $.trim(email);
    var re = /^(?:[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+\.)*[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+@iaw.com/;

    return email.match(re) && email.length;
};

var alertMsj = function(params) {
	params.delay = 2000;
	$.pnotify(params);
};

$(document).ready(function(){
	var multiselect = function(options) {
		var multi = {
			$el: options.$el,
			url : options.url,
			cssClass: options.cssClass || 'multiselect',
			

			render: function() {
				var self = this;
				$.ajax({
					url: this.url,
					method: 'POST',
					success: function(resp, model) {
						var toHTML = '<ul class="'+self.cssClass+'">',
							response = $.parseJSON(resp);
						for(var i = 0, l = response.length; i < l; i++) {
							toHTML += '<li id="'+response[i].id+'">'+response[i].text+'</li>';
						}
						toHTML += '</ul>';

						self.$el.append(toHTML);

						self.$el.find('.spinner').remove();
				        self.$el.find('.'+self.cssClass).mCustomScrollbar({
				            mouseWheel: true,
				            scrollInertia: 50,
				            autoHideScrollbar: false,
				            set_height: false,
				            contentTouchScroll: true
				        });

				        self.createListeners();
		
					},
					error: function(error, model) {
						console.log('error'+error);
					}
				})
				
			},

			createListeners: function() {
				this.$el.find('li').on('click', function(evt) {
					evt.preventDefault();
					evt.currentTarget.classList.toggle('selected');
				});
			},

			getData: function() {
				return 1;
			}

		};
		return multi;
	},
		$dragContainer = $('.drag-input'),
		$name = $('#name'),
		$email = $('#email'),
		$commercesInput = $('#commerces'),
		commercesObj = null;

	function validate(evt) {
		var valid = true,
			commerces = [];
		//input name
		if($name[0].value.length < 5) {
			valid = false;
			alertMsj({
				type: 'error',
				text: 'El nombre debe contener al menos 5 caracteres.'
			});
		}
		//input mail
		if(!isValidEmail($email[0].value)) {
			valid = false;
			alertMsj({
				type: 'error',
				text: 'E-mail inválido.'
			});
		}

		//commerces
		commerces = commercesObj.getData();
		if(commerces.length == 0) {
			valid = false;
			alertMsj({
				type: 'error',
				text: 'Debe seleccionar al menos un lugar para administrar.'
			});
		}else {
			if($('input[name=userType]:checked')[0].id == 'admin') {
				$commercesInput[0].value = commerces;
			}
		}
		if(valid) {
			return true;
		}else {
			evt.preventDefault();
		}
	};

	/*** listeners **/

	$('input[type=file]')
		.on('mouseenter, dragover', function(evt) {
			$dragContainer[0].classList.add('hover'); /* forma nativa */
		})
		.on('mouseleave, dragleave, drop', function(evt) {
			$dragContainer.removeClass('hover');	/* jquery */
		})
		.on('change', function(evt) {
			var text = evt.target.files[0].name;
			if(text.length > 15) {
				text = text.substr(0, 15)+'..';
			}
			$dragContainer.find('p')[0].innerHTML = text;
		});

	$('input[name=userType]')
		.on('change', function(evt) {
			if(evt.currentTarget.id != 'admin') {
				commercesObj.$el.find('.disable-mask').slideDown();
			}else {
				commercesObj.$el.find('.disable-mask').slideUp();
			}
		});
	//validacion
	$('input[type=email]')
		.on('blur', function(evt) {
			if(!isValidEmail(evt.currentTarget.value)) {
				evt.currentTarget.classList.add('error');
			}else {
				evt.currentTarget.classList.remove('error');
			}
		});

	$('input[type=submit]')
		.on('click', validate);


	/**** **/
	commercesObj = new multiselect({
		$el: $('#commerces-container'),
		url: 'get_commerces.php'
	});

	commercesObj.render();

	$('.tip').miniTip();

    
});
