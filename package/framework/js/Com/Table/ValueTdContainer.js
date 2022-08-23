import TdContainer from "../../../html/Table/Td.js";
import ColorStyle from "../../../html/Style/Color.js";
import TextAlignment from "../../../html/Style/Text/TextAlignment.js";

export default class NumberTdContainer extends TdContainer {

    set number(value) {

        if (value < 0) {
            this.backgroundColor = ColorStyle.RED;
            this.color=ColorStyle.WHITE;
        } else {
            this.backgroundColor = ColorStyle.GREEN;
            this.color=ColorStyle.WHITE;
        }

        this.text = Math.round(value)+" %";
        this.textAlignment=TextAlignment.RIGHT;
        this.widthPixel=100;
        //this.paddingPixel=10;

    }

}