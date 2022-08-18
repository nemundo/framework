import DivContainer from "../../../html/Content/Div.js";
import AdminButton from "../../../framework/AdminButton.js";
import FontAwesomeIconContainer from "../../FontAwesome/Icon.js";
import BootstrapIcon from "../../Package/BootstrapIcon/BootstrapIcon.js";
import MenuIcon from "../../Menu/MenuIcon.js";


export default class ToggleButton extends DivContainer {

    buttonLabel = "Add";

    _hideToggle = true;

    _toggleDiv;

    onShow = null;

    icon;


    constructor(parentContainer) {

        super(parentContainer);

        this._toggleDiv = new DivContainer();

    }


    render() {

        let local = this;

        let add = new MenuIcon(this);  // new BootstrapIcon(this);  // IconContainer(this);  // new AdminButton(this);
        add.icon =this.icon;  // "plus";
        /*add.heightPixel = 40;
        add.widthPixel = 200;*/
        add.label = this.buttonLabel;
        add.onClick = function () {

            local._toggleDiv.emptyContainer();

            if (local._hideToggle) {

                local._hideToggle = false;
                local.onShow();

            } else {

                local._hideToggle = true;
                local._toggleDiv.emptyContainer();

            }

        }

        this.addContainer(this._toggleDiv);

    }

}