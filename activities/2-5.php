<html>
<body>
<p>
    This is something...
</p>
<hr/>
<div id="mydoc">
    <p>This is an article about XYZ. If you want to know more about XYZ, click the button!
    </p><button type="button" onclick="LoadDoc();">
        Load Content
    </button>
</div>

<script>
    function LoadDoc() {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if(this.readyState == 4 && this.status == 200) {
                document.getElementById("mydoc").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "AjaxFile.txt", true);
        xhttp.send();
    }

</script>

<?php
    $cp = $_GET['cp'];
    $cp += rand(0,2);
    if($cp > 100) $cp = 100;
    echo $cp;
?>

<!--         Stock Price          -->
<hr/>
<div>
    <h2>The most recent stock price for Apple: $<span id="myprice">100</span></h2>
<!--    <button type="button" onclick="loadPrice();">Get Price</button>-->
</div>

<script>
    var alarm1 = setInterval(loadPrice, 1000);
    function loadPrice() {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if(this.readyState == 4 && this.status == 200) {
                document.getElementById("myprice").innerHTML = this.responseText;
            }
        }
        xhttp.open("GET", "AjaxAction-1.php", true);
        xhttp.send();
    }

    var alarm2;
    function loadInfo() {
        alarm2 = setInterval(showProgress, 500);
    }

    function showProgress() {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if(this.readyState == 4 && this.status == 200) {
                document.getElementById("pvalue").innerHTML = this.responseText;
            }
        };

        var p = document.getElementById("pvalue").innerHTML;
        xhttp.open("GET", "AjaxAction-2.php?cp="+p,true);
        xhttp.send();

        if(p>=100) clearInterval(alarm2);
        document.getElementById("myprogress").style.display = "block";
        document.getElementById("myprogress").value = p;
    }
</script>


</body>
</html>