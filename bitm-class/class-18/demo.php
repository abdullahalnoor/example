<style>
    .main-div{
        height: 350px;
        width: 400px;
        border: 1px solid;
    }

</style>

<button type="button" id="blackBtn">Black</button>
<button type="button" id="redBtn">Red</button>
<button type="button" id="greenBtn">Green</button>
<button type="button" id="defaultBtn">Default</button>
<div class="main-div" id="mainDiv"></div>

<script>
    
    var blackBtnElement = document.getElementById('blackBtn');
    blackBtnElement.onclick = function () {
        var mainDiv = document.getElementById('mainDiv');
        mainDiv.style.backgroundColor = 'black';
    };
    
    var redBtnElement = document.getElementById('redBtn');
    redBtnElement.onclick = function () {
        var mainDiv = document.getElementById('mainDiv');
        mainDiv.style.backgroundColor = 'red';
    };

</script>