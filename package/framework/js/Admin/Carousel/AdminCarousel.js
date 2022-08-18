import AdminImage from "../Image/AdminImage.js";
import FontAwesomeIcon from "../../FontAwesome/FontAwesomeIcon.js";
import AdminLayer from "../Base/AdminLayer.js";


export default class AdminCarousel extends AdminLayer {


    addImage(imageUrl) {

        let img = new AdminImage();
        img.src = imageUrl;
        img.addCssClass("admin-carousel-item");

        this.addLayer(img);

        return this;

    }





    render() {

        this.addCssClass("admin-carousel");

        let local = this;
        let slideIndex = 0;

        let previousIcon = new FontAwesomeIcon(this);
        //previousIcon.addCssClass('icon-button');
        previousIcon.addCssClass("admin-carousel-previous");
        previousIcon.icon = 'chevron-left';
        previousIcon.onClick = function () {
            slideIndex--;
            local.showLayer(slideIndex);
        }

        let nextIcon = new FontAwesomeIcon(this);
        //nextIcon.addCssClass('icon-button');
        nextIcon.addCssClass("admin-carousel-previous");
        nextIcon.icon = 'chevron-right';
        nextIcon.onClick = function () {
            slideIndex++;
            local.showLayer(slideIndex);
        };



    }


}


