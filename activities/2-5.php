<html>
<body>
<p>
    This is something...
</p>
<hr/>
<div id="mydoc">
    <p>This is an article about XYZ. If you want to know more about XYZ, click the button!</p>
    <button type="button" onclick="LoadDoc();"> Load Content </button>
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

<!--         Stock Price          -->
<hr/>
<div>
    <h2>The most recent stock price for Apple: $<span id="myprice">180</span></h2>
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
        };
        xhttp.open("GET", "AjaxAction-1.php", true);
        xhttp.send();
    }
</script>

<!--       Progress Bar     -->
<hr/>
<div>
    <h1>Loading something that takes long time: <span id="pvalue">0</span>%</h1>
    <progress min="0" max="100" id="myprogress" style="display: none;"></progress>
    <button type="button" onclick="loadInfo();" id="start">Load Info</button>
</div>

<script>
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