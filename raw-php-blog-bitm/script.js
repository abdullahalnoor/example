$(document).ready(function () { 
    
    $('#firstName').keyup(function () {
        var firstNameValue = $(this).val();
        if(firstNameValue.length < 8 || firstNameValue.length > 15) {
            $('#fnError').text('First name should be between 8 to 15 character');
        } else {
            $('#fnError').text( ' ');
        }
    });
    
    
    $('#confirmPassword').keyup(function () {
       var passwordValue= $(this).val(); 
       var confirmPasswordValue= $('#password').val(); 
       if(passwordValue == confirmPasswordValue) {
           $('#cpError').text( ' ');
       } else {
           $('#cpError').text( 'Password and confirm password are not same ');
       }
    });
    
    
    
    
    
    $('#registrationForm').submit(function () {
        return true;
    });
});