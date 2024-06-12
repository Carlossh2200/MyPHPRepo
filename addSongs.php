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

    <?php  
    session_start();
    $messageSuccess = "";
    $messageFail = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $userName = "";

        $songName = ($_POST['songName']);
        $songArtist = ($_POST['songArtist']);
        $songAlbum = ($_POST['songAlbum']);
        $songYear = ($_POST['songYear']);
        
        if (isset($_SESSION['username'])){
            $userName = $_SESSION['username'];
        
            $conn = mysqli_connect("localhost","root","","users");
            if ($conn->connect_error){
                die("Connection failed: ". $conn->connect_error);
            }
        
            $sql = "SELECT id FROM user WHERE username = ?";
            $statement = $conn->prepare($sql);
            $statement->bind_param('s',$userName);
            $statement->execute();
            $result = $statement->get_result();
        
            if ($row = $result->fetch_assoc()){
                $userId = $row['id'];
                $userId = intval($userId);
        
                $sqlInsert = "INSERT INTO playlist (name,artist,album,year,id_user) VALUES (?,?,?,?,?)";
                $statementInsert = $conn->prepare($sqlInsert); // Use $sqlInsert here
                $statementInsert->bind_param('sssii',$songName,$songArtist,$songAlbum,$songYear,$userId);
        
                if ($statementInsert->execute()){
                    $messageSuccess = "Song added successfully";
                }else{
                    $messageFail = "Error adding song: " . $statementInsert->error;
                }
            }else{
                echo "No user logged in this session.";
            }
        
            $statement->close();
            $statementInsert->close();
            $conn->close();

        }
    }
    ?>

    <main>
    <?php if ($messageSuccess): ?>
            <div class="success-message"><?php echo $messageSuccess; ?></div>
        <?php endif; ?>
        <?php if ($messageFail): ?>
            <div class="error-message"><?php echo $messageFail; ?></div>
        <?php endif; ?>
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