

<?php include("../public/header.php"); ?>
<?php
require_once('../src/DBConnector.php');
require_once("../src/jsoniss.php");

$db = DBConnector::getInstance();
$response = $_GET['jwt'];
$JWT = str_replace('"', "", $response);
$data = TokenIssuer::getInstance()->check(trim($JWT));

$type = $data['type'];
$name = $data['user'];

if ($data['type'] == 'c') {
    $sql = "SELECT * FROM tourist WHERE username = '$name';";
} else if ($data['type'] == 'e') {
    $sql = "SELECT * FROM employee WHERE username = '$name';";
} else {
    die('Access Denied. Invalid Authorization');
}


$result = $db->query($sql);
$id = $result[0]['ID'];
$pic = $result[0]['pic'];
$email=$result[0]['email'];
$contactInfo=$result[0]['contactInfo'];
$intro=$result[0]['introInfo'];
//$Email=$result[0]['email'];
//$Contact=$result[0]['contact'];
?>      

<div class="container">

    <div class="col-md-12 lead"><h2><?php echo $name; ?> </h2></div>
    <div class="row">
        <div class="col-md-4 text-center">
            <img class="img-circle avatar avatar-original"  src="<?php echo $pic; ?>" height="120" width="120">
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
                        <input id="email" name="email" type="text" placeholder="Example@example.com" value="<?php echo $email; ?>" class="form-control" >
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
                        <input id="phone" name="phone" type="text" placeholder="Phone Number" value="<?php echo $contactInfo;?>" class="form-control" >
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="picture">	
                        <span class="col-md-1 col-md-offset-2 text-center">
                            <i class="fa fa-picture-o bigicon"></i>
                            &nbsp;&nbsp;<span font-size="5px"> Picture Path</span>
                        </span> 
                    </label>
                    <div class="col-md-8">
                        <input id="picture" name="picture" type="text" placeholder="Phone Number" value="<?php echo $pic;?>" class="form-control" >
                    </div>
                </div>
               
                <div class="form-group">
                    <span class="col-md-1 col-md-offset-2 text-center">
                        <i class="fa fa-pencil-square-o bigicon"></i>
                    </span>
                    <div class="col-md-8">
                        <label for="intro">
                            <span font-size="5px"> Introduce Info:</span>
                            <textarea class="form-control" id="intro" name="intro" value="<?php echo $intro;?>" placeholder="Introduce more about yourself" cols="70" rows="7"></textarea>
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
                    'intro': $("#intro").val().toString(),
                    'pic':   $("#picture").val().toString(),
                    'name':  "<?php echo $name; ?>",
                    'id':    "<?php echo $id; ?>",
                    'type':  "<?php echo $type; ?>"
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
     