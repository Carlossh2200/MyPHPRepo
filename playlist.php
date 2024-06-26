<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Playlist</title>
    <link rel="stylesheet" href="./css/styles.css">
</head>
<body>
    <header><?php include('./view/header.php') ?></header>
    <main>
    <div class="flexPlaylist">
        <div class="divPlaylist">
        <a href="addSongs.php">Add songs</a>
        </div>
        <div class="divPlaylist">
        <a href="managePlaylist.php">Manage your playlists</a>
        </div>
    </div>
    </main>
    <footer><?php include('./view/footer.php') ?></footer>
</body>
</html>