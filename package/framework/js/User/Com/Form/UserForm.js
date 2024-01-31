import TextBox from "../../../Form/TextBox.js";
import DataForm from "../../../Data/DataForm.js";
import ServiceRequest from "../../../Service/ServiceRequest.js";
import Checkbox from "../../../Form/Checkbox.js";
import AdminButton from "../../../AdminButton.js";
import DivContainer from "../../../../html/Content/Div.js";


export default class UserForm extends DataForm {


    _email;

    _editor;

    constructor(parentContainer) {

        super(parentContainer);

        let local=this;

        /*let lastName = new AdminTextBox(this);
        lastName.label = "Last Name";

        let firstName = new AdminTextBox(this);
        firstName.label = "First Name";*/


        this._email = new TextBox(this);
        this._email.label = "Email";

        let usergroupContainer = new DivContainer(this);

        let usergroupCheckboxList=[];


        let service = new ServiceRequest("usergroup-list");
        service.onDataRow=function (dataRow) {

            let checkbox = new Checkbox(usergroupContainer);
            checkbox.name = "usergroup";
            checkbox.value = dataRow.id;
            checkbox.chec
            checkbox.label = dataRow.usergroup;

            usergroupCheckboxList.push(checkbox);

        };
        service.sendRequest();

        let btn = new AdminButton(this);
        btn.label="Speichern";
        btn.onClick=function () {

            let service = new ServiceRequest("user-add");
            service.addParameter("email", local._email.value);

            let usergroup = [];
            for (let item of usergroupCheckboxList) {
                if (item.checked) {
                    usergroup.push(item.value);
                }
            }

            service.addParameter("usergroup", JSON.stringify(usergroup));
            service.onFinished = function () {
                local.onSuccess();
            };
            service.sendRequest();

        };

    }

}