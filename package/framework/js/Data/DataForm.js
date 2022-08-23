import FormContainer from "../../html/Form/Form.js";
import AdminButton from "../AdminButton.js";


export default class DataForm extends FormContainer {

    serviceName;

    onSuccess=null;

    renderButton() {

        let local=this;

        let btn = new AdminButton(this);
        btn.label="Submit";
        btn.onClick=function () {
          local.onSubmit();
        };


    }


    onSubmit() {

        //throw("Error onSubmit");

    }



}

