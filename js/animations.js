$(document).ready(function () {
    //image lazy loading
    var lazyImages = $("img").toArray();
    let lazyImageObserver = new IntersectionObserver(function (entries, observer) {
        $.each(entries, function (index, entry) {
            if (entry.isIntersecting) {
                let lazyImage = entry.target;
                lazyImage.src = $(lazyImage).data('src');
                $(lazyImage).addClass('active');
                observer.unobserve(lazyImage);
            }
        });
    });

    $.each(lazyImages, function (index, lazyImage) {
        lazyImageObserver.observe(lazyImage);
    });
    //image animation ovserver
    var animElements = $('.anim, .anim1, .anim2').toArray();
    let animObserver = new IntersectionObserver(function (entries, observer) {
        $.each(entries, function (index, entry) {
            if (entry.isIntersecting) {
                $(entry.target).addClass('active');
                observer.unobserve(entry.target);
            }
        });
    });

    $.each(animElements, function (index, animElement) {
        animObserver.observe(animElement);
    });

    //nav link active class add
    let myPath = ['/about', '/services', '/products', '/projects', '/academy', '/career', '/team', '/contact'];
    myPath.forEach(function (path) {
        if (window.location.pathname.endsWith(path)) {
            var nav_link = document.querySelectorAll('.nav-link');
            nav_link.forEach(function (nav) {
                if (path == nav.getAttribute('href')) {
                    nav.classList.add('active');
                }
            })
        }
    })

    //we rich counters-
    // function startCounter(element, targetValue) {
    //     let start = 0;
    //     let duration = 3000;
    //     let interval = Math.ceil(duration / targetValue) / 100;
    //     let counter = setInterval(function () {
    //         start++;
    //         element.text(start.toLocaleString() + "+")
    //         if (start >= targetValue) {
    //             clearInterval(counter)
    //         }
    //     }, interval)
    // }
    // function startCounter(element, targetValue) {
    //     let start = 0;
    //     let steps = 10;
    //     let increment = Math.ceil(targetValue / steps);
    //     let duration = 3000;
    //     let interval = duration / steps;

    //     let counter = setInterval(function () {
    //         start += increment;
    //         if (start >= targetValue) {
    //             start = targetValue;
    //             clearInterval(counter);
    //         }
    //         element.text(start.toLocaleString());
    //     }, interval);
    // }
    function startCounter(element, targetValue, suffix) {
        let start = 0;
        let steps = 10;
        let increment = Math.ceil(targetValue / steps);
        let duration = 3000;
        let interval = duration / steps;

        let counter = setInterval(function () {
            start += increment;
            if (start >= targetValue) {
                start = targetValue;
                clearInterval(counter);
            }

            // Format the number with the appropriate suffix
            let formattedNumber;
            if (suffix === "M") {
                formattedNumber = (start / 1_000_000).toFixed(1) + "M+";
            } else if (suffix === "K") {
                formattedNumber = (start / 1_000).toFixed(1) + "K+";
            } else {
                formattedNumber = start.toLocaleString() + "+";
            }

            element.text(formattedNumber);
        }, interval);
    }
    let observer = new IntersectionObserver((entries, observer) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                let counterElement = $(entry.target).find("h2"); // Target only the number
                let fullText = $(entry.target).find("h2").text().trim(); // Full text
                // let targetValue = parseInt(counterElement.text().replace(/\D/g, ""));
                let suffix = fullText.includes("M") ? "M" : fullText.includes("K") ? "K" : ""; // Detect suffix
                let targetValue = parseFloat(counterElement.text().replace(",", "")) * (suffix === "M" ? 1_000_000 : suffix === "K" ? 1_000 : 1);

                if (!counterElement.hasClass("counted")) { // Ensure it only runs once
                    startCounter(counterElement, targetValue, suffix);
                    counterElement.addClass("counted");
                }
            }
        })
    }, { threshold: 0.5 });

    $('.we-rich-counter').each(function () {
        observer.observe(this)
    })
});
