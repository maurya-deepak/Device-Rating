<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="../jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="style.css">
   
    <title>CompareAnything | Sign-Up</title>

</head>
<body class="bo">
    <div class="sign_up_page">
     <form id="signup" class="sign-up"> 
        <h3 class="h3">Sign-Up To Enjoy The Services</h3>

        <div class="inputArea">
                <input type="text" name="user_email" placeholder="  Email" id="email">
        </div>

        <div class="inputArea">
                <input type="text" name="username"  placeholder="  Choose Username" id="username">
        </div>

        <div class="inputArea">
            <input type="Password" name="password"  placeholder="  Password" id="password">   
        </div>

        <div class="inputArea">
            <input type="Password" name="repassword"  placeholder="  Re-enter Password" id="repassword">
        </div>

        <div class="submit_btn">
                <input type="button" id="submit" class="button_input" value="sign-up" name="submit-signup">
        </div>

        <div class="back_btn">
            <a href="firstpage.php"><input type="button" name="back" value="back" ></a>
        </div>
    </form> 
</div>   
  
<script>
    $(document).ready(function() {
        $('#submit').click(function(){
            $("#errors").remove();
            var email = $('#email').val();
            var username = $('#username').val();
            var password = $('#password').val();
            var repassword = $('#repassword').val();
            if(email == '' || email.indexOf('@') == -1  || email.indexOf('.') == -1 && (email.indexOf('@') === 0  || email.indexOf('.') === 0))
            {
                $("#email").after("<p id='errors'>Invalid Email.</p>");
            }
            else
            {
               if(username == '')
               {
                    $("#username").after("<p id='errors'>Username Required.</p>");
               }
               else
               {
                   if(password == "")
                   {
                    $("#password").after("<p id='errors'>Password Required.</p>");  
                   }
                   else{
                        if(repassword == "")
                        {
                            $("#repassword").after("<p id='errors'>Please again enter Password.</p>");  
                        }
                        else{
                            if(password !== repassword)
                            {
                                $("#repassword").after("<p id='errors'>Password Does not match.</p>");  
                            }
                            else
                            {
                                $.ajax({
                                    type: "POST",
                                    url: "phpfiles/connect.php",
                                    data: {
                                        user_email: email,
                                        username: username,
                                        password: password,
                                       },
                                    success: function(data) {
                                        if(data == 1)
                                        {
                                            alert("Unsuccessful");
                                           
                                        }
                                        window.location.href = "phpfiles/compare.php";
                                        
                                        
                                    },
                                });
                            }
                        }
                   }
               }
            }

        });
    });
</script>
</body>
</html>