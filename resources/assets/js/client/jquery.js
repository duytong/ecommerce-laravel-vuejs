$('.js-open-search-mobile').click(function (e) {
	e.preventDefault();

	$('.header__search').addClass('show');
	$('.header').addClass('hide');
});

$('.js-hide-search-mobile').click(function (e) {
	e.preventDefault();

	$('.header__search').removeClass('show');
	$('.header').removeClass('hide');
});
