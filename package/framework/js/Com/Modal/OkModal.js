import AdminModal from "./AdminModal.js";
import AdminButton from "../../AdminButton.js";

export default class OkModal extends AdminModal {

    onOk=null;


    show(container) {
        super.show(container);


        let local=this;

        let cancel = new AdminButton(this._widget);
        cancel.label="Cancel";
        cancel.onClick=function () {
            local.close();
        }


        let ok = new AdminButton(this._widget);
        ok.label="OK";
        ok.onClick=function () {

            local.close();

            if (local.onOk!==null) {
                local.onOk();
            }



        }


    }


}