document.addEventListener('DOMContentLoaded', function() {
    var backToTopBtn = document.getElementById('backToTopBtn');

    window.addEventListener('scroll', function() {
        if (window.pageYOffset > 200) {
            backToTopBtn.classList.add('show');
        } else {
            backToTopBtn.classList.remove('show');
        }
    });

    backToTopBtn.addEventListener('click', function(e) {
        e.preventDefault();
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });
});