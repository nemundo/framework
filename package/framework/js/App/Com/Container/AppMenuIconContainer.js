import MenuIcon from "../../../Menu/MenuIcon.js";
import RowFlexLayout from "../../../Com/Layout/RowFlexLayout.js";
import ColorStyle from "../../../../html/Style/Color.js";
import PositionStyle from "../../../../html/Style/Position.js";
import Debug from "../../../../core/Debug/Debug.js";
import ColumnFlexLayout from "../../../Com/Layout/ColumnFlexLayout.js";

export default class AppMenuIconContainer extends RowFlexLayout {

    appContainer = null;

    onOpen = null;

    onClose = null;


    constructor(parentContainer) {

        super(parentContainer);
        this.flexWrap = true;
        this.gapPixel = 30;

        this.position = PositionStyle.FIXED;
        this.widthPixel = 500;
        this.leftPercent = 50;
        this.topPercent = 50;
        this.transform = "translate(-50%, -50%)";

        /*this.widthPixel = 500;*/
        //this.backgroundColor = ColorStyle.LIGHT_GREY;

    }


    addApp(app) {

        let local = this;

        let menuIcon = new MenuIcon(this);
        menuIcon.label = app.app;
        menuIcon.icon = app.appIcon;
        //menuIcon.widthPixel=100;
        menuIcon.onClick = function () {

            if (local.onOpen !== null) {

                if (app.appContainer !== null) {
                    local.onOpen(app);
                } else {
                    (new Debug()).write("No onOpen");
                }

                if (app.appClick !== null) {
                    app.appClick();
                }


            }
        }
        menuIcon.render();

        return this;

    }


}