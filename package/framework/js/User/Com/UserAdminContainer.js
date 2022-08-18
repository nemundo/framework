import DivContainer from "../../../html/Content/Div.js";
import AdminButton from "../../AdminButton.js";
import UserForm from "./UserForm.js";
import AdminModal from "../../Com/Modal/AdminModal.js";
import UserTable from "./UserTable.js";
import DisplayStyle from "../../../html/Style/Display.js";


export default class UserAdminContainer extends DivContainer {

    constructor(parentContainer) {

        super(parentContainer);

        this.display=DisplayStyle.FLEX;
        this.flexDirection=FlexDirection.COLUMN;

        let btn = new AdminButton(this);
        btn.label = "New User";
        btn.onClick = function () {

            let form = new UserForm();
            //form.render();
            form.onSuccess = function () {
                table.reloadData();
                modal.close();
            }

            let modal = new AdminModal();
            modal.modalTitle = "New User";
            modal.show(form);

        };


        let table = new UserTable(this);
        table.render();


    }

}