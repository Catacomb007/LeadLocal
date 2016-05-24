

<?php include("../public/header.php"); ?>


<div class="container">

    <h3>Menu</h3>

    <ul class="list-group">


        <li align="center" class="list-group-item"><a href="profile.php">Profile</a></li>
        <li align="center" class="list-group-item"><a href="C_TaskManagement.php">TaskManagement</a></li>
        <li align="center" class="list-group-item"><a href="contactus.php">Contact</a></li>
        <li align="center" class="list-group-item"><span><a href="signup.php">&nbsp;SignUp&nbsp;</a></span><span><a href="login.php">&nbsp;LogIn&nbsp;</a></span></li>
        <li id="lougoutLi" align="center" class="list-group-item"><span><a id="logout" href="#">Log Out</a></li>
    </ul>



</div>


<hr>

<script type="text/javascript">
    
</script>
<script>
    $(function () {
        if (localStorage.getItem("jwt") == null) {
            $("#lougoutLi").hide();
        }
        
        
        $("#logout").on("click", function (e) {
        window.localStorage.removeItem("jwt");
        document.location.href = "index.php";
    });
    })
</script>