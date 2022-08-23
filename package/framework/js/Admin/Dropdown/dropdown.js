function checkDropdownClick() {

    window.onclick = function (event) {

        if (!event.target.matches('.admin-dropdown-button')) {
            hideDropdownMenu();
        }


        //if (!event.target.matches('.admin-navbar-dropdown-link')) {
        if (!event.target.closest('.admin-navbar-dropdown-link')) {
            hideNavbarDropdownMenu();
        }

    }

}


function hideDropdownMenu() {

    var dropdowns = document.getElementsByClassName("admin-dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (openDropdown.classList.contains('admin-dropdown-show')) {
            openDropdown.classList.remove('admin-dropdown-show');
        }
    }

}


function hideNavbarDropdownMenu() {

    var dropdowns = document.getElementsByClassName("admin-navbar-submenu-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (openDropdown.classList.contains('admin-dropdown-show')) {
            openDropdown.classList.remove('admin-dropdown-show');
        }
    }

}


checkDropdownClick();
