<!DOCTYPE html>
<html>
  <head>
    <title>TODO supply a title</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
  </head>
  <body>
    <form action="#" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate="">
      <input id="mce-EMAIL" type="email" value="" name="EMAIL" class="email-newsletter" placeholder="Deine Email Adresse" required="">
      <input id="mc-embedded-subscribe" type="submit" value="Ich bin dabei" name="subscribe" class="button-newsletter">
      <p class="subscribe-now">* Teste unsere App <strong class="yellow-txt">exklusiv vor allen anderen</strong>. </p>
    </form>
    <script src="http://code.jquery.com/jquery-2.0.3.min.js"></script>
    <script src="newsletter.js"></script>
    <script>
      jQuery(window).load(function($) {
        VOOYAH.Newsletter.init({
          formId: 'mc-embedded-subscribe-form',
          submitButtonId: 'mc-embedded-subscribe',
          postUrl: './newsletter.php'
        });
      });
    </script>
  </body>