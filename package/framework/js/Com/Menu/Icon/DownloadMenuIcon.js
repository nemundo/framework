import MenuIcon from "../../../Menu/MenuIcon.js";

export default class DownloadMenuIcon extends MenuIcon {

    constructor(parentContainer = null) {

        super(parentContainer);
        this.label = "Download";
        this.icon = "download";

    }


    set downloadUrl(value) {

        this.href = value;
        this.download = value.substr(value.lastIndexOf('/') + 1);

    }

}