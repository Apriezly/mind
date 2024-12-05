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

   
  $(function () {
    $('#table').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });

  function myFunction() {
    // Declare variables
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");
  
    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[0];
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }
    }
  }

  

// const countdownDate = new Date("DES 30, 2024 00:00:00").getTime();

// const x = setInterval(function() {

//   const now = new Date().getTime();

//   const distance = countdownDate - now;

//   const days = Math.floor(distance / (1000 * 60 * 60 * 24));
//   const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
//   const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
//   const seconds = Math.floor((distance % (1000 * 60)) / 1000);

//   document.getElementById("days").innerHTML = days;
//   document.getElementById("hours").innerHTML = hours;
//   document.getElementById("minutes").innerHTML = minutes;
//   document.getElementById("seconds").innerHTML = seconds;

// }, 1000);

// document.write(seconds);