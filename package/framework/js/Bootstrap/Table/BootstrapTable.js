import TableContainer from "../../../html/Table/Table.js";

export default class BootstrapTable extends TableContainer {

    constructor(parentContainer) {

        super(parentContainer);
        this.addCssClass("table");

    }

}