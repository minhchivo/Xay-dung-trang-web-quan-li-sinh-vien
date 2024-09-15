$(document).ready(function () {
    // Hide all submenus initially
    $('.sub-menu').hide();

    // Show submenu on click
    $('.menu-item').click(function (event) {
        event.stopPropagation(); // Prevent the event from reaching the document click event
        $(this).find('.sub-menu').toggle();
    });

    // Hide submenu when clicking outside the menu
    $(document).click(function () {
        $('.sub-menu').hide();
    });
});

function toggleSubMenu(element) {
    var subMenu = element.querySelector('.sub-menu');
    if (subMenu.style.display === 'block') {
        subMenu.style.display = 'none';
    } else {
        // Hide all other submenus
        var allSubMenus = document.querySelectorAll('.sub-menu');
        allSubMenus.forEach(function (otherSubMenu) {
            if (otherSubMenu !== subMenu) {
                otherSubMenu.style.display = 'none';
            }
        });

        // Show the clicked submenu
        subMenu.style.display = 'block';
    }
}
