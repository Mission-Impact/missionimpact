sprint_editor.registerBlock('my_speaker', function ($, $el, data, settings) {

    settings = settings || {};

    var enabled_iblocks = [];
    if (settings.enabled_iblocks && settings.enabled_iblocks.value && Array.isArray(settings.enabled_iblocks.value)) {
        enabled_iblocks = settings.enabled_iblocks.value;
    }

    data = $.extend({
        iblock_id: 0,
        element_ids: []
    }, data);

    this.getData = function () {
        return data;
    };

    this.collectData = function () {
        data.iblock_id = findIblockId();
        data.element_ids = findElementIds();
        return data;
    };

    this.afterRender = function () {

        var popupIds = [];

        var uid = sprint_editor.makeUid();
        window[uid] = {
            AddValue: function (newid) {
                newid = intval(newid);
                if (newid > 0) {
                    popupIds.push(newid);
                }
            },

            Complete: function () {
                var oldids = findElementIds();
                var newids = $.merge(oldids, popupIds);

                popupIds = [];

                sendrequest({
                    iblock_id: findIblockId(),
                    element_ids: newids,
                    enabled_iblocks: enabled_iblocks
                });
            }
        };


        $el.on('click', '.sp-open', function () {
            var iblockId = findIblockId();
            if (iblockId > 0) {

                var width = 900;
                var height = 700;
                var url = '/bitrix/admin/iblock_element_search.php?' + decodeURIComponent($.param({
                    lang: 'ru',
                    IBLOCK_ID: iblockId,
                    iblockfix: 'y',
                    lookup: uid,
                    m: 'y'
                }));


                var w = $(window).width(), h = $(window).height();
                var sizes = '';

                sizes += 'status=no,scrollbars=yes,resizable=yes,';
                sizes += 'width=' + width + ',height=' + height;
                sizes += +',top=' + Math.floor((h - height) / 2 - 14) + ',left=' + Math.floor((w - width) / 2 - 5);

                var popup = window.open(url, '', sizes);

                $(popup).unload(function () {
                    window[uid].Complete();
                });

            }
        });

        $el.on('change', '.sp-select-iblock', function () {
            sendrequest({
                iblock_id: findIblockId(),
                element_ids: findElementIds(),
                enabled_iblocks: enabled_iblocks
            });
        });

        sendrequest({
            iblock_id: data.iblock_id,
            element_ids: data.element_ids,
            enabled_iblocks: enabled_iblocks
        });

    };

    var findIblockId = function () {
        return 8;
    };

    var findElementIds = function () {
        var $obj = $el.find('.sp-elements');

        var values = [];
        $obj.find('.sp-item').each(function () {
            var val = intval(
                $(this).data('id')
            );
            if (val > 0) {
                values.push(val);
            }
        });
        return values;
    };

    var intval = function (val) {
        val = (val) ? val : 0;
        val = parseInt(val, 10);
        return isNaN(val) ? 0 : val;
    };


    var sendrequest = function (requestParams, callback) {
        var $jresult = $el.find('.sp-result');

        $.ajax({
            url: sprint_editor.getBlockWebPath('my_speaker') + '/ajax.php',
            type: 'post',
            data: requestParams,
            dataType: 'json',
            success: function (result) {

                $jresult.html(
                    sprint_editor.renderTemplate('my_speaker-select', result)
                );

                var $elem = $jresult.find('.sp-elements');

                var removeIntent = false;
                $elem.sortable({
                    items: ".sp-item",
                    placeholder: "sp-placeholder",
                    over: function () {
                        removeIntent = false;
                    },
                    out: function () {
                        removeIntent = true;
                    },
                    beforeStop: function (event, ui) {
                        if (removeIntent) {
                            ui.item.remove();
                        } else {
                            ui.item.removeAttr('style');
                        }

                    },
                    receive: function (event, ui) {
                        var uiIndex = ui.item.attr('data-id');
                        var item = $(this).find('[data-id=' + uiIndex + ']');
                        if (item.length > 1) {
                            item.last().remove();
                        }
                    }
                });

                if (callback) {
                    callback();
                }
            },
            error: function () {

            }
        });
    };

});
