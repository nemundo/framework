import TextBox from "../../Form/TextBox.js";
import Checkbox from "../../Form/Checkbox";

export default class AdminCheckBox extends Checkbox {

    constructor(parentContainer) {

        super(parentContainer);

        this.addCssClass("admin-checkbox-container");

        this._label.addCssClass("admin-checkbox-label");
        this._input.addCssClass("admin-checkbox");



/*
        <div class="admin-checkbox-container">
            <input type="checkbox" value="1" name="auto_com_2" id="auto_com_2" class="admin-checkbox" />

            <label for="auto_com_2" class="admin-checkbox-label">Bitte haltet</label></div>

    </div>
  */




    }

}