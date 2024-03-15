<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-custom mt-0">
        <div class="d-flex justify-content-start">
            <a class="navbar-brand mr-1" href="<?php echo BASE_URL;?>decks">LEARN!</a>
            <div class="nav-item dropdown d-flex justify-content-start">
                <form id="languageForm" action="submit.php" method="post" class="form-inline">
                    <select class="custom-select" name="language" id="languageSelect" onchange="submitForm()">
                        <option value="EN">EN</option>
                        <option value="HU">HU</option>
                        <option value="DE">DE</option>
                    </select>
                </form>
            </div>
            <div class = "border ml-1 rounded">
                <button id="themeButton" onclick="toggleTheme()" class="btn btn-light ">☼</button> 
            </div>
        </div>
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo BASE_URL;?>home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo BASE_URL;?>decks">Decks</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo BASE_URL;?>decks/public">Public Decks</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo BASE_URL;?>settings">Setting</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo BASE_URL;?>about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo BASE_URL;?>contact">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo BASE_URL;?>signup">Sign Up</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo BASE_URL;?>login">Log In</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo BASE_URL;?>logout">Log Out</a>
                </li>
            </ul>
        </div>
    </nav>
</header>