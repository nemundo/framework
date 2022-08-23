import NavContainer from "../../html/Structure/Nav.js";
import UnorderedList from "../../html/Listing/UnorderedList.js";
import LiContainer from "../../html/Listing/LiContainer.js";
import HyperlinkContainer from "../../html/Hyperlink/Hyperlink.js";
import DivContainer from "../../html/Content/Div.js";


export default class _AdminPagination extends DivContainer {

    pageCount = 8;

    onPageItem;


    render() {

        let globalNav = this;


        this.addCssClass("nemundo-pagination");

        //let ul = new UnorderedList(this);
        //ul.addCssClass("pagination");

        for (let i = 0; i < this.pageCount; i++) {

            /*let li = new LiContainer(ul);
            li.addCssClass("page-item");*/

            let a = new HyperlinkContainer(this);
            //a.addCssClass("page-link");
            a.href = "#";
            a.text = i+1;

            a.onClick = function () {

                if (globalNav.onPageItem !== null) {

                    globalNav.onPageItem(i);

                }

            };

        }

    }

}