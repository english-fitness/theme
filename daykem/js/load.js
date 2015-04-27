(function(f){
    jQuery.fn.extend({

        /*Scroll load content*/
        scrollLoadContent: function(c) {

           this.events = c;
           this.loadContent();
           this.scrollLoad();
        },

        /*status*/
        status: true,

        /* Load content default limit*/
        loadContent: function() {
            this.ajaxLoadEvents();
        },

        /* ajax load events url*/
        ajaxLoadEvents: function() {

            var self = this;
            $.ajax({
                type:'POST',
                url:this.events.events,
                data:'data='+this.setData(),
                success: function(event) {

                    if(event){
                        $(self.selector).append(event);
                    }else{
                        self.start = false;
                    }
                }
            });
        },

        /*Setting events*/
        events: null,

        /*Get scroll bottom */
        scrollLoad:  function() {
            var self  = this;
            $(window).scroll(function(){
                var t = $(document).scrollTop(),
                    h = $(window).height(),
                    dh = $(document).height(),
                    b = dh-(h+t);
                    if(b==0 && self.status){
                        self.setStart();
                        self.loadContent();
                    }
            });
        },

        /*Set data*/
        setData: function() {

            this.setLimit();
            return JSON.stringify(this.events.data);
        },

        /*Set start */
        setStart: function() {

            this.start +=this.events.limit;
        },

        /* start */
        start: 0,

        /*Set limit*/
        setLimit: function() {

            this.events.data.limit = this.start+","+this.events.limit;
        }
    });
})(jQuery);
/*
$(document).ready(function(){

    $(".logo").scrollLoadContent({
        events:'/student/notification/ajaxView',
        data: {
            notification:1
        },
        limit: 20,
        start:0
    });
});

*/

