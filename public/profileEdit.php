

<?php include("../public/header.php"); ?>
<?php
require_once('../src/DBConnector.php');
require_once("../src/jsoniss.php");

$db = DBConnector::getInstance();

$sql = "SELECT * FROM tourist WHERE username='Pizza Man'";
$result = $db->query($sql);
$id = $result[0]['ID'];
$type = $result[0]['type'];
$UserName = $result[0]['username'];
$pic = $result[0]['pic'];
//$Email=$result[0]['email'];
//$Contact=$result[0]['contact'];
?>   
<script>
</script>	   
<br>

<div class="container">

    <div class="col-md-12 lead"><h2><?php echo $UserName; ?> </h2></div>
    <div class="row">
        <div class="col-md-4 text-center">
            <img class="img-circle avatar avatar-original" style="-webkit-user-select:none; 
                 display:block; margin:auto;" src="<?php echo $pic; ?>" height="120" width="120">
        </div>
        <div class="col-md-8"></div>
    </div>
    <div class="col-md-12">

        <form id="profileEditer" class="form-horizontal" action="../src/ProfileEditer.php" method="post">
            <fieldset>
                <div class="form-group">
                    <label for="email">  
                        <span class="col-md-1 col-md-offset-2 text-center">
                            <i class="fa fa-envelope-o bigicon"></i>
                            &nbsp;&nbsp;<span font-size="5px">New Email Address</span>
                        </span>
                    </label>
                    <div class="col-md-8">
                        <input id="email" name="email" type="text" placeholder="Example@example.com" class="form-control" >
                    </div>
                </div>

                <div class="form-group">
                    <label for="phone">	
                        <span class="col-md-1 col-md-offset-2 text-center">
                            <i class="fa fa-phone-square bigicon"></i>
                            &nbsp;&nbsp;<span font-size="5px"> New Phone Contact</span>
                        </span> 
                    </label>
                    <div class="col-md-8">
                        <input id="phone" name="phone" type="text" placeholder="Phone Number" class="form-control" >
                    </div>
                </div>
                <div class="form-group">
                    <label for="password">
                        <span class="col-md-1 col-md-offset-2 text-center">
                            <i class="fa fa-lock bigicon" ></i>&nbsp;&nbsp;
                            <span font-size="5px"> New Password</span>
                        </span>
                    </label>
                    <div class="col-md-8">
                        <input id="password" name="password" type="password" placeholder="Phone Number" class="form-control" >
                    </div>
                </div>
                <div class="form-group">
                    <label for="confirm">
                        <span class="col-md-1 col-md-offset-2 text-center">
                            <i class="fa fa-lock bigicon"></i>&nbsp;&nbsp;
                            <span font-size="5px"> Repeat New Password</span>
                        </span>
                    </label>
                    <div class="col-md-8">
                        <input id="confirm" name="confirm" type="password" placeholder="Phone Number" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <span class="col-md-1 col-md-offset-2 text-center">
                        <i class="fa fa-pencil-square-o bigicon"></i>
                    </span>
                    <div class="col-md-8">
                        <label for="intro">
                            <span font-size="5px"> Introduce Info:</span>
                            <textarea class="form-control" id="intro" name="intro" placeholder="Introduce more about yourself" cols="70" rows="7"></textarea>
                        </label>
                    </div>
                </div>



                <div class="form-group">
                    <div class="col-md-12 text-center">
                        <a href="#"><button type="submit" class="btn btn-primary outline">Submit</button></a>
                    </div>
                </div>
                <div id="error"></div>
            </fieldset>
        </form>
    </div>
</div>






</div>
<div class="col-md-6">

</div>



<script>
    $(function () {
        $("#profileEditer button").click(function (event) {
            event.preventDefault();
            $.ajax({
                type: "POST",
                url: "../src/ProfileEditer.php",
                data: {
                    'email': $("#email").val().toString(),
                    'phone': $("#phone").val().toString(),
                    'password': $("#password").val().toString(),
                    'confirm': $("#confirm").val().toString(),
                    'intro': $("#intro").val().toString(),
                    'name': "<?php echo $UserName; ?>",
                    'id': "<?php echo $id; ?>",
                    'type': "<?php echo $type; ?>"
                },
                success: function (data) {
                    document.location.href = "profile.php";

                },
                failure: function (jqXHR, textStatus, error) {
                    $("#error").html("<p>Apply Creation Failed</p>");
                    console.log(textStatus + ": " + error);
                }
            });

        }
        );

        function clear() {
            $("#error").html("");

        }
        ;
    });

</script>





<?php include("../public/footer.php"); ?>
     