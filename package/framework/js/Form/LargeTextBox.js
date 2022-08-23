import LabelContainer from "../../html/Form/Label.js";
import AdminInput from "./AdminInput.js";
import TextareaContainer from "../../html/Form/Textarea.js";
import BoxSizing from "../../html/Style/BoxSizing.js";
import DisplayStyle from "../../html/Style/Display.js";
import FontSize from "../../html/Style/Font/FontSize.js";

export default class LargeTextBox extends AdminInput {

    constructor(parentContainer) {

        super(parentContainer);

        this._label = new LabelContainer(this);

        this._input = new TextareaContainer(this);
        this._input.rows = 5;
        this._input.resizeable = false;
        /*this._input.widthPercent = 100;
        this._input.boxSizing = BoxSizing.BORDER_BOX;
        this._input.display = DisplayStyle.INLINE_BLOCK;
        this._input.fontSize = FontSize.LARGE;
        this._input.border = "1px solid #ccc";

        this._input.paddingPixel = 10;
        this._input.borderRadiusPixel = 10;*/

    }

}