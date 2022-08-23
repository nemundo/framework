import DivContainer from "../../../html/Content/Div.js";
import ColorStyle from "../../../html/Style/Color.js";
import CursorStyle from "../../../html/Style/Cursor.js";

export default class WordDiv extends DivContainer {

    onActive;

    wordId;

    constructor(parentContainer) {

        super(parentContainer);

        let local= this;

        this.paddingPixel = 10;
        this.cursor = CursorStyle.POINTER;

        this.onMouseEnter = function () {
            local.backgroundColor = ColorStyle.LIGHT_GREY;
            local.onActive(local.wordId);
        };

        this.onMouseLeave = function () {
            local.backgroundColor = "";
        };

    }

}