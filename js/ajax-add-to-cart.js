
(function ($) {



    $(document).on('click', '.single_add_to_cart_button', function (e) {
        e.preventDefault();

        var $thisbutton = $(this),
                $form = $thisbutton.closest('form.cart'),
                id = $thisbutton.val(),
                product_qty = $form.find('input[name=quantity]').val() || 1,
                product_id = $form.find('input[name=product_id]').val() || id,
                variation_id = $form.find('input[name=variation_id]').val() || 0;

        var data = {
            action: 'woocommerce_ajax_add_to_cart',
            product_id: product_id,
            product_sku: '',
            quantity: product_qty,
            variation_id: variation_id,
        };

        if (!this.classList.contains('disabled')) {
            $(document.body).trigger('adding_to_cart', [$thisbutton, data]);
    
            $.ajax({
                type: 'post',
                url: wc_add_to_cart_params.ajax_url,
                data: data,
                beforeSend: function (response) {
                    $thisbutton.removeClass('added').addClass('loading');
                },
                complete: function (response) {
                    $thisbutton.addClass('added').removeClass('loading');
                },
                success: function (response) {
                    if (response.error && response.product_url) {
                        window.location = response.product_url;
                        return;
                    } else {
                        var mini_cart = document.querySelector('.js-mini-cart-container');
                        var output_mini_cart = response.fragments['div.widget_shopping_cart_content'];

                        var container = document.createElement('div');
                        container.classList.add('widget_shopping_cart_content');
                        container.innerHTML = output_mini_cart;
                        mini_cart.innerHTML = '';

                        mini_cart.appendChild(container);

                        var ribborn = document.querySelector('.js-add-to-cart-ribborn');
                        if (!ribborn.classList.contains('active')) {
                            ribborn.classList.add('active');
                            setTimeout(function () {
                                ribborn.classList.remove('active');
                            }, 3000);
                        }

                        $(document.body).trigger('added_to_cart', [response.fragments, response.cart_hash]);
                    }
                },
            });
        };

        return false;
    });


    $(document).on('click', '.add_to_cart_button', function (e) {
        e.preventDefault();

        var $thisbutton = $(this),
                $form = $thisbutton.closest('form.cart'),
                id = $thisbutton.val(),
                product_qty = $form.find('input[name=quantity]').val() || 1,
                product_id = $thisbutton.data('product_id') || id;

        var data = {
            action: 'woocommerce_ajax_add_to_cart',
            product_id: product_id,
            product_sku: '',
            quantity: product_qty,
        };

        $(document.body).trigger('adding_to_cart', [$thisbutton, data]);

        $.ajax({
            type: 'post',
            url: wc_add_to_cart_params.ajax_url,
            data: data,
            beforeSend: function (response) {
                $thisbutton.removeClass('added').addClass('loading');
            },
            complete: function (response) {
                $thisbutton.addClass('added').removeClass('loading');
            },
            success: function (response) {
                if (response.error && response.product_url) {
                    window.location = response.product_url;
                    return;
                } else {
                    var mini_cart = document.querySelector('.js-mini-cart-container');
                    var output_mini_cart = response.fragments['div.widget_shopping_cart_content'];

                    var container = document.createElement('div');
                    container.classList.add('widget_shopping_cart_content');
                    container.innerHTML = output_mini_cart;
                    mini_cart.innerHTML = '';

                    mini_cart.appendChild(container);

                    var ribborn = document.querySelector('.js-add-to-cart-ribborn');
                    if (!ribborn.classList.contains('active')) {
                        ribborn.classList.add('active');
                        setTimeout(function () {
                            ribborn.classList.remove('active');
                        }, 3000);
                    }
                    
                    $(document.body).trigger('added_to_cart', [response.fragments, response.cart_hash]);
                }
            },
        });

        return false;
    });


})(jQuery);
