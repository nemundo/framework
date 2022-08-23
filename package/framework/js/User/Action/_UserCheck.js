import CookieReader from "../../../core/Cookie/CookieReader.js";
import _UserConfig from "../UserConfig.js";
import Debug from "../../../core/Debug/Debug.js";

export default class _UserCheck {

    checkLogin() {

        let value = false;

        if ((new CookieReader()).existsValue("is_logged")) {

            _UserConfig.isLogged = true;
            _UserConfig.loginName = (new CookieReader()).getValue("login_name");

            value = true;

            //(new Debug()).write((new CookieReader()).getValue("login_name"));

        }

        return value;

    }

}