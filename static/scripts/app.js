const mobileToggles = document.querySelectorAll('.mobile__nav__icon');
const offCanvas = document.getElementById('off-canvas');

function toggleClassToArray(array, cssClass, action) {
	for (let index = 0; index < array.length; index++) {
		const element = array[index];
		if( action ) {
			element.classList.add(cssClass);
		} else {
			element.classList.remove(cssClass);
		}
	}
}

for (let index = 0; index < mobileToggles.length; index++) {
	const button = mobileToggles[index];
	button.addEventListener("click", function() {
		if( offCanvas.classList.contains('off-canvas--open') ) {
			offCanvas.classList.remove('off-canvas--open');
			toggleClassToArray(mobileToggles, 'is-active', false);
		} else {
			offCanvas.classList.add('off-canvas--open');
			toggleClassToArray(mobileToggles, 'is-active', true);
		}
	});
}

document.addEventListener("keyup", function(event) {
	if (event.key === 'Escape') {
		// Cancel the default action, if needed
		event.preventDefault();
		offCanvas.classList.remove('mobile__bg--open');
		toggleClassToArray(mobileToggles, 'is-active', false);
	}
});


// Make all links starting with # animte to the target
document.querySelectorAll('a[href^="#"]').forEach(function(anchor) {
	anchor.addEventListener('click', function(e) {
		e.preventDefault();
		const targetId = this.getAttribute('href').substring(1);
		const targetElement = document.getElementById(targetId);
		if (targetElement) {
			targetElement.scrollIntoView({
				behavior: 'smooth',
				block: 'start'
			});
		}
	});
});

document.querySelectorAll('button.header__search__toggle, .header__search__close').forEach(function(button) {
	button.addEventListener('click', function() {
		var status = document.getElementById('header-search').classList.toggle('header__search--active');
		if (status) {
			// If the search is active, focus on the search input
			var searchInput = document.querySelector('.header__search input[type="search"]');
			if (searchInput) {
				searchInput.focus();
			}
		}
	});
});