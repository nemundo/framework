import FormContainer from "../../../html/Form/Form.js";
import TextBox from "../../Form/TextBox.js";
import AdminButton from "../../AdminButton.js";
import ServiceRequest from "../../Service/ServiceRequest.js";

export default class UserActivationForm extends FormContainer {

    onSuccess = null;

    constructor(parentContainer) {

        super(parentContainer);

        let _local = this;

        let password = new TextBox(this);
        password.label = "Gewünschtes Passwort";
        password._input.type = "password";
        password.onKey = function () {
            password.errorMessage = "";
        }

        let btn = new AdminButton(this);
        btn.label = "Activate User";
        btn.onClick = function () {

            let service = new ServiceRequest("user-activation");
            service.addParameter("password", password.value);
            service.onDataRow = function (item) {

                /*let value = JSON.parse(item.success);

                if (value) {
                    (new Debug()).write("Login success");
                    password.errorMessage = "";
                } else {
                    (new Debug()).write("Login error");
                    password.errorMessage = "Passwort nicht korrekt";
                }*/

            }
            service.sendRequest();


            if (_local.onSuccess !== null) {
                _local.onSuccess();
            }

        };

    }

}
