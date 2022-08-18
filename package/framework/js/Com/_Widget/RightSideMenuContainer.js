import RowFlexLayout from "../Layout/RowFlexLayout.js";
import IconWidgetContainer from "./IconWidgetContainer.js";
import MenuIcon from "../../Menu/MenuIcon.js";

export default class RightSideMenuContainer extends RowFlexLayout {

    _showDropdown = false;

    _menu;

    _dropdownIcon;

    constructor(parentContainer) {

        super(parentContainer);

        this._menu = new IconWidgetContainer(this);
        this._dropdownIcon = new MenuIcon(this);


    }


    addMenuIcon(menuIcon) {

        this._menu.addMenuIcon(menuIcon);
        return this;

    }


    set dropdownLabel(value) {

        this._dropdownIcon.label = value;

    }


    set dropdownIcon(value) {

        this._dropdownIcon.icon = value;

    }


    render() {

        let local = this;

        //this.paddingPixel = 10;

        this._menu.visible = false;
        this._menu.render();

        this._dropdownIcon.showLabel =true;  // = false;
        this._dropdownIcon.onClick = function () {

            if (local._showDropdown) {
                local._menu.visible = false;
                local._showDropdown = false;
            } else {
                local._menu.visible = true;
                local._showDropdown = true;
            }

        };

        this.onMouseLeave = function () {
            local._menu.visible = false;
            local._showDropdown = false;
        };

        this._dropdownIcon.render();

    }

}
