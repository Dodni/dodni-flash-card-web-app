<header>
    <form id="languageForm" action="submit.php" method="post" class="header-item">
        <select name="language" id="languageSelect" onchange="submitForm()">
            <option value="EN">EN</option>
            <option value="HU">HU</option>
            <option value="DE">DE</option>
        </select>
    </form>
    <button id="themeButton" onclick="toggleTheme()" class="header-item">☼</button>
    <div class="">
        <a href="<?php echo BASE_URL;?>home">Home</a><br>
        <a href="<?php echo BASE_URL;?>about">About</a><br>
        <a href="<?php echo BASE_URL;?>contact">Contact</a><br>
        <a href="<?php echo BASE_URL;?>register">Register</a><br>
        <a href="<?php echo BASE_URL;?>login">Login</a><br>
        <a href="<?php echo BASE_URL;?>logout">Log Out</a><br>
        <a href="<?php echo BASE_URL;?>decks">Decks</a><br>
        <a href="<?php echo BASE_URL;?>settings">Setting</a>
    </div>
</header>