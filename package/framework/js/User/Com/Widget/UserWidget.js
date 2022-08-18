import WidgetContainer from "../../../../framework/Com/Widget/Widget.js";
import DivContainer from "../../../../html/Content/Div.js";
import LogoutMenuIcon from "../../../../framework/User/MenuIcon/LogoutMenuIcon.js";

import UserInformation from "../../../../framework/User/Information/UserInformation.js";
import H3Container from "../../../../html/Title/H3.js";
import AdminButton from "../../../../framework/AdminButton.js";
import UnorderedList from "../../../../html/Listing/UnorderedList.js";
import PasswordChangeForm from "../../../../framework/User/Com/Form/PasswordChangeForm.js";
import ParagraphContainer from "../../../../html/Content/Paragraph.js";
import AppConfig from "../../../App/AppConfig.js";

export default class UserWidget extends WidgetContainer {


    constructor(parentContainer) {

        super(parentContainer);

        this.widgetTitle = "User Setting";
        this.widgetIcon = "person-fill";

    }


    render() {

        let local = this;

        let container = new DivContainer(this);

        let div = new DivContainer(container);
        div.text = "Login: " + (new UserInformation()).getLogin();

        let logout = new LogoutMenuIcon(container);
        logout.onLogout = function () {
            //(new MuensterApp()).loadApp();
            AppConfig.app.loadApp();

        };
        logout.render();


        let h4 = new H3Container(this);
        h4.text = "Usergroup";

        let ul = new UnorderedList(this);
        let usergroupList = (new UserInformation()).getUsergroup();
        usergroupList.forEach(function (number, i) {
            ul.addItem(usergroupList[i].usergroup);
        });


        let btn = new AdminButton(this);
        btn.label = "Passowrt ändern";
        btn.onClick = function () {

            let form = new PasswordChangeForm(local);
            form.onSuccess = function () {

                form.emptyContainer();

                let p = new ParagraphContainer(form);
                p.text = "Passwort wurde geändert.";

            };
            form.render();

        };

    }

}