import ServiceRequest from "./ServiceRequest.js";

// SearchServiceRequest
export default class ListServiceRequest extends ServiceRequest {

    set paginationLimit(value) {
        this.addParameter("pagination-limit", value);
    }

    set page(value) {
        this.addParameter("page", value);
    }

    set order(value) {
        this.addParameter("order", value);
    }

    set orderField(value) {
        this.addParameter("order-field", value);
    }

}