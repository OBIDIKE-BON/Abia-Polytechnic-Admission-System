$('#choice').change(function () {
    $.ajax({
        url: 'sh.php',
        type: 'post',
        data: {method: $('#choice').val()},
        success: function (data) {
            $('#selected_view').html(data);
            $('.details tr:even').addClass('highlights');
        }
    });
});