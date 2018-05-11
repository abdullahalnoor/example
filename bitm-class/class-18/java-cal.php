<table>
    <tr>
        <td>First Number</td>
        <td><input type="number" id="first_number"></td>
    </tr>
    <tr>
        <td>Second Number</td>
        <td><input type="number" id="second_number"></td>
    </tr>
    <tr>
        <td>Result</td>
        <td><input type="text" id="result"></td>
    </tr>
    <tr>
        <td></td>
        <td>
            <input type="button" id="addition" value="+" onclick="myCalculator('+'); ">
            <input type="button" id="subtraction" value="-" onclick="myCalculator('-'); ">
            <input type="button" id="mutliplication" value="*">
            <input type="button" id="division" value="/">
            <input type="button" id="remiender" value="%">
        </td>
    </tr>
</table>
<script>
    function myCalculator(operator) {
        var firstNumber = Number(document.getElementById('first_number').value);
        var secondNumber = Number(document.getElementById('second_number').value);
        switch (operator) {
            case '+' :
                var result = firstNumber + secondNumber;
                break;
            case '-' :
                var result = firstNumber - secondNumber;
                break;
            case '*' :
                var result = firstNumber * secondNumber;
                break;
        }
        document.getElementById('result').value = result;
    }





//    var additionBtn = document.getElementById('addition');
//    var subtractionBtn = document.getElementById('subtraction');
//    
//    additionBtn.onclick = function () {
//        var firstNumber = document.getElementById('first_number').value;
//        var secondNumber = document.getElementById('second_number').value;
//        
//        var result = Number(firstNumber) + Number(secondNumber);
//        document.getElementById('result').value = result;
//    };
//    
//    subtractionBtn.onclick = function () {
//        var firstNumber = document.getElementById('first_number').value;
//        var secondNumber = document.getElementById('second_number').value;
//        
//        var result = Number(firstNumber) + Number(secondNumber);
//        document.getElementById('result').value = result;
//    };






</script>