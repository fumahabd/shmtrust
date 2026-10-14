<nav class="navbar navbar-expand-lg bg-white fixed-top flex-column py-0 px-lg-4 px-2 shadow-lg">
    <div class="row g-0 w-100 d-flex align-items-center justify-content-between py-1"
        style="max-width:1440px; margin:auto">

        <!-- LOGO -->
        <div class="col-lg-4 col-6">
            <a href="/">
                <img data-src="./images/logo.jpg" alt="logo" style="width:100px">
            </a>
        </div>

        <!-- HAMBURGER BUTTON (mobile only) -->
        <div class="col-2 drawer-menu d-flex align-items-center justify-content-end">
            <button
                id="drawerToggleBtn"
                class="cursor-pointer border-0 bg-transparent p-2"
                aria-label="Toggle navigation"
                aria-expanded="false"
                onclick="toggleDrawer()"
            >
                <!-- Hamburger icon (3 lines) -->
                <span id="hamburgerIcon">
                    <svg width="26" height="26" viewBox="0 0 24 24" fill="none"
                        stroke="rgb(117,115,115)" stroke-width="2.2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <line x1="3" y1="6"  x2="21" y2="6"/>
                        <line x1="3" y1="12" x2="21" y2="12"/>
                        <line x1="3" y1="18" x2="21" y2="18"/>
                    </svg>
                </span>
                <!-- Close icon (X) — hidden by default -->
                <span id="closeIcon" style="display:none;">
                    <svg width="26" height="26" viewBox="0 0 24 24" fill="none"
                        stroke="rgb(117,115,115)" stroke-width="2.2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <line x1="18" y1="6"  x2="6"  y2="18"/>
                        <line x1="6"  y1="6"  x2="18" y2="18"/>
                    </svg>
                </span>
            </button>
        </div>

        <!-- NAV LINKS -->
        <div class="drawer col-lg-8 col-12 position-relative overflow-hidden d-flex p-0 m-0 py-1"
             id="drawerMenu">
            <ul class="nav w-100 d-flex text-center pt-md-0 pt-3 align-items-center justify-content-end gap-4 text-capitalize">
                <li class="nav-item py-sm-0 py-2">
                    <a class="nav-link p-0" href="/about">About</a>
                </li>
                <li class="nav-item py-sm-0 py-2">
                    <a class="nav-link p-0" href="/services">Services</a>
                </li>
                <li class="nav-item py-sm-0 py-2">
                    <a class="nav-link p-0" href="/doctors">Doctors</a>
                </li>
                <li class="nav-item py-sm-0 py-2">
                    <a class="nav-link p-0" href="/projects">Projects</a>
                </li>
                <li class="nav-item py-sm-0 py-2">
                    <a class="nav-link p-0" href="/support">Support us</a>
                </li>
                <li class="nav-item py-sm-0 py-2">
                    <a class="nav-link p-0" href="/gallery">Gallery</a>
                </li>
                <li class="nav-item py-sm-0 py-2">
                    <a class="nav-link p-0" href="/contact">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<script>
    function toggleDrawer() {
        const drawer = document.getElementById('drawerMenu');
        const btn    = document.getElementById('drawerToggleBtn');
        const ham    = document.getElementById('hamburgerIcon');
        const close  = document.getElementById('closeIcon');

        const isOpen = drawer.classList.toggle('active');

        // Swap hamburger ↔ close icon
        ham.style.display   = isOpen ? 'none'         : 'inline';
        close.style.display = isOpen ? 'inline'       : 'none';

        // Accessibility
        btn.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
    }

    // Close drawer when a nav link is clicked (good UX on mobile)
    document.querySelectorAll('#drawerMenu .nav-link').forEach(function(link) {
        link.addEventListener('click', function() {
            const drawer = document.getElementById('drawerMenu');
            if (drawer.classList.contains('active')) {
                toggleDrawer();
            }
        });
    });

    // Close drawer when clicking outside the navbar
    document.addEventListener('click', function(e) {
        const navbar = document.querySelector('.navbar');
        const drawer = document.getElementById('drawerMenu');
        if (!navbar.contains(e.target) && drawer.classList.contains('active')) {
            toggleDrawer();
        }
    });

    // Highlight the active nav link based on current URL
    document.querySelectorAll('#drawerMenu .nav-link').forEach(function(link) {
        if (link.getAttribute('href') === window.location.pathname) {
            link.classList.add('active');
        }
    });
</script>
