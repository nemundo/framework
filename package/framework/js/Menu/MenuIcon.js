import DisplayStyle from "../../html/Style/Display.js";
import CursorStyle from "../../html/Style/Cursor.js";
import ColorStyle from "../../html/Style/Color.js";
import PointerEventStyle from "../../html/Style/Mouse/PointerEventStyle.js";
import BootstrapIcon from "../Package/BootstrapIcon/BootstrapIcon.js";
import SmallContainer from "../../html/Formatting/SmallContainer.js";
import HyperlinkContainer from "../../html/Hyperlink/Hyperlink.js";
import MenuConfig from "../Com/Menu/MenuConfig.js";
import TextDecoration from "../../html/Style/Text/TextDecoration.js";
import FlexDirection from "../../html/Style/Flex/FlexDirection.js";


export default class MenuIcon extends HyperlinkContainer {

    _active = true;

    _icon;

    _labelDiv;

    constructor(parentContainer = null) {

        super(parentContainer);

        let local = this;

        this.href = "#";
        this.textDecoration=TextDecoration.NONE;
        //this.color =ColorStyle.DARK_GREY;
        local.color = ColorStyle.BLACK;

        //this.display = DisplayStyle.INLINE;

        this.widthPixel=60;

        this.cursor = CursorStyle.POINTER;
        this.paddingPixel=5;

        this.display=DisplayStyle.FLEX;
        this.flexDirection=FlexDirection.COLUMN;

        this._icon = new BootstrapIcon(this);
        this._icon.fontSizePixel = MenuConfig.iconSize;

        this.onMouseEnter = function () {
            local.color = ColorStyle.DARK_GREY;
        };

        this.onMouseLeave = function () {
            local.color = ColorStyle.BLACK;
        };

        this._labelDiv = new SmallContainer(this);
        this._labelDiv.textDecoration=TextDecoration.NONE;

    }

    set icon(value) {
        this._icon.icon = value;
    }


    set label(value) {
        this._labelDiv.text = value;
        this._icon.title = value;
    }


    set showLabel(value) {
        this._labelDiv.visible = value;
    }


    set showIcon(value) {
        this._icon.visible = value;
    }


    // enabled
    set active(value) {

        this._active = value;

        if (value) {
            this.color = ColorStyle.BLACK;
            this.pointerEvent = PointerEventStyle.AUTO;
        } else {
            this.color = "#949494";
            this.pointerEvent = PointerEventStyle.NONE;
        }

    }

}