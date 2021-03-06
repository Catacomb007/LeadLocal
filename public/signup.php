<?php include("../public/header.php");?>

<div class="container-fluid">
    <div><h2>Create An Account</h2></div>
    <!--../src/AccountCreate.php-->
    <!--
    <form id="Create" action="../src/AccountCreate.php" method="post">
        <input id="user" type="text" name="Username" placeholder="Username" required maxLength="50"/><br />
        <input id="pass" type="password" name="Password" placeholder="Password" required maxlength="100"/><br />
        <input id="confirm" type="password" placeholder="Confirm Password" required /><br />
        <fieldset >
            
            <input id="typee" type="radio" name="Type" value="e" />Employee<br />
        </fieldset>


        <button id="submit" type="submit">Submit</button>
        <div id="error"></div>
    </form>
	-->
	<form id="Create" action="../src/AccountCreate.php" method="post">
		<fieldset>
			<div class="form-group">
				<labe for="username">
				<span class="col-md-1 col-md-offset-2 text-center">
					<i class="fa fa-user bigicon"></i>&nbsp;&nbsp;
					<span font-size="5px">User Name</span>
				</span>
				</labe>
           		<div class="col-md-8">
					<input class="form-control" id="user" type="text" name="Username" placeholder="Username" required maxLength="50"/>
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
					<input class="form-control" id="pass" type="password" name="Password" placeholder="Password" required maxlength="100"/>
				</div>
			</div>
			<div class="form-group">
				<label for="phone">
				<span class="col-md-1 col-md-offset-2 text-center">
					<i class="fa fa-lock bigicon"></i>&nbsp;&nbsp;
					<span font-size="5px">Confirm Password</span>
				</span> 
				</label>
				<div class="col-md-8">
					<input class="form-control"  id="confirm" type="password" placeholder="Confirm Password" required maxlength="100" /		
				</div>
			</div>
			<div class="form-group">
				<label for="phone">
				<span class="col-md-1 col-md-offset-2 text-center">
					<i class="fa fa-type bigicon"></i>&nbsp;&nbsp;
					<span font-size="5px">Type</span>
				</span> 
				</label>
				<div class="col-md-8">
					<input id="typec" type="radio" name="Type" value="c" required/>Customer<br />
					 <input id="typee" type="radio" name="Type" value="e" />Employee	
				</div>
			</div>	
			<div class="form-group">
				<div class="col-md-12 text-center">
					<button class="btn btn-primary outline" id="submit" type="submit">Submit</button>
				</div>
			</div>
		</fieldset>
	</form>
		<div id="error"></div>
</div>
<script>
    $(function () {
        $("#submit").click(function (event) {
            event.preventDefault();
            if (validate()) {
                $.ajax({
                    type: "POST",
                    url: "../src/AccountCreate.php",
                    data: { 'user': $("#user").val().toString(), 'pass': $("#pass").val().toString(), 'confirm': $("#confirm").val().toString(), 'type': $("input:checked").val() },
                    success: function (data) {
                        
                        document.location.href = "Login.php";
                    },
                    failure: function () {
                        $("#error").html("<p>Account Creation Failed</p>");
                    }
                });

            }
        });

        function clear() {
            $("#error").html("");

        };

        function validate() {
            var user = $("#user").val().toString();
            var pass = $("#pass").val().toString();
            var confirm = $("#confirm").val().toString();
            var e = $("#error");
            var valid = true;

            if (user == null || user.length == 0) {
                e.html(e.html() + "<p>Username is required.</p>");
                valid = false;
            }
            if (pass == null || pass.length == 0) {
                e.html(e.html() + "<p>Password is required.</p>");
                valid = false;
            }
            if (confirm == null || confirm.length == 0) {
                e.html(e.html() + "<p>Please re-enter your password.</p>");
                valid = false;
            }
            if (user.length < 6 || user.length > 50) {
                e.html(e.html() + "<p>Username must be between 6 and 50 characters long.</p>");
                valid = false;
            }
            if (pass.length < 8 || pass.length > 100) {
                e.html(e.html() + "<p>Password must be between 8 and 100 characters long.</p>");
                valid = false;
            }
            if (pass !== confirm) {
                e.html(e.html() + "<p>Password does not match.</p>");
                valid = false;
            }
            return valid;
        };
        /*$email = $_POST['email'];
        if(preg_match("~([a-zA-Z0-9!#$%&amp;'*+-/=?^_`{|}~])@([a-zA-Z0-9-]).([a-zA-Z0-9]{2,4})~",$email)) {
        echo 'This is a valid email.';
        } else{
        echo 'This is an invalid email.';
        } */
    });
</script>

<?php require_once("footer.php");?>