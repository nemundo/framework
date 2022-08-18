import DocumentContainer from "../../../html/Document/Document.js";
import DivContainer from "../../../html/Content/Div.js";
import AdminHtmlLayer from "../Base/AdminHtmlLayer.js";

let document = new DocumentContainer();
document.onLoaded = function () {

    let carousel = new AdminHtmlLayer();
    carousel.fromId("admin-carousel");
    carousel.load();
    carousel.showLayer(0);

    let previousIcon = new DivContainer();
    previousIcon.fromId("admin-carousel-previous-icon");
    previousIcon.onClick = function () {
        carousel.showPreviousLayer();
    };

    let nextIcon = new DivContainer();
    nextIcon.fromId("admin-carousel-next-icon");
    nextIcon.onClick = function () {
        carousel.showNextLayer();
    };

};


