import DivContainer from "../../html/Content/Div.js";
import ServiceRequest from "../Service/ServiceRequest.js";


export default class DataItemView extends DivContainer {



    service = null;

    //onItem=null;

    _serviceRequest=null;

    constructor(parentContainer) {

        super(parentContainer);
        this._serviceRequest = new ServiceRequest();

        //this.loadData();

    }



    /*loadData() {

        throw new Error('You have to implement the method doSomething!');

    }*/



    loadFromId(id) {

        //this.emptyContainer();
        this.emptyContainer();

        let _local = this;


        this._serviceRequest.service = this.service;

        if (this.onItem !== null) {
            _local._serviceRequest.onItem = function (item) {
                _local.onItem(item);
            }
        }

        this._serviceRequest.addParameter("id", id);
        this._serviceRequest.sendRequest();


    }


    onItem(item) {

    }

}