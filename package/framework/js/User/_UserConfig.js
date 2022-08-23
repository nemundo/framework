export default class _UserConfig {


    //static isLogged = false;

    //static loginName = null;

    static usergroup = [];


    static isMemberOfUsergroup(usergroupId) {

        let value = false;

        if (_UserConfig.usergroup.indexOf(usergroupId) !== -1) {
            value = true;
        }

        return value;

    }


}