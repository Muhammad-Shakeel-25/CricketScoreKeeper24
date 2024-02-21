function checkEmail(email) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("emailStatus").innerHTML = this.responseText; // Output the response from the server
          // You can handle the response here, such as displaying a message to the user
      
      if(this.responseText==="Email exists > Simply Login")
      {
        document.getElementById("submitButton").value = "Login";
        document.getElementById("loginForm").action="user.php?login=yes";
      }
      else
      {
        document.getElementById("submitButton").value = "Register";
        document.getElementById("loginForm").action="user.php?register=yes";
      }
      
      
        }
  };
  xhttp.open("GET", "user.php?check_email=" + encodeURIComponent(email), true);
  xhttp.send();
}