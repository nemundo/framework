import ServiceRequest from "../../Service/ServiceRequest.js";
import CookieReader from "../../../core/Cookie/CookieReader.js";

export default class UserLoginService extends ServiceRequest {


    constructor() {

        super("user-login");


        /*
        let service = new ServiceRequest("user-login");
        service.addParameter("login", user);
        service.addParameter("password", password);
        service.sendRequest();
        service.onRow = function (item) {

            let value = JSON.parse(item.success);

            if (value) {

                //(new Debug()).write('Login success');

                UserConfig.isLogged = true;
                UserConfig.loginName = item.login;
                UserConfig.usergroup = item.usergroup;

                (new CookieReader()).setValue("is_logged", true);
                (new CookieReader()).setValue("login_name", UserConfig.loginName);

                if (local.onSuccess !== null) {
                    local.onSuccess();
                }

            } else {

                if (local.onFailure !== null) {
                    local.onFailure();
                }

            }

        }*/


    }


    set login(value) {
        this.addParameter("login", value);
    }


    set password(value) {
        this.addParameter("password", value);
    }



}