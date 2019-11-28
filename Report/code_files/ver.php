<script>
function checkOTP() {
    var otp = parseInt(document.getElementById("otp").value);
    var p_id = document.getElementById("demo");
    p_id.innerHTML = usn + " " + otp + " "+rd + typeof(otp) + typeof(rd);
    if(otp == rd){
        p_id.innerHTML="you have been verified your suggestion is noted we will inform you shortly of the development"
        document.getElementById("home").innerHTML='you can further browse by going back home'
    }
    else{
        p_id.innerHTML = "Invalid OTP";
        p_id.setAttribute('style',"color:red;");
    }
    function myFunction() {
        window.open("/Web-Project-master/App");
    }
}
</script>
<body>
    <div class="col-lg-8 text-center"> 
    <hr>
  <h1>enter the OTP sent to your mail</h1>
  <form  action="javascript:myFunction(); return false;">
    <label for="otp"> OTP verification code:</label>
    <input type="text" id="otp"> 
    <input type="button" onclick="checkOTP()" value = "submit">
  </form>
  <hr>
  <h3></h3>
  <p id="demo">  </p>
  <p id="home"></p>
</div>
</body>