document.addEventListener('DOMContentLoaded', function () {
    const prevButton = document.querySelector('.slide_action_pre');
    const nextButton = document.querySelector('.slide_action_next');
    const slideContent = document.querySelector('.slide_content');
    const slides = document.querySelectorAll('.slide_content img'); // Lấy tất cả các slide là hình ảnh
    let index = 0;

    function updateSlidePosition() {
        const slideWidth = slides[0].clientWidth;
        slideContent.style.transform = `translateX(${-index * slideWidth}px)`;
    }

    // Event listener cho nút Previous
    prevButton.addEventListener('click', function () {
        index = (index > 0) ? index - 1 : slides.length - 1;
        updateSlidePosition();
    });

    // Event listener cho nút Next
    nextButton.addEventListener('click', function () {
        index = (index < slides.length - 1) ? index + 1 : 0;
        updateSlidePosition();
    });

    // Optional: Tự động chuyển slide mỗi 3 giây
    setInterval(function () {
        nextButton.click();
    }, 3000); // Thay đổi 3000 theo khoảng thời gian mong muốn
});


// Add a simple toggle for dropdown (if not using CSS hover)
document.querySelectorAll('.dropdown').forEach(function(dropdown) {
    dropdown.addEventListener('click', function(event) {
        event.stopPropagation();
        this.querySelector('.dropdown-menu').classList.toggle('show');
    });
});

document.addEventListener('click', function() {
    document.querySelectorAll('.dropdown-menu').forEach(function(menu) {
        menu.classList.remove('show');
    });
});

