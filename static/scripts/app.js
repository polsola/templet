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
		if( offCanvas.classList.contains('mobile__bg--open') ) {
			offCanvas.classList.remove('mobile__bg--open');
			toggleClassToArray(mobileToggles, 'is-active', false);
		} else {
			offCanvas.classList.add('mobile__bg--open');
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
