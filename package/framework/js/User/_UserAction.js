import ServiceRequest from "../Service/ServiceRequest.js";
import Debug from "../../core/Debug/Debug.js";


export default class _UserAction {


    static _isLogged = false;

    static loginName = null;


    isLogged() {

        return _UserAction._isLogged;

    }



    login(user,password,event=null) {


        let service = new ServiceRequest("user-login");
        service.addParameter("login", user);
        service.addParameter("password", password);
        service.sendRequest();
        service.onDataRow = function (item) {

            let value = JSON.parse(item.success);

            if (value) {
                (new Debug()).write('Login success');

                 _UserAction._isLogged=true;
                _UserAction.loginName = item.login;

                /*if (_local.onSuccess !== null) {
                    _local.onSuccess();
                }*/

            } else {
               /* (new Debug()).write('Login error');
                password.errorMessage = "Passwort nicht korrekt";*/
            }

        }


        _UserAction._isLogged=true;
        _UserAction.loginName = user;

        return true;

    }


    logout() {

//        sessionStorage.clear();


        /*let service = new ServiceRequest("user-logout");
        service.sendRequest();*/

        _UserAction._isLogged=false;
        _UserAction.loginName = null;

    }


}