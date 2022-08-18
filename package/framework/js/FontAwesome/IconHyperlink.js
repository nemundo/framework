import HyperlinkContainer from "../../html/Hyperlink/Hyperlink.js";
import FontAwesomeIcon from "./FontAwesomeIcon.js";


export default class IconHyperlink extends HyperlinkContainer {

    set icon(value) {

        let icon = new FontAwesomeIconContainer(this);
        icon.icon = value;

    }

}