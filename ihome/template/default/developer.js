/*
 @author:slchen
 @exemple:
 var email="slchen@xxxxx.com";
 alert(validator.IsEmail(email));
 */
var Vator = (function () {
    Function.prototype.method = function (name, fn) {
        this.prototype[name] = fn;
    };

    var Validator = function () {
    };

//是否邮件
    Validator.method('IsEmail', function (obj) {
        var re = new RegExp(ValidatorRegex.Email);
        return re.test(obj);
    });

//是否电话,电话号码格式为国家代码(2到3位)-区号(2到3位)-电话号码(7到8位)-分机号(3位)
    Validator.method('IsTelephone', function (obj) {
        var re = new RegExp(ValidatorRegex.Telephone);
        return re.test(obj);
    });

//是否手机号码
    Validator.method('IsMobile', function (obj) {
        var re = new RegExp(ValidatorRegex.Mobile);
        return re.test(obj);
    });


//是否网址
    Validator.method('IsUrl', function (obj) {
        var re = new RegExp(ValidatorRegex.Url);
        return re.test(obj);
    });

//是否身份证
    Validator.method('IsIdCard', function (obj) {
        var num = obj.toLowerCase().match(/./g);
        if (obj.match(/^d{17}[dx]$/i)) {
            var sum = 0, times = [7, 9, 10, 5, 8, 4, 2, 1, 6, 3, 7, 9, 10, 5, 8, 4, 2];
            for (var i = 0; i < 17; i++)
                sum += parseInt(num[i], 10) * times[i];
            if ("10x98765432".charAt(sum % 11) != num[17])
                return false;
            return !!obj.replace(/^d{6}(d{4})(d{2})(d{2}).+$/, "$1-$2-$3").isDateTime();
        }
        if (obj.match(/^d{15}$/))
            return !!obj.replace(/^d{6}(d{2})(d{2})(d{2}).+$/, "19$1-$2-$3").isDateTime();
        return false;
    });

//是否日期
    Validator.method('IsDate', function (obj) {
        var date = obj === false ? obj : obj.parseStdDate(false);
        if (!date) return false;
        var arr = date.match(/^((19|20)d{2})-(d{1,2})-(d{1,2})$/);
        if (!arr) return false;
        for (var i = 1; i < 5; i++)
            arr[i] = parseInt(arr[i], 10);
        if (arr[3] < 1 || arr[3] > 12 || arr[4] < 1 || arr[4] > 31) return false;
        var _t_date = new Date(arr[1], arr[3] - 1, arr[4]);
        return _t_date.getDate() == arr[4] ? _t_date : null;
    });

//是否为空
    Validator.method('IsNullOrEmpty', function (obj) {
        if (!obj || obj == 'null' || typeof(obj) == undefined || obj == "" || obj.length == 0) {
            return true;
        }
        else {
            return false;
        }
    });


//是否是整数
    Validator.method('IsInteger', function (obj) {
        var num = new RegExp(ValidatorRegex.Integer);
        if (isNaN(obj)) {
            return false
        }
        else {
            return num.test(obj);
        }
    });


//是否是小数
    Validator.method('IsDecimal', function (obj) {
        if (isNaN(obj)) {
            return false
        }
        else {
            var num = new RegExp(ValidatorRegex.Decimal);
            return num.test(obj);
        }
    });


//是否是正整数
    Validator.method('IsPositiveInteger', function (obj) {
        if (isNaN(obj)) {
            return false
        }
        else {
            var num = new RegExp(ValidatorRegex.PositiveInteger);
            return num.test(obj);
        }
    });

//是否是正小数
    Validator.method('IsPositiveDecimal', function (obj) {
        var num = new RegExp(ValidatorRegex.PositiveDecimal);
        if (isNaN(obj)) {
            return false
        }
        else {
            return num.test(obj);
        }
    });

//是否是邮编
    Validator.method('IsZip', function (obj) {
        var num = new RegExp(ValidatorRegex.Zip);
        return num.test(obj);
    });

//是否是QQ
    Validator.method('IsQQ', function (obj) {
        var num = new RegExp(ValidatorRegex.QQ);
        return num.test(obj);
    });

//是否是英文
    Validator.method('IsEnglish', function (obj) {
        var num = new RegExp(ValidatorRegex.Letter);
        return num.test(obj);
    });


//是否是中文
    Validator.method('IsChinese', function (obj) {
        var num = new RegExp(ValidatorRegex.Chinese);
        return num.test(obj);
    });

    var ValidatorRegex = {
        Email: /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/,//邮件
        Telephone: /^(((d{3}))|(d{3}-))?((0d{2,3})|0d{2,3}-)?[1-9]d{6,7}(-d{1,4})?$/,//电话或传真
        Mobile: /^1\d{10}$/,//手机
        //Url : /^http://[A-Za-z0-9]+.[A-Za-z0-9]+[/=?%-&_~`@[]':+!]*([^<>""])*$/, //网址
        Decimal: /^[-+]?d+(.d+)?$/,//小数
        Integer: /^[-+]?d+$/,     //整数
        PositiveDecimal: /^d+(.d+)?$/, //正小数
        PositiveInteger: /^d+$/, //正整数
        Zip: /^[1-9]d{5}$/, //邮政编码
        QQ: /^[1-9]d{4,8}$/,//ＱＱ
        Letter: /^[A-Za-z]+$/,     //英文字母
        Chinese: /^[u0391-uFFE5]+$/ //中文
    };

    return new Validator();
})();

function readURL(input, tid) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            jq(tid).attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
}
