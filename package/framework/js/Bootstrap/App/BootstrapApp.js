import DivContainer from "../../../html/Content/Div.js";
import BootstrapNavbar from "../Navbar/BootstrapNavbar.js";
import BootstrapContainer from "../Layout/BootstrapContainer.js";
import SearchAutocomplete from "../../../content/Index/Search/Com/Autocomplete/SearchAutocomplete.js";
import SearchIndexTable from "../../../content/Index/Search/Com/Table/SearchIndexTable.js";
import ParagraphContainer from "../../../html/Content/Paragraph.js";
import UserInformation from "../../User/Information/UserInformation.js";
import UserNavbarDropdownMenu from "../../User/Com/Navbar/UserNavbarDropdownMenu.js";
import BootstrapLoginForm from "../../User/Com/Form/BootstrapLoginForm.js";
import DocumentContainer from "../../../html/Document/Document.js";


// BootstrapSearchApp
// BootstrapUserApp
export default class BootstrapApp extends DivContainer {


    _navbar;

    _container;

    // showSearch

    // showUser


    constructor(parentContainer) {

        super(parentContainer);

        let local = this;

        this._navbar = new BootstrapNavbar(this);
        this._navbar.brandImage = "/img/paranautik/paranautik_logo.png";
        this._navbar.render();


        /*
        let form = new DivContainer(this._navbar.collapseDiv);  // new FormContainer(this._navbar.collapseDiv);
        form.addCssClass("form-inline my-2 my-lg-0");

        let autocomplete = new SearchAutocomplete(form);
        autocomplete.placeholder = "Search";
        autocomplete._input.addCssClass("mr-sm-2");
        autocomplete.onWordChange = function () {

            local._container.emptyContainer();

            let table = new SearchIndexTable(local._container);
            table.query = autocomplete.value;
            table.render();

        };
        /*autocomplete.render();*/

        this._container = new BootstrapContainer(this);

        /*if (!(new UserInformation()).isUserLogged()) {

            let login = new BootstrapLoginForm(local._container);
            login.onSuccess = function () {

                //(new UrlRedirect()).reloadUrl();

                login.removeContainer();

                let p = new ParagraphContainer(local);
                p.text = "Hello World";

            };
            login.render();

        }*/

    }


    set homePage(value) {

        let local = this;

        this.showPage(value);

        this._navbar.onBrandClick = function () {
            local.showPage(value);
        };

    }


    addPage(page, active = false) {

        let local = this;

        this._navbar.addMenu(page.pageTitle, function () {
            local.showPage(page);
        },active);

        return this;

    }


    showPage(page) {

        page.showPage();

        this._container.emptyContainer();
        this._container.addContainer(page);

        (new DocumentContainer()).changeTitle(page.pageTitle);  //.changeUrl(page.pageUrl);

    }


    addDropdownSubmenu(dropdownMenu) {

        this._navbar.addDropdownMenu(dropdownMenu);

        return this;

    }


    addUserMenu() {

        this._navbar.addDropdownMenu(new UserNavbarDropdownMenu());
        return this;

    }


    set appLabel(value) {

        this._navbar.brandLabel = value;

    }

}