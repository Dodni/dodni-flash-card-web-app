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
