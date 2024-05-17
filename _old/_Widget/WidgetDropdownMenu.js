import DivContainer from "../../html/Content/Div.js";
import AdminDropdown from "../../package/framework/js/Dropdown/AdminDropdown.js";
import BodyContainer from "../../html/Document/Body.js";
import PositionStyle from "../../html/Style/Position.js";
import ColorStyle from "../../html/Style/Color.js";

export default class WidgetDropdownMenu extends DivContainer {


    _dropdown;

    _widgetTmp = null;

    constructor(parentContainer) {

        super(parentContainer);
        this._dropdown = new AdminDropdown(this);
        this._dropdown.icon = "plus";

    }


    addWidget(widget) {

        let local = this;

        this._dropdown.addItem(new widget().widgetTitle, function () {

            if (local._widgetTmp !== null) {
                local._widgetTmp.removeContainer();
            }

            let body = new BodyContainer();
            //body.backgroundColor = ColorStyle.LIGHT_GREY;

            local._widgetTmp = new widget(body);
            local._widgetTmp.closeButton = true;
            local._widgetTmp.position = PositionStyle.FIXED;
            local._widgetTmp.right = 0;
            local._widgetTmp.top = 0;
            /*local._widgetTmp.bottom = "100px";*/
            local._widgetTmp.widthPixel = 400;
            local._widgetTmp.heightPercent = 80;

            local._widgetTmp.render();

            local._widgetTmp.onClose= function () {
                body.backgroundColor = "";
            }

        });

    }

}