import AdminWidget from "../../Widget/AdminWidget.js";
import PasswordChangeForm from "../Com/PasswordChangeForm.js";

export default class PasswordChangeWidget extends AdminWidget {

    constructor(parentContainer) {

        super(parentContainer);

        let local=this;

        this.widgetTitle = "Password Change";

        let form = new PasswordChangeForm(this);
        form.onSuccess = function () {
            local.removeContainer();
        }

    }

}