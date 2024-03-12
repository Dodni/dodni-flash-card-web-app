<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include_once 'head-main_view.php'; ?>
        <title>404 - Not Found</title>
    </head>
    <body>
        <?php include_once 'header_view.php'; ?>
        <main>
            <div class="container text-center mt-2">
                <h1>404 - Not Found</h1>
                <div class="container mt-4 col-md-8">
                    <p>The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.</p>
                    <p>Please <a href="<?php echo BASE_URL; ?>">click here</a> to go back to the homepage.</p>
                </div>
            </div>    
        </main>
        <?php include_once 'footer_view.php'; ?>
    </body>
</html>
