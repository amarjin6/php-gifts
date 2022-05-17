<?php
error_reporting(0);
class FileManager
{

    public function display()
    {
        $dir = '';
        $files = scandir($dir, 1);
        if (count(array($files)) == 2) {
            echo "<h2>Empty</h2>";
        } else {
            for ($i = 0; $i < count(array($files)) - 2; $i++) {
                echo "<br>";
                echo "<h3 style='display: inline-block;'>";
                echo $i + 1 . ") " . $files[$i];
                echo "</h3>";
                echo "<form method='post' style='display: inline-block; margin-left: 10px;'>";
                echo "<input type='hidden' name='name' value='" . $i . "'/>";
                echo "<input type='submit' name='download' value='Download'/>";
                echo "</form>";
                echo "<form method='post' style='display: inline-block; margin-left: 10px'>";
                echo "<input type='hidden' name='name' value='" . $i . "'/>";
                echo "<input type='submit' name='delete' value='Delete'/>";
                echo "</form>";
                echo "</div>";
            }
        }
    }

    public function upload($files)
    {
        if ($files && $files["filename"]["error"] == UPLOAD_ERR_OK) {
            $name = "server/" . $files["filename"]["name"];
            move_uploaded_file($files["filename"]["tmp_name"], $name);
            echo "File uploaded!<br>";
        }

    }

    public function download($name)
    {
        $dir = 'server';
        $files = scandir($dir, 1);
        $file = $files[$name];
        $file_path = 'server/' . $file;
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mime = finfo_file($finfo, $file_path);
        header('Content-Disposition: attachment; filename="' . basename($file_path) . '"');
        header('Content-Type: ' . $mime);
        header('Content-Length: ' . filesize($file_path));
        header('Connection: close');
        echo file_get_contents($file_path);
    }

    public function delete($name)
    {
        $dir = 'server';
        $files = scandir($dir, 1);
        $file = $files[$name];
        $filepath = "server/" . $file;
        unlink($filepath);
    }

    public function showTop()
    {
        echo "<!DOCTYPE html>
                <html>
                <head>
                    <title>Task 1</title>
                    <meta charset='utf-8' />
                </head>
                <body>";
        echo "<form method='post' enctype='multipart/form-data'>
          Choose file:
          <br>
          <input type='file' name='filename' size='10' value='Choose file' style='
          background-color: #4CAF50; /* Green */
          border: none;
          color: white;
          padding: 15px 32px;
          text-align: center;
          text-decoration: none;
          display: inline-block;
          font-size: 16px;
          '/>
          <br>
          <input type='submit' name='upload' value='Upload' style='  border: none;
            background-color: dodgerblue;
            color: white;
            margin-top: 5px;
            padding: 5px 20px;
            text-align: center;
            text-decoration: none;
            font-size: 16px;
            cursor: pointer'/>
          </form>";
    }

    public function showBot()
    {
        echo "</body>
            </html>";
    }


}