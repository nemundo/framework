import NavContainer from "../../../html/Structure/Nav.js";
import HyperlinkContainer from "../../../html/Hyperlink/Hyperlink.js";
import ButtonContainer from "../../../html/Form/Button.js";
import SpanContainer from "../../../html/Content/Span.js";
import LiContainer from "../../../html/Listing/LiContainer.js";
import DivContainer from "../../../html/Content/Div.js";
import UnorderedList from "../../../html/Listing/UnorderedList.js";
import BootstrapFluidContainer from "../Layout/BootstrapFluidContainer.js";
import BootstrapActiveUl from "../Html/BootstrapActiveUl.js";
import ImageContainer from "../../../html/Image/Image.js";

export default class BootstrapNavbar extends NavContainer {

    collapseDiv;

    _menuUl;

    _brand;


    constructor(parentContainer) {

        super(parentContainer);

        //this.addCssClass("navbar navbar-expand-lg navbar-light bg-light");

        this.addCssClass("navbar navbar-expand-lg");
        //this.addCssClass("navbar-dark bg-primary");
        this.addCssClass("navbar-light bg-light");

        //this.addCssClass("fixed-top");

        let fluidContainer = new BootstrapFluidContainer(this);

        this._brand = new HyperlinkContainer(fluidContainer);
        this._brand.href = "#";
        this._brand.addCssClass("navbar-brand");



        let button = new ButtonContainer(fluidContainer);
        button.addCssClass("navbar-toggler");
        button.addDataAttribute("bs-toggle", "collapse");
        button.addDataAttribute("bs-target", "#navbarSupportedContent");

        let span = new SpanContainer(button);
        span.addCssClass("navbar-toggler-icon");

        this.collapseDiv = new DivContainer(fluidContainer);
        this.collapseDiv.addCssClass("collapse navbar-collapse");
        this.collapseDiv.id = "navbarSupportedContent";

        this._menuUl = new BootstrapActiveUl(this.collapseDiv);  // new UnorderedList(this.collapseDiv);
        this._menuUl.addCssClass("navbar-nav mr-auto");

    }


    addMenu(label, event = null, active=false) {

        let local=this;

        let li = new LiContainer(this._menuUl);
        li.addCssClass("nav-item");

        if (active) {
            li.addCssClass("active");
        }

        let a = new HyperlinkContainer(li);
        a.addCssClass("nav-link");
        a.addDataAttribute("bs-toggle", "collapse");
        a.addDataAttribute("bs-target", ".navbar-collapse.show");

        a.text = label;
        a.href = "#";

        if (event !== null) {

            a.onClick = function () {
                local._menuUl._removeActive();
                //li.addCssClass("active");

                event();
            };
        }

        return this;

    }


    addDropdownMenu(menu) {

        this._menuUl.addContainer(menu);
        return this;

    }



//<img src="/docs/4.0/assets/brand/bootstrap-solid.svg" width="30" height="30" alt="">


    set brandImage(value) {

        let img = new ImageContainer(this._brand);
        img.height=30;
        img.src=value;

    }


    set brandLabel(value) {

        this._brand.text = value;

    }


    set onBrandClick(value) {

        this._brand.onClick = value;

    }

}