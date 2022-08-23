import LabelValueAdminTable from "../../../Table/LabelValueAdminTable.js";
import CookieReader from "../../../../core/Cookie/CookieReader.js";


export default class CookieTable extends LabelValueAdminTable {

    render() {

        this.caption="Cookie";

        let cookie = new CookieReader();
        for (let item in cookie.getList()) {

            //(new Debug()).write(item+"="+cookie.getValue(item));
            this.addLabelValue(item, cookie.getValue(item));

        }

/*
        let cookieReader= new CookieReader();
        for (let key in cookieReader._cookieList) {
            let value = cookieReader._cookieList[key];
            //console.log(key, value);

            table.addLabelValue(key,value);

        }*/




    }

}