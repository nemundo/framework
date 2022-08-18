export default class MapLayerStyle {

    color = "red";

    width = 1;

    fill = false;


    getStyle() {

        let style = new ol.style.Style({
            stroke: new ol.style.Stroke({
                color: this.color,
                width: this.width
            })/*,
            fill: new ol.style.Fill({
                color: this.color,
                width: this.width
            })*/
        });


        if (this.fill) {

            style.setFill(new ol.style.Fill({
                color: this.color,
                width: this.width
            }));

        }

        return style;

    }


}