<?php

$wrongName = "";
$wrongEmail = "";
$wrongUserName = "";
$wrongAddress = "";
$wrongBirthDate = "";
$wrongCardExpiry = "";
$wrongCardNumber = "";
$wrongCity = "";
$wrongConfPassword = "";
$wrongGender = "";
$wronggpa = "";
$wrongHomePhone = "";
$wrongMobilePhone = "";
$wrongPassword = "";
$wrongPostalCode = "";
$wrongSalary = "";
$wrongStatus = "";
$wrongURL = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (strlen($_REQUEST["name"]) < 2 or preg_match("/[0-9]/", $_REQUEST["name"])) {
        $wrongName = "<div id='errorNot'>Name should contain at least 2 chars and should not contain any number!</div>";
    }
    if (!preg_match("/[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}/", strtoupper($_REQUEST["email"]))) {
        $wrongEmail = "<div id='errorNot'>Wrong Email!!</div>";
    }
    if (strlen($_REQUEST["username"]) < 5) {
        $wrongUserName = "<div id='errorNot'>UserName should contain at least 5 chars</div>";
    }
    if (strlen($_REQUEST["password"]) < 8) {
        $wrongPassword = "<div id='errorNot'>UserName should contain at least 8 chars</div>";
    }
    if ($_REQUEST["password"] != $_REQUEST["confpassword"]) {
        $wrongConfPassword = "<div id='errorNot'>Password should match!</div>";
    }

    if (!preg_match("/[0-9]{2}\.+[0-9]{2}\.+[0-9]{4}/", $_REQUEST["birthdate"])) {
        $wrongBirthDate = "<div id='errorNot'>Birth date should be written like dd.MM.yyyy</div>";
    }

    if (!isset($_REQUEST["gender"])) {
        $wrongGender = "<div id='errorNot'>Select your gender!</div>";
    }
    if (!isset($_REQUEST["maritalstatus"])) {
        $wrongStatus = "<div id='errorNot'>Select your Marital Status!</div>";
    }
    if ($_REQUEST["address"] == "") {
        $wrongAddress = "<div id='errorNot'>It's required field!</div>";
    }
    if ($_REQUEST["city"] == "") {
        $wrongCity = "<div id='errorNot'>It's required field!</div>";
    }
    if (!preg_match("/[0-9]{6}/", $_REQUEST["postalCode"])) {
        $wrongPostalCode = "<div id='errorNot'>Postal Code should contain only 6 digits!</div>";
    }
    if (!preg_match("/[0-9]{2}+\s+[0-9]{7}/", $_REQUEST["homePhone"])) {
        $wrongHomePhone = "<div id='errorNot'>Home Phone should written like xx aaabbcc</div>";
    }
    if (!preg_match("/[0-9]{2}+\s+[0-9]{7}/", $_REQUEST["mobilePhone"])) {
        $wrongMobilePhone = "<div id='errorNot'>Mobile Phone should written like xx aaabbcc</div>";
    }
    if (!preg_match("/[0-9]{4}+\s+[0-9]{4}+\s+[0-9]{4}+\s+[0-9]{4}/", $_REQUEST["cardNumber"])) {
        $wrongCardNumber = "<div id='errorNot'>Credit Card Number should written like xxxx xxxx xxxx xxxx</div>";
    }
    if (!preg_match("/[0-9]{2}\.+[0-9]{2}\.+[0-9]{4}/", $_REQUEST["cardExpiry"])) {
        $wrongCardExpiry = "<div id='errorNot'>Card Expiry Date should be written like dd.MM.yyyy</div>";
    }
    if (!preg_match("/UZS+[0-9]{3}\.+[0-9]{2}/", $_REQUEST["salary"])) {
        $wrongSalary = "<div id='errorNot'>Salary should be written like UZS 120,200.00</div>";
    }

    if ($_REQUEST["gpa"] <= 4.5 or $_REQUEST["gpa"] >= 0) {
        $wronggpa= "<div id='errorNot'>GPA should be between 0 and 4.5</div>";
    }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Validating Forms</title>
    <link href="style.css" type="text/css" rel="stylesheet"/>
</head>

<body>
<h1>Registration Form</h1>

<p>
    This form validates user input and then displays "Thank You" page.
</p>

<hr/>

<h2>Please, fill below fields correctly</h2>
<form action="index.php" method="post">
    <dl>
        <dt>Name</dt>
        <dd>
            <input type="text" name="name"/><?= $wrongName ?>
        </dd>
        <br>
        <dt>Email</dt>
        <dd>
            <input type="text" name="email"/><?= $wrongEmail ?>
        </dd>
        <br>
        <dt>UserName</dt>
        <dd>
            <input type="text" name="username"/><?= $wrongUserName ?>
        </dd>
        <br>
        <dt>Password</dt>
        <dd>
            <input type="password" name="password"/><?= $wrongPassword ?>
        </dd>
        <br>
        <dt>Confirm Password</dt>
        <dd>
            <input type="password" name="confpassword"/><?= $wrongConfPassword ?>
        </dd>
        <br>
        <dt>Date of Birth</dt>
        <dd>
            <input size="10" maxlength="10" type="text" name="birthdate"/><?= $wrongBirthDate ?>
        </dd>
        <br>
        <dt>Gender</dt>
        <dd>
            <input value="Male" type="radio" name="gender"/><label for="Male">Male</label>
            <input value="Female" type="radio" name="gender"/><label for="Male">Female</label>
            <?= $wrongGender ?>
        </dd>
        <br>
        <dt>Marital Status</dt>
        <dd>
            <input value="Single" type="radio" name="maritalstatus"/><label for="Single">Single</label>
            <input value="Married" type="radio" name="maritalstatus"/><label for="Married">Married</label>
            <input value="Divorced" type="radio" name="maritalstatus"/><label for="Divorced">Divorced</label>
            <input value="Widowed" type="radio" name="maritalstatus"/><label for="Widowed">Widowed</label>
            <?= $wrongStatus ?>
        </dd>
        <br>
        <dt>Address*</dt>
        <dd>
            <input type="text" name="address"/>
            <?= $wrongAddress ?>
        </dd>
        <dt>City</dt>
        <dd>
            <input type="text" name="city"/>
            <?= $wrongCity ?>
        </dd>
        <dt>Postal Code</dt>
        <dd>
            <input maxlength="6" type="text" name="postalCode"/><?= $wrongPostalCode ?>
        </dd>

        <dt>Home Phone</dt>
        <dd>
            <input type="text" name="homePhone"/><?= $wrongHomePhone ?>
        </dd>

        <dt>Mobile Phone</dt>
        <dd>
            <input type="text" name="mobilePhone"/><?= $wrongMobilePhone ?>
        </dd>

        <dt>Credit Card Number</dt>
        <dd>
            <input type="text" name="cardNumber"/><?= $wrongCardNumber ?>
        </dd>

        <dt>Credit Card Expiry Date</dt>
        <dd>
            <input type="text" name="cardExpiry"/><?= $wrongCardExpiry ?>
        </dd>

        <dt>Monthly Salary</dt>
        <dd>
            <input type="text" name="salary"/><?= $wrongSalary ?>
        </dd>
        <dt>Web Site URL</dt>
        <dd>
            <input type="text" name="website"/><?= $wrongURL ?>
        </dd>

        <dt>Overall GPA</dt>
        <dd>
            <input type="text" name="gpa"/><?= $wronggpa ?>
        </dd>
    </dl>
    <div>
        <input value="Register" style="height: 50px; width: 100%" type="submit"/>
    </div>
</form>
</body>
</html>
