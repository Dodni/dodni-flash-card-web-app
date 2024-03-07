<header>
    <script>
        function toggleTheme() {
            var body = document.body;
            var sunIcon = document.getElementById("sunIcon");
            var moonIcon = document.getElementById("moonIcon");

            if (body.classList.contains("dark-theme")) {
                body.classList.remove("dark-theme");
                sunIcon.style.display = "block";
                moonIcon.style.display = "none";
            } else {
                body.classList.add("dark-theme");
                sunIcon.style.display = "none";
                moonIcon.style.display = "block";
            }
        }
    </script>
    <form id="languageForm" action="submit.php" method="post">
        <select name="language" id="languageSelect" onchange="submitForm()">
            <option value="EN">EN</option>
            <option value="HU">HU</option>
        </select>
    </form>
    <button onclick="toggleTheme()">
        <img id="sunIcon" src="sun_icon.png" alt="☼" style="display: block;">
        <img id="moonIcon" src="moon_icon.png" alt="☾" style="display: none;">
    </button>
</header>