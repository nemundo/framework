import LabelContainer from "../../html/Form/Label.js";
import DivContainer from "../../html/Content/Div.js";
import FileInputContainer from "../../html/Form/FileInput.js";


export default class FileUpload extends DivContainer {

    onFileChangeStart = null;

    onFileChangeEnd = null;

    _input;

    _label;

    constructor(parentContainer) {
        super(parentContainer);

        this._label = new LabelContainer(this);
        this._input = new FileInputContainer(this);
    }


    set name(value) {
        this._input.id = value;
        this._input.name = value;
        this._label.addAttribute("htmlFor", value);
    }


    set label(value) {
        this._label.text = value;
    }


    set accept(value) {
        this._input.accept = value;
    }


    set multiUpload(value) {
        this._input.multiple = value;
    }


    set value(value) {
        this._input.value = value;
    }

    get value() {
        return this._input.value;
    }


    emptyValue() {
        this.value = "";
    }


    set onFileChange(event) {

        let local = this;

        this._htmlElement.addEventListener("change", function () {

            if (local.onFileChangeStart !== null) {
                local.onFileChangeStart();
            }

            let fileTotal = local.getFileCount();  // local._input._htmlElement.files.length;
            for (let i = 0; i < fileTotal; i++) {

                let file = local._input._htmlElement.files.item(i);
                event(file);

            }

            if (local.onFileChangeEnd !== null) {
                local.onFileChangeEnd();
            }

            local.emptyValue();

        });

    }


    getFileCount() {

        return this._input._htmlElement.files.length;

    }


}