import DivContainer from "../../html/Content/Div.js";
import SpanContainer from "../../html/Content/Span.js";
import ParagraphContainer from "../../html/Content/Paragraph.js";

export default class TooltipContainer extends ParagraphContainer {

    _span;

    constructor(parentContainer) {

        super(parentContainer);

        this.addCssClass("tooltip");
        this.text="Hove me";

        this._span = new SpanContainer(this);
        this._span.addCssClass("tooltiptext");
        this._span.text = "tooltiptext";

    }


    set text(value) {

        //this._span.text=value;

    }


}



/*
<style>

    .tooltip {
    position: relative;
    display: inline-block;
    border-bottom: 1px dotted black;
}


    .tooltip .tooltiptext {
    visibility: hidden;
    width: 120px;
    background-color: black;
    color: #fff;
    text-align: center;
    padding: 5px 0;
    border-radius: 6px;


    position: absolute;
    z-index: 1;
}

    .tooltip:hover .tooltiptext {
    visibility: visible;
}
</style>

<div className="tooltip">Hover over me
    <span className="tooltiptext">Tooltip text</span>
</div>

*/










