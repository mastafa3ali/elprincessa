'use strict';

function submitSubscription() {
    var email = document.getElementById("subemail");
    const re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if (re.test(email.value)) {

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: app_url + "/" + lang + "/site-projects",
            type: 'POST',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                email: email.value
            },
            async: false,
            success: function(data) {
                var obj = JSON.parse(data);
                if (obj.code === 0) {
                    round_error_noti(obj.msg)
                } else {
                    round_success_noti(obj.msg)
                }
            },
            error: function(error) {
                round_error_noti()
            }
        });
    } else {
        round_error_noti('You Nead To Enter Correct Email')
    }
}

function request_call() {
    var call_email = document.getElementById("call_email");
    var call_name = document.getElementById("call_name");
    var call_phone = document.getElementById("call_phone");
    const re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if (re.test(call_email.value)) {
        if (call_name.value === '') {
            round_error_noti('You Nead To Enter Name')
            return;
        }
        if (call_phone.value === '') {
            round_error_noti('You Nead To Enter Phone')
            return;
        }
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: app_url + "/" + lang + "/orders",
            type: 'POST',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                email: call_email.value,
                name: call_name.value,
                phone: call_phone.value
            },
            async: false,
            success: function(data) {
                var obj = JSON.parse(data);
                if (obj.code === 0) {
                    round_error_noti(obj.msg)
                } else {
                    round_success_noti(obj.msg)
                }
            },
            error: function(error) {
                round_error_noti()
            }
        });
    } else {
        round_error_noti('You Nead To Enter Correct Email')
    }
}

function submitContactUs() {
    var contact_email = document.getElementById("contact_email");
    var contact_name = document.getElementById("contact_name");
    var contact_subject = document.getElementById("contact_subject");
    var contact_msg = document.getElementById("contact_msg");

    const re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if (re.test(contact_email.value)) {
        if (contact_name.value === '') {
            round_error_noti('الرجاء كتابة الاسم')
            return;
        }
        if (contact_subject.value === '') {
            round_error_noti('الرجاء كتابة رقم التليفون')
            return;
        }
        if (contact_msg.value === '') {
            round_error_noti('الرجاء كتابة الرسالة ')
            return;
        }
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: app_url + "/contactus",
            type: 'POST',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                email: contact_email.value,
                name: contact_name.value,
                subject: contact_subject.value,
                msg: contact_msg.value
            },
            async: false,
            success: function(data) {
                var obj = JSON.parse(data);
                if (obj.code === 0) {
                    round_error_noti(obj.msg)
                } else {
                    round_success_noti(obj.msg)
                }
            },
            error: function(error) {
                round_error_noti()

            }
        });

    } else {
        round_error_noti('You Nead To Enter Correct Email')

    }


}