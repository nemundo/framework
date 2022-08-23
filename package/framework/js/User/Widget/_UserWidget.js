import AdminWidget from "../../Widget/AdminWidget.js";
import UserAdminContainer from "../Com/UserAdminContainer.js";
import AdminButton from "../../AdminButton.js";
import H1Container from "../../../html/Title/H1.js";
import _UserConfig from "../UserConfig.js";
import _UserCheck from "../Action/UserCheck.js";
import _LogoutAction from "../Action/LogoutAction.js";
import PasswordChangeWidget from "./PasswordChangeWidget.js";

export default class _oldUserWidget extends AdminWidget {

    constructor(parentContainer) {

        super(parentContainer);

        this.widgetTitle = "User";

    }


    render() {


        let h1=new H1Container(this);
        h1.text=  _UserConfig.loginName;

        let btn = new AdminButton(this);
        btn.label = "Passowrt ändern";
        btn.onClick=function () {

            //let widget = new PasswordChangeWidget();

        };


        let logout = new AdminButton(this);
        logout.label = "Logout";
        logout.onClick=function () {
            (new _LogoutAction()).logout();
        };



    }



}