<?php

// Echo the image - timestamp appended to prevent caching
echo '<a href="index.php" id="refreshimg" title="Click en la imagen para refrescar"><img src="images/image.php?' . time() . '" width="132" height="46" alt="Captcha image"></a>';

?>
