import Debug from "../../../core/Debug/Debug.js";

export default class UserInformation {

    static _login = null;

    static _usergroup = [];

    static _isLogged = false;

    getLogin() {

        return UserInformation._login;

    }

    getUsergroup() {

        return UserInformation._usergroup;

    }

    isUserLogged() {

        return UserInformation._isLogged;

    }


    isUsergroup(usergroupId) {

        let value = false;


        (new Debug()).write(UserInformation._usergroup);

        UserInformation._usergroup.forEach(function(number, i) {

            (new Debug()).write(UserInformation._usergroup[i]);
            (new Debug()).write(UserInformation._usergroup[i].id);
            (new Debug()).write(UserInformation._usergroup[i].usergroup);

            if (UserInformation._usergroup[i].id === usergroupId) {
                value=true;
            }
        });

        return value;

    }


    resetUserInformation() {

        UserInformation._login = null;
        UserInformation._usergroup = [];

    }


}