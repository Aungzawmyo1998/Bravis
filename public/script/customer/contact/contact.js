const form = document.querySelector('.customer-form');
const cname = document.querySelector('#cname');
const email = document.querySelector('#cemail');
const mess = document.querySelector('#cmessage');


function sendEmail () {
    const bodyMessage = `Name : ${cname.value} <br>
                        Email : ${email.value} <br>
                        Message : ${mess.value}`;
    Email.send({
        Host : "smtp.elasticemail.com",
        Username : "bravisazm@gmail.com",
        Password : "5D66A500BD28A8694954D92F1F43DB7C8FD7",
        To : 'bravisazm@gmail.com',
        From : "bravisazm@gmail.com",
        Subject : "NO Subject",
        Body : bodyMessage
    }).then(
        message => {
            if (message == "OK") {
                Swal.fire({
                    title: "Success!",
                    text: "Message send successful",
                    icon: "success"
                });
            }
        }
    );
}

form.addEventListener("submit", (e)=>{
    e.preventDefault();

    sendEmail();
})

