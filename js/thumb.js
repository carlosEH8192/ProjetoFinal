// Get the modal
var myModal = document.getElementById('myModal');

// Get the button that opens the modal
var myBtn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var mySpan = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
myBtn.onclick = function() {
    myModal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
mySpan.onclick = function() {
    myModal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == myModal) {
        myModal.style.display = "none";
    }
}
