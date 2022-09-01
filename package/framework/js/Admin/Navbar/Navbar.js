import DocumentContainer from "../../../html/Document/Document.js";
import DivContainer from "../../../html/Content/Div.js";

let document = new DocumentContainer();
document.onLoaded = function () {

    let showMenu = false;

    let content = new DivContainer();
    content.fromId("admin-navbar-menu");

    let italic = new DivContainer();
    italic.fromId("admin-navbar-hamburger");
    italic.onClick = function () {

        if (!showMenu) {
            content.widthPixel = 300;
        } else {
            content.width = 0;
        }

        showMenu = !showMenu;

    };


    let close = new DivContainer();
    close.fromId("admin-navbar-close");
    close.onClick = function () {
        content.width = 0;
        showMenu = false;
    };

    window.addEventListener('mouseup', function (e) {

        if (showMenu) {

            if (!content._htmlElement.contains(e.target)) {

                content.width = 0;
                showMenu = false;

            }

        }

    });

};


