(() => {
    const searchButton = document.getElementById("search-btn-v");
    const searchButton2 = document.getElementById("search-btn-v2");

    const openNavMenu = document.querySelector(".open-nav-menu"),
        closeNavMenu = document.querySelector(".close-nav-menu"),
        closeModalButton = document.getElementById("close-modal-v"),
        closeModalButton2 = document.getElementById("close-modal-v2"),
        searchModalContainer = document.getElementById(
            "search-modal-container-v"
        ),
        searchModal = document.getElementById("search-modal-v"),
        navMenu = document.querySelector(".nav-menu"),
        menuOverlay = document.querySelector(".menu-overlay"),
        mediaSize = 991;

    let modalStatus = false;

    function closeSearchModal() {
        searchModalContainer.classList.remove("search-modal-container-active");
    }
    if (searchButton) {
        searchButton.addEventListener("click", openSearchModal);
    }
    if (closeNavMenu) {
        closeNavMenu.addEventListener("click", toggleNav);
    }
    if (openNavMenu) {
        openNavMenu.addEventListener("click", toggleNav);
    }
    if (closeModalButton2) {
        closeModalButton2.addEventListener("click", closeSearchModal);
    }
    if (closeModalButton) {
        closeModalButton.addEventListener("click", closeSearchModal);
    }
    if (searchButton2) {
        searchButton2.addEventListener("click", openSearchModal);
    }

    // searchModal.addEventListener("click", ()=> {
    //   modalStatus = false;
    //   closeSearchModal();
    // });
    function openSearchModal() {
        searchModalContainer.classList.add("search-modal-container-active");
        // alert('hi')
    }
    // searchModalContainer.addEventListener("click", ()=> {
    //   modalStatus = true;
    //   closeSearchModal();
    // });

    // close the navMenu by clicking outside
    menuOverlay.addEventListener("click", toggleNav);

    function toggleNav() {
        navMenu.classList.toggle("open");
        menuOverlay.classList.toggle("active");
        document.body.classList.toggle("hidden-scrolling");
    }

    navMenu.addEventListener("click", (event) => {
        if (
            event.target.hasAttribute("data-toggle") &&
            window.innerWidth <= mediaSize
        ) {
            // prevent default anchor click behavior
            event.preventDefault();
            const menuItemHasChildren = event.target.parentElement;
            // if menuItemHasChildren is already expanded, collapse it
            if (menuItemHasChildren.classList.contains("active")) {
                collapseSubMenu();
            } else {
                // collapse existing expanded menuItemHasChildren
                if (navMenu.querySelector(".menu-item-has-children.active")) {
                    collapseSubMenu();
                }
                // expand new menuItemHasChildren
                menuItemHasChildren.classList.add("active");
                const subMenu = menuItemHasChildren.querySelector(".sub-menu");
                subMenu.style.maxHeight = subMenu.scrollHeight + "px";
            }
        }
    });
    function collapseSubMenu() {
        navMenu
            .querySelector(".menu-item-has-children.active .sub-menu")
            .removeAttribute("style");
        navMenu
            .querySelector(".menu-item-has-children.active")
            .classList.remove("active");
    }
    function resizeFix() {
        // if navMenu is open ,close it
        if (navMenu.classList.contains("open")) {
            toggleNav();
        }
        // if menuItemHasChildren is expanded , collapse it
        if (navMenu.querySelector(".menu-item-has-children.active")) {
            collapseSubMenu();
        }
    }

    window.addEventListener("resize", function () {
        if (this.innerWidth > mediaSize) {
            resizeFix();
        }
    });
})();
