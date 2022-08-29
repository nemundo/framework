import DocumentContainer from "../../../html/Document/Document.js";
import FormContainer from "../../../html/Form/Form.js";
import AdminAutocompleteTextBox from "./AdminAutocompleteTextBox.js";
import AdminSubmitButton from "../Button/AdminSubmitButton.js";
import UrlParameter from "../../../core/Url/UrlParameter.js";


let document = new DocumentContainer();
document.onLoaded = function () {

    let form = new FormContainer();
    form.fromId("query-content-search-form");

    let search = new AdminAutocompleteTextBox(form);
    search.name = "q";
    search.value = (new UrlParameter("q")).getValue();
    search.serviceName = "search-word";
    search.render();

    let button = new AdminSubmitButton(form);
    button.label = "Search";

};