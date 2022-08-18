import PageContainer from "../../Page/PageContainer.js";
import UserForm from "../Com/UserForm.js";
import UserTable from "../Com/UserTable.js";
import AdminButton from "../../AdminButton.js";
import AdminModal from "../../Com/Modal/AdminModal.js";
import H1Container from "../../../html/Title/H1.js";
import MenuIcon from "../../Menu/MenuIcon.js";
import ColorStyle from "../../../html/Style/Color.js";
import IconPageContainer from "../../Page/IconPageContainer.js";


export default class UserAdminPage extends IconPageContainer {

    constructor(parentContainer) {

        super(parentContainer);
        this.pageTitle = "User Admin";
        this.pageIcon="user";

    }


    render() {


        //this.visible=false;

        this.backgroundColor=ColorStyle.BROWN;

        let local=this;

        let icon = new MenuIcon(this);
        icon.icon="x";
        icon.onClick=function () {
            local.visible=false;
        };


        let h1=new H1Container(this);
        h1.text="User";

       let btn=new AdminButton(this);
        btn.label="New";
        btn.onClick=function () {

            let form = new UserForm();
            //form.render();
            form.onSuccess = function () {
                table.reloadData();
            }

            let modal=new AdminModal();
            modal.show(form);


        };


        let table = new UserTable(this);
        table.render();


    }


}
