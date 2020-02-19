<html>
<head>
    <title>
        Lab 2
    </title>
</head>
<body>
<h1>Welcome to become a member of the GGC PHP Club!!!</h1>
<p>Please provide the following information for registration:</p>
<hr/>
<form action="action-lab3.php" method="post">
    Name<span style="color: red">*</span>:
    <input type="text" name="name"> <br><br>

    E-mail<span style="color: red">*</span>:
    <input type="text" name="email"> <br><br>

    Gender:
    <input type="radio" name="gender" value="Male"> Male
    <input type="radio" name="gender" value="Female"> Female
    <input type="radio" name="gender" value="Do not want to tell"> Do not want to tell <br><br>

    <hr/>

    Choose your major area of study:
    <select name="major">
        <option value="Digital Media" checked>Digital Media</option>
        <option value="Software">Software</option>
        <option value="Security">Security</option>
        <option value="Business">Business</option>
        <option value="Other">Other</option>
    </select> <br/><br>

    <hr/>

    How many years you have been a member of the GGC PHP Club:
    <input type="text" name="years"> <br/>
    (If you have been a member for more than 3 years, your annual membership fee is 30% off)<br/><br>
    <hr/>
    What type of membership you would like to be:
    <input type="radio" value="VIP" name="vip">VIP
    <input type="radio" value="Regular" name="vip">Regular
    <br/>
    (If you choose VIP, your annual membership fee is $200.00, otherwise it is $100)<br/><br>
    <hr/>

    <input type="submit" name="submit" value="Register">
    <input type="reset">
</form>


</body>
</html>