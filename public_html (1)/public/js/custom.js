//Habilita la opcion de poner cuanto pago el cliente
document.addEventListener("DOMContentLoaded", function() {
    var pagoSelect = document.getElementById("pago");
    var montoDiv = document.getElementById("montoDiv");
    var montoInput = document.getElementById("monto");

    pagoSelect.addEventListener("change", function() {
        if (pagoSelect.value === "1") {
            montoDiv.style.display = "block";
            montoInput.setAttribute("required", "required");
        } else {
            montoDiv.style.display = "none";
            montoInput.removeAttribute("required");
        }
    });
});


/* Traje de varon */

function change1() {
    document.getElementById('tr1').src = 'img/tr1.png';
}
function change2() {
    document.getElementById('tr1').src = 'img/tr2.png';
}
function change3() {
    document.getElementById('tr1').src = 'img/tr3.png';
}
function change4() {
    document.getElementById('tr1').src = 'img/tr4.png';
}
function change5() {
    document.getElementById('tr1').src = 'img/tr5.png';
}
function change6() {
    document.getElementById('tr1').src = 'img/tr6.png';
}
function change7() {
    document.getElementById('tr1').src = 'img/tr7.png';
}
function change8() {
    document.getElementById('tr1').src = 'img/tr8.png';
}
function change9() {
    document.getElementById('tr1').src = 'img/tr9.png';
}
function change10() {
    document.getElementById('tr1').src = 'img/tr10.png';
}
function change11() {
    document.getElementById('tr1').src = 'img/tr11.png';
}
function change12() {
    document.getElementById('tr1').src = 'img/tr12.png';
}
function change13() {
    document.getElementById('tr1').src = 'img/tr13.png';
}
function change14() {
    document.getElementById('tr1').src = 'img/tr14.png';
}
function change15() {
    document.getElementById('tr1').src = 'img/tr15.png';
}

// sidebar toggle
const btnToggle = document.querySelector('.toggle-btn');

btnToggle.addEventListener('click', function () {
  console.log('clik')
  document.getElementById('sidebar').classList.toggle('active');
  console.log(document.getElementById('sidebar'))
});


