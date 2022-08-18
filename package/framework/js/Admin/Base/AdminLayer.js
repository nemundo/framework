import DivContainer from "../../../html/Content/Div.js";
import DisplayStyle from "../../../html/Style/Display.js";

// AdminSlider
export default class AdminLayer extends DivContainer {

    _layerList = [];

    currentSlideIndex = 0;

    addLayer(layer) {

        //layer.addCssClass("admin-carousel-item");
        //this.addContainer(layer);
        this._layerList.push(layer);
        return this;

    }


    hasItem() {

        let value = false;
        if (this._layerList.length > 0) {
            value = true;
        }
        return value;

    }


    showLayer(index) {

        for (let n = 0; n < this._layerList.length; n++) {
            this._layerList[n].display = DisplayStyle.NONE;
        }

        if (this._layerList[index] !== undefined) {
            this._layerList[index].display = DisplayStyle.INLINE;
        }

    }


    showPreviousLayer() {
        this.currentSlideIndex--;
        local.showLayer(this.currentSlideIndex);
    }


    showNextLayer() {
        this.currentSlideIndex++;
        local.showLayer(this.currentSlideIndex);
    }


}


