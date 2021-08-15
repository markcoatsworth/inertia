// INERTIA Global Object
 if (typeof INERTIA == "undefined" || !INERTIA) {
    var INERTIA = {};
}

INERTIA.util = {
    hasConsole:false,
    writeLog:false,
    init:function(){
        if (window.console) {
            this.hasConsole = true;
        }
    },
    log:function(msg){
        if(this.writeLog == true){
            if(this.hasConsole == true){
                window.console.log(msg);
            }
            else{
                alert(msg);
            }        
        }
    },
    rand:function(){
        return Math.floor(Math.random()*100000);
    }
}

INERTIA.ie = {
     pngSupport:function(){
        $(document).pngFix();        
     }
};

INERTIA.EventsList = {
	init: function() {
		$("ul.eventsList div.image").hover(function(e) {
			imageFile = $(this).children().children("img").attr("src");
			imagePath = "/img/Events" + imageFile.substr(imageFile.lastIndexOf("/"));
			
			$("body").append("<div id='EventFlyerPreview'><img src="+imagePath+" /></div>");								 
			$("div#EventFlyerPreview")
				.css("top",(e.pageY - 200) + "px")
				.css("left",(e.pageX + 20) + "px")
				.fadeIn("fast");						
	    },
		function() {
			$("div#EventFlyerPreview").remove();
	    });	
		$("ul.eventsList div.image").mousemove(function(e){
			$("#EventFlyerPreview")
				.css("top",(e.pageY - 200) + "px")
				.css("left",(e.pageX + 20) + "px");
		});
	}
};


INERTIA.EventAdd = {
	init: function() {
		$("table.add select#EventDateMin").find('option').remove();	
		$("table.add select#EventDateMin").append('<option value="0">00</option>')
			.append('<option value="15">15</option>')
			.append('<option value="30">30</option>')
			.append('<option value="45">45</option>');
	}
}

INERTIA.EventAdminIndex = {
	init: function() {
		$("form#eventsFilter select.year").change(function() {
			$("form#eventsFilter").submit();
		});
	}

}

INERTIA.EventAdminEdit = {
	init: function() {
		var selectedVal = $("table.edit select#EventDateMin").find('option:selected').val();
		$("table.edit select#EventDateMin").find('option').remove();	
		$("table.edit select#EventDateMin").append('<option value="0">00</option>')
			.append('<option value="15">15</option>')
			.append('<option value="30">30</option>')
			.append('<option value="45">45</option>');
		$("table.edit select#EventDateMin option[value='"+selectedVal+"']").attr("selected", "selected");
		
	}
}

INERTIA.EventView = {
	init: function() {
		$("div.eventView div.moreinfo a").attr("target", "_blank");	
	}
}



//jQuery Ready
$(document).ready(function(){
    if ($.browser.msie && $.browser.version == 6){
        INERTIA.ie.pngSupport();
    }
    
    // Initialize Event List actions
    INERTIA.EventsList.init(); 

    // Initialize Event Add actions
    INERTIA.EventAdd.init(); 
    
    // Initialize Event View actions
    INERTIA.EventView.init();
    
    // Initialize Event Admin Index actions
    INERTIA.EventAdminIndex.init();

    // Initialize Event Admin Edit actions
    INERTIA.EventAdminEdit.init();
    
});






