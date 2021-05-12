window.addEventListener('DOM', function(){
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
  });