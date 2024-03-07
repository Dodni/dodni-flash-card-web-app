function toggleTheme() {
    var body = document.body;
    var themeButton = document.getElementById("themeButton");

    if (body.classList.contains("dark-theme")) {
        body.classList.remove("dark-theme");
        themeButton.textContent = "☼"; // Nap ikon
    } else {
        body.classList.add("dark-theme");
        themeButton.textContent = "☾"; // Hold ikon
    }
}