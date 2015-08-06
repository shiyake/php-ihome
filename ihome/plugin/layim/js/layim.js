/*

 @Name: layui WebIM 1.0.0
 @Author：贤心
 @Date: 2014-04-25
 @Blog: http://sentsin.com
 
 */
 
;!function(win, undefined){

var debug = function(msg) {
    console.debug(msg);
};

var webim = {
    conn: null,
    apiURL: null,
    user: null,
    nickname: null,
    appkey: (function() {
        if (location.host == 'i.buaa.edu.cn') {
            return 'ihome#ihome';
        }
        return 'ihome#ihometest';
    })(),
    hooked: false,
    hasFocus: false,
    ensureOnline: function() {
        if (!this.hasFocus)
            return;
        this.login();
    },
    hook: function() {
        if (this.hooked)
            return;
        jQuery(window).on('focus', function() {
            this.hasFocus = true;
            this.login();
        }.bind(this));
        jQuery(window).on('blur', function() {
            this.hasFocus = false;
        }.bind(this));
        setInterval(function() {
            this.ensureOnline();
        }.bind(this), 5000);
        this.hooked = true;
    },
    init: function() {
        this.initConnection();
        this.login();
    },
    handleOpen: function() {
        this.user = config.user.id;
        this.nickname = config.user.name;
        debug('login successfully');
        this.hook();
        if (!config.groups.length) {
            this.conn.listRooms({
                success: function(rooms) {
                    if (rooms && rooms.length > 0) {
                        for (var i = rooms.length - 1, room = null; i >= 0; i--) {
                            room = rooms[i];
                            config.groups.push(room.roomId);
                            config.groupInfo[room.roomId] = room.name;
                        };
                    }
                    xxim.view();
                },
                error: function(e) {
                    xxim.view();
                }
            });
        } else {
            xxim.view();
        }
    },
    handleClosed: function() {
        this.user = null;
        this.nickname = null;
        debug('closed');

        jQuery('#xximmm').hide();
        jQuery('.xubox_layer').hide();
    },
    handleError: function(e) {
        var msg = e.msg;
        if (e.type == EASEMOB_IM_CONNCTION_SERVER_CLOSE_ERROR) {
            if (msg == "" || msg == 'unknown') {
                debug("服务器器断开连接,可能是因为在别处登录");
            } else {
                debug("服务器器断开连接");
            }
        } else {
            debug(msg);
        }
    },
    update: function(message) {
        try {
            xxim.update(message);
        } catch (e) {}
    },
    initConnection: function() {
        var _this = this;
        this.conn = new Easemob.im.Connection();
        this.conn.init({
            https: false,
            onOpened : function() {
                _this.conn.setPresence();
                _this.handleOpen();
            },
            onClosed : function() {
                _this.conn.clear();
                _this.handleClosed();
            },
            onTextMessage : function(message) {
                _this.update(message);
            },
            //收到表情消息时的回调方法
            onEmotionMessage : function(message) {
                _this.update(message);
            },
            //收到图片消息时的回调方法
            onPictureMessage : function(message) {
                _this.update(message);
            },
            //收到音频消息的回调方法
            onAudioMessage : function(message) {
                _this.update(message);
            },
            //收到位置消息的回调方法
            onLocationMessage : function(message) {
                _this.update(message);
            },
            //收到文件消息的回调方法
            onFileMessage : function(message) {
                _this.update(message);
            },
            //收到视频消息的回调方法
            onVideoMessage : function(message) {
                _this.update(message);
            },
            //收到联系人订阅请求的回调方法
            // onPresence : function(message) {
            //     handlePresence(message);
            // },
            //收到联系人信息的回调方法
            // onRoster : function(message) {
            //     handleRoster(message);
            // },
            //收到群组邀请时的回调方法
            // onInviteMessage : function(message) {
            //     handleInviteMessage(message);
            // },
            onError : function(message) {
                _this.handleError(message);
            }
        });
    },
    login: function() {
        if (this.conn.context.userId) {
            return;
        }
        var resource = Math.random();
        var options = {
            apiUrl : this.apiURL,
            user : config.user.id.toString(),
            appKey : this.appkey,
            accessToken : config.user.token,
            resource: resource,
        };
        this.conn.open(options);
    },
    sendText: function(to, msg, type) {
        var options = {
            to : to,
            msg : msg,
            type : type
        };
        this.conn.sendTextMessage(options);
    }
};

var config = {
    msgurl: 'space.php?do=pm',
    face: 'http://i.buaa.edu.cn/ihome/images/avatar/m_big_1.png',
    groupface: '/plugin/layim/img/group.png',
    aniTime: 200,
    height: 535,
    api: {
        friend: 'api/im/friend.php', //好友列表接口
        info: 'api/im/info.php',
        group: 'plugin/layim/group.json', //群组列表接口
        groups: 'plugin/layim/groups.json', //群组成员接口
        update: 'api/im/update.php',
        leave: 'api/im/leave.php'
    },
    user: ({ //当前用户信息
        id: 0,
        name: '僕',
        face: 'http://i.buaa.edu.cn/ihome/images/avatar/m_big_1.png',
        token: null,
        init: function(){
            var _this = this;
            jQuery.get('api/im/aloha.php', function(data){
                if (data.status) {
                    _this.id = data.id;
                    _this.name=data.name;
                    _this.face=data.face;
                    _this.token=data.token;
                    webim.init();
                }
            }, 'json');
            return _this;
        }
    }).init(),
    friends: [],
    friendInfo: {},
    onenight: [],
    onenightInfo: {},
    groups: [],
    groupInfo: {},
    //自动回复内置文案，也可动态读取数据库配置
    autoReplay: [
        'aloha'
    ],
    audio: [
        'api/im/sound/msg.wav',
        'api/im/sound/nyaa.wav',
        'api/im/sound/kuma.wav',
        'api/im/sound/feuer.wav'
    ],
    updates: 0,
    sendType: 'enter',
    
    chating: {},
    hosts: (function(){
        var dk = location.href.match(/\:\d+/);
        dk = dk ? dk[0] : '';
        return 'http://' + document.domain + dk + '/';
    })(),
    json: function(url, data, callback, error){
        return jQuery.ajax({
            type: 'POST',
            url: url,
            data: data,
            dataType: 'json',
            success: callback,
            error: error
        });
    },
    stopMP: function(e){
        e ? e.stopPropagation() : e.cancelBubble = true;
    }
}, dom = [jQuery(window), jQuery(document), jQuery('html'), jQuery('body')], xxim = {};

//主界面tab
xxim.tabs = function(index){
    var node = xxim.node;
    node.tabs.eq(index).addClass('xxim_tabnow').siblings().removeClass('xxim_tabnow');
    node.list.eq(index).show().siblings('.xxim_list').hide();
    if(node.list.eq(index).find('li').length === 0){
        xxim.getData(index);
    }
};

//节点
xxim.renode = function(){
    var node = xxim.node = {
        tabs: jQuery('#xxim_tabs>span'),
        list: jQuery('.xxim_list'),
        online: jQuery('.xxim_online'),
        setonline: jQuery('.xxim_setonline'),
        onlinetex: jQuery('#xxim_onlinetex'),
        xximon: jQuery('#xxim_on'),
        layimTop: jQuery('#xxim_top'),
        layimFooter: jQuery('#xxim_bottom'),
        xximHide: jQuery('#xxim_hide'),
        xximSearch: jQuery('#xxim_searchkey'),
        searchMian: jQuery('#xxim_searchmain'),
        closeSearch: jQuery('#xxim_closesearch'),
        layimMin: jQuery('#layim_min')
    }; 
};

//主界面缩放
xxim.expend = function(){
    var node = xxim.node;
    if(xxim.layimNode.attr('state') !== '1'){
        node.layimTop.stop().animate({height: 0}, config.aniTime, function(){
            node.xximon.addClass('xxim_off');
            try{
                sessionStorage.layimState = 1;
            }catch(e){}
            xxim.layimNode.attr({state: 1});
            node.layimFooter.addClass('xxim_expend');
            node.xximHide.addClass('xxim_show');
        });
    } else {
        node.layimTop.show().stop().animate({height: config.height}, config.aniTime, function(){
            node.xximon.removeClass('xxim_off');
            try{
                sessionStorage.layimState = 2;
            }catch(e){}
            xxim.layimNode.removeAttr('state');
            node.layimFooter.removeClass('xxim_expend');
            node.xximHide.removeClass('xxim_show');
        });
    }
};

//初始化窗口格局
xxim.layinit = function(){
    var node = xxim.node;
    
    //主界面
    try{
        // if(!sessionStorage.layimState){
            sessionStorage.layimState = 1;
        // }
        if(sessionStorage.layimState === '1'){
            xxim.layimNode.attr({state: 1});
            node.layimTop.css({height: 0}).hide();
            node.xximon.addClass('xxim_off');
            node.layimFooter.addClass('xxim_expend');
            node.xximHide.addClass('xxim_show');
        }
    }catch(e){
        //layer.msg(e.message, 5, -1);
    }
};

//聊天窗口
xxim.popchat = function(param, status){
    var node = xxim.node, log = {};
    
    log.success = function(layero){
        layer.setMove();
     
        xxim.chatbox = layero.find('#layim_chatbox');
        log.chatlist = xxim.chatbox.find('.layim_chatmore>ul');
        
        log.chatlist.html('<li data-id="'+ param.id +'" type="'+ param.type +'"  id="layim_user'+ param.type + param.id +'"><span>'+ param.name +'</span><em>×</em></li>');
        xxim.tabchat(param, xxim.chatbox);
        
        //最小化聊天窗
        xxim.chatbox.find('.layer_setmin').on('click', function(){
            var indexs = layero.attr('times');
            layero.hide();
            node.layimMin.text(xxim.nowchat.name).show();
        });
        
        //关闭窗口
        xxim.chatbox.find('.layim_close').on('click', function(){
            var indexs = layero.attr('times');
            layer.close(indexs);
            xxim.chatbox = null;
            config.chating = {};
            config.chatings = 0;
        });
        
        //关闭某个聊天
        log.chatlist.on('mouseenter', 'li', function(){
            jQuery(this).find('em').show();
        }).on('mouseleave', 'li', function(){
            jQuery(this).find('em').hide();
        });
        log.chatlist.on('click', 'li em', function(e){
            var parents = jQuery(this).parent(), dataType = parents.attr('type');
            var dataId = parents.attr('data-id'), index = parents.index();
            var chatlist = log.chatlist.find('li'), indexs;
            
            config.stopMP(e);
            
            delete config.chating[dataType + dataId];
            config.chatings--;
            
            parents.remove();
            jQuery('#layim_area'+ dataType + dataId).remove();
            if(dataType === 'group'){
                jQuery('#layim_group'+ dataType + dataId).remove();
            }
            
            if(parents.hasClass('layim_chatnow')){
                if(index === config.chatings){
                    indexs = index - 1;
                } else {
                    indexs = index + 1;
                }
                xxim.tabchat(config.chating[chatlist.eq(indexs).attr('type') + chatlist.eq(indexs).attr('data-id')]);
            }
            
            if(log.chatlist.find('li').length === 1){
                log.chatlist.parent().hide();
            }
        });
        
        //聊天选项卡
        log.chatlist.on('click', 'li', function(){
            var othis = jQuery(this), dataType = othis.attr('type'), dataId = othis.attr('data-id');
            othis.removeClass('layim_blink');
            xxim.tabchat(config.chating[dataType + dataId]);
        });
        
        //发送热键切换
        log.sendType = jQuery('#layim_sendtype'), log.sendTypes = log.sendType.find('span');
        jQuery('#layim_enter').on('click', function(e){
            config.stopMP(e);
            log.sendType.show();
        });
        log.sendTypes.on('click', function(){
            log.sendTypes.find('i').text('');
            jQuery(this).find('i').text('√');
            config.sendType = jQuery(this).attr('class');
        });
        
        xxim.transmit();
    };
    
    log.html = '<div class="layim_chatbox" id="layim_chatbox">'
            +'<h6>'
            +'<span class="layim_move"></span>'
            +'    <a href="'+ param.url +'" class="layim_face" target="_blank"><img src="'+ param.face +'" ></a>'
            +'    <a href="'+ param.url +'" class="layim_names" target="_blank">'+ param.name +'</a>'
            +'    <span class="layim_rightbtn">'
            +'        <i class="layer_setmin"></i>'
            +'        <i class="layim_close"></i>'
            +'    </span>'
            +'</h6>'
            +'<div class="layim_chatmore" id="layim_chatmore">'
            +'    <ul class="layim_chatlist"></ul>'
            +'</div>'
            +'<div class="layim_groups" id="layim_groups"></div>'
            +'<div class="layim_chat">'
            +'    <div class="layim_chatarea" id="layim_chatarea">'
            +'        <ul class="layim_chatview layim_chatthis"  id="layim_area'+ param.type + param.id +'"></ul>'
            +'    </div>'
            +'    <div class="layim_tool">'
            +'        <i class="layim_addface" title="发送表情"></i>'
            +'        <ul id="emotionUL" data-target="layim_write" data-loaded="0"></ul>'
            +'        <a href="javascript:;"><i class="layim_addimage" title="上传图片"></i></a>'
            +'        <a href="javascript:;"><i class="layim_addfile" title="上传附件"></i></a>'
            +'    </div>'
            +'    <textarea class="layim_write" id="layim_write"></textarea>'
            +'    <div class="layim_send">'
            +'        <div class="layim_sendbtn" id="layim_sendbtn">发送<span class="layim_enter" id="layim_enter"><em class="layim_zero"></em></span></div>'
            +'        <div class="layim_sendtype" id="layim_sendtype">'
            +'            <span class="enter"><i>√</i>按Enter键发送</span>'
            +'            <span class="ctrlEnter"><i></i>按Ctrl+Enter键发送</span>'
            +'        </div>'
            +'    </div>'
            +'</div>'
            +'</div>';

    if(config.chatings < 1){
        jQuery.layer({
            type: 1,
            border: [0],
            title: false,
            shade: [0],
            area: ['620px', '493px'],
            move: '.layim_chatbox .layim_move',
            moveType: 1,
            closeBtn: false,
            offset: [((jQuery(window).height() - 493)/2)+'px', ''],
            page: {
                html: log.html
            }, success: function(layero){
                log.success(layero);
            }
        });
        if (status == 'hide') {
            xxim.chatbox.parents('.xubox_layer').hide();
        }
    } else {
        log.chatmore = xxim.chatbox.find('#layim_chatmore');
        log.chatarea = xxim.chatbox.find('#layim_chatarea');
        
        log.chatmore.show();

        if (status != 'hide') {
            log.chatmore.find('ul>li').removeClass('layim_chatnow');
            log.chatmore.find('ul').append('<li data-id="'+ param.id +'" type="'+ param.type +'" id="layim_user'+ param.type + param.id +'" class="layim_chatnow"><span>'+ param.name +'</span><em>×</em></li>');
            
            log.chatarea.find('.layim_chatview').removeClass('layim_chatthis');
            log.chatarea.append('<ul class="layim_chatview layim_chatthis" id="layim_area'+ param.type + param.id +'"></ul>');

            xxim.tabchat(param);
        } else {
            log.chatmore.find('ul').append('<li data-id="'+ param.id +'" type="'+ param.type +'" id="layim_user'+ param.type + param.id +'"><span>'+ param.name +'</span><em>×</em></li>');

            log.chatarea.append('<ul class="layim_chatview" id="layim_area'+ param.type + param.id +'"></ul>');
        }
    }
    
    // config.json(config.api.history, {id: param.id}, function(ret){
    //     if (ret && ret.status == 1) {
    //         log.imarea = xxim.chatbox.find('#layim_area'+ param.type + param.id);
    //         var oldMessage = ret.data.length;
    //         var newMessage = log.imarea.children().size();
    //         if (oldMessage > newMessage) {
    //             log.imarea.prepend('<li><div class="layim_chatsay layim_chattip">以上是历史消息</div></li>');
    //         }
    //         for (var i = newMessage; i < ret.data.length; i++) {
    //             var datum = ret.data[i];
    //             if (datum.id == param.id) {
    //                 log.imarea.prepend(xxim.html({
    //                     time: xxim.fancyDate(datum.time, 'long'),
    //                     name: param.name,
    //                     face: param.face,
    //                     content: datum.message
    //                 }, ''));
    //             } else {
    //                 log.imarea.prepend(xxim.html({
    //                     time: xxim.fancyDate(datum.time, 'long'),
    //                     name: config.user.name,
    //                     face: config.user.face,
    //                     content: datum.message
    //                 }, 'me'));
    //             }
                
    //         }
    //         log.imarea.scrollTop(log.imarea[0].scrollHeight);
    //     }
    // });

    //群组
    log.chatgroup = xxim.chatbox.find('#layim_groups');
    if(param.type === 'group'){
        log.chatgroup.find('ul').removeClass('layim_groupthis');
        log.chatgroup.append('<ul class="layim_groupthis" id="layim_group'+ param.type + param.id +'"></ul>');
        xxim.getGroups(param);
    }
    //点击群员切换聊天窗
    log.chatgroup.on('click', 'ul>li', function(){
        xxim.popchatbox(jQuery(this));
    });
};

//定位到某个聊天队列
xxim.tabchat = function(param){
    var node = xxim.node, log = {}, keys = param.type + param.id;
    xxim.nowchat = param;
    
    xxim.chatbox.find('#layim_user'+ keys).addClass('layim_chatnow').siblings().removeClass('layim_chatnow');
    xxim.chatbox.find('#layim_area'+ keys).addClass('layim_chatthis').siblings().removeClass('layim_chatthis');
    xxim.chatbox.find('#layim_group'+ keys).addClass('layim_groupthis').siblings().removeClass('layim_groupthis');
    
    xxim.chatbox.find('.layim_face>img').attr('src', param.face);
    xxim.chatbox.find('.layim_face, .layim_names').attr('href', param.href);
    xxim.chatbox.find('.layim_names').text(param.name);

    var chatthis = xxim.chatbox.find('.layim_chatthis');
    chatthis.scrollTop(chatthis[0].scrollHeight);
   
    log.groups = xxim.chatbox.find('.layim_groups');
    if(param.type === 'group'){
        log.groups.show();
    } else {
        log.groups.hide();
    }
    
    jQuery('#layim_write').focus();
    
};

//弹出聊天窗
xxim.popchatbox = function(othis){
    var node = xxim.node, dataId = othis.attr('data-id'), param = {
        id: dataId, //用户ID
        type: othis.attr('type'),
        name: othis.find('.xxim_onename').text(),  //用户名
        face: othis.find('.xxim_oneface').attr('src'),  //用户头像
        href: config.hosts + 'space.php?uid=' + dataId //用户主页
    }, key = param.type + dataId;
    if (param.type == 'group')
        param.href = 'javascript:void(0)';
    if(!config.chating[key]){
        xxim.popchat(param);
        config.chatings++;
    } else {
        xxim.tabchat(param);
    }
    config.chating[key] = param;
    
    var chatbox = jQuery('#layim_chatbox');
    if(chatbox[0]){
        node.layimMin.removeClass('layim_blink').hide();
        chatbox.parents('.xubox_layer').show();
    }

    jQuery(".layim_chatthis").on('scroll touchmove mousewheel', function(e){
        var delta = e.originalEvent.wheelDelta;
        if ((delta < 0 && this.clientHeight + this.scrollTop == this.scrollHeight) ||
            (delta > 0 && this.scrollTop == 0)) {
            e.stopPropagation();
            e.preventDefault();
            return false;
        }

        return true;
    });
};

//请求群员
xxim.getGroups = function(param){
    var keys = param.type + param.id, str = '',
    groups = xxim.chatbox.find('#layim_groups'),
    groupss = xxim.chatbox.find('#layim_group'+ keys);
    groups.addClass('loading');
    var callback = function(members) {
        if (members) {
            var lens = members.length;
            var ids = [];
            for (var i = 0; i < lens; i++) {
                var id = new RegExp(webim.appkey + '_(\\d+)@.*').exec(members[i].jid || '');
                id = id && id[1];
                if (id) {
                    ids.push({id: id});
                }
            }
            var datum = xxim.getInfo(ids, function(data) {
                var datum = null;
                for (var i = data.length - 1; i >= 0; i--) {
                    datum = data[i];
                    str += '<li data-id="'+ datum.id +'" type="one"><img src="'+ datum.face +'" class="xxim_oneface"><span class="xxim_onename">'+ datum.name +'</span></li>';
                };
                groups.removeClass('loading');
                groupss.html(str);
            });
        } else {
            str = '<li class="layim_errors">请求异常</li>';
            groups.removeClass('loading');
            groupss.html(str);
        }
    }

    var parallel = function(callback) {
        var limit = arguments.length - 1, ceil=limit;
        var counter = 0;
        var result = [];
        var _callback = function(res) {
            result = result.concat(res || []);
            if (++counter == ceil)
                callback(result);
        };
        while (limit != 0) {
            arguments[limit--](_callback);
        }
    }

    parallel(callback, function(callback) {
        webim.conn.queryRoomMember({
            roomId : param.id,
            success: function(occs) {
                callback(occs);
            },
            error: function(e) {
                callback([]);
            }
        });
    }, function(callback) {
        webim.conn.queryRoomInfo({
            roomId : param.id,
            success : function(occs) {
                callback(occs);
            },
            error: function(e) {
                callback([]);
            }
        });
    });
};

xxim.fancyDate = function(time, type) {
    var date;
    if (time) {
        time = parseInt(time);
        date = new Date(time);
    } else {
        date = new Date();
    }
    date.setHours(date.getHours() - date.getTimezoneOffset() / 60);

    if (type != 'long') {
        return date.toJSON().replace(/.*T/,'').replace(/:[^:]*Z/,'');
    }
    return date.toJSON().replace(/T/,' ').replace(/:[^:]*Z/,'');
};

xxim.html = function(param, type){
    var content = xxim.transform(param.content);
    return '<li class="'+ (type === 'me' ? 'layim_chateme' : '') +'">'
        +'<div class="layim_chatuser">'
            + function(){
                if(type === 'me'){
                    return '<span class="layim_chattime">'+ param.time +'</span>'
                           +'<span class="layim_chatname">'+ param.name +'</span>'
                           +'<img src="'+ param.face +'" >';
                } else {
                    return '<img src="'+ param.face +'" >'
                           +'<span class="layim_chatname">'+ param.name +'</span>'
                           +'<span class="layim_chattime">'+ param.time +'</span>';      
                }
            }()
        +'</div>'
        +'<div class="layim_chatsay">'+ content +'<em class="layim_zero"></em></div>'
    +'</li>';
};

xxim.transform = function(message){
    var localMsg = null;
    if (typeof message == 'string') {
        localMsg = Easemob.im.Helper.parseTextMessage(message);
        localMsg = localMsg.body;
    } else if (typeof message.data == 'string') {
        localMsg = Easemob.im.Helper.parseTextMessage(message.data);
        localMsg = localMsg.body;
    } else {
        localMsg = message.data;
    }
    var messageContent = localMsg;
    var lineDiv = document.createElement("div");
    for (var i = 0; i < messageContent.length; i++) {
        var msg = messageContent[i];
        var type = msg.type;
        var data = msg.data;
        if (type == "emotion") {
            var eletext = "<p3><img src='" + data + "' class='face'/></p3>";
            var ele = jQuery(eletext);
            for (var j = 0; j < ele.length; j++) {
                lineDiv.appendChild(ele[j]);
            }
        } else if (type == "pic" || type == 'audio' || type == 'video') {
            var filename = msg.filename;
            var fileele = jQuery("<p3>" + filename + "</p3><br>");
            for (var j = 0; j < fileele.length; j++) {
                lineDiv.appendChild(fileele[j]);
            }
            lineDiv.appendChild(data);
        } else {
            var eletext = "<p3>" + data.replace(/\</g, "&lt;").replace(/\>/g, "&gt;") + "</p3>";
            var ele = jQuery(eletext);
            for (var j = 0; j < ele.length; j++) {
                lineDiv.appendChild(ele[j]);
            }
        }
    }
    return lineDiv.innerHTML;
};

//消息传输
xxim.transmit = function(){
    var node = xxim.node, log = {};
    node.sendbtn = jQuery('#layim_sendbtn');
    node.imwrite = jQuery('#layim_write');
    
    //发送
    log.send = function(){
        var data = {
            type: xxim.nowchat.type,
            id: xxim.nowchat.id,
            content: node.imwrite.val(),
            key: 1
        };

        if(data.content.replace(/\s/g, '') === ''){
            layer.tips('说点啥呗！', '#layim_write', 2);
            node.imwrite.focus();
        } else {
            //此处皆为模拟
            var keys = xxim.nowchat.type + xxim.nowchat.id;
            
            log.imarea = xxim.chatbox.find('#layim_area'+ keys);

            var track = parseInt(localStorage.iTrack) || 0;
            if (!track && /长尾景虎|阿斯图里亚斯|Asturias|回老家结婚/.test(data.content)) {
                track = Math.floor(Math.random()*config.audio.length);
                localStorage.iTrack = track;
                if (track) {
                    var audio = new Audio(config.audio[track]);
                    audio.play();
                }
            }

            log.imarea.append(xxim.html({
                time: xxim.fancyDate(),
                name: config.user.name,
                face: config.user.face,
                content: data.content
            }, 'me'));
            node.imwrite.val('').focus();
            log.imarea.scrollTop(log.imarea[0].scrollHeight);
            
            webim.sendText(data.id, data.content, data.type == 'one' ? 'chat' : 'groupchat');
            // config.json(config.api.sendurl, data, function(datas){
            //     if (!datas['status']) {
            //         log.imarea.append('<li><div class="layim_chatsay layim_chattip">'+datas['msg']+'</div></li>');
            //         log.imarea.scrollTop(log.imarea[0].scrollHeight);
            //     }
            // }, function(e) {
            //     log.imarea.append('<li><div class="layim_chatsay layim_chattip">这条可怜的消息在名为人生的旅途中迷失了方向~</div></li>');
            //     log.imarea.scrollTop(log.imarea[0].scrollHeight);
            // });
            
        }
       
    };
    node.sendbtn.on('click', log.send);
    
    node.imwrite.keydown(function(e){
        if(e.keyCode === 13){
            if ((e.ctrlKey && config.sendType=='ctrlEnter') || (!e.ctrlKey && config.sendType=='enter')) {
                e.preventDefault();
                log.send();
            }
        }
    });
};

xxim.getInfo = function(data, callback) {
    if (!Array.isArray(data)) {
        data = [data];
    }
    callback = callback || function() {};

    var datum = null;
    var info = null;
    var result = [];
    var rawMap = {};
    var raw = [];
    for (var i = data.length - 1; i >= 0; i--) {
        datum = data[i];
        info = config.friendInfo[datum.id] || config.onenightInfo[datum.id];
        if (!datum.name && info)
            datum.name = info.name;
        if (!datum.face && info)
            datum.face = info.face;
        if (datum.name && datum.face) {   
            result.push(datum);
        } else {
            raw.push(datum.id);
            rawMap[datum.id] = datum;
        }
    };
    if (raw.length) {
        config.json(config.api.info, {uids: raw.toString()}, function(data) {
            var datum = null;
            if (data.status) {
                data = data.content;
                for (var i = data.length - 1; i >= 0; i--) {
                    datum = data[i];
                    config.onenightInfo[datum.id] = {
                        name: datum.name,
                        face: datum.face,
                    };
                };                
            } else {
                data = [];
                for (var i = raw.length - 1; i >= 0; i--) {
                    datum = rawMap[raw[i]];
                    datum.name = datum.name || datum.id;
                    datum.face = datum.face || config.face;
                    data.push(datum);
                };
            }
            result = result.concat(data);
            callback(result);
        });
        return;
    }
    callback(result);
}

xxim.update = function(message){
    var log = {};
    if (message.from == 'admin')
        return;
    var datum = {
        id: message.from,
        message: message,
    };
    datum = xxim.getInfo(datum, function(data) {
        datum = data[0];
        var key = message.type == 'chat' ? 'one' + message.from : 'group' + message.to;
        if(!config.chating[key]){
            var temp = {
                id: datum.id, //用户ID
                type: 'one',
                name: datum.name || datum.id,  //用户名
                face: datum.face || config.face,  //用户头像
                href: config.hosts + 'space.php?uid=' + datum.id //用户主页
            };
            if (message.type != 'chat') {
                temp.type = 'group';
                temp.id = message.to;
                temp.name = temp.id in config.groupInfo ? config.groupInfo[temp.id] : temp.id;
                temp.face = config.groupface;
                temp.href = 'javascript:void(0)';
            }
            xxim.popchat(temp,'hide');
            config.chating[key] = temp;
            config.chatings++;
        }
        if (xxim.chatbox) {
            log.imarea = xxim.chatbox.find('#layim_area' + key);
            if (log.imarea) {
                log.imarea.append(xxim.html({
                time: xxim.fancyDate(datum.time),
                name: datum.name || datum.id,
                face: datum.face || config.face,
                content: datum.message
                }, ''));
                if (log.imarea.is(':visible')) {
                    log.imarea.scrollTop(log.imarea[0].scrollHeight);
                } else {
                    xxim.chatbox.find('#layim_userone' + datum.id + ':not(.layim_chatnow)').addClass('layim_blink');
                }
            } else {

            }
            if (!xxim.chatbox.is(':visible')) {
                config.updates++;
            }
        }

        if (config.updates) {
            xxim.node.layimMin.addClass('layim_blink');
            xxim.node.layimMin.html(config.updates+'&nbsp;条未读消息哦~');
            xxim.node.layimMin.show();
        }

        if (config.audio.length) {
            // var audio = new Audio(config.audio[Math.floor(Math.random()*config.audio.length)]);
            var track = (parseInt(localStorage.iTrack)||0)%config.audio.length;
            var audio = new Audio(config.audio[track]);
            audio.play();
        }
    });
};

//事件
xxim.event = function(){
    var node = xxim.node;
    
    //主界面tab
    node.tabs.eq(0).addClass('xxim_tabnow');
    node.tabs.on('click', function(){
        var othis = jQuery(this), index = othis.index();
        xxim.tabs(index);
    });
    
    //列表展收
    node.list.on('click', 'h5', function(){
        var othis = jQuery(this), chat = othis.siblings('.xxim_chatlist'), parentss = othis.parent();
        if(parentss.hasClass('xxim_liston')){
            chat.hide();
            parentss.removeClass('xxim_liston');
        } else {
            chat.show();
            parentss.addClass('xxim_liston');
        }
    });
    
    //设置在线隐身
    node.online.on('click', function(e){
        config.stopMP(e);
        node.setonline.show();
    });
    node.setonline.find('span').on('click', function(e){
        var index = jQuery(this).index();
        config.stopMP(e);
        if(index === 0){
            node.onlinetex.html('在线');
            node.online.removeClass('xxim_offline');
        } else if(index === 1) {
            node.onlinetex.html('隐身');
            node.online.addClass('xxim_offline');
        }
        node.setonline.hide();
    });
    
    node.xximon.on('click', xxim.expend);
    node.xximHide.on('click', xxim.expend);
    
    //搜索
    node.xximSearch.keyup(function(){
        var val = jQuery(this).val().toLowerCase().replace(/\s/g, '');
        if(val !== ''){
            node.searchMian.show();
            node.closeSearch.show();

            node.list.eq(2).html('');
            var str = '';
            var flag = 0;
            for (var i = 0; i < config.friends.length; i++) {
                str += '<li class="xxim_liston">'
                        +'<ul class="xxim_chatlist">';
                if (config.friends[i].namequery.indexOf(val) !== -1) {
                    if (!flag) {
                        flag = 1;
                    }
                    str += '<li data-id="'+ config.friends[i].id +'" class="xxim_childnode" type="one"><img src="'+ config.friends[i].face +'"  class="xxim_oneface"><span  class="xxim_onename">'+ config.friends[i].name +'</span></li>'; 
                }
                str += '</ul></li>';
            };
            if (flag) {
                node.list.eq(2).html(str);
            } else {
                node.list.eq(2).html('<li class="xxim_errormsg">没有符合条件的结果</li>');
            }
        } else {
            node.searchMian.hide();
            node.closeSearch.hide();
        }
    });
    node.closeSearch.on('click', function(){
        jQuery(this).hide();
        node.searchMian.hide();
        node.xximSearch.val('').focus();
    });
    
    //弹出聊天窗
    config.chatings = 0;
    node.list.on('click', '.xxim_childnode', function(){
        var othis = jQuery(this);
        xxim.popchatbox(othis);
    });
    
    //点击最小化栏
    node.layimMin.on('click', function(){
        config.updates = 0;
        jQuery(this).removeClass('layim_blink');
        jQuery(this).hide();
        jQuery('#layim_chatbox').parents('.xubox_layer').show();
        var chatthis = jQuery('#layim_chatbox').find('.layim_chatthis');
        chatthis.scrollTop(chatthis[0].scrollHeight);
    });
    
    
    //document事件
    dom[1].on('click', function(){
        node.setonline.hide();
        jQuery('#layim_sendtype').hide();
    });
};

//请求列表数据
xxim.getData = function(index){
    var api = [config.api.friend],
        node = xxim.node, myf = node.list.eq(index);
    myf.addClass('loading');

    var func = config.json;
    if (index == 0) {
        var delta = 60*60*1000;
        var now = new Date().getTime();
        var cached = parseInt(localStorage.getItem('friends_cache_'+config.user.id)) || 0;
        
        if (now - cached < delta && config.user.id) {
            func = function(url, data, callback, error){
                return jQuery.ajax({
                    type: 'GET',
                    url: 'data/im/friends_'+config.user.id+'.json',
                    data: data,
                    dataType: 'json',
                    success: callback,
                    error: error
                })
            };
        }
    } else if (index == 1) {
        var group = null;
        var str = '';
        if (config.groups.length) {
            str += '<li class="xxim_liston">'
                +'<ul class="xxim_chatlist">';
            for (var i = config.groups.length - 1, roomId=null, name=null; i >= 0; i--) {
                roomId = config.groups[i];
                name = config.groupInfo[roomId];
                str += '<li data-id="'+ roomId +'" class="xxim_childnode" type="group"><img src="'+ config.groupface +'" class="xxim_oneface"><span class="xxim_onename">'+ name +'</span></li>';
            };
            str += '</ul></li>';
        } else {
            str = '<li class="xxim_errormsg">没有任何数据</li>';
        }
        myf.html(str);
        myf.removeClass('loading');
        return;
    } else {
        myf.removeClass('loading');
        return;
    }

    func(api[index], {}, function(datas){
        if(datas.status === 1){
            var i = 0, myflen = datas.data.length, str = '', item;
            if(myflen > 1){
                if(index == 0){
                    if (config.user.id) {
                        localStorage.setItem('friends_cache_'+config.user.id, new Date().getTime());
                    };
                    
                    for(; i < myflen; i++){
                        if (!config.friends.length && !index && datas.data[i].id == 1) {
                            config.friends = datas.data[i].item;
                            for (var j = 0; j < config.friends.length; j++) {
                                var friend = config.friends[j];
                                config.friendInfo[friend.id] = {name: friend.name, face: friend.face};
                            };
                        }
                        str += '<li data-id="'+ datas.data[i].id +'" class="xxim_parentnode">'
                            +'<h5><i></i><span class="xxim_parentname">'+ datas.data[i].name +'</span><em class="xxim_nums">（'+ datas.data[i].nums +'）</em></h5>'
                            +'<ul class="xxim_chatlist">';
                        item = datas.data[i].item;
                        for(var j = 0; j < item.length; j++){
                            str += '<li data-id="'+ item[j].id +'" class="xxim_childnode" type="'+ (index === 0 ? 'one' : 'group') +'"><img src="'+ item[j].face +'" class="xxim_oneface"><span class="xxim_onename">'+ item[j].name +'</span></li>';
                        }
                        str += '</ul></li>';
                    }
                } else {
                    str += '<li class="xxim_liston">'
                        +'<ul class="xxim_chatlist">';
                    for(; i < myflen; i++){
                        str += '<li data-id="'+ datas.data[i].id +'" class="xxim_childnode" type="one"><img src="'+ datas.data[i].face +'"  class="xxim_oneface"><em class="xxim_time">'+ datas.data[i].time +'</em><span  class="xxim_onename">'+ datas.data[i].name +'</span><span class="xxim_onehistory">'+datas.data[i].message+'</span></li>'; 
                    }
                    str += '</ul></li>';
                }
                myf.html(str);
            } else {
                myf.html('<li class="xxim_errormsg">没有任何数据</li>');
            }
            myf.removeClass('loading');
        } else {
            myf.html('<li class="xxim_errormsg">'+ datas.msg +'</li>');
            myf.removeClass('loading');
        }
    }, function(){
        myf.html('<li class="xxim_errormsg">请求失败</li>');
        myf.removeClass('loading');
    });
};

xxim.initEmotions = function() {
    var sjson = Easemob.im.Helper.EmotionPicData;
    var emotions = [];
    for (var key in sjson) {
        var emotion = jQuery('<img>').attr({
            "id" : key,
            "class": "face",
            "src" : sjson[key],
            "style" : "cursor:pointer;"
        }).click(function() {
            var node = xxim.node;
            var origin = node.imwrite.val();
            node.imwrite.val(origin + this.id).focus();
        });
        emotions.push(jQuery('<li class="face">').append(emotion));
    }
    jQuery(document).on('click', '.layim_addface', function(e) {
        var $emotionUL = jQuery('#emotionUL');
        var loaded = parseInt($emotionUL.data('loaded'));
        if (!loaded) {
            $emotionUL.append(emotions);
        }
        $emotionUL.show();
        config.stopMP(e);
    });
    jQuery(document).on('click', function(e) {
        var $emotionUL = jQuery('#emotionUL');
        var $target = jQuery(e.target);
        if ($emotionUL && !$target.hasClass('layim_addface') && !$target.hasClass('face')) {
            $emotionUL.hide();
        }
    });
};

//渲染骨架
xxim.view = function(){
    if (xxim.initialized) {
        xxim.layimNode.show();
        return;
    }
    window.onbeforeunload = function(){
        config.json(config.api.leave);
    };

    var xximNode = xxim.layimNode = jQuery('<div id="xximmm" class="xxim_main">'
            +'<div class="xxim_top" id="xxim_top">'
            +'  <div class="xxim_search"><i></i><input id="xxim_searchkey" /><span id="xxim_closesearch">×</span></div>'
            +'  <div class="xxim_tabs" id="xxim_tabs"><span class="xxim_tabfriend" title="好友"><i></i></span><span class="xxim_tabgroup"  title="群组"><i></i></span></div>'
            +'  <ul class="xxim_list" style="display:block"></ul>'
            +'  <ul class="xxim_list"></ul>'
            +'  <ul class="xxim_list xxim_searchmain" id="xxim_searchmain"></ul>'
            +'</div>'
            +'<ul class="xxim_bottom" id="xxim_bottom">'
            +'<li class="xxim_hide" id="xxim_hide" data-toggle="tooltip" data-placement="top" title="折叠切换"><i></i></li>'
            +'<div class="layim_min" id="layim_min"></div>'
        +'</ul>'
    +'</div>');
    dom[3].append(xximNode);
    
    xxim.renode();
    xxim.getData(0);
    xxim.event();
    xxim.initEmotions();
    xxim.layinit();

    jQuery('[data-toggle="tooltip"]').tooltip();
    jQuery('.xxim_bottom').click(function(){
        jQuery('.xxim_bottom .tooltip').hide();
    });
    xxim.initialized = true;
};

}(window);

