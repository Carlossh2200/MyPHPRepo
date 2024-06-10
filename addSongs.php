<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Songs</title>
    <link rel="stylesheet" href="./css/styles.css">
</head>
<body>
    <?php include('./view/header.php') ?>
    <main>
        <form action="" method="post">
            <h2>Add Song</h2>
            <div class="add_song_rows">
                
                <div class="add_song_row">
                    <label>Song name: </label><input type="text" name="songName" class="full-width" required>
                </div>

                <div class="add_song_row">
                    <label>Artist: </label><input type="text" name="songArtist" class="full-width" required>
                </div>

                <div class="add_song_row">
                    <label>Album: </label><input type="text" name="songAlbum" class="full-width">
                </div>

                <div class="add_song_row">
                    <label>Year: </label><input type="number" name="songYear" class="full-width" min="0"> 
                </div>

                <div class="add_song_row">
                    <input type="submit" name="submit" value="Add" class="full-width">
                </div>
            </div>
        </form>
    </main>
    <?php include('./view/footer.php') ?>
</body>
</html>