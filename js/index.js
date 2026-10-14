$(document).ready(function () {
  const urlPath = window.location.pathname;
  const urlSearchParams = new URLSearchParams(window.location.search);
  const navItems = [
    { name: "Home", href: "/" },
    { name: "About", href: "/about" },
    { name: "Services", href: "/services" },
    { name: "Doctors", href: "/doctors" },
    { name: "Projects", href: "/projects" },
    { name: "Support Us", href: "/support" },
    { name: "Gallery", href: "/gallery" },
    { name: "Contact", href: "/contact" },
  ];

  const navContainer = document.getElementById("dynamic-nav");
  const currentPath = window.location.pathname.replace(/\/$/, "") || "/";

  navItems.forEach(function ({ name, href }, index) {
    // 🔹 Skip Home link if current page is "/"
    if (currentPath === "/" && href === "/") return;

    const li = document.createElement("li");
    li.className = "nav-item nav-item-2";

    const a = document.createElement("a");
    a.className = "nav-link";
    a.href = href;
    a.textContent = name;

    // 🔹 Highlight active page
    if (href === currentPath) {
      a.classList.add("active");
    }

    li.appendChild(a);
    navContainer.appendChild(li);
    setTimeout(() => {
      li.classList.add("show");
    }, index * 100); // Stagger animation (100ms per item)
  });

  $("#preloader").fadeOut("slow");
  $("body").on("click", function (e) {
    if ($(e.target).closest(".drawer-menu a, .drawer").length) {
      if ($(e.target).closest(".drawer-menu a").length) {
        $(".drawer").toggleClass("active");
      }
    } else {
      $(".drawer").removeClass("active");
    }
    //Empowering Innovation and Scalable Digital Transformation
    if ($(e.target).closest(".innovationDiv").length) {
      let target = $(e.target).closest(".innovationDiv");
      let detailsDiv = target.next("div");
      let arrowIcon = target.find("i");
      detailsDiv.toggleClass("d-none");
      arrowIcon.toggleClass("arrow-up-right-icon arrow-down-right-icon");
    }
  });
});
