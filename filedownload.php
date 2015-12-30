<?php
//straight download
// Header("HTTP/1.1 200 OK");
// Header("Connection: close");
// Header("Content-Type: application/octet-stream");
// Header("Accept-Ranges: bytes");

Header("Content-Disposition: Attachment; filename=9.txt");
// header('Content-Disposition: attachment; filename="' . $filename . '"');

// Header("Content-Length: 50000");
 
// readfile('MyFile.dat');
// readfile($uploadfile);
readfile("./uploads/9.txt");

?>
