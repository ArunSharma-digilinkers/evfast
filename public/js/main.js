document.addEventListener("DOMContentLoaded", function () {

    const thumbs = document.querySelectorAll(".thumb");
    const mainImage = document.getElementById("mainImage");
    const modalImage = document.getElementById("modalImage");

    let images = [];
    let currentIndex = 0;

    // GET IMAGES FROM THUMBS
    thumbs.forEach(thumb => {
        images.push(thumb.dataset.src);
    });

    if (!images.length || !mainImage) return;

    // INITIAL IMAGE
    mainImage.src = images[0];

    function updateImage() {
        mainImage.src = images[currentIndex];

        thumbs.forEach((thumb, index) => {
            thumb.classList.toggle("active-thumb", index === currentIndex);
        });
    }

    // NEXT BUTTON
    const nextBtn = document.querySelector(".next");
    if (nextBtn) {
        nextBtn.addEventListener("click", () => {
            currentIndex = (currentIndex + 1) % images.length;
            updateImage();
        });
    }

    // PREV BUTTON
    const prevBtn = document.querySelector(".prev");
    if (prevBtn) {
        prevBtn.addEventListener("click", () => {
            currentIndex = (currentIndex - 1 + images.length) % images.length;
            updateImage();
        });
    }

    // THUMB CLICK
    thumbs.forEach(thumb => {
        thumb.addEventListener("click", function () {
            currentIndex = parseInt(this.dataset.index);
            updateImage();
        });
    });

    // MODAL
    if (modalImage) {
        mainImage.addEventListener("click", function () {
            modalImage.src = this.src;
            new bootstrap.Modal(document.getElementById("imageModal")).show();
        });
    }

});


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

let removedImages = [];

function removeImage(imageName, index) {

    if (confirm('Are you sure you want to remove this image?')) {

        removedImages.push(imageName);

        document.getElementById('removed_images').value = removedImages.join(',');

        let imageBox = document.getElementById('image-box-' + index);

        if (imageBox) {
            imageBox.remove();
        }

        console.log("Removed:", removedImages);
    }
}


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


document.addEventListener("DOMContentLoaded", function () {

    const text = document.getElementById("productDescription");
    const button = document.getElementById("readMoreBtn");

    if (text) {
        const lineHeight = parseFloat(getComputedStyle(text).lineHeight);
        const maxHeight = lineHeight * 3;

        if (text.scrollHeight > maxHeight) {
            button.classList.remove("d-none");
        }
    }

});

function toggleDescription(button) {
    const text = document.getElementById("productDescription");

    text.classList.toggle("expanded");

    if (text.classList.contains("expanded")) {
        button.innerText = "Read Less";
    } else {
        button.innerText = "Read More";
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

    var owl = $('.gallery-carousel');

    owl.owlCarousel({
        loop: false,
        margin: 25,
        autoplay: false,
        smartSpeed: 800,
        dots: true,
        nav: true,
navText: [
    '<i class="fa fa-angle-left"></i>',
    '<i class="fa fa-angle-right"></i>'
],
        responsive: {
            0: { items: 4 },
            768: { items: 4 },
            1200: { items: 4 }
        },
        onInitialized: toggleNav,
        onResized: toggleNav
    });

    function toggleNav(event) {
        var carousel = event.relatedTarget;
        var currentItems = carousel.settings.items;
        var totalItems = carousel.items().length;

        if (totalItems <= currentItems) {
            $(event.target).find('.owl-nav').hide();
        } else {
            $(event.target).find('.owl-nav').show();
        }
    }

});


function changeImage(element) {

    // Change main image
    var mainImage = document.getElementById("mainImage");
    mainImage.src = element.src;

    // Remove active class
    document.querySelectorAll('.thumb').forEach(function(img) {
        img.classList.remove('active-thumb');
    });

    // Add active class to clicked
    element.classList.add('active-thumb');

    // Auto Scroll to Main Image
    document.querySelector('.product-main-image').scrollIntoView({
        behavior: 'smooth',
        block: 'center'
    });

}


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

  document.querySelector('[name="post_title"]').addEventListener('keyup', function () {
    let slug = this.value
        .toLowerCase()
        .replace(/[^a-z0-9]+/g, '-')
        .replace(/(^-|-$)/g, '');

    document.querySelector('[name="slug"]').value = slug;
});






