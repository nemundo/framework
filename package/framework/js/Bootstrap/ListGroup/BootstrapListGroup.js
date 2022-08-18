import UnorderedList from "../../../html/Listing/UnorderedList.js";
import LiContainer from "../../../html/Listing/LiContainer.js";
import HyperlinkContainer from "../../../html/Hyperlink/Hyperlink.js";
import DivContainer from "../../../html/Content/Div.js";

export default class BootstrapListGroup extends DivContainer {   // UnorderedList {

    _hyperlinkList=[];

    constructor(parentContainer) {
        super(parentContainer);
        this.addCssClass("list-group");
    }


    addItem(text) {
        //super.addItem(text);

        let li = new LiContainer(this);
        li.addCssClass("list-group-item");
        li.text=text;

        return this;

    }


    addHyperlink(label,event=null) {

        let local=this;

        let hyperlink=new HyperlinkContainer(this);
        hyperlink.addCssClass("list-group-item list-group-item-action");
        hyperlink.text=label;
        hyperlink.onClick = function () {

            local.clearActiveItem();

            /*for(let i = 0; i < local._hyperlinkList.length; i++) {
                local._hyperlinkList[i].removeCssClass("active");
            }*/

            hyperlink.addCssClass("active");
            event();

        }

        this._hyperlinkList.push( hyperlink);

        return this;

    }



    clearActiveItem() {

        for(let i = 0; i < this._hyperlinkList.length; i++) {
            this._hyperlinkList[i].removeCssClass("active");
        }

    }


    addActiveItem(text) {

        let li = new LiContainer(this);
        li.addCssClass("list-group-item");
        li.addCssClass("active");
        li.text=text;

    }

}