$(document).ready(function () {
    $('#Prem').show().prependTo($('form#saveconfig'));
    $('[name=set]').closest('tr').hide();

    $('.addPack').unbind();
    $('.addPack').click(function () {
        count = $('[data-premium]>div').length;
        $this = $(this);
        $h = $('.prototip>div').clone();
        $h.find("input").removeAttr("disabled");
        $h.find("input[name='item[tmp][name]']").attr("name", "item[" + count + "][name]");
        $h.find("input[name='item[tmp][id]']").attr("name", "item[" + count + "][id]");
        $h.find("input[name='item[tmp][downloads]']").attr("name", "item[" + count + "][downloads]");
        $h.find("input[name='item[tmp][price]']").attr("name", "item[" + count + "][price]");

        $('[data-premium="sett"]').append($h);
        return false;
    });


});