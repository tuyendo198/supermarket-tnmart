const previousBtn = document.querySelector('.slider--previous');
const nextBtn = document.querySelector('.slider--next');

const slides = document.querySelector('.slider--slides');
if (slides !== null) {
	const slidesNumber = slides.children.length;

	// Numbered from 0
	let currentSlide = 0;

	const updateSlider = () => {
		const slideWidth = slides.clientWidth;
		const offset = -currentSlide * slideWidth;

		slides.setAttribute('style', `transform: translate(${offset}px)`);
	}

	previousBtn.addEventListener('click', () => {
		--currentSlide;
		if (currentSlide < 0) currentSlide = slidesNumber - 1;

		updateSlider();
	});

	nextBtn.addEventListener('click', () => {
		++currentSlide;
		if (currentSlide >= slidesNumber) currentSlide = 0;

		updateSlider();
	});


	$(document).ready(function () {
		setInterval(function () {
			++currentSlide;
			if (currentSlide >= slidesNumber) currentSlide = 0;

			updateSlider();
		}, 3000);
	});


	$('.carousel[data-type="multi"] .item').each(function () {
		var next = $(this).next();
		if (!next.length) {
			next = $(this).siblings(':first');
		}
		next.children(':first-child').clone().appendTo($(this));

		for (var i = 0; i < 2; i++) {
			next = next.next();
			if (!next.length) {
				next = $(this).siblings(':first');
			}

			next.children(':first-child').clone().appendTo($(this));
		}
	});
}
