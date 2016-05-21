
    var lang = new Array();
    var loc = new Array();
    var reserv = new Array();
    var tag = new Array();

    var value = { message: "failure", lang: lang }

    $(function () {
		$(".check").hide();
		
        var place = "1"
        $(".fullbtn").click(function () {
            var which = $(this).attr("value");
            $("div#" + which + " img").toggle();
            select = $(this).data("toggle");

            if (!select) {
                select = true;
            } else {
                select = false;
            }
            $(this).data("toggle", select);
            //alert($(this).data("toggle"));

        });

        $("#next").click(function () {
            //do nothing
        })
    });


