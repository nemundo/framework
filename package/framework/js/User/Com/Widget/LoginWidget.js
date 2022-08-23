import AdminWidget from "../../../Com/Widget/AdminWidget.js";
import LoginForm from "../../Com/Form/LoginForm.js";
import AppConfig from "../../../App/AppConfig.js";
import ImageContainer from "../../../../html/Image/Image.js";

export default class LoginWidget extends AdminWidget {

    onSuccess = null;

    constructor(parentContainer) {

        super(parentContainer);
        this.widgetTitle = "Login";

    }


    render() {

        let local = this;

        if (AppConfig.logoImage !== null) {
            let img = new ImageContainer(this);
            img.src = AppConfig.logoImage;
        }

        let form = new LoginForm(this);
        form.onSuccess = function () {
            if (local.onSuccess !== null) {
                local.onSuccess();
            }
        };
        form.render();

        /*let hyperlink = new HyperlinkContainer(this);
        hyperlink.text="Passwort vergessen";
        hyperlink.href="#";
        hyperlink.cursor = CursorStyle.POINTER;
        hyperlink.onClick=function () {

            let form = new PasswordForgetForm();
            form.onSuccess = function () {
                modal.close();
            }

            let modal = new AdminModal();
            modal.modalTitle="Passwort vergessen";
            modal.show(form);

        };*/

    }

}