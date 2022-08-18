import FontAwesomeIcon from "./FontAwesomeIcon.js";


export default class IconButton extends FontAwesomeIcon {

    constructor(parentContainer = null) {

        super(parentContainer);
        this.addCssClass("icon-button");


    }


}