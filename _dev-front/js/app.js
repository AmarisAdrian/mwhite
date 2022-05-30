import RangeInput from './components/range/range';

new RangeInput(document.querySelector('.range'));

$('.scroll-to').click(function(e) {
    e.preventDefault();
    var sectionTo = $(this).attr('href');
    $('html, body').animate({
      scrollTop: $(sectionTo).offset().top
    }, 800);
});