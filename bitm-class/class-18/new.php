<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <title>JQuery Basic</title>
    </head>
    <body>
        <h1>Hello World</h1>
        <table>
            <tr>
                <td>First Name</td>
                <td><input type="text" id="first_name"></td>
            </tr>
            <tr>
                <td>Last Name</td>
                <td><input type="text" id="last_name"></td>
            </tr>
            <tr>
                <td id="a">Full Name</td>
                <td id="res">
                    
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="button" id="btn" value="SubmiT"></td>
            </tr>
        </table>
        <script src="jquery-3.2.1.js"></script>
        
        <script>
            $('#btn').click(function () { 
                var firstName = $('#first_name').val();
                var lastName = $('#last_name').val();
                var fullName = firstName+' '+lastName;
                //$('#full_name').val(fullName);
//                $('#res').html(fullName);
                //$('#res').text(fullName);
                $('#a').css('color', 'red');
            });
        
        
        
        </script>




    </body>
</html>