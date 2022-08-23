import DivContainer from "../../../html/Content/Div.js";
import ButtonContainer from "../../../html/Form/Button.js";
import UnorderedList from "../../../html/Listing/UnorderedList.js";
import LiContainer from "../../../html/Listing/LiContainer.js";
import HyperlinkContainer from "../../../html/Hyperlink/Hyperlink.js";

export default class BootstrapDropdown extends DivContainer {

    _button;

    _menuUl;

    constructor(parentContainer) {

        super(parentContainer);

        this.addCssClass("dropdown");

        this._button = new ButtonContainer(this);
        this._button.addCssClass("btn btn-secondary dropdown-toggle");
        this._button.addDataAttribute("bs-toggle", "dropdown");

        this._menuUl = new UnorderedList(this);
        this._menuUl.addCssClass("dropdown-menu");

    }


    set label(value) {

        this._button.label = value;

    }


    addMenu(label, event = null) {

        let li = new LiContainer(this._menuUl);

        let hyperlink = new HyperlinkContainer(li);
        hyperlink.text = label;
        hyperlink.href = "#";
        hyperlink.addCssClass("dropdown-item");

        if (event !== null) {
            hyperlink.onClick = function () {
                event();
            };
        }

        return this;

    }


}