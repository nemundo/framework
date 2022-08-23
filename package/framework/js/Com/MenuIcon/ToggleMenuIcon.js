import MenuIcon from "../../Menu/MenuIcon.js";

export default class ToggleMenuIcon extends MenuIcon {

    onActive = null;

    onInactive = null;

    onValueChange = null;

    _toggleValue = false;

    constructor(parentContainer = null) {

        super(parentContainer);

        let local = this;

        this.icon = "bag";

        this.onClick = function () {

            local.toggleValue = !local._toggleValue;

            if (local._toggleValue) {

                if (local.onActive !== null) {
                    local.onActive();
                }

            } else {

                if (local.onInactive !== null) {
                    local.onInactive();
                }

            }

            if (local.onValueChange !== null) {
                local.onValueChange(local._toggleValue);
            }

        };

    }


    set toggleValue(value) {

        this._toggleValue = value;

        if (this._toggleValue) {

            this.icon = "bag-check";

        } else {

            this.icon = "bag";

        }

    }

}