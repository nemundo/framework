import MenuIcon from "../../../Menu/MenuIcon.js";
import RowFlexLayout from "../../Layout/RowFlexLayout.js";
import ColumnFlexLayout from "../../Layout/ColumnFlexLayout.js";


export default class IconWidgetMenu extends ColumnFlexLayout {

    showLabel = true;

    onWidgetClick=null;

    constructor(parentContainer) {

        super(parentContainer);
        //this.flexWrap = true;

    }


    addWidget(widget) {

        let local=this;

        let menuIcon = new MenuIcon(this);
        menuIcon.label = widget.widgetTitle;
        menuIcon.icon = widget.widgetIcon;
        menuIcon.showLabel = this.showLabel;
        menuIcon.onClick = function () {

            if (local.onWidgetClick!==null) {
                local.onWidgetClick(widget);
            }

            /*widget.fullscreen = true;
            widget.openWidget();*/

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