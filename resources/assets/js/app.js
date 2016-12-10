/**
 * Make post request.
 *
 * @param url
 * @param params
 * @param onsuccess
 * @param onfailure
 */
function makePostRequest(url, params, onsuccess, onfailure)
{
    $.ajax({
        url: url,
        method: 'POST',
        data: params,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
            if (onsuccess) onsuccess(response);
        },
        error: function(response) {
            if (onfailure) {
                console.log(response.responseJSON);
                (response && response.responseJSON) ? onfailure(response.responseJSON, true) :
                    onfailure(response, false);
            }
        }
    });
}

/**
 * Returns slugified text with the given separator and uses '-' if no separator is present
 * @param text
 * @param separator
 * @returns {string}
 */
function slugify(text, separator)
{
    separator = separator || "-";

    return text.toLowerCase()
        .trim()                                                                 // Trim string to remove
        // leading and trailing spaces
        .replace(new RegExp(" & ","g"), ' and ')                                // Replace ampersand with 'and'
        .replace(new RegExp("\\s+","g"), separator)                             // Replace spaces with separator
        .replace(new RegExp("[^\\a-zA-Z0-9\\"+separator+"]", "g"), "")          // Remove all non-alpha numeric characters
        // other than separator
        .replace(new RegExp("\\"+separator+"\\"+separator+"+","g"), separator)  // Replace multiple separator with single
        .replace(new RegExp("^[\\"+separator+"]", "g"), "")                     // Remove all leading separators
        .replace(new RegExp("(\\"+separator+"$)", "g"), "")                     // Remove all trailing separators
        ;

}

/**
 * Update slug when name is added.
 */
(function() {
    $('[data-action="update_slug"]').change(function () {
        var updateField = $(this).data('update');
        $('[data-type="'+updateField+'"]').val(slugify($(this).val()));
    });
})();

/**
 * Script to handle hash for tab views.
 */
(function () {
    var hash = window.location.hash;
    hash && $('ul#sidebar.nav a[href="' + hash + '"]').tab('show');

    $('#sidebar.nav-pills a').click(function (e) {
        window.location.hash = this.hash;
        $('html,body').scrollTop(1);
    });

})();

(function () {
    balloonRide($('#balloons_1'), 10000);
    balloonRide($('#balloons_2'), 6000);
    balloonRide($('#balloons_3'), 8000);
    balloonRide($('#balloons_4'), 9000);
})();

function balloonRide(targetElement, speed)
{
    targetElement.css({top: '500px' });
    targetElement.animate(
        {
            'top': -200
        }, 
        { 
            duration: speed, 
            complete: function(){
                balloonRide($(this), speed);
            }
        }
    );    
}

(function() {
    $('[data-type="image-mini"]').click(function () {
        $('[data-type="'+$(this).data('update')+'"]').attr('src', $(this).attr('src'));
    });
})();

(function () {
    $('[data-toggle="list-carousel"]').each(function () {
        var carousel = $(this);
        console.log("hello");

        $('[data-slide="next"]').click(function() {
            hideFirstInViewPort();
        });

        $('[data-slide="prev"]').click(function() {
            showPreviousInViewPort();
        });

        var listItems = carousel.find('ul').find('li');

        function hideFirstInViewPort() {

            listItems.each(function(index) {
                if (elementInViewport($(this).get(0))) {
                    if (listItems.length -1 != index) {
                        $(this).addClass('hidden'); 
                        $('[data-slide="prev"]').removeClass('disabled');                       
                    } else {
                        $('[data-slide="next"]').addClass('disabled');
                    }
                    return false;
                }
            });
        }
        function showPreviousInViewPort() {
            var firstInView = false;
            var lastOne;
            listItems.each(function(index) {
                if (elementInViewport($(this).get(0))) {
                    if (lastOne) {
                        lastOne.removeClass('hidden');
                        if (index == 1) {
                            $('[data-slide="prev"]').addClass('disabled');
                        }
                        $('[data-slide="next"]').removeClass('disabled');       
                    }
                    return false;
                } 
                lastOne = $(this);
            });
        }
    });
})();

function elementInViewport(el) {
  var top = el.offsetTop;
  var left = el.offsetLeft;
  var width = el.offsetWidth;
  var height = el.offsetHeight;

  while(el.offsetParent) {
    el = el.offsetParent;
    top += el.offsetTop;
    left += el.offsetLeft;
  }

  return (
    top < (window.pageYOffset + window.innerHeight) &&
    left < (window.pageXOffset + window.innerWidth) &&
    (top + height) > window.pageYOffset &&
    (left + width) > window.pageXOffset
  );
}