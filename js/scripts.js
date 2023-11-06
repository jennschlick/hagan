const observerCallback = (entries, observer) => {
  for (const { target, isIntersecting } of entries) {
    if (isIntersecting) {
      target.classList.add('animate');
      observer.unobserve(target);
    }
  }
};

const observer = new IntersectionObserver(observerCallback, {
  root: null,
  rootMargin: '0px',
  threshold: [0]
});

const trigger = document.querySelector('.js-animation-trigger');

observer.observe(trigger);