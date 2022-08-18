import BackMenuIcon from "../Menu/Icon/ArrowLeftMenuIcon.js";
import ColorStyle from "../../../html/Style/Color.js";
import RowFlexLayout from "../Layout/RowFlexLayout.js";
import PositionStyle from "../../../html/Style/Position.js";
import H3Container from "../../../html/Title/H3.js";
import BootstrapIcon from "../../Package/BootstrapIcon/BootstrapIcon.js";
import MenuConfig from "../Menu/MenuConfig.js";


// AppBar
export default class StatusBar extends RowFlexLayout {

    _backIcon;

    _appIcon;

    _statusTitle;

    constructor(parentContainer) {

        super(parentContainer);

        this.position = PositionStyle.STICKY;
        this.top = 0;
        this.paddingPixel

        this.backgroundColor = ColorStyle.LIGHT_GREY;
        this.widthPercent = 100;

        this._backIcon = new BackMenuIcon(this);


        this._appIcon = new BootstrapIcon(this);
        this._appIcon.fontSizePixel = MenuConfig.iconSize;

        this._statusTitle = new H3Container(this);  // new H1Container(this);


    }

    set appIcon(value) {
        this._appIcon.icon = value;
    }

    set onBackIconClick(value) {
        this._backIcon.onClick = value;
    }

    set statusTitle(value) {
        this._statusTitle.text = value;
    }

    set showBackButton(value) {
        this._backIcon.visible = value;
    }


}