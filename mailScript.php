<?php
//server, username, password, databaseName
$conn = mysqli_connect("localhost", "root", "", "mailtest");

$result = mysqli_query($conn, "SELECT * FROM stranke WHERE name like 'D%'");

while($row = mysqli_fetch_assoc($result)) {
    
    //getting data from table example $row['email'];
    
    //recipient
    $to = $row['email']; 

    // Subject
    $subject = 'Thank you for traveling with us';

    // Message
    $message = "
        <html>
        <head>
            <title>Thank you</title>
        </head>
        <body>
            <h3>Dear {$row['name']},</h3>
            <p>Thank you for making your travel plans with us this past year. We know how precious experiences away from the everyday are, and we hope you made lasting memories on every getaway.</p>
            <h4>Hopefully we'll see you soon</h4>
        </body>
        </html>
    ";

    // To send HTML mail, the Content-type header must be set
    $headers[] = 'MIME-Version: 1.0';
    $headers[] = 'Content-type: text/html; charset=iso-8859-1';

    // Additional headers
    $headers[] = 'From: Company Name <your-email@gmail.com>';
    

    // Mail it
    mail($to, $subject, $message, implode("\r\n", $headers));
}

?>