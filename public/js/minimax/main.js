/*
	Minimaxing by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
*/

(function($) {
	
	
	

	var $window = $(window),
		$body = $('body');

	// Breakpoints.
		breakpoints({
			xlarge:  [ '1281px',  '1680px' ],
			large:   [ '981px',   '1280px' ],
			medium:  [ '737px',   '980px'  ],
			small:   [ null,      '736px'  ]
		});

	// Nav.

		// Title Bar.
			$(
				'<div id="titleBar">' +
					'<a href="#navPanel" class="toggle"></a>' +
					'<span class="title">' + $('#logo').html() + '</span>' +
					'<ul class="navbar-nav nav-noti"  style="float:right"></ul>' +
					'<ul class="navbar-nav nav-user"  style="float:right"></ul>' +
				'</div>'
			)
				.appendTo($body);


		// Navigation Panel.
			$(
				'<div id="navPanel">' +
					'<nav>' +
						$('#nav').navList() +
						'<div class=" link dropdown"><a class=" dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white">Soporte</a><div class="dropdown-menu soport" aria-labelledby="dropdownMenu2"><a class="dropdown-item" type="button" href="https://api.whatsapp.com/send?phone=51973302034&text=Hola%21%20Quisiera%20m%C3%A1s%20informaci%C3%B3n%20sobre...">Whatsapp</a><a class="dropdown-item" href="mailto:soporte@dcabecera.com" type="button">Email</a></div></div>' +
				'</div>'	
			)
				.appendTo($body)
				.panel({
					delay: 500,
					hideOnClick: true,
					hideOnSwipe: true,
					resetScroll: true,
					resetForms: true,
					side: 'left',
					target: $body,
					visibleClass: 'navPanel-visible'
				});

})(jQuery);