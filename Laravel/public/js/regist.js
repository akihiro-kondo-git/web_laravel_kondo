//--------------------------------------------------------------------------------------------------//
//----------------------------------社員登録画面のJavaScript-----------------------------------------//
//--------------------------------------------------------------------------------------------------//

function error(){

    //explain: 社員IDの必須チェック・桁数チェック・書式チェック
        var input_employee_id = document.getElementById("input_employee_id");
        input_employee_id.addEventListener('invalid', function(e) {
        if(input_employee_id.validity.valueMissing){
            e.target.setCustomValidity("社員IDを入力してください");
        } else if(input_employee_id.validity.tooShort) {
            e.target.setCustomValidity("社員IDは10文字で入力してください");
        } else if(input_employee_id.validity.patternMismatch) {
            e.target.setCustomValidity("社員IDを正しく入力してください");
        }else {
            e.target.setCustomValidity("");
        }
    }, false);
    
    
    //explain: 社員名(性)の必須チェックと最大桁数チェック
    var input_family_name = document.getElementById("input_family_name");
    var input_first_name = document.getElementById("input_first_name");
        input_family_name.addEventListener('invalid', function(e) {
        if(input_family_name.validity.valueMissing){
            e.target.setCustomValidity("社員名(性)を入力してください");
        } else if(input_family_name.validity.patternMismatch) {
            e.target.setCustomValidity("社員名(性)は25文字以内で入力してください");
        } else {
            e.target.setCustomValidity("");
        }
    }, false);
    
    
    //explain: 社員名(名)の必須チェックと最大桁数チェック
        input_first_name.addEventListener('invalid', function(e) {
        if(input_first_name.validity.valueMissing){
            e.target.setCustomValidity("社員名(名)を入力してください");
        } else if(input_first_name.validity.patternMismatch) {
            e.target.setCustomValidity("社員名(名)は25文字以内で正しく入力してください");
        } else {
            e.target.setCustomValidity("");
        }
    }, false);
    
    
    //explain: 所属セクションの必須チェック・備考チェック
    var input_section_id = document.getElementById("input_section_id");
        input_section_id.addEventListener('invalid', function(e) {
        if(input_section_id.validity.valueMissing){
            e.target.setCustomValidity("所属セクションを入力してください");
        } else if(input_section_id.validity.patternMismatch) {
            e.target.setCustomValidity("所属セクションを正しく入力してください");
        } else {
            e.target.setCustomValidity("");
        }
    }, false);
    
    
    //explain: メールアドレスの必須チェック・最大桁数チェック・書式チェック、
    var input_mail_address = document.getElementById("input_mail_address");
        input_mail_address.addEventListener('invalid', function(e) {
        if(input_mail_address.validity.valueMissing){
            e.target.setCustomValidity("メールアドレスを入力してください");
        } else if(input_mail_address.validity.tooLong) {
            e.target.setCustomValidity("メールアドレスは256文字以内で入力してください");
        } else if(input_mail_address.validity.patternMismatch) {
            e.target.setCustomValidity("メールアドレスを正しく入力してください");
        }
        else {
            e.target.setCustomValidity("");
        }
    }, false);
    
    
    //explain: 性別の書式チェック
    var input_gender_id = document.getElementById("input_gender_id");
        input_gender_id.addEventListener('invalid', function(e) {
        if(input_gender_id.validity.valueMissing){
            e.target.setCustomValidity("性別を入力してください");
        } else if(input_gender_id.validity.patternMismatch) {
            e.target.setCustomValidity("性別を正しく入力してください");
        } else {
            e.target.setCustomValidity("");
        }
    }, false);
    }