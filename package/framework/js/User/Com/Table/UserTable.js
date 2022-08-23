import ServiceDataTable from "../../../Data/Table/ServiceDataTable.js";
import TdContainer from "../../../../html/Table/Td.js";

export default class UserTable extends ServiceDataTable {

    onItemClick=null;

    constructor(parentContainer) {

        super(parentContainer);
        this.service = "user-list";

    }


    onHeader(header) {
        header.addText("User");
        header.addText("Usergroup");
    }


    onRow(tableRow, dataRow) {

         //row.addText(item.login);

         let local=this;

         let td=new TdContainer(tableRow);
         td.text= dataRow.login;
         td.onClick = function () {

             if (local.onItemClick!==null) {
                 local.onItemClick(dataRow)
             }

         };

         tableRow.addText(dataRow.usergroup);

     }


}

