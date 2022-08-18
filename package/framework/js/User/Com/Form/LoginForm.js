import TextBox from "../../../Form/TextBox.js";
import AdminButton from "../../../AdminButton.js";
import MouseCursor from "../../../../core/Mouse/MouseCursor.js";
import LoginAction from "../../Action/LoginAction.js";
import HyperlinkContainer from "../../../../html/Hyperlink/Hyperlink.js";
import PasswordForgetForm from "./PasswordForgetForm.js";
import AdminModal from "../../../Com/Modal/AdminModal.js";
import ColumnFlexLayout from "../../../Com/Layout/ColumnFlexLayout.js";
import ColorStyle from "../../../../html/Style/Color.js";
import BootstrapTextBox from "../../../Bootstrap/Form/BootstrapTextBox.js";
import BootstrapButton from "../../../Bootstrap/Button/BootstrapButton.js";

export default class LoginForm extends ColumnFlexLayout {   // FormContainer {

    onSuccess = null;

    _user;

    _password;

    constructor(parentContainer) {

        super(parentContainer);

        let local = this;

        this._user = new BootstrapTextBox(this);  //new TextBox(this);
        this._user.label = "User";
        this._user.widthPercent = 100;

        this._password = new BootstrapTextBox(this);
        this._password.label = "Passwort";
        this._password.type = "password";
        this._password.onFocus = function () {
            local._password.errorMessage = "";
        };

        this._password.onKey = function () {
            local._password.errorMessage = "";
        };
        this._password.onEnter = function () {
            local.loginUser();
        };

        let btn = new BootstrapButton(this);  // new AdminButton(this);
        btn.label = "Login";
        btn.onClick = function () {
            local.loginUser();
        };


        //if (AppConfig.passwordFortgot) {

       /* let hyperlink = new HyperlinkContainer(this);
        hyperlink.text = "Passwort vergessen";
        hyperlink.color= ColorStyle.BLUE;
        //hyperlink.
        /*hyperlink.onMouseEnter = function () {
            this.cursor = CursorStyle.POINTER;
        };*/

 /*       hyperlink.onClick = function () {

            let form = new PasswordForgetForm();
            form.onSuccess = function () {
                modal.close();
            }

            let modal = new AdminModal();
            modal.modalTitle = "Password Forget";
            modal.show(form);

        };*/

        //}*/


    }


    loginUser() {

        (new MouseCursor()).setWait();

        let local = this;

        let action = new LoginAction();
        action.login(this._user.value, this._password.value);
        action.onSuccess = function () {

            if (local.onSuccess !== null) {
                local.onSuccess();
            }

            (new MouseCursor()).setDefault();

        };

        action.onFailure = function () {
            local._password.errorMessage = "Passwort nicht korrekt";
            (new MouseCursor()).setDefault();
        };


    }

}
