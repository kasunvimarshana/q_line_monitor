if (typeof jQuery === "undefined") {
  throw new Error("requires jQuery");
}
/*
$.fn.extend({
	custom_method: function ( data ) {
	}
});
*/
/*
$.fn.function_name = function( data ){};
*/
/* document ajax complete */
$(function($){
    $( document ).ajaxStart(function() {
        window.is_ajax_process_start = true;
    });
    $( document ).ajaxComplete(function( event, xhr, settings ) {
        window.is_ajax_process_start = false;
    });
});
/* table ajax reload timer */
(function($) {
	$.fn.dataTable.Api.register( 'ajax_reload_timer', function ( data ) {
	window.ajax_reload_timer_obj;
	if(!$.isArray(window.ajax_reload_timer_obj)){
		window.ajax_reload_timer_obj = $.makeArray();
	}
	var table = this;
	var table_obj = $(this.table().node());//this.table().node().id
	var timer;
	var delay;
	var state;
	timer = table_obj.data("ajax_reload_timer_id");
	delay = table_obj.data("ajax_reload_timer_delay");
	state = table_obj.data("ajax_reload_timer_state");
	timer = parseInt(timer);
	delay = parseInt(delay);
	this.start = function ( data ) {
		if( this.isEnable() ){
			this.stop( timer );
			delay = $.isNumeric(data) ? data : delay;
			delay = $.isNumeric(delay) ? delay : (1000 * 60);
			timer = window.setInterval( function () {
                //table.ajax.reload( null, false ); // user paging is not reset on reload
                var is_table_draw_start = table_obj.data("is_table_draw_start");
                if((is_table_draw_start !== true) && (window.is_ajax_process_start !== true)){
                    table_obj.data("is_table_draw_start", true);
                    table.ajax.reload( null, false ); // user paging is not reset on reload
                    table.on( 'draw', function () {
                        table_obj.data("is_table_draw_start", false);
                    } );
                }
			}, delay );
			window.ajax_reload_timer_obj.push(timer);
			table_obj.data("ajax_reload_timer_id", timer);
			table_obj.data("ajax_reload_timer_delay", delay);
		}
	};
	this.stop = function ( data ) {
		data = parseInt(data);
		data = $.isNumeric(data) ? data : timer;
		window.clearInterval(data);
		window.ajax_reload_timer_obj.splice($.inArray(window.ajax_reload_timer_obj, data), 1);
		table_obj.data("ajax_reload_timer_id", false);
	};
	this.isRunning = function ( data ) {
		data = parseInt(data);
		if($.inArray(data, window.ajax_reload_timer_obj) > -1){
			return true;
		}
		return false;
	};
	this.enable = function ( data ) {
		state = true;
		table_obj.data("ajax_reload_timer_state", state);
		this.start();
	};
	this.disable = function ( data ) {
		state = false;
		table_obj.data("ajax_reload_timer_state", state);
		this.stop(timer);
	};
	this.isEnable = function ( data ) {
		return !(state === false);
	};
	return this;
} );
})($);
/* custom alert */
(function($) {
	$.extend({
		alert : function (message, title) {
			var obj = $("<div></div>");
			obj.html(message);
			obj.dialog({
				classes : {
					"ui-dialog"           : "modal-content text-center",
					"ui-dialog-titlebar"  : "modal-header text-center",
    				"ui-dialog-title"     : "modal-title",
    				"ui-dialog-titlebar-close": "close",
    				"ui-dialog-content"   : "modal-body",
    				"ui-dialog-buttonpane": "modal-footer"
				},
				title   : title,
				//autoOpen: false,
      			   show : {
					   effect : "highlight",
     				   //duration : 100
				   },
      			   hide : {
					   effect: "scale",
        			   //duration: 100
				   },
				buttons : [{
					text : "OK",
					icon : "ui-icon-blank",
					click: function() {
						$( this ).dialog( "close" );
					}
				}],
				  close : function (event, ui){
					  //$(this).remove();
					  obj.remove();
				  },
				  modal : true
			});
			return obj;
		}
	});
})($);