import LabelValueAdminTable from "../../../Table/LabelValueAdminTable.js";


export default class SessionTable extends LabelValueAdminTable {

    render() {

        this.caption = "Session";

        for (let i = 0; i < localStorage.length; i++) {

            let key = localStorage.key(i);
//            sessionStorage.getItem(key,value)
            let value = "";

            this.addLabelValue(key, value);

        }

    }

}