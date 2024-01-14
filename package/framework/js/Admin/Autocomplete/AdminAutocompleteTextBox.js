import AutocompleteTextBox from "../../Com/Autocomplete/AutocompleteTextBox.js";

export default class AdminAutocompleteTextBox extends AutocompleteTextBox {

    constructor(parentContainer) {

        super(parentContainer);

        this.addCssClass("admin-textbox");
        this._input.addCssClass("admin-input");

    }

}