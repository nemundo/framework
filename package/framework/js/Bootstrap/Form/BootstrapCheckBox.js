import AdminCheckbox from "../../Form/AdminCheckbox.js";
import RandomNumber from "../../../core/Random/RandomNumber.js";

export default class BootstrapCheckBox extends AdminCheckbox {

    constructor(parentContainer) {

        super(parentContainer);

        this.addCssClass("form-check");

        this.addCssClass("col");

        this._input.addCssClass("form-check-input");

        //this.name2= (new RandomNumber()).getNumber();

        let randomId= "checkbox"+(new RandomNumber()).getNumber();

        this._input.id = randomId;
        this._label.addCssClass("form-check-label");
        this._label.htmlFor=randomId;


        /*
        <input className="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            <label className="form-check-label" htmlFor="flexCheckDefault">
                Default checkbox
            </label>
        */


    }

}