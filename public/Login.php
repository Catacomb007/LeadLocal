
<?php include("../public/header.php");?>


<div class="container">
    <br/>
	<h2>Login Page</h2>
	<hr/>
	
	<!-- 				old version								-->
	
               
                
               <form id="login" method="POST" action="../src/connect.php">
                     
				</form>
<hr/>
<!-- -->
	<form id="login"  method="POST" action="../src/connect.php">
 
                    <fieldset>
                      

                     
                      
                           

                        <div class="form-group">
							<labe for="username">  <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i>&nbsp;&nbsp;<span font-size="5px">User Name</span></span></labe>
                            <div class="col-md-8">
                                <input class="form-control" placeholder="Type your user name in here" id="username" type="text" name="name" required>
                            </div>
                        </div>

                        <div class="form-group">
						<label for="phone">	<span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-lock bigicon"></i>&nbsp;&nbsp;<span font-size="5px"> 
							Password</span></span> </label>
                            <div class="col-md-8">
                                <input id="password" class="form-control" placeholder="Don't speak too lound of your passward"  type="password" name="pass" required>
                            </div>
                        </div>
						<div class="form-group">
                            <div class="col-md-12 text-center">
                                
								<button class="btn btn-primary outline" id="loginBtn" type="submit" value="Log In"  data-loading-text="Loading...">Login</button>
                            </div>
                        </div>
						
	 </fieldset>
	</form>

 <!-- -->
</div>
<script>
    $(function () {
        $("#login").submit(function (e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "../src/connect.php",
                data: { "name": $('#username').val(), "pass": $('#password').val() },
                success: function (callback) {

                    var jwt = callback.toString();
                    if (localStorage.getItem("jwt") != null)
                        localStorage.removeItem("jwt");
                    console.log(localStorage.getItem("jwt"));
                    localStorage.setItem("jwt", jwt);
                    //console.log(jwt);
                    //document.location.href = "index.php";

                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    alert(textStatus + ": " + errorThrown);
                }
            });
        });
    })
</script>     
<?php include("../public/footer.php");?>    