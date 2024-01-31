import Checkbox from "../../Form/Checkbox.js";
import CookieReader from "../../../core/Cookie/CookieReader.js";

export default class CookieCheckbox extends Checkbox {

    set cookieName(cookieName) {

        let local = this;

        let cookieReader = new CookieReader();
        if (cookieReader.getValue(cookieName) === "true") {
            this.value = true;
        }

        this.onChange = function () {
            cookieReader.setValue(cookieName, local.value);
        };

    }

}