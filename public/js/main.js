  document.querySelectorAll('.ckeditor').forEach((editor) => {
        ClassicEditor
            .create(editor, {
                toolbar: [
                    'heading',
                    '|',
                    'bold', 'italic', 'underline', 'strikethrough',
                    '|',
                    'bulletedList', 'numberedList',
                    '|',
                    'link', 'blockQuote',
                    '|',
                    'undo', 'redo'
                ]
            })
            .catch(error => {
                console.error(error);
            });
    });

    function shareProduct() {
    if (navigator.share) {
        navigator.share({
            title: "{{ $product->name }}",
            text: "Check out this product",
            url: "{{ url()->current() }}"
        });
    } else {
        navigator.clipboard.writeText("{{ url()->current() }}");
        alert('Product link copied!');
    }
}


$(document).ready(function () {
    $('.testimonial-carousel').owlCarousel({
        loop: true,
        margin: 25,
        autoplay: true,
        autoplayTimeout: 4000,
        smartSpeed: 800,
        dots: true,
        nav: false,
        responsive: {
            0: { items: 1 },
            768: { items: 2 },
            1200: { items: 3 }
        }
    });
});



$(document).ready(function () {
    // Only enable hover for large screens
    function enableHoverDropdown() {
        if (window.innerWidth >= 992) {
            $('.dropdown').hover(
                function () {
                    $(this).addClass('show');
                    $(this).find('.dropdown-toggle').attr('aria-expanded', 'true');
                    $(this).find('.dropdown-menu').addClass('show');
                },
                function () {
                    $(this).removeClass('show');
                    $(this).find('.dropdown-toggle').attr('aria-expanded', 'false');
                    $(this).find('.dropdown-menu').removeClass('show');
                }
            );
        } else {
            // Remove hover events to avoid issues on resize
            $('.dropdown').off('mouseenter mouseleave');
        }
    }

    enableHoverDropdown();

    // Re-apply on window resize
    $(window).on('resize', function () {
        enableHoverDropdown();
    });
});

// AOS Init
$(document).ready(function() {
	AOS.init({
		duration: 1000,
	  });
  });


