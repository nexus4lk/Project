var HttPRequest = false;
if (window.XMLHttpRequest) { // Mozilla, Safari,...
  HttPRequest = new XMLHttpRequest();
  if (HttPRequest.overrideMimeType) {
    HttPRequest.overrideMimeType('text/html');
  }
} else if (window.ActiveXObject) { // IE
  try {
    HttPRequest = new ActiveXObject("Msxml2.XMLHTTP");
  } catch (e) {
    try {
      HttPRequest = new ActiveXObject("Microsoft.XMLHTTP");
    } catch (e) {}
  }
}

function callAjax(Mode, URL, Note) {
  if (!HttPRequest) {
    alert('Cannot create XMLHTTP instance');
    return false;
  }
  var url = URL+".php";
  alert(url);

  if (Mode == 'LOGIN') { //login case /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    if (document.getElementById("txt_login_username").value == "" || document.getElementById("txt_login_password").value == "") {

      alert("กรุณากรอก username และ password");
      document.getElementById("txt_login_username").focus();
      return false;
    }
    var pmeters = "tUsername=" + encodeURI(document.getElementById("txt_login_username").value) +
      "&tPassword=" + encodeURI(document.getElementById("txt_login_password").value) +
      "&tMode=" + Mode +
      "&turl=" + URL +
      "&tNote=" + Note;
  // } else if (Mode == 'REG') { //Register case /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  //   if (document.getElementById("txtUsername").value == "") {
  //
  //     alert("กรุณากรอก username");
  //     document.getElementById("txtUsername").focus();
  //     return false;
  //   }
  //   if (document.getElementById("txtPassword").value == "") {
  //
  //     alert("กรุณากรอก Password");
  //     document.getElementById("txtPassword").focus();
  //     return false;
  //   }
  //   if (document.getElementById("txtConPassword").value == "") {
  //
  //     alert("กรุณากรอก Password ครั้งที่สอง ");
  //     document.getElementById("txtConPassword").focus();
  //     return false;
  //   }
  //   if (document.getElementById("txtfname").value == "") {
  //
  //     alert("กรุณากรอกชื่อจริง ");
  //     document.getElementById("txtfname").focus();
  //     return false;
  //   }
  //   if (document.getElementById("txtlname").value == "") {
  //
  //     alert("กรุณากรอกนามสกุล");
  //     document.getElementById("txtlname").focus();
  //     return false;
  //   }
  //   if (document.getElementById("txtemail").value == "") {
  //
  //     alert("กรุณากรอกอีเมล ");
  //     document.getElementById("txtemail").focus();
  //     return false;
  //   }
  //   var pmeters = "tRUsername=" + encodeURI(document.getElementById("txtUsername").value) +
  //     "&tRPassword=" + encodeURI(document.getElementById("txtPassword").value) +
  //     "&tRConPassword=" + encodeURI(document.getElementById("txtConPassword").value) +
  //     "&tfname=" + encodeURI(document.getElementById("txtfname").value) +
  //     "&tlname=" + encodeURI(document.getElementById("txtlname").value) +
  //     "&temail=" + encodeURI(document.getElementById("txtemail").value) +
  //     "&tMode=" + Mode +
  //     "&turl=" + URL +
  //     "&tNote=" + Note;
  // }
  //
  //HttPRequest  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

  HttPRequest.open("POST",url,true);
  HttPRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  HttPRequest.setRequestHeader("Content-length", pmeters.length);
  HttPRequest.setRequestHeader("Connection", "close");
  HttPRequest.send(pmeters);

  HttPRequest.onreadystatechange = function() {

    if (HttPRequest.readyState == 3) // Loading Request
    {
      document.getElementById(NOTE).innerHTML = "Now is Loading...";
    }

    if (HttPRequest.readyState == 4) // Return Request
    {
      document.getElementById(NOTE).innerHTML = HttPRequest.responseText;
    }
  }
}
