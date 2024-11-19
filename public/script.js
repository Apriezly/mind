function showPass() {

var x = document.getElementById("passLama");
var y = document.getElementById('eyeIconLama');

if (x.type === "password") {
    x.type = "text";
    y.classList.add("fa-eye-slash");
} else {
    x.type = "password";
    y.classList.remove("fa-eye-slash");
}
}

function showPassbaru() {

    var x = document.getElementById("passBaru");
    var y = document.getElementById('eyeIconBaru');
    
    if (x.type === "password") {
        x.type = "text";
        y.classList.add("fa-eye-slash");
    } else {
        x.type = "password";
        y.classList.remove("fa-eye-slash");
    }
    }
