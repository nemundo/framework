import WordDelay from "../Autocomplete/WordDelay.js";
import TextBox from "../../Form/TextBox.js";


// Autocomplete
// AutocompleteTextBox
export default class SearchTextBox extends TextBox {

    onWordChange = null;


    constructor(parentContainer) {

        super(parentContainer);

        let local = this;

        this._input.addAttribute("autocomplete", "off");
        this._input.placeholder = "Search";

        let requestNumber = 0;

        this._input.onKeyUp = function (event) {

            requestNumber++;

            let delay = new WordDelay();
            delay.delay = 500;
            delay.requestNumber = requestNumber;
            delay.onDelay = function () {
                if (delay.requestNumber === requestNumber) {
                    local.onWordChange();
                }
            };

        };

    }

}
