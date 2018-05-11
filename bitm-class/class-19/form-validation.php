<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8"/>
        <title>J?Query Form Validation</title>
    </head>
    <body>
        <form action="jquery.php" method="POST" id="form">
            <table>
                <tr>
                    <td>First Name</td>
                    <td>
                        <input type="text" id="first_name">
                        <span id="first_name_error" style="color: red;"></span>
                    </td>
                </tr>
                <tr>
                    <td>Last Name</td>
                    <td>
                        <input type="text" id="last_name">
                        <span id="last_name_error"></span>
                    </td>
                </tr>
                <tr>
                    <td>Email Address</td>
                    <td>
                        <input type="email" id="email_address">
                        <span id="email_address_error" style="color: red;"></span>
                    </td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td>
                        <input type="password" id="password">
                        <span id="password_error"></span>
                    </td>
                </tr>
                <tr>
                    <td>Confirm Password</td>
                    <td>
                        <input type="password" id="confirm_password">
                        <span id="confirm_password_error"></span>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" id="btn" value="SubmiT"></td>
                </tr>
            </table>
        </form>
        
        
        <script src="jquery-3.2.1.js"></script>
        <script src="script.js"></script>
        
    </body>
</html>