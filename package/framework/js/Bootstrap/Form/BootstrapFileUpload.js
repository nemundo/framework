import FileUpload from "../../Form/FileUpload.js";

export default class BootstrapFileUpload extends FileUpload {

    constructor(parentContainer) {

        super(parentContainer);
        this._input.addCssClass("form-control");

    }

}