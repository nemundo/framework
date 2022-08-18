import App from "./App.js";
import LoginPage from "../User/Page/LoginPage.js";


export default class RestrictedApp extends App {

    constructor() {

        super();

        //(new UserCheck()).checkLogin();

        /*
        if ((new CookieReader()).existsValue("is_logged")) {

            UserConfig.isLogged = true;
            UserConfig.loginName = (new CookieReader()).getValue("login_name");

            (new Debug()).write((new CookieReader()).getValue("login_name"));

        }*/


    }


    loadApp() {

        //(new BodyContainer()).emptyContainer();
        //this._appDiv.emptyContainer();

        this.showPage(LoginPage);

        /*if (_UserConfig.isLogged) {
            super.loadApp();
        } else {
            this.showPage(LoginPage);
        }*/


    }


    /*
        checkLogin() {

            let value = false;

            if ((new CookieReader()).existsValue("is_logged")) {

                UserConfig.isLogged = true;
                UserConfig.loginName = (new CookieReader()).getValue("login_name");

                //(new Debug()).write((new CookieReader()).getValue("login_name"));

            }


            if (UserConfig.isLogged) {

                value = true;

            } else {

                this.showLogin();

            }


            (new Debug()).write(value);

            //this.showLogin();


            return value;


        }*/


    showLogin() {

        let result = false;

        /*if (_UserConfig.isLogged) {
            //super.loadApp();
            result = true;
        } else {
            this.showPage(LoginPage);
        }*/

        return false;

    }


}