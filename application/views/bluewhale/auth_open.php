<?php
/**
 * BlueWhale Stack auth shell — opening half (head, photo brand panel, top of the form panel).
 * Pair with bluewhale/auth_close.
 *
 * Variables:
 *   $bw_portal       'admin' | 'patient'
 *   $bw_show_switch  bool   show the Staff / Patient segmented switch (default true)
 *   $notice          array  (optional) CMS notices shown on the brand panel
 *   $school          array  (optional) hospital settings row
 */
$this->load->helper('bluewhale');

$bw_portal      = (isset($bw_portal) && $bw_portal === 'patient') ? 'patient' : 'admin';
$bw_show_switch = isset($bw_show_switch) ? (bool) $bw_show_switch : true;

$titleresult = $this->customlib->getTitleName();
$title_name  = !empty($titleresult["name"]) ? $titleresult["name"] : "Hospital Name Title";
$bw_hospital = !empty($school['name']) ? $school['name'] : $title_name;

$bw_copy = array(
    'admin'   => array(
        'photo'    => 'login-staff.jpg',
        'pill'     => 'Staff &amp; Admin',
        'h1a'      => 'Every ward.',
        'h1b'      => 'One command center.',
        'lead'     => 'OPD, IPD, pharmacy, pathology, radiology, billing and HR in a single, secure workspace.',
        'features' => array(
            array('stethoscope', 'OPD &amp; IPD', 'Admissions, beds and discharges'),
            array('flask', 'Pharmacy &amp; Lab', 'Stock, pathology and radiology'),
            array('receipt', 'Billing &amp; TPA', 'Charges, payments and insurance'),
            array('users', 'Staff &amp; Payroll', 'Roles, attendance and payroll'),
        ),
    ),
    'patient' => array(
        'photo'    => 'login-patient.jpg',
        'pill'     => 'Patient Portal',
        'h1a'      => 'Your health.',
        'h1b'      => 'One secure portal.',
        'lead'     => 'Appointments, prescriptions, lab reports and hospital bills &mdash; available whenever you need them.',
        'features' => array(
            array('calendar', 'Appointments', 'Book, track or cancel visits'),
            array('pill', 'Prescriptions', 'Medicines from every OPD visit'),
            array('file', 'Lab reports', 'Pathology and radiology results'),
            array('card', 'Bills &amp; payments', 'View and pay bills online'),
        ),
    ),
);
$c         = $bw_copy[$bw_portal];
$bw_photo  = base_url() . 'backend/bluewhale/img/' . $c['photo'];
?><!DOCTYPE html>
<html lang="en" data-theme="light">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="theme-color" content="#002FA7">
        <title><?php echo $title_name; ?></title>
        <script>
            (function () { // apply the saved / system theme before first paint
                var t = null;
                try { t = localStorage.getItem('bw-theme'); } catch (e) {}
                if (t !== 'dark' && t !== 'light') {
                    t = (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) ? 'dark' : 'light';
                }
                document.documentElement.setAttribute('data-theme', t);
            })();
        </script>
        <?php echo bw_favicon_links(); ?>
        <link rel="preload" as="image" href="<?php echo $bw_photo; ?>">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Russo+One&display=swap">
        <link rel="stylesheet" href="<?php echo base_url(); ?>backend/bluewhale/css/bw-auth.css">
    </head>
    <body class="bw-auth-body bw-portal-<?php echo $bw_portal; ?>">
        <div class="bw-auth">

            <aside class="bw-brand">
                <img class="bw-brand__photo" src="<?php echo $bw_photo; ?>" alt="" decoding="async">
                <div class="bw-brand__tint" aria-hidden="true"></div>
                <div class="bw-brand__shade" aria-hidden="true"></div>

                <div class="bw-brand__top">
                    <a class="bw-lockup" href="<?php echo base_url(); ?>" title="<?php echo htmlspecialchars($bw_hospital, ENT_QUOTES, 'UTF-8'); ?>">
                        <?php echo bw_logomark('bw-logomark', 'bw-cut-hero'); ?>
                        <span class="bw-wordmark"><?php echo BW_APP_NAME; ?></span>
                    </a>
                    <span class="bw-pill"><?php echo $c['pill']; ?></span>
                </div>

                <div class="bw-brand__bottom">
                    <h1 class="bw-hero-title"><?php echo $c['h1a']; ?> <span><?php echo $c['h1b']; ?></span></h1>
                    <p class="bw-hero-lead"><?php echo $c['lead']; ?></p>

                    <ul class="bw-points">
                        <?php foreach ($c['features'] as $f) { ?>
                            <li>
                                <span class="bw-points__icon"><?php echo bw_icon($f[0]); ?></span>
                                <span><b><?php echo $f[1]; ?></b><small><?php echo $f[2]; ?></small></span>
                            </li>
                        <?php } ?>
                    </ul>

                    <?php if (!empty($notice)) { ?>
                        <div class="bw-notices">
                            <p class="bw-notices__title"><?php echo bw_icon('bell'); ?> <?php echo $this->lang->line('what_is_new_in'); ?> <?php echo htmlspecialchars($bw_hospital, ENT_QUOTES, 'UTF-8'); ?></p>
                            <ul>
                                <?php foreach (array_slice($notice, 0, 2) as $notice_value) { ?>
                                    <li><a href="<?php echo site_url('read/' . $notice_value['slug']); ?>"><?php echo $notice_value['title']; ?></a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    <?php } ?>
                </div>
            </aside>

            <main class="bw-main">
                <div class="bw-main__bar">
                    <button type="button" class="bw-theme-toggle" data-bw-theme-toggle aria-pressed="false" aria-label="Toggle dark mode" title="Switch to dark mode">
                        <?php echo bw_icon('moon', 'bw-icon-moon'); ?>
                        <?php echo bw_icon('sun', 'bw-icon-sun'); ?>
                    </button>
                </div>

                <div class="bw-form-wrap">
                    <?php if ($bw_show_switch) { ?>
                        <nav class="bw-switch" aria-label="Choose how to sign in">
                            <a href="<?php echo site_url('site/login'); ?>" class="<?php echo $bw_portal === 'admin' ? 'is-active' : ''; ?>"<?php echo $bw_portal === 'admin' ? ' aria-current="page"' : ''; ?>><?php echo bw_icon('stethoscope'); ?> Staff / Admin</a>
                            <a href="<?php echo site_url('site/userlogin'); ?>" class="<?php echo $bw_portal === 'patient' ? 'is-active' : ''; ?>"<?php echo $bw_portal === 'patient' ? ' aria-current="page"' : ''; ?>><?php echo bw_icon('user'); ?> Patient</a>
                        </nav>
                    <?php } ?>
