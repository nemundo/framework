import DivContainer from "../../../html/Content/Div.js";
import H5Container from "../../../html/Title/H5.js";
import ParagraphContainer from "../../../html/Content/Paragraph.js";

export default class BootstrapCard extends DivContainer {

    //cardTitle = null;

    //cardText = null;

    _h5;

    _body;

    constructor(parentContainer) {

        super(parentContainer);

        this.addCssClass("card");

        this._h5 = new H5Container();
        this._h5.addCssClass("card-header");
        super.addContainer(this._h5);

        this._body = new DivContainer();
        this._body.addCssClass("card-body");
        super.addContainer(this._body);

    }

    set cardTitle(value) {
        this._h5.text = value;
    }


    set cardText(value) {

        let p = new ParagraphContainer(this._body);
        p.addCssClass("card-text");
        p.text = value;  // this.cardText;

    }


/*
    render() {

        if (this.cardText !== null) {
            let p = new ParagraphContainer(this._body);
            p.addCssClass("card-text");
            p.text = this.cardText;
        }

    }*/


    addContainer(container) {
        this._body.addContainer(container);
    }


    emptyContainer() {
        this._body.emptyContainer();
    }

}