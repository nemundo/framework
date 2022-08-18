import DivContainer from "../../../html/Content/Div.js";
import HyperlinkContainer from "../../../html/Hyperlink/Hyperlink.js";
import FloatStyle from "../../../html/Style/Float.js";
import DisplayStyle from "../../../html/Style/Display.js";
import TextAlignment from "../../../html/Style/Text/TextAlignment.js";
import TextDecoration from "../../../html/Style/Text/TextDecoration.js";
import BootstrapIcon from "../../Package/BootstrapIcon/BootstrapIcon.js";
import ColorStyle from "../../../html/Style/Color.js";
import UnorderedList from "../../../html/Listing/UnorderedList.js";

/*import styles from "../../css/framework/navigation.css";*/


// TopNavigation
export default class TopNavigation extends DivContainer {

    _div;

    _showMenu = false;

    constructor(parentContainer) {

        super(parentContainer);

        let local = this;

        //this.backgroundColor = ColorStyle.LIGHT_GREY;

        let menu = new DivContainer(this);
        menu.backgroundColor = ColorStyle.LIGHT_GREY;
        menu.widthPercent=100;
        menu.heightPixel=50;

        let hyperlink = new HyperlinkContainer(menu);
        hyperlink.backgroundColor = ColorStyle.LIGHT_GREY;

        //hyperlink.paddingPixel=20;

        let icon = new BootstrapIcon(hyperlink);
        icon.icon = "list";
        icon.color = ColorStyle.WHITE;
        icon.fontSize=30;

        hyperlink.onClick = function () {

            if (local._showMenu) {
                local._div.display = DisplayStyle.NONE;
                local._showMenu = false;
            } else {
                local._div.display = DisplayStyle.BLOCK;
                local._showMenu = true;
            }

        };

        this._div = new UnorderedList(this);  // new DivContainer(this);
        this._div.display = DisplayStyle.NONE;

        //this.backgroundColor = "#333";


    }


    addMenu(menu, event = null) {

        let a = new HyperlinkContainer(this._div);
        a.text = menu;
        //a.float = FloatStyle.LEFT;
        //a.display = DisplayStyle.BLOCK;
        //a.textAlignment = TextAlignment.CENTER;
        a.padding = "14px 16px";
        a.textDecoration = TextDecoration.NONE;
        a.onMouseOver=function () {
          a.backgroundColor=ColorStyle.GOLD;
        };
        a.onMouseLeave = function () {
          a.backgroundColor = "";
        };


        a.onClick = function () {

            if (event !== null) {
                event();
            }

        }

        return this;

    }

}