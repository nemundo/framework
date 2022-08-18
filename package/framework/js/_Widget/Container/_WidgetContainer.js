import DivContainer from "../../../html/Content/Div.js";
import PositionStyle from "../../../html/Style/Position.js";
import PointerEventStyle from "../../../html/Style/Mouse/PointerEventStyle.js";
import DisplayStyle from "../../../html/Style/Display.js";
import FlexDirection from "../../../html/Style/Flex/FlexDirection.js";

export default class _WidgetContainer extends DivContainer {

    emptyContainerOnAddWidget = false;

    defaultWidgetWidthPixel = null;

    defaultWidgetWidthPercent = null;


    constructor(parentContainer) {

        super(parentContainer);

        this.position = PositionStyle.FIXED;
        this.top = 0;
        this.left = 0;
        this.widthPercent = 100;
        this.heightPercent = 100;
        this.pointerEvent = PointerEventStyle.NONE;
        this.display = DisplayStyle.FLEX;
        this.flexDirection = FlexDirection.COLUMN;
        this.flexWrap = true;

    }


    addWidget(widget) {

        if (this.emptyContainerOnAddWidget) {
            this.clearWidget();
        }

        widget.closeButton = true;
        widget.pointerEvent = PointerEventStyle.AUTO;
        widget.marginPixel = 10;
        widget.widthPixel = this.defaultWidgetWidthPixel;
        widget.widthPercent = this.defaultWidgetWidthPercent;
        widget.resizeable = true;
        widget.render();

        this.addContainer(widget);

        return this;

    }


    clearWidget() {

        this.emptyContainer();

    }

}