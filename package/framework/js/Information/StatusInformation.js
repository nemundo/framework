import DivContainer from "../../html/Content/Div.js";
import BodyContainer from "../../html/Document/Body.js";
import IconButton from "../FontAwesome/IconButton.js";
import DarkBackground from "./DarkBackground.js";

export default class StatusInformation {

    showInformation(text) {


        let body = new BodyContainer();

        //let background=new DarkBackground(body)

        let div = new DivContainer(body);
        div.addCssClass("status-information");
        div.text=text;

        let btn = new IconButton(div);
        btn.icon = "times";
        btn.addCssClass("button-close");
        btn.onClick=function () {
            div.removeContainer();
            //background.removeContainer();
        }

    }

}