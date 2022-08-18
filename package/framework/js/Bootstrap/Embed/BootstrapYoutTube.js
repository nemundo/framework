import DivContainer from "../../../html/Content/Div.js";
import YouTubePlayer from "../../Video/YouTubePlayer.js";

export default class BootstrapYoutTube extends DivContainer {

    _iframe;

    constructor(parentContainer) {

        super( parentContainer);

        this.addCssClass("embed-responsive embed-responsive-16by9");

        this._iframe=new YouTubePlayer(this);
        this._iframe.addCssClass("embed-responsive-item");

    }


    set youtubeId(value) {

        this._iframe.youtubeId=value;

    }




    /*
<div className="embed-responsive embed-responsive-16by9">
<iframe className="embed-responsive-item" src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" allowFullScreen></iframe>
</div>*/


}