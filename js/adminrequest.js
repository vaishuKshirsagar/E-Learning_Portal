//Ajax call for Admin login verification
function checkAdminlog(){
    var Adminlogemail=$("#Adminlogemail").val();
    var Adminlogpass=$("#Adminlogpass").val();
    $.ajax({
        url:'Admin/admin.php',
        method:'POST',
        data:{
        checklogemail:"checklogemail",
        Adminlogemail:Adminlogemail,
        Adminlogpass:Adminlogpass,
        },
        success:function(data){
            if(data == 0){
                $("#statusAdminLogMsg").html('<small class="alert alert-danger">Invalid Email ID or Password !</small>');
            }
            else if(data == 1){
                $("#statusAdminLogMsg").html('<small class="alert alert-success">Success Loading...</small>');
                setTimeout(()=>{
                    window.location.href="Admin/adminDashboard.php";
                },1000);
            }
        },
    });
}
//Empty all Admin Login fields
function clearAdminLogField()
{
$("#AdminLoginForm").trigger("reset");
$("#statusAdminLogMsg").html("");

}