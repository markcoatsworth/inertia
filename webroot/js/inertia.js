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

$(document).ready(function(){
    console.log("Calling INERTIA.util.init");
    INERTIA.util.init();
});






