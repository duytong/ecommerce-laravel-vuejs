// Dropdown.
$(function () {
	$(document).on('click', '.js-dropdown', function (e) {
		e.preventDefault();
		e.stopPropagation();

		$('.js-dropdown').not($('.js-dropdown').has($(e.target))).parent('.dropdown').removeClass('show');
	  $('.js-dropdown').not($('.js-dropdown').has($(e.target))).parent('.dropdown').find('.dropdown__menu').removeClass('show');

		$(this).parent('.dropdown').toggleClass('show');
	  $(this).parent('.dropdown').find('.dropdown__menu').toggleClass('show');
	});

	$(document).on('click', function (e) {
		if ($(e.target).closest('.dropdown__menu').length === 0) {
			$('.dropdown').removeClass('show');
			$('.dropdown__menu').removeClass('show');
		}
	});
});

// Aside.
$(function () {
	$('.js-aside-toggle').click(function (e) {
		e.stopPropagation();

		$('.aside').toggleClass('hide');

		if ($(window).outerWidth() > 991) {
			if ($('.aside').hasClass('hide')) {
				$(this)
					.find('i')
					.removeClass('fa-align-right')
					.addClass('fa-align-left');
			} else {
				$(this)
					.find('i')
					.removeClass('fa-align-left')
					.addClass('fa-align-right');
			}
		} else {
			$('body')
				.removeClass('mini-aside')
				.append('<div class="overlay"></div>');

			$('aside').addClass('aside--mobile');
		}
	});

	$(window).on('load', function () {
		if ($(window).outerWidth() < 992) {
			$('.js-aside-toggle')
				.find('i')
				.removeClass('fa-align-right')
				.addClass('fa-align-justify');
		}
	});

	$(window).resize(function () {
		if ($(window).outerWidth() > 991) {
			$('asidd').removeClass('aside--mobile');
			$('.overlay').remove();

			$('.js-aside-toggle')
				.find('i')
				.removeClass('fa-align-justify')
				.addClass('fa-align-right');
		} else {
			$('body').removeClass('mini-aside');

			$('.js-aside-toggle')
				.find('i')
				.removeClass('fa-align-right')
				.addClass('fa-align-justify');
		}
	});

	$(document).click(function () {
		$('.aside').removeClass('aside--mobile')
		$('.overlay').remove();
	});

	$('.aside').click(function (e) {
		e.stopPropagation();
	});
});

// Modal.
$(function () {
	$(document).on('click', '.js-modal', function (e) {
		e.stopPropagation();
		e.preventDefault();

		$('body').addClass('modal-open');
		$(this).next('.modal').addClass('show');
	});

	$(document).on('click', '.js-dismiss-modal', function (e) {
		e.preventDefault();

		$('body').removeClass('modal-open');
		$('.modal').removeClass('show');

		$('.dropdown').removeClass('show');
	  $('.dropdown__menu').removeClass('show');
	});

	$(document).click(function (e) {
		if ($(e.target).closest('.modal__content').length === 0) {
			$('body').removeClass('modal-open');
			$('.modal').removeClass('show');
		}
	});
});
