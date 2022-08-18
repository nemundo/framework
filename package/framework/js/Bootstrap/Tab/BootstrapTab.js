import LiContainer from "../../../html/Listing/LiContainer.js";
import HyperlinkContainer from "../../../html/Hyperlink/Hyperlink.js";
import BootstrapActiveUl from "../Html/BootstrapActiveUl.js";

export default class BootstrapTab extends BootstrapActiveUl {

    constructor(parentContainer) {

        super(parentContainer);
        this.addCssClass("nav nav-tabs");

    }


    addTab(label, event = null, active = false) {

        let local = this;

        let li = new LiContainer(this);
        li.addCssClass("nav-item");

        let hyperlink = new HyperlinkContainer(li);
        hyperlink.addCssClass("nav-link");
        hyperlink.text = label;
        if (active) {
            hyperlink.addCssClass("active");

            if (event !== null) {
                event();
            }

        }

        hyperlink.onClick = function () {
            local.removeActive();
            hyperlink.addCssClass("active");

            if (event !== null) {
                event();
            }

        };

        this._addHyperlink(hyperlink);

        return this;

    }

}
