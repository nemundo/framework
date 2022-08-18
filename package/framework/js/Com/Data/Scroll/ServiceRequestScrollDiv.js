import ReloadScrollDivContainer from "../../Scroll/ReloadScrollDiv.js";
import ServiceRequest from "../../../Service/ServiceRequest.js";
import ListServiceRequest from "../../../Service/ListServiceRequest.js";
import Debug from "../../../../core/Debug/Debug.js";
import DocumentScrollEvent from "../../../../core/Event/DocumentScrollEvent.js";


export default class ServiceRequestScrollDiv extends ReloadScrollDivContainer {

    // serviceName
    service;

    paginationLimit = 10;

    _serviceRequest;

    _loading = false;

    _scrollToEnd = false;


    constructor(parentContainer) {

        super(parentContainer);
        this._serviceRequest = new ListServiceRequest();

    }


    render() {

        let local = this;

        /*this.onEndScroll = function () {
            local.loadData();
        };*/

        this.loadData();

    }


    loadData() {

        if (!this._loading) {
            this._loadScrollData();
        }

    }


    _loadScrollData() {

        this._loading = true;

        let local = this;

        this.enableLoader();

        this._serviceRequest.service = this.service;
        this._serviceRequest.addParameter("page", this._page);
        this._serviceRequest.addParameter("pagination-limit", this.paginationLimit);
        this._serviceRequest.onDataRow = function (dataRow) {
            local.onDataRow(dataRow);
        };
        this._serviceRequest.onFinished = function () {
            local.disableLoader();
            local._loading = false;

            if (local._serviceRequest.getCount() === 0) {
                local._scrollToEnd = true;
            }

        };

        this._serviceRequest.sendRequest();

    }


    loadMoreData() {

        if (!this._scrollToEnd) {
            if (!this._loading) {

                this._loading = true;
                this._page++;

                this._loadScrollData();
            }
        }

        return this;

    }


    reloadData() {

        let local = this;

        if (!this._loading) {
            this.emptyData();
            this.cleanData();
            this.loadData();
        }

        return this;

    }


    emptyData() {

        this.emptyContainer();
        return this;

    }


    addParameter(name, value) {
        this._serviceRequest.addParameter(name, value);
        return this;
    }


    set serviceRequest(value) {
        this._serviceRequest.service = value;
    }



    set autoReloading(value) {

        let local = this;

        (new DocumentScrollEvent()).removeScrollEvent();

        if (value) {

            (new DocumentScrollEvent())
                .onScrollEnd = function () {
                (new Debug()).write("load more data");
                local.loadMoreData();
            };

        }

    }





    onDataRow(dataRow) {

    }


}