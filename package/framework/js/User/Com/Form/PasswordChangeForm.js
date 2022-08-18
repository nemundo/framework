import FormContainer from "../../../../html/Form/Form.js";
import TextBox from "../../../Form/TextBox.js";
import AdminButton from "../../../AdminButton.js";
import Debug from "../../../../core/Debug/Debug.js";
import ServiceRequest from "../../../Service/ServiceRequest.js";
import DivContainer from "../../../../html/Content/Div.js";

export default class PasswordChangeForm extends DivContainer {   // FormContainer {

    onSuccess = null;

    constructor(parentContainer) {

        super(parentContainer);

        let _local = this;

        let password = new TextBox(this);
        password.label = "Neues Passwort";
        password._input.type = "password";
        password.onKey = function () {
            password.errorMessage = "";
        }

        let btn = new AdminButton(this);
        btn.label = "Change Password";
        btn.onClick = function () {

            let service = new ServiceRequest("user-change-password");
            service.addParameter("password-new", password.value);
            service.onDataRow = function (item) {

                //let value = JSON.parse(item.success);

                if (item.status === "OK") {
                    (new Debug()).write("Login success");
                    password.errorMessage = "";
                } else {
                    (new Debug()).write("Login error");
                    password.errorMessage = "Passwort nicht korrekt";
                }

            }
            service.sendRequest();


            if (_local.onSuccess !== null) {
                _local.onSuccess();
            }


        };

    }


}
