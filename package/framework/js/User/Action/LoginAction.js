import UserLoginService from "../Service/UserLoginService.js";
import UserInformation from "../Information/UserInformation.js";

export default class LoginAction {

    onSuccess = null;

    onFailure = null;


    login(user, password) {

        let local = this;

        let service = new UserLoginService();
        service.login = user;
        service.password = password;

        service.onDataRow = function (dataRow) {

            if (dataRow.success) {

                UserInformation._login = dataRow.login;
                UserInformation._usergroup = dataRow.usergroup;

                /*_UserConfig.isLogged = true;
                _UserConfig.loginName = dataRow.login;
                _UserConfig.usergroup = dataRow.usergroup;

                (new CookieReader()).setValue("is_logged", true);
                (new CookieReader()).setValue("login_name", _UserConfig.loginName);*/

                if (local.onSuccess !== null) {
                    local.onSuccess();
                }

            } else {

                if (local.onFailure !== null) {
                    local.onFailure();
                }

            }

        }

        service.sendRequest();

        return true;

    }

}