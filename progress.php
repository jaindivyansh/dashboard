<html>
<style>
#myBar {
    width: 20%;
    height: 20px;
    background-color: red;
    text-align: center; /* To center it horizontally (if you want) */
    line-height: 30px; /* To center it vertically */
    color: white; 
}
</style>
<div id="myProgress">
  <div id="myBar"></div>
</div>
<script>
function move() {
    var elem = document.getElementById("myBar"); 
    var width = 1;
    var id = setInterval(frame, 10);
    function frame() {
        if (width >= 100) {
            clearInterval(id);
        } else {
            width++; 
            elem.style.width = width + '%'; 
        }
    }
}
</script>
</html>