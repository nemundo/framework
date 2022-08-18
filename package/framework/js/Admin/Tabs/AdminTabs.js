import DivContainer from "../../../html/Content/Div.js";
import ButtonContainer from "../../../html/Form/Button.js";
import AdminLayer from "../Base/AdminLayer.js";

export default class AdminTabs extends AdminLayer {

    _tabButton;

    _tabContent;

    defaultLayer = 0;

    showDefaultLayer = true;


    constructor(parentContainer) {

        super(parentContainer);

        this._tabButton = new DivContainer(this);
        this._tabButton.addCssClass("admin-tabs-button-container");

        this._tabContent = new DivContainer(this);

    }


    addTab(label, container = null) {

        let local = this;

        let index = local._layerList.length;

        let btn = new ButtonContainer(this._tabButton);
        btn.addCssClass("admin-tabs-button");
        btn.label = label;
        btn.onClick = function () {
            local.showLayer(index);
        };

        this._tabContent.addContainer(container);
        this.addLayer(container);

    }


    render() {

        if (this.showDefaultLayer) {
            this.showLayer(this.defaultLayer);
        }

    }

}