import DivContainer from "../../html/Content/Div.js";
import AdminTable from "./AdminTable.js";
import TableHeader from "../../html/Table/TableHeader.js";
import TableBodyContainer from "../../html/Table/Tbody.js";
import TableRow from "../../html/Table/TableRow.js";
import EditIcon from "../FontAwesome/EditIcon.js";
import DeleteIcon from "../FontAwesome/DeleteIcon.js";
import ServiceRequest from "../Service/ServiceRequest.js";
import Loader from "../Com/Loader/Loader.js";
import MouseCursor from "../../core/Mouse/MouseCursor.js";
import OverflowStyle from "../../html/Style/Overflow.js";
import ColorStyle from "../../html/Style/Color.js";
import AdminButton from "../AdminButton.js";
import CursorStyle from "../../html/Style/Cursor.js";
import DisplayStyle from "../../html/Style/Display.js";
import Debug from "../../core/Debug/Debug.js";


export default class _AdminDataTable extends DivContainer {

    paginationLimit = 10;

    tableHeight = null;  // 500;

    reloadOnScroll = true;

    service;

    // showEdit
    showEditIcon = true;

    showDeleteIcon = true;

    // onRowClick
    onItemClick = null;

    onEditClick = null;

    onDeleteClick = null;

    _table;
    _header;
    _tbody;
    _pagination;

    _service;

    _page = 0;

    _loader = null;

    constructor(parentContainer) {

        super(parentContainer);

        //this.heightPercent = 100;
        //this.overflowY = OverflowStyle.SCROLL;

        let local = this;

        let refreshBtn = new AdminButton(this);
        refreshBtn.label = "Refresh";
        refreshBtn.onClick = function () {
            local.reloadTable();
        };

        let moreBtn = new AdminButton(this);
        moreBtn.label = "More";
        moreBtn.onClick = function () {
            local.loadMore();
        };

        this._table = new AdminTable(this);
        //this._table.heightPercent = 100;

        this._header = new TableHeader(this._table);
        this._header.backgroundColor = ColorStyle.LIGHT_GREY;
        this.onHeader(this._header);

        this._tbody = new TableBodyContainer(this._table);
        this._tbody.display = DisplayStyle.BLOCK;
        //this._tbody.overflowY = OverflowStyle.SCROLL;

        /*
        if (this.tableHeight!==null) {
        this._tbody.heightPixel = this.tableHeight;
        }*/

        this._service = new ServiceRequest();

    }


    render() {

        if (this.showEditIcon) {
            this._header.addEmpty();
        }

        if (this.showDeleteIcon) {
            this._header.addEmpty();
        }

        let local = this;


        this._tbody.heightPixel =300;
        /*if (this.tableHeight!==null) {
            this._tbody.heightPixel = this.tableHeight;
        }*/

        if (this.reloadOnScroll) {

            this._tbody.onScroll = function (event) {

                if (local._tbody.offsetHeight + local._tbody.scrollTop >= local._tbody.scrollHeight) {
                    local.loadMore();
                }

            }

        }

        this.loadTable();

        let globalTable = this;

    }


    loadTable() {

        let local = this;
        this._loader = new Loader(this);
        this._loadTbodyData();

        return this;

    }


    reloadTable() {

        this._tbody.emptyContainer();
        this._page = 0;
        this.loadTable();

        return this;

    }

    loadMore() {

        this._loader = new Loader(this);

        this._page++;
        this._loadTbodyData();

    }


    emptyTable() {

        this._tbody.emptyContainer();
        this._page = 0;
        return this;

    }


    _loadTbodyData() {

        let local = this;

        this._service.service = this.service;

        if (this.reloadOnScroll) {
            this._tbody.overflowY = OverflowStyle.SCROLL;
            this._service.addParameter("page", this._page);
            this._service.addParameter("pagination-limit", this.paginationLimit);
        }

        this._service.onLoaded = function () {

            local._loader.removeContainer();
            (new MouseCursor()).setDefault();

        };

        this._service.onRow = function (item) {

            let row = new TableRow(local._tbody);
            row.display = DisplayStyle.TABLE;
            row.onMouseEnter = function () {
                row.cursor = CursorStyle.POINTER;
                row.backgroundColor = ColorStyle.LIGHT_GREY;
            }

            row.onMouseLeave = function () {
                row.backgroundColor = "";
            }

            local.onRow(row, item);
            if (local.onItemClick !== null) {
                row.onClick = function () {
                    local.onItemClick(row);
                };
            }

            if (local.showEditIcon) {
                let editIcon = new EditIcon();
                if (local.onEditClick !== null) {
                    editIcon.onClick = function () {
                        local.onEditClick(item.id);
                    }
                }
                row.addContainer(editIcon);
            }

            if (local.showDeleteIcon) {
                let deleteIcon = new DeleteIcon();
                if (local.onDeleteClick !== null) {
                    deleteIcon.onClick = function () {
                        local.onDeleteClick(item.id);
                        row.removeContainer();
                    }
                }
                row.addContainer(deleteIcon);
            }

        }

        this._service.sendRequest();

    }


    onHeader(header) {

    }


    // tableRow,dataRow
    onRow(row, item) {

    }


    addParameter(name, value) {
        this._service.addParameter(name, value);
    }


}