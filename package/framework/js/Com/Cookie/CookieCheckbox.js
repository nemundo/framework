import AdminCheckbox from "../../Form/AdminCheckbox.js";
import CookieReader from "../../../core/Cookie/CookieReader.js";

export default class CookieCheckbox extends AdminCheckbox {

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