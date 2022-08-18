import BootstrapListGroup from "./BootstrapListGroup.js";
import ListServiceRequest from "../../Service/ListServiceRequest.js";
import BootstrapSpinner from "../Spinner/BootstrapSpinner.js";
import MouseCursor from "../../../core/Mouse/MouseCursor.js";

export default class BootstrapDataListGroup extends BootstrapListGroup {

    serviceName;

    _service;

    constructor(parentContainer) {
        super(parentContainer);

        this._service = new ListServiceRequest();

    }


    render() {

        this._loadData();


    }


    reloadData() {

        this.emptyContainer();
        this._loadData();

    }


    _loadData() {

        let local = this;

        let loader = new BootstrapSpinner(this);

        this._service.service = this.serviceName;
        this._service.page = this._page;
        this._service.onLoaded = function () {
            (new MouseCursor()).setDefault();
        };

        this._service.onDataRow = function (dataRow) {

            local.onDataRow(dataRow);

        }


        this._service.onFinished = function () {

            loader.removeContainer();

        }

        this._service.sendRequest();

    }


    // onDataRow
    onDataRow(dataRow) {

    }


    addParameter(name, value) {
        this._serviceRequest.addParameter(name, value);
        return this;
    }



}