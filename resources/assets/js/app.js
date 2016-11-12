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