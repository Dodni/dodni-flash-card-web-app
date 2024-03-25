<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include_once 'head-main_view.php'; ?>
        <title>Setting</title>
    </head>
    <body>
        <?php include_once 'header_view.php'; ?>
        <main>
            <div class="container text-center mt-2">
                <h1>Setting</h1>
                <form action="#" method="post">
                    <div class="form-group row">
                        <label for="deck_settings_max_flip" class="col-sm-4 col-form-label">Audio autoplay</label>
                        <div class="col-sm-8">
                            <select class="form-control" name="desk_settings_public" id="desk_settings_public">
                                <?php if ($deckSettingsData[0]["desk_settings_public"] == "N") : ?>
                                    <option value="N" selected>No</option>
                                    <option value="Y">Yes</option>
                                <?php else : ?>
                                    <option value="N">No</option>
                                    <option value="Y" selected>Yes</option>
                                <?php endif; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="desk_settings_public" class="col-sm-4 col-form-label">Daily study goal</label>
                        <div class="col-sm-8">
                            <select class="form-control" id="deck_settings_max_flip" name="deck_settings_max_flip">
                                <?php
                                $options = array(10, 25, 50, 100, 200, 300, 400, 500);
                                foreach ($options as $option) {
                                    $selected = ($deckSettingsData[0]["deck_settings_max_flip"] == $option) ? "selected" : "";
                                    echo "<option value='$option' $selected>$option</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Marketing letters</label>
                        <div class="col-sm-8">
                            <select class="form-control" name="desk_settings_public" id="desk_settings_public">
                                <?php if ($deckSettingsData[0]["desk_settings_public"] == "N") : ?>
                                    <option value="N" selected>No</option>
                                    <option value="Y">Yes</option>
                                <?php else : ?>
                                    <option value="N">No</option>
                                    <option value="Y" selected>Yes</option>
                                <?php endif; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">News letters</label>
                        <div class="col-sm-8">
                            <select class="form-control" name="desk_settings_public" id="desk_settings_public">
                                <?php if ($deckSettingsData[0]["desk_settings_public"] == "N") : ?>
                                    <option value="N" selected>No</option>
                                    <option value="Y">Yes</option>
                                <?php else : ?>
                                    <option value="N">No</option>
                                    <option value="Y" selected>Yes</option>
                                <?php endif; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Premium User </label>
                        <div class="col-sm-8">
                            <p>Yes | No</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Premium Expire Date</label>
                        <div class="col-sm-8">
                            <p>2024.01.01. | Expired on 2024.01.01.</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12 text-center">
                            <button type="submit" class="custom-button">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </main>
        <?php include_once 'footer_view.php'; ?>
    </body>
</html>
