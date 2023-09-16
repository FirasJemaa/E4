/******navbar*******/

const toggler = document.querySelector(".hamburger");
const navLinksContainer = document.querySelector(".navlinks-container");

const toggleNav = e => {
  // Animation du bouton
  toggler.classList.toggle("open");

  const ariaToggle =
    toggler.getAttribute("aria-expanded") === "true" ? "false" : "true";
  toggler.setAttribute("aria-expanded", ariaToggle);

  // Slide de la navigation
  navLinksContainer.classList.toggle("open");
};

toggler.addEventListener("click", toggleNav);


new ResizeObserver(entries => {
  if (entries[0].contentRect.width <= 900) {
    navLinksContainer.style.transition = "transform 0.4s ease-out";
  } else {
    navLinksContainer.style.transition = "none";
  }
}).observe(document.body);

/* Scroll */
window.addEventListener('scroll', reveal);

function reveal() {
  let reveals = document.querySelectorAll('.reveal');

  for (let i = 0; reveals.length; i++) {
    let windowheight = window.innerHeight;
    let revealtop = reveals[i].getBoundingClientRect().top;
    let revealpoint = 150;

    if (revealtop < windowheight - revealpoint) {
      reveals[i].classList.add('active');
      /*}else{
          reveals[i].classList.remove('active');*/
    }
  }
};

// formation
const allRonds = document.querySelectorAll('.rond');
const allBoxes = document.querySelectorAll('.box');

const controller = new ScrollMagic.Controller()

allBoxes.forEach(box => {
  for (i = 0; i < allRonds.length; i++) {
    if (allRonds[i].getAttribute('data-anim') === box.getAttribute('data-anim')) {
      let tween = gsap.from(box, { y: -50, opacity: 0, duration: 0.5 })

      let scene = new ScrollMagic.Scene({
        triggerElement: allRonds[i],
        reverse: true
      })
        .setTween(tween)
        .addTo(controller)
    }
  }
})

// BTN scroll top
window.addEventListener('scroll', TopScroll);
function TopScroll() {
  let BtnScrollTop = document.getElementById('topButton');
    
  if (window.scrollY > 200){
    BtnScrollTop.style.visibility ="visible";
  }else{
    BtnScrollTop.style.visibility ="hidden";
  }
};

document
  .getElementById('topButton')
  .addEventListener("click", function(){
    window.scrollTo({
      top:0,
      behavior:"smooth"
    });
  });