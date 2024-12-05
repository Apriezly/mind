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


const set = document.getElementById('set');
const inputCustom = document.getElementById('inputCustom');

set.addEventListener('change',() =>{
  const pilihan = set.value;
  const custom = document.createElement('input');

  switch(pilihan){
    case '7':
      custom.type = 'datetime-local';
      custom.classList.add('form-control'); // Menambah class
      custom.setAttribute('name', 'set_custom'); // Menambah name
      break;
    default:
      custom.style.display = 'none';
  }

  inputCustom.innerHTML = ''; // Menghapus input sebelumnya
  inputCustom.appendChild(custom); // Menambah element ke dalam elemennt (input ke dalam div)
});
