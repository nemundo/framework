import LabelContainer from "../../html/Form/Label.js";
import AdminInput from "./AdminInput.js";
import RangeInputContainer from "../../html/Form/RangeInput.js";
import SpanContainer from "../../html/Content/Span.js";


export default class AdminRangeSlider extends AdminInput {


    set minValue(value) {
        this._input.minValue = value;
    }

    set maxValue(value) {
        this._input.maxValue = value;
    }

    set stepValue(value) {
        this._input.stepValue = value;
    }


    constructor(parentContainer) {

        super(parentContainer);

        let local = this;

        this._label = new LabelContainer(this);

        let minSpan = new SpanContainer(this);
        let valueSpan = new SpanContainer(this);

        this._input = new RangeInputContainer(this);
        /*this._input.onChange = function () {
            valueSpan.text = local._input.value;
        };*/

        valueSpan.text = local._input.value;

        this._input.onInput = function () {
            valueSpan.text = local._input.value;
        };



    }


    render() {

    }

}