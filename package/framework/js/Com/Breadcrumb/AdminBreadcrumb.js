import UlContainer from "../../../html/Listing/UlContainer.js";

export default class AdminBreadcrumb extends UlContainer {

    constructor(parentContainer) {
        super(parentContainer);
        this.addCssClass("breadcrumb");
    }

}