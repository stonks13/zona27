/*window.addEventListener('load', function(){
  new Glider(document.querySelector('.glider'), {
      slidesToScroll: 1,
      slidesToShow: 1,
      draggable: true,
      dots: '.dots',
      rewind: true,
      arrows: {
        prev: '.glider-prev',
        next: '.glider-next'
      }
  });
});*/

document.addEventListener('DOMContentLoaded', () => {
  const elementosCarousel = document.querySelectorAll('.carousel');
  M.Carousel.init(elementosCarousel, {
    duration: 150,
    dist: -60,
    shift: 5,
    padding: 5,
    numVisible: 5,
    indicators: false,
    noWrap: false
  });
});