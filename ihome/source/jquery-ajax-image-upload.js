/**
 *  jQuery Ajax Image Upload
 *
 *  Facilitates the process of uploading an image via Ajax and using PHP to create a thumbnail,
 *  return the image source and display to the user as a thumbnail of the image uploaded. All
 *  without the page reloading.
 *
 *  @copyright   Copyright (c) 2012 jQuery4u
 *  @license     http://jQueryuery4u.com/license/
 *  @link        http://jQueryuery4u.com
 *  @since       Version 1.0
 *  @author      Sam Deering
 *  @filesource  jQueryuery-ajax-image-upload.js
 *
 */
(function($,W,D,undefined)
{
    W.JQUERY4U = W.JQUERY4U || {};
    W.JQUERY4U.AJAXIMAGEUPLOAD = {
        name: "jQuery Ajax Image Upload 1.0",
        namespace: "W.JQUERY4U.AJAXIMAGEUPLOAD",
        settings:
        {
            formId: '#upload-image-form',
            uploadImageUrl: '/cp.php?ac=upload&file=uploadbg&type=pic'
        },
        cache:
        {
        },
        init: function(settings)
        {
            this.settings = jQuery.extend({}, this.settings, settings);
            this.cache.$form = jQuery(this.settings.formId);
            this.cache.$imgPreview = jQuery('#image_preview');
            this.cache.$imgOriginal = jQuery('#image_original');
            this.setupEventHandlers();
        },
        setupEventHandlers: function()
        {
            var _this = this;
           var $input = $('#image-upload');
            var someFunction = function(e)
	    {
    	       console.log('uploading image...');
                _this.uploadImage();	
            };
            if ($.browser.msie)
	    {
		$input.click(function(event)
    		{
        		setTimeout(function()
        		{
            			if($input.val().length > 0) {
              				someFunction(event);
            			}
        		}, 0);
    		});
	     }
	     else
	     {
	       	$input.change(someFunction);
	     }  
     },
        uploadImage: function()
        {
	    var _this = this,
             $imgInput = jQuery('#image-upload');
            this.cache.$form.find('.loading').show();
            this.cache.$imgPreview.hide();
            this.cache.$imgOriginal.hide();
   	    jQuery.ajaxFileUpload(
            {
                url: _this.settings.uploadImageUrl,
                secureuri: false,
                fileElementId: 'image-upload',
                dataType: "json",
                success: function(data)
                {
                    console.log(data);
                    _this.cache.$imgPreview.attr('src',data.thumb.img_src);
                    _this.cache.$imgOriginal.attr('src',data.master.img_src);
                    jQuery('#image-upload').hide();
                    jQuery('#remove-image-upload').show();
                    jQuery('#bg').val(data.master.img_src);
                    jQuery('#use_bg').attr('checked', 'checked');
                },
                error: function(xhr, textStatus, errorThrown)
                {
                    console.log(xhr, textStatus, errorThrown + 'error');
                    return false;
                },
                complete: function()
                {
                    //hide loading image
                    _this.cache.$form.find('.loading').hide();
                    _this.cache.$imgPreview.show();
                    _this.cache.$imgOriginal.show();
                }
            });
        },
        submitForm: function()
        {
        }
    }
    W.JQUERY4U.AJAXIMAGEUPLOAD.init();
    $(D).ready( function()
    {
        //start up the form events
        W.JQUERY4U.AJAXIMAGEUPLOAD.init();
    });
})(jQuery,window,document);
jQuery.extend({
    objToString:function (obj)
    {
        var str = '<p>';
        for (var p in obj) {
            if (obj.hasOwnProperty(p)) {
                str += p + ' = ' + obj[p] + '\n<br/>';
            }
        }
        str += "</p>";
        return str;
    },
    handleError: function(s, xml, status, e)
    {
        //silent ???
        console.log('error occured...');
        console.log(s, xml, status, e);
    },
    createUploadIframe: function(id, uri)
    {
            //create frame
            var frameId = 'jUploadFrame' + id;
            if(window.ActiveXObject) {
                var io = document.createElement('<iframe id="' + frameId + '" name="' + frameId + '" />');
                if(typeof uri== 'boolean'){
                    io.src = 'javascript:false';
                }
                else if(typeof uri== 'string'){
                    io.src = uri;
                }
            }
            else {
                var io = document.createElement('iframe');
                io.id = frameId;
                io.name = frameId;
            }
            io.style.position = 'absolute';
            io.style.top = '-1000px';
            io.style.left = '-1000px';
            document.body.appendChild(io);
            return io
    },
    createUploadForm: function(id, fileElementId)
    {
        //create form
        var formId = 'jUploadForm' + id;
        var fileId = 'jUploadFile' + id;
        var form = jQuery('<form  action="" method="POST" name="' + formId + '" id="' + formId + '" enctype="multipart/form-data"></form>');
        var oldElement = jQuery('#' + fileElementId);
        var newElement = jQuery(oldElement).clone();
        jQuery(oldElement).attr('id', fileId);
        jQuery(oldElement).before(newElement);
        jQuery(oldElement).appendTo(form);
        //set attributes
        jQuery(form).css('position', 'absolute');
        jQuery(form).css('top', '-1200px');
        jQuery(form).css('left', '-1200px');
        jQuery(form).appendTo('body');
        return form;
    },
    ajaxFileUpload: function(s) {
        // TODO introduce global settings, allowing the client to modify them for all requests, not only timeout
        s = jQuery.extend({}, jQuery.ajaxSettings, s);
        var id = new Date().getTime()
        var form = jQuery.createUploadForm(id, s.fileElementId);
        var io = jQuery.createUploadIframe(id, s.secureuri);
        var frameId = 'jUploadFrame' + id;
        var formId = 'jUploadForm' + id;
        // Watch for a new set of requests
        if ( s.global && ! jQuery.active++ )
        {
            jQuery.event.trigger( "ajaxStart" );
        }
        var requestDone = false;
        // Create the request object
        var xml = {}
        if ( s.global )
            jQuery.event.trigger("ajaxSend", [xml, s]);
        // Wait for a response to come back
        var uploadCallback = function(isTimeout)
        {
            var io = document.getElementById(frameId);
            try
            {
                if(io.contentWindow)
                {
                     xml.responseText = io.contentWindow.document.body?io.contentWindow.document.body.innerHTML:null;
                     xml.responseXML = io.contentWindow.document.XMLDocument?io.contentWindow.document.XMLDocument:io.contentWindow.document;
                }else if(io.contentDocument)
                {
                     xml.responseText = io.contentDocument.document.body?io.contentDocument.document.body.innerHTML:null;
                    xml.responseXML = io.contentDocument.document.XMLDocument?io.contentDocument.document.XMLDocument:io.contentDocument.document;
                }
            }catch(e)
            {
                jQuery.handleError(s, xml, null, e);
            }
            if ( xml || isTimeout == "timeout")
            {
                requestDone = true;
                var status;
                try {
                    status = isTimeout != "timeout" ? "success" : "error";
                    // Make sure that the request was successful or notmodified
                    if ( status != "error" )
                    {
                        // process the data (runs the xml through httpData regardless of callback)
                        var data = jQuery.uploadHttpData( xml, s.dataType );
                        // If a local callback was specified, fire it and pass it the data
                        if ( s.success )
                            s.success( data, status );
                        // Fire the global callback
                        if( s.global )
                            jQuery.event.trigger( "ajaxSuccess", [xml, s] );
                    } else
                        jQuery.handleError(s, xml, status);
                } catch(e)
                {
                    status = "error";
                    jQuery.handleError(s, xml, status, e);
                }
                // The request was completed
                if( s.global )
                    jQuery.event.trigger( "ajaxComplete", [xml, s] );
                // Handle the global AJAX counter
                if ( s.global && ! --jQuery.active )
                    jQuery.event.trigger( "ajaxStop" );
                // Process result
                if ( s.complete )
                    s.complete(xml, status);
                jQuery(io).unbind()
                setTimeout(function()
                                    {   try
                                        {
                                            jQuery(io).remove();
                                            jQuery(form).remove();
                                        } catch(e)
                                        {
                                            jQuery.handleError(s, xml, null, e);
                                        }
                                    }, 100)
                xml = null
            }
        }
        // Timeout checker
        if ( s.timeout > 0 )
        {
            setTimeout(function(){
                // Check to see if the request is still happening
                if( !requestDone ) uploadCallback( "timeout" );
            }, s.timeout);
        }
        try
        {
           // var io = $('#' + frameId);
            var form = jQuery('#' + formId);
            jQuery(form).attr('action', s.url);
            jQuery(form).attr('method', 'POST');
            jQuery(form).attr('target', frameId);
            if(form.encoding)
            {
                form.encoding = 'multipart/form-data';
            }
            else
            {
                form.enctype = 'multipart/form-data';
            }
            jQuery(form).submit();
        } catch(e)
        {
            jQuery.handleError(s, xml, null, e);
        }
        if(window.attachEvent){
            document.getElementById(frameId).attachEvent('onload', uploadCallback);
        }
        else{
            document.getElementById(frameId).addEventListener('load', uploadCallback, false);
        }
        return {abort: function () {}};
    },
    uploadHttpData: function( r, type ) {
        var data = !type;
        data = type == "xml" || data ? r.responseXML : r.responseText;
        // If the type is "script", eval it in global context
        if ( type == "script" )
            jQuery.globalEval( data );
        // Get the JavaScript object, if JSON is used.
        if ( type == "json" )
            eval( "data = " + data );
        // evaluate scripts within html
        if ( type == "html" )
            jQuery("<div>").html(data).evalScripts();
            //alert($('param', data).each(function(){alert($(this).attr('value'));}));
        return data;
    }
});
