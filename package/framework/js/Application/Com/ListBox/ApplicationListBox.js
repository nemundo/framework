import BootstrapDataListBox from "../../../Bootstrap/Data/BootstrapDataListBox.js";

export default class ApplicationListBox extends BootstrapDataListBox {

    constructor(parentContainer) {

        super(parentContainer);
        this.service = "application-application-search";
        this.label = "Application";

    }


    onDataRow(dataRow) {

        this.addItem(dataRow.id, dataRow.application);

    }

}