import DivContainer from "../../html/Content/Div.js";
import TableHeader from "../../html/Table/TableHeader.js";
import TableBodyContainer from "../../html/Table/Tbody.js";
import OverflowStyle from "../../html/Style/Overflow.js";
import ColorStyle from "../../html/Style/Color.js";
import DisplayStyle from "../../html/Style/Display.js";
import TableContainer from "../../html/Table/Table.js";
import Debug from "../../core/Debug/Debug.js";
import LoaderContainer from "../Com/Loader/Loader.js";


export default class _ScrollTable extends DivContainer {

    paginationLimit = 10;

    tableHeight = 300;

    _table;
    _header;
    _tbody;
    _pagination;

    _service;

    _page = 0;

    _loader = null;

    constructor(parentContainer) {

        super(parentContainer);

        this._table = new TableContainer(this);

        this._header = new TableHeader(this._table);
        this._header.backgroundColor = ColorStyle.LIGHT_GREY;

        this._tbody = new TableBodyContainer(this._table);
        this._tbody.display = DisplayStyle.BLOCK;
        this._tbody.overflowY = OverflowStyle.SCROLL;
        this._tbody.heightPixel = this.tableHeight;

        this._tbody.backgroundColor = ColorStyle.GOLD;
        this._tbody.widthPixel=600;
        //this._tbody.widthPercent=100;

    }


    getPage() {
        return this._page;
    }


    set onEndScroll(value) {

        let local = this;

        this._tbody.onScroll = function () {

            if (local._tbody._htmlElement.offsetHeight + local._tbody._htmlElement.scrollTop >= local._tbody._htmlElement.scrollHeight) {

                local._page++;
                value();

            }

        }

    }


    loadData() {

    }


    enableLoader() {
        this._loader = new LoaderContainer(this._tbody);
    }


    disableLoader() {

        this._loader.removeContainer();

    }



}