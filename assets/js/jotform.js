/*jslint nomen:false, debug:true, evil:true, vars:false, browser:true, forin:true, undef:false, white:false */
/**
 * JotForm Form object
 */
var JotForm = {
    /**
     * JotForm domain
     * @var String
     */
    url: "//www.jotform.com/", // Will get the correct URL from this.getServerURL() method
    /**
     * JotForm request server location
     * @var String
     */
    server: "//www.jotform.com/server.php", // Will get the correct URL from this.getServerURL() method
    /**
     * All conditions defined on the form
     * @var Object
     */
    conditions: {},
    /**
     * Condition Values
     * @var Object
     */
    condValues: {},
    /**
     * All JotForm forms on the page
     * @var Array
     */
    forms: [],
    /**
     * Will this form be saved on page changes
     * @var Boolean
     */
    saveForm: false,
    /**
     * Array of extensions
     * @var Array
     */
    imageFiles: ["png", "jpg", "jpeg", "ico", "tiff", "bmp", "gif", "apng", "jp2", "jfif"],
    /**
     * array of autocomplete elements
     * @var Object
     */
    autoCompletes: {},
    /**
     * Array of default values associated with element IDs
     * @var Object
     */
    defaultValues: {},
    /**
     * Debug mode
     * @var Boolean
     */
    debug: false,
    /**
     * Check if the focused inputs must be highligted or not
     * @var Boolean
     */
    highlightInputs: true,
    /**
     * it will disable the automatic jump to top on form collapse
     * @var Boolean
     */
    noJump: false,
    /**
     * Indicates that form is still under initialization
     * @var Boolean
     */
    initializing: true,
    /**
     * Keeps the last focused input
     * @var Boolean
     */
    lastFocus: false,
    /**
     * Status of multipage save
     * @var Boolean
     */
    saving: false,
    /**
     * Texts used in the form
     * @var Object
     */
    texts: {
        confirmEmail:       'E-mail does not match',
        pleaseWait:         'Please wait...',
        confirmClearForm:   'Are you sure you want to clear the form',
        lessThan:           'Your score should be less than or equal to',
        incompleteFields:   'There are incomplete required fields. Please complete them.',
        required:           'This field is required.',
        requireOne:         'At least one field required.', 
        requireEveryRow:    'Every row is required.',
        email:              'Enter a valid e-mail address',
        alphabetic:         'This field can only contain letters',
        numeric:            'This field can only contain numeric values',
        alphanumeric:       'This field can only contain letters and numbers.',
        uploadExtensions:   'You can only upload following files:',
        uploadFilesize:     'File size cannot be bigger than:',
        gradingScoreError:  'Score total should only be less than or equal to',
        inputCarretErrorA:  'Input should not less than the minimum value:',
        inputCarretErrorB:  'Input should not greater than the maximum value:',
        maxDigitsError:     'The maximum digits allowed is'
    },
    /**
     * Find the correct server url from forms action url, if there is no form use the defaults
     */
    getServerURL: function() {
        var form = $$('.jotform-form')[0];
        var action;
        
        if (form) {
            if((action = form.readAttribute('action'))){
                if(action.include('submit.php') || action.include('server.php')){
                    var n = !action.include('server.php')? "submit" : "server";
                    this.server = action.replace(n+'.php', 'server.php');
                    this.url    = action.replace(n+'.php', '');
                }else{
                    var d = action.replace(/\/submit\/.*?$/, '/');
                    this.server = d + 'server.php';
                    this.url    = d;
                }
                
            }
        }
    },
    /**
     * Changes only the given texsts
     * @param {Object} newTexts
     */
    alterTexts: function(newTexts){
        Object.extend(this.texts, newTexts || {});
    },
    /**
     * A short snippet for detecting versions of IE in JavaScript
     * without resorting to user-agent sniffing
     */
    ie: function(){
        var undef,
            v = 3,
            div = document.createElement('div'),
            all = div.getElementsByTagName('i');
        
        while (
            div.innerHTML = '<!--[if gt IE ' + (++v) + ']><i></i><![endif]-->',
            all[0]
        );
        
        return v > 4 ? v : undef;
    },
    /**
     * Creates the console arguments
     */
    createConsole: function(){
        var consoleFunc = ['log', 'info', 'warn', 'error'];
        $A(consoleFunc).each(function(c){
            this[c] = function(){
                if(JotForm.debug){
                    if('console' in window){
                        try{
                            console[c].apply(this, arguments);
                        }catch(e){
                            if(typeof arguments[0] == "string"){
                                console.log( c.toUpperCase() + ": " + $A(arguments).join(', '));
                            }else{
                                if(Prototype.Browser.IE){
                                    alert(c+": "+arguments[0]);
                                }else{
                                    console[c](arguments[0]);
                                }
                            }
                        }
                    }
                }
            };
        }.bind(this));
        
        if(JotForm.debug){
            JotForm.debugOptions = document.readJsonCookie('debug_options');
        }
    },
    /**
     * Initiates the form and all actions
     */
    init: function(callback){
        var ready = function(){
            try {
                this.populateGet();
                
                if(document.get.debug == "1"){
                    this.debug = true;
                }
                this.createConsole();
                
                this.getServerURL();
                
                if(callback){ callback(); }
                
                if ((document.get.mode == "edit" || document.get.mode == "inlineEdit" || document.get.mode == 'submissionToPDF') && document.get.sid) {
                    this.editMode();
                }
                
                this.noJump = ("nojump" in document.get);                
                this.uniqueID = this.uniqid();
                this.checkMultipleUploads();
                this.handleSavedForm();
                this.setTitle();
                this.getDefaults();
                this.handlePayPalProMethods();
                this.handleFormCollapse();
                this.handlePages();


				// If form is hosted in an iframe, calculate the iframe height
				if (window.parent && window.parent != window) {
					this.handleIFrameHeight();
				}

                this.highLightLines();
                this.setButtonActions();
                this.initGradingInputs();
                this.initSpinnerInputs();
                this.initNumberInputs();
                this.setConditionEvents();
                this.prePopulations();
                this.handleAutoCompletes();
                this.handleTextareaLimits();
                this.handleDateTimeChecks();
                this.handleOtherOptions(); // renamed from handleRadioButtons
                this.setFocusEvents();
                this.disableAcceptonChrome();
                this.handleScreenshot();
                
                $A(document.forms).each(function(form){
                    if (form.name == "form_" + form.id || form.name == "q_form_" + form.id) {
                        this.forms.push(form);
                    }
                }.bind(this));
                if($$('div[id^=recaptcha_]').length==0) {
                    this.validator();
                }
                this.fixIESubmitURL();
                this.disableHTML5FormValidation();
            } catch (err) {
                 JotForm.error(err);
            }

            this.initializing = false; // Initialization is over
        }.bind(this);
        
        if(document.readyState == 'complete' || (this.jsForm && document.readyState === undefined) ){
            ready();
        }else{
            document.ready(ready);
        }
    },
    handleIFrameHeight: function () {
    	var height;
    	if ($$('.form-collapse-table').length > 0) {
    		height = $$('body')[0].getHeight();
    	} else if ($$('.form-section').length > 1) {
    		var maxHeight = 0;
			var body = $$('body')[0];
    		var sections = $$('.form-section');

    		// First hide all the pages
    		sections.each(function(section) {
    			section.setStyle({display: 'none'});
    		}); 
			
			// Dislay each page sequentially, and find the body height
    		sections.each(function(section) {
    			section.setStyle({display: 'block'});
    			if (maxHeight < body.getHeight()) {
    				maxHeight = body.getHeight();
    			}
				section.setStyle({display: 'none'});
    		});

			// Display the first page
    		sections[0].setStyle({display: 'block'});
    		height = maxHeight;
    	} else {
    		height = $$('body').first().getHeight();
    	}

	// if this is a captcha verification page, increase height to 300 
        // else, just add allowance for required fields' error messages
	height = ( document.title == 'Please Complete' ) ? 300 : height + 40;
    	window.parent.postMessage('setHeight:' + height, '*');
    },
    fixIESubmitURL: function () {
        try{
            // IE on XP does not support TLS SSL 
            // http://en.wikipedia.org/wiki/Server_Name_Indication#Support
            if(this.ie() <= 8 && navigator.appVersion.indexOf('NT 5.')){
                $A(this.forms).each(function(form){
                    if(form.action.include("s://submit.")){
                       form.action = form.action.replace(/\/\/submit\..*?\//, "//secure.jotform.com/"); 
                    }
                });
            }
        }catch(e){}
    },
    screenshot  : false, // Cached version of screenshot
    passive     : false, // States if wishbox iis getting screenshot passively
    onprogress  : false, // Are we currently processing a screenshot?
    compact     : false, // Use the compact mode of the editor
    imageSaved  : false, // Check if the image saved by screenshot editor
    /**
     * Find screenshot buttons and set events
     * HIDE or SHOW according to the environment
     */
    handleScreenshot: function(){
        var $this = this;
        setTimeout(function(){
            $$('.form-screen-button').each(function(button){
                //$this.getContainer(button).hide();
                // If window parent has feedback then show screenshot
                if(window.parent && window.parent.JotformFeedbackManager){
                    $this.getContainer(button).show();                
                    button.observe('click', function(){
                        $this.passive = false;
                        try{
                            $this.takeScreenShot(button.id.replace('button_', ''));
                        }catch(e){
                            console.error(e);
                        }
                    });
                    setTimeout(function(){
                        $this.passive = !window.parent.wishboxInstantLoad;
                        $this.takeScreenShot(button.id.replace('button_', ''));
                    }, 0);
                }
            });
        }, 300);
    },
    getCharset: function(doc){    
        if(!doc){ doc = document; }
        
        return doc.characterSet || doc.defaultCharset || doc.charset || 'UTF-8';
    },
    /*
    * Disables HTML5 validation for stopping browsers to stop submission process
    * (fixes bug of pending submissions when jotform validator accepts email field
    * and browsers' own validator doesn't ) 
    */
    disableHTML5FormValidation: function(){
        $$("form").each(function(f){
            f.setAttribute("novalidate",true);
        });
    },
    /**
     * When button clicked take the screenshot and display it in the editor
     */
    takeScreenShot: function(id){
        var p = window.parent;          // parent window
        var pleaseWait = '<div id="js_loading" '+
                         'style="position:fixed; z-index:10000000; text-align:center; '+
                         'background:#333; border-radius:5px; top: 20px; right: 20px; '+
                         'padding:10px; box-shadow:0 0 5 rgba(0,0,0,0.5);">'+
                         '<img src="'+this.url+'images/loader-black.gif" />'+
                         '<div style="font-family:verdana; font-size:12px;color:#fff;">'+
                         'Please Wait'+
                         '</div></div>';
                         
        if(this.onprogress){
            p.$jot(pleaseWait).appendTo('body');
            return;
        }
        
        if(p.wishboxCompactLoad){
            this.compact = true;
        }
        
        if(this.screenshot){
            if(this.compact){
                p.$jot('.jt-dimmer').hide();
            }else{
                p.$jot('.jt-dimmer, .jotform-feedback-link, .jt-feedback').hide();
            }
            
            p.jotformScreenshotURL = this.screenshot.data;
            this.injectEditor(this.screenshot.data, this.screenshot.shotURL);
            return;
        }
        
        this.scuniq = JotForm.uniqid(); // Unique ID to be used in the screenshot
        this.scID   = id;               // Field if which we will place the screen shot in
        var f = JotForm.getForm($('button_'+this.scID));
        this.sformID = f.formID.value;
        this.onprogress = true;
        var $this   = this;             // Cache the scope
        //this.wishboxServer = '//ec2-107-22-70-25.compute-1.amazonaws.com/wishbox-bot.php'; 
        this.wishboxServer = 'http://screenshots.jotform.com/wishbox-server.php'; //kemal: made this http since https not working anyway
        //this.wishboxServer = "//beta23.jotform.com/server.php";//JotForm.server;
        // Create a form element to make a hidden post. We need this to overcome xDomain Ajax restrictions
        var form = new Element('form', {action:this.wishboxServer, target:'screen_frame', id:'screen_form', method:'post', "accept-charset":'utf-8'}).hide();
        // Create a syntethic doctype for page source. This is the most common doctype so I choose this
        var doc  = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" >';
        // Hide Jotform specific page element on the parent, so they do not appear on screenshot
        
        /*if(this.compact){
            p.$jot('.jt-dimmer').hide();
        }else{*/
            p.$jot('.jt-dimmer, .jotform-feedback-link, .jt-feedback').hide();
        //}
        
        p.$jot('.hide-on-screenshot, .hide-on-screenshot *').css({'visibility':'hidden'});
        // Read the source of parent window
        var parentSource = p.document.getElementsByTagName('html')[0].innerHTML;
        parentSource = parentSource.replace(/(<noscript\b[^>]*>.*?<\/noscript>)+/gim, '');         // remove single line tags
        parentSource = parentSource.replace(/(<noscript\b[^>]*>(\s+.*\s+)+)+<\/noscript>/gim, ''); // remove multi line tags
        p.$jot('.hide-on-screenshot, .hide-on-screenshot *').css({'visibility':'visible'});
        parentSource = parentSource.replace(/(\<\/head\>)/gim, "<style>body,html{ min-height: 800px; }</style>$1");
        var ie = $this.ie();     
        // When it's the broken IE use a totally different aproach but IE9 works correctly so skip it
        if(ie !== undefined && ie < 9){
            parentSource = parentSource.replace(/(\<\/head\>)/gim, "<style>*{ border-radius:0 !important; text-shadow:none !important; box-shadow:none !important; }</style>$1");
        }

        if(this.passive){
            p.$jot('.jt-dimmer, .jotform-feedback-link, .jt-feedback').show();
        }else{
            p.$jot('.jotform-feedback-link').show();
            p.$jot(pleaseWait).appendTo('body');
        }
          
        // create form elements and place the values respectively
        var html  = new Element('textarea', {name:'html'});
        
        var nozip = this.getCharset(p.document).toLowerCase() !== 'utf-8';
        
        if(nozip){
            html.value    = encodeURIComponent(doc+parentSource+"</html>");
            form.insert(new Element('input', {type:'hidden', name:'nozip'}).putValue("1"));
        }else{
            form.insert(new Element('input', {type:'hidden', name:'nozip'}).putValue("0"));
            html.value    = encodeURIComponent(p.$jot.jSEND((doc+parentSource+"</html>")));
        }
        var charset   = new Element('input', {type:'hidden', name:'charset'}).putValue(this.getCharset(p.document));
        var height    = new Element('input', {type:'hidden', name:'height'}).putValue(parseFloat(p.$jot(p).height()));
        var scrollTop = new Element('input', {type:'hidden', name:'scrollTop'}).putValue(p.$jot(p).scrollTop());
        var url       = new Element('input', {type:'hidden', name:'url'}).putValue(p.location.href);
        var uid       = new Element('input', {type:'hidden', name:'uniqID'}).putValue(this.scuniq);
        var fid       = new Element('input', {type:'hidden', name:'formID'}).putValue(this.sformID);
        var action    = new Element('input', {type:'hidden', name:'action'}).putValue("getScreenshot");
        // This is the iframe that we will submit the form into
        var iframe    = new Element('iframe', {name:'screen_frame', id:'screen_frame_id'}).hide();
        // When iframe is loaded it usually means screenshot is completed but we still need to make sure.
        iframe.observe('load', function(){
            // Let's check server if screenshot correctly created there
            $this.checkScreenShot();
        });
        
        if(p.wishboxInstantLoad && (ie === undefined || ie > 8)){
            this.injectEditor(false, false);
        }
        
        // Insert all created elements on the page and directly submit the form
        form.insert(html).insert(height).insert(scrollTop).insert(action).insert(uid).insert(url).insert(fid).insert(charset);
        $(document.body).insert(form).insert(iframe);
        form.submit();
    },
    /**
     * Send a request to server and asks if given screenshot is created
     */
    checkScreenShot: function(){
        var $this = this;
        var p = window.parent;
        var count = 10; // will try 10 times after that it will fail
        
        p.$jot.getJSON('http://screenshots.jotform.com/queue/'+this.scuniq+'?callback=?',
            function(data) {
                if(data.success === true){
                    p.$jot.getJSON(data.dataURL+'?callback=?', function(res){
                        if($this.passive === false){
                            p.jotformScreenshotURL = res.data;
                            $this.injectEditor(res.data, res.shotURL); // If screenshot is created inject the editor on the page
                        }
                        $this.screenshot = res;
                        $this.onprogress = false;
                        // Remove the form and iframe since we don't need them anymore
                        $('screen_form') && $('screen_form').remove();
                        $('screen_frame_id') && $('screen_frame_id').remove();
                    });
                }else{
                    if((data.status == 'waiting' || data.status == 'working') && --count){
                        setTimeout(function(){
                            $this.checkScreenShot(); // If not try again. {TODO: We need to limit this check}
                        }, 1000);
                    }else{
                        alert('We are under heavy load right now. Please try again later.');
                        p.$jot('.jt-dimmer, .jotform-feedback-link').show();
                        p.$jot('.jt-feedback').show('slow');
                    }
                }
            }
        );
    },
    /**
     * Injects the screenshot editor on the page and sets necessery functions for editor to use
     */
    injectEditor: function(data, url){
        
        if(this.injected){
            return;
        }
        
        this.injected = true;
        var $this = this;
        var p     = window.parent;
        p.$jot('#js_loading').remove();
        
        // Ask for editor template code
        p.$jot.getJSON(this.server+'?callback=?', {
                action : 'getScreenEditorTemplate',
                compact: this.compact
            },
            function(res) {
                var iff  = '<iframe allowtransparency="true" id="wishbox-frame" src="" '+
                           'frameborder="0" style="display:none;border:none; ';
                    if(!$this.compact){
                        iff += 'position:fixed;top:0;width:100%;height:100%;left:0;z-index:100000000;';
                    }else{
                        iff += ('position:absolute;left:0;top:10px;height:'+(p.$jot(p).height()-120)+'px;width:'+((p.$jot(p).width()-100)-p.$jot('#js-form-content').width())+'px;');
                    }
                    iff += '" scrolling="no"></iframe>';
                var editorFrame;
                
                p.iframeWidth = ((p.$jot(p).width()-100)-p.$jot('#js-form-content').width());
                p.iframeHeight = (p.$jot(p).height()-120);
                
                // create an empty iframe on the page, we will then write the contents of this iframe manually
                if($this.compact){
                    editorFrame = p.$jot(iff).insertBefore('#js-form-content');
                }else{
                    editorFrame = p.$jot(iff).appendTo('body');
                }
                
                if($this.compact){
                    p.$jot('#js-form-content').css({  // when compact
                        'float':'right'
                    });
                }
                var ie = $this.ie();
                
                // When it's the broken IE use a totally different aproach but IE9 works correctly so skip it
                if(ie !== undefined && ie < 9){
                    // Set src for iframe inseat of writing the editor template in it.
                    editorFrame.attr('src', 'http://screenshots.jotform.com/opt/templates/screen_editor.html?shot='+url+'&uniq='+$this.scuniq);
                    // Put a close button outside of the iframe
                    var b = p.$jot('<button style="color:#fff;font-size:14px;background:#F59202;border:1px solid #Fa98a2;font-weight:bold;position:fixed;top:5px;right:40px;width:100px;z-index:100000001;">Close Editor</button>').appendTo('body');
                    // When close button clicked go fetch the saved image, if image is not saved then ask user are they sure?
                    b.click(function(){
                        
                        p.$jot.getJSON('http://screenshots.jotform.com/wishbox-server.php?callback=?', {
                            action: 'getImage',
                            uniqID: $this.scuniq
                        },function(res){
                            if(!res.success){
                                if(confirm('You haven\'t save your edits. Are you sure you want to close the editor?')){
                                    closeFrame();
                                    b.remove();
                                }
                            }else{
                                closeFrame();
                                b.remove();
                                
                                putImageOnForm(res.data, res.shotURL);
                            }
                        });
                    });
                }else{
                    // Write retrieved editor template into newly created iframe
                    var e = editorFrame[0];
                    var frameDocument = (e.contentWindow) ? e.contentWindow : (e.contentDocument.document) ? e.contentDocument.document : e.contentDocument;
                    frameDocument.document.open();
                    frameDocument.document.write(res.template);
                    setTimeout(function(){ frameDocument.document.close(); }, 200);
                    
                    // Cache the screenshot URL on parent window so editor can find it
                    p.jotformScreenshotURL = data;
                }
                
                // Closes the frame and removes all trace behind it
                var closeFrame = function(){
                    if($this.compact){
                        editorFrame.remove();
                        p.$jot('#js-form-content').css('width', '100%');
//                        p.$jot('.jt-content, .jt-title').css('width', 'auto');
                    }else{
                        editorFrame.hide('slow', function(){
                            editorFrame.remove();
                        });
                    }
                    $this.injected = false;
                    p.$jot('.jt-dimmer, .jotform-feedback-link').show();
                    p.$jot('.jt-feedback').show('slow');
                };
                
                // When image saved. Places it on the form
                var putImageOnForm = function(image, url){
                   // if(!$this.compact){
                        $('screen_'+$this.scID).update('<img width="100%" align="center" src="'+(url? url : image)+'" />');
                        $('data_'+$this.scID).value = image;
                        $('screen_'+$this.scID).up().show();
                   // }
                };
                
                // Cancel  and close the editor
                p.JotformCancelEditor = function(){
                    closeFrame();
                };
                
                // When editing completed retrive the edited screenshot code and place it on the form
                p.JotformFinishEditing = function(image){
                    closeFrame();
                    putImageOnForm(image);
                    $this.imageSaved = true;
                    if($this.compact){
                        setTimeout(function(){
                            $(document).fire('image:loaded');
                        }, 100);
                    }
                };
            }
        );
    },
    
    /**
     * Will get additional URL queries from SCRIPT embed or feedback widget
     */
    populateGet: function(){
        try{
            if('FrameBuilder' in window.parent && "get" in window.parent.FrameBuilder && window.parent.FrameBuilder.get != []){
                document.get = Object.extend(document.get, window.parent.FrameBuilder.get);
            }
        }catch(e){}
    },
    
    /**
     * Check if there are any multiple upload field. if any load multiple upload script
     */
    checkMultipleUploads: function(){
        if($$('.form-upload-multiple').length > 0){
            var script = document.createElement('script');
            script.type="text/javascript";
            script.src = "https://static-interlogyllc.netdna-ssl.com/file-uploader/fileuploader.js";
            $(document.body).appendChild(script);
        }
    },
    /**
     * Php.js uniqueID generator
     * @param {Object} prefix
     * @param {Object} more_entropy
     */
    uniqid: function(prefix, more_entropy){
        if (typeof prefix == 'undefined') { prefix = ""; }
        var retId;
        var formatSeed = function(seed, reqWidth){
            seed = parseInt(seed, 10).toString(16); // to hex str
            if (reqWidth < seed.length) { return seed.slice(seed.length - reqWidth); }
            if (reqWidth > seed.length) { return Array(1 + (reqWidth - seed.length)).join('0') + seed; }
            return seed;
        };
        if (!this.php_js) { this.php_js = {}; }
        if (!this.php_js.uniqidSeed) { this.php_js.uniqidSeed = Math.floor(Math.random() * 0x75bcd15); }
        this.php_js.uniqidSeed++;
        retId = prefix;
        retId += formatSeed(parseInt(new Date().getTime() / 1000, 10), 8);
        retId += formatSeed(this.php_js.uniqidSeed, 5);
        if (more_entropy) { retId += (Math.random() * 10).toFixed(8).toString(); }
        return retId;
    },

    /**
     * Initiates multiple upload scripts
     */
    initMultipleUploads: function(){
        $$('.form-upload-multiple').each(function(file){
            var parent = file.up('div'); 
            var f = JotForm.getForm(file);
            var formID = f.formID.value;
            var uniq = formID+"_"+JotForm.uniqueID;
            
            // Handle default validations. reuired field
            var className = file.className;
            if(className.include("validate[required]")){
                parent.addClassName("validate[required]");
                parent.validateInput = function(){
                    // Don't fire validations for hidden elements
                    if(!JotForm.isVisible(parent)){ 
                        JotForm.corrected(parent);
                        return true; 
                    }
                    if(parent.select('.qq-upload-list li').length < 1){
                        JotForm.errored(parent, JotForm.texts.required);
                        return false;
                    }else{
                        JotForm.corrected(parent);
                        return true;
                    }
                };
            }
            
            // Create temp upload folder key 
            var hidden = new Element('input', {type:'hidden', name:'temp_upload_folder'}).setValue(uniq);
            f.insert({top:hidden});
            
            // Handle limited extensions
            var exts = (file.readAttribute('file-accept') || "").strip();
            exts = (exts !== '*')? exts.split(', ') : [];
            
            // Handle sublabels
            var n, subLabel ="";
            if((n = file.next()) && n.hasClassName('form-sub-label')){ subLabel = n.innerHTML; }
            
            //Emre: to make editing "text of multifile upload button" possible (33318)
            var m,buttonText;
            if(m = file.previous('.qq-uploader-buttonText-value')){ buttonText = m.innerHTML; }
            if(!buttonText){ buttonText = "Upload a File"; };

            // Initiate ajax uploader
            var uploader = new qq.FileUploader({
                debug: JotForm.debug,
                element: parent,
                action: JotForm.server,
                subLabel: subLabel,
                buttonText: buttonText,
                sizeLimit: parseInt(file.readAttribute('file-maxsize'), 10) * 1024, // Set file size limit
                allowedExtensions: exts,
                onComplete: function(id, aa, result){
                    if(result.success){
                        // This is needed for validations.
                        // removes reuired message
                        parent.value="uploaded";
                        JotForm.corrected(parent);
                    }
                },
                showMessage: function(message){
                    // Display errors in JotForm's way
                    JotForm.errored(parent, message);
                    setTimeout(function(){
                        // JotForm.corrected(parent);
                    }, 3000);
                },
                params: {
                    action: 'multipleUpload',
                    field: file.name.replace('[]', ''),
                    folder: uniq
                }
            });
        });
    },
    
    /**
     * Hiddenly submits the form on backend
     */
    hiddenSubmit: function(frm){
        
        if(JotForm.currentSection){
            JotForm.currentSection.select('.form-pagebreak')[0].insert(
                new Element('div', {className:'form-saving-indicator'})
                    .setStyle('float:right;padding:21px 12px 10px')
                    .update('<img src="'+JotForm.url+'images/ajax-loader.gif" align="absmiddle" /> Saving...')
            );
        }
        
        /**
         * Wait just a little to set saving status. 
         * We need this because of the back button hack for last page. 
         * Last page back button has two click events they both should work 
         * but saving status prevents second one to be working
         */
        setTimeout(function(){ JotForm.saving = true; }, 10);
        
        if(!$('hidden_submit_form')){
            var iframe = new Element('iframe', {name:'hidden_submit', id:'hidden_submit_form'}).hide();
            iframe.observe('load', function(){
                JotForm.makeUploadChecks();
                $$('.form-saving-indicator').invoke('remove');
                JotForm.saving = false;
            });
            $(document.body).insert(iframe);
        }
        $('current_page').value = JotForm.currentSection.pagesIndex;
        frm.writeAttribute('target', 'hidden_submit');
        frm.insert({
            top: new Element('input', {
                type: 'hidden',
                name: 'hidden_submission',
                id:   'hidden_submission'
            }).putValue("1")
        });
        
        frm.submit();
        frm.writeAttribute('target', '');
        $('hidden_submission').remove();
    },
    /**
     * Checks the upload fields after hidden submission
     * If they are completed, then makes them empty to prevent
     * Multiple upload of the same file
     */
    makeUploadChecks: function(){
        var formIDField = $$('input[name="formID"]')[0];
        var a = new Ajax.Jsonp(JotForm.url+'server.php', {
            parameters: {
                action: 'getSavedUploadResults',
                formID: formIDField.value,
                sessionID: document.get.session
            },
            evalJSON: 'force',
            onComplete: function(t){
                console.log(res);
                var res = t.responseJSON;
                if (res.success) {                    
                    if(res.submissionID && !$('submission_id')){
                        formIDField.insert({
                            after: new Element('input', {
                                type: 'hidden',
                                name: 'submission_id',
                                id:   'submission_id'
                            }).putValue(res.submissionID)
                        });                        
                    }
                    JotForm.editMode(res, true); // Don't reset fields
                }
            }
        });
    },
    /**
     * Handles the form being saved stuation
     */
    handleSavedForm: function(){
        
        if(!('session' in document.get)){
            return;
        }
        JotForm.saveForm = true;
        
        var formIDField = $$('input[name="formID"]')[0];
        
        formIDField.insert({
            after: new Element('input', {
                type: 'hidden',
                name: 'session_id',
                id:  "session"
            }).putValue(document.get.session)
        });
        
        formIDField.insert({
            after: new Element('input', {
                type: 'hidden',
                id:'current_page',
                name: 'current_page'
            }).putValue(0)
        });
        
        var a = new Ajax.Jsonp(JotForm.url+'server.php', {
            parameters: {
                action: 'getSavedSubmissionResults',
                formID: formIDField.value,
                sessionID: document.get.session
            },
            evalJSON: 'force',
            onComplete: function(t){
                var res = t.responseJSON;
                if (res.success) {
                    if(res.submissionID){
                        formIDField.insert({
                            after: new Element('input', {
                                type: 'hidden',
                                name: 'submission_id',
                                id:   'submission_id'
                            }).putValue(res.submissionID)
                        });                        
                    }
                    try{
                        JotForm.editMode(res);
                    }catch(e){
                        console.error(e);
                    }
                    JotForm.openInitially = res.currentPage - 1;
                }
            }
        });
    },
    /**
     * Place the form title on pages title to remove the Form text on there
     */
    setTitle: function(){
        // Do this only when page title is form. otherwise it can overwrite the users own title
        if(document.title == "Form"){
            var head;
            if((head = $$('.form-header')[0])){
                try{
                    document.title = head.innerHTML.stripTags().strip();
                    document.title = document.title.unescapeHTML();
                }catch(e){
                    document.title = head.innerHTML;
                }
            }
        }
    },
    
    /**
     * Sets the last focus event to keep latest focused element
     */
    setFocusEvents: function(){
        $$('.form-radio, .form-checkbox').each(function(input){ //Neil: use mousedown event for radio & checkbox (Webkit bug:181934)
            input.observe('mousedown', function(){
                JotForm.lastFocus = input;
            })  
        });
        $$('.form-textbox, .form-password, .form-textarea, .form-upload, .form-dropdown').each(function(input){
            input.observe('focus', function(){
                JotForm.lastFocus = input;
            });
        });
    },
    /** 
    * Disables Accept for Google Chrome browsers
    */
    disableAcceptonChrome: function(){
        if (!Prototype.Browser.WebKit) { return; }
        $$('.form-upload').each(function(input){
            if (input.hasAttribute('accept')) {
                var r = input.readAttribute('accept');
                input.writeAttribute('accept', '');
                input.writeAttribute('file-accept', r);
            }
        });
    },

    /**
     * Populate hidden field with user's browser info
     */
    populateBrowserInfo:function(id) {
        var OS = "Unknown OS";
        if (navigator.appVersion.indexOf("iPhone")!=-1) OS ="iOS iPhone";
        else if (navigator.appVersion.indexOf("iPad")!=-1) OS ="iOS iPad";
        else if (navigator.appVersion.indexOf("Android")!=-1) OS ="Android";
        else if (navigator.appVersion.indexOf("Win")!=-1) OS ="Windows";
        else if (navigator.appVersion.indexOf("Mac")!=-1) OS ="MacOS";
        else if (navigator.appVersion.indexOf("Linux")!=-1) OS ="Linux";

        var browser = "Unknown Browser";
        if(navigator.userAgent.indexOf("MSIE") !=-1) browser = "Internet Explorer";
        else if(navigator.userAgent.indexOf("Firefox") !=-1) browser ="Firefox";
        else if(navigator.userAgent.indexOf("Chrome") !=-1) browser ="Chrome";
        else if(navigator.userAgent.indexOf("Safari") !=-1) browser ="Safari";
        else if(navigator.userAgent.indexOf("Opera") !=-1) browser ="Opera";

        var offset = new Date().getTimezoneOffset();
        var sign = (offset < 0)?"+":"";
        var timeZone = 'GMT ' + sign +  -(offset/60);

        var lang = navigator.language || navigator.browserLanguage || navigator.userLanguage;

        var val = 'BROWSER: ' + browser + "\n";
        val += 'OS: ' + OS + "\n";
        val += 'LANGUAGE: ' + lang + "\n";  
        val += 'RESOLUTION: ' + screen.width + "*" + screen.height + "\n";
        val += 'TIMEZONE: ' + timeZone + "\n";
        val += 'USER AGENT: ' + navigator.userAgent + "\n";
        if($(id).value.length > 0)
            $(id).value += "\n";    
        $(id).value += val;
    },

    /**
     * Show Difference Between time ranges
     */
    displayTimeRangeDuration:function(id) {
        var displayDuration = function() {
            if($('input_'+id+'_hourSelectRange')) {
                var sHour = $('input_'+id+'_hourSelect').value;
                var sMin = $('input_'+id+'_minuteSelect').value;
                var sAMPM = $('input_'+id+'_ampm')?$('input_'+id+'_ampm').value:'no';
                var eHour = $('input_'+id+'_hourSelectRange').value;
                var eMin = $('input_'+id+'_minuteSelectRange').value;
                var eAMPM = $('input_'+id+'_ampmRange')?$('input_'+id+'_ampmRange').value:'no';
                var lab = $('input_'+id+'_ampmRange')?'_ampmRange':'_dummy';
                if(sHour.length > 0 && sMin.length > 0 && eHour.length > 0 && eMin.length > 0) {
                    if(sAMPM == 'PM' && sHour != 12) sHour = parseInt(sHour) + 12;
                    if(sAMPM == 'AM' && sHour == 12) sHour = 0;
                    if(eAMPM == 'PM' && eHour != 12) eHour = parseInt(eHour) + 12;
                    if(eAMPM == 'AM' && eHour == 12) eHour = 0;

                    var start = new Date(0, 0, 0, sHour, sMin, 0);
                    var end = new Date(0, 0, 0, eHour, eMin, 0);
                    var diff = end.getTime() - start.getTime();
                    if(diff < 0) { //end time is next day
                        end = new Date(0, 0, 1, eHour, eMin, 0);
                        diff = end.getTime() - start.getTime();
                    }
                    var hours = Math.floor(diff/1000/60/60);
                    diff -= hours*1000*60*60;
                    var min = Math.floor(diff / 1000 / 60);
                    if(min < 10) min = '0' + min;
                    $$('label[for=input_'+id+lab+']').first().update('<b>Total '+hours+':'+min+'</b>');
                    $$('label[for=input_'+id+lab+']').first().setStyle({'color': 'black'});
                } else {
                    $$('label[for=input_'+id+lab+']').first().update('&nbsp');
                }
            }
        };
        $('input_'+id+'_hourSelect').observe('change', displayDuration);
        $('input_'+id+'_minuteSelect').observe('change', displayDuration);
        $('input_'+id+'_hourSelectRange').observe('change', displayDuration);
        $('input_'+id+'_minuteSelectRange').observe('change', displayDuration);
        if($('input_'+id+'_ampm') && $('input_'+id+'_ampmRange')) {
            $('input_'+id+'_ampm').observe('change', displayDuration);
            $('input_'+id+'_ampmRange').observe('change', displayDuration);
        }
    },

    
    /**
     * Set current local time if nodefault not set
     */
    displayLocalTime:function(hh, ii, ampm) {
        if($(hh) && !$(hh).hasClassName('noDefault')) {
            var date = new Date();
            var hour = date.getHours();

            var currentAmpm = "";
            var twentyFour = true;
            if($(ampm)) {
                twentyFour = false;
                currentAmpm = (hour>11)?'PM':'AM';  
                hour = (hour>12)?hour-12:hour;
                hour = (hour == 0)?12:hour;
            }

            var min = date.getMinutes();
            var step = Number($(ii).options[2].value) - Number($(ii).options[1].value);
            min = Math.round(min/step) * step;
            min = this.addZeros(min, 2);
            if(min >= 60) { //ntw roll over to next hour/day
                min = "00";
                hour++;
                if(twentyFour){
                    if(hour == 24) hour = 0;
                } else {
                    if(currentAmpm == 'AM' && hour == 12) currentAmpm = 'PM';
                    else if(currentAmpm == 'PM' && hour == 12) currentAmpm = 'AM';
                    else if(hour == 13) hour = 1;
                }
            }

            $(hh).value = hour;
            $(ii).value = min;

            if($(hh + 'Range')) {
                $(hh + 'Range').value = hour;
                $(ii + 'Range').value = min;
            }
            if(currentAmpm == 'PM') {
                $(ampm).value = 'PM';
                if($(ampm + 'Range')) $(ampm + 'Range').value = 'PM';
            }
        }
    },

    /**
     * Sets calendar to field
     * @param {Object} id
     */
    setCalendar: function(id){
        try{
            var calendar = Calendar.setup({
                triggerElement:"input_" + id + "_pick",
                dateField:"year_" + id,
                closeHandler:JotForm.calendarClose,
                selectHandler:JotForm.formatDate
            });
            $('id_'+id).observe('keyup', function(){
                $('id_'+id).fire('date:changed');
            });
            if(! $('day_' + id).hasClassName('noDefault')){
                JotForm.formatDate({date:(new Date()), dateField:$('id_' + id)});
            }
            var openCalendar = function() {
                if (document.createEvent) {
                    var ele = this;
                    setTimeout(function() {
                        calendar.showAtElement(ele);
                    }, 50);
                }
            };
            if($('input_' + id + '_pick').hasClassName('showAutoCalendar')) {
                $('day_' + id).observe('focus', openCalendar);
                $('month_' + id).observe('focus', openCalendar);
                $('year_' + id).observe('focus', openCalendar);
            }
            $('day_' + id).observe('blur', function() {JotForm.calendarClose(calendar);});
            $('month_' + id).observe('blur', function() {JotForm.calendarClose(calendar);});
            $('year_' + id).observe('blur', function() {JotForm.calendarClose(calendar);});
        }catch(e){
            JotForm.error(e);
        }
    },

    /*
        Listen for changes on fields on calender, then checks if given datetime is between defined limits

    */
    setDateTimeRangeChecker: function(id,disallowPast){

        if(disallowPast !== "Yes"){
            return;
        }

        var currentdate = new Date();
        var cur = {
            year : currentdate.getFullYear(),
            month : currentdate.getMonth()+1,
            day : currentdate.getDate(),
            hour: currentdate.getHours(),
            minute: currentdate.getMinutes()
        };

        var handleDateTimeChange = function(){
            
            var selected = {
                year : parseInt($('year_' + id).value),
                month : parseInt($('month_' + id).value),
                day:  parseInt($('day_' + id).value)   
            };

            if(selected.year < cur.year){
                updateToLimitValue(cur);
            }else if(selected.year == cur.year && selected.month < cur.month){
                updateToLimitValue(cur);
            }else if(selected.year == cur.year && selected.month == cur.month && selected.day < cur.day){
                 updateToLimitValue(cur);
            }
         
        }

        var updateToLimitValue = function(target){
            $('day_' + id).value = (target.day<10)?"0"+target.day:target.day;
            $('month_' + id).value = (target.month<10)?"0"+target.month:target.month;
            $('year_' + id).value = target.year;
        }

        $('day_' + id).observe('blur', function() {handleDateTimeChange()});
        $('month_' + id).observe('blur', function() {handleDateTimeChange()});
        $('year_' + id).observe('blur', function() {handleDateTimeChange()});

        
    },

    calendarClose: function(calendar){
        if(calendar.dateField.className.include("validate[required]")) {
            if (document.createEvent) {
                var evt = document.createEvent('HTMLEvents');
                evt.initEvent('change', true, true);
                calendar.dateField.dispatchEvent(evt);
            }
            if (this.fireEvent) {
                calendar.dateField.fireEvent('onchange');
            }
        }
        calendar.hide();
    },

    /**
     * Collects all inital values of the fields and saves them as default values
     * to be restored later
     */
    getDefaults: function(){
        $$('.form-textbox, .form-dropdown, .form-textarea').each(function(input){
            if(input.hinted || input.value === ""){ return; /* continue; */ }
            
            JotForm.defaultValues[input.id] = input.value;
        });
        
        $$('.form-radio, .form-checkbox').each(function(input){
            if(!input.checked){ return; /* continue; */ }
            JotForm.defaultValues[input.id] = input.value;
        });
    },
    /**
     * Enables or disables the Other option on radiobuttons/checkboxes
     */
    handleOtherOptions: function(){
        
        $$('.form-radio-other-input, .form-checkbox-other-input').each(function(inp){
            inp.disable().hint(inp.getAttribute('data-otherHint') || 'Other');
        });
        
        $$('.form-radio, .form-checkbox').each(function(input){
            
            var id = input.id.replace(/input_(\d+)_\d+/gim, '$1');
            
            if(id.match('other_')){
                id = input.id.replace(/other_(\d+)/, '$1');
            }
            
            if($('other_'+id)){
                var other = $('other_'+id);
                var other_input = $('input_'+id);
                var otherOption = input.type == 'radio' ? input : other;
                if (input.type == 'checkbox') {
                    other_input.observe('keyup',function(){
                       other.value = other_input.value; 
                    });
                }
                other_input.observe('blur', function(){
                    other_input.value = other_input.value || 'Other';
                });
                other_input.observe('click', function(){
                    other_input.value = other_input.value == 'Other' ? '' : other_input.value;
                });
                // perform only on the "Other" option if input is check box
                otherOption.observe('click', function(){
                    
                    if(other.checked){
                        other_input.enable();
                        other_input.select();
                    }else{
                        if(other_input.hintClear){ other_input.hintClear(); }
                        other_input.disable();
                    }
                });
            }
        });
    },

    handleDateTimeChecks: function() {
        $$('[name$=\[month\]]').each(function(monthElement) {
            var questionId = monthElement.id.split('month_').last();
            var dateElement = $('id_' + questionId);
            if (!dateElement)
                return;

            var dayElement = dateElement.select('#day_' + questionId).first();
            var yearElement = dateElement.select('#year_' + questionId).first();
            var hourElement = dateElement.select('#hour_' + questionId).first();
            var minElement = dateElement.select('#min_' + questionId).first();
            var ampmElement = dateElement.select('#ampm_' + questionId).first();

            var dateTimeCheck = function() {
                var erroredElement = null;

                if (monthElement.value != "" || dayElement.value != "" || yearElement.value != "") {

                    var month = +monthElement.value;
                    var day = +dayElement.value;
                    var year = +yearElement.value;

                    if (isNaN(year) || year < 0) {
                        erroredElement = yearElement;
                    } else if (isNaN(month) || month < 1 || month > 12) {
                        erroredElement = monthElement;
                    } else if (isNaN(day) || day < 1) {
                        erroredElement = dayElement;
                    } else {
                        switch (month) {
                            case 2:
                                if ((year % 4 == 0) ? day > 29 : day > 28) {
                                    erroredElement = dayElement;
                                }
                                break;
                            case 4:
                            case 6:
                            case 9:
                            case 11:
                                if (day > 30) {
                                    erroredElement = dayElement;
                                }                            
                                break;
                            default:
                                if (day > 31) {
                                    erroredElement = dayElement;
                                }
                                break;
                        }
                    }
                }

                if (!erroredElement && hourElement && minElement && (hourElement.value != "" || minElement.value != "")) {
                    var hour = (hourElement.value.strip() == '') ? -1 : +hourElement.value;
                    var min = (minElement.value.strip() == '') ? - 1 : +minElement.value;
                    if (isNaN(hour) || (ampmElement ? (hour < 0 || hour > 12) : (hour < 0 || hour > 23))) {
                        erroredElement = hourElement;
                    } else if (isNaN(min) || min < 0 || min > 59) {
                        erroredElement = minElement;
                    }
                }

                if (erroredElement) {
                    if(erroredElement === hourElement || erroredElement === minElement) {
                        erroredElement.errored = false;
                        JotForm.errored(erroredElement, 'Enter a valid time');
                    } else {
                        erroredElement.errored = false;
                        JotForm.errored(erroredElement, 'Enter a valid date');
                    }
                    dateElement.addClassName('form-line-error');
                    dateElement.addClassName('form-datetime-validation-error');
                } else {
                    JotForm.corrected(monthElement);
                    JotForm.corrected(dayElement);
                    JotForm.corrected(yearElement);
                    if (hourElement && minElement) {
                        JotForm.corrected(hourElement);
                        JotForm.corrected(minElement);    
                    }
                    dateElement.removeClassName('form-line-error');
                    dateElement.removeClassName('form-datetime-validation-error');
                }
            };

            monthElement.observe('change', dateTimeCheck);
            dayElement.observe('change', dateTimeCheck);
            yearElement.observe('change', dateTimeCheck);
            if (hourElement && minElement) {
                hourElement.observe('change', dateTimeCheck);
                minElement.observe('change', dateTimeCheck);                
            }
        });
    },
    
    handleTextareaLimits: function(){
        $$('.form-textarea-limit-indicator span').each(function(el){
            var inpID = el.id.split('-')[0];
            if(!$(inpID)){return;} // cannot find the main element
            var limitType = el.readAttribute('type');
            var limit     = el.readAttribute('limit');
            var input = $(inpID);
            var count;

            var countText = function(){
                if(input.hasClassName('form-custom-hint')) {
                    el.update("0/" + limit);
                    return;
                }

                if(limitType == 'Words'){
                    count = $A(input.value.split(/\s+/)).without("").length;
                }else if(limitType == 'Letters'){
                    count = input.value.length;
                }
                if(count > limit){
                    $(el.parentNode).addClassName('form-textarea-limit-indicator-error');
                }else{
                    $(el.parentNode).removeClassName('form-textarea-limit-indicator-error');
                }
                el.update(count + "/" + limit);
            };
            countText();
            input.observe('change', countText);
            input.observe('focus', countText);
            input.observe('keyup', countText);
        });
    },
    
    /**
     * Activates all autocomplete fields
     */
    handleAutoCompletes: function(){
        // Get all autocomplete fields
        $H(JotForm.autoCompletes).each(function(pair){
            var el = $(pair.key); // Field itself
            
            el.writeAttribute('autocomplete', 'off');
            
            var parent = $(el.parentNode); // Parent of the field for list to be inserted
            var values = $A(pair.value.split('|')); // Values for auto complete
            
            var lastValue; // Last entered value
            var selectCount = 0; // Index of the currently selected element
            //parent.setStyle('position:relative;z-index:1000;'); // Set parent position to relative for inserting absolute positioned list
            var liHeight = 0; // Height of the list element
            
            // Create List element with must have styles initially
            var list = new Element('div', {
                className: 'form-autocomplete-list'
            }).setStyle({
                listStyle: 'none',
                listStylePosition: 'outside',
                position: 'absolute',
                zIndex: '10000'
            }).hide();
            
            var render = function(){
                
                var dims = el.getDimensions(); // Dimensions of the input box
                var offs = el.cumulativeOffset();
                
                list.setStyle({
                    top: ((dims.height+offs[1])) + 'px',
                    left:offs[0]+'px',
                    width: ((dims.width < 1? 100 : dims.width) - 2) + 'px'
                });
                list.show();
            };
            
            // Insert list onto page
            // parent.insert(list);
            $(document.body).insert(list);
            
            list.close = function(){
                list.update();
                list.hide();
                selectCount = 0;
            };
            
            // Hide list when field get blurred
            el.observe('blur', function(){
                list.close();
            });
            
            // Search entry in values when user presses a key
            el.observe('keyup', function(e){
                var word = el.value;
                // If entered value is the same as the old one do nothing
                if (lastValue == word) {
                    return;
                }
                lastValue = word; // Set last entered word
                list.update(); // Clean up the list first
                if (!word) {
                    list.close();
                    return;
                } // If input is empty then close the list and do nothing
                // Get matches
                
                var fuzzy = el.readAttribute('data-fuzzySearch') == 'Yes';
                var matches;
                
                if (fuzzy) {
                    matches = values.collect(function(v) {
                    if (v.toLowerCase().include(word.toLowerCase())) {
                        return v;
                    }
                }).compact();
                } else {
                    matches = values.collect(function(v) {
                        if (v.toLowerCase().indexOf(word.toLowerCase()) == 0){
                            return v;
                        }
                    }).compact();
                }
                // If matches found
                var maxMatches = el.readAttribute('data-maxMatches');
                if(maxMatches > 0) matches = matches.slice(0,maxMatches);
                if (matches.length > 0) {
                    matches.each(function(match){
                        var li = new Element('li', {
                            className: 'form-autocomplete-list-item'
                        });
                        var val = match;
                        li.val = val;
                        try {
                            val = match.replace(new RegExp('(' + word + ')', 'gim'), '<b>$1</b>');
                        } 
                        catch (e) {
                            JotForm.error(e);
                        }
                        li.insert(val);
                        li.onmousedown = function(){
                            el.value = match;
                            list.close();
                        };
                        list.insert(li);
                    });
                    
                    render();
                    
                    // Get li height by adding margins and paddings for calculating 10 item long list height
                    liHeight = liHeight || $(list.firstChild).getHeight() + (parseInt($(list.firstChild).getStyle('padding'), 10) || 0) + (parseInt($(list.firstChild).getStyle('margin'), 10) || 0);
                    // limit list to show only 10 item at once        
                    list.setStyle({
                        height: (liHeight * ((matches.length > 9) ? 10 : matches.length) + 4) + 'px',
                        overflow: 'auto'
                    });
                } else {
                    list.close(); // If no match found clean the list and close
                }
            });
            
            // handle navigation through the list
            el.observe('keydown', function(e){
                
                //e = document.getEvent(e);
                var selected; // Currently selected item
                // If the list is not visible or list empty then don't run any key actions
                if (!list.visible() || !list.firstChild) {
                    return;
                }
                
                // Get the selected item
                selected = list.select('.form-autocomplete-list-item-selected')[0];
                if(selected){ selected.removeClassName('form-autocomplete-list-item-selected'); }
                
                switch (e.keyCode) {
                    case Event.KEY_UP: // UP
                        if (selected && selected.previousSibling) {
                            $(selected.previousSibling).addClassName('form-autocomplete-list-item-selected');
                        } else {
                            $(list.lastChild).addClassName('form-autocomplete-list-item-selected');
                        }
                        
                        if (selectCount <= 1) { // selected element is at the top of the list
                            if (selected && selected.previousSibling) {
                                $(selected.previousSibling).scrollIntoView(true);
                                selectCount = 0; // scroll element into view then reset the number
                            } else {
                                $(list.lastChild).scrollIntoView(false);
                                selectCount = 10; // reverse the list
                            }
                        } else {
                            selectCount--;
                        }
                        
                        break;
                    case Event.KEY_DOWN: // Down
                        if (selected && selected.nextSibling) {
                            $(selected.nextSibling).addClassName('form-autocomplete-list-item-selected');
                        } else {
                            $(list.firstChild).addClassName('form-autocomplete-list-item-selected');
                        }
                        
                        if (selectCount >= 9) { // if selected element is at the bottom of the list
                            if (selected && selected.nextSibling) {
                                $(selected.nextSibling).scrollIntoView(false);
                                selectCount = 10; // scroll element into view then reset the number
                            } else {
                                $(list.firstChild).scrollIntoView(true);
                                selectCount = 0; // reverse the list
                            }
                        } else {
                            selectCount++;
                        }
                        break;
                    case Event.KEY_ESC:
                        list.close(); // Close list when pressed esc
                        break;
                    case Event.KEY_TAB:
                    case Event.KEY_RETURN:
                        if (selected) { // put selected field into the input bıx
                            el.value = selected.val;
                            lastValue = el.value;
                        }
                        list.close();
                        if (e.keyCode == Event.KEY_RETURN) {
                            e.stop();
                        } // Prevent return key to submit the form
                        break;
                    default:
                        return;                
                }
            });
        });
        
    },
    
    /**
     * Returns the extension of a file
     * @param {Object} filename
     */
    getFileExtension: function(filename){
        return (/[.]/.exec(filename)) ? (/[^.]+$/.exec(filename))[0] : undefined;
    },
    
    /**
     * Fill fields from the get values prepopulate
     */
    prePopulations: function(){
{       // Event simulator
        Element.prototype.triggerEvent = function(eventName){
            if (document.createEvent) {
                var evt = document.createEvent('HTMLEvents');
                evt.initEvent(eventName, true, true);
                return this.dispatchEvent(evt);
            }
            if (this.fireEvent) {
                return this.fireEvent('on' + eventName);
            }
        }
}
        $H(document.get).each(function(pair){
            // Will skip very short URL keys to avoid mix-ups
            if(pair.key.length < 3){ return; /* continue; */ }
            
            var n = '[name*="_' + pair.key + '"]';
            var input = $$('.form-textbox%s, .form-dropdown%s, .form-textarea%s, .form-hidden%s'.replace(/\%s/gim, n))[0];
            if (input) {
                input.value = pair.value.replace(/\+/g, ' ');
                JotForm.defaultValues[input.id] = input.value;
            }
            $$('.form-textbox%s, .form-textarea%s, .form-hidden%s'.replace(/\%s/gim, n)).each(function(input){
                //simulate 'keyup' event to execute conditions upon prepopulation
                input.triggerEvent('keyup');
            });
            $$('.form-dropdown%s'.replace(/\%s/gim, n)).each(function(input){
                //simulate 'change' event to execute conditions upon prepopulation
                input.triggerEvent('change');
            });
            $$('.form-checkbox%s, .form-radio%s'.replace(/\%s/gim, n)).each(function(input){
                //input.checked = $A(pair.value.split(',')).include(input.value);
                //Emre: when checkboxed is checked, total count does not increase on payment forms  (79814)
                if($A(pair.value.split(',')).include(input.value)){
                    input.click();
                }
            });
        });
    },
    /**
     * Reset form while keeping the values of hidden fields
     * @param {Object} frm
     */
    resetForm: function(frm){
        var hiddens = $(frm).select('input[type="hidden"]');
        hiddens.each(function(h){ h.__defaultValue = h.value; });
        $(frm).reset();
        hiddens.each(function(h){ h.value = h.__defaultValue; });
        return frm;
    },
    /**
     * Bring the form data for edit mode
     */
    editMode: function(data, noreset, skipFields){
        skipFields = skipFields || [];
        
        var populateData = function(res){
            
            if(!noreset){
                // Prevent autocompleting old values aka. form input cache
                
                $A(JotForm.forms).each(function(frm){
                    JotForm.resetForm(frm);
                });
            }
            
            $H(res.result).each(function(pair){
                var qid = pair.key, question = pair.value;
                try{
                    // Skip if this field type was specified as should be skipped
                    if($A(skipFields).include(question.type)){
                        return true; // continue;
                    }
  
                    switch (question.type) {
                        case "control_fileupload":
                            if($('input_' + qid)) {
                                if($('input_' + qid).uploadMarked == question.value) {
                                    break;
                                }
                            }

                            //Emre: to provide editing file list in multi-upload (49061)
                            setTimeout(function() {
                                if($$('#id_' + qid + ' .qq-upload-list')[0]) {

                                    var questionValue = question.value;
                                    var multiUploadFiles;
                                    var multiUploadFileNames;
                                    questionValue = questionValue.replace(/<a/g, '<li class=" qq-upload-success"><span class="qq-upload-file"><a');
                                    questionValue = questionValue.replace(/<\/a>/g, '<\/a><\/span><span class="qq-upload-delete">X<\/span><\/li>');
                                    questionValue = questionValue.replace(/<br>/g, '');

                                    $$('#id_' + qid + ' ul.qq-upload-list')[0].update(questionValue);

                                    setTimeout(function() {
                                        var fileList = $$('#id_' + qid + ' ul.qq-upload-list li span.qq-upload-delete');
                                        if(fileList) {
                                            fileList.each(function(li) {
                                                li.observe('click', function() {

                                                    this.up().hide();
                                                    var thisUpSelectA = this.up().select('a')[0].text;
                                                    if(!thisUpSelectA) {
                                                        thisUpSelectA = this.up().select('a')[0].innerText;
                                                    }
                                                    $('uploadedBefores_' + qid).value = $('uploadedBefores_' + qid).value.replace(thisUpSelectA, '');
                                                    if(!$('uploadedBefores_' + qid).value) {
                                                        $('uploadedBefores_' + qid).value = ",";
                                                    }

                                                });
                                            });
                                        }

                                    }, 200);
                                    multiUploadFiles = $$('#id_' + qid + ' ul.qq-upload-list li a');
                                    multiUploadFileNames = "";
                                    if(multiUploadFiles) {
                                        multiUploadFiles.each(function(n) {
                                            if(n.text) {
                                                multiUploadFileNames += n.text + ",";
                                            } else if(n.innerText) {
                                                multiUploadFileNames += n.innerText + ",";
                                            } else {
                                                n.up('li.qq-upload-success').hide();
                                            }
                                        });
                                        multiUploadFileNames = multiUploadFileNames.substring(0, multiUploadFileNames.length - 1);

                                    }

                                    $('cid_' + qid).insert({
                                        after : new Element('input', {
                                            id : 'uploadedBefores_' + qid,
                                            type : 'hidden',
                                            name : 'uploadedBefore' + qid
                                        }).putValue(multiUploadFileNames)
                                    });

                                } else {
                                    $$('#clip_' + qid + ', #link_' + qid + ', #old_' + qid).invoke('remove');

                                    $('input_' + qid).uploadMarked = question.value;
                                    $('input_' + qid).resetUpload();
                                    var file = question.value.split("/");
                                    var filename = file[file.length - 1];
                                    var ext = JotForm.getFileExtension(filename);

                                    if(ext!==undefined){
                                        if(JotForm.imageFiles.include(ext.toLowerCase())) {
                                            var clipDiv = new Element('div', {
                                                id : 'clip_' + qid
                                            }).setStyle({
                                                height : '50px',
                                                width : '50px',
                                                overflow : 'hidden',
                                                marginRight : '5px',
                                                border : '1px solid #ccc',
                                                background : '#fff',
                                                cssFloat : 'left'
                                            });
                                            var img = new Element("img", {
                                                src : question.value,
                                                width : 50
                                            });
                                            clipDiv.insert(img);
                                            $('input_' + qid).insert({
                                                before : clipDiv
                                            });
                                        }
                                    }

                                    var linkContainer = new Element('div', {
                                        id : 'link_' + qid
                                    });
                                    $('input_' + qid).insert({
                                        after : linkContainer.insert(new Element('a', {
                                            href : question.value,
                                            target : '_blank'
                                        }).insert(filename.shorten(40)))
                                    });
                                    $('input_' + qid).insert({
                                        after : new Element('input', {
                                            type : 'hidden',
                                            name : 'input_' + qid + '_old',
                                            id : 'old_' + qid
                                        }).putValue(question.items)
                                    });
                                }
                            }, 200);
                            break;
                        case "control_scale":
                        case "control_radio":

                            //Emre: when session is used, "question.name" seems undefined in forms (42176)
                            //
                            if(question.name == undefined) {
                                var radios = $$("#id_" + qid + ' input[type="radio"]');
                            } else {
                                var radios = document.getElementsByName("q" + qid + "_" + ((question.type == "control_radio" || question.type == "control_scale") ? question.name : qid));
                            }

                            $A(radios).each(function(rad) {
                                if(rad.value == question.value) {
                                    rad.checked = true;
                                }
                            });
                            break;
                        case "control_checkbox":
                            var checks = $$("#id_" + qid + ' input[type="checkbox"]');

                            $A(checks).each(function(chk) {
                                if(question.items.include(chk.value)) {
                                    chk.checked = true;
                                }
                            });
                            break;
                        case "control_rating":
                            if($('input_' + qid)) {($('input_' + qid).setRating(question.value));
                            }
                            break;
                        case "control_grading":
                            //Emre: to prevent grading problem (49061)
                            //var boxes = document.getElementsByName("q" + qid +  "_grading[]");
                            //var boxes = $
                            //console.log("grading boxes", boxes);

                            var props = arguments[0][1];
                            var q_id = arguments[0][0];

                            if(!props.isEmpty){
                                var total = 0;
                                $A(props.items).each(function(val, i){
                                    var box = document.getElementById("input_"+q_id+"_" + i);
                                    box.putValue(val);
                                    total += parseInt(val || 0);
                                });

                                //set total
                                var tot = document.getElementById("grade_point_"+q_id);
                                tot.update(total);
                            }


                            // console.log("grading",arguments[0]);
                            // $A(boxes).each(function(box, i) {
                            //     box.putValue(question.items[i]);
                            // });
                            break;
                        case "control_slider":
                            $('input_' + qid).setSliderValue(question.value);
                            break;
                        case "control_range":
                            $('input_' + qid + "_from").putValue(question.items.from);
                            $('input_' + qid + "_to").putValue(question.items.to);
                            break;

                        case "control_matrix":
                            var extended, objj = false;
                            // If you don't select first line or first row on a matrix
                            // Items will come as an object instead of an array
                            // It's because keys don't start from zero
                            // I have to simulate the array on this sittuations
                            if(!Object.isArray(question.items)) {
                                extended = $H(question.items);
                                objj = true;
                            } else {
                                extended = $A(question.items);
                            }
                            
                            if(question.name == undefined) {
                                // Strips the question type (radio or string) from the question's dom name
                                var firstElementInMatrix = $$("#id_" + qid + ' input')[0] || $$("#id_" + qid + ' select')[0];
                                var questionTmpName = firstElementInMatrix.name;
                                var posOfDashPlusOne = questionTmpName.indexOf('_') + 1;
                                var lengthToBracket = questionTmpName.indexOf('[') - posOfDashPlusOne;                              
                                question.name = questionTmpName.substr(posOfDashPlusOne, lengthToBracket);
                            }

                            extended.each(function(item, i) {
                                // Here is the simulation of an array :)
                                if(objj) {
                                    i = item.key;
                                    item = item.value;
                                }

                                if(Object.isString(item)) {
                                    var els = document.getElementsByName("q" + qid + "_" + question.name + "[" + i + "]");
                                    $A(els).each(function(el) {
                                        if(el.value == item) {
                                            el.checked = true;
                                        }
                                    });
                                } else {
                                    $A(item).each(function(it, j) {
                                        var els = document.getElementsByName("q" + qid + "_" + question.name + "[" + i + "][]");
                                        if(els[j].className == "form-checkbox") {
                                            $A(els).each(function(el) {
                                                if(el.value == it) {
                                                    el.checked = true;
                                                }
                                            });
                                        } else {
                                            els[j].value = it;
                                        }
                                        
                                    });
                                }
                            });
                            break;
                        case "control_datetime":
                        case "control_fullname":
                            $H(question.items).each(function(item) {
                                if($(item.key + "_" + qid)) {
                                    ($(item.key + "_" + qid).value = item.value);
                                }
                            });
                            break;
                        case "control_phone":
                        case "control_birthdate":
                        case "control_address":
                        case "control_time":
                            $H(question.items).each(function(item) {
                                if($('input_' + qid + "_" + item.key)) {($('input_' + qid + "_" + item.key).putValue(item.value));
                                }
                            });
                            break;
                        case "control_autoincrement":
                        case "control_hidden":
                            if($('input_' + qid)) {
                                if(JotForm.saveForm || document.get.mode == 'edit') {
                                    $('input_' + qid).putValue(question.value);
                                } else {
                                    var sec = $$('.form-section')[0];$$('.form-section li[title="Hidden Field"]')[0];
                                    //Emre:80874 Order problem of hidden fields
                                    var hiddenElements = $$('.form-section li[title="Hidden Field"]');
                                    var liOfHidden = '<li id="id_' + qid + '" class="form-line" title="Hidden Field">' + '<label for="input_' + qid + '" id="label_' + qid + '" class="form-label-left"> ' + question.text + ' </label>' + '<div class="form-input" id="cid_' + qid + '"></div></li>';
                                    if(hiddenElements.size() > 0){
                                        hiddenElements.last().insert({after:liOfHidden});
                                    }else{
                                        sec.insert({top : liOfHidden});
                                    }
                                    //--
                                    $('cid_' + qid).insert($('input_' + qid).putValue(question.value));
                                    //Emre: on ie7-8 changing type is not possible so on edit page "hidden type" cannot be converted to "text" (43655)
                                    var hiddenInput = $('input_' + qid);
                                    hiddenInput.replace('<input type="text" id="' + hiddenInput.id + '" name="' + hiddenInput.name + '" value="' + hiddenInput.value + '">');
                                    $('input_' + qid).setStyle({
                                        opacity : 0.9,
                                        border : '1px dashed #999',
                                        padding : '3px'
                                    });
                                }

                            }
                            break;
                        case 'control_payment':
                        case 'control_stripe':
                        case 'control_paypal':
                        case 'control_paypalpro':
                        case 'control_clickbank':
                        case 'control_2co':
                        case 'control_worldpay':
                        case 'control_googleco':
                        case 'control_onebip':
                        case 'control_authnet':
                            $H(question.items).each(function(item) {
                                if(item.key == "price") {// Donations
                                    $('input_' + qid + '_donation').value = item.value;
                                } else if("pid" in item.value) {
                                    if($('input_' + qid + '_' + item.value.pid)) {
                                        $('input_' + qid + '_' + item.value.pid).checked = true;
                                        if("options" in item.value) {
                                            $A(item.value.options).each(function(option, i) {
                                                if($('input_' + qid + '_' + option.type + '_' + item.value.pid + '_' + i)) {
                                                    $('input_' + qid + '_' + option.type + '_' + item.value.pid + '_' + i).value = option.selected;
                                                }
                                            });
                                        }
                                    }
                                }
                            });
                            break;
                        case 'control_email':
                            var emailInput = $('input_' + qid);
                            if(emailInput) {
                                emailInput.putValue(question.value);
                                emailInput = $('input_' + qid + '_confirm');
                                if (emailInput) {
                                    emailInput.putValue(question.value);
                                }
                            }
                            break;
                        case 'control_textarea':
                            if(question.value.length > 0 ) {
                                $('input_' + qid).putValue(question.value);
                                if($('input_' + qid).hasClassName('form-custom-hint')) {
                                    $('input_' + qid).removeClassName('form-custom-hint').removeAttribute('spellcheck');
                                    $('input_' + qid).hasContent = true;
                                    $('input_' + qid).run('focus');
                                }
                            } else if($('input_' + qid).hasClassName('form-custom-hint')) {
                                $('input_' + qid).run('blur');
                            }
                            break;
                        default:
                            if($('input_' + qid)) {
                                ($('input_' + qid).putValue(question.value));
                            }
                            break;
                    }

                }catch(e){
                    //console.error(e);
                }
            });
            
            // After populating the form run condition checks
            $H(JotForm.fieldConditions).each(function(pair){
                var field = pair.key;
                var event = pair.value.event;
                
                // JotForm.info("Has Condition:", field, $(field));
                if(!$(field)){ return; }
                
                $(field).run(event);
            });
        };
        
        if(data){
            populateData(data);
        }else{
            var a = new Ajax.Request('server.php', {
                parameters: {
                    action: 'getSubmissionResults',
                    formID: document.get.sid
                },
                evalJSON: 'force',
                onComplete: function(t){
                    var res = t.responseJSON;

                    if (res.success) {
                        populateData(res);
                        
                        $$('input[name="formID"]')[0].insert({
                            after: new Element('input', {
                                type: 'hidden',
                                name: 'editSubmission'
                            }).putValue(document.get.sid)
                        });
                        
                        if(document.get.mode == "inlineEdit" || document.get.mode == 'submissionToPDF'){
                            $$('input[name="formID"]')[0].insert({
                                after: new Element('input', {
                                    type: 'hidden',
                                    name: 'inlineEdit'
                                }).putValue("yes")
                            });
                        }
                        JotForm.getContainer($$('.form-captcha')[0]).hide();

                        if (document.get.mode == 'submissionToPDF') {
                            $$('.form-section').each(function(value)
                            {
                                value.setStyle({
                                    display: 'inline'
                                });
                            });

                            $$('.form-section-closed').each(function(value) {
                                value.setStyle({
                                    height: 'auto'
                                });
                            });
                            
                            var a = new Ajax.Request('server.php', {
                                parameters:  {
                                    action: 'getSetting',
                                    identifier: 'form',
                                    key: 'columnSetting'
                                },
                                evalJSON: 'force',
                                onComplete: function(t) {
                                    var columnSettings = t.responseJSON.value;
                                    var excludeList = $H();
                                    columnSettings.each(function(setting){
                                        if (!isNaN(parseInt(setting)))
                                            excludeList['id_' + setting] = true;
                                    });
                                    var autoHide = columnSettings.indexOf('autoHide') > -1;
                                    var showNonInputs = columnSettings.indexOf('showNonInputs') > -1;

                                    var formElement = $$('.jotform-form')[0];

                                    if (columnSettings.indexOf('showIP') > -1)
                                        formElement.insert({top: new Element('div').update('IP: ')});;
                                    if (columnSettings.indexOf('created_at') == -1)
                                        formElement.insert({top: new Element('div').update('Submission Date: ' + res.result.created_at.value)});
                                    if (columnSettings.indexOf('id') == -1)
                                        formElement.insert({top: new Element('div').update('Submission ID: ' + document.get.sid)});

                                    $$('.form-line').each(function(value) {
                                        if (excludeList(value.id))
                                            value.setStyle({display: 'none'});
                                        else
                                            value.setStyle({display: ''});
                                    });
                                }.bind(this)
                            });
                        }
                    }
                }.bind(this)
            });
        }        
    },
    /**
     * add the given condition to conditions array to be used in the form
     * @param {Object} qid id of the field
     * @param {Object} condition condition array
     */
    setConditions: function(conditions){

        conditions.reverse();

        JotForm.conditions = conditions;
         // Ozan, IMPORTANT NOTE: To enable chainig multiple field/email actions to a single/multiple conditions, 
         // any "condition.action" is expected to be an array, regardless of "condition.type". Since old conditions
         // are stored in the database with a single action, "condition.action" is converted to an array, concatting 
         // the only action which condition has.
        conditions.each(function(condition) {
            condition.action = [].concat(condition.action); 
        });
    },
    /**
     * Shows a field
     * @param {Object} field
     */
    showField: function(field){
        
        var element = null;
        var idField = $('id_' + field);
        var cidField = $('cid_' + field);
        var sectionField = $('section_' + field);

        if (sectionField && cidField) { // Form collapse
            element = sectionField;
        } else if (cidField && !idField) { // Heading
            element = cidField;
        } else { // Regular field
            element = idField;
        }

        if (!element) {
            return element;
        }

        element.removeClassName('form-field-hidden');
        
        // kemal:bug::#145986 Form collapse bug
        if(sectionField){
            if(element.hasClassName('form-section-closed')){ //if a closed form-section
                //check for .form-collapse-table has class form-collapse-hidden
                if(element.select('.form-collapse-table')[0].hasClassName('form-collapse-hidden')){
                    //element is hidden remove class add class
                    element.removeClassName('form-section-closed');
                    element.addClassName('form-section');
                    element.setStyle({
                        height:"auto",
                        overflow:"hidden"
                    });
                }else{
                    //element is visible do not add auto height
                    element.setStyle({
                        overflow:"hidden"
                    });
                }
            }else{
                //case for status = closed
                element.setStyle({
                    height:"auto",
                    overflow:"hidden"
                });
            }   
        }

        return element.show();
    },
    
    /**
     * Hides a field
     * @param {Object} field
     */
    hideField: function(field){
        var idPrefix = 'id_';
        
        // For headings
        if($('cid_'+field) && !$('id_'+field)){
            idPrefix = 'cid_';
        }

       // For form collapses
        if($('cid_'+field) && $('section_'+field)){
            idPrefix='section_';
        }
        var element = $(idPrefix+field);
        
        if(element) {
            element.addClassName('form-field-hidden');
            return element.hide();
        }
    },
    
    /**
     * Checks the fieldValue by given operator string
     * @param {Object} operator
     * @param {Object} condValue
     * @param {Object} fieldValue
     */
    checkValueByOperator: function(operator, condValueOrg, fieldValueOrg){
        
        var fieldValue = Object.isBoolean(fieldValueOrg)? fieldValueOrg : fieldValueOrg.toString().strip();
        var condValue  = Object.isBoolean(condValueOrg)? condValueOrg : condValueOrg.toString().strip();
        
        // JotForm.log('if "%s" %s "%s"', fieldValue, operator, condValue, "\t\t\t=> Originals:", "Field: '", fieldValueOrg, "', Cond: '", condValueOrg,"'");

        switch (operator) {
            case "equals":
            case "quantityEquals":
            case "equalDate":
                return fieldValue == condValue;
            case "notEquals":
            case "notEqualDate":
            case "quantityNotEquals":
                return fieldValue != condValue;
            case "endsWith":
                return fieldValue.endsWith(condValue);
            case "startsWith":
                return fieldValue.startsWith(condValue);
            case "contains":
                return fieldValue.include(condValue);
            case "notContains":
                return !fieldValue.include(condValue);
            case "greaterThan":
            case "quantityGreater":
                return (parseInt(fieldValue, 10) || 0) > (parseInt(condValue, 10) || 0);
            case "lessThan":
            case "quantityLess":
                //Emre: if Scale Rating doesn't have value it returns "true" so we need to check wheater its length is greater than 0 (52809)
                //fieldValue is string, not number
                if(fieldValue.length){
                    return (parseInt(fieldValue, 10) || 0) < (parseInt(condValue, 10) || 0);
                }else{
                    return false;
                }
            case "isEmpty":
                if(Object.isBoolean(fieldValue)){ return !fieldValue; }
                return fieldValue.empty();
            case "isFilled":
                if(Object.isBoolean(fieldValue)){ return fieldValue; }
                return !fieldValue.empty();
            case "before":
                return fieldValueOrg < condValueOrg;
            case "after":
                return fieldValueOrg > condValueOrg;
            default:
                JotForm.error("Could not find this operator", operator);
        }
        return false;
    },
    
    typeCache: {},   // Cahcke the check type results for performance
    /**
     * 
     * @param {Object} id
     */
    getInputType: function(id){
        if(JotForm.typeCache[id]){ return JotForm.typeCache[id]; }
        var type = false;
        if($('input_'+id)){
            type = $('input_'+id).nodeName.toLowerCase() == 'input'? $('input_'+id).readAttribute('type').toLowerCase() : $('input_'+id).nodeName.toLowerCase();
            if($('input_'+id).hasClassName("form-radio-other-input")){
                type = "radio";
            }
            if($('input_'+id).hasClassName("form-checkbox-other-input")){
                type = "checkbox";
            }
            // Neil: set type for autocomplete fields
            if($('input_'+id).hasClassName('form-autocomplete')){
            type = "autocomplete";
            }
        }else if($('input_'+id+'_pick')){
            type = 'datetime';
        }else if($('input_'+id+'_month')){
            type = 'birthdate';
        } else if($('input_'+id+'_hourSelect')) {
            type = 'time';
        }else{
            if($$('#id_'+id+' input')[0]){
                type = $$('#id_'+id+' input')[0].readAttribute('type').toLowerCase();
                if(type == "text" || type == 'tel'){
                    type = "combined";
                }
            }
        }
        JotForm.typeCache[id] = type;
        return type;
    },
    /**
     * Parses ISO Date string to a real date
     * @param {Object} str
     */
    strToDate: function(str){
        // When cannot parse return an invalid date
        var invalid = new Date(undefined);
        var match   = /(\d{4})\-(\d{2})-(\d{2})T?(\d{2})?\:?(\d{2})?/gim;
        
        if(str.empty()){ return invalid; }
        
        // if(!str.include("T")){ str += "T00:00"; }
        
        if(!match.test(str)){ return invalid; }
        
        var d = new Date();
        str.replace(match, function(all, year, month, day, hour, minutes){
            d.setYear(parseInt(year, 10));
            d.setMonth(parseInt(month, 10)-1);
            d.setDate(parseInt(day, 10));
            if(hour){
                d.setHours(parseInt(hour, 10));
                d.setMinutes(parseInt(minutes, 10));
            }
            return all;
        });
        
        //JotForm.log("Date:", str, d);
        
        return d;
    },

    getBirthDate: function(id) {
        var day = $('input_'+id+'_day').getValue()||"%empty%";
        var month = $('input_'+id+'_month').selectedIndex||"%empty%";
        month = String(month);
        var year = $('input_'+id+'_year').getValue()||"%empty%";
        var date = year + "-" + (month.length==1?'0'+month:month) + "-" + (day.length==1?'0'+day:day);
        if(date.include("%empty%")) return "";
        return date;
    },

    get24HourTime: function(id) {
        var hour = $('input_'+id+'_hourSelect').getValue();
        if(hour == "") return "";
        var minute = $('input_' + id + '_minuteSelect').getValue();
        if(minute.length == 0) minute = "00";
        var ampm = ($('input_' + id + '_ampm'))?$('input_' + id + '_ampm').getValue():'';
        hour = Number(hour);
        if(ampm == 'PM' && hour != 12) {
            hour += 12;
        } else if(ampm == 'AM' && hour == 12) { 
            hour = 0;
        }
        hour = (hour<10)?"0"+hour:String(hour);
        return hour + minute;
    },
    
    getDateValue: function(id){
        var date = "";
        if($('year_'+id)){
            date += ($('year_'+id).value || "%empty%");
        }
        if($('month_'+id)){
            date += "-"+($('month_'+id).value || "%empty%");
        }
        if($('day_'+id)){
            date += "-"+($('day_'+id).value || "%empty%");
        }
        
        if(date.include("%empty%")){
            JotForm.info("Wrong date: " + date);
            return "";
        }
        var h="";
        if($('ampm_'+id)){
            if($('hour_'+id)){
                h = $('hour_'+id).value;
                if($('ampm_'+id).value == 'pm'){
                    h = parseInt(h, 10)+12;
                }
                if(h == "24"){
                    h = 0;
                }
                date += "T"+ ((h.length == 1? "0"+h : h) || "00");
            }
        }else{
            if($('hour_'+id)){
                h = $('hour_'+id).value;
                date += "T"+((h.length == 1? "0"+h : h) || "00");
            }
        }
        
        if($('min_'+id)){
            date += ":"+($('min_'+id).value || "00");
        }
        if(h === ""){
            date += "T00:00";
        }
        return date;
    },
    /**
     * 
     * @param {Object} condition
     */
    checkCondition: function(condition){
        var any=false, all=true;
        var filled;
        $A(condition.terms).each(function(term){
            var value;
            try{
                switch(JotForm.getInputType(term.field)){
                    case "combined":
                        if (['isEmpty', 'isFilled'].include(term.operator)) {
                            filled = $$('#id_'+term.field+' input').collect(function(e){ return e.value; }).any();
                            
                            if(JotForm.checkValueByOperator(term.operator, term.value, filled)){
                                any = true;
                            }else{
                                all = false;
                            }
                            
                            return; /* continue; */ 
                        }
                    break;
                    case "birthdate":
                    case "datetime":
                        value = (JotForm.getInputType(term.field)=="datetime")?JotForm.getDateValue(term.field):JotForm.getBirthDate(term.field);
                        if(value === undefined){ return; /* continue; */ }
                        
                        if (['isEmpty', 'isFilled'].include(term.operator)) {
                            if(JotForm.checkValueByOperator(term.operator, term.value, value)){
                                any = true;
                            }else{
                                all = false;
                            }
                            
                        } else if(['equalDate', 'notEqualDate'].include(term.operator)){
                            if(JotForm.checkValueByOperator(term.operator, JotForm.strToDate(term.value), JotForm.strToDate(value.split('T')[0]))){
                                any = true;
                            }else{
                                all = false;
                            }
                        }else{
                            if(JotForm.checkValueByOperator(term.operator, JotForm.strToDate(term.value), JotForm.strToDate(value))){
                                any = true;
                            }else{
                                all = false;
                            }
                        }
                    break;
                    case "time":
                        value = JotForm.get24HourTime(term.field);
                        var termValue = (!term.value)?"":term.value.replace(/:/, "");
                        if (termValue.length == 3) termValue = "0" + termValue;
                        if(term.operator == 'before'  && value.empty()) {
                            all = false;
                        } else {
                            if(JotForm.checkValueByOperator(term.operator, termValue, value))
                                any = true;
                            else
                                all = false;
                        }
                    break;
                    case "checkbox":
                    case "radio":
                        if (['isEmpty', 'isFilled'].include(term.operator)) {
                            filled = $$('#id_'+term.field+' input').collect(function(e){ return e.checked; }).any();
                            
                            if(JotForm.checkValueByOperator(term.operator, term.value, filled)){
                                any = true;
                            }else{
                                all = false;
                            }
                            
                            return; /* continue; */ 
                        }
                        if(term.value) term.value = term.value.replace(/&amp;/g, '&');

                        $$('#id_'+term.field+' input').each(function(input){
                            var value = input.checked? input.value : '';
                            
                            if(JotForm.checkValueByOperator(term.operator, term.value, value)){
                                any = true;
                            }else{
                                // If not equals item is found condition should fail
                                if(term.operator == 'notEquals' && term.value == value){
                                    any = false;
                                    all = false;
                                    throw $break;
                                }
                                
                                if (input.value == term.value) {
                                    all = false;
                                }
                            }
                        });
                    break;
                    default:
                        value = $('input_'+term.field).value;
                        if($('input_'+term.field).hinted){
                            value = "";
                        }
                        if(value === undefined){return;/* continue; */}
                        if(JotForm.checkValueByOperator(term.operator, term.value, value, term.field)){
                            any = true;
                        }else{
                            all = false;
                        }
                }
                
            }catch(e){ 
                JotForm.error(e);
            }
        });
        
        if(condition.type == 'field'){ // Field Condition
            // JotForm.log("any: %s, all: %s, link: %s", any, all, condition.link.toLowerCase());
            var isConditionValid = (condition.link.toLowerCase() == 'any' && any) || (condition.link.toLowerCase() == 'all' && all);
            condition.action.each(function(action) {
                if (isConditionValid) {
                    if (action.visibility.toLowerCase() == 'show'){
                        // JotForm.info('Correct: Show field: '+($('label_' + action.field) && $('label_' + action.field).innerHTML));
                        JotForm.showField(action.field);
                    } else {
                        // JotForm.info('Correct: Hide field: '+($('label_' + action.field) && $('label_' + action.field).innerHTML));
                        JotForm.hideField(action.field);
                    }
                } else {
                    if(action.visibility.toLowerCase() == 'show'){
                        // JotForm.info('Fail: Hide field: '+($('label_' + action.field) && $('label_' + action.field).innerHTML));
                        JotForm.hideField(action.field);
                    } else {
                        // JotForm.info('Fail: Show field: '+($('label_' + action.field) && $('label_' + action.field).innerHTML));
                        JotForm.showField(action.field);
                    }
                }
            });
        }else{ // Page condition
        
            JotForm.log("any: %s, all: %s, link: %s", any, all, condition.link.toLowerCase());
            if (JotForm.nextPage) {
                return;
            }
            if((condition.link.toLowerCase() == 'any' && any) || (condition.link.toLowerCase() == 'all' && all)){
                var action = condition.action[0];
                JotForm.info('Correct: Skip To: ' + action.skipTo);
                var sections = $$('.form-section:not([id^=section_])');
                if(action.skipTo == 'end'){
                    JotForm.nextPage = sections[sections.length - 1];
                }else{
                    JotForm.nextPage = sections[parseInt(action.skipTo.replace('page-', ''), 10)-1];
                }
                
            }else{
                
                JotForm.info('Fail: Skip To: page-' + JotForm.currentPage + 1);
                
                JotForm.nextPage = false; 
            }
        }
        JotForm.enableDisableButtonsInMultiForms();
    },
    currentPage: false,
    nextPage: false,
    previousPage: false,
    fieldConditions: {},
    
    setFieldConditions: function(field, event, condition){
        if(!JotForm.fieldConditions[field]){
            JotForm.fieldConditions[field] = {
                event: event,
                conditions:[]
            };
        }
        JotForm.fieldConditions[field].conditions.push(condition);
    },
    
    /**
     * Sets all events and actions for form conditions
     */
    setConditionEvents: function(){
        try {
            $A(JotForm.conditions).each(function(condition){

                if(condition.disabled == true) return; //go to next condition
            
                if (condition.type == 'field') {
                    
                    // Loop through all rules
                    $A(condition.terms).each(function(term){
                        var id = term.field;
                        switch (JotForm.getInputType(id)) {
                            case "combined":
                                JotForm.setFieldConditions('id_' + id, 'keyup', condition);
                            break;
                            case "datetime":
                                JotForm.setFieldConditions('id_' + id, 'date:changed', condition);
                            break;
                            case "birthdate":
                                JotForm.setFieldConditions('input_'+id+'_day', 'change', condition);
                                JotForm.setFieldConditions('input_'+id+'_month', 'change', condition);
                                JotForm.setFieldConditions('input_'+id+'_year', 'change', condition);
                            break;
                            case "time":
                                JotForm.setFieldConditions('input_'+id+'_hourSelect', 'change', condition);
                                JotForm.setFieldConditions('input_'+id+'_minuteSelect', 'change', condition);
                                JotForm.setFieldConditions('input_'+id+'_ampm', 'change', condition);
                            case "select":
                            case "file":
                                JotForm.setFieldConditions('input_' + id, 'change', condition);
                                break;
                            case "checkbox":
                            case "radio":
                                JotForm.setFieldConditions('id_' + id, 'click', condition);
                                break;
                            case "number":
                                JotForm.setFieldConditions('input_' + id, 'number', condition);
                                break;
                            case "autocomplete": // Neil: Set custom event for autocomplete fields (classname: "form-autocomplete")
                                JotForm.setFieldConditions('input_' + id, 'autocomplete', condition);
                                break;
                            default: // text, textarea, dropdown
                                JotForm.setFieldConditions('input_' + id, 'keyup', condition);
                        }
                    });
                    
                } else {
                    $A(condition.terms).each(function(term){
                        var id = term.field;
                        
                        // if this is a product quantity option (e.g. 4_quantity_1009_0)
                        if (term.field.indexOf("_") !== -1) {
                            // get ID (4)
                            id = term.field.split("_")[0];
                        }
                        
                        var nextButton = JotForm.getSection($('id_' + id)).select('.form-pagebreak-next')[0];
                        if (!nextButton) {
                            return;
                        }
                        
                        nextButton.observe('mousedown', function(){
                            // JotForm.warn('Checking ' + $('label_' + id).innerHTML.strip());
                            JotForm.checkCondition(condition);
                        });
                    });
                }
            });
            
            $H(JotForm.fieldConditions).each(function(pair){
                var field = pair.key;
                var event = pair.value.event;
                var conds = pair.value.conditions;
                
                // JotForm.info("Has Condition:", field, $(field));
                // If field is not found then continue
                if(!$(field)){ return; }
                if(event == "autocomplete"){ // if event type is trigger by autocomplete, listen to blur and keyup events
                    $(field).observe('blur', function(){
                        $A(conds).each(function(cond){
                            JotForm.checkCondition(cond);
                        });
                        }).run('blur');
                    $(field).observe('keyup', function(){
                        $A(conds).each(function(cond){
                            JotForm.checkCondition(cond);
                        });
                        }).run('keyup');
                } else if(event == "number") {
                    $(field).observe('change', function(){
                        $A(conds).each(function(cond){
                            JotForm.checkCondition(cond);
                        });
                        }).run('change');
                    $(field).observe('keyup', function(){
                        $A(conds).each(function(cond){
                            JotForm.checkCondition(cond);
                        });
                    }).run('keyup'); 
                }
                else {
                $(field).observe(event, function(){
                    $A(conds).each(function(cond){
                        //Emre: phone condition does not work (65639)
                        //var idf = field.replace(/.*_(\d+)/gim, '$1'); if field is "input_3_area", result is "3_area"
                        var idf = field.replace(/[^0-9]/gim, ''); 
                        // JotForm.warn('Checking ' + $('label_' + idf).innerHTML.strip(), ", Field Type: "+JotForm.getInputType(idf));
                        JotForm.checkCondition(cond);
                    });
                }).run(event);
            }
            });
        }catch(e){ 
            JotForm.error(e); 
        }
    },
    /**
     * Calculates the payment total with quantites
     * @param {Object} prices
     */
    countTotal: function(prices){
    
        var total = 0;
        $H(prices).each(function(pair){
            total = parseFloat(total);
            var price = parseFloat(pair.value.price);
            // if product has special pricing, use selected option's corresponding price
            if ($(pair.value.specialPriceField)) { 
                var specialPriceField = $(pair.value.specialPriceField);
                var x = specialPriceField.selectedIndex;
                var y = specialPriceField.options;
                price = parseFloat(pair.value.specialPriceList[y[x].index]);
                $(pair.key + '_price').update(parseFloat(price).toFixed(2));
                $(pair.key + '_price').siblings('.freeCurr').each(function(el) { el.style.display = 'inline';});
            }
            if ($(pair.key).checked) {
                    if ($(pair.value.quantityField) || $(pair.value.specialPriceField)) {
                        //if there is a quantity option and special pricing isn't based on it
                        if ($(pair.value.quantityField) && (pair.value.specialPriceField !== pair.value.quantityField)) {
                        // use different calculation method for custom quantity (textbox) option
                            if($(pair.value.quantityField).readAttribute('type') == "text") {
                                price = $(pair.value.quantityField).value ? price * Math.abs(parseInt($(pair.value.quantityField).value, 10)) : 0;
                            }
                            else {
                                price = price * parseInt($(pair.value.quantityField).getSelected().text, 10);
                            }
                        }
                        if ($(pair.key + '_subtotal') && !isNaN(price)){
                        $(pair.key + '_subtotal').update(parseFloat(price).toFixed(2));
                        }
                    }
                total += price;
            }
            else {
                if ($(pair.key + '_subtotal') || isNaN(price)) {
                $(pair.key + '_subtotal').update("0.00");
                }
            }
        });
        
        if (total === 0 || isNaN(total)) {
            total = "0.00";
        }
        if ($("payment_total")) {
            $("payment_total").update(parseFloat(total).toFixed(2));
        }
    },
    /**
     * Sets the events for dynamic total calculation
     * @param {Object} prices
     */
    totalCounter: function(prices){
        // count total price upon loading the form (Bug:168425)
        document.observe('dom:loaded',JotForm.countTotal(prices));
        $H(prices).each(function(pair){
            $(pair.key).observe('click', function(){
                JotForm.countTotal(prices);
            });
            if ($(pair.value.quantityField)) {
                function countQuantityTotal(){
                        if(JotForm.isVisible($(pair.value.quantityField))){
                            $(pair.key).checked = !($(pair.value.quantityField).value <= 0) ? true : false;
                            JotForm.countTotal(prices);
                        }
                    }
                $(pair.value.quantityField).observe('change', function(){
                    setTimeout(countQuantityTotal,50);
                });
                // calculate total for custom quantity (text box)
                $(pair.value.quantityField).observe('keyup', function(){
                    setTimeout(countQuantityTotal,50);
                });
            }
            if ($(pair.value.specialPriceField)) {
                function countSpecialTotal(){
                        if(JotForm.isVisible($(pair.value.specialPriceField))){
                           $(pair.key).checked = true;
                           JotForm.countTotal(prices);
                        }
                    }
                $(pair.value.specialPriceField).observe('change', function(){
                    setTimeout(countSpecialTotal,50);
                });
                $(pair.value.specialPriceField).observe('keyup', function(){
                    setTimeout(countSpecialTotal,50);
                });
            }
        });
    },
    /**
     * Initiates the capctha element
     * @param {Object} id
     */
    initCaptcha: function(id){
        /**
         * When captcha image requested on foreign pages
         * It gives error on initial load, probably because
         * SCRIPT embed. However when we delay the execution 
         * Image request this problems resolves.
         */
        setTimeout(function(){
            var a = new Ajax.Jsonp(JotForm.server, {
                parameters: {
                    action: 'getCaptchaId'
                },
                evalJSON: 'force',
                onComplete: function(t){
                    t = t.responseJSON || t;
                    if (t.success) {
                        $(id + '_captcha').src = 'https://www.jotform.com/server.php?action=getCaptchaImg&code=' + t.num;
                        $(id + '_captcha_id').value = t.num;
                    }
                }
            });
        }, 150);
    },
    /**
     * Relads a new image for captcha
     * @param {Object} id
     */
    reloadCaptcha: function(id){
        $(id + '_captcha').src = JotForm.url+'images/blank.gif';
        JotForm.initCaptcha(id);
    },
    /**
     * Zero padding for a given number
     * @param {Object} n
     * @param {Object} totalDigits
     */
    addZeros: function(n, totalDigits){
        n = n.toString();
        var pd = '';
        if (totalDigits > n.length) {
            for (i = 0; i < (totalDigits - n.length); i++) {
                pd += '0';
            }
        }
        return pd + n.toString();
    },
    /**
     * @param {Object} d
     */
    formatDate: function(d){
        var date = d.date;
        var month = JotForm.addZeros(date.getMonth() + 1, 2);
        var day = JotForm.addZeros(date.getDate(), 2);
        var year = date.getYear() < 1000 ? date.getYear() + 1900 : date.getYear();
        var id = d.dateField.id.replace(/\w+\_/gim, '');
        $('month_' + id).value = month;
        $('day_' + id).value = day;
        $('year_' + id).value = year;
        $('id_'+id).fire('date:changed');
    },
    /**
     * Highlights the lines when an input is focused
     */
    highLightLines: function(){
        
        // Highlight selected line
        $$('.form-line').each(function(l, i){
            l.select('input, select, textarea, div, table div, button').each(function(i){
                
                i.observe('focus', function(){
                    if (JotForm.isCollapsed(l)) {
                        JotForm.getCollapseBar(l).run('click');
                    }
                    if(!JotForm.highlightInputs){ return; }
                    l.addClassName('form-line-active');
                    // for descriptions
                    if(l.__classAdded){ l.__classAdded = false; }
                }).observe('blur', function(){
                    if(!JotForm.highlightInputs){ return; }
                    l.removeClassName('form-line-active');
                });
            });
        });
    },
    /**
     * Gets the container FORM of the element
     * @param {Object} element
     */
    getForm: function(element){
        element = $(element);
        if (!element.parentNode) {
            return false;
        }
        if (element && element.tagName == "BODY") {
            return false;
        }
        if (element.tagName == "FORM") {
            return $(element);
        }
        return JotForm.getForm(element.parentNode);
    },
    /**
     * Gets the container of the input
     * @param {Object} element
     */
    getContainer: function(element){
        element = $(element);
        if (!element.parentNode) {
            return false;
        }
        if (element && element.tagName == "BODY") {
            return false;
        }
        if (element.hasClassName("form-line")) {
            return $(element);
        }
        return JotForm.getContainer(element.parentNode);
    },
    
    /**
     * Get the containing section the element
     * @param {Object} element
     */
    getSection: function(element){
        element = $(element);
        if (!element.parentNode) {
            return false;
        }
        if (element && element.tagName == "BODY") {
            return false;
        }
        if ((element.hasClassName("form-section-closed") || element.hasClassName("form-section")) && !element.id.match(/^section_/)) {
            return element;
        }
        return JotForm.getSection(element.parentNode);
    },
    /**
     * Get the fields collapse bar
     * @param {Object} element
     */
    getCollapseBar: function(element){
        element = $(element);
        if (!element.parentNode) {
            return false;
        }
        if (element && element.tagName == "BODY") {
            return false;
        }
        if (element.hasClassName("form-section-closed") || element.hasClassName("form-section")) {
            return element.select('.form-collapse-table')[0];
        }
        return JotForm.getCollapseBar(element.parentNode);
    },
    /**
     * Check if the input is collapsed
     * @param {Object} element
     */
    isCollapsed: function(element){
        element = $(element);
        if (!element.parentNode) {
            return false;
        }
        if (element && element.tagName == "BODY") {
            return false;
        }
        if (element.className == "form-section-closed") {
            return true;
        }
        return JotForm.isCollapsed(element.parentNode);
    },
    /**
     * Check if the input is visible
     * @param {Object} element
     */
    isVisible: function(element){
        element = $(element);
        if (!element.parentNode) {
            return false;
        }
        
        if (element && element.tagName == "BODY") {
            return true;
        }
        
        if (element.style.display == "none" || element.style.visibility == "hidden") {
            return false;
        }
        
        return JotForm.isVisible(element.parentNode);
    },
    
    /**
     * Emre: to eneable/disable all submit buttons in multi-forms
     */
    enableDisableButtonsInMultiForms: function() {
        var allButtons = $$('.form-submit-button');
        allButtons.each(function(b) {
            if(b.up('ul.form-section')) {
                if(b.up('ul.form-section').style.display == "none") {
                    b.disable();
                } else {
                    if(b.className.indexOf("disabled") == -1){
                        b.enable();
                    }
                }
            }
        });
    },
    
    /**
     * Enables back the buttons
     */
    enableButtons: function(){
        setTimeout(function(){
            $$('.form-submit-button').each(function(b){
                b.enable();
                b.innerHTML = b.oldText;
            });
        }, 60);
    },
    
    /**
     * Sets the actions for buttons
     * - Disables the submit when clicked to prevent double submit.
     * - Adds confirmation for form reset
     * - Handles the print button
     */
    setButtonActions: function(){

        $$('.form-submit-button').each(function(b){
            b.oldText = b.innerHTML;
            b.enable(); // enable previously disabled button

            //Emre: to provide sending form with with clicking "enter" button in Multi-page forms
            //JotForm.enableDisableButtonsInMultiForms();
            
            b.observe('click', function(){
                setTimeout(function(){
                    //Emre: to display all submit buttons
                    if(!$$('.form-error-message')[0] && !$$('.form-textarea-limit-indicator-error')[0]){ //Emre: when limit text are is used, submit button doesn't work (51335)
                       var allButtons  = $$('.form-submit-button');
                       allButtons.each(function(bu){
                           bu.innerHTML = JotForm.texts.pleaseWait;
                          //Emre: submit button problem (51335)
                           bu.addClassName('lastDisabled');
                           bu.disable();
                       });
                    }
                }, 50);
            });
        });

        $$('.form-submit-reset').each(function(b){
            b.onclick = function(){
                if (!confirm(JotForm.texts.confirmClearForm)) {
                    return false;
                }

                //clear all errors after clear form called start feature request 154829
                $$(".form-line-error").each(function(tmp){
                    tmp.removeClassName("form-line-error");

                });

                $$(".form-error-message",".form-button-error").each(function(tmp){
                    tmp.remove();
                });
                //clear all errors after form called end 
                //feature request 154940  must reset any form char limits for textareas start

                    $$(".form-textarea-limit-indicator > span").each(function(tmp){
                        var raw = tmp.innerHTML;
                        tmp.innerHTML = raw.replace(raw.substring(0,raw.indexOf("/")),"0" );

                    });

                //feature request implementation end
                
                //bugfix 187865  also reset grading tools total field
                $$("span[id^=grade_point_]").each(function(tmp){
                  tmp.innerHTML = 0;
                });
                $$(".form-grading-error").each(function(tmp){
                  tmp.innerHTML = ""; //also remove any previous grading errors
                });
                //bugfix end
                //note: TODO: instead of distinctively handling corner cases, it is best to fire a form change event that will trigger correct behaviour -kemal 

            };
        });
        
        $$('.form-submit-print').each(function(print_button){
        
            print_button.observe("click", function(){
                $(print_button.parentNode).hide();
                $$('.form-textarea, .form-textbox').each(function(el){
                    
                    if(!el.type){ // type of slider is undefined
                       el.value = el.value || '0'; // to protect problem when slider has no value
                    }
                    //Emre: to prevent css problem on "Date Time" so <span> must be added(66610)
                    var dateSeparate;
                    if(dateSeparate = el.next('.date-separate')){
                        dateSeparate.hide();
                    }
                    //Emre: we must specify "width" and "height" to prevent getting new line
                    var elWidth = "";
                    if(el.value.length < el.size){
                        elWidth = "width:" + el.size*9 + "px;";
                    }

                    el.insert({
                        before: new Element('div', {
                            className: 'print_fields'
                        }).update(el.value.replace(/\n/g, '<br>')).setStyle('border:1px solid #ccc; padding:1px 4px;min-height:18px;' + elWidth)
                    }).hide();
                });
                window.print();
                $$('.form-textarea, .form-textbox, .date-separate').invoke('show');
                $$('.print_fields').invoke('remove');
                $(print_button.parentNode).show();
            });
            
        });
    },

    /**
    * These will correct any errors in a tool with a validations
    * especially in hidden mode. Thus it will ignore the said validation
    */
    hasHiddenValidationConflicts: function( input )
    {
        var hiddenOBJ = input.up('li.form-line');
        if( hiddenOBJ && hiddenOBJ.hasClassName('form-field-hidden') ) {
            return true;
        } else {
            return false;
        }
    },

    /**
     * Handles the functionality of control_grading tool
     */
    initGradingInputs: function(){
        
        var _this = this;//JotForm object

        $$('.form-grading-input').each(function(item){

          //register a blur event to validate the
          item.observe('blur', function(){
            item.validateGradingInputs();
          });
          item.observe('keyup', function(){
            item.validateGradingInputs();
          });

          //create a function that will check the validity of inputs
          //attach it to the items/grading inputs
          item.validateGradingInputs = function()
          {
            var item = this,
              id = item.id.replace(/input_(\d+)_\d+/, "$1"),
              total = 0,
              _parentNode = $(item.parentNode.parentNode),
              numeric = /^(\d+[\.]?)+$/,
              isNotNumeric = false;

            //correct any errors first that is attach in the item obj
            item.errored = false;

            _parentNode.select(".form-grading-input").each(function(sibling){
                if ( sibling.value && !numeric.test( sibling.value ) )
                {
                  isNotNumeric = true;
                  throw $break;
                }
                total += parseFloat(sibling.value) || 0;
            });

            //check if hidden, if so return its valid
            if( _this.hasHiddenValidationConflicts(item) ) return JotForm.corrected(item);

            //if not numeric then return an error
            if( isNotNumeric ) {
              return JotForm.errored( item, JotForm.texts.numeric );
            }

            if($("grade_total_" + id)) {
                //set the grade error notifier to empty
                $("grade_error_" + id).innerHTML = "";
                //set the allowed total to the grade_point notifier
                var allowed_total = parseFloat( $("grade_total_" + id).innerHTML );
                $("grade_point_" + id).innerHTML = total;

                if ( total > allowed_total) 
                {
                    //do the error display
                    $("grade_error_" + id ).innerHTML = ' ' + JotForm.texts.lessThan + ' <b>' + allowed_total + '</b>.';
                    return JotForm.errored(item, JotForm.texts.gradingScoreError + " " + allowed_total );
                }
                else
                {
                  //remove error display
                  return JotForm.corrected(item);
                }
            } else {
                return JotForm.corrected(item);
            }
          }
        });
    },
    /**
     * Handles the functionality of control_spinner tool
     */
    initSpinnerInputs: function()
    {
        var _this = this;//JotForm object

        $$('.form-spinner-input').each(function(item){

          //register a blur/change event to validate the data
          item.observe('blur', function(){
            item.validateSpinnerInputs();
          }).observe('change', function(){
            item.validateSpinnerInputs();
          });

          //register an event when the carret is clicked
          var c_parent = item.up('table.form-spinner'),
              c_up = c_parent.select('td.form-spinner-up')[0],
              c_down = c_parent.select('td.form-spinner-down')[0];

          c_up.observe('click', function(e){
              item.validateSpinnerInputs();
          });
          c_down.observe('click', function(e){
              item.validateSpinnerInputs();
          });

          //create a function that will check the validity of inputs
          //attach it to the items/spinner inputs
          item.validateSpinnerInputs = function()
          {
            var item = this,
            id = item.id.replace(/input_(\d+)_\d+/, "$1"),
            numeric = /^(-?\d+[\.]?)+$/,
            numericDotStart = /^([\.]\d+)+$/,  //accept numbers starting with dot
            userInput = item.value || 0;

            //correct any errors first that is attach in the item obj
            item.errored = false;

            //check if hidden, if so return its valid
            if( _this.hasHiddenValidationConflicts(item) ) return JotForm.corrected(item);

            if( userInput && !numeric.test( userInput ) &&  !numericDotStart.test( userInput ) )
            {
                return JotForm.errored( item, JotForm.texts.numeric );
            }

            //read the min and max val total, and check for inputs
            var min_val = parseInt( item.readAttribute('data-spinnermin') ) || false,
                max_val = parseInt( item.readAttribute('data-spinnermax') ) || false;

            if( min_val && userInput < min_val )
            {
              return JotForm.errored(item, JotForm.texts.inputCarretErrorA + " " + min_val );
            }
            else if ( max_val && userInput > max_val )
            {
              return JotForm.errored(item, JotForm.texts.inputCarretErrorB + " " + max_val );
            }
            else
            {
              //remove error display
              return JotForm.corrected(item);
            }
          }
        });
    },
    /**
     * Handles the functionality of control_number tool
     */
    initNumberInputs: function()
    {
        var _this = this;//JotForm object
      
        $$('.form-number-input').each(function(item){

          //register a blur/change event to validate the data
          item.observe('blur', function(){
            item.validateNumberInputs();
          }).observe('change', function(){
            item.validateNumberInputs();
          });

          //create a function that will check the validity of inputs
          //attach it to the items/number inputs
          item.validateNumberInputs = function()
          {
            var item = this,
            id = item.id.replace(/input_(\d+)_\d+/, "$1"),
            numeric = /^(-?\d+[\.]?)+$/,
            numericDotStart = /^([\.]\d+)+$/;  //accept numbers starting with dot

            //correct any errors first that is attach in the item obj
            item.errored = false;

            //check if hidden, if so return its valid
            if( _this.hasHiddenValidationConflicts(item) ) return JotForm.corrected(item);

            if( item.value && !numeric.test( item.value ) && !numericDotStart.test( item.value ) )
            {
                return JotForm.errored( item, JotForm.texts.numeric );
            }

            //read the min and max val total, and check for inputs
            var min_val = parseInt( item.readAttribute('data-numbermin') ),
                max_val = parseInt( item.readAttribute('data-numbermax') ),
                max_len = parseInt( item.readAttribute('maxlength') );

            if( max_len && item.value && item.value.length > max_len )
            {
              return JotForm.errored(item,  JotForm.texts.maxDigitsError + " " + max_len );
            }
            else if( ( min_val || min_val == 0 ) && parseInt( item.value ) < min_val )
            {
              // item.value = min_val;
              return JotForm.errored(item, JotForm.texts.inputCarretErrorA + " " + min_val );
            }
            else if ( max_val && parseInt( item.value ) > max_val )
            {
              // item.value = max_val;
              return JotForm.errored(item, JotForm.texts.inputCarretErrorB + " " + max_val );
            }
            else
            {
              if( parseInt( item.value ) < 0 ) item.value = 0;
              //remove error display
              return JotForm.corrected(item);
            }
          }
        });
    },
    /**
     * Handles the pages of the form
     */
    backStack: [],
    currentSection: false,

    handlePages: function(){
        var $this = this;
        var pages = [];
        var last;
        $$('.form-pagebreak').each(function(page, i){
            var section = $(page.parentNode.parentNode);
            if (i >= 1) {
                // Hide other pages
                section.hide();
            }else{
                JotForm.currentSection = section;
            }
            pages.push(section); // Collect pages
            
            section.pagesIndex = i+1;
            
            section.select('.form-pagebreak-next').invoke('observe', 'click', function(){ // When next button is clicked
                if(JotForm.saving){return;}
                if (JotForm.validateAll(JotForm.getForm(section))) {
                	if (window.parent && window.parent != window) {
                		window.parent.postMessage('scrollIntoView', '*');
                	}

                    if(JotForm.nextPage){
                        JotForm.backStack.push(section.hide()); // Hide current
                        JotForm.currentSection = JotForm.nextPage.show();

                        //Emre: to prevent page to jump to the top (55389)
                        if(!$this.noJump){
                            JotForm.currentSection.scrollIntoView(true);
                        }

                        JotForm.enableDisableButtonsInMultiForms();
                    }else if (section.next()) { // If there is a next page
                        JotForm.backStack.push(section.hide()); // Hide current
                        // This code will be replaced with condition selector
                        JotForm.currentSection = section.next().show();

                        //Emre
                        if(!$this.noJump){
                            JotForm.currentSection.scrollIntoView(true);
                        }

                        JotForm.enableDisableButtonsInMultiForms();
                    }
                    
                    JotForm.nextPage = false;
                    if(JotForm.saveForm){
                        JotForm.hiddenSubmit(JotForm.getForm(section));
                    }
                } else {
                    try {
                        $$('.form-button-error').invoke('remove');
                        $$('.form-pagebreak-next').each(function(nextButton){
                            var errorBox = new Element('div', {className:'form-button-error'});
                            errorBox.insert(JotForm.texts.incompleteFields);
                            $(nextButton.parentNode.parentNode).insert(errorBox);
                        });
                    } catch(e) {
                        // couldnt find 'next button'
                    }
                }
            });
            
            section.select('.form-pagebreak-back').invoke('observe', 'click', function(){ // When back button is clicked
            	if (window.parent && window.parent != window) {
            		window.parent.postMessage('scrollIntoView', '*');
            	}
            	
                if(JotForm.saving){return;}
                section.hide();
                JotForm.currentSection = JotForm.backStack.pop().show();
                //Emre
                if(!$this.noJump){
                    JotForm.currentSection.scrollIntoView(true);
                }

                JotForm.nextPage = false;

                JotForm.enableDisableButtonsInMultiForms();

                if(JotForm.saveForm){
                    JotForm.hiddenSubmit(JotForm.getForm(section));
                }
                //clear if there is an error bar near back-next buttons
                $$('.form-button-error').invoke('remove');
            });
            
        });
        
        // Handle trailing page
        if (pages.length > 0) {
            var allSections = $$('.form-section');
            if (allSections.length > 0) {
                last = allSections[allSections.length - 1];
            }
            
            // if there is a last page
            if (last) {
                last.pagesIndex = allSections.length;
                pages.push(last); // add it with the other pages
                last.hide(); // hide it until we open it
                var li = new Element('li', {
                    className: 'form-input-wide'
                });
                var cont = new Element('div', {
                    className: 'form-pagebreak'
                });
                var backCont = new Element('div', {
                    className: 'form-pagebreak-back-container'
                });
                var back = $$('.form-pagebreak-back-container')[0].select('button')[0];
                
                back.observe('click', function(){
                    if(JotForm.saving){return;}
                    last.hide();
                    JotForm.nextPage = false;
                });
                
                backCont.insert(back);
                cont.insert(backCont);
                li.insert(cont);
                last.insert(li);
            }
        }
        
    },
    /**
     * Handles the functionality of Form Collapse tool
     */
    handleFormCollapse: function(){
        var $this = this;
        var openBar = false;
        var openCount = 0;
        $$('.form-collapse-table').each(function(bar){
            var section = $(bar.parentNode.parentNode);
            //section.setUnselectable();  //ntw - bug#209358  - If anyone knows why this line exists please tell me - prevents selection in firefox under collapses and I cannot see that it performs any other function
            if (section.className == "form-section-closed") {
                section.closed = true;
            } else {
                if (section.select('.form-collapse-hidden').length < 0) {
                    openBar = section;
                    openCount++;
                }
            }
            bar.observe('click', function(){
            
                if (section.closed) {
                
                    section.setStyle('overflow:visible; height:auto');
                    var h = section.getHeight();
                    
                    if (openBar && openBar != section && openCount <= 1) {
                        openBar.className = "form-section-closed";
                        openBar.shift({
                            height: 60,
                            duration: 0.5
                        });
                        openBar.select('.form-collapse-right-show').each(function(e){
                            e.addClassName('form-collapse-right-hide').removeClassName('form-collapse-right-show');
                        });
                        openBar.closed = true;
                    }
                    openBar = section;
                    section.setStyle('overflow:hidden; height:60px');
                    // Wait for focus
                    setTimeout(function(){
                        section.scrollTop = 0;
                        section.className = "form-section";
                    }, 1);
                    
                    section.shift({
                        height: h,
                        duration: 0.5,
                        onEnd: function(e){
                            e.scrollTop = 0;
                            e.setStyle("height:auto;");
                            if(!$this.noJump){
                                e.scrollIntoView();
                            }
                        }
                    });
                    section.select('.form-collapse-right-hide').each(function(e){
                        e.addClassName('form-collapse-right-show').removeClassName('form-collapse-right-hide');
                    });
                    section.closed = false;
                } else {
                
                    section.scrollTop = 0;
                    section.shift({
                        height: 60,
                        duration: 0.5,
                        onEnd: function(e){
                            e.className = "form-section-closed";
                        }
                    });
                    
                    //Emre: Added if because of preventing collapse open/close bug
                    if(openBar){
                        openBar.select('.form-collapse-right-show').each(function(e){
                            e.addClassName('form-collapse-right-hide').removeClassName('form-collapse-right-show');
                        });
                    }

                    section.closed = true;
                }
            });
        });
    },
    /**
     * Shows or Hides the credit card form according to payment method selected
     * for PayPalPro
     */
    handlePayPalProMethods: function(){
        if ($('creditCardTable')) {
            $$('.paymentTypeRadios').each(function(radio){
                radio.observe('click', function(){
                    if (radio.checked && radio.value == "express") {
                        $('creditCardTable').hide();
                    }
                    if (radio.checked && radio.value == "credit") {
                        $('creditCardTable').show();
                    }
                });
            });
        }
    },
    
    /**
     * Creates description boxes next to input boxes
     * @param {Object} input
     * @param {Object} message
     */
    description: function(input, message){
        // v2 has bugs, v3 has stupid solutions
        if(message == "20"){ return; } // Don't remove this or some birthday pickers will start to show 20 as description
        
        var lineDescription = false;
        if(!$(input)){
            var id = input.replace(/[^\d]/gim, '');
            if($("id_"+id)){
                input = $("id_"+id);
                lineDescription = true;
            }else if($('section_'+id)){
                input = $('section_'+id);
                lineDescription = true;
            }else{
                return; /* no element found to display a description */             
            }
        }
        
        if($(input).setSliderValue){
            input = $($(input).parentNode);            
        }
        
        var cont = JotForm.getContainer(input);
        if(!cont){
            return;
        }
        var right = false;
        
        var bubble = new Element('div', { className: 'form-description'});
        var arrow = new Element('div', { className: 'form-description-arrow' });
        var arrowsmall = new Element('div', { className: 'form-description-arrow-small' });
        var content = new Element('div', { className: 'form-description-content' });
        var indicator;
        
        if("desc" in document.get && document.get.desc == 'v2'){
            right = true;
            cont.insert(indicator = new Element('div', {className:'form-description-indicator'}));
            bubble.addClassName('right');
        }
        
        content.insert(message);
        bubble.insert(arrow).insert(arrowsmall).insert(content).hide();
        
        cont.insert(bubble);
        
        if((cont.getWidth()/2) < bubble.getWidth()){
            bubble.setStyle('right: -' + ( cont.getWidth() - ( right ? 100 : 20 ) ) + 'px');
        }
        
        if(right){
            var h = indicator.measure('height');
            arrow.setStyle('top:'+((h /2) - 20)+'px');
            arrowsmall.setStyle('top:'+((h /2) - 17)+'px');
            
            $(cont).mouseEnter(function(){
                cont.setStyle('z-index:10000');
                if(!cont.hasClassName('form-line-active')){
                    cont.addClassName('form-line-active');
                    cont.__classAdded = true;
                }
                bubble.show();
            }, function(){
                if(cont.__classAdded){
                    cont.removeClassName('form-line-active');
                    cont.__classAdded = false;
                }
                cont.setStyle('z-index:0');
                bubble.hide();
            });
            $(input).observe('keydown', function(){
                cont.setStyle('z-index:0');
                bubble.hide();
            });
        }else{
            if(lineDescription){
                $(input).mouseEnter(function(){
                    cont.setStyle('z-index:10000');
                    bubble.show();
                }, function(){
                    cont.setStyle('z-index:0');
                    bubble.hide();
                });
            }else{
                $(cont).mouseEnter(function(){
                    cont.setStyle('z-index:10000');
                    bubble.show();
                }, function(){
                    cont.setStyle('z-index:0');
                    bubble.hide();
                });
                $(input).observe('keyup', function(){
                    cont.setStyle('z-index:0');
                    bubble.hide();
                });
                $(input).observe('focus', function(){
                    cont.setStyle('z-index:10000');
                    bubble.show();
                });
                $(input).observe('blur', function(){
                    cont.setStyle('z-index:0');
                    bubble.hide();
                });
            }
        }
    },
    
    /**
     * do all validations at once and stop on the first error
     * @param {Object} form
     */
    validateAll: function(form){

        var ret = true;
        
        if($$('.form-textarea-limit-indicator-error')[0]){
            ret = false;
        }

        if ($$('.form-datetime-validation-error').first()) {
            ret = false;
        }
        
        if(window.signatureForm){
            var pads = jQuery(".pad");

            for(var i=0; i<pads.length; i++){
                var pad = pads[i];
                if(jQuery(pad).attr("data-required")==="true"){
                    if(jQuery(pad).parent().parent().parent().is(":visible")){
                        ret = jQuery(pad).jSignature('getData','base30')[1].length>1?true:false;
                        var w = jQuery(pad).parent().parent()
                        if(!ret){
                            if(w.find(".form-line-error").length==0){
                                w.append('<div class="form-line-error" style="float:left;">'+
                                    '<div class="form-error-message">'+
                                    '<img src="http://mustafa.jotform.pro/images/exclamation-octagon.png" align="left" style="margin-right:5px;">'+
                                    '<div class="form-error-arrow">'+
                                    '<div class="form-error-arrow-inner"></div>'+
                                    '</div>'+
                                    'This field is required</div></div>');
                            }
                        } else {
                          w.find(".form-line-error").remove();
                        }   
                    }             
                }
            }
        }

        var c = "";
        if(form && form.id){
            c = "#"+form.id+" ";
        }
        
        $$(c + '*[class*="validate"]').each(function(input){
            if(input.validateInput === undefined){ return; /* continue; */ }
            if (!(!!input.validateInput && input.validateInput()) ) {
                // Neil: Bugfix 192169
                if ($(input).parentNode.parentNode.parentNode.getStyle('display') !== 'none'){
                ret = false;   
                //throw $break; // stop at the first error
                }
            }
        });
        
        return ret;
    },
    
    /**
     * When an input is errored
     * @param {Object} input
     * @param {Object} message
     */
    errored: function(input, message){
        
        input = $(input);
        
        if (input.errored) {
            return false;
        }
        
        if(input.runHint){
            input.runHint();
        }/*else{
            //input.select();
        }*/
        
        if (JotForm.isCollapsed(input)) {

            var collapse = JotForm.getCollapseBar(input);
            if (!collapse.errored) {
                collapse.select(".form-collapse-mid")[0].insert({
                    top: '<img src="'+this.url+'images/exclamation-octagon.png" align="bottom" style="margin-right:5px;"> '
                }).setStyle({ color: 'red' });
                collapse.errored = true;
            }
        }
        var container = JotForm.getContainer(input);

        input.errored = true;
        input.addClassName('form-validation-error');
        container.addClassName('form-line-error');
        var insertEl = container;
        
        //if(JotForm.debug){
            insertEl = container.select('.form-input')[0];
            if (!insertEl) {
                insertEl = container.select('.form-input-wide')[0];
            }
            if(!insertEl){
                insertEl = container;
            }
        //}
        insertEl.select('.form-error-message').invoke('remove');

        if(this.url.search("https") == -1){
          var preLink = "http://cdn.jotfor.ms/";
        }else{
          var preLink = "https://d3rpkyj7yvufwq.cloudfront.net/";
        }

        insertEl.insert(new Element('div', {
            className: 'form-error-message'
        }).insert('<img src="'+preLink+'images/exclamation-octagon.png" align="left" style="margin-right:5px;"> ' + message).insert(
        new Element('div', {className:'form-error-arrow'}).insert(new Element('div', {className:'form-error-arrow-inner'}))));
        
        return false;
    },
    
    /**
     * When an input is corrected
     * @param {Object} input
     */
    corrected: function(input){
        JotForm.hideButtonMessage();
        input = $(input);
        input.errored = false;
        if (JotForm.isCollapsed(input)) {
            var collapse = JotForm.getCollapseBar(input);
            if (collapse.errored) {
                collapse.select(".form-collapse-mid")[0].setStyle({
                    color: ''
                }).select('img')[0].remove();
                collapse.errored = false;
            }
        }
        var container = JotForm.getContainer(input);
        if(!container){ return true; }
        container.select(".form-validation-error").invoke('removeClassName', 'form-validation-error');
        container.removeClassName('form-line-error');
        container.select('.form-error-message').invoke('remove');
        return true;
    },
    
    hideButtonMessage: function(){
        $$('.form-button-error').invoke('remove');
    },
    
    showButtonMessage: function(){
        this.hideButtonMessage();
        
        $$('.form-submit-button').each(function(button){
            var errorBox = new Element('div', {className:'form-button-error'});
            errorBox.insert('<p>' + JotForm.texts.incompleteFields + '</p>');
            $(button.parentNode.parentNode).insert(errorBox);
        });
    },
    
    /**
     * Sets all validations to forms
     */
    validator: function(){
        
        if(this.debugOptions && this.debugOptions.stopValidations){
            this.info('Validations stopped by debug parameter');
            return true;
        }
        var $this = this;
        var reg = {
            email: /[a-z0-9!#$%&'*+\/=?\^_`{|}~\-]+(?:\.[a-z0-9!#$%&'*+\/=?\^_`{|}~\-]+)*@(?:[a-z0-9](?:[a-z0-9\-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9\-]*[a-z0-9])/i,
            alphanumeric: /^[a-zA-Z0-9]+$/,
            numeric: /^(-?\d+[\.]?)+$/,
            numericDotStart: /^([\.]\d+)+$/,  //accept numbers starting with dot
            alphabetic: /^[a-zA-Z\s]+$/
        };
        
        $A(JotForm.forms).each(function(form){ // for each JotForm form on the page 
            if (form.validationSet) {
                return; /* continue; */
            }
            
            form.validationSet = true;
            form.observe('submit', function(e){ // Set on submit validation
                try {
                    if (!JotForm.validateAll(form)) {
                        JotForm.enableButtons();
                        JotForm.showButtonMessage();
                        e.stop();
                        return;
                    }
                } catch (err) {
                    JotForm.error(err);
                    e.stop();
                    return;
                }

                // We will clear the contents of hidden fields, users don't want see the hidden fields on subscriptions
                $$('.form-field-hidden input', '.form-field-hidden select', '.form-field-hidden textarea').each(function(input) {
                    if (input.tagName == 'input' && ['checkbox', 'radio'].include(input.readAttribute('type'))) {
                        input.checked = false;
                    } else {
                        input.clear();
                    }
                });

                if(JotForm.compact && JotForm.imageSaved == false){
                    e.stop();
                    window.parent.saveAsImage();
                    // JotForm.enableButtons();
                    $(document).observe('image:loaded', function(){
                        var block;
                        $(document.body).insert(block = new Element('div').setStyle('position:fixed;top:0;left:0;right:0;bottom:0;background:rgba(0,0,0,0.85);'));
                        block.insert('<table height="100%" width="100%"><tr><td align="center" valign="middle" style="font-family:Verdana;color:#fff;font-size:16px;">Please Wait...</td></tr></table>');
                        setTimeout(function(){
                            form.submit();
                        }, 1000);
                    });
                    return;
                }

                //validation for grading when the form is submitted
                var grading_inputs = form.select('.form-grading-input');
                if( grading_inputs )
                {
                  grading_inputs.each(function(item){
                    //call the validator function to validate the data
                    var validate = item.validateGradingInputs();
                    if( !validate )
                    {
                      e.stop();//stop submitting the form
                    }
                  });
                }

                //validation fo spinners when the form is submitted
                var spinner_inputs = form.select('.form-spinner-input');
                if( spinner_inputs )
                {
                  spinner_inputs.each(function(item){
                    //call the validator function to validate the data
                    var validate = item.validateSpinnerInputs();
                    if( !validate )
                    {
                      e.stop();//stop submitting the form
                    }
                  });
                }

                //validation fo numbers when the form is submitted
                var number_inputs = form.select('.form-number-input');
                if( number_inputs )
                {
                  number_inputs.each(function(item){
                    //call the validator function to validate the data
                    var validate = item.validateNumberInputs();
                    if( !validate )
                    {
                      e.stop();//stop submitting the form
                    }
                  });
                }
            });
            
            // for each validation element
            $$('#'+form.id+' *[class*="validate"]').each(function(input){
                
                var validations = input.className.replace(/.*validate\[(.*)\].*/, '$1').split(/\s*,\s*/);
                
                input.validateInput = function(deep)
                {
                    if (!JotForm.isVisible(input)) {
                        return true; // if it's hidden then user cannot fill this field then don't validate
                    }
                    
                    if(!$(input.parentNode).hasClassName('form-matrix-values')) //ntw
                        JotForm.corrected(input); // First clean the element
                    
                    var vals = validations;
                    
                    if(input.hinted === true){
                        input.clearHint();
                        setTimeout(function(){
                            input.hintClear();
                        }, 150);
                    } // Clear hint value if exists

                    //change where it deploys
                    //to first check the data  of this inputs before going to the next with a validate[*] class
                    if( input.readAttribute('data-type') === 'input-spinner' && input.value )
                    {
                        return input.validateSpinnerInputs();
                    }
                    else if( input.readAttribute('data-type') === 'input-grading' && input.value )
                    {
                        return input.validateGradingInputs();
                    }
                    else if( input.readAttribute('data-type') === 'input-number' && input.value )
                    {
                        return input.validateNumberInputs();
                    }
                    
                    //Emre confirmation email (36639)
                    if (vals.include("Email_Confirm")) {
                        console.log("if (vals.include(\"Email_Confirm\")) {");
                        var idEmail = input.id.replace(/.*_(\d+)(?:_confirm)?/gim, '$1'); //confirm email id is like "input_4_confirm"
                        if(($('input_' + idEmail).value != $('input_' + idEmail + '_confirm').value)){
                            return JotForm.errored(input, JotForm.texts.confirmEmail);
                        } else if (($('input_' + idEmail + '_confirm').value) && (!reg.email.test($('input_' + idEmail + '_confirm').value))) {
                                return JotForm.errored(input, JotForm.texts.email);
                        }
                    } else if (vals.include("required")) {
                        if (input.tagName == 'INPUT' && input.readAttribute('type') == "file") { // Upload
                            if(input.value.empty() && !input.uploadMarked){
                                return JotForm.errored(input, JotForm.texts.required);
                            }else{
                                return JotForm.corrected(input);
                            }
                        } else if (input.tagName == "INPUT" && (input.readAttribute('type') == "radio" || input.readAttribute('type') == "checkbox")) {
                            
                            if($(input.parentNode).hasClassName('form-matrix-values')){ // This is in a matrix
                                
                                var ty = input.readAttribute('type');
                                var matrixRows = {};
                                var oneChecked = false;
                                input.up('table').select('input').each(function(e){
                                    if(!(e.name in matrixRows)){matrixRows[e.name] = false;}
                                    if(matrixRows[e.name] !== true){matrixRows[e.name] = e.checked;}
                                    if(matrixRows[e.name] === true){oneChecked = true;}
                                });
                                if(vals.include("requireOneAnswer")) {
                                  if(!oneChecked) 
                                    return JotForm.errored(input, JotForm.texts.requireOne);
                                } else if( ! $H(matrixRows).values().all()){
                                    return JotForm.errored(input, JotForm.texts.requireEveryRow);
                                } else {
                                    return JotForm.corrected(input);
                                }
                            
                            }else {
                                    var baseInputName = input.name.substr(0,input.name.indexOf('['));
                                    var otherInputName = baseInputName + '[other]';
                                var checkboxArray = [];
                                    // If 'Other' input exists;
                                    if (document.getElementsByName(otherInputName)[0]) {
                                    // Assign all checkboxes including 'Other' to array
                                    checkboxArray = $A(document.getElementsByName(baseInputName + '[]')); 
                                    checkboxArray[checkboxArray.length] = document.getElementsByName(otherInputName)[0];
                                        // Validate each checkbox
                                    if ( ! checkboxArray.map(function(e){ return e.checked; }).any()) {
                                            return JotForm.errored(input, JotForm.texts.required);
                                        }
                                        }
                                else {
                                    if ( ! $A(document.getElementsByName(input.name)).map(function(e){ return e.checked; }).any()) {
                                        return JotForm.errored(input, JotForm.texts.required);
                                    }
                                    }
                                
                            }
                        } else if((input.tagName == "INPUT" || input.tagName == "SELECT") && $(input.parentNode).hasClassName('form-matrix-values')) {
                                var matrixRows = {};
                                var oneEntry = false;

                                input.up('table').select(input.tagName).each(function(e){
                                    if(!(e.name in matrixRows)){matrixRows[e.name] = false;}
                                    if(matrixRows[e.name] !== true){matrixRows[e.name] = (e.value && !e.value.strip(" ").empty());}
                                    if(matrixRows[e.name] === true){oneEntry = true;}
                                });
                                if(vals.include("requireEveryRow") && ! $H(matrixRows).values().all()) {
                                    return JotForm.errored(input, JotForm.texts.requireEveryRow);
                                } else if(vals.include("requireOneAnswer") && !oneEntry) {
                                    return JotForm.errored(input, JotForm.texts.requireOne);
                                } else {
                                    return JotForm.corrected(input);
                                }
                        } else if (input.name && input.name.include("[")) {
                            try{
                                var cont = $this.getContainer(input);
                                // Ozan, bugfix: 133419, both input and select fields should be selected
                                var checkValues = cont.select('input,select[name*=' + input.name.replace(/\[.*$/, '') + ']').map(function(e){
                                    // If this is an address field and country is not United States or Canada 
                                    // then don't require state name
                                    if(e.hasClassName('form-address-state')){
                                        var country = cont.select('.form-address-country')[0].value;
                                        if(country != 'United States' && country != 'Canada' && country != 'Please Select'){
                                            e.removeClassName('form-validation-error');
                                            e.__skipField = true;
                                            return false;
                                        }
                                    }else{
                                        if(e.__skipField){
                                            e.__skipField = false;
                                        }
                                    }
                                    
                                    if(e.className.include('validate[required]') && JotForm.isVisible(e)){
                                        if(e.value.empty() || e.value.strip() == 'Please Select'){
                                            e.addClassName('form-validation-error');
                                            return true;
                                        }
                                    }
                                    e.removeClassName('form-validation-error');
                                    return false;
                                });
                                
                                if (checkValues.any()) {
                                    return JotForm.errored(input, JotForm.texts.required);
                                }
                            }catch(e){
                                // This can throw errors on internet explorer
                                JotForm.error(e);
                                return JotForm.corrected(input);
                            }
                        } 
                        if(input.__skipField){
                            return JotForm.corrected(input);
                        }
                        if ( (!input.value || input.value.strip(" ").empty() || input.value == 'Please Select') && !(input.readAttribute('type') == "radio" || input.readAttribute('type') == "checkbox") && !$(input.parentNode).hasClassName('form-matrix-values')) {
                            return JotForm.errored(input, JotForm.texts.required);
                        }

                        vals = vals.without("required");
                        
                    } else if (input.value.empty()) {
                        // if field is not required and there is no value 
                        // then skip other validations
                        return true;
                    }
                    
                    if (!vals[0]) {
                        return true;
                    }
                    
                    switch (vals[0]) {
                        case "Email":
                            if (!reg.email.test(input.value)) {
                                return JotForm.errored(input, JotForm.texts.email);
                            }
                            break;
                        case "Alphabetic":
                            if (!reg.alphabetic.test(input.value)) {
                                return JotForm.errored(input, JotForm.texts.alphabetic);
                            }
                            break;
                        case "Numeric":
                            if (!reg.numeric.test(input.value) && !reg.numericDotStart.test(input.value)) {
                                return JotForm.errored(input, JotForm.texts.numeric);
                            }
                            break;
                        case "AlphaNumeric":
                            if (!reg.alphanumeric.test(input.value)) {
                                return JotForm.errored(input, JotForm.texts.alphanumeric);
                            }
                            break;
                        default:
                            // throw ("This validation is not valid (" + vals[0] + ")");
                    }
                    return JotForm.corrected(input);
                };
                var validatorEvent = function(e){
                    setTimeout(function(){ // to let focus event to work
                        if($this.lastFocus && ($this.lastFocus == input || $this.getContainer($this.lastFocus) != $this.getContainer(input))){
                            input.validateInput();
                        }else if(input.type == "hidden"){
                            input.validateInput(); // always run on hidden elements
                        }
                    }, 10);
                };
                
                if(input.type == 'hidden'){
                    input.observe('change', validatorEvent);
                }else{
                    input.observe('blur', validatorEvent);
                }

                if(input.up('.form-spinner')) {
                    var spinnerEvent = function() {input.validateInput();};
                    input.up('.form-spinner').down('.form-spinner-up').observe('click', spinnerEvent);
                    input.up('.form-spinner').down('.form-spinner-down').observe('click', spinnerEvent);                  
                }

            });
            
            $$('.form-upload').each(function(upload){
               
                try {

                    var required = !!upload.validateInput;
                    var exVal = upload.validateInput || Prototype.K;
                    
                    upload.validateInput = function(){

                        //clean any errors first if any
                        upload.errored = false;

                        if (exVal() !== false) { // Make sure other validation completed
                            
                            if(!upload.files){ return true; } // If files are not provied then don't do checks
                            
                            var acceptString = upload.readAttribute('accept') || upload.readAttribute('file-accept') || "";
                            var maxsizeString = upload.readAttribute('maxsize') || upload.readAttribute('file-maxsize') || "";
                            
                            var accept = acceptString.strip().split(/\s*\,\s*/gim);
                            var maxsize = parseInt(maxsizeString, 10) * 1024;
                            
                            var file = upload.files[0];
                            if (!file) {
                                return true;
                            } // No file was selected
                            
                            //Emre: to prevent extension of file problem in firefox7 (47183)
                            if(!file.fileName){ file.fileName = file.name; }
                
                            var ext = "";
                            if( JotForm.getFileExtension(file.fileName) ){
                                ext = JotForm.getFileExtension(file.fileName);
                            }
                            
                            if ( acceptString != "*" && !accept.include(ext) && !accept.include(ext.toLowerCase())) {
                                return JotForm.errored(upload, JotForm.texts.uploadExtensions + '<br/>' + acceptString);
                            }

                            //check if validation if real image is set to yes
                            //if so check again if the meta data is correct and only if the extension is correct
                            var validateImage = upload.readAttribute('data-imagevalidate') || false;
                            var validatedImageExt = "jpeg, jpg, png, gif, bmp";
                            if(
                              ( accept.include(ext) || accept.include(ext.toLowerCase()) ) && //for the accepted eextensions
                              validateImage && ( validateImage === 'yes' || validateImage === 'true' ) &&
                              ( validatedImageExt.include(ext) || validatedImageExt.include(ext.toLowerCase()) ) && //for the accepted valid images
                              typeof window.FileReader != undefined //only for modern browsers that supports it
                            )
                            {
                              //initiate the FileReader
                              var binary_reader = new FileReader();
                              binary_reader.onloadend = function(e) {
                                  var args = {
                                    filename: file.name,
                                    size: file.size,
                                    binary: e.target.result
                                  };
                                  ImageInfo.loadInfo(args, function(){
                                    var info = ImageInfo.getAllFields(file.name);
                                    if( info.format === 'UNKNOWN' )
                                    {
                                      return JotForm.errored(upload, "You have uploaded an invalid image file type.");
                                    }
                                  });
                              }

                              binary_reader.readAsBinaryString(file);
                            }

                            //Emre: to prevent file.fileSize being undefined in Firefox 7 (48526)
                            //Emre: to prevent file upload not to work in Firefox 3.
                            if(!file.fileSize){ file.fileSize = file.size; }

                            if (file.fileSize > maxsize) {
                                return JotForm.errored(upload, JotForm.texts.uploadFilesize + ' ' + maxsizeString + 'Kb');
                            }
                            
                            return JotForm.corrected(upload);
                        }
                    };
                    
                    if (!required) {
                        upload.addClassName('validate[upload]');
                        upload.observe('blur', upload.validateInput);
                        }
                } catch (e) {

                    JotForm.error(e);

                }

            }); 
        });
    },
    /**
     * Initiate facebook login operations
     * Check if user is already loggedin
     * watch login events to automatically populate fields
     * disable submits until login is completed
     */
    FBInit: function(){
        // Disable the Submit's here, form will not submit until integration is completed
        JotForm.FBNoSubmit = true;
        // Check if user is logged-in or not
        FB.getLoginStatus(function(response) {
            //Emre: facebook changed "response" properties (57298)
            if (response.authResponse) { // user is already logged in
                JotForm.FBCollectInformation(response.authResponse.userID);
            } else {    // user is not logged in. "JotForm.FBCollectInformation" is binded to facebook login event.
                FB.Event.subscribe('auth.login', function(response) {
                    JotForm.FBCollectInformation(response.authResponse.userID);
                });
            }
        });
    },
    /**
     * Request the logged-in users information from Facebook and populate hidden fields
     * Enable submit buttons and remove description
     */
    FBCollectInformation: function(id){
        JotForm.FBNoSubmit = false; // Enable submit buttons
        
        // Seek through all hidden FB inputs on the form to collect Requested
        // User information fields. Merge all field data with fields ID so we can put the
        // Associated data into correct input.
        // f is for form field id in DOM, d is for facebook db column name.
        var fls = $$('.form-helper').collect(function(el){ 
            var f = "";
            var d = el.readAttribute('data-info').replace("user_", ""); // Remove user_ prefix because it's not in the
            // Some permission names are different than FB users table
            // So we have to fix them
            switch(d){
                case "location":
                    f = "current_location";
                break;
                case "can_be_anyvalue": // for demoing
                    f = "place correct one here";
                break;
                default:
                    f = d;
            }
            return [f, el.id];
        });
        // Convert fls array to key value pair for easier and faster matching
        var fields = {};
        $A(fls).each(function(p){ fields[p[0]] = p[1]; });
        
        try{
            var columns = $H(fields).keys().join(", ");
            var query = FB.Data.query('SELECT '+columns+' FROM user WHERE uid={0}', id);
            
            query.wait(function(rows) {
                var inp;
                // 0th row has the query result we'll loop through results
                // and place existing fields into correct inputs
                $H(rows[0]).each(function(pair){
                    if( ( inp = $(fields[pair.key]) ) ){
                        // Some values must be converted to string before putting into fields
                        switch(pair.key){
                            case "current_location":
                                inp.value = pair.value.name;
                            break;
                            case "website":
                                inp.value = pair.value.split(/\s+/).join(", ");
                            break;
                            default:
                                inp.value = pair.value;
                        }
                    }
                });
                
                JotForm.bringOldFBSubmissionBack(id);
                
                var hidden = new Element('input', {type:'hidden', name:'fb_user_id'}).setValue(id);
                var form = JotForm.getForm(inp);
                form.insert({top:hidden});
            });
        }catch(e){
            console.error(e);
        }
        
        // Hide label description and display Submit buttons
        // Because user has completed the FB login operation and we have collected the info
        $$('.fb-login-buttons').invoke('show');
        $$('.fb-login-label').invoke('hide');
    },
    
    bringOldFBSubmissionBack: function(id){
        
        var formIDField = $$('input[name="formID"]')[0];
        
        var a = new Ajax.Jsonp(JotForm.url+'server.php', {
            parameters: {
                action: 'bringOldFBSubmissionBack',
                formID: formIDField.value,
                fbid: id
            },
            evalJSON: 'force',
            onComplete: function(t){
                var res = t.responseJSON;
                if (res.success) {
                    JotForm.editMode(res, true, ['control_helper', 'control_fileupload']); // Don't reset fields
                }
            }
        });
    },

    getQuerystring: function(key, default_){
      if (default_==null) default_=""; 
      key = key.replace(/[\[]/,"\\\[").replace(/[\]]/,"\\\]");
      var regex = new RegExp("[\\?&]"+key+"=([^&#]*)");
      var qs = regex.exec(window.location.href);
      if(qs == null)
        return default_;
      else
        return qs[1];
    },

    /**
     * This function is responsible on hiding of fields upon submission
     * only if set.
     */
    hideSubmissionEmptyFields: function( formID )
    {
      var _form = '#' + formID;
      var form = $$(_form)[0];

      form.observe('submit', function(e){

        //get all elements in the form, e.g. the input fields  
        var li_elements = $$('li.form-line');

        li_elements.each(function(li){
          var elem = li.select('input, select, textarea') || false;
          //if the input element is empty, dont include it on submission
          //for a work around, remove the name attribute
          if( elem )
          {
            elem.each(function(input){
              if( input && ( input.value == "" || input.value.length < 1 ) )
              {
                input.removeAttribute('name');
              }
            });
          }
        });

      });
    },

    setCustomHint: function( elem, value )
    {
      var element = $(elem) || null,
          new_value = value.replace(/<br>/gim, "\n") || "";//replace any br to \n

      //add a class to the control to denote that is using a custom hint
      //as well as write the custom hint into the data-hint attrib
      element.addClassName('custom-hint-group').writeAttribute('data-customhint', value).writeAttribute('customhinted', "true");

      //set that the control has no content
      //check if it has a content, especially default data
      element.hasContent = ( element.value && element.value.replace(/\n/gim, "<br>") != value ) ? true : false;

      //function to show the custom placeholder
      element.showCustomPlaceHolder = function()
      {
        if( !this.hasContent )
        {
          this.value = new_value;
          //exclude spellcheck onto the control
          this.writeAttribute("spellcheck", "false").addClassName('form-custom-hint');
        }
      };

      //function to hide the custom placeholder
      element.hideCustomPlaceHolder = function()
      {
        if( !this.hasContent )
        {
          this.value = "";
          //exclude spellcheck onto the control
          this.removeClassName('form-custom-hint').removeAttribute('spellcheck');
        }
      };

      //add events to the control
      element.observe('focus',function(e){
          this.hideCustomPlaceHolder();
      }).observe('blur', function(e){
          this.showCustomPlaceHolder();
      }).observe('keyup', function(e){
          //this will determine if the control has a value
          this.hasContent = ( this.value.length > 0 ) ? true : false;
      });

      //catch the submission of a form, and remove all custom placeholder
      //since we are using the said trick, this needs to be done
      element.up('form.jotform-form').observe('submit',function(){
        this.select('.custom-hint-group').each(function(elem){
          elem.hideCustomPlaceHolder();
        });
      });

      //initiate the custom placeholders
      element.showCustomPlaceHolder();

    },

    /**
     * Responsible on handling AutoFill feature,
     * this will also help to ensure that it will not conflict
     * on customHint trick if any
     */
    autoFillInitialize: function( params )
    {
      //initialize autoFill plugin for jquery
      var formID = $$('input[name="formID"]')[0].value;
      params.name = 'form_' + formID;
      var _form = 'form#' + formID;
      var form   = $$(_form)[0];

      //write an attribute to the form denoting that it uses a autoFill
      form.writeAttribute('data-autofill', 'true');

      /**
       * Will handle conflicts of the autoFill
       * especially custom hints, grading total computation
       */
      var _conflicts = {
        _handleCustomHint: function( data )
        {
          //get the data that was generated in the autoFill plugin
          var pfields = data.protectedfields;
          var pfieldsdata = data.protectedfieldsdata;
          var inc = 0;

          //loop through the stored data
          $H( pfieldsdata ).each(function(_fielddata){

            var _field = pfields[inc];
            var field = $(_field);
            var fieldata = _fielddata[1];

            //get the value on where the data is restored
            var value = ( fieldata.newinputvalue ) ? fieldata.newinputvalue.replace(/\n/gim, "<br>") : false;

            if( field.hasAttribute('data-customhint') || field.hasAttribute('customhinted') )
            {
              //get the value of the element
              var hint = field.readAttribute('data-customhint');

              // alert('customhinted:' + hint " | " + value);
              if( hint && value && hint != value ) {
                field.removeClassName('form-custom-hint');
                field.hasContent = true;
              }
            }
            else if( field.hasAttribute('hinted') || field.hinted ) //this is for IE relateds
            {
              //get the old input value and compare it to the newvalue of the input
              //if not match turn the color of the hint to black
              //seems to be a bug when using the .hint() function in IE
              var hint = ( fieldata.oldinputvalue ) ? fieldata.oldinputvalue.replace(/\n/gim, "<br>") : false;

              // alert('hinted:' + hint " | " + value);
              if( hint && value && hint != value ) {
                field.setStyle({color: "#000"});
              }
            }

            inc++;
          });
        },
        /**
        * Will handle the total of grading inputs if set
        */
        _handleGradingTotal: function( data )
        {
          if( $$('.form-grading-input').length > 0 && $("grade_total_" + id))
          {
            var total = 0, id = null;
            $$('.form-grading-input').each(function(input){
              id = input.id.replace(/input_(\d+)_\d+/, "$1"),
              total += parseFloat(input.value) || 0;
            });

            $("grade_point_" + id).innerHTML = total;
          }
        }
      };

      //initiate jquery autoFill
      jQuery( _form ).autoFill({
        timeout: params.timeout,
        customKeyPrefix: params.customprefix,
        onBeforeSave: function() {},
        onSave: function() {},
        onRelease: function() {},
        onBeforeRestore: function() {},
        onRestore: function(data)
        {
          //check for custom hints
          var restoredDatas = this.restoredData[0];
          // console.log( restoredDatas );
          if( restoredDatas )
          {
            //resolve conflicts in customHint if any
            _conflicts._handleCustomHint( restoredDatas );

            //resolve grading total computation if any
            _conflicts._handleGradingTotal( restoredDatas );
          }
        }
      });

      this.autoFillDeployed = true;
    },

    /**
     * Will handle the Phone Validation
     * this depends on the users masking format
     */
    setPhoneMaskingValidator: function( elem, maskValue, unmask )
    {
      var element = "#" + elem ;
      var unmask = ( unmask ) ? unmask : false;

      //extend the definitions to accept other characters
      jQuery.mask.definitions['#']='[0-9]';
      // jQuery.mask.definitions['A']='[A-Za-z]';
      // jQuery.mask.definitions['*']='[A-Za-z0-9]';
      
      //extend the placeholder on what to use
      jQuery.mask.placeholder = '_';

      //extend the data name of the phonemask
      jQuery.mask.dataName = 'jotFormPhoneMsk';

      //initiate masking for phones.
      if( unmask )
      {
        jQuery( element ).unmask();
      }
      else
      {
        jQuery( element ).mask( maskValue );
      }
    }
};

// We have to put this event because it's the only way to catch FB load
window.fbAsyncInit = JotForm.FBInit.bind(JotForm);
