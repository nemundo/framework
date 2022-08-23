import DivContainer from "../../../html/Content/Div.js";
import FileInputContainer from "../../../html/Form/FileInput.js";
import ServiceRequest from "../../../framework/Service/ServiceRequest.js";
import PositionStyle from "../../../html/Style/Position.js";
import LabelContainer from "../../../html/Form/Label.js";
import CursorStyle from "../../../html/Style/Cursor.js";
import BootstrapIcon from "../../../framework/Package/BootstrapIcon/BootstrapIcon.js";
import MenuConfig from "../../../framework/Com/Menu/MenuConfig.js";
import ProgressBar from "../ProgressBar.js";
import ParagraphContainer from "../../../html/Content/Paragraph.js";
import DisplayStyle from "../../../html/Style/Display.js";
import FlexDirection from "../../../html/Style/Flex/FlexDirection.js";
import ColumnFlexLayout from "../Layout/ColumnFlexLayout.js";
import SmallContainer from "../../../html/Formatting/SmallContainer.js";
import ColorStyle from "../../../html/Style/Color.js";

export default class ServiceFileUpload extends ColumnFlexLayout {

    _upload;

    _fileInput;

    _uploadInfo;

    accept;

    serviceName;

    //parentPoiId = null;

    parentId = null;

    onUpload = null;

    onUploadBegin = null;

    onFinished = null;

    onUploadFinished = null;

    static uploadId = 0;

    render() {

        let local = this;

        this.onMouseEnter = function () {
            local.color = ColorStyle.DARK_GREY;
        };

        this.onMouseLeave = function () {
            local.color = ColorStyle.BLACK;
        };

        let randomId = "upload" + ServiceFileUpload.uploadId;

        let upload = new ColumnFlexLayout(this);

        let label = new LabelContainer(upload);
        label.display = DisplayStyle.FLEX;
        label.flexDirection = FlexDirection.COLUMN;

        label.htmlFor = randomId;

        let icon = new BootstrapIcon(label);
        icon.icon = "upload";
        icon.title = "Upload";
        icon.fontSizePixel = MenuConfig.iconSize;
        icon.cursor = CursorStyle.POINTER;

        let small = new SmallContainer(label);
        small.text = "Upload";

        let fileInput = new FileInputContainer(upload);
        fileInput.multiple = true;
        fileInput.id = randomId;
        fileInput.opacity = 0;
        fileInput.widthPixel = 0.1;
        fileInput.heightPixel = 0.1;
        fileInput.position = PositionStyle.ABSOLUTE;
        fileInput.accept = this.accept;
        fileInput.onChange = function () {

            if (local.onUploadBegin !== null) {
                local.onUploadBegin();
            }

            local._uploadInfo.visible = true;
            upload.visible = false;

            let i = 0;
            let fileTotal = fileInput._htmlElement.files.length;
            let fileFinished = 0;

            for (let i = 0; i < fileTotal; i++) {

                let file = fileInput._htmlElement.files.item(i);

                let service = new ServiceRequest(local.serviceName);
                service.addFile("file", file);

                //(new Debug()).write("parent id upload " + parentIdTmp);

                /*if (parentIdTmp !== null) {
                    service.addParameter("parent", parentIdTmp);
                }*/

                if (local.parentId !== null) {
                    service.addParameter("parent", local.parentId);
                }

                service.onDataRow = function (data) {

                    if (local.onUpload !== null) {
                        local.onUpload(data);
                    }

                    status.text = file.name;

                    fileFinished++;

                    progross.value = Math.round((fileFinished / fileTotal) * 100);
                    progressCount.text = fileFinished + " / " + fileTotal;

                    if (fileFinished === fileTotal) {

                        fileInput.clearInput();

                        status.text = "Upload finished";

                        local._uploadInfo.visible = false;
                        upload.visible = true;

                        if (local.onFinished !== null) {
                            local.onFinished();
                        }

                        if (local.onUploadFinished !== null) {
                            local.onUploadFinished();
                        }

                    }

                }

                service.sendRequest();

            }

        };

        this._uploadInfo = new DivContainer(this);
        this._uploadInfo.visible = false;

        let progross = new ProgressBar(this._uploadInfo);
        progross.value = 0;

        let status = new ParagraphContainer(this._uploadInfo);
        let progressCount = new ParagraphContainer(this._uploadInfo);

        ServiceFileUpload.uploadId++;

    }

}