import MenuContainer from "./MenuContainer.js";
import ColorStyle from "../../../html/Style/Color.js";
import MenuIcon from "../../Menu/MenuIcon.js";
import DisplayStyle from "../../../html/Style/Display.js";

export default class RightSideDropdownMenuContainer extends MenuContainer {

    _dropdownIcon;

    _showDropdown = false;

    constructor(parentContainer) {

        super(parentContainer);


        this.addContainer(this._menuContainer);

        this._dropdownIcon = new MenuIcon(this);
        this._dropdownIcon.fontSizePixel = 20;
        this._dropdownIcon.paddingPixel = 10;
        //this._dropdownIcon.display = DisplayStyle.BLOCK;
        //this._dropdownIcon.display = DisplayStyle.INLINE;
        this._dropdownIcon.showLabel = false;  // this.showLabel;
        //this._dropdownIcon.backgroundColor = ColorStyle.DARK_GREY;



        this.hideMenu();

        let local = this;

        this._dropdownIcon.onClick = function () {

            if (local._showDropdown) {
                local.hideMenu();
                local._showDropdown = false;
            } else {
                local.showMenu();
                local._showDropdown = true;
            }

        };


        this._dropdownIcon.onMouseEnter = function () {

            if (local._showDropdown) {
                local.hideMenu();
                local._showDropdown = false;
            } else {
                local.showMenu();
                local._showDropdown = true;
            }

        };


        this.onMouseLeave=function () {

            local.hideMenu();
            local._showDropdown = false;

        };

    }


    set dropdownLabel(value) {

        this._dropdownIcon.label = value;

    }


    set dropdownIcon(value) {

        this._dropdownIcon.icon = value;

    }


}