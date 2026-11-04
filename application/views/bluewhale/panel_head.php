<?php
/* BlueWhale HMS panel theme — include as the last thing in <head> of the admin and patient layouts. */
$this->load->helper('bluewhale');
?>
        <?php echo bw_favicon_links(); ?>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Russo+One&display=swap">
        <link rel="stylesheet" href="<?php echo base_url(); ?>backend/bluewhale/css/bw-theme.css">
