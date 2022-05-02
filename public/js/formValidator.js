function Validator(options){
    var selectorRules = {};
    function Validate(inputElement,rule){
        var errorElement = inputElement.parentElement.querySelector(options.formMassage);
        var errorMassage ;
        var rules = selectorRules[rule.selector];
        for(var i = 0; i < rules.length; i++){
            errorMassage = rules[i](inputElement.value);
            if(errorMassage)break;
        }
        if(errorMassage){
            errorElement.innerText = errorMassage;
            inputElement.parentElement.classList.add('invalid');
        }else{
            errorElement.innerText = "";
            inputElement.parentElement.classList.remove('invalid');
        }
        return !errorMassage;
    }
    var formElement = document.getElementById(options.form);
    var submit_form = document.getElementById("submit_register");
    if(formElement){
        var isFromValid = true;
        options.rules.forEach(function(rule){
            var inputElement = formElement.querySelector(rule.selector);
            var errorElement = inputElement.parentElement.querySelector(options.formMassage);
            if(Array.isArray(selectorRules[rule.selector])){
                selectorRules[rule.selector].push(rule.test);
            }else{
                selectorRules[rule.selector] = [rule.test];
            }
            if(inputElement){
                inputElement.onblur = function(){
                    Validate(inputElement,rule);
                }
                inputElement.oninput = function(){
                    errorElement.innerText = "";
                    inputElement.parentElement.classList.remove('invalid');
                }
            }
            var isValid = Validate(inputElement,rule);
            inputElement.onblur = function(){
                if(!isValid){
                    isFromValid = false;
                    console.log(isFromValid);
                }
            }
        });

        if(isFromValid){
            submit_form.disabled = false;
            submit_form.style.cursor = "pointer";
        }else{
            submit_form.disabled = true;
        }
    }
    console.log(submit_form.disabled);
}
Validator.isRequired = function(selector) {
    return {
        selector: selector,
        test: function(value){
            return value ? undefined:"Vui lòng nhập trường này";
        }
    };
}
Validator.isEmail = function(selector) {
    return {
        selector: selector,
        test: function(value){
            var regexEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            return regexEmail.test(value) ?undefined:"Nhập đúng địa chỉ email";
        }
    };
}
Validator.minLength = function(selector, min){
    return {
        selector: selector,
        test: function(value){
            return value.length >= min? undefined: 'Mật khẩu phải có it nhất ' +min +' kí tự';
        }
    };
}
Validator.isConfirmPassword = function(selector, password){
    return {
        selector: selector,
        test: function(value){
            return value === password() ? undefined: "Nhập mật khẩu không chính xác";
        }
    };
}