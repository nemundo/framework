import DivContainer from "../../../html/Content/Div.js";
import Canvas2DContainer from "../../../html/Canvas/Canvas.js";
import FileInputContainer from "../../../html/Form/FileInput.js";
import FileAccept from "../../../html/Form/Input/FileAccept.js";
import Debug from "../../../core/Debug/Debug.js";

export default class ImageUpload extends DivContainer {


    constructor(parentContainer) {

        super(parentContainer);


        let input = new FileInputContainer(this);
        input.accept = FileAccept.IMAGE;  // "image/*";
        //input.capture = "camera";

        input.onChange = function () {

            (new Debug()).write("onchange");

            var reader = new FileReader();
            reader.onload = function (e) {

                var dataURL = e.target.result;  //,

                //(new Debug()).write(dataURL);

                /*c = document.querySelector('canvas'), // see Example 4
                ctx = c.getContext('2d'),*/


                let img = new Image();
                img.src = dataURL;

                img.onload = function () {

                    (new Debug()).write("onload");

                    (new Debug()).write(img.width);

                    canvas.canvasWidth = img.width;
                    canvas.canvasHeight = img.height;
                    //ctx.drawImage(img, 0, 0);

                    canvas.drawImage(img);

                };



            };


            //var file = input.files[0];
            reader.readAsDataURL(input.getFile());


        };


        let canvas = new Canvas2DContainer(this);

        // <input type="file" id="mypic" accept="image/*" capture="camera">


        //let canvas = new CanvasContainer(this);
        /*canvas.canvasWidth = 500;
        canvas.canvasHeight = 500;*/


    }


}