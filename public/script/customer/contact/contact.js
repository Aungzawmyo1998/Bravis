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

const nameError = document.getElementById("nameError");
const emailError = document.getElementById("emailError");
const messError = document.getElementById("messError");

form.addEventListener("submit", (e)=>{

    const nameTrim = cname.value.trim();
    const emailTrim = email.value.trim();
    const messTrim = mess.value.trim();
    e.preventDefault();

    let errorDetail = true;
    let submitState = true;

    if (errorDetail) {
        if ( nameTrim == "" ) {
            // nameError.style.display = "block"
            nameError.innerText = "The name field is required";
            // console.log(nameError.style.display)
            // submitState = false;

        } else {
            nameError.innerText = "";
            // submitState = true;

        }
        if ( emailTrim == "" ) {
            emailError.innerText = "The email field is required";
            // submitState = false;
        } else {
            emailError.innerText = "";
            // submitState = true;
        }
        if ( messTrim == "") {
            messError.innerText = "The message field is required";
            // submitState = false;
        } else {
            messError.innerText = "";
            // submitState = true;
        }

        if ( nameTrim != "" && emailTrim != "" && messTrim != "") {
            sendEmail();
        }




    }







})



