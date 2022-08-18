import BodyContainer from "../../html/Document/Body.js";
import TopNavigation from "../Com/Navigation/TopNavigation.js";
import DivContainer from "../../html/Content/Div.js";
import DocumentContainer from "../../html/Document/Document.js";
import BoldContainer from "../../html/Formatting/BoldContainer.js";
import AppConfig from "./AppConfig.js";
import FontFamily from "../../html/Style/Font/FontFamily.js";
import PageLoader from "../Page/PageLoader.js";


export default class App {

    startPage = null;

    showMenu = true;

    _pageList;

    constructor() {

        this._pageList = [];

        AppConfig.app=this;

        //let body = new BodyContainer();
        /*this._appDiv = new DivContainer(body);
        this._appDiv.addCssClass("app-content");*/


    }


    addPage(page) {

        this._pageList.push(page);
        return this;

    }


    loadApp() {

        let local = this;

        if (this.showMenu) {

            let body = new BodyContainer();
            let navigation = new TopNavigation(body);

            for (let i = 0; i < this._pageList.length; i++) {

                let pageClass = this._pageList[i];
                let page = new pageClass();

                navigation.addMenu(page.pageTitle, function () {

                    local.showPage(pageClass);

                    (new DocumentContainer()).changeUrl("?app=" + page.pageTitle);
                    (new DocumentContainer()).title = page.pageTitle;

                });

            }


            /*
            let bold = new BoldContainer(navigation);
            bold.text = _UserConfig.loginName;*/


            /*let logout = new AdminButton(navigation);
            logout.label = "Logout";
            logout.onClick = function () {

                //(new _UserAction()).logout();
                navigation.removeContainer();
                local.loadApp();

            };*/

        }

        if (this.startPage !== null) {

            this.showPage(this.startPage);

        }


    }


    showPage(pageClass) {

        (new PageLoader()).showPage(pageClass);

    }


    showPageContainer(page) {

        (new PageLoader()).showPageContainer(page);

    }




}