import DivContainer from "../../../html/Content/Div.js";
import BootstrapButton from "../Button/BootstrapButton.js";
import H5Container from "../../../html/Title/H5.js";
import ButtonContainer from "../../../html/Form/Button.js";

export default class BootstrapModal extends DivContainer {




    _bodyDiv;

    _headerTitle;

    constructor(parentContainer) {

        super(parentContainer);

        let modalId = "modal1";

        let button = new BootstrapButton();
        button.label = "Open";
        button.addDataAttribute("bs-toggle","modal");
        button.addDataAttribute("bs-target","#"+modalId);

        let div = new DivContainer();
        div.addCssClass("modal");
        div.id = modalId;


        let dialogDiv=new DivContainer(div);
        dialogDiv.addCssClass("modal-dialog");

        let contentDiv=new DivContainer(dialogDiv);
        contentDiv.addCssClass("modal-content");

        let headerDiv = new DivContainer(contentDiv);
        headerDiv.addCssClass("modal-header");

        this.headerTitle=new H5Container(headerDiv);

        let closeBtn=new ButtonContainer(headerDiv);
        closeBtn.addCssClass("btn-close");
        closeBtn.addDataAttribute("bs-dismiss","modal");

        this._bodyDiv =new DivContainer(contentDiv);

        super.addContainer(button);
        super.addContainer(div);

    }


    set modalTitle(value) {

        this.headerTitle.text= value;

    }


    render() {


    }


    addContainer(container) {
        this._bodyDiv.addContainer(container);
        return this;
    }


}