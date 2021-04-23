<?php include ROOT . '/views/layouts/dashboard_header.php'; ?>



<?php
foreach ($all_info as $all) {
    if($all['pic']==NULL){
        echo
            "<div class='container'>" .
                "<div class='row'>" .
                "<div class='col-3 uploaded_pic'>" .
                    "<img src='avatar.jpg' width='250'>" .
                "</div>" .
                "<div class='col-9'> " .
                "<label>Full name:</label>" .
                '<input class="info_input" readonly type="text" value ="' . " " . $all['first_name'] .
                " " . $all['last_name'] . '"' . "><br>" .
                "<label>Email:</label>" .
                '<input class="info_input" readonly type="text" value ="' . " " . $all['email'] . '"' . "><br>" .
                "</div>" .
            "</div>";
    }else{
        echo
            "<div class='container'>" .
            "<div class='row'>" .
            "<div class='col-3 uploaded_pic'>" .
            "<img src=" . '"uploads/' . $all['pic'] . '"' . 'width="250" height="250"' . ">" .
        "</div>" .
        "<div class='col-9'> " .
        "<label>Full name:</label>" .
        '<input class="info_input" readonly type="text" value ="' . " " . $all['first_name'] .
        " " . $all['last_name'] . '"' . "><br>" .
        "<label>Email:</label>" .
        '<input class="info_input" readonly type="text" value ="' . " " . $all['email'] . '"' . "><br>" .
        "</div>" .
        "</div>";
    }
}

    	if (isset($_POST['submit'])) {

			$fileName = $_FILES['fileToUpload']['name'];
			$fileTmpName = $_FILES['fileToUpload']['tmp_name'];
			$fileSize = $_FILES['fileToUpload']['size'];
			$fileError = $_FILES['fileToUpload']['error'];
			$fileType = $_FILES['fileToUpload']['type'];
			$fileExt = explode('.',$fileName);
			$fileActualExt = strtolower(end($fileExt));
			$allowed = array('jpg', 'jpeg', 'png', 'pdf');
			if(in_array($fileActualExt, $allowed)){
				if($fileError === 0){
					if($fileSize < 100000){
						$fileNewName = uniqid('',true). "." . $fileActualExt;
						User::updatePic($fileNewName);
						//die($fileNewName);
						$fileDestination = 'uploads/' . $fileNewName;
						move_uploaded_file($fileTmpName, $fileDestination);
						header("Location: /admin");
					}else{
						echo "<div class='img_message' style='width: 250px; background-color: #adb5bd;'>" .
                                "Your file is too big" .
                                '<button id="img_button">OK</button>' .
                             "</div>";
					}
				}else{
					echo "<div class='img_message' style='width: 250px; background-color: #adb5bd;'>" .
						"File uploading error" .
						'<button id="img_button">OK</button>' .
						"</div>";
				}
			}else{
				echo "<div class='img_message' style='width: 250px; background-color: #adb5bd;'>" .
                        "File uploading error" .
                        '<button id="img_button">OK</button>' .
                     "</div>";
			}
		}

?>
<div class='row'>
    <div class='col-3'>
        <form action="" method="post" enctype="multipart/form-data">
            <label for="file">Select image:</label><br>
            <input type="file" id="fileToUpload" name="fileToUpload"><br><br>
            <input name="submit" type="submit">
        </form>
    </div>
<?php echo "</div>";?>

<?php include ROOT . '/views/layouts/dashboard_footer.php'; ?>


