function good() {
    var ap = document.getElementById("mytoggle");
    if (ap.type === "password") {
      ap.type = "text";
    } else {
      ap.type = "password";
    }
  }
  function bad() {
    var al = document.getElementById("mytoggle2");
    if (al.type === "password") {
      al.type = "text";
    } else {
      al.type = "password";
    }
  }