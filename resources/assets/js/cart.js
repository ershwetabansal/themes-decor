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

        $form.find('[data-type="loading"]').removeClass('hidden');
        $form.find('.fa-cart-plus').addClass('hidden');
        /* Alerts the results */
        posting.done(function( data ) {
            console.log(data);
            $form.find('.in-cart').removeClass('in-cart-hidden');
            $form.find('[data-type="loading"]').addClass('hidden');
            $form.find('.fa-cart-plus').removeClass('hidden');
            $('[data-type="cart_items_count"]').text(data.count);
            $('[data-type="checkout"]').removeClass('hidden');
            $form.find('.btn-cart').addClass('hidden');
        }, function () {
            $form.find('.fa-cart-plus').removeClass('hidden');
            $form.find('[data-type="loading"]').addClass('hidden');
        });
    });

    $('[data-type="decrement"]').on('click', function () {
        var updateField = $('[data-type="'+$(this).data('update')+'"]');
        updateField.val(parseInt(updateField.val()) - 1);
        updateServer(parseInt(updateField.val()), updateField.data('id'), updateField);
        if (updateField.val() == '0') {
            $(this).closest('tr').addClass('hidden');
        }
    });

    $('[data-type="increment"]').on('click', function () {
        var updateField = $('[data-type="'+$(this).data('update')+'"]');
        updateField.val(parseInt(updateField.val()) + 1);
        updateServer(parseInt(updateField.val()), updateField.data('id'), updateField);
    });

    $('[data-type="remove"]').on('click', function () {
        updateServer(0, $(this).data('id'), $(this));
    });



    function updateServer(quantity, rowId, field) {

        if (quantity == 0) {
            makePostRequest('/cart/destroy', {
                id :rowId
            }, function (data) {
                console.log(data);
                field.closest('tr').remove();
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