<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * BlueWhale Stack brand helpers used by the sign-in / password pages.
 * Icons are stroke icons drawn on a 24px grid (Lucide-style, ISC licensed shapes).
 */

if (!defined('BW_APP_NAME')) {
    /** Product name shown in lockups next to the logomark. */
    define('BW_APP_NAME', 'BlueWhale HMS');
}

if (!function_exists('bw_favicon_links')) {
    /** Browser-tab / home-screen icons (brand-blue tile with the white logomark). */
    function bw_favicon_links()
    {
        $img = base_url() . 'backend/bluewhale/img/';
        return '<link rel="icon" type="image/svg+xml" href="' . $img . 'favicon.svg">' . "\n"
            . '        <link rel="icon" type="image/png" sizes="32x32" href="' . $img . 'favicon-32.png">' . "\n"
            . '        <link rel="icon" type="image/png" sizes="192x192" href="' . $img . 'favicon-192.png">' . "\n"
            . '        <link rel="apple-touch-icon" sizes="180x180" href="' . $img . 'apple-touch-icon.png">' . "\n";
    }
}

if (!function_exists('bw_whale_path')) {
    /** Whale silhouette from the BlueWhale logomark, in its 406 x 405 grid. */
    function bw_whale_path()
    {
        return 'M27 13C29.5 11 32.3 9.7 39 11C45.7 12.3 56.5 16.5 67 21C77.5 25.5 91.2 32.5 102 38C112.8 43.5 123.7 50.8 132 54C140.3 57.2 145.3 55.2 152 57C158.7 58.8 164.8 61.3 172 65C179.2 68.7 188.8 75.3 195 79C201.2 82.7 206.7 85.7 209 87C212.8 86.3 221.5 83 232 83C242.5 83 259.5 84 272 87C284.5 90 298 96.3 307 101C316 105.7 322.2 111.3 326 115C329.8 118.7 330.7 120.8 330 123C329.3 125.2 328.3 127.5 322 128C315.7 128.5 302.3 126 292 126C281.7 126 265.3 127.7 260 128C262.5 131.8 270.5 141.8 275 151C279.5 160.2 283.7 172.3 287 183C290.3 193.7 293 205.5 295 215C297 224.5 298.8 230.8 299 240C299.2 249.2 297.5 260.5 296 270C294.5 279.5 291.8 289.5 290 297C288.2 304.5 285.8 312 285 315C288 317.7 297.8 324.8 303 331C308.2 337.2 312.8 344.7 316 352C319.2 359.3 321.3 368.3 322 375C322.7 381.7 320.3 389.2 320 392C318.5 391.2 315.2 390.3 311 387C306.8 383.7 300.7 376.5 295 372C289.3 367.5 281.7 364.2 277 360C272.3 355.8 268.7 349.2 267 347C265 346.8 259.5 347.3 255 346C250.5 344.7 244.7 340.5 240 339C235.3 337.5 231.3 336.5 227 337C222.7 337.5 216.2 341.2 214 342C214.8 340 215.8 333.8 219 330C222.2 326.2 228.3 321.7 233 319C237.7 316.3 242.2 315 247 314C251.8 313 259.5 313.2 262 313C261.8 308.7 262.3 294.8 261 287C259.7 279.2 257.3 272.8 254 266C250.7 259.2 245.8 252 241 246C236.2 240 230.3 234.2 225 230C219.7 225.8 214.3 223.8 209 221C203.7 218.2 198.7 215.7 193 213C187.3 210.3 181.3 207 175 205C168.7 203 158.3 201.7 155 201C155.2 204.2 155.2 213.5 156 220C156.8 226.5 158.7 233.8 160 240C161.3 246.2 163 251.8 164 257C165 262.2 165.7 268.7 166 271C164.2 270.5 159.2 270.7 155 268C150.8 265.3 145.3 260.5 141 255C136.7 249.5 132.7 242.5 129 235C125.3 227.5 122.3 219 119 210C115.7 201 112.2 190.2 109 181C105.8 171.8 102.3 161.3 100 155C97.7 148.7 97.7 147.5 95 143C92.3 138.5 87.8 132.2 84 128C80.2 123.8 75.7 121.5 72 118C68.3 114.5 65.8 112.2 62 107C58.2 101.8 53.2 94.3 49 87C44.8 79.7 40.5 71 37 63C33.5 55 30.2 45.7 28 39C25.8 32.3 24.2 27.3 24 23C23.8 18.7 24.5 15 27 13Z';
    }
}

if (!function_exists('bw_icon')) {
    /**
     * Inline SVG icon. Inherits colour from `currentColor`.
     *
     * @param string $name  icon key
     * @param string $class extra CSS class
     */
    function bw_icon($name, $class = '')
    {
        static $icons = array(
            'stethoscope' => '<path d="M4.8 2.3A.3.3 0 1 0 5 2H4a2 2 0 0 0-2 2v5a6 6 0 0 0 6 6 6 6 0 0 0 6-6V4a2 2 0 0 0-2-2h-1a.2.2 0 1 0 .3.3"/><path d="M8 15v1a6 6 0 0 0 6 6 6 6 0 0 0 6-6v-4"/><circle cx="20" cy="10" r="2"/>',
            'flask'       => '<path d="M10 2v7.53a2 2 0 0 1-.21.9L4.72 20.55a1 1 0 0 0 .9 1.45h12.76a1 1 0 0 0 .9-1.45l-5.07-10.13A2 2 0 0 1 14 9.53V2"/><path d="M8.5 2h7"/><path d="M7 16h10"/>',
            'receipt'     => '<path d="M4 2v20l2-1 2 1 2-1 2 1 2-1 2 1 2-1 2 1V2l-2 1-2-1-2 1-2-1-2 1-2-1-2 1Z"/><path d="M16 8h-6a2 2 0 1 0 0 4h4a2 2 0 1 1 0 4H8"/><path d="M12 17.5v-11"/>',
            'users'       => '<path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/>',
            'calendar'    => '<rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/><path d="m9 16 2 2 4-4"/>',
            'pill'        => '<path d="m10.5 20.5 10-10a4.95 4.95 0 1 0-7-7l-10 10a4.95 4.95 0 1 0 7 7Z"/><path d="m8.5 8.5 7 7"/>',
            'file'        => '<path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"/><path d="M14 2v4a2 2 0 0 0 2 2h4"/><path d="M10 9H8M16 13H8M16 17H8"/>',
            'card'        => '<rect x="2" y="5" width="20" height="14" rx="2"/><path d="M2 10h20"/><path d="M6 15h4"/>',
            'mail'        => '<rect x="2" y="4" width="20" height="16" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/>',
            'user'        => '<circle cx="12" cy="8" r="5"/><path d="M20 21a8 8 0 0 0-16 0"/>',
            'lock'        => '<rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/>',
            'eye'         => '<path d="M2.06 12.35a1 1 0 0 1 0-.7 10.75 10.75 0 0 1 19.88 0 1 1 0 0 1 0 .7 10.75 10.75 0 0 1-19.88 0"/><circle cx="12" cy="12" r="3"/>',
            'eye-off'     => '<path d="M10.73 5.08A10.43 10.43 0 0 1 12 5c7 0 10 7 10 7a13.16 13.16 0 0 1-1.67 2.68"/><path d="M6.61 6.61A13.53 13.53 0 0 0 2 12s3 7 10 7a9.74 9.74 0 0 0 5.39-1.61"/><path d="M9.88 9.88a3 3 0 1 0 4.24 4.24"/><path d="m2 2 20 20"/>',
            'moon'        => '<path d="M12 3a6 6 0 0 0 9 9 9 9 0 1 1-9-9Z"/>',
            'sun'         => '<circle cx="12" cy="12" r="4"/><path d="M12 2v2M12 20v2M4.93 4.93l1.41 1.41M17.66 17.66l1.41 1.41M2 12h2M20 12h2M6.34 17.66l-1.41 1.41M19.07 4.93l-1.41 1.41"/>',
            'arrow-right' => '<path d="M5 12h14M12 5l7 7-7 7"/>',
            'arrow-left'  => '<path d="m12 19-7-7 7-7M19 12H5"/>',
            'shield'      => '<path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"/><path d="m9 12 2 2 4-4"/>',
            'alert'       => '<circle cx="12" cy="12" r="10"/><path d="M12 8v4M12 16h.01"/>',
            'check'       => '<circle cx="12" cy="12" r="10"/><path d="m9 12 2 2 4-4"/>',
            'activity'    => '<path d="M22 12h-4l-3 9L9 3l-3 9H2"/>',
            'key'         => '<path d="m15.5 7.5 2.3 2.3a1 1 0 0 0 1.4 0l2.1-2.1a1 1 0 0 0 0-1.4L19 4"/><path d="m21 2-9.6 9.6"/><circle cx="7.5" cy="15.5" r="5.5"/>',
            'bell'        => '<path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9"/><path d="M10.3 21a1.94 1.94 0 0 0 3.4 0"/>',
        );
        if (!isset($icons[$name])) {
            return '';
        }
        $class = trim('bw-icon ' . $class);
        return '<svg class="' . $class . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">' . $icons[$name] . '</svg>';
    }
}

if (!function_exists('bw_password_field')) {
    /**
     * Password input with show/hide toggle, Caps Lock hint and inline validation error.
     *
     * Options: name, id, label, error (HTML from form_error), autocomplete, aside (HTML shown
     * at the right of the label, e.g. a "Forgot?" link), autofocus (bool).
     */
    function bw_password_field(array $opts)
    {
        $o = array_merge(array(
            'name'         => 'password',
            'id'           => 'password',
            'label'        => 'Password',
            'error'        => '',
            'autocomplete' => 'current-password',
            'aside'        => '',
            'autofocus'    => false,
        ), $opts);
        $id   = htmlspecialchars($o['id'], ENT_QUOTES, 'UTF-8');
        $caps = $id . '-caps';

        $html = '<div class="bw-field">';
        if ($o['aside'] !== '') {
            $html .= '<div class="bw-field__row"><label class="bw-label" for="' . $id . '">' . $o['label'] . '</label>' . $o['aside'] . '</div>';
        } else {
            $html .= '<label class="bw-label" for="' . $id . '">' . $o['label'] . '</label>';
        }
        $html .= '<div class="bw-control">' . bw_icon('lock')
            . '<input type="password" name="' . htmlspecialchars($o['name'], ENT_QUOTES, 'UTF-8') . '" id="' . $id . '"'
            . ' class="bw-input bw-input--pw' . ($o['error'] ? ' is-invalid' : '') . '"'
            . ' placeholder="&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;"'
            . ' autocomplete="' . htmlspecialchars($o['autocomplete'], ENT_QUOTES, 'UTF-8') . '"'
            . ' data-bw-caps="' . $caps . '" required' . ($o['autofocus'] ? ' autofocus' : '') . '>'
            . '<button type="button" class="bw-pw-toggle" data-bw-pw-toggle aria-controls="' . $id . '" aria-pressed="false" aria-label="Show password">'
            . bw_icon('eye', 'bw-icon-show') . bw_icon('eye-off', 'bw-icon-hide') . '</button>'
            . '</div>'
            . '<p class="bw-caps" id="' . $caps . '" aria-live="polite">Caps Lock is on</p>';
        if ($o['error']) {
            $html .= '<div class="bw-field__error">' . $o['error'] . '</div>';
        }
        return $html . '</div>';
    }
}

if (!function_exists('bw_logomark')) {
    /**
     * Inline logomark: four stacked blocks with the whale cut out, so the whale always
     * shows whatever sits behind it (white blocks on the blue panel, blue blocks on white).
     */
    function bw_logomark($class = 'bw-logomark', $id = 'bw-cut')
    {
        return '<svg class="' . $class . '" viewBox="0 0 406 405" aria-hidden="true" focusable="false">'
            . '<defs><mask id="' . $id . '" maskUnits="userSpaceOnUse" x="0" y="0" width="406" height="405">'
            . '<rect width="406" height="405" fill="#fff"/><path fill="#000" d="' . bw_whale_path() . '"/></mask></defs>'
            . '<g fill="currentColor" mask="url(#' . $id . ')">'
            . '<rect x="0" y="0" width="197" height="295"/><rect x="0" y="306" width="197" height="99"/>'
            . '<rect x="209" y="0" width="197" height="197"/><rect x="209" y="208" width="197" height="197"/>'
            . '</g></svg>';
    }
}
