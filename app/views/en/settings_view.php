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
                <form action="<?php echo BASE_URL; ?>settings" method="post">
                    <input type="hidden" name="user_id" value="<?php echo $userSettingsData["user_id"]; ?>">
                    <div class="form-group row">
                        <label for="as_auto_play_audio" class="col-sm-4 col-form-label">Audio autoplay</label>
                        <div class="col-sm-8">
                            <select class="form-control text-center" name="as_auto_play_audio" id="as_auto_play_audio">
                                <?php if ($userSettingsData["as_auto_play_audio"] == "N") : ?>
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
                        <label for="as_daily_study_goal" class="col-sm-4 col-form-label">Daily study goal</label>
                        <div class="col-sm-8">
                            <select class="form-control text-center" id="as_daily_study_goal" name="as_daily_study_goal">
                                <?php
                                $options = array(10, 25, 50, 100, 200, 300, 400, 500);
                                foreach ($options as $option) {
                                    $selected = ($userSettingsData["as_daily_study_goal"] == $option) ? "selected" : "";
                                    echo "<option value='$option' $selected>$option</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label" for="as_marketing_letter">Marketing letters</label>
                        <div class="col-sm-8">
                            <select class="form-control text-center" name="as_marketing_letter" id="as_marketing_letter">
                                <?php if ($userSettingsData["as_marketing_letter"] == "N") : ?>
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
                        <label class="col-sm-4 col-form-label" for="as_news_letter">News letters</label>
                        <div class="col-sm-8">
                            <select class="form-control text-center" name="as_news_letter" id="as_news_letter">
                                <?php if ($userSettingsData["as_news_letter"] == "N") : ?>
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
                        <label class="col-sm-4 col-form-label" for="as_premium_user">Premium User</label>
                        <div class="col-sm-8 label-center">
                            <?php if ($userSettingsData["as_premium_user"] == "N") : ?>
                                No
                            <?php else : ?>
                                Yes
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label" for="as_premium_expire">Premium Expire Date</label>
                        <div class="col-sm-8 label-center"> 
                            <?php
                                if ($userSettingsData["as_premium_expire"] !== null) {
                                    if ($userSettingsData["as_premium_expire"] < date("Y-m-d")) {
                                        echo "Expired on " . $userSettingsData["as_premium_expire"];
                                    } elseif ($userSettingsData["as_premium_expire"] > date("Y-m-d")) {
                                        echo $userSettingsData["as_premium_expire"];
                                    }
                                } else {
                                    echo "Never been a premium user yet";
                                }
                            ?>
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