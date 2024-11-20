/*!
* Start Bootstrap - Modern Business v5.0.7 (https://startbootstrap.com/template-overviews/modern-business)
* Copyright 2013-2023 Start Bootstrap
* Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-modern-business/blob/master/LICENSE)
*/
// This file is intentionally blank
// Use this file to add JavaScript to your project

document.querySelector('a[href="#link"]').addEventListener('click', function (e) {
    e.preventDefault(); // Mencegah perilaku bawaan browser

    // Scroll ke elemen dengan ID 'link'
    const target = document.querySelector(this.getAttribute('href'));
    if (target) {
        target.scrollIntoView({ behavior: 'smooth' });
    }

    // Ubah path secara manual di URL
    if (history.pushState) {
        history.pushState(null, null, this.getAttribute('href'));
    } else {
        window.location.hash = this.getAttribute('href');
    }
});