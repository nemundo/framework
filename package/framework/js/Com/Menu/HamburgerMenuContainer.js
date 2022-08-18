import DivContainer from "../../../html/Content/Div.js";
import CursorStyle from "../../../html/Style/Cursor.js";
import FlexDirection from "../../../html/Style/Flex/FlexDirection.js";
import BootstrapIcon from "../../Package/BootstrapIcon/BootstrapIcon.js";
import ColorStyle from "../../../html/Style/Color.js";
import HyperlinkContainer from "../../../html/Hyperlink/Hyperlink.js";
import SpanContainer from "../../../html/Content/Span.js";
import _UserConfig from "../../User/UserConfig.js";
import LogoutMenuIcon from "../../User/Menu/LogoutMenuIcon.js";
import AppConfig from "../../App/AppConfig.js";
import H4Container from "../../../html/Title/H4.js";
import DisplayStyle from "../../../html/Style/Display.js";
import MenuContainer from "./MenuContainer.js";

export default class HamburgerMenuContainer extends MenuContainer {

    iconColor;

    mobileView = false;

    showLabel = true;

    //showHamburgerMenu=false;

    _loginInformation;

    _loginDiv;

    _iconDiv;

    _showMenu = false;


    constructor(parentContainer) {

        super(parentContainer);

        let local = this;

       /* let hyperlink = new HyperlinkContainer(this);
        hyperlink.cursor = CursorStyle.POINTER;

        let icon = new BootstrapIcon(hyperlink);
        icon.icon = "list";
        icon.color = ColorStyle.WHITE;
        icon.fontSizePixel = 20;

        hyperlink.onClick = function () {

            if (local._showMenu) {
                local.hideMenu();
            } else {
                local.showMenu();
            }

        };*/


/*        this._iconDiv = new DivContainer(this);
        //this._iconDiv.widthPercent = 100;
        this._iconDiv.backgroundColor = ColorStyle.LIGHT_GREY;*/


        //this._iconDiv = new DivContainer(this);
        //this._iconDiv.widthPercent = 100;

        this.backgroundColor = ColorStyle.LIGHT_GREY;
        /*this.display=DisplayStyle.INLINE;
        this.widthPixel=200;*/



        /*
        let userInformation = new SpanContainer(this);
        userInformation.text=UserConfig.loginName;


        let logout = new LogoutMenuIcon(this);
        logout.onLogout=function () {
            //(new Debug()).write("logout");
            (new NemundoComApp()).loadApp();

        };
        logout.render();*/


        ///let pwdChange=new UserInformat


        //this.hideMenu();

    }


    addMenuIcon(menuIcon) {

        menuIcon.color = this.iconColor;
        menuIcon.fontSizePixel=20;
        menuIcon.paddingPixel=10;
        menuIcon.display = DisplayStyle.BLOCK;
        menuIcon.showLabel = this.showLabel;
        menuIcon.render();

        //this._iconDiv.addContainer(menuIcon);
        this.addContainer(menuIcon);

        return this;

    }


    showMenu() {

        this._showMenu = true;
        //this._iconDiv.visible = true;
        this.visible = true;
        return this;

    }


    hideMenu() {

        this._showMenu = false;
        //this._iconDiv.visible = false;
        this.visible = false;
        return this;

    }


    /*
    refreshUser() {

        //this._loginInformation.text = UserConfig.loginName;

    }*/


    set vertical(value) {

        //this._iconDiv.flexDirection = FlexDirection.COLUMN;
        this.flexDirection = FlexDirection.COLUMN;

    }


  /*  set showUserInformation(value) {

        if (value) {

            let userInformation = new SpanContainer(this);
            userInformation.text = UserConfig.loginName;


            let logout = new LogoutMenuIcon(this);
            logout.onLogout = function () {
                //(new Debug()).write("logout");
                //(new NemundoComApp()).loadApp();
                AppConfig.app.loadApp();

            };
            logout.render();

        }

    }*/


    set showHamburgerMenu(value) {

        let hyperlink = new HyperlinkContainer(this);
        hyperlink.cursor = CursorStyle.POINTER;

        let icon = new BootstrapIcon(hyperlink);
        icon.icon = "list";
        icon.color = ColorStyle.WHITE;
        icon.fontSizePixel = 20;

        hyperlink.onClick = function () {

            if (local._showMenu) {
                local.hideMenu();
            } else {
                local.showMenu();
            }

        };

    }


   /* set menuLabel(value) {

        let h4 = new H4Container(this);
        h4.text = value;
        h4.backgroundColor = ColorStyle.LIGHT_GREY;



    }*/





}
