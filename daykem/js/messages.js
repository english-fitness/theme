function historyPush(html,element,url) {
    if(html.redirect) {
        $(html.element).redirectAjax(html.redirect,function(page){
            historyPush(page,this.event.selector,this.url);
        });
    }else{
        History.pushState({
            content:html.content,
            element:element
        },html.title,url);
    }
}
(function(e){

    $.fn.historyPush = function(html,url) {
        var _this = this;
        if(html.redirect) {
            $(this.selector).redirectAjax(html.redirect,function(page){
                historyPush(page,_this.selector,url);
            });
        }else{
            History.pushState({
                content:html.content,
                element:this.selector
            },html.title,url);
        }
    }
    $.fn.ajaxLoadPage = function(success) {
        var _self = this;
        var loadPage = {
            /* init */
            init: function() {
                this.linkClick();
            },


            /* link click*/
            linkClick: function() {
                var _this = this;
                $('body').on("click",_self.selector,function(){
                    var url =  $(this).attr("href");
                    if(e.location.pathname!=url) {
                        loading.created();
                        _this.ajaxLoad(url);
                    }
                    return false;
                });
            },

            /* load page*/
            ajaxLoad: function(url) {
                $.ajax({
                    type:'post',
                    url:url,
                    async:true,
                    success:success
                })
            }
        }
        loadPage.init();
    }
    /* ajaxForm*/
    $.fn.ajaxFormMessage = function(success) {
        var _self = this;
        var ajaxForm = {
            /* init */
            init: function() {
                this.formSubmit();
            },

            /* link click*/
            formSubmit: function() {
                var _this = this;
                $('body').on("submit",_self.selector,function(event){
                    $(this).find('button').attr("disabled","");
                    var element = $(this);
                    _this.ajaxLoad(element)
                    return false;
                });
            },

            /* load page*/
            ajaxLoad: function(element) {
                $.ajax({
                    type:element.attr("method"),
                    url:element.attr("action"),
                    data:element.serialize(),
                    event:element,
                    async:true,
                    success:success
                });
            }
        }
        ajaxForm.init();
    };

    $.fn.redirectAjax =function(url,success) {
        var _this = this;
        $.ajax({
            type:'get',
            url:url,
            async:true,
            event:_this,
            success:success
        })
    }
    /* load page init*/
    $(document).ready(function(){

        /* ajax Load Page */
        $("a.AjaxLoadPage").ajaxLoadPage(function(page){
            historyPush(page,"#main-center",this.url);
            loading.removed();
        });

        /* ajax Load Page */
        $(".AjaxLoadPage a").ajaxLoadPage(function(page){
            historyPush(page,"#main-center",this.url);
            loading.removed();
        });

        /* ajaxForm*/
        $(".ajaxForm").ajaxFormMessage(function(html){
            loading.removed();
            if(html.success==true) {
                historyPush(html,this.event.selector,this.url);
            }else{
                var notice ='';
                $.each(html.notice,function(index,value){
                    notice += value+' ';
                });
                $(".successErrors").html(notice);
            }
            $(this.event).find('button').removeAttr("disabled");
        });
        // Bind to State Change
        History.Adapter.bind(window,'statechange',function(){ // Note: We are using statechange instead of popstate

            // Log the State
            var State = History.getState(); // Note: We are using History.getState() instead of event.state
            if(State) {
                $(State.data.element).html(State.data.content);
                document.title = State.title;
            }
        });

    })
})(window);