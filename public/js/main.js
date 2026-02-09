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


let addons = [];

function addAddon() {
    let select = document.getElementById('addonSelect');
    let id = select.value;
    let text = select.options[select.selectedIndex].text;

    if (!id || addons.includes(id)) return;

    addons.push(id);
    document.getElementById('addonsInput').value = addons;

    let li = document.createElement('li');
    li.className = 'list-group-item d-flex justify-content-between';
    li.innerHTML = `${text}
        <button type="button" class="btn btn-danger btn-sm" onclick="removeAddon(${id}, this)">Remove</button>`;
    document.getElementById('addonList').appendChild(li);
}

function removeAddon(id, el) {
    addons = addons.filter(a => a != id);
    document.getElementById('addonsInput').value = addons;
    el.parentElement.remove();
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


