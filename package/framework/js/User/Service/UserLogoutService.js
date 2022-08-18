import ServiceRequest from "../../Service/ServiceRequest.js";
import UserInformation from "../Information/UserInformation.js";

export default class UserLogoutService extends ServiceRequest {

    constructor() {
        super("user-logout");
        (new UserInformation()).resetUserInformation();
    }


    set login(value) {
        this.addParameter("login", value);
    }


    set password(value) {
        this.addParameter("password", value);
    }

}