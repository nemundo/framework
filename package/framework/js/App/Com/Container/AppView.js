import FixFullScreenLayout from "../../../Com/Layout/FixFullScreenLayout.js";
import DisplayStyle from "../../../../html/Style/Display.js";
import FlexDirection from "../../../../html/Style/Flex/FlexDirection.js";
import StatusBar from "../../../Com/Navigation/StatusBar.js";
import ColorStyle from "../../../../html/Style/Color.js";

export default class AppView extends FixFullScreenLayout {


    render() {
        super.render();

        this.display = DisplayStyle.FLEX;
        this.flexDirection = FlexDirection.COLUMN;
        this.widthPercent = 100;
        this.heightPercent = 100;
//appView.backgroundColor=ColorStyle.LIGHT_GREY;
        this.visible = false;

    }


    loadApp(app) {

        let local = this;

        this.emptyContainer();

        let statusBar = new StatusBar(this);  // new H1Container(appView);
        statusBar.backgroundColor = ColorStyle.GREY;
        statusBar.statusTitle = app.app; // title;

        app.appContainer.onTitleChange = function (title) {
            //h1.text = title;
            statusBar.statusTitle = title;
        };


        app.appContainer.onClose = function () {
            local.visible = false;
            local._iconContainer.visible = true;
            //h1.text = title;
            //h1.statusTitle= title;
        };


        statusBar.onBackIconClick = function () {
            app.appContainer.onBackClick();
        };

        app.appContainer.renderContainer();
        //app.appContainer.render();

        this.addContainer(app.appContainer);
        this.visible = true;

        local._iconContainer.visible = false;


    }


    loadAppContainer(appContainer) {

        let local = this;

        this.emptyContainer();

        let statusBar = new StatusBar(this);  // new H1Container(appView);
        statusBar.backgroundColor = ColorStyle.GREY;
        statusBar.statusTitle = "unknow";  // app.app; // title;

        appContainer.onTitleChange = function (title) {
            statusBar.statusTitle = title;
        };

        appContainer.onClose = function () {
            local.visible = false;
            //local._iconContainer.visible = true;
            //h1.text = title;
            //h1.statusTitle= title;
        };


        statusBar.onBackIconClick = function () {

            if (appContainer.onBackClick !== null) {
                appContainer.onBackClick();
            }

        };

        //app.appContainer.renderContainer();
        //app.appContainer.render();

        this.addContainer(appContainer);
        this.visible = true;
        //local._iconContainer.visible = false;


    }


}


/*
let appView = new FixFullScreenLayout(new BodyContainer());
appView.display = DisplayStyle.FLEX;
appView.flexDirection=FlexDirection.COLUMN;
//appView.backgroundColor=ColorStyle.LIGHT_GREY;
appView.visible = false;*/