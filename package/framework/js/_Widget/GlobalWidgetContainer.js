import _WidgetContainer from "./Container/WidgetContainer.js";

export default class GlobalWidgetContainer extends _WidgetContainer {

    static _widgetContainer = null;

    constructor(parentContainer) {

        super(parentContainer);
        GlobalWidgetContainer._widgetContainer = this;

    }


    static addContainer(container) {

        GlobalWidgetContainer._widgetContainer.addContainer(container);
        return this;

    }


    static addWidget(widget) {

        GlobalWidgetContainer._widgetContainer.addWidget(widget);
        return this;

    }


    static clearWidget() {

        GlobalWidgetContainer._widgetContainer.clearWidget();
        return this;

    }

}