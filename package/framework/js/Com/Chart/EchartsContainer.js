import DivContainer from "../../../html/Content/Div.js";
import * as echarts from '../../../../asset/echarts/echarts.esm.js';
import DocumentContainer from "../../../html/Document/Document.js";
import ChartType from "./ChartType.js";

export default class EchartsContainer extends DivContainer {

    //chartTitle;

    chartType;

    _seriesX = [];

    _seriesY = [];

    _chart = null;


    constructor(parentContainer) {

        super(parentContainer);

        this.widthPixel = 500;
        this.heightPixel = 500;

        this._chart = echarts.init(this._htmlElement);
        this._chart.setOption({
            animation: false
        });

        this.chartType=ChartType.LINE;

        let local = this;

        let document = new DocumentContainer();
        document.onLoaded = function () {
            local._chart.resize();
        };
        document.onResize = function () {
            local._chart.resize();
        };


    }


    addValueX(value) {

        this._seriesX.push(value);
        return this;

    }


    addValueY(value) {

        this._seriesY.push(value);
        return this;

    }



    renderChart() {

        this._chart.setOption({
            xAxis: {
                data: this._seriesX
            },
            yAxis: {},
            series: [{
                name: 'temp',
                type: this.chartType,  //'line',
                data: this._seriesY
            }]
        });

    }


    render() {


        this.renderChart();





    }


    clearChart() {

        this._seriesX = [];
        this._seriesY = [];

        //this._chart.cleanData();
        if (this._chart !== null) {
            //this._chart.destroy();
        }

        return this;

    }


    set chartTitle(value) {

        this._chart.setOption({
            title: {
                text: value
            }
        });

    }


}