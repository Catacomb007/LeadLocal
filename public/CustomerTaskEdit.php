

<?php include("../public/header.php"); ?>
<?php
require_once('../src/DBConnector.php');
require_once("../src/jsoniss.php");

$db = DBConnector::getInstance();

$sql = "SELECT * FROM task WHERE id=1";
$result = $db->query($sql);
$id = $result[0]['ID'];
$lang = $result[0]['lang'];
$loc = $result[0]['loc'];
$reserv=$result[0]['reserv'];
$tag=$result[0]['tag'];
$detail=$result[0]['detail'];
$los = $result[0]['los'];
$tourist = $result[0]['tourist'];
$type=$result[0]['type'];
$pic = $result[0]['pic'];

$sql2 = "SELECT * FROM tourist WHERE id=1";
$touristDB = $db->query($sql2);
$touristName=$touristDB[0]['username'];

?>   
<script>
</script>	   
<br>

<div class="container">

    <div class="col-sm-12 col-xs-12 lead"><h2><?php echo $touristName; ?>'s task </h2></div>
   
    <div class="col-sm-12">
    <div class="col-xs-12 col-sm-12">

        <form id="profileEditer" class="form-horizontal" action="../src/ProfileEditer.php" method="post">
            <fieldset>
               
                   <div class="form-group">
                    <label for="lang">   
                        <span class="col-md-1 col-md-offset-2 text-center">
                            <i class="fa fa-language fa-2x"></i>
                            &nbsp;&nbsp;<span font-size="5px">Language</span> 
                        </span>
                    </label>
                    <div class="col-md-8">
                        <input id="lang" name="lanuage" type="text" placeholder="EN,ZH,FR...." class="form-control" >
                    </div>
                </div>
                        

                <div class="form-group">
                    <label for="loc">	
                         <span class="col-md-1 col-md-offset-2 text-center">
                            <i class="fa fa-map-marker fa-2x"></i>
                            &nbsp;&nbsp;<span font-size="5px"> location</span>
                        </span> 
                    </label>
                   <div class="col-md-8">
                        <input id="loc" name="loc" type="text" placeholder="DT,BBY,SRY..." class="form-control" >
                    </div>
                </div>
                <div class="form-group">
                    <label for="reserv">
                         <span class="col-md-1 col-md-offset-2 text-center">
                            <i class="fa fa-clock-o bigicon" ></i>&nbsp;&nbsp;
                            <span font-size="5px"> reservation</span>
                        </span>
                    </label>
                   <div class="col-md-8">
                        <input id="reserv" name="reserv" type="text" placeholder="example 10:30-15:30" class="form-control" >
                    </div>
                </div>
                <div class="form-group">
                    <label for="tag">
                         <span class="col-md-1 col-md-offset-2 text-center">
                            <i class="fa fa-tag bigicon"></i>&nbsp;&nbsp;
                            <span font-size="5px"> Interested Tags</span>
                        </span>
                    </label>
                   <div class="col-md-8">
                        <input id="tag" name="tag" type="text" placeholder="#nightclub, #localfood" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                     <span class="col-md-1 col-md-offset-2 text-center">
                        <i class="fa fa-pencil-square-o bigicon"></i>
                    </span>
                   <div class="col-md-8">
                        <label for="detail">
                            <span font-size="5px">Detail of Trip:</span>
                            <textarea class="form-control" id="detail" name="detail" placeholder="Introduce more about the trip" cols="70" rows="7"></textarea>
                        </label>
                    </div>
                </div>



                <div class="form-group">
                    <div class="col-xs-12 col-sm-12 text-center">
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
                    //'ID': $("#id").val().toString(),
                    'lang': $("#lang").val().toString(),
                    'loc': $("#loc").val().toString(),
                    'reserv': $("#reserv").val().toString(),
                    'tag': $("#tag").val().toString(),
                    'detail': $("#detail").val().toString(),
                    'touristName':"<?php echo $touristName ?>",
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
     