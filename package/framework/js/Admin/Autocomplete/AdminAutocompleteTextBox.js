import AutocompleteTextBox from "../../Com/Autocomplete/AutocompleteTextBox.js";

export default class AdminAutocompleteTextBox extends AutocompleteTextBox {

    render() {

        super.render();

        this.addCssClass("admin-textbox");
        this._input.addCssClass("admin-input");

    }

}