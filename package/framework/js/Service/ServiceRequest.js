import JsonRequest from "../../core/Web/JsonRequest.js";
import WebConfig from "../../html/Config/WebConfig.js";


export default class ServiceRequest extends JsonRequest {

    _serviceName = null;

    constructor(service = null) {

        super(WebConfig.webUrl + "public/service-request");

        if (service !== null) {
            this._service = service;
        }

    }


    set service(value) {

        this._service = value;

    }


    sendRequest() {

        this.addParameter("service", this._service);
        this.load();

    }


    // error handling


}