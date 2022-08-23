import DivContainer from "../../../html/Content/Div.js";
import TextInputContainer from "../../../html/Form/TextInput.js";
import BoxSizing from "../../../html/Style/BoxSizing.js";
import DisplayStyle from "../../../html/Style/Display.js";
import FontSize from "../../../html/Style/Font/FontSize.js";
import BootstrapIcon from "../../Package/BootstrapIcon/BootstrapIcon.js";
import CursorStyle from "../../../html/Style/Cursor.js";

export default class IconTextBox extends DivContainer {

    //icon;

    _input;

    _icon;

    constructor(parentContainer) {

        super(parentContainer);

        this._icon = new BootstrapIcon(this);
        //this._icon.icon = "search";

        this._input = new TextInputContainer(this);
        this._input.addCssClass("form-control");

        /*this._input.widthPercent = 100;
        this._input.paddingPixel = 10;
        this._input.boxSizing = BoxSizing.BORDER_BOX;
        this._input.display = DisplayStyle.INLINE_BLOCK;
        this._input.fontSize = FontSize.LARGE;
        this._input.border = "1px solid #ccc";*/

    }


    /*render() {

        if (this.onIconClick!==null) {
            this._icon.on
        }

    }*/


    set value(value) {

        this._input.value=value;

    }


    get value() {

        return this._input.value;

    }


    // onValueChange
    set onChange(value) {

        this._input.onKeyUp = value;
        //this._input.onChange=value;

    }


    set icon(value) {

        this._icon.icon = value;

    }


    set onIconClick(value) {

        this.cursor = CursorStyle.POINTER;
        this._icon.onClick = value;

    }

}