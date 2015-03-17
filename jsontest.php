<!DOCTYPE html>
<html>
<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
$(document).ready(function (){
    $("#button1").click(function(){       
        /* set no cache */
        $.ajaxSetup({ cache: false });
 
        $.getJSON("encodejson.php", function(data){
            var html = [];
 
            /* loop through array */
            $.each(data, function(index, d){           
                html.push(
                          "Vinyl: ", d.vinyl, "<br>",
                          "Produces: ", d.produces, "<br>",
                          "Suitable For: ", d.suitable_for, "<br>",
                          "Available In: ", d.available_in, "<br><br><br>");
            });
 
 
            $("#div1").html(html.join(''));
        }).error(function(jqXHR, textStatus, errorThrown){ /* assign handler */
            /* alert(jqXHR.responseText) */
            alert("error occurred!");
        });
    });
});
</script>
</head>
<body>

<button id="button1">Get JSON data</button>
<div id="div1"></div>

</body>
</html>
