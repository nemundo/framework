import DivContainer from "../../../html/Content/Div.js";


export default class BootstrapCarousel extends DivContainer {


    constructor(parentContainer) {

        super(parentContainer);

        this.addCssClass("carousel slide");
        this.addDataAttribute("bs-ride", "carousel");

    }


    /*
<div id="carouselExampleSlidesOnly" className="carousel slide" data-bs-ride="carousel">
<div className="carousel-inner">
<div className="carousel-item active">
<img src="..." className="d-block w-100" alt="...">
</div>
<div className="carousel-item">
<img src="..." className="d-block w-100" alt="...">
</div>
<div className="carousel-item">
<img src="..." className="d-block w-100" alt="...">
</div>
</div>
</div>*/


}
