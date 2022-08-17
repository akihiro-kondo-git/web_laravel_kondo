//explain: 現在以下のファイルはHTMLで読み込めていません(08/16)
//explain クライアントサイドの入力チェック
function validation(){
    //社員ID////////////////////////////////////////////////////////////////////////////////////
    //必須チェック
    if(document.regist.employee_id.value == ""){
        alert("社員IDを入力してください");
        return false;
    }
    //書式チェック
    var result = /^[YZ]+([0-9]{8})/.test(document.regist.employee_id.value);
    if(!result){
        alert("社員IDを正しく入力してください");
        return false;
    }
    //社員名/////////////////////////////////////////////////////////////////////////////////////
    //社員名(性)の必須チェック
    if(document.regist.family_name.value == ""){
        alert("社員名(性)を入力してください");
        return false;
    }
    //社員名(性)の最大桁数チェック
    var result = /.{0,25}/.test(document.regist.family_name.value);
    if(!result){
        alert("社員名(性)は25文字以内で入力してください");
        return false;
    }
    //社員名(名)の必須チェック
    if(document.regist.first_name.value == ""){
        alert("社員名(名)を入力してください");
        return false;
    }
    //社員名(名)の桁数チェック
    var result = /.{0,25}/.test(document.regist.first_name.value);
    if(!result){
        alert("社員名(名)は25文字以内で入力してください");
        return false;
    }

    //所属セクション///////////////////////////////////////////////////////////////////////////////
    //書式チェック
    var result = /[1-3]/.test(document.regist.section_id.value);
    if(!result){
        alert("所属セクションを正しく入力してください");
        return false;
    }

    //メールアドレス/////////////////////////////////////////////////////////////////////////////////
    //必須チェック
    if(document.regist.mail_address.value == ""){
        alert("メールアドレスを入力してください");
        return false;
    }
    //桁数チェック
    var result = /.{0,256}/.test(document.regist.mail_address.value);
    if(!result){
        alert("メールアドレスは256文字以内で入力してください");
        return false;
    }
    //書式チェック
    var result = /^[a-zA-Z0-9_.+-]+[@]+[a-zA-Z0-9.-]+$/.test(document.regist.mail_address.value);
    if(!result){
        alert("メールアドレスを正しく入力してください");
        return false;
    }
    //性別/////////////////////////////////////////////////////////////////////////////////////////////
    //書式チェック
    var result = /[1-2]/.test(document.regist.gender_id.value);
    if(!result){
        alert("性別を正しく入力してください");
        return false;
    }
    
    return true;
}