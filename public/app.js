document.addEventListener("DOMContentLoaded", function () {

   const movieElements = document.querySelectorAll(".card .title");

const movies = [];

movieElements.forEach((el) => {
    movies.push({
        name: el.innerText,
        url:"/search?q=" 
    });
});

    const input = document.getElementById("searchInput");
    const results = document.getElementById("results");
    const overlay = document.getElementById("searchOverlay");

   
    window.openSearch = function () {
        overlay.style.display = "flex";

        setTimeout(() => {
            overlay.classList.add("active");
        }, 10);

        input.focus();
        results.innerHTML = "";
    }

   
    window.closeSearch = function () {
        overlay.classList.remove("active");

        setTimeout(() => {
            overlay.style.display = "none";
        }, 300);
    }

    
    input.addEventListener("keyup", function () {
    const keyword = input.value.toLowerCase();
    results.innerHTML = "";

    if (keyword === "") return;

    const filtered = movies
        .filter(movie =>
            movie.name.toLowerCase().includes(keyword)
        )
        .slice(0, 15); 

    filtered.forEach((movie, index) => {
        const div = document.createElement("div");

        div.innerHTML = (index + 1) + ". " + movie.name;

        div.onclick = function () {
            window.location.href = "/search?q=" + encodeURIComponent(movie.name);
        };

        results.appendChild(div);
    });
});

    
    document.addEventListener("keydown", function(e) {
        if (e.key === "Escape") {
            closeSearch();
        }
    });

});




let index = 0;

function showSlide(i) {
    const slides = document.querySelectorAll("#slides img");
    const total = slides.length;

    if (i >= total) index = 0;
    else if (i < 0) index = total - 1;
    else index = i;

    slides.forEach(slide => slide.classList.remove("active"));
    slides[index].classList.add("active");
}

function fadeToNext(nextIndex) {
    const slides = document.querySelectorAll("#slides img");

    slides[index].classList.remove("active");

    setTimeout(() => {
        showSlide(nextIndex);
    }, 500);
}

function nextSlide() {
    fadeToNext(index + 1);
}

function prevSlide() {
    fadeToNext(index - 1);
}

setInterval(() => {
    fadeToNext(index + 1);
}, 10000);

document.addEventListener("DOMContentLoaded", function () {
    showSlide(0);
});




window.addEventListener("scroll", function() {
    const navbar = document.querySelector(".navbar");

    if (window.scrollY > 30) {
        navbar.classList.add("scrolled");
    } else {
        navbar.classList.remove("scrolled");
    }
});




const sliders = document.querySelectorAll(".movie-list");

sliders.forEach((slider) => {
    let isDown = false;
    let startX;
    let scrollLeft;

    slider.addEventListener("mousedown", (e) => {
        isDown = true;
        slider.classList.add("active");
        startX = e.pageX - slider.offsetLeft;
        scrollLeft = slider.scrollLeft;
    });

    slider.addEventListener("mouseleave", () => {
        isDown = false;
        slider.classList.remove("active");
    });

    slider.addEventListener("mouseup", () => {
        isDown = false;
        slider.classList.remove("active");
    });

    slider.addEventListener("mousemove", (e) => {
        if (!isDown) return;
        e.preventDefault();
        const x = e.pageX - slider.offsetLeft;
        const walk = (x - startX) * 0.6;
        slider.scrollLeft = scrollLeft - walk;
    });
});

document.querySelectorAll('.card').forEach(card => {
    card.addEventListener('click', function () {

        let title = this.querySelector('.title')?.innerText;
        let image = this.querySelector('img')?.getAttribute('src');

        const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        console.log("CLICK:", title, image);

      fetch('/history/store', {
        method: 'POST',
        headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': token
        },
        body: JSON.stringify({ title, image })
        })
        .then(response => response.json())
        .then(data => {
            showNotif("✔ Added to history", "success");
        })
        .catch(error => {
            showNotif("❌ Failed to add history", "error");
        });

    });
});
function showNotif(message, type = "success") {
    const notif = document.getElementById("notif");

    notif.innerText = message;
    notif.className = "notif " + type + " show";

    setTimeout(() => {
        notif.classList.remove("show");
    }, 2000);
}
