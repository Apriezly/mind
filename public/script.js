// const togglePassword = document.querySelector('#togglepassword');
// const password = document.querySelector('#password');

// togglePassword.addEventListener('click', function (e) {
//     const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
//     password.setAttribute('type', type);

//     this.classlist.toggle('fa-eye-slash');
// });

let passwordInput = document.getElementById('txtPassword'),
    toggle = document.getElementById('btnToggle'),
    icon = document.getElementById('eyeIcon');

    function togglePassword(){
        if (passwordInput.type === 'password'){
            passwordInput.type = 'text';
            icon.classList.add("fa-eye-slash");
        }else{
            passwordInput.type = 'password';
            icon.classList.remove("fa-eye-slash");
        }
    }

    function checkInput(){

    }

    toggle.addEventListener('click', togglePassword, false);
    passwordInput.addEventListener('keyup', checkInput, false);

// function checkPassword(){

// }

document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: 'dayGridMonth'
    });
    calendar.render();
  });

