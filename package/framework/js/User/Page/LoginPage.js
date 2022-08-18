import PageContainer from "../../Page/PageContainer.js";
import AppConfig from "../../App/AppConfig.js";
import BackgroundImage from "../../App/Com/BackgroundImage.js";
import LoginWidget from "../Com/Widget/LoginWidget.js";
import CenterLayout from "../../Com/Layout/CenterLayout.js";
import MobileDetection from "../../../core/System/MobileDetection.js";
import LoginForm from "../Com/Form/LoginForm.js";
import BootstrapPage from "../../Bootstrap/Page/BootstrapPage.js";


export default class LoginPage extends BootstrapPage {

    loadPage() {

        this.pageTitle = "Login";

    }


    render() {

        let local = this;

        /*let center = new CenterLayout(this);

        if ((new MobileDetection()).isMobile()) {
            center.centerLayout=false;
        } else {
            center.widthPixel=500;
        }


        new BackgroundImage(this);*/




        let form=new LoginForm(this);
        form.maxWidthPixel=500;
        form.onSuccess = function () {
            local.removeContainer();
            AppConfig.app.loadApp();
        };
        form.render();



        /*let widget = new LoginWidget(center);
        widget.onSuccess = function () {
            local.removeContainer();
            AppConfig.app.loadApp();
        };
        widget.render();*/

    }

}