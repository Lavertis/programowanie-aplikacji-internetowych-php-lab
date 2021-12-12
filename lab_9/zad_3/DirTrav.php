<?php
function download($patch = '.')
{
    $directory = @dir($patch) or die ('Brak dostępu do katalogu.');
    while ($file = $directory->read()) {
        $link = "$patch/$file";
        if (is_file("$patch/$file"))
            echo "<a href='$link'>$file</a><br>";
        else if (is_dir("$patch/$file"))
            echo "<a href='DirTrav.php?patch=$link'>$file</a><br>";
    }
    $directory->close();
}

if (!isset($_GET['patch']))
    download();
else
    download(str_replace('..', '', $_GET['patch']));
