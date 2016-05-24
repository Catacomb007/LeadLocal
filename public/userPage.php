<?php


require("../src/jsoniss.php");

$response = $_GET['jwt'];
$JWT = str_replace('"', "", $response);
$data = TokenIssuer::getInstance()->check(trim($JWT));

if(empty($JWT))
{
    require_once("../public/Login.php");
}
else
{
    include("../public/profile.php");
}



?>   
<script>
    $(function () {
        $("#profileEditer button").(function (event) {
            event.preventDefault();
            if(<?php echo $JWT?>===null)
            {
             document.location.href = "login.php";
            }
            else
            {
                document.location.href="profile.php";
            }

        }
        );

        function clear() {
            $("#error").html("");

        }
        ;
    });

</script>