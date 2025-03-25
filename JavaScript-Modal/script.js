document.getElementById("openModal").onclick = function() {
    document.getElementById("myModal").style.display = "flex";
}
document.querySelector(".close").onclick = function() {
    document.getElementById("myModal").style.display = "none";
}
window.onclick = function(event) {
    if (event.target === document.getElementById("myModal")) {
        document.getElementById("myModal").style.display = "none";
    }
}
document.getElementById("submitBtn").onclick = function() {
    let inputValue = document.getElementById("userInput").value;
    alert("Anda memasukkan: " + inputValue);
}