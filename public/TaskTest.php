
<?php include("../public/header.php");
      require_once("../src/jsoniss.php");

      $response = $_GET['jwt'];
      $JWT = str_replace('"', "", $response);
      $data = TokenIssuer::getInstance()->check(trim($JWT));
    
    if($data['valid'] === TRUE && $data['type'] === 'c'){
    //do nothing. Continue page load.
    } else {
        echo '<META HTTP-EQUIV="refresh" content="1;URL=Login.php?fail=wrong-account">';
        echo "<script type='text/javascript'>document.location.href='Login.php?fail=wrong-account';</script>";
    }
    
 ?>

<div id="page"><!--TO BE REPLACED BY SERVER CONTENT--></div>

<script src="http://cdnjs.cloudflare.com/ajax/libs/moment.js/2.5.1/moment.min.js"></script>
<script src="picker.js"></script>
<script>
    $(function () {
        
        var name = "<?php echo $data['user'];?>";
        var value = { message: "fail", lang: [], loc: [], reserv: {date:"",begin:"",end:""}, tag: [], detail: "", star: "", id: name};
        var place;

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
            var select = $(this).data("toggle");
            if (!select) {
                select = true;
            } else {
                select = false;
            }
            $(this).data("toggle", select);

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
                                value.lang.push($(this).attr("value"));
                            }
                        });
                        LoadPage(2);
                    }
                    break;

                case 2:
                    {
                        $(".fullbtn").each(function (i) {
                            var select = $(this).data("toggle");
                            if (Boolean(select)) {
                                value.loc.push($(this).attr("value"));
                            };

                        });
                        LoadPage(3);
                    }
                    break;
                case 3:
                    {
                        var begin = $('#begin input').val();
                        var end = $('#end input').val();
                        var date = $('.date-picker').val();
                        value.reserv = { "begin": begin, "end": end, "date": date };
                        LoadPage(4);
                    }
                    break;
                case 4:
                    {
                        $(".fullbtn").each(function (i) {
                            var select = $(this).data("toggle");
                            if (Boolean(select)) {
                                value.tag.push($(this).attr("value"));
                            };

                        });
                        LoadPage(5);
                    }
                    break;
                case 5:
                    {
                        value.detail = $("#comment").val();

                        LoadPage(6);
                    };
                    break;
                case 6:
                    {
                        value.star = $(this).attr('id');
                        LoadPage(value.star);
                    };
                    break;
            }
        });

        $("#page").on("click", ".confirm", function (e) {
            e.preventDefault();
            value['message'] = "Submitted";
            $.ajax({
                type: "POST",
                url: "../src/TaskSubmit.php",
                data: value,
                success: function (data) {
                    
                    document.location.href = "payment.php";
                },
                failure: function (jqXHR, textStatus, error) {
                    console.log(textStatus + ": " + error);
                }
            });
        });

        $("#page").on("mouseenter", ".clockpicker", function () {
            $(this).clockpicker({
                donetext: 'Done'
            });
        });

        $("#page").on("mouseenter", ".date-picker", function () {
            $(this).datepicker();
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
