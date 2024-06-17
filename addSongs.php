<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Songs</title>
    <link rel="stylesheet" href="./css/styles.css">
</head>
<body>
    <?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    session_start();
    include('./view/header.php');
    ?>

    <?php  
     $conn = mysqli_connect("localhost", "root", "", "users");
     if (!$conn) {
         die("Connection failed: " . mysqli_connect_error());
     } else {
         echo "Database connected successfully<br>";
     }
    $messageSuccess = "";
    $messageFail = "";

    if (isset($_POST['submit'])) {

        $songName = $_POST['songName'];
        $songArtist = $_POST['songArtist'];
        $songAlbum = $_POST['songAlbum'];
        $songYear = $_POST['songYear'];

        $songName = htmlspecialchars($_POST['songName']);
        $songArtist = htmlspecialchars($_POST['songArtist']);
        $songAlbum = htmlspecialchars($_POST['songAlbum']);
        $songYear = intval($_POST['songYear']);

        if (isset($_SESSION['username'])) {
            $userName = $_SESSION['username'];
            $sql = "SELECT id FROM user WHERE username = ?";
            $statement = $conn->prepare($sql);
            if ($statement) {
                $statement->bind_param('s', $userName);
                $statement->execute();
                $result = $statement->get_result();

                if ($row = $result->fetch_assoc()) {
                    $userId = intval($row['id']);
                    echo "User ID: $userId<br>";

                    $sqlInsert = "INSERT INTO playlist (name, artist, album, year, id_user) VALUES (?, ?, ?, ?, ?)";
                    $statementInsert = $conn->prepare($sqlInsert);
                    if ($statementInsert) {
                        $statementInsert->bind_param('sssii', $songName, $songArtist, $songAlbum, $songYear, $userId);

                        if ($statementInsert->execute()) {
                            echo "<script>alert('Song added successfully')</script>";
                        } else {
                            echo "<script>alert('Error adding song')</script>";
                            $messageFail = "Error adding song: " . $statementInsert->error;
                        }
                        $statementInsert->close();
                    } else {
                        $messageFail = "Error preparing insert statement: " . $conn->error;
                    }
                } else {
                    echo "<script>alert('No user found for the current session')</script>";
                }
                $statement->close();
            } else {
                $messageFail = "Error preparing select statement: " . $conn->error;
            }
            $conn->close();
        } else {
            echo "<script>alert('User is not logged in')</script>";
        }
    }
    ?>

    <main>
        <form action="" method="POST">
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
