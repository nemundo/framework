import DivContainer from "../../../html/Content/Div.js";
import AdminDropdown from "../../Dropdown/AdminDropdown.js";
import ColorStyle from "../../../html/Style/Color.js";
import SpanContainer from "../../../html/Content/Span.js";
import BorderStyle from "../../../html/Style/Border/BorderStyle.js";
import FullscreenMenuIcon from "../../Com/Menu/Icon/FullscreenMenuIcon.js";
import ColumnFlexLayout from "../../Com/Layout/ColumnFlexLayout.js";
import RowFlexLayout from "../../Com/Layout/RowFlexLayout.js";
import CloseMenuIcon from "../../Com/Menu/Icon/CloseMenuIcon.js";
import PositionStyle from "../../../html/Style/Position.js";
import BackMenuIcon from "../Menu/Icon/ArrowLeftMenuIcon.js";
import OverflowStyle from "../../../html/Style/Overflow.js";
import BodyContainer from "../../../html/Document/Body.js";
import BootstrapIcon from "../../Package/BootstrapIcon/BootstrapIcon.js";
import MenuConfig from "../Menu/MenuConfig.js";
import H3Container from "../../../html/Title/H3.js";


export default class WidgetContainer extends ColumnFlexLayout {

    _header;

    _headerTitle;

    _headerIcon = null;

    _backIcon;

    _body;

    _dropdown = null;

    _closeButton = null;

    onOpen = null;

    //onClose = null;

    widgetIcon = null;

    _widgetRendred = false;

    constructor(parentContainer) {

        super(parentContainer);

        let local = this;

        this.showBorder = true;

        this._header = new RowFlexLayout();
        this._header.paddingPixel = 5;
        this._header.backgroundColor = "#F2F2F2";

        super.addContainer(this._header);

        this._backIcon = new BackMenuIcon(this._header);
        this._backIcon.onClick = function () {
            local.onClose();
        }

        this._headerTitle = new H3Container();  // new SpanContainer();
        this._header.addContainer(this._headerTitle);

        this._body = new DivContainer();
        this._body.heightPercent = 100;
        this._body.backgroundColor = ColorStyle.WHITE;
        //this._body.paddingPixel = 10;
        //this.spaceBetween = true;
        this.showPadding = true;

        super.addContainer(this._body);

    }


    set showIcon(value) {

        if (this._headerIcon !== null) {
            this._headerIcon.removeContainer();
        }

        this._headerIcon = new BootstrapIcon();
        this._headerIcon.icon =this.widgetIcon;  // value;
        this._headerIcon.fontSizePixel = MenuConfig.iconSize;
        this._header.addContainer(this._headerIcon);

    }

    /*get widgetIcon() {
        return this._headerIcon.icon;
    }*/


    set widgetTitle(value) {

        this._headerTitle.text = value;

    }

    get widgetTitle() {
        return this._headerTitle.text;
    }


    set showBorder(value) {

        if (value) {
            this.borderStyle = BorderStyle.SOLID;
            this.borderWidth = "1px";
            this.borderColor = ColorStyle.GREY;
        } else {
            this.borderStyle = "";
            this.borderWidth = "";
            this.borderColor = "";

        }

    }


    set showPadding(value) {

        if (value) {
            this._body.paddingPixel = 10;
        } else {
            this._body.paddingPixel = 0;
        }

    }


    set showBackButton(value) {

        this._backIcon.visible = value;

    }


    // showCloseButton
    set closeButton(value) {

        let local = this;

        if (value) {

            if (this._closeButton == null) {
                this._closeButton = new CloseMenuIcon(this._header);
                /*this._closeButton.icon = "x";
                this._closeButton.label = "Close";*/
                this._closeButton.showLabel = false;
                this._closeButton.onClick = function () {
                    local.closeWidget();
                };
            }

        } else {

            if (this._closeButton !== null) {
                this._closeButton.removeContainer();
                this._closeButton = null;
            }


        }

    }


    set fullscreen(value) {

        this.position = PositionStyle.FIXED;
        this.heightPercent = 100;
        this.widthPercent = 100;
        this.leftPixel = 0;
        this.topPixel = 0;

        this.showBorder = false;

    }


    /*set scrollContent(value) {

        this.boxSizing = BoxSizing.borderBox;

        this._body.overflowY = OverflowStyle.SCROLL;
        this._body.boxSizing = BoxSizing.borderBox;

    }*/


    emptyContent() {

        this._body.emptyContainer();
        return this;

    }


    addContainer(container) {

        this._body.addContainer(container);
        return this;

    }


    addActionMenu(label, event) {

        if (this._dropdown === null) {
            this._dropdown = new AdminDropdown(this._header);
            this._dropdown.icon = "chevron-down";
            this._dropdown.render();
        }

        this._dropdown.addItem(label, event);
        return this;

    }


    openWidget() {

        this.visible = true;
        this.fullscreen = true;

        if (!this._widgetRendred) {

            this._headerIcon = new BootstrapIcon();
            this._headerIcon.icon = this.widgetIcon;
            this._headerIcon.fontSizePixel = MenuConfig.iconSize;
            this._headerIcon.marginRight = "20px";

            this._header.addContainer(this._headerIcon);


            this.render();
        }

        this._widgetRendred = true;

        if (this.onOpen !== null) {
            this.onOpen();
        }

        let body = new BodyContainer();
        body.addContainer(this);

    }


   /* onOpen() {


    }*/



    onClose() {

        this.closeWidget();

    }



    closeWidget() {

        this.removeContainer();
        //this.visible = false;

        /*if (this.onClose !== null) {
            this.onClose();
        }*/

        return this;

    }


    set showFullscreenIcon(value) {

        let large = new FullscreenMenuIcon(this._header);
        large.attachTo = this;
        large.render();

    }


    set scrollWidget(value) {

        if (value) {
            this._body.overflow = OverflowStyle.AUTO;
        }

    }


    set onWidgetEndScroll(value) {

        this._body.overflow = OverflowStyle.AUTO;
        this._body.onEndScroll = value;

    }


}