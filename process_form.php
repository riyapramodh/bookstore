<?php
use Google\Cloud\Storage\StorageClient;

$projectID = "pivotal-nebula-401108";
$bucketname = "details02";
$keyfilepath = '/home/riyapramodh2002/bookstore/pivotal-nebula-401108-af652c5ab79a.json';

$storage = new StorageClient ([
    'projectID' => $projectID,
    'keyFilePath' => $keyfilepath,
]);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["inputName"];
    $email = $_POST["inputEmail"];
    $message = $_POST["textArea"];

    // Create a unique filename, e.g., based on timestamp
    $filename = "form_submission_" . time() . ".txt";

    // Prepare content for the text file
    $content = "Name: $name\nEmail: $email\nMessage: $message";

    // Replace 'your-bucket-name' with your actual bucket name
    // Upload the file to Google Cloud Storage
    $bucket = $storage->bucket($bucketname);
    $object - $bucket->upload(file_get_contents($filename));
    // Optionally, you can redirect the user after submission
    header("Location: thank_you.php");
    exit();
} else {
    // Handle invalid request
    http_response_code(400);
    echo "Invalid request method";
}
?>
