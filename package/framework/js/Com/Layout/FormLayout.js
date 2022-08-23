import RowFlexLayout from "./RowFlexLayout.js";

export default class FormLayout extends RowFlexLayout {


    constructor(parentContainer) {

        super(parentContainer);

        this.paddingPixel = 10;
        this.gapPixel = 10;

    }

}