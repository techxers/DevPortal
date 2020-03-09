function SendMultiMessages(who, route, reload) {
    Swal.fire({
        title: 'Send to the ' + who + '',
        text: 'Specify the message in the below field',
        input: "textarea",
        inputValue: '',
        confirmButtonClass: 'btn btn-primary',
        buttonsStyling: false,
        showCancelButton: true,
        confirmButtonText: 'Send',
        cancelButtonClass: "btn btn-danger ml-1",
    }).then(function (result) {
        if (result.value) {

            let checkboxes = document.getElementsByClassName('dt-checkboxes');
            var checkedCount = 0, checkedOutCount = 0;

            for (var i = 0; i < checkboxes.length; i++) {
                if (!checkboxes[i].checked)
                    continue;
                checkedCount++;

                var checkIDTitle = checkboxes[i].closest('td').title;

                $.get(route + "?" + 'id=' + checkIDTitle + "&sms=" + result.value, function (data, status) {
                    if (data) {
                        checkedOutCount++;
                    }

                })
            }
            if (checkedCount > 0) {
                Swal.fire({
                    title: checkedCount + ' Messages Sent',
                    animation: false,
                    customClass: 'animated bounceIn',
                    confirmButtonClass: 'btn btn-primary',
                    buttonsStyling: false,
                }).then(function () {

                    if (reload)
                        window.location.reload();
                });
            } else {
                Swal.fire({
                    title: "Warning!",
                    text: "You haven't selected anything",
                    type: "warning",
                    confirmButtonClass: 'btn btn-primary',
                    buttonsStyling: false,
                });
            }
        }
    });
}


function SendMultiEmails(who,route,reload) {

        const {value: formValues} = swal.fire({
            title: 'Sending Emails to '+who+'',
            html:
                ' <div class="col-sm-12 data-field-col pt-2">\n' +
                '                                                    <div><input type="text" style="visibility: hidden" autofocus></div>' +
                '                                                    <label for="data-name" style="font-size: 18px">Subject</label>\n' +
                '                                                    <input type="text" class="form-control pt-2" name="subject"\n' +
                '                                                           id="email-subject"\n' +
                '                                                           value="" placeholder="email subject" required>\n' +
                '                                                </div>\n' +
                '                                                <div class="col-sm-12 data-field-col pt-2">\n' +
                '                                                    <label for="data-price" style="font-size: 18px">Message</label>\n' +
                '                                                    <textarea type="text" class="form-control" name="message"\n' +
                '                                                              id="email-message" rows="10" placeholder="email message" \n' +
                '                                                              style="text-align: left;align-content:start" required>\n' +
                '                                                    </textarea>\n' +
                '                                                </div>\n',
            focusConfirm: false,
            confirmButtonClass: 'btn btn-primary',
            buttonsStyling: false,
            showCancelButton: true,
            confirmButtonText: 'Submit',
            cancelButtonClass: "btn btn-danger ml-1"
        }).then(function (result) {

            let checkboxes = document.getElementsByClassName('dt-checkboxes');
            var checkedCount = 0, checkedOutCount = 0, successRate = 0, failureRate = 0;


            for (var i = 0; i < checkboxes.length; i++) {
                if (!checkboxes[i].checked)
                    continue;
                checkedCount++;


                var checkIDTitle = checkboxes[i].closest('td').title;

                $.ajax({
                    type: "POST",
                    data: {
                        "subject": document.getElementById('email-subject').value,
                        "message": document.getElementById('email-message').value,
                        "id": checkIDTitle
                    },
                    url: ''+route+'',
                    success: successFunc,
                    error: errorFunc
                });

                function successFunc(data, status) {
                    successRate++;

                }

                function errorFunc(data, status) {
                    failureRate++;
                }
            }

            if (checkedCount < 1) {
                Swal.fire({
                    title: "Warning!",
                    text: "You haven't selected anything",
                    type: "warning",
                    confirmButtonClass: 'btn btn-primary',
                    buttonsStyling: false,
                });
            } else {
                Swal.fire({
                    title: "Status",
                    text: "Email sent",
                    type: "info",
                    confirmButtonClass: 'btn btn-primary',
                    buttonsStyling: false,
                }).then(function () {
                    if (reload)
                        window.location.reload();
                });
            }
        });

}
