import WebConfig from "../../html/Config/WebConfig.js";
import UrlBuilder from "../../core/Url/UrlBuilder.js";

export default class ServiceUrl {

    _service;

    constructor(service) {

        this._service = service;

    }


    getUrl() {


        let url = new UrlBuilder(WebConfig.webUrl + "service-request");
        url.addParameter("service", this._service);

        /*let url = WebConfig.webUrl + "service-request";

        this.addParameter("service",this._service);*/

        return url.getUrl();

    }


}