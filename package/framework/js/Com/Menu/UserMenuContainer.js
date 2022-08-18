import MenuContainer from "./MenuContainer.js";
import SpanContainer from "../../../html/Content/Span.js";
import _UserConfig from "../../User/UserConfig.js";
import LogoutMenuIcon from "../../User/Menu/LogoutMenuIcon.js";
import AppConfig from "../../App/AppConfig.js";

export default class UserMenuContainer extends MenuContainer {


    set showUserInformation(value) {

        if (value) {

            let userInformation = new SpanContainer(this);
            userInformation.text = _UserConfig.loginName;


            let logout = new LogoutMenuIcon(this);
            logout.onLogout = function () {
                //(new Debug()).write("logout");
                //(new NemundoComApp()).loadApp();
                AppConfig.app.loadApp();

            };
            logout.render();

        }

    }


    refreshUser() {

        //this._loginInformation.text = UserConfig.loginName;

    }


}