import UserForm from "../Form/UserForm.js";
import UserTable from "../Table/UserTable.js";
import LabelValueAdminTable from "../../../Table/LabelValueAdminTable.js";
import PlusMenuIcon from "../../../Com/Menu/Icon/PlusMenuIcon.js";
import ViewWidgetContainer from "../../../Com/Widget/ViewWidget.js";

export default class UserAdminWidget extends ViewWidgetContainer {

    LIST_VIEW = 1;

    FORM_VIEW = 2;

    ITEM_VIEW = 3;


    constructor(parentContainer) {

        super(parentContainer);

        this.widgetTitle = "User Admin";
        this.widgetIcon = "person";

    }


    render() {

        let local = this;

        this.addView(this.LIST_VIEW);
        this.addView(this.ITEM_VIEW);
        this.addView(this.FORM_VIEW);

        this.loadList();
        //this.showForm();


        this.setPreviousViewStatus(this.CLOSE_WIDGET);
        this.showView(this.LIST_VIEW);

    }


    loadList() {

        let local = this;
        let view = this.viewList[this.LIST_VIEW];

        this.widgetTitle = "User";

        view.emptyContainer();

        let btn = new PlusMenuIcon(view);
        btn.icon = "person-plus";
        btn.label = "New User";
        btn.showLabel = false;
        btn.onClick = function () {
            local.showForm();
        };

        let table = new UserTable(view);
        table.paginationLimit = 200;
        table.onItemClick = function (dataRow) {
            local.setPreviousViewStatus(local.LIST_VIEW);
            local.showItem(dataRow);
        };
        table.render();

    }


    /*
        showTable() {

            this.addView(this.LIST_VIEW);

            let local = this;
            let view = this.viewList[this.LIST_VIEW];

            this.widgetTitle = "User";

            let btn = new PlusMenuIcon(view);
            btn.icon = "person-plus";
            btn.label = "New User";
            btn.showLabel = false;
            btn.onClick = function () {
                local.setPreviousViewStatus(local.LIST_VIEW);
                local.showView(local.FORM_VIEW);
            };

            let table = new UserTable(view);
            table.paginationLimit=200;
            table.onItemClick = function (dataRow) {
                local.setPreviousViewStatus(local.LIST_VIEW);
                local.showItem(dataRow);
            };
            table.render();

        }*/


    showForm() {

        let local = this;

        local.setPreviousViewStatus(local.LIST_VIEW);
        local.showView(local.FORM_VIEW);


        //this.addView(this.FORM_VIEW);

        let view = this.viewList[this.FORM_VIEW];
        view.emptyContainer();

        this.widgetTitle = "New User";


        let form = new UserForm(view);
        form.onSuccess = function () {

            local.loadList();
            local.showView(local.LIST_VIEW);

        };
        form.render();

    }


    showItem(dataRow) {

        this.setPreviousViewStatus(this.LIST_VIEW);

        this.showView(this.ITEM_VIEW);
        let view = this.viewList[this.ITEM_VIEW];

        view.emptyContainer();

        this.widgetTitle = "User Item";

        let table = new LabelValueAdminTable(view);
        table.addLabelValue("Id", dataRow.user_id);
        table.addLabelValue("Login", dataRow.login);

    }


    onClose() {

        super.onClose();

        if (this.currentViewId === this.LIST_VIEW) {
            this.setPreviousViewStatus(this.CLOSE_WIDGET);
        }

    }


}