// Ellenőrzi az oldal betöltésekor a felhasználó preferenciáit
function checkThemePreference() {
    var darkThemeEnabled = localStorage.getItem("darkThemeEnabled");
    if (darkThemeEnabled === "true") {
        enableDarkTheme();
    }
}

// Beállítja a sötét témát és elmenti az állapotát az adattárolásban
function enableDarkTheme() {
    var body = document.body;
    var themeButton = document.getElementById("themeButton");

    body.classList.add("dark-theme");
    themeButton.textContent = "☼"; // Hold ikon

    // Mentés az adattárolásban
    localStorage.setItem("darkThemeEnabled", "true");
}

// Kikapcsolja a sötét témát és elmenti az állapotát az adattárolásban
function disableDarkTheme() {
    var body = document.body;
    var themeButton = document.getElementById("themeButton");

    body.classList.remove("dark-theme");
    themeButton.textContent = "☾"; // Nap ikon

    // Mentés az adattárolásban
    localStorage.setItem("darkThemeEnabled", "false");
}

// Téma váltás funkció
function toggleTheme() {
    var body = document.body;
    var darkThemeEnabled = localStorage.getItem("darkThemeEnabled");

    if (darkThemeEnabled === "true") {
        disableDarkTheme();
    } else {
        enableDarkTheme();
    }
}

// Ellenőrzi az oldal betöltésekor a felhasználó preferenciáit
checkThemePreference();