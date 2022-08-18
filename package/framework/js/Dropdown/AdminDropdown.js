import DivContainer from "../../html/Content/Div.js";
import HyperlinkContainer from "../../html/Hyperlink/Hyperlink.js";
import DisplayStyle from "../../html/Style/Display.js";
import PositionStyle from "../../html/Style/Position.js";
import Debug from "../../core/Debug/Debug.js";
import BodyContainer from "../../html/Document/Body.js";
import ColorStyle from "../../html/Style/Color.js";
import MenuIcon from "../Menu/MenuIcon.js";


export default class AdminDropdown extends DivContainer {

    _dropdownDiv;

    _button;

    constructor(parentContainer) {

        super(parentContainer);

        this.display = DisplayStyle.INLINE;

        this._button = new MenuIcon(this);
        this._button.icon = "plus-lg";

        let local = this;

        this._dropdownDiv = new DivContainer();
        this._dropdownDiv.position = PositionStyle.FIXED;
        this._dropdownDiv.widthPixel = 150;
        this._dropdownDiv.zIndex = 700;

        this._dropdownDiv.backgroundColor = ColorStyle.LIGHT_GREY;
        this._dropdownDiv.minWidthPixel = 160;

        this._dropdownDiv.onMouseLeave = function () {
            local.closeMenu();
        };

        this._button.onClick = function (event) {

            (new Debug()).write(event);
            (new Debug()).write(event.clientX);

            local._dropdownDiv.left = event.clientX + "px";
            local._dropdownDiv.top = event.clientY + "px";

            //local.addContainer(local._dropdownDiv);
            (new BodyContainer()).addContainer(local._dropdownDiv);


        };

    }


    addItem(label, onClick) {

        let hyperlink = new HyperlinkContainer(this._dropdownDiv);
        hyperlink.text = label;
        hyperlink.href = "#";
        hyperlink.display = DisplayStyle.BLOCK;
        hyperlink.paddingPixel = 10;
        hyperlink.onClick = function () {
            onClick();
        }

    }


    closeMenu() {

        this._dropdownDiv.removeContainer();

    }


    set icon(value) {
        this._button.icon = value;
    }

    set label(value) {
        this._button.label = value;
    }




    set active(value) {

        if (value) {
            this._button.color = ColorStyle.BLACK;
        } else {
            this._button.color = "#949494";  // ColorStyle.DARK_GREY;
        }

    }


}
