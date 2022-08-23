import ServiceRequest from "../../Service/ServiceRequest.js";
import UserInformation from "../Information/UserInformation.js";

export default class UserCheckService extends ServiceRequest {

    /*displayName = "";

    isLogged = false;

    login = "";*/

    onCheck = null;

    constructor() {

        super("user-check");

        let local = this;

        this.onDataRow = function (dataRow) {

            UserInformation._login = dataRow.login;
            UserInformation._usergroup = dataRow.usergroup;
            UserInformation._isLogged= dataRow.is_logged;

            /*local.isLogged = dataRow.is_logged;
            local.displayName = dataRow.display_name;
            local.login = dataRow.login;*/

            if (local.onCheck !== null) {
                local.onCheck();
            }

        }

    }

}