function flipCard(card) {
    card.querySelector('.card-inner').classList.toggle('flipped');
}
gsap.registerPlugin(ScrollTrigger);

function isMobile() {
    return window.innerWidth <= 768;  
}

if (!isMobile()) {
    const scrollContainer = document.getElementById("scrollContainer");

    ScrollTrigger.create({
        trigger: scrollContainer,
        start: "top top",
        end: "+=5000",
        scrub: 1,
        onEnter: () => {
            document.body.style.overflowY = "hidden"; 
        },
        onLeave: () => {
            document.body.style.overflowY = "auto";  
        },
        onLeaveBack: () => {
            document.body.style.overflowY = "auto";  
        },
        pin: false  
    });

    scrollContainer.addEventListener("wheel", (e) => {
        if (e.deltaY !== 0) {
            e.preventDefault();  
            let scrollSpeed = 1000;  
            scrollContainer.scrollLeft += e.deltaY > 0 ? scrollSpeed : -scrollSpeed;  
        }
    }, { passive: false });

    scrollContainer.addEventListener("mouseenter", () => {
        document.body.style.overflowY = "hidden"; 
    });

    scrollContainer.addEventListener("mouseleave", () => {
        document.body.style.overflowY = "auto"; 
    });
}
function flipCard(card) {
    card.querySelector('.card-inner').classList.toggle('flipped');
}
gsap.registerPlugin(ScrollTrigger);

function isMobile() {
    return window.innerWidth <= 768;  
}

if (!isMobile()) {
    const scrollContainer = document.getElementById("scrollContainer");

    ScrollTrigger.create({
        trigger: scrollContainer,
        start: "top top",
        end: "+=5000",
        scrub: 1,
        onEnter: () => {
            document.body.style.overflowY = "hidden";  
        },
        onLeave: () => {
            document.body.style.overflowY = "auto";  
        },
        onLeaveBack: () => {
            document.body.style.overflowY = "auto";  
        },
        pin: false  
    });

    scrollContainer.addEventListener("wheel", (e) => {
        if (e.deltaY !== 0) {
            e.preventDefault();  
            let scrollSpeed = 1000;  
            scrollContainer.scrollLeft += e.deltaY > 0 ? scrollSpeed : -scrollSpeed;  
        }
    }, { passive: false });

    scrollContainer.addEventListener("mouseenter", () => {
        document.body.style.overflowY = "hidden"; 
    });

    scrollContainer.addEventListener("mouseleave", () => {
        document.body.style.overflowY = "auto"; 
    });
}
const navbarToggler = document.querySelector('.navbar-toggler');
const navbarCollapse = document.querySelector('.collapse');
const closeMenuBtn = document.querySelector('.close-menu-btn');
const menuLinks = document.querySelectorAll('.navbar-nav .nav-link');

navbarToggler.addEventListener('click', () => {
    if (navbarCollapse.classList.contains('show')) {
        document.body.classList.remove('menu-open');
        navbarToggler.style.display = 'block'; 
        document.querySelector('.navbar-brand').style.display = ''; 
    } else {
        document.body.classList.add('menu-open');
        navbarToggler.style.display = 'none'; 
        document.querySelector('.navbar-brand').style.display = 'none';
    }
});

closeMenuBtn.addEventListener('click', () => {
    document.body.classList.remove('menu-open');
    navbarCollapse.classList.remove('show'); 
    navbarToggler.style.display = 'block'; 
    document.querySelector('.navbar-brand').style.display = '';
});

menuLinks.forEach(link => {
    link.addEventListener('click', () => {
        document.body.classList.remove('menu-open'); 
        navbarCollapse.classList.remove('show');
        navbarToggler.style.display = 'block'; 
        document.querySelector('.navbar-brand').style.display = ''; 
    });
});


document.addEventListener('DOMContentLoaded', function() {
    var modal = document.getElementById('form-modal');
    var openButton = document.getElementById('open-form-button');
    var closeButton = document.getElementsByClassName('close')[0];

    openButton.onclick = function() {
        modal.style.display = 'block';
    };

    closeButton.onclick = function() {
        modal.style.display = 'none';
    };

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = 'none';
        }
    };
    console.log(
        "123"
    )
});