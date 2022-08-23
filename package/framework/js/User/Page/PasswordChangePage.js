import IconPageContainer from "../../Page/IconPageContainer.js";
import PasswordChangeForm from "../Com/PasswordChangeForm.js";


export default class PasswordChangePage extends IconPageContainer {

    constructor(parentContainer) {

        super(parentContainer);
        this.pageTitle = "Password Change";
        this.pageIcon = "user";

    }


    render() {

        let form = new PasswordChangeForm(this);
        form.onSuccess = function () {
            //local.removeContainer();
        }



    }


}
