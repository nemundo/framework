import ButtonContainer from "../../../html/Form/Button.js";

export default class AdminSubmitButton extends ButtonContainer {

    constructor(parentContainer) {

        super(parentContainer);

        this.type = "submit";
        this.addCssClass("admin-button");

    }

}