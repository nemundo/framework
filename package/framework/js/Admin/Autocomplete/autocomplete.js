import DocumentContainer from "../../../html/Document/Document.js";
import AutocompleteTextBox from "../../Com/Autocomplete/AutocompleteTextBox.js";
import InputContainer from "../../../html/Form/Input.js";


let document = new DocumentContainer();
document.onLoaded = function () {


    let autocomplete = new InputContainer();  // new AutocompleteTextBox();
    autocomplete.fromId("search-one");

    autocomplete.onKeyUp=function () {
      //alert(autocomplete.value);
    };


    //autocomplete.backgroundColor="blue";
    //autocomplete.render();


    /*
    let gemeinde = new GemeindeAutocomplete(mainContent);
    gemeinde.render();*/


};