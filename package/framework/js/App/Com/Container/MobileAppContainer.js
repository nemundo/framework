import DivContainer from "../../../../html/Content/Div.js";
import AppMenuIconContainer from "./AppMenuIconContainer.js";
import Debug from "../../../../core/Debug/Debug.js";
import StatusBar from "../../../Com/Navigation/StatusBar.js";
import UnityApp from "../../../../bim/Unity/App/UnityApp.js";
import _CloudPointApp from "../../../../muenster/App/CloudPointApp.js";
import ArchivApp from "../../../../muenster/Archiv/App/ArchivApp.js";
import FixFullScreenLayout from "../../../Com/Layout/FixFullScreenLayout.js";
import DisplayStyle from "../../../../html/Style/Display.js";
import FlexDirection from "../../../../html/Style/Flex/FlexDirection.js";
import BodyContainer from "../../../../html/Document/Body.js";
import ColorStyle from "../../../../html/Style/Color.js";

export default class MobileAppContainer extends DivContainer {


    _iconContainer;


    constructor(parentContainer) {

        super(parentContainer);

        this._iconContainer = new AppMenuIconContainer(this);

    }



    render() {

        let local=this;

        //let iconContainer = new AppMenuIconContainer(this);
        //this._iconContainer.visible=false;
        //iconContainer.visible=true;

        this._iconContainer.onOpen = function (app) {

            //(new Debug()).write("on open");

            /*app.appContainer.onClose = function () {
                appView.visible = false;
                iconContainer.visible = true;
            };*/

            appView.emptyContainer();

            let statusBar = new StatusBar(appView);  // new H1Container(appView);
            statusBar.backgroundColor=ColorStyle.GREY;
            statusBar.statusTitle= app.app; // title;

            app.appContainer.onTitleChange = function (title) {
                //h1.text = title;
                statusBar.statusTitle= title;
            };


            app.appContainer.onClose = function () {
                appView.visible = false;
                local._iconContainer.visible = true;
                //h1.text = title;
                //h1.statusTitle= title;
            };


            statusBar.onBackIconClick = function () {
                app.appContainer.onBackClick();
            };

            app.appContainer.renderContainer();
            //app.appContainer.render();

            appView.addContainer(app.appContainer);
            appView.visible = true;
            local._iconContainer.visible = false;

        };

        /*iconContainer.onClose=function () {
            appView.visible=false;
            iconContainer.visible=true;

        };*/

        /*iconContainer
            .addApp(new UnityApp())
            .addApp(new CloudPointApp())
            .addApp(new ArchivApp());*/


        //iconContainer.render();

        let appView = new FixFullScreenLayout(new BodyContainer());
        appView.display = DisplayStyle.FLEX;
        appView.flexDirection=FlexDirection.COLUMN;
        //appView.backgroundColor=ColorStyle.LIGHT_GREY;
        appView.visible = false;




    }


    addApp(app) {

        this._iconContainer.addApp(app);
        return this;

    }


}