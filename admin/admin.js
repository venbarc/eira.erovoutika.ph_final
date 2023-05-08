// pop up message error
window.onload = function() {
    var popup = document.querySelector('.err');
    setTimeout(function() {
        popup.classList.add('hidden');
    }, 5000);
}
// pop up message success
window.onload = function() {
    var popup = document.querySelector('.scs');
    setTimeout(function() {
        popup.classList.add('hidden');
    }, 5000);
}