import DocumentContainer from "../../html/Document/Document.js";
import BodyContainer from "../../html/Document/Body.js";

export default class PageLoader {


    showPage(pageClass) {

        let page = new pageClass();

        (new DocumentContainer()).title = page.pageTitle;

        page.render();

        let body=new BodyContainer();
        //body.emptyContainer();

        body.addContainer(page);

    }


    showPageContainer(page) {

        (new DocumentContainer()).title = page.pageTitle;

        page.render();

        let body=new BodyContainer();
        //body.emptyContainer();

        body.addContainer(page);

    }




}