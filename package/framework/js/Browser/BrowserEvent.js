export default class BrowserEvent {

    set onBackButton(value) {

        window.onhashchange = function () {
            value();
        }


        /*
        if (window.history && window.history.pushState) {

            window.history.pushState('forward', null, './#forward');

            $(window).on('popstate', function() {
                //alert('Back button was pressed.');
                value();
            });

        }*/

    }

}