<h2>Single upload</h2>
<form method="post" action="core/upload.php" enctype="multipart/form-data">
    <input type="file" name="image">
    <button type="submit">Upload</button>
</form>
<h2>Multi Upload</h2>
<form method="post" action="core/multiupload.php" enctype="multipart/form-data">
    <input type="file" name="images[]">
    <input type="file" name="images[]">
    <input type="file" name="images[]">
    <button type="submit">Upload</button>
</form>
<style>
    * {
        font-size: 26px;
    }
    input, button {
        display: block;
        margin-bottom: 10px;
    }
</style>