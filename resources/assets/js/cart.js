(function() {
    $('[data-form="cart"]').on('submit', function(event) {
        event.preventDefault();
        var $form = $( this ),
            url = $form.attr( 'action' );

        var data = {};
        $form.find('input[name]').each(function(){
            data[$(this).attr('name')] = $(this).val();
        });
        var posting = $.post( url, data );

        /* Alerts the results */
        posting.done(function( data ) {
            alert(data);
        });
    });
})();