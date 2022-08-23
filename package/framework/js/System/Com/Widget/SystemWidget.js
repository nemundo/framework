import ViewWidgetContainer from "../../../Com/Widget/ViewWidget.js";
import SessionTable from "../Table/SessionTable.js";
import CookieTable from "../Table/CookieTable.js";
import SystemTable from "../Table/SystemTable.js";

export default class SystemWidget extends ViewWidgetContainer {


    constructor(parentContainer) {

        super(parentContainer);

        this.widgetTitle = "System";
        this.widgetIcon = "info-circle";

    }


    render() {

        let table1 = new SessionTable(this);
        table1.render();

        let table = new CookieTable(this);
        table.render();

        let table3 = new SystemTable(this);
        table3.render();

    }


}