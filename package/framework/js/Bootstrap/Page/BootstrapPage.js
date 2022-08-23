import PageContainer from "../../Page/PageContainer.js";

export default class BootstrapPage extends PageContainer {

    constructor(parentContainer) {

        super(parentContainer);
        this.addCssClass("container-fluid");

    }

}