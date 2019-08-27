<?php
// Reading a file.
echo '<h4>Reading file (fopen)</h4>';
$handle = fopen('textfile.txt', 'r');
$file_content = '';
while (!feof($handle)) {
    $file_content .= fgets($handle) . '<br>';
}
fclose($handle);
echo $file_content;
// Reading a file.
echo '<h4>Reading file (file_get_contents)</h4>';
$file_content = file_get_contents('textfile.txt');
$file_content = str_replace("\n", '<br>', $file_content);
echo $file_content;
// Writing to a file.
echo '<h4>Writing to file (fwrite)</h4>';
// a for append, w for writing from scratch
$handle = fopen('textfile.txt', 'a');
$result = fwrite($handle, "\n A new line added to file");
fclose($handle);
echo $result;
echo '<h4>Showing file new content (fopen)</h4>';
$handle = fopen('textfile.txt', 'r');
$file_content = '';
while (!feof($handle)) {
    $file_content .= fgets($handle) . '<br>';
}
fclose($handle);
echo $file_content;
// Writing to a file.
echo '<h4>Writing to file (file_put_contents) - write from beginning</h4>';
// a for append, w for writing from scratch
$result = file_put_contents('textfile.txt', "\n A line added to file with file_put_contents function");
echo $result;
show_file_content();
// Writing to a file.
echo '<h4>Writing to file (file_put_contents) - append</h4>';
// a for append, w for writing from scratch
$result = file_put_contents('textfile.txt', "\n A line added to file with file_put_contents function with append flag", FILE_APPEND);
echo $result;
show_file_content();
// Writing to a file.
echo '<h4>Resetting the file to initial state</h4>';
// a for append, w for writing from scatch
$handle = fopen('textfile.txt', 'w');
$result = fwrite($handle, "This is a text file. \nWe use it's content to demonstrate reading and writing to the file.");
fclose($handle);
echo $result;
function show_file_content()
{
    // Show file content a file.
    echo '<h4>Current file content:</h4>';
    $file_content = file_get_contents('textfile.txt');
    $file_content = str_replace("\n", '<br>', $file_content);
    echo $file_content;
}