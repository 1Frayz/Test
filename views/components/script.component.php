<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
function toggleContent(elementId, buttonId, showText, hideText) {
    var contentDiv = document.getElementById(elementId);
    var button = document.getElementById(buttonId);
    if (contentDiv.style.display === "none" || contentDiv.style.display === "") {
        contentDiv.style.display = "block";
        button.innerHTML = hideText;
    } else {
        contentDiv.style.display = "none";
        button.innerHTML = showText;
    }
}

function toggleComments(postId) {
    toggleContent('comments-' + postId, 'toggle-comments-' + postId, 'Show Comments', 'Hide Comments');
}

function toggleMessage(postId) {
    toggleContent('message-full-' + postId, 'toggle-message-' + postId, 'Show More', 'Show Less');
}
</script>