import FormContainer from "../../../../html/Form/Form.js";
import TextBox from "../../../Form/TextBox.js";
import AdminButton from "../../../AdminButton.js";
import ServiceRequest from "../../../Service/ServiceRequest.js";

export default class PasswordForgetForm extends FormContainer {

    onSuccess = null;

    constructor(parentContainer) {

        super(parentContainer);

        let _local = this;

        let email = new TextBox(this);
        email.label = "Email";
        //email._input.type = "email";

        let btn = new AdminButton(this);
        btn.label = "Send Password";
        btn.onClick = function () {

            let service = new ServiceRequest("user-password-forgot");
            service.addParameter("login", email.value);
            service.onDataRow = function (item) {

            }
            service.sendRequest();


            if (_local.onSuccess !== null) {
                _local.onSuccess();
            }

        };

    }

}
