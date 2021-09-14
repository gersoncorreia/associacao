
<body>
 
    <?php
    if (isset($_GET['p'])):
        try {
            Url::mudaUrl($_GET['p']);
        } catch (Exception $e) {
            echo '<div id="erro">' . $e->getMessage() . '</div>';
        }
    else:

        Url::mudaUrl('principal');
    endif;
    ?>
 
</body>

