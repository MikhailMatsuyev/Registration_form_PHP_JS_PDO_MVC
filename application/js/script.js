window.onload = function(){
	
function explode( delimiter, string ) { // Split a string by string
    var emptyArray = { 0: '' };
    if ( arguments.length != 2
        || typeof arguments[0] == 'undefined'
        || typeof arguments[1] == 'undefined' )
    {
        return null;
    }
    if ( delimiter === ''
        || delimiter === false
        || delimiter === null ){
        return false;
    }
    
    if ( typeof delimiter == 'function'
        || typeof delimiter == 'object'
        || typeof string == 'function'
        || typeof string == 'object' ){
    
        return emptyArray;
    }
    if ( delimiter === true ) {
        delimiter = '1';
    }
    return string.toString().split ( delimiter.toString() );
}

	// -----------------------------контроль ввода данных в поле номера телефона
    re=/^[0-9]{9}$/;	
    id_input_phone_number.onblur = function() {
	if (isNaN(this.value)||!this.value.match(re)) { // введено не число
	// показать ошибку
            this.className = "cl_phone_number_error";
            s=(explode('/', window.location.href));
            if ((s[4]=='ru')||(s[4]==undefined)){
                id_span_phone_error.innerHTML = 'Введите номер длиной 9 цифр. Исправьте, пожалуйста!';
            }
            else if (s[4]=='en'){
		id_span_phone_error.innerHTML = 'Enter mobile number, 9 digits. Retype, please!';
            }
	}
    };

    id_input_phone_number.onfocus = function () {
	if (this.className == 'cl_phone_number_error') { // сбросить состояние "ошибка", если оно есть
            this.className = "";
            id_span_phone_error.innerHTML = "";
	}
    };

// -----------------------------контроль ввода данных в поле имя
    re_name=/^[a-zA-Zа-яА-Я]{1,15}(\s?|\-?)[a-zA-Zа-яА-Я]{0,15}$/;
	
    id_input_name.onblur = function() {
        if (!this.value.match(re_name)) { // 
        // показать ошибку
            this.className = "cl_name_error";
            s=(explode('/', window.location.href));
            if ((s[4]=='ru')||(s[4]==undefined)){
                id_span_name_error.innerHTML = 'Введите Имя длиной до 20 букв. Исправьте, пожалуйста.';
            }
            else if (s[4]=='en'){
                id_span_name_error.innerHTML = 'Enter name till 20 symbols.';
            }
        }
    };

    id_input_name.onfocus = function() {
        if (this.className == 'cl_name_error') { // сбросить состояние "ошибка", если оно есть
            this.className = "";
            id_span_name_error.innerHTML = "";
        }
    };
// -----------------------------контроль ввода данных в поле фамилия
    re_surname=/^[a-zA-Zа-яА-Я]{1,15}\s?\-?[a-zA-Zа-яА-Я]{0,15}$/;
	//	
    id_input_surname.onblur = function() {
        if (!this.value.match(re_surname)) { 
        // показать ошибку
        this.className = "cl_surname_error";
        s=(explode('/', window.location.href));
        if ((s[4]=='ru')||(s[4]==undefined)){
            id_span_surname_error.innerHTML = 'Введите фамилию длиной до 30 букв. Исправьте, пожалуйста.';
        }
        else if (s[4]=='en'){
            id_span_surname_error.innerHTML = 'Enter surname till 30 symbols.';
        }
        }		
    };

	id_input_surname.onfocus = function() {
	  if (this.className === 'cl_surname_error') { // сбросить состояние "ошибка", если оно есть
		this.className = "";
		id_span_surname_error.innerHTML = "";
	  }
	};
// -----------------------------контроль ввода данных в поле логин
	re_login=/^[a-zA-Zа-яА-Я0-9\s\-\*\?\.\,\~\!\^\#\$\;\_\=\:\)\(\%\@\]\[]{1,15}$/;
	id_input_login.onblur = function(){
		if (!this.value.match(re_login)){ 
    // показать ошибку
			this.className = "cl_login_error";
			s=(explode('/', window.location.href));
			if ((s[4]=='ru')||(s[4]==undefined) ){
				id_span_login.innerHTML = 'До 15 символов: [-*?.,~![]^#$;_-=:)(%@], буквы, цифры.';
				
			}
			else if (s[4]=='en'){
				id_span_login.innerHTML = 'You can use: [-*?.,~![]^#$;_-=:)(%@], letters, digits till 15 symbols';
			}
		}	
			
	};

	id_input_login.onfocus = function() {
		if (this.className == 'cl_login_error') { // сбросить состояние "ошибка", если оно есть
			this.className = "";
			id_span_login.innerHTML = "";
			
		}
	};
	
// -----------------------------контроль ввода данных в поле пароль
	re_psw=/^.{5,15}$/;
	id_input_psw.onblur = function() {
		
		if (!this.value.match(re_psw)) { 
    // показать ошибку
		this.className = "cl_psw_error";
		s=(explode('/', window.location.href));
		if ((s[4]=='ru')||(s[4]==undefined)){
				id_span_psw.innerHTML = 'Введите пароль от 5 до 15 символов. Исправьте, пожалуйста.';
			}
			else if (s[4]=='en'){
				id_span_psw.innerHTML = 'Enter password from 5 till 15 symbols.';
			}
		}			
	};
	
	
	id_input_psw.onfocus = function() {
	  if (this.className == 'cl_psw_error') { // сбросить состояние "ошибка", если оно есть
		this.className = "";
		id_span_psw.innerHTML = "";
	  }
	};
// -----------------------------контроль ввода данных в поле повтр пароля	
	id_input_re_psw.onblur = function() {
		if  (id_input_psw.value!=this.value)  { 
    // показать ошибку
		this.className = "cl_re_psw_error";
		s=(explode('/', window.location.href));
		if ((s[4]=='ru')||(s[4]==undefined)){
				id_span_password_re.innerHTML = 'Пароли не совпадают. Исправьте, пожалуйста.';
			}
			else if (s[4]=='en'){
				id_span_password_re.innerHTML = 'Password is wrong.';
			}
		}	
	};

	id_input_re_psw.onfocus = function() {
		if (this.className == 'cl_re_psw_error') { // сбросить состояние "ошибка", если оно есть
			this.className = "";
			id_span_password_re.innerHTML = "";
	  }
	  
	};
                
   	id_input_browse.onchange=function(){
		var pos = this.value.lastIndexOf("\\");
		if(pos != -1){f_Name = this.value.substr(pos+1);
                    this.previousSibling.previousSibling.innerHTML=f_Name;
		}
	};
	
	function $_GET(key) {
		var s = window.location.search;
		s = s.match(new RegExp(key + '=([^&=]+)'));
		return s ? s[1] : false;
	}

// -----------------------------проверка на ошибки или не заполнение полей перед отправкой и выделение их красным	
	id_form.onsubmit=function() {
		if (id_input_phone_number.className=="cl_phone_number_error"
			||id_input_name.className=="cl_name_error"
			||id_input_surname.className=="cl_surname_error"
			||id_input_psw.className=="cl_psw_error"
			||id_input_login.className=="cl_login_error"
			||id_input_re_psw.className=="cl_re_psw_error"
			||id_input_name.value===""
			||id_input_surname.value===""
			||id_input_psw.value===""
			||id_input_login.value===""
			||id_input_re_psw.value!=id_input_psw.value
			||id_input_phone_number.value===""
			){	
				
				if (document.getElementById("id_input_name").value===""){
					document.getElementById("id_input_name").className = "cl_name_error";
					
				};
				if (document.getElementById("id_input_surname").value===""){
					document.getElementById("id_input_surname").className = "cl_surname_error";
					
				};
				if (document.getElementById("id_input_phone_number").value===""){
					document.getElementById("id_input_phone_number").className = "cl_phone_number_error";
					
				};
				if (document.getElementById("id_input_login").value===""){
					document.getElementById("id_input_login").className = "cl_login_error";
					
				};
				
				if (document.getElementById("id_input_psw").value===""){
					document.getElementById("id_input_psw").className = "cl_psw_error";
					
				};
				
				if (document.getElementById("id_input_re_psw").value===""){
					document.getElementById("id_input_re_psw").className = "cl_re_psw_error";
					
				};
				
				return false;//если есть ошибки, кнопка не отправит форму
			}
	};
	
}