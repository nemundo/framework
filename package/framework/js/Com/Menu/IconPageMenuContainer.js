import MenuContainer from "./MenuContainer.js";
import MenuIcon from "../../Menu/MenuIcon.js";
import DisplayStyle from "../../../html/Style/Display.js";

export default class IconPageMenuContainer extends MenuContainer {

    //showLabel = true;

    onIconClick = null;

    addPage(page) {

        let local = this;
        let rendered = false;

        let menuIcon = new MenuIcon();
        menuIcon.showLabel = this.showLabel;
        //menuIcon.showIcon = false;

        menuIcon.label = page.pageTitle;
        menuIcon.icon = page.pageIcon;

        menuIcon.display = DisplayStyle.BLOCK;
        menuIcon.widthPixel = 250;

        menuIcon.onClick = function () {

            //local.hideMenu();

            if (!rendered) {
                page.render();
                rendered = true;
            }

            if (local.onIconClick !== null) {
                local.onIconClick(page);
            }

        }

        menuIcon.render();

        this.addMenuIcon(menuIcon);

        return this;

    }


    addMenuIcon(menuIcon) {

        //menuIcon.showLabel = this.showLabel;
        menuIcon.display = DisplayStyle.BLOCK;
        menuIcon.widthPixel = 250;

        return super.addMenuIcon(menuIcon);

    }

}