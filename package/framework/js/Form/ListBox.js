import SelectContainer from "../../html/Form/Select.js";
import LabelContainer from "../../html/Form/Label.js";
import DivContainer from "../../html/Content/Div.js";


export default class ListBox extends DivContainer {

    _label;

    _select;

    _defaultEmptyItem = false;

    _onChangeEvent = null;

    constructor(parentContainer) {

        super(parentContainer);

        let local = this;

        this._label = new LabelContainer(this);
        this._select = new SelectContainer(this);
        this._select.onChange = function () {

            if (local._onChangeEvent !== null) {
                local._onChangeEvent(local._select.value);
            }

        };

    }

    addOption(option) {
        this._select.addContainer(option);
        return this;
    }


    addItem(id, value) {

        this._select.addItem(id, value);
        return this;
    }

    clearItem() {
        this._select.clearItem();
        return this;
    }

    set label(value) {

        this._label.text = value;

    }


    set name(value) {

        this._select.id = value;
        this._select.name = value;
        this._select.addAttribute("htmlFor", value);

    }


    set defaultEmptyItem(value) {
        this._defaultEmptyItem = value;

        if (this._defaultEmptyItem) {
            this._select.addItem("", "");
        }

    }


    set value(value) {

        this._select.value = value;

    }

    get value() {

        return this._select.value;

    }

    getNumberValue() {

        return parseInt(this._select.value);

    }


    getSelectedDataAttribute(name) {

        let value = this._select.getSelectedDataAttribute(name);
        return value;

    }


    set onChange(event) {

        this._onChangeEvent = event;

    }


    set multiple(value) {

        this._select.multiple = value;

    }

}