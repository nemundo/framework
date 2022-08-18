import ButtonContainer from "../../../html/Form/Button.js";

export default class BootstrapButton extends ButtonContainer {

    constructor(parentContainer) {

        super(parentContainer);

        this.addCssClass("btn");
        this.addCssClass("btn-primary");

    }

}