import DivContainer from "../../../html/Content/Div.js";
import HiddenInputContainer from "../../../html/Form/HiddenInput.js";
import ServiceRequest from "../../Service/ServiceRequest.js";
import WordDelay from "./WordDelay.js";
import WordService from "./WordService.js";
import TextBox from "../../Form/TextBox.js";
import ColorStyle from "../../../html/Style/Color.js";
import Debug from "../../../core/Debug/Debug.js";
import PositionStyle from "../../../html/Style/Position.js";
import WordDiv from "./WordDiv.js";


// Autocomplete
// AutocompleteTextBox
export default class AutocompleteTextBox extends TextBox {

    onValueChange = null;

    onWordChange = null;

    serviceName = null;

    _service;

    _wordDivList = [];

    _wordList = [];

    _wordIdList = [];

    _maxWord = 0;

    _currentWord = -1;


    constructor(parentContainer) {

        super(parentContainer);

        this._service = new ServiceRequest();

        let local = this;

        this.position = PositionStyle.RELATIVE;

        this._input.addAttribute("autocomplete", "off");
        this._input.placeholder = "Search";

        let requestNumber = 0;
        let searchWord = true;

        this._input.onKeyPress = function (event) {

            if (event.keyCode === 13) {
                event.preventDefault();
            }

        }

        this._input.onKeyUp = function (event) {

            if (local.onValueChange !== null) {
                local.onValueChange();
            }

            searchWord = true;

            if (event.keyCode === 13) {

                searchWord = false;

                if (local._currentWord !== -1) {
                    local.value = local._wordList[local._currentWord];
                }

                wordList.emptyContainer();
                wordList.visible = false;

                local.callWordChange();

            }


            if (event.keyCode === 38) {
                searchWord = false;

                if (local._currentWord > 0) {
                    local._currentWord--;
                }

                local._wordDivList[local._currentWord + 1].backgroundColor = "";
                local._wordDivList[local._currentWord].backgroundColor = ColorStyle.LIGHT_GREY;

            }

            if (event.keyCode === 40) {
                searchWord = false;

                if (local._currentWord < (local._maxWord - 1)) {
                    local._currentWord++;
                }

                if (local._currentWord > 0) {
                    local._wordDivList[local._currentWord - 1].backgroundColor = "";
                }

                local._wordDivList[local._currentWord].backgroundColor = ColorStyle.LIGHT_GREY;

            }

            if (searchWord) {

                if (local._input.value !== "") {

                    requestNumber++;

                    let delay = new WordDelay();
                    delay.delay = 200;
                    delay.requestNumber = requestNumber;
                    delay.onDelay = function () {

                        if (searchWord) {

                            if (delay.requestNumber === requestNumber) {

                                if (local._input.value !== "") {

                                    let service = new WordService(local.serviceName);
                                    service.word = local._input.value;
                                    service.requestNumber = requestNumber;
                                    service.onLoaded = function () {

                                        if (searchWord) {
                                            wordList.emptyContainer();
                                            wordList.visible = false;
                                            local._currentWord = -1;
                                            local._maxWord = 0;
                                            local._wordDivList = [];
                                            local._wordList = [];
                                        } else {
                                            wordList.visible = false;
                                        }

                                    }

                                    service.onDataRow = function (item) {

                                        if (this.requestNumber === requestNumber) {

                                            if (searchWord) {

                                                wordList.visible = true;

                                                local._maxWord++;

                                                local._wordIdList[local._maxWord - 1] = item.id;
                                                local._wordList[local._maxWord - 1] = item.word;

                                                local._wordDivList[local._maxWord - 1] = new WordDiv(wordList);
                                                local._wordDivList[local._maxWord - 1].text = item.word;
                                                local._wordDivList[local._maxWord - 1].wordId = local._maxWord - 1;
                                                local._wordDivList[local._maxWord - 1].onActive = function (wordId) {

                                                    if (local._currentWord > -1) {
                                                        local._wordDivList[local._currentWord].backgroundColor = "";
                                                    }

                                                    local._currentWord = wordId;

                                                };

                                                let hidden = new HiddenInputContainer(local._wordDivList[local._maxWord - 1]);
                                                hidden.name = "word";
                                                hidden.value = item.word;

                                                local._wordDivList[local._maxWord - 1].onClick = function () {

                                                    local._input.value = item.word;
                                                    wordList.emptyContainer();
                                                    wordList.visible = false;

                                                    if (local.onValueChange !== null) {
                                                        local.onValueChange();
                                                    }

                                                    local.callWordChange();

                                                }

                                            } else {
                                                wordList.visible = false;
                                            }

                                        }

                                    };

                                    service.sendRequest();

                                }

                            }

                        }

                    }

                } else {
                    wordList.emptyContainer();
                    wordList.visible = false;
                }

            }

        };

        let wordList = new DivContainer(this);
        wordList.addCssClass("autocomplete-word-list");
        //wordList.position = PositionStyle.ABSOLUTE;
        wordList.visible = false;
        /*wordList.widthPercent = 100;
        wordList.border = "1px solid #d4d4d4";
        wordList.backgroundColor = ColorStyle.WHITE;
        wordList.zIndex=999;*/

        window.addEventListener('click', function (e) {
            if (wordList._htmlElement.contains(e.target)) {
                // Clicked in box
            } else {
                wordList.visible = false;
                // Clicked outside the box
            }
        });

    }

    
    callWordChange() {

        if (this._currentWord !== -1) {
            this.value = this._wordList[this._currentWord];
        }

        if (this.onWordChange !== null) {
            this.onWordChange(this._wordIdList[this._currentWord]);
        }
        
    }
    
    
}
