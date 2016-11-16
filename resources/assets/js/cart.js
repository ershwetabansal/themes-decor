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
            console.log(data);
            $('[data-type="cart_items_count"]').text(data.count);
        });
    });

    $('[data-type="decrement"]').on('click', function () {
        var updateField = $('[data-type="'+$(this).data('update')+'"]');
        updateField.val(parseInt(updateField.val()) - 1);
        updateServer(parseInt(updateField.val()), updateField.data('id'));
        if (updateField.val() == '0') {
            $(this).closest('tr').addClass('hidden');
        }
    });

    $('[data-type="increment"]').on('click', function () {
        var updateField = $('[data-type="'+$(this).data('update')+'"]');
        updateField.val(parseInt(updateField.val()) + 1);
        updateServer(parseInt(updateField.val()), updateField.data('id'));
    });

    function updateServer(quantity, rowId) {

        if (quantity == 0) {
            makePostRequest('/cart/destroy', {
                id :rowId
            }, function (data) {
                console.log(data);
                $('[data-type="cart_items_count"]').text(data.count);
            });
            return;
        }

        makePostRequest('/cart/update', {
            id : rowId,
            quantity : quantity
        }, function (data) {
            console.log(data);
            $('[data-type="cart_items_count"]').text(data.count);
        });
    }

})();