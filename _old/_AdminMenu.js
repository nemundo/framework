import DivContainer from "../../html/Content/Div.js";
import AdminButton from "../AdminButton.js";
import H1Container from "../../html/Title/H1.js";
import BoldContainer from "../../html/Formatting/BoldContainer.js";
import HyperlinkContainer from "../../html/Hyperlink/Hyperlink.js";
import _UserAction from "../User/UserAction.js";
import AdminModal from "../AdminModal.js";
import PasswordChangeForm from "../User/Com/PasswordChangeForm.js";
import BodyContainer from "../../html/Document/Body.js";
import LoginPage from "../package/framework/js/User/Page/LoginPage.js";


export default class _AdminMenu extends DivContainer {

    static _pageList = [];

    addPage(page) {

        _AdminMenu._pageList[_AdminMenu._pageList.length] = page;
        return this;

    }


    render() {

        let _local = this;

        let navigation = new DivContainer(this);
        navigation.addCssClass("fixed-top");
        navigation.addCssClass("admin-menu");

        let bold = new BoldContainer(navigation);
        bold.text = _UserAction.loginName;


        let hyperlink2 = new HyperlinkContainer(navigation);
        hyperlink2.text = "Passwort ändern";
        hyperlink2.href = "#";
        hyperlink2.onClick = function () {

            let form = new PasswordChangeForm();
            form.render();

            (new AdminModal()).show(form);

        };


        let hyperlink = new HyperlinkContainer(navigation);
        hyperlink.text = "Logout";
        hyperlink.href = "#";
        hyperlink.onClick = function () {

            (new _UserAction()).logout();

            let body = new BodyContainer();
            body.emptyContainer();

            let page = new LoginPage(body);
            //page.render();


        };

        let app = new DivContainer(this);
        app.addCssClass("app-content");

        let title = new H1Container(app);

        let content = new DivContainer(app);
        //content.addCssClass("app-content");

        for (let number in _AdminMenu._pageList) {

            let btn = new AdminButton(navigation);
            btn.label = _AdminMenu._pageList[number].pageTitle;
            btn.onClick = function () {

                title.text = _AdminMenu._pageList[number].pageTitle;

                content.emptyContainer();
                content.addContainer(_AdminMenu._pageList[number]);

            };

        }

    }

}
