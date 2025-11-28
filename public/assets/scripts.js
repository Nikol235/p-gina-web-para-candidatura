
document.addEventListener("DOMContentLoaded", () => {
  const idiomaBtn = document.getElementById("idiomaBtn");
  const idiomaMenu = document.getElementById("idiomaMenu");

  if (!idiomaBtn || !idiomaMenu) return;

  idiomaBtn.addEventListener("click", (e) => {
    e.stopPropagation();
    idiomaMenu.classList.toggle("open");
    idiomaMenu.setAttribute("aria-hidden", String(!idiomaMenu.classList.contains("open")));
  });

  idiomaMenu.addEventListener("click", (e) => {
    e.stopPropagation();
  });

  document.addEventListener("click", () => {
    if (idiomaMenu.classList.contains("open")) {
      idiomaMenu.classList.remove("open");
      idiomaMenu.setAttribute("aria-hidden", "true");
    }
  });

  document.addEventListener("keydown", (e) => {
    if (e.key === "Escape") {
      idiomaMenu.classList.remove("open");
      idiomaMenu.setAttribute("aria-hidden", "true");
    }
  });
});


document.addEventListener("DOMContentLoaded", () => {
  const menuLinks = document.querySelectorAll(".lado ul li a");
  const sections = document.querySelectorAll("section");

  function setActiveMenu() {
    let current = "";

    sections.forEach(section => {
      const sectionTop = section.offsetTop;
      const sectionHeight = section.clientHeight;
      if (window.pageYOffset >= sectionTop - 200) {
        current = section.getAttribute("id");
      }
    });

    menuLinks.forEach(link => {
      link.classList.remove("active");
      if (link.getAttribute("href") === `#${current}`) {
        link.classList.add("active");
      }
    });
  }

  window.addEventListener("scroll", setActiveMenu);
  setActiveMenu();
});


const traducciones = {
  es: {
    inicio: "INICIO",
    acerca: "ACERCA DE",
    noticias: "NOTICIAS",
    eventos: "EVENTOS",
    propuestas: "PROPUESTAS",
    ayudanos: "AYUDANOS",
    idiomas: "IDIOMAS ▼",
    tite: "ACERCA DE MI"
  },
  ay: {
    inicio: "QALLTAÑA",
    acerca: "ARU YATI",
    noticias: "YATIYAS",
    eventos: "SARNAQÄWINAKA",
    propuestas: "AMTANAKA",
    ayudanos: "YANAPT'ITA",
    idiomas: "ARUNAKA ▼",
    tite: "NAYAN TUQITA"
  },
  qu: {
    inicio: "QALLARIY",
    acerca: "IMAYNATAQ",
    noticias: "WILLANAKUNA",
    eventos: "RIYKUYNIN",
    propuestas: "RIQSISQA",
    ayudanos: "YANAPAWAY",
    idiomas: "SIMIKUNA ▼",
    tite: "ÑUQAMANTA"
  }
};

function cambiarIdioma(lang) {

  localStorage.setItem("idioma", lang);


  document.querySelectorAll("[data-key]").forEach((el) => {
    const key = el.getAttribute("data-key");
    if (traducciones[lang] && traducciones[lang][key]) {
      el.textContent = traducciones[lang][key];
    }
  });
}


document.addEventListener("DOMContentLoaded", () => {
  const idiomaGuardado = localStorage.getItem("idioma") || "es";
  cambiarIdioma(idiomaGuardado);
});


let carouselIndices = {
  news: 0,
  events: 0,
  proposals: 0
};

function moveCarousel(type, direction) {
  const trackId = type + 'Track';
  const track = document.getElementById(trackId);

  if (!track) return;

  const items = track.children;
  const totalItems = items.length;

  if (totalItems === 0) return;


  carouselIndices[type] += direction;


  if (carouselIndices[type] < 0) {
    carouselIndices[type] = totalItems - 1;
  } else if (carouselIndices[type] >= totalItems) {
    carouselIndices[type] = 0;
  }

  let offset;

  if (type === 'news') {

    offset = carouselIndices[type] * 100;
  } else {

    const itemsVisible = window.innerWidth <= 768 ? 1 : 3;
    offset = carouselIndices[type] * (100 / itemsVisible);
  }

  track.style.transform = `translateX(-${offset}%)`;

  updateIndicators(type);
}


function createIndicators(type) {
  const trackId = type + 'Track';
  const indicatorsId = type + 'Indicators';

  const track = document.getElementById(trackId);
  const indicatorsContainer = document.getElementById(indicatorsId);

  if (!track || !indicatorsContainer) return;

  const items = track.children;
  const totalItems = items.length;

  indicatorsContainer.innerHTML = '';


  for (let i = 0; i < totalItems; i++) {
    const dot = document.createElement('div');
    dot.classList.add('dot');
    if (i === 0) dot.classList.add('active');

    dot.addEventListener('click', () => {
      carouselIndices[type] = i;
      moveCarousel(type, 0);
    });

    indicatorsContainer.appendChild(dot);
  }
}


function updateIndicators(type) {
  const indicatorsId = type + 'Indicators';
  const indicatorsContainer = document.getElementById(indicatorsId);

  if (!indicatorsContainer) return;

  const dots = indicatorsContainer.querySelectorAll('.dot');
  dots.forEach((dot, index) => {
    if (index === carouselIndices[type]) {
      dot.classList.add('active');
    } else {
      dot.classList.remove('active');
    }
  });
}

document.addEventListener("DOMContentLoaded", () => {
  createIndicators('news');
  createIndicators('events');
  createIndicators('proposals');

  setInterval(() => {
    moveCarousel('news', 1);
  }, 5000);
});

window.addEventListener('resize', () => {

  ['events', 'proposals'].forEach(type => {
    const trackId = type + 'Track';
    const track = document.getElementById(trackId);
    if (track) {
      carouselIndices[type] = 0;
      track.style.transform = 'translateX(0)';
      updateIndicators(type);
    }
  });
});

document.addEventListener("DOMContentLoaded", () => {
  const menuLinks = document.querySelectorAll('a[href^="#"]');

  menuLinks.forEach(link => {
    link.addEventListener('click', function(e) {
      e.preventDefault();

      const targetId = this.getAttribute('href');
      if (targetId === '#') return;

      const targetSection = document.querySelector(targetId);

      if (targetSection) {
        const offsetTop = targetSection.offsetTop - 120;

        window.scrollTo({
          top: offsetTop,
          behavior: 'smooth'
        });
      }
    });
  });
});


const observerOptions = {
  threshold: 0.1,
  rootMargin: '0px 0px -50px 0px'
};

const observer = new IntersectionObserver((entries) => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      entry.target.style.opacity = '1';
      entry.target.style.transform = 'translateY(0)';
    }
  });
}, observerOptions);

document.addEventListener("DOMContentLoaded", () => {

  const animatedElements = document.querySelectorAll('.event-card, .proposal-card, .news-item');

  animatedElements.forEach(el => {
    el.style.opacity = '0';
    el.style.transform = 'translateY(30px)';
    el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
    observer.observe(el);
  });
});


document.addEventListener("DOMContentLoaded", () => {
  const form = document.querySelector('.cool-form');

  if (form) {
    form.addEventListener('submit', function(e) {
      e.preventDefault();

      const inputs = this.querySelectorAll('.cool-input');
      let isValid = true;

      inputs.forEach(input => {
        if (input.hasAttribute('required') && !input.value.trim()) {
          isValid = false;
          input.style.borderColor = '#d32f2f';

          setTimeout(() => {
            input.style.borderColor = '#d7ead2';
          }, 2000);
        }
      });

      if (isValid) {

        alert('¡Mensaje enviado correctamente! Nos pondremos en contacto contigo pronto.');
        this.reset();
      } else {
        alert('Por favor, completa todos los campos requeridos.');
      }
    });
  }
});


window.addEventListener('scroll', () => {
  const heroImage = document.querySelector('.hero-image');
  if (heroImage && window.pageYOffset < window.innerHeight) {
    heroImage.style.transform = `translateY(${window.pageYOffset * 0.5}px)`;
  }
});
