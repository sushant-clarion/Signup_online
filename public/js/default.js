$s = jQuery.noConflict();

function validateRegistrationPage(){
    var error = 0;
    var setFocusCntl = "";
    if ($s("#fname").val() == ""){
        if (setFocusCntl == "")
            setFocusCntl = $s("#fname");
            
        $s("#fname").css("border","1px solid red");
        error = 1;
    }
    if ($s("#lname").val() == ""){
        if (setFocusCntl == "")
            setFocusCntl = $s("#lname");
            
        $s("#lname").css("border","1px solid red");
        error = 1;
    }                           
    if ($s("#bday_month").val() == ""){
        if (setFocusCntl == "")
            setFocusCntl = $s("#bday_month");
            
        $s("#bday_month").css("border","1px solid red");
        error = 1;
    }          
    if ($s("#bday_day").val() == ""){
        if (setFocusCntl == "")
            setFocusCntl = $s("#bday_day");
            
        $s("#bday_day").css("border","1px solid red");
        error = 1;
    }
    if ($s("#bday_year").val() == ""){
        if (setFocusCntl == "")
            setFocusCntl = $s("#bday_year");
            
        $s("#bday_year").css("border","1px solid red");
        error = 1;
    }
    if ($s("#email").val() == ""){
        if (setFocusCntl == "")
            setFocusCntl = $s("#email");
            
        $s("#email").css("border","1px solid red");
        error = 1;
    }
    
    if (error > 0){
        setFocusCntl.focus();
        return false;
    }
    else{
        return true;
    }
}

function openChildServiceDiv(chkCntl,divId){
    
    if (chkCntl.checked)
        $s("#"+divId).slideDown('slow');
    else
        $s("#"+divId).slideUp('slow');
}
