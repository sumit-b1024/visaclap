$(document).ready(function(){

   $('#add_edit_form').slideUp(500, function () {
    $('#display_update_form').html('');
});

   $(document).on("click", ".open_my_form_form", function (event) {
    event.preventDefault();
    
    var data_id = $(this).attr('data-id');

    var controller = $(this).attr('data-control');
    var mathod = $(this).attr('data-mathod');
    if (typeof mathod !== typeof undefined && mathod !== false) {
        var $url = mathod;
        if (data_id > 0) {
            $url = base_url + '/' + data_id;
        }
    } else {
        var $url = 'add';
        if (data_id > 0) {
            $url = 'edit/' + data_id;
        }
    }
    $.ajax({
        type: 'POST',
        url: base_url + 'franchise/'+controller + '/' + $url,
        async: false,
            // data: 'pstdata=1&csrf_test_name='+MAIN_TOKEN,
        dataType: 'html',
        beforeSend: function () {
                // $('#display_update_form').jmspinner('large');
            $('#add_edit_form').show();
            $("html, body").animate({ scrollTop: 0 }, "slow");
                // $(".fc-datepicker").datepicker("destroy");
        },
        success: function (returnData) {
            $('#display_update_form').html("");
            $('#display_update_form').html(returnData);

            if ($(".follow_up_date").length > 0) {

                $('.follow_up_date').datepicker({
                    minDate:new Date(),
                    showOtherMonths: true,
                    selectOtherMonths: true,
                });
            }
            if ($(".passport_date").length > 0) {
                $('.passport_date').datepicker({
                    showOtherMonths: true,
                    selectOtherMonths: true,
                });
            }

            $('#display_update_form .select2').select2({
                minimumResultsForSearch: Infinity,
                width: '100%'
            });

            $('#display_update_form .select2-show-search').select2({
                minimumResultsForSearch: '',
                width: '100%'
            });


            $('#display_update_form .select2').on('click', () => {
                let selectField = document.querySelectorAll('.select2-search__field')
                selectField.forEach((element, index) => {
                    element.focus();
                })
            });



            $('.multiple_country').select2({
                minimumResultsForSearch: Infinity,
                width: '100%'
            });

            $('#display_update_form .multiple_country').on('click', () => {
                let selectField = document.querySelectorAll('.select2-search__field')
                selectField.forEach((element, index) => {
                    element.focus();
                })
            });

            $('.repeater').repeater({
              show: function () {
                $(this).slideDown();
                $(this).find('.openlink').remove();
                $(this).find('.removeupdaterow').removeClass('remove_row');
                $(this).find('.removeupdaterow').attr('data-repeater-delete','');
            },
            hide: function (deleteElement) {
              $(this).slideUp(deleteElement);
              
          },
          ready: function (indexElement) {
          },

      });

        },
        error: function (xhr, textStatus, errorThrown) {
                // new PNotify({title: 'Error', text: 'There was an unknown error that occurred. You will need to refresh the page to continue working.', type: 'error', styling: 'bootstrap3'});
        },
        complete: function () {
        }
    });

    return false;

});

   $(document).on("click", "button[type='reset']", function (event) {
    // $('.follow_up_date').datepicker('update', '');
    // var datetimepicker = $('.follow_up_date').datetimepicker();
    // datetimepicker.destroy()
    $('#add_edit_form').slideUp('slow');
});
});



