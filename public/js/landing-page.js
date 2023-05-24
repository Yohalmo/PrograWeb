var slides = $('.carrucel');
    var indicators = $('.indicator');
    var currentSlide = 0;
    setInterval(nextSlide, 5000);

function nextSlide() {
    $(slides[currentSlide]).addClass('d-none');
    $(indicators[currentSlide]).removeClass('active');
    currentSlide = (currentSlide + 1) % slides.length;
    $(slides[currentSlide]).removeClass('d-none');
    $(indicators[currentSlide]).addClass('active');
}
