import DivContainer from "../../html/Content/Div.js";

export default class PageContainer extends DivContainer {

    pageTitle = "";

    pageUrl = "";

    _rendered = false;

    constructor(parentContainer) {

        super(parentContainer);
        this.loadPage();

    }


    loadPage() {

    }


    showPage() {

        if (!this._rendered) {
            this.render();
        }
        this._rendered = true;

        this.onOpen();

    }


    onOpen() {

    }

}
