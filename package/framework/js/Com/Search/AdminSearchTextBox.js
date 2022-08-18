import DivContainer from "../../../html/Content/Div.js";
import TextInputContainer from "../../../html/Form/TextInput.js";
import AdminIcon from "../../Admin/Icon/AdminIcon.js";
import DelayTextInputContainer from "../Autocomplete/DelayTextInputContainer.js";

export default class AdminSearchTextBox extends DivContainer {

    onValueChange;

    _input;

    _icon;

    constructor(parentContainer) {

        super(parentContainer);

        let local=this;

        this.addCssClass("admin-icon-textbox");

        this._input = new DelayTextInputContainer(this);  // new TextInputContainer(this);
        this._input.addCssClass("admin-input");
        this._input.placeholder = "Search";
        this._input.onValueChange = function () {
            local.onValueChange();
        };

        this._icon = new AdminIcon(this);
        this._icon.icon = "search";


        /*this._input.widthPercent = 100;
        this._input.paddingPixel = 10;
        this._input.boxSizing = BoxSizing.BORDER_BOX;
        this._input.display = DisplayStyle.INLINE_BLOCK;
        this._input.fontSize=FontSize.LARGE;
        this._input.border = "1px solid #ccc";*/

    }


    get value() {

        return this._input.value;

    }


    // onValueChange
    set onSearchChange(value) {

        this._input.onKeyUp = value;
        //this._input.onChange=value;

    }


}