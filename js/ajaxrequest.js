
$(document).ready(function(){
    //Ajax call form Already Exists Email Verification 
   $("#uemail").on("keypress blur",function(){
        var Reg=/^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
        var uemail=$("#uemail").val();
        $.ajax({
            url:"user/addUser.php",
            method:"POST",
            data:{
                checkemail:"checkemail",
                uemail:uemail,
            },
            success:function(data){
                // console.log(data);
                if(data != 0){
                    $("#statusMsg2").html('<small style="color:red;">Email ID Already Used !</small>');
                    $("#signup").attr("disabled",true);
                }
                else if(data == 0 && Reg.test(uemail)){
                    $("#statusMsg2").html('<small style="color:green;">There You Go !</small>');
                    $("#signup").attr("disabled",false);

                }
                else if(!Reg.test(uemail)){
                    $("#statusMsg2").html('<small style="color:red;">Please Enter valid Email e.g eaxmple@gmail.com</small>');
                    $("#signup").attr("disabled",false);
                }
                if(uemail==""){
                    $("#statusMsg2").html('<small style="color:red;">Please Enter Email !</small>');
                }
            },
        });
    });
});


function addUser(){
    var Reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
    var uname=$("#uname").val();
    var uemail=$("#uemail").val();
    var upass=$("#upass").val();
    //checking form fields on form submission 
    if(uname.trim()==""){
        $("#statusMsg1").html('<small style="color:red;">Please Enter Name !</small>');
        $("#uname").focus();
        return false;
    }
    else if(uemail.trim()==""){
        $("#statusMsg2").html('<small style="color:red;">Please Enter Email !</small>');
        $("#uemail").focus();
        return false;
    }
    else if(uemail.trim()!="" && !Reg.test(uemail)){
        $("#statusMsg2").html('<small style="color:red;">Please Enter valid Email e.g eaxmple@gmail.com</small>');
        $("#uemail").focus();
        return false;
    }
    else if(upass.trim()==""){
        $("#statusMsg3").html('<small style="color:red;">Please Enter Password !</small>');
        $("#upass").focus();
        return false;
    }
    else{
        $.ajax({
            url:'user/addUser.php',
            method:'POST',
            dataType:"json",
            data:{
           usersignup:"usersignup",
           uname:uname,
           uemail:uemail,
           upass:upass,
            },
            success:function(data){
                console.log(data);
                if(data=="ok"){
                    $('#successMsg').html("<span class='alert alert-success'>Registration Successful</span>");
                    clearRegField();
                }
                else if(data=="failed"){
                    $('#successMsg').html("<span  class='alert alert-danger'> Unable to Register</span>");
                }
            },
        });
    }
}
//Empty all User Signup fields
function clearRegField()
{
$("#RegForm").trigger("reset");
$("#statusMsg1").html("");
$("#statusMsg2").html("");
$("#statusMsg3").html("");
}

//Ajax call for user login verification
function checkuserlog(){
    var logemail=$("#logemail").val();
    var logpass=$("#logpass").val();
    $.ajax({
        url:'user/addUser.php',
        method:'POST',
        data:{
        checklogemail:"checklogemail",
        logemail:logemail,
        logpass:logpass,
        },
        success:function(data){
            if(data == 0){
                $("#statusLogMsg").html('<small class="alert alert-danger">Invalid Email ID or Password !</small>');
            }
            else if(data == 1){
                $("#statusLogMsg").html('<div class="spinner-border text-success" role="status"></div>');
                setTimeout(()=>{
                    window.location.href="index.php";
                },1000);
            }
        },
    });
}
//Empty all User Login fields
function clearLogField()
{
$("#LoginForm").trigger("reset");
$("#statusLogMsg").html("");

}