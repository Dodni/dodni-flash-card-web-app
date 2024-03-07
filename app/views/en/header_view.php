<header>
    <form id="languageForm" action="submit.php" method="post" class="header-item">
        <select name="language" id="languageSelect" onchange="submitForm()">
            <option value="EN">EN</option>
            <option value="HU">HU</option>
        </select>
    </form>
    <button id="themeButton" onclick="toggleTheme()" class="header-item">☼</button>
</header>