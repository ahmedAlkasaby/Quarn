<script>
    setTimeout(function() {
    const flashMessageElement = document.getElementById('flash-message');
    if (flashMessageElement) {
        flashMessageElement.style.display = 'none';
    } else {
        console.warn("Flash message element not found");
    }
}, 2000);
</script>
