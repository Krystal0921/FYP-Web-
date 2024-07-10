var messages = document.querySelectorAll("#news-container p");
var showMessageCount = 6;

function showMoreMessages() {
    for (var i = 0; i < messages.length; i++) {
        if (i < showMessageCount) {
            messages[i].style.display = "block";
        } else {
            messages[i].style.display = "none";
        }
    }

    showMessageCount += 6;
}
