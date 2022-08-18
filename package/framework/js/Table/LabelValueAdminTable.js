import AdminTable from "./AdminTable.js";
import TableRow from "../../html/Table/TableRow.js";
import BoldContainer from "../../html/Formatting/BoldContainer.js";


// LabelValueTable
// AdminLabelValueTable
export default class LabelValueAdminTable extends AdminTable {

    addLabelValue(label, value) {

        let row = new TableRow(this);

        let bold = new BoldContainer(row);
        bold.text = label;

        row.addText(value, true);

        return this;

    }

}