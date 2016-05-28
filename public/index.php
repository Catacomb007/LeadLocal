<?php 
   
    include("../public/header.php");
    
?>


<div >
    <img class="bgIMG" src="../public/img/indexContainerBG.png" width="100%">
</div>    

<div  class="container">
    <h2 >Welcome to LeadLocal</h2>

    <br/>
    <p>We are your special tour guide agency.</p>
    <p>We give you the best experience while traveling in Vancouver</p>
</p>

<ul id="intro">
    <li>Quick to set up a tour guide for you</li><br/>
    <li>No difficult processes</li><br/>
    <li>Experience local culture.</li><br/>
    <li>Find hidden gems from local people</li><br/>
    <li>Get introduced to the best companion for you</li><br/>

</ul>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
        <a href="TaskTest.php"><button type="button" class="btn btn-primary outline" >Let's Begin Your First Task</button><hr/></a>
    </div>
</div>



<form id="login"  method="POST" action="../src/connect.php">
    <fieldset>
        <div class="row quickLogin">
            <div class="form-group quickLogin">
                <div class="col-xs-1 quickLogin" align="right">
                    <label for="username">
                        <i class="fa fa-user bigicon quickLogin"></i>&nbsp;&nbsp;
                        <span font-size="5px"></span>
                    </label>
                </div>
                <div class="col-xs-5 quickLogin">
                    <input class="form-control quickLogin" placeholder="User" id="username" type="text" name="name" required>
                </div>
                <div class="col-xs-5 quickLogin">
                    <input id="password" class="form-control"  placeholder="Pass"  type="password" name="pass"  required>
                </div>
                <div class="col-xs-offset-1 quickLogin"></div>
            </div>
        </div>
        <div class="row quickLogin">
            <div class="form-group quickLogin">
                <div class="col-md-12 text-center quickLogin">
                    <button class="btn btn-primary outline" id="loginBtn" type="submit" value="Log In"  data-loading-text="Loading...">Login</button>
                </div>
            </div>
        </div>		
    </fieldset>
</form>

<!-- -->
</div >

</div>
<script>
    $(function () {
        if (localStorage.getItem("jwt") != null){
            $(".quickLogin").each(function () {
                $(this).hide();
            });
        }
        else{
            $(".quickLogin").each(function () {
                $(this).show();
            });
        }

        $("#login").submit(function (e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "../src/connect.php",
                data: {"name": $('#username').val(), "pass": $('#password').val()},
                success: function (callback) {

                    var jwt = callback.toString();
                    if (localStorage.getItem("jwt") != null)
                    {

                        localStorage.removeItem("jwt");
                    }
                    else
                    {

                    }
                    console.log(localStorage.getItem("jwt"));
                    localStorage.setItem("jwt", jwt);
                    //console.log(jwt);
                    document.location.href = "index.php";

                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    alert(textStatus + ": " + errorThrown);
                }
            });
        });

    })

</script>     