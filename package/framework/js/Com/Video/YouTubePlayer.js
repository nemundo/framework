import IframeContainer from "../../html/Iframe/Iframe.js";

export default class YouTubePlayer extends IframeContainer {

    set youtubeId(value) {

        this.frameborder=0;
        this.src = "https://www.youtube.com/embed/" + value;

    }

}
