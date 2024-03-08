<!-- footer.php -->
<footer>
    <p>All rights reserved &copy; <span id="currentYear"></span> Dodni's Flash Card Web App</p>
    <script src="<?php echo BASE_URL; ?>app/js/main.js"></script>
    <script src="<?php echo BASE_URL; ?>app/js/card-flipping.js"></script>
    <script>document.getElementById("currentYear").textContent = new Date().getFullYear();</script>
</footer>
