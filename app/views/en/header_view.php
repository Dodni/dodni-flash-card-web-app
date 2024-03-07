<header>
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