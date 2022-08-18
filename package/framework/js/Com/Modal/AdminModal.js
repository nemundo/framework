import BodyContainer from "../../../html/Document/Body.js";
import AdminWidget from "../Widget/AdminWidget.js";
import DarkBackground from "./../../Information/DarkBackground.js";
import PositionStyle from "../../../html/Style/Position.js";
import Debug from "../../../core/Debug/Debug.js";
import FullscreenMenuIcon from "./../../Com/Menu/Icon/FullscreenMenuIcon.js";


export default class AdminModal {

    onClose = null;

    modalTitle = null;

    fullPage = false;

    _background;

    _widget;


    constructor() {

        let body = new BodyContainer();
        this._widget = new AdminWidget(body);
        this._widget.widgetTitle = "[no title]";

    }


    show(container) {

        let local = this;

        let body = new BodyContainer();

        this._background = new DarkBackground(body);
        this._background.onBackgroundClick=function () {
            local.close();
        };
        this._background.render();


        this._widget.position = PositionStyle.FIXED;

        if (this.fullPage) {

            this._widget.top = "0";
            this._widget.left = "0";

        } else {

            this._widget.top = "50%";
            this._widget.left = "50%";
            this._widget.transform = "translate(-50%, -50%)";
        }

        this._widget.zIndex = 800;

        if (this.modalTitle !== null) {
            this._widget.widgetTitle = this.modalTitle;
        }


        this._widget.heightMaxPercent = 90;

        this._widget.closeButton = true;
        this._widget.addContainer(container);
        this._widget.onClose = function () {
            local.close();
        };


        container.afterSubmit = function () {

            local.close();

            if (local.onClose !== null) {
                local.onClose();
            }

        };

    }


    // closeWidget
    close() {

        this._background.removeContainer();
        this._widget.removeContainer();

    }


    set modalTitle(value) {

        this._widget.widgetTitle = value;

    }


    set showFullscreenIcon(value) {

        this._widget.showFullscreenIcon= value;

    }


}
