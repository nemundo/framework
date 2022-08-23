import DivContainer from "../../../html/Content/Div.js";
import DisplayStyle from "../../../html/Style/Display.js";
import AdminImage from "../../Image/AdminImage.js";
import FontAwesomeIcon from "../../FontAwesome/FontAwesomeIcon.js";


export default class _AdminCarousel extends DivContainer {

    _slideList=[];

    addImage(imageUrl) {

        let img = new AdminImage(this);
        img.src = imageUrl;
        img.addCssClass("admin-carousel-item");

        this._slideList.push(img);

        //local.checkSlide(slideIndex);
        if (this._slideList.length ===1) {
            this.showSlide(0);
        }


        return this;


    }


    render() {

        let local=this;

        let slideIndex = 0;

        //showSlides(slideIndex);

        //let slideList = new BaseContainerList("admin-carousel-item");

        /*slideList.getItem(slideIndex).display = DisplayStyle.INLINE;
        slideList.getItem()*/

        let previousIcon = new FontAwesomeIcon(this);  // new DivContainer(this);
        //previousIcon.fromId("previous-icon");
        previousIcon.addCssClass('icon-button');
        previousIcon.icon = 'chevron-left';
        previousIcon.onClick = function () {
            //alert("previous");

            local.hideSlide(slideIndex);
            slideIndex--;
            local.showSlide(slideIndex);



            /*if (slideIndex => 0) {
                local._slideList[slideIndex].display = DisplayStyle.NONE;
                slideIndex--;
                local._slideList[slideIndex].display = DisplayStyle.INLINE;
            }


            if (slideIndex === 0) {
                previousIcon.display = DisplayStyle.NONE;
            } else {
                previousIcon.display = DisplayStyle.INLINE;
            }*/


        }


        let nextIcon = new FontAwesomeIcon(this);
        nextIcon.addCssClass('icon-button');
        nextIcon.icon = 'chevron-right';
        //nextIcon.fromId("next-icon");
        nextIcon.onClick = function () {
            //alert("next");


            local.hideSlide(slideIndex);
            slideIndex++;
            local.showSlide(slideIndex);

            /*
            if (slideIndex <= slideList.getItemCount()) {
                slideList.getItem(slideIndex).display = DisplayStyle.NONE;
                slideIndex++;
                slideList.getItem(slideIndex).display = DisplayStyle.INLINE;
            }*/


        };


    }



    hideSlide(slideIndex) {

        //if (slideIndex => 0) {
        this._slideList[slideIndex].display = DisplayStyle.NONE;
        //slideIndex--;
        //this._slideList[slideIndex].display = DisplayStyle.INLINE;
        //}



    }



    showSlide(slideIndex) {


        /*if (slideIndex <0) {
slideIndex =0;
        }*/


        //if (slideIndex => 0) {
            //this._slideList[slideIndex].display = DisplayStyle.NONE;
            //slideIndex--;
            this._slideList[slideIndex].display = DisplayStyle.INLINE;
        //}




    }



}


