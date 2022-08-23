import IconTextBox from "../Icon/IconTextBox.js";
import RandomNumber from "../../../core/Random/RandomNumber.js";

export default class CopyTextBox extends IconTextBox {

    constructor(parentContainer) {

        super(parentContainer);

        //let local = this;

        let id = "copy_item_" + (new RandomNumber()).getNumber();

        this._input.id = id;

        this.icon = "pencil";
        this.onIconClick = function () {

            //(new Debug()).write("on click= " + local.value);

            let copyText = document.getElementById(id);
            copyText.select();
            document.execCommand("copy");
            return false;

        }

    }

}