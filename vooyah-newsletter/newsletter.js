window.VOOYAH = window.VOOYAH || {};
window.VOOYAH.Newsletter = function($) {
  var $form = null;
  var $submitButton = null;
  var isReleased = true;

  function successHandler() {
    alert('Vielen Dank! Wir werden dich benachrichtigen! :)');
  }

  function errorHandler() {
    alert('Leider ist ein Fehler aufgetreten.');
  }

  function invalidHandler() {
    alert('Hoppla! Ist deine Email-Adresse korrekt?');
  }

  return {
    init: function(config) {
      $form = $('#' + config['formId']);
      $submitButton = $('#' + config['submitButtonId']);

      $submitButton.on('click', function(event) {
        event.preventDefault();

        if (isReleased) {
          isReleased = false;
          $submitButton.attr('disabled', true);

          $.ajax({
            type: 'POST',
            contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
            data: $form.serialize(),
            url: config['postUrl'],
            complete: function() {
              isReleased = true;
              $submitButton.attr('disabled', false);
            },
            success: function(data) {
              switch (data) {
                case 'OK':
                  successHandler();
                  break;
                case 'INVALID':
                  invalidHandler();
                  break;
                default:
                  errorHandler();
              }
            },
            error: errorHandler
          });
        }

        return false;
      });
    }
  };
}(jQuery);