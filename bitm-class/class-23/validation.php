<form action="" method="POST" id="registrationForm">
    <table>
        <tr>
            <td>First Name</td>
            <td> <input type="text" id="firstName"> <span id="fnError" style="color: red;"></span></td>
        </tr>
        <tr>
            <td>Last Name</td>
            <td>  <input type="text" id="lastName"> <span id="lnError" style="color: red;"></span>  </td>
        </tr>
        <tr>
            <td>Email Address</td>
            <td>  <input type="email" id="emailAddress"><span id="eaError" style="color: red;"></span> </td>
        </tr>
        <tr>
            <td>Password</td>
            <td>  <input type="password" id="password"><span id="paError" style="color: red;"></span> </td>
        </tr>
        <tr>
            <td>Confirm Password</td>
            <td>  <input type="password" id="confirmPassword"><span id="cpError" style="color: red;"></span> </td>
        </tr>
        <tr>
            <td>Gender</td>
            <td>  
                <input type="radio" id="male" name="gender" value="male"> Male
                <input type="radio" id="female" name="gender" value="female"> Female
            </td>
        </tr>
        <tr>
            <td>Skills</td>
            <td>  
                <input type="checkbox" id="html" name="html" value="html"> HTML
                <input type="checkbox" id="css" name="css" value="css"> CSS
                <input type="checkbox" id="js" name="js" value="js"> JS
                <input type="checkbox" id="php" name="php" value="php"> PHP
            </td>
        </tr>
        <tr>
            <td></td>
            <td> <input type="submit" id="btn" name="btn" value="SubmiT"> </td>
        </tr>
    </table>
</form>
<script src="jquery-3.2.1.js"></script>
<script src="script.js"></script>

