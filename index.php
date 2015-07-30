<!DOCTYPE html>
<html lang="en"  class="no-js">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>FJP - Feedback</title>
  <link rel="stylesheet" href="css/foundation.css">
  <script src="js/jquery-1.11.3.min.js"></script>
  <script src="js/vendor/modernizr.js"></script>
  <script>
    $( document ).ready(function() {
      $('#myform').on('valid.fndtn.abide', function() {
        var formData = $('.contacts').find('form').serializeArray();
        $.ajax({
                type: "POST",
                url: "send.php",
                data: formData,
                success: function(data){
                  if(data=='nocaptcha'){
                    $('.capterror').css('display','block');
                  } else if(data=='false'){
                    alert('An unexpected error has occurred');
                  } else {
                    var f = $('.sendform');
                    f.css('display','none');
                    $('.alert-box.success').css('display','block');
                  }
                }
              });
      });
    });
  </script>
  <link rel="stylesheet" href="css/global.css">
  <link rel="STYLESHEET" type="text/css" href="css/style.css">
  <script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>
  <div class="container row">
      <div class="skills large-11 medium-11 small-11  columns contacts">
        <div class='skillbox'>
        <div class='sendform'>
          <form class='large-12 medium-12 small-12  columns feed' data-abide="ajax" id="myform">
            <h3>FJP - Feedback:<h3>
            <div class='row'>
              <div class='large-6 medium-6 small-12  columns'>
                <input name='name' type="text" required placeholder="Name">
                <small class="error">enter your name</small>
              </div>
              <div class='large-6 medium-6 small-12  columns'>
                <input name='email' type="email" required placeholder="Email">
                <small class="error">enter a valid email (name@domain.com)</small>
              </div>
            </div>
            <textarea name='text' placeholder="Your message"></textarea>
                <div class="g-recaptcha" data-sitekey="6LeIfQoTAAAAAAswIC5XjZuB4UOF4vYf_hMhyWkS"></div>
                <small class="error capterror" style='width:300px;'>fill captcha</small>
            <button type="submit" class='button radius success sendfeed'>Submit</button>
          </form>
          </div>
          <div data-alert class="alert-box success radius" style='display:none;'>
            <h4>Message sent successfully</h4>
            </div>
        </div>
      </div>
  </div>
  <script src="js/foundation.min.js"></script>
  <script>
    $(document).foundation();
  </script>
</body>
</html>
