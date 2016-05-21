
<?php include("../public/header.php");
      require_once("../src/jsoniss.php");

      $response = $_GET['jwt'];
      $data = TokenIssuer::getInstance()->check(trim($response));
    
    if($data['valid'] === TRUE && $data['type'] === 'c'){
    //do nothing. Continue page load.
    } else {
        #echo '<META HTTP-EQUIV="refresh" content="1;URL=../Login.php">';
       # echo "<script type='text/javascript'>document.location.href='../Login.php';</script>";
    }
    
 ?>

<div id="page"><!--TO BE REPLACED BY SERVER CONTENT--></div>
<?php var_dump($data);
        var_dump($_POST);?>
<script src="http://cdnjs.cloudflare.com/ajax/libs/moment.js/2.5.1/moment.min.js"></script>
<script src="picker.js"></script>
<script>
    $(function () {
        var lang = new Array;
        var loc = new Array;
        var reserv = {};
        var tag = new Array;
        var detail = null;
        var star = null;

        var value = { message: "fail", "lang": lang, "loc": loc, "reserv": reserv, "tag": tag, "detail": detail, "star": star, "id": null };

        var place = null;

        function LoadPage(newPlace) {
            $("#page").load("PageDoc.html .page" + newPlace, function (responseTxt, statusTxt, xhr) {
                if (statusTxt == "error") {
                    $("page").html("<h2>Server Error. Page Failed to Load.</h2><br /><h3>Please try again later.<br/>" + xhr.status + ": " + xhr.statusText + "</h3>");
                } else {
                    place = newPlace;
                    $(".check").hide();
                }
            });
        }

        //Full btn toggle 
        $("#page").on("click", ".fullbtn", function () {
            var which = $(this).attr("value");
            $("div#" + which + " img").toggle();
            select = $(this).data("toggle");
            if (!select) {
                select = true;
            } else {
                select = false;
            }
            $(this).data("toggle", select);
            console.log(select);
        });

        //Initial Load.
        if (place == null) {
            LoadPage(1);
        };

        //Next page event
        $("#page").on("click", ".next", function () {
            switch (place) {
                case 1:
                    {
                        $(".fullbtn").each(function (i) {
                            var select = $(this).data("toggle");
                            if (Boolean(select)) {
                                lang.push($(this).attr("value"));
                            }
                        });
                        LoadPage(2);
                        console.log(lang.toString());
                    }
                    break;

                case 2:
                    {
                        $(".fullbtn").each(function (i) {
                            var select = $(this).data("toggle");
                            if (Boolean(select)) {
                                loc.push($(this).attr("value"));
                            };

                        });
                        LoadPage(3);
                        console.log(loc.toString());
                    }
                    break;
                case 3:
                    {
                        var begin = $('#begin input').val();
                        var end = $('#end input').val();
                        var date = $('.date-picker').data("date");
                        reserv = { "begin": begin, "end": end, "date": date };
                        LoadPage(4);
                        console.log(reserv.toString());
                    }
                    break;
                case 4:
                    {
                        $(".fullbtn").each(function (i) {
                            var select = $(this).data("toggle");
                            if (Boolean(select)) {
                                tag.push($(this).attr("value"));
                            };

                        });
                        LoadPage(5);
                        console.log(tag.toString());
                    }
                    break;
                case 5:
                    {
                        detail = $("#comment").val();

                        LoadPage(6);
                        console.log(detail.toString());
                    };
                    break;
                case 6:
                    {
                        star = $(this).attr('id');
                        LoadPage(star);
                        console.log(star.toString());
                    };
                    break;
            }
        });
        $("#page").each(".clockpicker", function() {
            $(this).clockpicker({
				    donetext: 'Done'});
        });
        
        $("#page").on("click", ".prev", function () {
            if (place <= 1) {
                window.location.href = "javascript:history.back()";
            } else if (place.toString().slice(0, 5) == 'star') {
                LoadPage(6);
            } else {
                LoadPage(place - 1);
            }
        });
    });
</script>
<script type="text/javascript" src="Script.js"></script>
<?php require_once("../footer.php"); ?>