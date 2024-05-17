import DivContainer from "../../html/Content/Div.js";
import AdminDropdown from "../../package/framework/js/Dropdown/AdminDropdown.js";
import OverflowStyle from "../../html/Style/Overflow.js";
import ColorStyle from "../../html/Style/Color.js";
import SpanContainer from "../../html/Content/Span.js";
import DisplayStyle from "../../html/Style/Display.js";
import BorderStyle from "../../html/Style/Border/BorderStyle.js";
import MenuIcon from "../../package/framework/js/Menu/MenuIcon.js";
import FullscreenMenuIcon from "../../package/framework/js/Com/Menu/Icon/FullscreenMenuIcon.js";
import BootstrapIcon from "../../package/framework/js/Package/BootstrapIcon/BootstrapIcon.js";
import ColumnFlexLayout from "../../package/framework/js/Com/Layout/ColumnFlexLayout.js";
import RowFlexLayout from "../../package/framework/js/Com/Layout/RowFlexLayout.js";
import CloseMenuIcon from "../../package/framework/js/Com/Menu/Icon/CloseMenuIcon.js";
import MenuConfig from "../../package/framework/js/Com/Menu/MenuConfig.js";
import PositionStyle from "../../html/Style/Position.js";


export default class AdminWidget extends ColumnFlexLayout {   // DivContainer {

    _header;

    _headerTitle;

    _headerIcon = null;

    _body;

    _dropdown = null;

    _closeButton = null;

    onClose = null;

    //onWidgetEndScroll=null;


    constructor(parentContainer) {

        super(parentContainer);

        /*this.display = DisplayStyle.FLEX;
        this.flexDirection = FlexDirection.COLUMN;*/

        this.showBorder = true;

        /*this.borderStyle = BorderStyle.SOLID;
        this.borderWidth = "1px";
        this.borderColor = ColorStyle.GREY;*/

        this._header = new RowFlexLayout();   // new DivContainer();
//        this._header.position = PositionStyle.ABSOLUTE;
        this._header.paddingPixel = 10;
        //this._header.display = DisplayStyle.FLEX;
        this._header.backgroundColor = "#F2F2F2";

        super.addContainer(this._header);

        this._headerTitle = new SpanContainer();
        //this._headerTitle.widthPercent = 100;

        this._header.addContainer(this._headerTitle);

        /*let large=new FullscreenMenuIcon(this._header);
        large.attachTo=this;
        large.render();*/


        this._body = new DivContainer();
        this._body.heightPercent = 100;
        //this._body.overflowY = OverflowStyle.AUTO;
        this._body.backgroundColor = ColorStyle.WHITE;
        //this._body.paddingPixel = 10;
        this.spaceBetween=true;

        super.addContainer(this._body);

    }


    set widgetIcon(value) {

        if (this._headerIcon !== null) {
            this._headerIcon.removeContainer();
        }

        this._headerIcon = new BootstrapIcon();
        this._headerIcon.icon = value;
        this._headerIcon.fontSizePixel = MenuConfig.iconSize; // 20;
        this._headerIcon.marginRight = "20px";

        this._header.addContainer(this._headerIcon);

        //this._headerTitle.addBefore(this._headerIcon);

    }


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


    closeWidget() {

        this.removeContainer();

        if (this.onClose !== null) {
            this.onClose();
        }

        return this;

    }


    set spaceBetween(value) {

        if (value) {
        this._body.paddingPixel = 10;
        } else {
            this._body.paddingPixel = 0;
        }


    }



    set showFullscreenIcon(value) {

        let large = new FullscreenMenuIcon(this._header);
        large.attachTo = this;
        large.render();

    }


    set onWidgetEndScroll(value) {

        this._body.onEndScroll = value;

    }


}