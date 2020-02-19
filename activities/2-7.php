<html>
<head>
    <style>
        .hint:hover{
            background-color: lightblue;
        }
    </style>
</head>
<body>
<!-------------busy processing ----------->
<p>Click the following button to do something that takes long time:</p>
<img src="../img/loading.gif" alt="Loading" id="myimg" width="200" height="200" style="display: none"> <br><br>
<button id="mybutton" onclick="showBusy()">Start the job</button>
<script>
    function showBusy() {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if(this.readyState < 4) {
                document.getElementById("myimg").style.display = "inline";
                document.getElementById("mybutton").disabled = true;
                document.getElementById("mybutton").innerHTML = "Processing request";
            }

            if(this.readyState == 4 && this.status == 200) {
                document.getElementById('myimg').style.display = "none";
                document.getElementById('myimg').innerHTML = this.responseText;

                document.getElementById("myimg").style.display = "none";
                document.getElementById("mybutton").disabled = false;
                document.getElementById("mybutton").innerHTML = "Start the job";
            }
        };
        xhttp.open("GET","busyProcessing.php?q="+Math.floor(Math.round()*1000), true);
        xhttp.send();
    }
</script>

<!------------Hint(suggestion) words-->
<hr>
<p>Start typing a name in the input box below: </p>
<span style="float:left">First Name: </span>
<div style="float:left">
    <input type="text" onkeyup="showHint(this.value);" id="myinput" autocomplete="off">
    <div style="border: 1px black solid; height: 120px; display: none;" id=hint></div>
</div>

<script>
    function showHint(str) {
        var inputBox = document.getElementById('hint');

        if(str.length === 0) {
            document.getElementById('hint').innerHTML = "";
            return;
        } else {
            var xhttp = new XMLHttpRequest();

            xhttp.onreadystatechange = function() {
                if(this.readyState === 4 && this.status === 200) {
                    var result = this.responseText; //response that contains the hint
                    if(result !== "") {
                        inputBox.style.display = "block";
                    } else {
                        inputBox.style.display = "none";
                    }
                    inputBox.innerHTML = result;
                }

                document.addEventListener('click', function(event) {
                    var isClickInside = inputBox.contains(event.target);

                    if (!isClickInside) {
                        //the click was outside the specifiedElement, do something
                        inputBox.style.display = "none";
                    }
                    else {
                        inputBox.style.display = "block";
                    }
                });

            };
            xhttp.open("GET","getHint.php?q="+str, true);
            xhttp.send();
        }
    }

    function selectMe(value){
        document.getElementById('myinput').value = value;
        document.getElementById('hint').style.display = "none";
    }


</script>

</body>
</html>