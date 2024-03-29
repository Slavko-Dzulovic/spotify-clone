new Glider(document.querySelector('.glider'), {
    // Mobile-first defaults
    slidesToShow: 1,
    slidesToScroll: 1,
    scrollLock: true,
    dots: '#resp-dots',
    arrows: {
        prev: '.glider-prev',
        next: '.glider-next'
    },
    responsive: [
        {
            // screens greater than >= 775px
            breakpoint: 775,
            settings: {
                // Set to `auto` and provide item width to adjust to viewport
                slidesToShow: 'auto',
                slidesToScroll: 'auto',
                itemWidth: 150,
                duration: 0.25
            }
        }, {
            // screens greater than >= 1024px
            breakpoint: 1024,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1,
                itemWidth: 150,
                duration: 0.25
            }
        }
    ]
});
new Glider(document.querySelector('.g1'), {
    // Mobile-first defaults
    slidesToShow: 1,
    slidesToScroll: 1,
    scrollLock: true,
    dots: '#resp-dots',
    arrows: {
        prev: '.gp1',
        next: '.gn1'
    },
    responsive: [
        {
            // screens greater than >= 775px
            breakpoint: 775,
            settings: {
                // Set to `auto` and provide item width to adjust to viewport
                slidesToShow: 'auto',
                slidesToScroll: 'auto',
                itemWidth: 150,
                duration: 0.25
            }
        },{
            // screens greater than >= 1024px
            breakpoint: 1024,
            settings: {
                slidesToShow: 4,
                slidesToScroll: 1,
                itemWidth: 150,
                duration: 0.25
            }
        }
    ]
});
new Glider(document.querySelector('.g2'), {
    // Mobile-first defaults
    slidesToShow: 1,
    slidesToScroll: 1,
    scrollLock: true,
    dots: '#resp-dots',
    arrows: {
        prev: '.gp2',
        next: '.gn2'
    },
    responsive: [
        {
            // screens greater than >= 775px
            breakpoint: 775,
            settings: {
                // Set to `auto` and provide item width to adjust to viewport
                slidesToShow: 'auto',
                slidesToScroll: 'auto',
                itemWidth: 150,
                duration: 0.25
            }
        }, {
            // screens greater than >= 1024px
            breakpoint: 1024,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1,
                itemWidth: 150,
                duration: 0.25
            }
        }
    ]
});
new Glider(document.querySelector('.g3'), {
    // Mobile-first defaults
    slidesToShow: 1,
    slidesToScroll: 1,
    scrollLock: true,
    dots: '#resp-dots',
    arrows: {
        prev: '.gp3',
        next: '.gn3'
    },
    responsive: [
        {
            // screens greater than >= 775px
            breakpoint: 775,
            settings: {
                // Set to `auto` and provide item width to adjust to viewport
                slidesToShow: 'auto',
                slidesToScroll: 'auto',
                itemWidth: 150,
                duration: 0.25
            }
        }, {
            // screens greater than >= 1024px
            breakpoint: 1024,
            settings: {
                slidesToShow: 4,
                slidesToScroll: 1,
                itemWidth: 150,
                duration: 0.25
            }
        }
    ]
});

