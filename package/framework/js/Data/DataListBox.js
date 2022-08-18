import ListBox from "../ListBox.js";
import ServiceRequest from "../Service/ServiceRequest.js";
import MouseCursor from "../../core/Mouse/MouseCursor.js";
import AdminLoader from "../Admin/Loader/AdminLoader.js";


export default class DataListBox extends ListBox {

    service = null;

    loadingByDefault = true;

    onLoaded = null;

    _serviceRequest = null;

    constructor(parentContainer) {

        super(parentContainer);
        this._serviceRequest = new ServiceRequest();

    }


    render() {

        if (this.loadingByDefault) {
            this.loadData();
        }

    }


    loadData() {

        let local = this;

        let loader = new AdminLoader(this);

        this._serviceRequest.service = this.service;
        this._serviceRequest.sendRequest();

        (new MouseCursor()).setWait();

        this._serviceRequest.onFinished = function () {

            loader.removeContainer();

            if (local.onLoaded !== null) {
                local.onLoaded();
            }

            (new MouseCursor()).setDefault();

        };

        this._serviceRequest.onDataRow = function (dataRow) {
            local.onDataRow(dataRow);
        };

    }


    reloadData() {

        this.clearItem();
        this.value = "";

        if (this._defaultEmptyItem) {
            this._select.addItem("", "");
        }

        this.loadData();

    }


    addParameter(name, value) {

        this._serviceRequest.addParameter(name, value);

    }


    addOption(option) {
        this._select.addContainer(option);
        return this;
    }


    onDataRow(dataRow) {

    }


    clearValue() {
        this.value = "";
        this.reloadData();
    }


    hasValue() {

        let hasValue = false;
        if (this.value !== "") {
            hasValue = true;
        }
        return hasValue;

    }


}