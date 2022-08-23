import AdminModal from "../../Com/Modal/AdminModal.js";
import ImageContainer from "../../../html/Image/Image.js";

export default class ImageModal {   // extends AdminModal {


    showImage(imageUrl, title="") {


        let imgLarge = new ImageContainer();  // new AdminImage();
        imgLarge.src =imageUrl;  // data.image_url_large;
        imgLarge.widthPercent = 100;
        imgLarge.heightPercent = 100;

        let modal = new AdminModal();
        modal.modalTitle = title;  // data.filename;  // "Image";
        modal.fullPage = true;
        modal.show(imgLarge);



    }

}