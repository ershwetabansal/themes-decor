
/**
 * Object for enabling a modal box.
 *
 * @param box
 * @returns {{show: Function, showProtected: Function, hide: Function, showErrorResponse: Function, showErrorArray: Function, showErrorMessage: Function, showSuccessResponse: Function, initialize: Function}}
 * @constructor
 */
function Modal(box)
{
    var error = box.find('#error');
    var success = box.find('#success');
    var processBtn = box.find('#process-btn');

    return {
        show : function()
        {
            box.modal({
                show: true
            });
        },
        showProtected : function()
        {
            box.modal({
                show: true,
                backdrop: 'static',
                keyboard: false
            });
        },
        hide : function()
        {
            box.modal('hide');
        },
        showErrorResponse : function(messages, isJson)
        {
            show(processBtn);
            show(error);
            hide(success);
            error.find('ul').empty();

            if (isJson) {
                for (var key in messages) {
                    if (messages[key].length > 0) {
                        for (var i = 0, len = messages[key].length; i < len; i++) {
                            var message = messages[key][i];
                            error.find('ul').append('<li>'+message+'</li>');
                        }
                    }
                }
            } else {
                error.find('ul').append('<li>Internal server error</li>');
            }
        },
        showErrorArray : function(messages)
        {
            show(error);
            hide(success);
            error.find('ul').empty();
            for (var i = 0, len = messages.length; i < len; i++) {
                var message = messages[i];
                error.find('ul').append('<li>'+message+'</li');
            }
        },
        showErrorMessage : function(message)
        {
            show(error);
            hide(success);
            error.find('ul').empty();
            error.find('ul').append('<li>'+message+'</li');
        },
        showSuccessResponse : function(response)
        {
            if (response.success) {
                hide(error);
                show(success);
                success.text(response.result);
                box.find('[data-dismiss="modal"]').text('Close');
            }
        },
        initialize : function()
        {
            show(processBtn);
            hide(error);
            hide(success);
        }
    }
}

/**
 * Show an element.
 *
 * @param element
 */
function show(element)
{
    element.removeClass('hidden');
}

/**
 * Hide an element.
 *
 * @param element
 */
function hide(element)
{
    element.addClass('hidden');
}

/**
 * Validate all the required fields on the page before submitting the form.
 * The fields should have 'data-required="true"' and "data-name" attributes.
 *
 * @param page
 * @returns {boolean}
 */
function validateRequiredFields(page)
{
    var valid = true;
    var fields = [];

    page.find('[data-required="true"]').each(function() {
        if (!$(this).val()) {
            valid = false;
            fields.push($(this).attr('data-name') + ' is required.');
        }
    });

    return valid == true ? true : fields;
}

/**
 * Disable the view and start loading bar on processing start.
 *
 * @param box
 */
function onStartProcessingInModal(box)
{
    hide(box.find('#process-btn'));
    box.addClass('disable-view');
    show(box.find('#loading'));
}

/**
 * Enable the view and stop loading bar on processing start.
 *
 * @param box
 */
function onStopProcessingInModal(box)
{
    box.removeClass('disable-view');
    hide(box.find('#loading'));
}


/**
 * Show a general confirmation modal box and submit a form if user clicks Okay.
 *
 * @param button
 */
(function() {
    $('[data-modal="confirmation"]').each(function() {
       showConfirmationModalBox($(this));
    });

    function showConfirmationModalBox(button)
    {
        var confirmationBox = $('#confirmation-modal-box');
        var modal = new Modal(confirmationBox);

        button.off('click');
        button.on('click', function() {
            confirmationBox.find('#message').text($(this).attr('data-message'));
            modal.initialize();
            modal.show();

            confirmationBox.find('#process-btn').off('click');
            confirmationBox.find('#process-btn').on('click', function() {
                onStartProcessingInModal(confirmationBox);
                document.getElementById(button.data('form')).submit();
            });
        });

    }
})();


/**
 * Display modal box when clicked on login button
 */
(function() {

    $('[data-modal="login"]').each(function() {
        showModalBox($(this));
    });

    function showModalBox(button)
    {
        var confirmationBox = $('#login-overlay');
        var modal = new Modal(confirmationBox);

        button.off('click');
        button.on('click', function() {
            modal.initialize();
            modal.show();
            return false;
        });

    }
})();