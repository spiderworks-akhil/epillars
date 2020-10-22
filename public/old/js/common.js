$(window).scroll(function () {
    if ($(this).scrollTop() > 1) {
        $('.mobile-header--sticky').addClass("sticky1");
    } else {
        $('.mobile-header--sticky').removeClass("sticky1");
    }
});

// mobile menu toggle
$(function () {
    $('[data-collapse]').each(function (i, element) {
        const collapse = element;

        $('[data-collapse-trigger]', collapse).on('click', function () {
            const openedClass = $(this).closest('[data-collapse-opened-class]').data('collapse-opened-class');
            const item = $(this).closest('[data-collapse-item]');
            const content = item.children('[data-collapse-content]');
            const itemParents = item.parents();

            itemParents.slice(0, itemParents.index(collapse) + 1).filter('[data-collapse-item]').css('height', '');

            if (item.is('.' + openedClass)) {
                const startHeight = content.height();

                content.css('height', startHeight + 'px');
                item.removeClass(openedClass);

                content.css('height', '');
            } else {
                const startHeight = content.height();

                item.addClass(openedClass);

                const endHeight = content.height();

                content.css('height', startHeight + 'px');
                content.css('height', endHeight + 'px');
            }
        });

        $('[data-collapse-content]', collapse).on('transitionend', function (event) {
            if (event.originalEvent.propertyName === 'height') {
                $(this).css('height', '');
            }
        });
    });
});


/*
// mobilemenu
*/
$(function () {
    const body = $('body');
    const mobilemenu = $('.mobilemenu_f4');

    if (mobilemenu.length) {
        const open = function () {
            const bodyWidth = body.width();
            body.css('overflow', 'hidden');
            body.css('paddingRight', (body.width() - bodyWidth) + 'px');

            mobilemenu.addClass('mobilemenu--open');
        };
        const close = function () {
            body.css('overflow', 'auto');
            body.css('paddingRight', '');

            mobilemenu.removeClass('mobilemenu--open');
        };


        $('.mobile-header__menu-button').on('click', function () {
            open();
        });
        $('.mobilemenu__backdrop, .mobilemenu__close').on('click', function () {
            close();
        });
    }
});