import TableHeader from "../../../html/Table/TableHeader.js";
import TableBodyContainer from "../../../html/Table/Tbody.js";
import TableRow from "../../../html/Table/TableRow.js";
import MouseCursor from "../../../core/Mouse/MouseCursor.js";
import CursorStyle from "../../../html/Style/Cursor.js";
import TableContainer from "../../../html/Table/Table.js";
import DocumentScrollEvent from "../../../core/Event/DocumentScrollEvent.js";
import ListServiceRequest from "../../Service/ListServiceRequest.js";
import EditMenuIcon from "../../Com/Menu/Icon/EditMenuIcon.js";
import DeleteMenuIcon from "../../Com/Menu/Icon/DeleteMenuIcon.js";
import ViewMenuIcon from "../../Com/Menu/Icon/ViewMenuIcon.js";
import BootstrapSpinner from "../../Bootstrap/Spinner/BootstrapSpinner.js";


export default class ServiceDataTable extends TableContainer {

    service;

    //loadingDataRender
    loadingDefaultData = true;

    scrollMode = false;

    onDataRowClick = null;

    onViewClick = null;

    onEditClick = null;

    onDeleteClick = null;

    onLoaded = null;

    _table;
    _header;
    _tbody;
    _pagination;
    _service;
    _page = 0;
    _loader = null;
    _loading = false;
    _scrollToEnd = false;
    _autoReloadingEvent = null;

    constructor(parentContainer) {

        super(parentContainer);

        this._header = new TableHeader(this);
        this._tbody = new TableBodyContainer(this);

        this._service = new ListServiceRequest();

    }


    render() {

        let local = this;

        this.loadHeader();

        if (this.loadingDefaultData) {
            this.loadTable();
        }

        if (this.scrollMode) {
            let event = new DocumentScrollEvent();
            event.onEnd = function () {
                local.loadMoreData();
            };
        }

        if (this.onViewClick !== null) {
            this._header.addEmpty();
        }

        if (this.onEditClick !== null) {
            this._header.addEmpty();
        }

        if (this.onDeleteClick !== null) {
            this._header.addEmpty();
        }

    }


    loadHeader() {

        this.onHeader(this._header);

    }


    reloadHeader() {

        this._header.emptyContainer();
        this.loadHeader();

    }

    loadMoreData() {

        if (!this._scrollToEnd) {
            if (!this._loading) {
                this._loading = true;
                this._page++;
                this._loadTbodyData();
            }
        }

    }


    loadTable() {

        if (!this._loading) {
            this._loading = true;
            this._scrollToEnd = false;
            this._loadTbodyData();
        }

        return this;

    }


    reloadData() {

        if (!this._loading) {
            this._loading = true;
            this.emptyData();
            this._loadTbodyData();
        }

        return this;

    }


    set autoReloading(value) {

        let local = this;

        (new DocumentScrollEvent()).removeScrollEvent();

        if (value) {

            (new DocumentScrollEvent())
                .onScrollEnd = function () {
                local.loadMoreData();
            };

        }

    }


    emptyData() {

        this._tbody.emptyContainer();
        this._page = 0;
        return this;

    }


    _loadTbodyData() {

        let local = this;

        let loader = new BootstrapSpinner(this);  // new LoaderContainer(this);

        this._service.service = this.service;
        this._service.page = this._page;
        this._service.onLoaded = function () {
            (new MouseCursor()).setDefault();
        };

        this._service.onDataRow = function (dataRow) {

            let tableRow = new TableRow(local._tbody);
            local.onRow(tableRow, dataRow);

            tableRow.onMouseEnter = function () {
                //tableRow.backgroundColor = ColorStyle.LIGHT_GREY;
            };

            tableRow.onMouseLeave = function () {
                //tableRow.backgroundColor = "";
            };

            if (local.onDataRowClick !== null) {
                tableRow.onMouseEnter = function () {
                    tableRow.cursor = CursorStyle.POINTER;
                    //tableRow.backgroundColor = ColorStyle.LIGHT_GREY;
                };

                tableRow.onMouseLeave = function () {
                    tableRow.backgroundColor = "";
                };

                tableRow.onClick = function () {
                    local.onDataRowClick(dataRow);
                };

            }


            if (local.onViewClick !== null) {
                let icon = new ViewMenuIcon(tableRow);
                icon.onClick = function () {
                    local.onViewClick(dataRow);
                };
                icon.render();
            }

            if (local.onEditClick !== null) {
                let editIcon = new EditMenuIcon(tableRow);
                editIcon.onClick = function () {
                    local.onEditClick(dataRow);
                }
            }

            if (local.onDeleteClick !== null) {
                let deleteIcon = new DeleteMenuIcon(tableRow);
                //deleteIcon.role
                deleteIcon.onClick = function () {
                    local.onDeleteClick(dataRow);
                    tableRow.removeContainer();

                }
            }
        }


        this._service.onFinished = function () {

            if (local.onLoaded !== null) {
                local.onLoaded();
            }

            if (local._service.getCount() === 0) {
                local._scrollToEnd = true;
            }

            local._loading = false;
            loader.removeContainer();
        }

        this._service.sendRequest();

    }


    onHeader(header) {

    }


    // onDataRow
    onRow(tableRow, dataRow) {

    }


    addParameter(name, value) {
        this._service.addParameter(name, value);
    }

    clearParameter() {
        this._service.clearParameter();
    }


    set paginationLimit(value) {
        this._service.paginationLimit = value;
    }

    // sortingField
    set sorting(value) {
        this.addParameter("sorting", value);
    }

    set sortingOrder(value) {
        this.addParameter("order", value);
    }


}