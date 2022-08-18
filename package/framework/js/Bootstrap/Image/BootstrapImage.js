import ImageContainer from "../../../html/Image/Image.js";

export default class BootstrapImage extends ImageContainer {

    constructor(parentContainer) {
        super(parentContainer);
        this.addCssClass("img-fluid");
    }


    set roundedCorner(value) {

        let className = "rounded";

        if (value) {
            this.addCssClass(className);
        } else {
            this.removeCssClass(className);
        }

    }

}