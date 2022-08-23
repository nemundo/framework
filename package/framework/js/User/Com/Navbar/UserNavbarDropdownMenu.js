import BootstrapNavbarDropdownMenu from "../../../Bootstrap/Navbar/BootstrapNavbarDropdownMenu.js";
import UserInformation from "../../Information/UserInformation.js";
import UserLogoutService from "../../Service/UserLogoutService.js";
import UrlRedirect from "../../../../core/Url/UrlRedirect.js";

export default class UserNavbarDropdownMenu extends BootstrapNavbarDropdownMenu {


    constructor(parentContainer) {

        super(parentContainer);


        this.label="<i class=\"fas fa-user\"></i><b> "+(new UserInformation()).getLogin()+"</b></a>";
        //this.label = (new UserInformation()).getLogin();




        this.addMenu("Logout", function () {

                let service = new UserLogoutService();
                service.onLoaded = function () {
                    //(new UrlRedirect()).reloadUrl();
                };
                service.sendRequest();


            }
        );


    }


}