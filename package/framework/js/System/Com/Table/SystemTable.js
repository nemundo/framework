import LabelValueAdminTable from "../../../Table/LabelValueAdminTable.js";
import BrowserInformation from "../../../../core/System/BrowserInformation.js";


export default class SystemTable extends LabelValueAdminTable {

    render() {

        this.caption = "System";

        this.addLabelValue("Domain", window.location.hostname);
        this.addLabelValue("Width", window.screen.width);
        this.addLabelValue("Height", window.screen.height);

        let info = new BrowserInformation();
        this.addLabelValue("User Agent", info.getUserAgent());
        this.addLabelValue("Language", info.getLanguage());
        this.addLabelValue("Width", info.getWidth());
        this.addLabelValue("Height", info.getHeight());
        
    }

}