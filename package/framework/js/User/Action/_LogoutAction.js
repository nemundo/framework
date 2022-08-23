import _UserConfig from "../UserConfig.js";
import CookieReader from "../../../core/Cookie/CookieReader.js";

export default class _LogoutAction {


    //onSuccess = null;

    logout() {

        (new CookieReader()).deleteAllCookies();

        _UserConfig.isLogged = false;
        _UserConfig.loginName = null;

        /*if (this.onSuccess !== null) {
            this.onSuccess();
        }*/

    }

}