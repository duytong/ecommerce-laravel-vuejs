document.addEventListener('click', function (e) {
	let target = e.target;

	// Dropdown
	document.querySelectorAll('.dropdown.show').forEach(el => {
		el.classList.remove('show');
	});


	if (target.closest('.dropdown') && !target.closest('.dropdown__menu')) {
		target.closest('.dropdown').classList.add('show');
	}

	document.querySelectorAll('.dropdown--checkbox .dropdown__menu').forEach(el => {
		el.onclick = function (e) {
			e.stopPropagation();
		};
	});

	// Modal
	document.querySelectorAll('.modal.show').forEach(el => {
		el.classList.remove('show');
	});

	let modal = target.dataset.modal;

	if (modal) {
		document.querySelector('#' + modal).classList.add('show');
	}

	document.querySelectorAll('.modal__content').forEach(el => {
		el.onclick = function (e) {
			if (!e.target.closest('.js-hide-modal')) {
				e.stopPropagation();
			}
		}
	});
});
