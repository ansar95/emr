<html>
    <head>
        <title>import</title>
    </head>
    <body>
        <?php if(!empty($this->session->flashdata('status'))){ ?>
        <?php echo $this->session->flashdata('status'); ?>
        <?php } ?>
        <br><br>
        <form action="<?php base_url('Jasamedikrawatjalanimport/import_excel'); ?>" method="post" enctype="multipart/form-data">
            <input type="file" name="fileExcel">
            <button type="submit">Import</button>
        </form>
    </body>
</html>