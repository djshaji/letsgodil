function chat_send_message () {
    msg = $("#message").val () ;
    if (msg == '') {
        return ;
    }

    data = {
        "message": msg,
        "sender": to
    }

    $.ajax({
        type: "POST",
        url: "/anneli/api/db.php?table=chat&action=insert",
        data: data,
        success: function (data) {
            console.log (data)
            if (data.error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Message not sent.',
                    text: data.error
                  })
    
            }
            console.log ("Message sent")
            chat_message (true, msg)
            ui ("message").scrollIntoView (true)
            ui ("message").value = ""
        },
        error: function (data) {
            console.log (data)
            Swal.fire({
                icon: 'error',
                title: 'Message not sent.',
                text: data.responseText
              })
              
        },
        dataType: "json"
      });
}

function chat_message (own, message) {
    c = uic ("a")
    if (own) {
        for (i of [
            'text-end', 'btn-lg', 'list-group-item', 'list-group-item-action'
        ])
            c.classList.add (i)
        c.innerHTML = message + '&nbsp;<sup class="badge text-muted bg-secondary m-1" style="opacity:80%;font-size:60%">11:40 pm</sup>'
    } else {
        for (i of [
            'active', 'btn-lg', 'card', 'list-group-item', 'list-group-item-action'
        ])
            c.classList.add (i)
        c.innerHTML = message + '&nbsp;<sup class="badge text-white bg-primary m-1" style="opacity:80%;font-size:60%">11:32 pm</sup>'
    }

    ui ("mcontainer").appendChild (c)
}
