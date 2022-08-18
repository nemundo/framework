import MouseCursor from "../../../../core/Mouse/MouseCursor.js";
import LoginAction from "../../Action/LoginAction.js";
import ColumnFlexLayout from "../../../Com/Layout/ColumnFlexLayout.js";
import BootstrapTextBox from "../../../Bootstrap/Form/BootstrapTextBox.js";
import BootstrapButton from "../../../Bootstrap/Button/BootstrapButton.js";
import BootstrapCard from "../../../Bootstrap/Card/BootstrapCard.js";

export default class BootstrapLoginForm extends BootstrapCard {   // ColumnFlexLayout {   // FormContainer {

    onSuccess = null;

    _user;

    _password;

    constructor(parentContainer) {

        super(parentContainer);

        let local = this;

        this.cardTitle="Login";

        this._user = new BootstrapTextBox(this);  // new TextBox(this);
        this._user.label = "User";
        this._user.widthPercent = 100;

        this._password = new BootstrapTextBox(this);  //new TextBox(this);
        this._password.label = "Password";
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
