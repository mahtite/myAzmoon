
$(document).ready(function() {

//******* MultiDelete **********************

        $("#users-table").TableCheckAll();

        $('#multi-delete').on('click', function() {
            var button = $(this);
            var selected = [];
            $('#users-table .check:checked').each(function() {
                selected.push($(this).val());
            });

            Swal.fire({
                icon: 'warning',
                title: 'آیا برای حذف اطمینان دارید؟',
                showDenyButton: false,
                showCancelButton: true,
                confirmButtonText: 'ok'
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'post',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: button.data('route'),
                        data: {
                            'selected': selected
                        },
                        success: function (response, textStatus, xhr) {
                            Swal.fire({
                                icon: 'success',
                                title: response,
                                showDenyButton: false,
                                showCancelButton: false,
                                confirmButtonText: 'ok'
                            }).then((result) => {
                                window.location='/dashboard/users'
                            });
                        }
                    });
                }
            });
        });

        /////////////////////////////

    $("#state-table").TableCheckAll();

    $('#multi-deleteS').on('click', function() {
        var button = $(this);
        var selected = [];
        $('#state-table .check:checked').each(function() {
            selected.push($(this).val());
        });

        Swal.fire({
            icon: 'warning',
            title: 'آیا برای حذف اطمینان دارید؟',
            showDenyButton: false,
            showCancelButton: true,
            confirmButtonText: 'ok'
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                $.ajax({
                    type: 'post',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: button.data('route'),
                    data: {
                        'selected': selected
                    },
                    success: function (response, textStatus, xhr) {
                        Swal.fire({
                            icon: 'success',
                            title: response,
                            showDenyButton: false,
                            showCancelButton: false,
                            confirmButtonText: 'ok'
                        }).then((result) => {
                            window.location='/dashboard/states'
                        });
                    }
                });
            }
        });
    });

    ////////////////////////////////////




    $('.delete-form').on('submit', function(e) {
        e.preventDefault();
        var button = $(this);

        Swal.fire({
            icon: 'warning',
            title: 'آیا برای حذف اطمینان دارید؟',
            showDenyButton: false,
            showCancelButton: true,
            confirmButtonText: 'ok'
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                $.ajax({
                    type: 'post',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: button.data('route'),
                    data: {
                        '_method': 'delete'
                    },
                    success: function (response, textStatus, xhr) {
                        Swal.fire({
                            icon: 'success',
                            title: response,
                            showDenyButton: false,
                            showCancelButton: false,
                            confirmButtonText: 'ok'
                        }).then((result) => {
                            window.location='/dashboard/users'
                        });
                    }
                });
            }
        });

    })
    });
//*********************************************************
