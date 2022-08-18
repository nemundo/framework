import DivContainer from "../../../html/Content/Div.js";
import FlexDirection from "../../../html/Style/Flex/FlexDirection.js";
import DisplayStyle from "../../../html/Style/Display.js";

export default class MenuContainer extends DivContainer {

    iconColor;

    mobileView = false;

    showLabel = true;

    _showMenu = false;

    _menuContainer;


    constructor(parentContainer) {

        super(parentContainer);

        let local = this;
        //this.backgroundColor = ColorStyle.LIGHT_GREY;

        this._menuContainer = new DivContainer();

    }


    addMenuIcon(menuIcon) {

        menuIcon.color = this.iconColor;
        menuIcon.fontSizePixel = 20;
        menuIcon.paddingPixel = 10;
        menuIcon.display = DisplayStyle.BLOCK;
        //menuIcon.display = DisplayStyle.INLINE;
        menuIcon.showLabel = this.showLabel;
        menuIcon.render();

        //this.addContainer(menuIcon);
        this._menuContainer.addContainer(menuIcon);

        return this;

    }


    showMenu() {

        this._showMenu = true;
        this._menuContainer.visible = true;
        return this;

    }


    hideMenu() {

        this._showMenu = false;

        this._menuContainer.visible = false;
        return this;

    }


    set vertical(value) {

        this.flexDirection = FlexDirection.COLUMN;

    }

}
