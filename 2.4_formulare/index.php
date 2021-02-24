<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Challenge</title>
</head>
<body>
<h1>Course Sign Up Page</h1>
<p>Please note: First Name, Last Name and E-mail are Required</p>
<form>

    <div>
        <label for="first_name">First Name: </label><input type="text" id = "first_name" name="first_name" placeholder="First Name" required>
        <label for="last_name">Last Name: </label><input type="text" id = "last_name" name="last_name" placeholder="Last Name" required>

    </div>

    <br>

    <div>
        <label for="email">Email: </label><input id = "email" type="email" name="user_email" placeholder="name@email.com" required>
        <label for="user_pass">Password: </label><input id = "user_pass" type="password" name="user_pass" required>
    </div>

    <br>
    <div>
        <p>Are you over the age of 18?</p>
        <label for="yes">Yes</label><input id = "yes" value = "yes" type="radio" name="over_18">
        <label for="no">No</label><input id = "no" value = "no" type="radio" name="over_18">
    </div>

    <div>
        <p>Do you have a credit card or PayPal?</p>
        <select name="payment">
            <option value="paypal">paypal</option>
            <option value="credit_card">credit card</option>
        </select>
    </div>
    <br>
    <input type="submit" name="inscriere" value="Enroll">
</form>

</body>
</html>
