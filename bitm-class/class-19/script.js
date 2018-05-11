$('#first_name').blur(function () {
    var firstNameValue = $('#first_name').val();
    if(firstNameValue.length <10 || firstNameValue.length >20) {
        $('#first_name_error').text('First Name must be between 10 to 20 character');
    } else {
        $('#first_name_error').text(' ');
    }
});


$('#form').submit(function () {
    
});
















//$('#btn').click(function () {
//    var result = $('input[type="checkbox"]:checked');
//    if(result.length > 0) {
//        var checkedItem = result.length;
//        $('#res').html (checkedItem+ ' Checkbox is selected');
//        var value=' ';
//        result.each(function () {
//             value += $(this).val()+'<br/>';
//             $('#res2').html(value);
//        });
//         
//        
//    } else {
//        $('#res').html('No Checkbox is selected');
//    }
//    
//});







//
//
////$('input[type="email"]').each(function () {
//    alert( $(this).val() ); 
//});




//$(':input').each(function () {
//    alert( $(this).val() ); 
//});

//$('input').each(function () {
//    alert( $(this).val() ); 
//});





//$('#divTwo .demo').css('background-color', 'red');
////$('table td').each(function () {
//    alert( $(this).text() );
//});





//$('div').css('background-color', 'red');

////$('#divOne').css('border', '1px solid red');
//
//$('.demo').css({
//    'color': 'red',
//    'font-size': '20px',
//    'background-color' : 'black'
//});

//alert( $('table').html() );
//alert( $('table').text() );








