import DivContainer from "../../../html/Content/Div.js";
import SpanContainer from "../../../html/Content/Span.js";

export default class AdminCard extends DivContainer {


    _titleDiv;

    _content;


    constructor(parentContainer) {

        super(parentContainer);

        let local = this;

        this.addCssClass("admin-card");

        this._titleDiv = new DivContainer();
        this._titleDiv.addCssClass("admin-card-title");
        super.addContainer(this._titleDiv);

        this._content = new DivContainer();
        this._content.addCssClass("admin-card-content");
        super.addContainer(this._content);

    }


    set cardTitle(value) {

        let span = new SpanContainer(this._titleDiv);
        span.text = value;

    }


    emptyCardContent() {

        this._content.emptyContainer();

    }


    addContainer(container) {

        return this._content.addContainer(container);

    }


}