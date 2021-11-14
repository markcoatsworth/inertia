// INERTIA Global Object
 if (typeof INERTIA == "undefined" || !INERTIA) {
    var INERTIA = {};
}

INERTIA.util = {
    init: function(){
        ClassicEditor
            .create(document.querySelector('textarea'))
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#moreinfo'))
            .catch(error => {
                console.error(error);
            });
    }
}

INERTIA.EventAdminIndex = {
    init: function() {
        $("form#eventsFilter select.year").change(function() {
            $("form#eventsFilter").submit();
        });
    }

}

$(document).ready(function(){
    INERTIA.util.init();
    INERTIA.EventAdminIndex.init();
});






