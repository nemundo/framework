import DivContainer from "../../../../html/Content/Div.js";
import _UserConfig from "../../UserConfig.js";

export default class UserSettingContainer extends DivContainer {


    render() {

        let div = new DivContainer(this);
        div.text= "Login: "+_UserConfig.loginName;

    }


}