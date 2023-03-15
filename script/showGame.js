function showGame(str) {
    if (str == "") {
      document.getElementById("game-search").innerHTML = "";
      return;
    } else {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("game-search").innerHTML = this.responseText;
        }
      };
      xmlhttp.open("GET","../controllers/controller_searchBar.php?q="+str,true);
      xmlhttp.send();
    }
}