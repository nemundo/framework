import TableContainer from "../../html/Table/Table.js";

export default class AdminTable extends TableContainer {

    constructor(parentContainer) {

        super(parentContainer);
        this.addCssClass("admin-table");
        //this.border=1;

    }

}