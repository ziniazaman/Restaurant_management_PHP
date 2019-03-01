
<html>

<form action=""> 
<table>
<tr><td>
SEARCH :<input style="height:35px;width:155px;margin-left:10px;" type="text" onkeyup="showCustomer(this.value)"/>
</td></tr>
</table>
</form>
<br>
<div id="txtHint" style="margin-left:24px;"></div>

<script>
function showCustomer(str) {
  var xhttp;    //http://www.w3schools.com/graphics/game_intro.asp
  if (str == "") {
    document.getElementById("txtHint").innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("txtHint").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "getresp.php?q="+str, true);
  xhttp.send();
}
</script>

</body>
</html>