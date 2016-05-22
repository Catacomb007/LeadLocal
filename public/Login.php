
<?php include("../public/header.php");?>


<div class="container">
    <br/>
	<h2>Login</h2>
	<hr/>
	
	<!-- 				old version								-->
	
               
   
				<form id="login"  method="POST" action="../src/connect.php">
					<fieldset>
						
						<div class="form-group">
							<label for="username">
								<span class="col-md-1 col-md-offset-2 text-center">
									<i class="fa fa-user bigicon"></i>&nbsp;&nbsp;
									<span font-size="5px">User Name</span>
								</span>
							</label>
                            <div class="col-md-8">
                                <input class="form-control" placeholder="Type your user name in here" id="username" type="text" name="name" required>
                            </div>
                        </div>

                        <div class="form-group">
							<label for="phone">
								<span class="col-md-1 col-md-offset-2 text-center">
									<i class="fa fa-lock bigicon"></i>&nbsp;&nbsp;
									<span font-size="5px"> Password</span>
								</span> 
							</label>
                            <div class="col-md-8">
                                <input id="password" class="form-control" placeholder="Keep it in your heart"  type="password" name="pass" required>
                            </div>
                        </div>
						<div class="form-group">
                            <div class="row text-center">
								<button class="btn btn-primary outline" id="loginBtn" type="submit" value="Log In"  data-loading-text="Loading...">Login</button> 
                            </div>
							<div class="row text-center">
								<a href="signup.php">
									<br/>Create a new Account
								</a>
							</div>
                        </div>
                        <div id="error"></div>	
					</fieldset>
				</form>

 <!-- -->
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
                var jwt = callback.slice(1, -1);
                    console.log(jwt);
                    console.log(callback);
                    if (jwt == "Failed!") {
                      $("#error").html("<p><h3>Authentication Failure</h3><br />The Username or Password was entered incorrectly<br /><small>Or maybe the server is down. Maybe.</small></p>");
                    } else {
                       if (localStorage.getItem("jwt") != null)
                          localStorage.removeItem("jwt");

                      localStorage.setItem("jwt", jwt);
 
                        document.location.href = "index.php";
                    },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    alert(textStatus + ": " + errorThrown);
                }
            });
        });
    })
</script>     
<?php include("../public/footer.php");?>    