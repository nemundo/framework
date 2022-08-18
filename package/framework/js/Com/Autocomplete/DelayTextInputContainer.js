import WordDelay from "./WordDelay.js";
import TextInputContainer from "../../../html/Form/TextInput.js";


export default class DelayTextInputContainer extends TextInputContainer {

    onValueChange = null;

    constructor(parentContainer) {

        super(parentContainer);

        let requestNumber = 0;

        let local = this;

        this.onKeyUp = function (event) {

            requestNumber++;

            let delay = new WordDelay();
            delay.delay = 200;
            delay.requestNumber = requestNumber;
            delay.onDelay = function () {

                if (delay.requestNumber === requestNumber) {
                    local.onValueChange();
                }

            }

        }

    }

}
