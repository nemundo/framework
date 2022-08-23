import DivContainer from "../../../html/Content/Div.js";
import TextareaContainer from "../../../html/Form/Textarea.js";
import BootstrapLargeTextBox from "../../Bootstrap/Form/BootstrapLargeTextBox.js";

export default class HtmlEditor extends BootstrapLargeTextBox {  // DivContainer {  // BootstrapLargeTextBox {   // TextareaContainer {   // DivContainer {


    _editor;

    constructor(parentContainer) {

        super(parentContainer);

        let local=this;

        ClassicEditor
            .create(this._input._htmlElement)
            //.create(this._htmlElement)
            .then( newEditor => {
                local._editor = newEditor;


                local.onKeyPress = function () {
                    //local._editor.getValue();
                    local._editor.updateSourceElement();
                };

            })
            .catch(error => {
                console.error(error);
            });


    }


    set value(value) {

        this._editor.setData(value);

        /*super.value=value;
        this._editor.updateSourceElement();*/

    }



    getValue() {

        this._editor.updateSourceElement();

        return this.value;


    }



    getTextValue() {

        return this._editor.getData();

    }



}