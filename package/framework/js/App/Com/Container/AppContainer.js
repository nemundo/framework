import DivContainer from "../../../../html/Content/Div.js";

export default class AppContainer extends DivContainer {


    appName="";

    appIcon="";


    onTitleChange = null;

    onIconChange = null;

    onBackClick = null;

    onClose = null;

    _statusBar;

    _renderStatus = false;


    constructor(parentContainer) {

        super(parentContainer);

        //this._statusBar = new StatusBar(this);
        //this._statusBar.marginBottom
        /*statusBar.position=PositionStyle.ABSOLUTE;
        statusBar.rightPixel=0;
        statusBar.topPixel=0;*/
        /*statusBar.statusTitle=app.app;
        statusBar.appIcon=app.appIcon;*/


    }


    renderContainer() {

        if (!this._renderStatus) {
            this._renderStatus = true;
            this.render();
        }

        this.onOpen();

    }


    onOpen() {

    }


    /*
    onBackClick() {

    }




    /*set statusTitle(value) {
        this._statusBar.statusTitle = value;
    }


    set onBackClick(value) {
        this._statusBar.onClick=value;
    }


    changeTitle(title) {

        if (this.onTitleChange!==null) {
            this.onTitleChange(title);
        }

    }*/


    /*onClose() {

    }*/


}