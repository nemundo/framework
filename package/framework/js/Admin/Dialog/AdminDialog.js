import DialogContainer from "../../../html/Dialog/Dialog.js";
import AdminButton from "../Button/AdminButton.js";
import DivContainer from "../../../html/Content/Div.js";
import CloseFontAwesomeIcon from "../../FontAwesome/CloseFontAwesomeIcon.js";
import SpanContainer from "../../../html/Content/Span.js";

export default class AdminDialog extends DialogContainer {

    _titleDiv;

    _content;


    constructor() {

        super();

        let local = this;

        this.addCssClass("admin-dialog");

        this._titleDiv = new DivContainer();
        this._titleDiv.addCssClass("admin-dialog-title");
        super.addContainer(this._titleDiv);


        this._content = new DivContainer();
        this._content.addCssClass("admin-dialog-content");
        super.addContainer(this._content);



        let btnDiv = new DivContainer();
        btnDiv.addCssClass("admin-dialog-button");
        super.addContainer(btnDiv);

        let btn = new AdminButton(btnDiv);
        btn.label = "Schliessen";
        btn.onClick = function () {
            local.closeDialog();
        };

    }


    set dialogTitle(value) {

        let span = new SpanContainer(this._titleDiv);
        span.text=value;

    }


    set closeButton(value) {

        let local=this;

        let icon=new CloseFontAwesomeIcon(this._titleDiv);
        icon.addCssClass("icon-button");
        icon.onClick=function () {
            local.closeDialog();
        };
        icon.render();

    }


    addContainer(container) {
        //return super.addContainer(container);

        return this._content.addContainer(container);

    }


}