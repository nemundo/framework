import PageContainer from "../../Page/PageContainer.js";
import AdminWidget from "../../Widget/AdminWidget.js";
import AppConfig from "../../App/AppConfig.js";
import UserActivationForm from "../Com/UserActivationForm.js";


export default class UserActivationPage extends PageContainer {

    loadPage() {

        this.pageTitle = "User Activation";

    }


    render() {

        let local = this;

        let widget = new AdminWidget(this);
        widget.widgetTitle = "User Activation";
        widget.addCssClass("position-center");
        widget.addAttribute("style", "width:500px");

        let form = new UserActivationForm(widget);
        form.onSuccess = function () {
            local.removeContainer();
            AppConfig.app.loadApp();
        }

        widget.addContainer(form);

    }

}