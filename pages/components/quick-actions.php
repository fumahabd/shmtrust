<style>
  body.has-quick-actions {
    padding-bottom: calc(106px + env(safe-area-inset-bottom, 0px)) !important;
  }
  .shmt-quick-actions {
    position: fixed;
    z-index: 1020;
    right: 20px;
    bottom: calc(20px + env(safe-area-inset-bottom, 0px));
    display: flex;
    align-items: stretch;
    gap: 6px;
    width: max-content;
    max-width: calc(100% - 40px);
    padding: 8px;
    border: 1px solid rgba(16, 63, 122, .12);
    border-radius: 18px;
    background: rgba(255, 255, 255, .96);
    box-shadow: 0 12px 34px rgba(16, 47, 86, .2);
    backdrop-filter: blur(14px);
  }
  .shmt-quick-action {
    display: flex;
    min-height: 50px;
    align-items: center;
    gap: 10px;
    padding: 8px 12px;
    border: 1px solid #E5ECF5;
    border-radius: 12px;
    background: #fff;
    color: #103F7A;
    font: 600 12px/1.2 'DM Sans', Arial, sans-serif;
    white-space: nowrap;
    text-decoration: none;
    transition: background .18s ease, color .18s ease, transform .18s ease, box-shadow .18s ease;
  }
  .shmt-quick-action:hover {
    transform: translateY(-1px);
    background: #F2F7FD;
    color: #103F7A;
    box-shadow: 0 4px 12px rgba(16, 63, 122, .1);
  }
  .shmt-quick-action:focus-visible {
    outline: 3px solid rgba(23, 86, 162, .4);
    outline-offset: 2px;
  }
  .shmt-quick-action svg {
    width: 21px;
    height: 21px;
    flex: 0 0 21px;
    fill: none;
    stroke: currentColor;
    stroke-linecap: round;
    stroke-linejoin: round;
    stroke-width: 1.8;
  }
  .shmt-quick-action--emergency {
    border-color: #ED3345;
    background: #ED3345;
    color: #fff;
  }
  .shmt-quick-action--emergency:hover {
    background: #D92739;
    color: #fff;
  }
  .shmt-quick-action--whatsapp svg { color: #1756A2; }
  .shmt-quick-action-short { display: none; }
  .shmt-quick-actions.is-hidden { display: none; }

  @media (max-width: 767.98px) {
    body.has-quick-actions {
      padding-bottom: calc(94px + env(safe-area-inset-bottom, 0px)) !important;
    }
    .shmt-quick-actions {
      right: 10px;
      bottom: calc(9px + env(safe-area-inset-bottom, 0px));
      left: 10px;
      display: grid;
      grid-template-columns: repeat(4, minmax(0, 1fr));
      gap: 3px;
      width: auto;
      max-width: 560px;
      margin: 0 auto;
      padding: 7px 5px;
      border-radius: 16px;
      box-shadow: 0 8px 28px rgba(16, 47, 86, .2);
    }
    .shmt-quick-action {
      min-width: 0;
      min-height: 62px;
      flex-direction: column;
      justify-content: center;
      gap: 4px;
      padding: 6px 2px;
      border: 0;
      border-radius: 11px;
      background: transparent;
      color: #103F7A;
      font-size: clamp(9px, 2.6vw, 11px);
      text-align: center;
      white-space: nowrap;
    }
    .shmt-quick-action:hover {
      transform: none;
      background: #F2F7FD;
      box-shadow: none;
    }
    .shmt-quick-action--emergency,
    .shmt-quick-action--emergency:hover {
      background: #FFF1F2;
      color: #C82032;
    }
    .shmt-quick-action svg { width: 22px; height: 22px; flex-basis: 22px; }
    .shmt-quick-action-full { display: none; }
    .shmt-quick-action-short { display: inline; }
  }

  @media (prefers-reduced-motion: reduce) {
    .shmt-quick-action { transition: none; }
  }
</style>

<nav class="shmt-quick-actions" aria-label="Quick contact actions">
  <a class="shmt-quick-action shmt-quick-action--whatsapp" href="https://wa.me/8801711319634?text=Hello%20SHMT%2C%20I%20would%20like%20to%20contact%20the%20hospital." target="_blank" rel="noopener noreferrer" aria-label="WhatsApp Chat with Sahera Hasan Memorial Hospital">
    <svg viewBox="0 0 24 24" aria-hidden="true">
      <path d="M20.2 11.7a8.1 8.1 0 0 1-11.9 7.1L4 20l1.2-4a8.1 8.1 0 1 1 15-4.3Z" />
      <path d="M9 8.6c.2-.5.5-.5.8-.5h.5c.2 0 .4.1.5.4l.8 1.9c.1.2.1.4 0 .6l-.6.8c-.2.2-.2.4 0 .6.5.9 1.3 1.6 2.2 2 .2.1.4.1.6-.1l.8-1c.2-.2.4-.2.7-.1l1.8.9c.3.1.4.3.4.5 0 .5-.3 1.3-.8 1.6-.5.4-1.2.6-2 .4-1.1-.2-2.5-.8-3.9-2.1-1.1-1-1.9-2.3-2.1-3.4-.2-.9.1-1.8.4-2.5Z" />
    </svg>
    <span><span class="shmt-quick-action-full">WhatsApp Chat</span><span class="shmt-quick-action-short">WhatsApp</span></span>
  </a>
  <a class="shmt-quick-action shmt-quick-action--emergency" href="tel:+8801711319634" aria-label="24/7 Emergency Call: plus 880 1711 319634">
    <svg viewBox="0 0 24 24" aria-hidden="true">
      <path d="M7.2 3.5H4.8c-.8 0-1.4.6-1.4 1.4 0 8.4 6.8 15.2 15.2 15.2.8 0 1.4-.6 1.4-1.4v-2.4c0-.7-.5-1.3-1.2-1.4l-3.2-.5c-.5-.1-1 .1-1.3.5l-1.4 1.7a13.4 13.4 0 0 1-5.8-5.8l1.7-1.4c.4-.3.6-.8.5-1.3l-.5-3.2c-.1-.8-.7-1.4-1.6-1.4Z" />
    </svg>
    <span><span class="shmt-quick-action-full">24/7 Emergency Call</span><span class="shmt-quick-action-short">Emergency</span></span>
  </a>
  <a class="shmt-quick-action" href="/contact" aria-label="Book an appointment through the contact page">
    <svg viewBox="0 0 24 24" aria-hidden="true">
      <rect x="3.5" y="5" width="17" height="15.5" rx="2" />
      <path d="M7.5 3.5v3M16.5 3.5v3M3.5 9.5h17M8 13h2M14 13h2M8 16.5h2" />
    </svg>
    <span><span class="shmt-quick-action-full">Book an Appointment</span><span class="shmt-quick-action-short">Appointment</span></span>
  </a>
  <a class="shmt-quick-action" href="https://www.google.com/maps/dir/?api=1&amp;destination=Sahera+Hasan+Memorial+Hospital%2C+Shah+Khalilur+Rahman+Road%2C+Chandoir%2C+Gorpara%2C+Manikganj+Sadar%2C+Manikganj%2C+Bangladesh" target="_blank" rel="noopener noreferrer" aria-label="Get directions to Sahera Hasan Memorial Hospital in Manikganj">
    <svg viewBox="0 0 24 24" aria-hidden="true">
      <path d="M19 10.2c0 5.1-7 10.5-7 10.5S5 15.3 5 10.2a7 7 0 1 1 14 0Z" />
      <circle cx="12" cy="10" r="2.3" />
    </svg>
    <span><span class="shmt-quick-action-full">Get Directions</span><span class="shmt-quick-action-short">Directions</span></span>
  </a>
</nav>

<script>
(() => {
  const quickActions = document.querySelector('.shmt-quick-actions');
  if (!quickActions) return;

  document.body.classList.add('has-quick-actions');
  const formControlSelector = 'input, textarea, select, [contenteditable="true"]';
  let formControlFocused = false;
  let bottomNoticeVisible = false;

  const updateVisibility = () => {
    quickActions.classList.toggle('is-hidden', formControlFocused || bottomNoticeVisible);
  };

  document.addEventListener('focusin', (event) => {
    if (event.target.matches(formControlSelector)) {
      formControlFocused = true;
      updateVisibility();
    }
  });

  document.addEventListener('focusout', (event) => {
    if (event.target.matches(formControlSelector)) {
      window.setTimeout(() => {
        formControlFocused = document.activeElement.matches(formControlSelector);
        updateVisibility();
      }, 0);
    }
  });

  if ('IntersectionObserver' in window) {
    const visibleNotices = new Set();
    const bottomOverlayObserver = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) visibleNotices.add(entry.target);
        else visibleNotices.delete(entry.target);
      });
      bottomNoticeVisible = visibleNotices.size > 0;
      updateVisibility();
    });
    document.querySelectorAll('form, .form-control, .cookie-banner, .cookie-notice, [data-cookie-banner]')
      .forEach((element) => bottomOverlayObserver.observe(element));
  }
})();
</script>
