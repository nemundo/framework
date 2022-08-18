import DivContainer from "../../../html/Content/Div.js";
import BodyContainer from "../../../html/Document/Body.js";
import StylesheetLink from "../../../html/Header/StylesheetLink.js";
import AdminImage from "../../Image/AdminImage.js";
import SpanContainer from "../../../html/Content/Span.js";
import IconHyperlink from "../../FontAwesome/IconHyperlink.js";

export default class Slideshow extends DivContainer {

    _itemNumber = 0;

    _imageList = new Array();

    _currentImage = 0;

    _numberInfo;

    _imageContainer;

    constructor(parentContainer) {

        super(parentContainer);

        let body = new BodyContainer();

        let stylesheet = new StylesheetLink(body);
        stylesheet.href = "/css/framework/slideshow.css";

        let local = this;


        //if (this._currentImage > 1) {

        let previous = new IconHyperlink(this);  // new HyperlinkContainer(this);
        previous.icon = "chevron-left";
        //previous.text = "<";
        previous.onClick = function () {
            let number = local._currentImage - 1;
            local.showImage(number);
        }

        //}


        //      if (this._currentImage < this.getImageCount()) {
        let next = new IconHyperlink(this);
        next.icon = "chevron-right";
        next.onClick = function () {
            let number = local._currentImage + 1;
            local.showImage(number);
        }

        //    }

        this.numberInfo = new SpanContainer(this);
        this._imageContainer = new DivContainer(this);

    }


    addImage(imageUrl) {

        this._itemNumber++;

        let div = new DivContainer(this._imageContainer);

        if (this._itemNumber > 1) {
            div.addCssClass("slideshow-item");
        }

        //div.id = "slideshow-item-" + this._itemNumber;

        let img = new AdminImage(div);
        img.src = imageUrl;

        this._imageList.push(div);

        return this;

    }


    getImageCount() {

        return this._imageList.length;

    }


    clearImage() {

        this._imageContainer.emptyContainer();
        this._imageList = new Array();
        this._itemNumber = 0;
        this._currentImage = 0;

    }


    showImage(number) {


        this._imageList[number].cleanCssClass();

        if (this._currentImage !== null) {
            this._imageList[this._currentImage].addCssClass("slideshow-item");
        }

        this._currentImage = number;

        this.numberInfo.text = (this._currentImage + 1) + "/" + this.getImageCount();


    }


}