import WidgetContainer from "./Widget.js";
import DivContainer from "../../../html/Content/Div.js";
import ColorStyle from "../../../html/Style/Color.js";

export default class ViewWidgetContainer extends WidgetContainer {

    viewList = [];

    titleList = [];

    startViewId;

    CLOSE_WIDGET = 0;

    HOME_VIEW = 9999;

    currentViewId = 0;

    // previousViewId
    _previousViewStatus = 0;


    constructor(parentContainer) {

        super(parentContainer);

        this.setPreviousViewStatus(this.CLOSE_WIDGET);
        this.backgroundColor=ColorStyle.RED;

    }



    addView(viewId) {

        this.viewList[viewId] = new DivContainer(this);
        this.viewList[viewId].widthPercent = 100;
        this.viewList[viewId].heightPercent = 100;

        return this;

    }


    addTitle(viewId, title) {

        this.titleList[viewId] = title;
        return this;

    }


    showView(viewId, emptyContainer = false) {

        if (viewId === this.HOME_VIEW) {
            this.setPreviousViewStatus(this.CLOSE_WIDGET);
        }

        this.currentViewId = viewId;

        for (let view of this.viewList) {
            if (view !== undefined) {
                view.visible = false;
            }
        }

        if (emptyContainer) {
            this.viewList[viewId].emptyContainer();
        }


        this.viewList[viewId].visible = true;

        if (this.titleList[viewId] !== undefined) {
            this.widgetTitle = this.titleList[viewId];
        }

        return this.viewList[viewId];

    }


    setPreviousViewStatus(value) {

        this._previousViewStatus = value;

    }


    addHomeView() {
        this.addView(this.HOME_VIEW);
    }

    addHomeTitle(title) {
        this.addTitle(this.HOME_VIEW,title);
    }


    showHomeView() {
        this.setPreviousViewStatus(this.CLOSE_WIDGET);
        return this.showView(this.HOME_VIEW);
    }


    getViewStatus() {

        return this.currentViewId;

    }


    onClose() {

        this.checkClosingClick();

    }


    checkClosingClick() {

        if (this._previousViewStatus === this.CLOSE_WIDGET) {
            this.closeWidget();
        } else {
            this.showView(this._previousViewStatus);
        }

    }


}