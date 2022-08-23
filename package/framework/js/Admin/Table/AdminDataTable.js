import ServiceDataTable from "../../Data/Table/ServiceDataTable.js";
import ThContainer from "../../../html/Table/Th.js";
import TextAlignment from "../../../html/Style/Text/TextAlignment.js";
import HyperlinkContainer from "../../../html/Hyperlink/Hyperlink.js";
import TableSorting from "../../Data/Table/TableSorting.js";

export default class AdminDataTable extends ServiceDataTable {

    constructor(parentContainer) {

        super(parentContainer);

        this.addCssClass("admin-table");

    }


    getSortingHyperlink(label, sorting, defaultSorting = TableSorting.ASC) {

        let local = this;

        let th = new ThContainer();
        /*th.textAlignment = TextAlignment.LEFT;
        th.paddingPixel = 5;*/

        let hyperlink = new HyperlinkContainer(th);
        hyperlink.text = label;
        hyperlink.onClick = function () {

            local.sorting = sorting;
            local.sortingOrder = defaultSorting;

            local.reloadData();

            if (defaultSorting === TableSorting.DESC) {
                defaultSorting = TableSorting.ASC;
            } else {
                defaultSorting = TableSorting.DESC;
            }

        };

        return th;

    }

}