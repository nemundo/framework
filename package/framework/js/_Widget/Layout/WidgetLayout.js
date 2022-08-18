import DivContainer from "../../../html/Content/Div.js";

export default class WidgetLayout extends DivContainer {


    // column
    // save as dashboard
    // only one

    //static _widgetContainer = null;


    // remove all


    constructor(parentContainer) {

        super(parentContainer);

        //WidgetContainer._widgetContainer = this;

        /*this.position = PositionStyle.FIXED;
        this.top = 0;
        this.left = 0;
        this.widthPercent = 100;  // 50;
        this.heightPercent = 100;
        this.pointerEvent=PointerEventStyle.NONE;
        this.display=DisplayStyle.FLEX;
        this.flexDirection=FlexDirection.ROW;*/


    }


    addWidget(widget) {

        widget.closeButton = true;
        widget.widthPercent = 30;
        widget.render();

        this.addContainer(widget);

        return this;

    }


    clearWidget() {
        this.emptyContainer();
    }


}