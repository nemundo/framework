import FileUpload from "../../Form/FileUpload.js";
import AdminLoader from "../Loader/AdminLoader.js";
import ParagraphContainer from "../../../html/Content/Paragraph.js";

export default class AdminFileUpload extends FileUpload {


    _loader = null;

    _status = null;

    constructor(parentContainer) {

        super(parentContainer);

        this.addCssClass("admin-textbox");
        this._input.addCssClass("admin-file-input");
        //this._label.addCssClass("admin-textbox-label");

    }


    showStatus() {

        this._loader = new AdminLoader(this);
        this._status = new ParagraphContainer(this);
        this._status.text = "1/" + this.getFileCount();

    }


    plusStatus() {



    }


    disableStatus() {

        this._loader.removeContainer();
        this._status.removeContainer();

    }


}