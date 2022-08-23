import MenuIcon from "../../Menu/MenuIcon.js";
import RowFlexLayout from "../Layout/RowFlexLayout.js";


export default class IconWidgetContainer extends RowFlexLayout {

    showLabel = true;

    constructor(parentContainer) {

        super(parentContainer);
        this.flexWrap = true;

    }


    addWidget(widget) {

        let menuIcon = new MenuIcon(this);
        menuIcon.label = widget.widgetTitle;
        menuIcon.icon = widget.widgetIcon;
        menuIcon.showLabel = this.showLabel;
        menuIcon.onClick = function () {

            widget.fullscreen = true;
            widget.openWidget();

        };
        menuIcon.render();

        return this;

    }


    addMenuIcon(menuIcon) {

        menuIcon.showLabel = this.showLabel;
        this.addContainer(menuIcon);

        return this;


    }


}