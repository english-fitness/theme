function popup(config)
{
    var popupID = "popupAll",
        popupBackgroundID = "popup_background",
        popupMainID = "popup";
    createPopup().init();
    function resizePopup()
    {
        var heightWindow = $(window).height(),
            heightPopup =  $("#"+popupID+" #"+popupMainID).height(),
            marginTop = (heightWindow - heightPopup)/ 2;
            $("#"+popupID+" #"+popupMainID).css({
                "margin-top":marginTop
            });

    }

    function createPopup()
    {
        var create = {
            init: function()
            {
                removePopupByID(popupID);
                this.append();
                templatesPopup();
                removeScrollDocument();
                eventPopup();

            },
            popupForm: function(){
                var self = this;
                var temp = {
                    input: function(settings)
                    {
                        var setting = self.optionHtml(settings);
                        return '<input '+setting+'/>';
                    },
                    textarea: function(settings,value)
                    {
                        var setting = self.optionHtml(settings,value);
                        return '<textarea '+setting+'>'+value+'</textarea>';
                    },
                    button: function(settings,value)
                    {
                        var setting = self.optionHtml(settings,value);
                        return '<button '+setting+'>'+value+'</button>';
                    },
                    select: function(settings,value)
                    {
                        var setting = self.optionHtml(settings,value);
                        return '<select '+setting+'>'+value+'</select>';
                    },
                    option:function(key,value,selected)
                    {
                        return '<option '+selected+' value="'+key+'">'+value+'</option>'
                    }
                }
                return temp;
            },
            append: function()
            {
                var popup =
                    "<div id='"+popupID+"'>" +
                        "<div id='popupContent'>" +
                            "<div id='"+popupMainID+"'>" +
                                "<div class='popupTitle'>"+config.title+"<div class='remove'><i class='icon-remove-sign'></i></div></div>";
                                popup +="<div class='noticeForm'></div>";
                                popup +=config.content(this);
                        popup +="</div>" +
                        "</div>";
                    popup +=
                        "<div id='"+popupBackgroundID+"'></div>" +
                    "</div>";
                $("body").append(popup);
            },
            getForm: function(settings)
            {
                var setting =this.optionHtml(settings);
                var form = "<form "+setting+">";
                return form;
            },
            endForm: function(settings,value)
            {
                var setting =this.optionHtml(settings);
                var form =this.rowForm("&nbsp;","<button type='submit' "+setting+">"+value+"</button>");
                form +="</form>";
                return form;
            },
            newRow: function(label,value)
            {
                var form = '<div class="row-form"><div class="label">'+label+'</div><div class="value">'+value+'</div> </div>'
                return form;
            },
            plan_duration:function (){
                var i,
                    optionHtml;
                for(i=30;i<=180;i+=30){
                    optionHtml +='<option value="'+i+'">'+i+'p</option>';
                }
                return optionHtml;
            },
            optionHtml: function(settings){
                var setting =" ";
                $.each(settings,function(index,value){
                    setting += index+"='"+value+"' ";
                })
                return setting;
            },
            selectTimeOption: function(settings,selects)
            {
                var setting =this.optionHtml(settings);
                var form ="<select "+setting+">" +this.timeRegisterOption(selects)+"</select>";
                return form;
            },
            timeRegisterOption: function(selects){
                var temp = this.tempForm();
                var i,
                    optionHtml = "",
                    ii,
                    aa;
                for(i=0;i<24;i++){
                    if(i<10){
                        ii="0"+i;
                    }else{
                        ii=i;
                    }
                    var a=0;
                    for(a=0;a<=59;a+=15){
                        if(a<10){
                            aa="0"+a;
                        }else{
                            aa=a;
                        }
                        var time = ii+':'+aa;
                        if(selects==time){
                            var slt = "selected='selected'";
                        }else{
                            var slt = "";
                        }
                        optionHtml +=temp.option(time,time,slt);
                    }
                }
                return optionHtml;
            }
        }
        return create;
    }
    function templatesPopup(){
        $("#"+popupID).css({
            "position":"fixed",
            "top":"0px",
            "bottom":"0px",
            "left":"0px",
            "right":"0px",
            "z-index":99999
        });
        $("#"+popupID+" #popupContent").css({
            "position":"fixed",
            "top":"0px",
            "bottom":"0px",
            "left":"0px",
            "right":"0px",
            "z-index":99999
        });
        $("#"+popupID+" #"+popupBackgroundID).css({
            "position":"fixed",
            "background":"#333333",
            "opacity": "0.8",
            "top":"0px",
            "bottom":"0px",
            "left":"0px",
            "right":"0px",
            "z-index":999
        });
        $("#"+popupID+" #"+popupMainID).css({
            "width":config.width,
            "margin":"auto",
            "background":"#ffffff",
            "box-shadow":"0px 0px 20px #000000",
            "z-index":99999
        });
    };
    function eventPopup(){
        resizePopup();
        $(window).resize(function(){
            resizePopup();
        });
        $(window).keydown(function(e){
            keyDown(e.which);
        });
        $(document).on("click","#"+popupID+" #"+popupMainID+" div.remove",function(){
            removePopupByID(popupID);
        });
        $(document).on("click","#"+popupID+" #popupContent",function(event){
            var tag = event.target;
            var id =$(tag).attr("id");
            if(id=="popupContent"){
                removePopupByID(popupID);
            }
        });
        $("#"+popupID+" #popupContent #"+popupMainID).resizable();
    }
    function keyDown(e)
    {
        if(e==27)
        {
            removePopupByID(popupID);
        }
    }
}
function removeScrollDocument()
{
    $("body").css("overflow-y","hidden");
}
function setOpenScrollDocument()
{
    $("body").css("overflow-y","auto");
}
function removePopupByID(popupID)
{
    setOpenScrollDocument();
    $("#"+popupID).remove();
}
//Open popup OauthPopup ConnectWithOAuth
(function (jQuery) {
    jQuery.oauthpopup = function (options) {
        options.windowName = options.windowName || 'ConnectWithOAuth';
        options.windowOptions = options.windowOptions || 'menubar=0,toolbar=0,status=0,directories=0,width='+options.width+',height='+options.height+',top='+options.top+',left='+options.left+',scrollbars=1';
        options.callback = options.callback || function () {
            window.location.href = options.callbackUri;
        };
        var that = this;
        that._oauthWindow = window.open(options.path, options.windowName, options.windowOptions);
        that._oauthInterval = window.setInterval(function () {
            if (that._oauthWindow.closed) {
                window.clearInterval(that._oauthInterval);
                options.callback();
            }
        }, 1000);
    };
})(jQuery);

//Open Oauth Popup Url connect sosial network
function OpenOauthPopup(oauthUrl, returnUri, w, h){
	$.oauthpopup({
		path: oauthUrl,
		width: w,
		height: h,
		callbackUri: returnUri,
		top:(screen.height/2)-(h/2),
		left:(screen.width/2)-(w/2),
		callback: function(){
			window.location.href = returnUri;
		}
	});
	$("body").append('<div id="popup_background" style="position: fixed; background: none repeat scroll 0% 0% rgb(51, 51, 51); opacity: 0.8; top: 0px; bottom: 0px; left: 0px; right: 0px; z-index: 99999;"></div>' );
}

//Oauth Popup Url connect sosial network: Facebook, Google
function oauthLoginPopup(oauthUrl, width, height){
	OpenOauthPopup(oauthUrl, '/site/loggedRedirect', width, height);
}

function oauthConnectPopup(oauthUrl, width, height){
	OpenOauthPopup(oauthUrl, '/site/connectedRedirect', width, height);
}

//Enter whiteboard popup for student, teacher
function enterWhiteboard(whiteboard, boardLink, checkValidBrowser, checkEnterTime){
	if(!checkValidBrowser){
		alert("Phiên bản trình duyệt của bạn không hỗ trợ để vào lớp học ảo!\nVui lòng cập nhật phiên bản mới hơn để được hỗ trợ!(Trình duyệt hỗ trợ tốt nhất là Chrome & Firefox)");
		return false;
	}else if(!checkEnterTime){
		window.open(boardLink, "Whiteboard", "menubar=no,status=no,toolbar=no,scrollbars=no,directories=no,fullscreen=yes");
	}else{
		$.ajax({
			url: daykemBaseUrl + "/site/enterBoard",
			type: "POST", dataType: 'JSON',data:{'whiteboard': whiteboard},
			success: function(data) {

			}
		});
		window.open(boardLink, "Whiteboard", "menubar=no,status=no,toolbar=no,scrollbars=no,directories=no,fullscreen=yes");
	}
}