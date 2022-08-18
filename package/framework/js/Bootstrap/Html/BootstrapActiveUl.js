import UlContainer from "../../../html/Listing/UlContainer.js";

export default class BootstrapActiveUl extends UlContainer {

    _hyperlinkList = [];

    _addHyperlink(hyperlink) {

        this._hyperlinkList.push(hyperlink);

    }


    _removeActive() {

        for (let i = 0; i < this._hyperlinkList.length; i++) {
            this._hyperlinkList[i].removeCssClass("active");
        }

    }

}