
<?php require_once($_SERVER['CONTEXT_DOCUMENT_ROOT']."projectV1/public/header.php");  ?>


<div class="container">
     
          <h2>Login Page</h2>
               <div class="row">
                <span class="col-sm-4 col-md-4 col-lg-4"></span>   
                <div class="input-group col-xs-12 col-sm-4 col-md-4 col-lg-4">   
               
                  <span class="col-sm-4 col-md-4 col-lg-4"></span>    
                   </div>    
                </div>   
                
               <form id="login" method="POST" action="../src/connect.php">
                     <div class="row">
						 <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4"></div>
                     	<div class="input-group col-xs-8 col-sm-8 col-md-4 col-lg-4">
							<h4><label for="username"> Username:&nbsp;</label> 
                        <input id="username" type="text" name="name" required></h4>
						 </div>
						 <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4"></div>
                     </div>
                    <div class="row">
                        <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4"></div>
                        <div class="input-group col-xs-8 col-sm-8 col-md-4 col-lg-4">
                        <h4><label for="password">Password:&nbsp;&nbsp;</label>
                        <input id="password" type="password" name="pass" required></h4>
                    </div>
						<div class="col-xs-2 col-sm-2 col-md-4 col-lg-4"></div>
                    </div>
                    <br/>
                    
                    <div class="row">
						<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"></div>
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                        <button class="btn waves-effect btn-primary" id="loginBtn" type="submit" value="Log In"  data-loading-text="Loading...">Login</button>
				    <hr/>			
                        </div>
							<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"></div>
                    </div>
</form>
</hr>
    <div id="error"></div>
</div>
<script>
    $(function () {
        $("#login").submit(function (e) {
            e.preventDefault();
            $("#error").html("");
            $.ajax({
                type: "POST",
                url: "../src/connect.php",
                data: { "name": $('#username').val(), "pass": $('#password').val() },
                success: function (callback) {
                    var jwt = callback.trim();
                    console.log(jwt);
                    console.log(callback);
                    if (jwt == "Failed!") {
                        $("#error").html("<p><h3>Authentication Failure</h3><br />The Username or Password was entered incorrectly<br /><small>Or maybe the server is down. Maybe.</small></p>");
                    } else {
                        if (localStorage.getItem("jwt") != null)
                            localStorage.removeItem("jwt");

                        localStorage.setItem("jwt", jwt);

                        document.location.href = "index.php";
                    }

                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    alert(textStatus + ": " + errorThrown);
                }
            });
        });
    })
</script>     
<?php include("../public/footer.php");?>    