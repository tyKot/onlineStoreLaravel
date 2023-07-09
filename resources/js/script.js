function toggleHamburger() {
    const hamburger = document.querySelector('.header__hamburger');
    const nav = document.querySelector('.header__mobile');
    const hamburgerActiveClass = 'header__hamburger_active';
    const navActiveClass = 'header__mobile_active';

    hamburger.addEventListener('click', () => {
        hamburger.classList.toggle(hamburgerActiveClass);
        nav.classList.toggle(navActiveClass);

        if (document.body.style.overflow === "") {
            document.body.style.overflow = "hidden";
        } else {
            document.body.style.overflow = "";
        }
    });
}

function toggleDropdown({
    parentSelector,
    dropdownHeaderClass,
    dropdownMenuSelector,
    dropdownMenuActiveClass
}) {
    const parent = document.querySelector(parentSelector);
    let activeMenu;

    function closeAllMenus({
        dropdownMenuSelector,
        dropdownMenuActiveClass
    }) {
        const menus = document.querySelectorAll(dropdownMenuSelector);

        menus.forEach(item => item.classList.remove(dropdownMenuActiveClass));
    }

    parent.addEventListener('click', (e) => {
        if (e.target && e.target.classList.contains(dropdownHeaderClass)) {
            closeAllMenus({
                dropdownMenuSelector: dropdownMenuSelector,
                dropdownMenuActiveClass: dropdownMenuActiveClass
            });

            activeMenu = e.target.nextElementSibling;

            activeMenu.classList.add(dropdownMenuActiveClass);
        }

        document.addEventListener('click', (e) => {
            if (e.target && !e.target.closest('.header__list')) {
                closeAllMenus({
                    dropdownMenuSelector: dropdownMenuSelector,
                    dropdownMenuActiveClass: dropdownMenuActiveClass
                });
            }
        }, true);
    });
}

// function toggleDropdownSublist() {
//     const btn = document.querySelector('.header .dropdown__menu-button');
//     const dropdownSublist = document.querySelector('.header .dropdown__menu-sublist');
//     const dropdownSublistActiceClass = 'dropdown__menu-sublist_active';

//     btn.addEventListener('click', () => {
//         dropdownSublist.classList.toggle(dropdownSublistActiceClass);
//     });
// }

toggleHamburger();

toggleDropdown({
    parentSelector: '.dropdown',
    dropdownHeaderClass: 'header__login',
    dropdownMenuSelector: '.dropdown__menu',
    dropdownMenuActiveClass: 'dropdown__menu_active',
});

toggleDropdown({
    parentSelector: '.header__list',
    dropdownHeaderClass: 'dropdown__header',
    dropdownMenuSelector: '.dropdown__menu',
    dropdownMenuActiveClass: 'dropdown__menu_active',
});

// toggleDropdownSublist();

function toggleTabs({
    tabParentSelector,
    tabHeaderSelector,
    tabHeaderActiveClass,
    tabItemSelector,
    tabItemActiveClass,
    event }) {
    const tabParent = document.querySelector(tabParentSelector);
    const tabHeaders = document.querySelectorAll(tabHeaderSelector);
    const tabItems = document.querySelectorAll(tabItemSelector);

    tabParent.addEventListener(event, (e) => {
        if (e.target && e.target.closest(tabHeaderSelector)) {
            tabHeaders.forEach((tabHeader, i) => {
                if (e.target === tabHeader || e.target.closest(tabHeaderSelector) === tabHeader) {
                    if (tabHeaderActiveClass) {
                        tabHeaders.forEach(tabItem => {
                            tabItem.classList.remove(tabHeaderActiveClass);
                        })
                        tabHeaders[i].classList.add(tabHeaderActiveClass);
                    }

                    tabItems.forEach(tabItem => {
                        tabItem.classList.remove(tabItemActiveClass);
                    });
                    tabItems[i].classList.add(tabItemActiveClass);
                }
            });
        }
    });
};

toggleTabs({
    tabParentSelector: '.announcements .tabcontent',
    tabHeaderSelector: '.announcements__item-main',
    tabHeaderActiveClass: 'announcements__item-main_active',
    tabItemSelector: '.announcements__item-picture',
    tabItemActiveClass: 'announcements__item-picture_active',
    event: 'mouseover'
});
toggleTabs({
    tabParentSelector: '.announcements .filter__list',
    tabHeaderSelector: '.announcements .filter__btn',
    tabHeaderActiveClass: 'filter__btn_active',
    tabItemSelector: '.announcements .tabcontent__item',
    tabItemActiveClass: 'tabcontent__item_active',
    event: 'click'
});
