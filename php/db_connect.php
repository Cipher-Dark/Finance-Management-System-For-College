<?php
function OpenCon()
{
    $dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$db = "manage";

	// $dbhost = "sql311.infinityfree.com";
	// $dbuser = "if0_34575708";
	// $dbpass = "II3w7KGvNzf2";
	// $db = "if0_34575708_manage";

	// $dbhost = "sql6.freesqldatabase.com";
	// $dbuser = "sql6633410";
	// $dbpass = "gvdrM1hiD1";
	// $db = "sql6633410";
 

    try {
        $conn = new mysqli($dbhost, $dbuser, $dbpass, $db);
        // Check for connection errors
        if ($conn->connect_error) {
            throw new Exception("Database connection failed: " . $conn->connect_error);
        }

        return $conn;
    } catch (Exception $e) {
        // Handle the exception
        // 
		$url = "../pro/404.html";
		header("Location: " . $url);
    }
}

function CloseCon($conn)
{
    $conn->close();
}
?>
