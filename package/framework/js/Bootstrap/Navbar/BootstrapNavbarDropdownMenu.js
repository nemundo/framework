import LiContainer from "../../../html/Listing/LiContainer.js";
import HyperlinkContainer from "../../../html/Hyperlink/Hyperlink.js";
import DivContainer from "../../../html/Content/Div.js";

export default class BootstrapNavbarDropdownMenu extends LiContainer {

    _hyperlink;

    _menuDiv;

    constructor(parentContainer) {

        super(parentContainer);

        this.addCssClass("nav-item dropdown");


        this._hyperlink = new HyperlinkContainer(this);
        this._hyperlink.href="#";
        this._hyperlink.addCssClass("nav-link dropdown-toggle")
        this._hyperlink.addDataAttribute("bs-toggle","dropdown");

        this._menuDiv=new DivContainer(this);
        this._menuDiv.addCssClass("dropdown-menu");

    }


    set label(value) {

        this._hyperlink.text=value;

    }


    addMenu(label, event = null) {

        let hyperlink = new HyperlinkContainer(this._menuDiv);
        hyperlink.addCssClass("dropdown-item");
        hyperlink.text = label;
        hyperlink.href = "#";

        if (event !== null) {
            hyperlink.onClick = function () {
                event();
            };
        }

        return this;

    }


    addDivider() {

        let div = new DivContainer(this._menuDiv);
        div.addCssClass("dropdown-divider");

        return this;

    }

}