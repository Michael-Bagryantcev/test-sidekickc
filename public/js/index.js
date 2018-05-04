(function($) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#compare-rate').slider({
        formatter: function(value) {
            $('#compare-rate').parent('div').find('span').first().html(value);
        }
    });

    $(document).on('mouseover', '.txt-hover', function() {
        $(this).html($(this).data('originalText'));
    });

    $(document).on('mouseout', '.txt-hover', function() {
        $(this).html($(this).data('newText'));
    });

    $(document).on('submit', '#frm-compare', function() {
        $.post({
            data: $(this).serialize(),
            url: '/compare-texts',
            success: function (data) {
                switch (data.code) {
                    case 200:
                        $('#input-text-result').html(data.message);
                        break;
                    default:
                        alert(data.message);
                        break;
                }
            },
            error: function() {
                alert('Error occurred.');
            }
        });
        return false;
    });
})(jQuery);