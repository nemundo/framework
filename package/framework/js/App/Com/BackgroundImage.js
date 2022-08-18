import ImageContainer from "../../../html/Image/Image.js";
import PositionStyle from "../../../html/Style/Position.js";
import AppConfig from "../AppConfig.js";
import VisibilityStyle from "../../../html/Style/Visibility.js";


export default class BackgroundImage extends ImageContainer {

    constructor(parentContainer) {

        super(parentContainer);

        if (AppConfig.backgroundImage !== null) {

            this.position = PositionStyle.FIXED;
            this.left = 0;
            this.top = 0;
            this.widthPercent = 100;
            this.heightPercent = 100;
            this.src = AppConfig.backgroundImage;

        } else {
            this.visibility = VisibilityStyle.HIDDEN;
        }

    }

}