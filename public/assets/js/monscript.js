//Visualisation
var myName = document.querySelector(".nom_utilisateur");
var myFirstName = document.querySelector(".prenom_utilisateur");
var myService = document.querySelector(".nom_service");
var myBio = document.querySelector(".biographie");
var myEmail = document.querySelector(".mail");

//à modifier
var nom = document.querySelector(".edit_nom");
nom.addEventListener("input", function (event) {
    var value = event.target.value;
    myName.innerHTML = value;
});

var prenom = document.querySelector(".edit_prenom");
prenom.addEventListener("input", function (event) {
    var value = event.target.value;
    myFirstName.innerHTML = value;
});

var service = document.querySelector(".edit_service");
service.addEventListener("input", function (event) {
    var value = event.target.value;
    myService.innerHTML = value;
});

var email = document.querySelector(".edit_email");
email.addEventListener("input", function (event) {
    var value = event.target.value;
    myEmail.value = value;
});

var bio = document.querySelector(".edit_bio");
bio.addEventListener("input", function (event) {
    var value = event.target.value;
    myBio.innerHTML = value;
});
