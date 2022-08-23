import DivContainer from "../../../html/Content/Div.js";
import LoaderContainer from "../../Com/Loader/Loader.js";

export default class ReloadScrollDivContainer extends DivContainer {

    showLoader=true;

    _page = 0;

    _loader = null;

    constructor(parentContainer) {

        super(parentContainer);

    }


    getPage() {
        return this._page;
    }


    set onEndScroll(value) {

        let local = this;

        this.onScroll = function () {

            if (this.offsetHeight + this.scrollTop >= this.scrollHeight) {

                local._page++;
                value();

            }

        }

    }


    cleanData() {
        this._page = 0;
        this.emptyContainer();
    }


    enableLoader() {
        if (this.showLoader) {
        this._loader = new LoaderContainer(this);
        }
    }


    disableLoader() {
        if (this.showLoader) {
            this._loader.removeContainer();
        }
    }


}