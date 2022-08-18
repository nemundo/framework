import ServiceRequest from "../../Service/ServiceRequest.js";

export default class WordService extends ServiceRequest {

    requestNumber;

    set word(value) {
        this.addParameter("word", value);
    }

}

