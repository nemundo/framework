import ButtonContainer from "../../../html/Form/Button.js";

export default class AdminButton extends ButtonContainer {

    constructor(parentContainer) {

        super(parentContainer);

        this.addCssClass("admin-button");

        /*
        this.backgroundColor = ColorStyle.LIGHT_GREY;
        this.fontWeight = FontWeight.BOLD;
        this.paddingPixel = 10;
        this.borderRadiusPixel = 5;
        this.widthPixel = 150;
        this.cursor = CursorStyle.POINTER;*/

    }

}