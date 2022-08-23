import AutocompleteTextBox from "../../Com/Autocomplete/AutocompleteTextBox.js";

// BootstrapAutocompleteTextBox
export default class BootstrapAutocomplete extends AutocompleteTextBox {

    constructor(parentContainer) {

        super(parentContainer);
        this._input.addCssClass("form-control");

    }

}