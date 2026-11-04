/* BlueWhale Stack — sign-in page behaviour (no dependencies) */
(function () {
    'use strict';
    var root = document.documentElement;
    var STORE = 'bw-theme';

    function setTheme(theme) {
        root.setAttribute('data-theme', theme);
        try { localStorage.setItem(STORE, theme); } catch (e) { /* storage blocked: keep for this page only */ }
        var btn = document.querySelector('[data-bw-theme-toggle]');
        if (btn) {
            btn.setAttribute('aria-pressed', theme === 'dark' ? 'true' : 'false');
            btn.setAttribute('title', theme === 'dark' ? 'Switch to light mode' : 'Switch to dark mode');
        }
    }

    document.addEventListener('DOMContentLoaded', function () {
        // Dark / light toggle (initial theme is applied inline in <head> to avoid a flash)
        var toggle = document.querySelector('[data-bw-theme-toggle]');
        if (toggle) {
            setTheme(root.getAttribute('data-theme') === 'dark' ? 'dark' : 'light');
            toggle.addEventListener('click', function () {
                setTheme(root.getAttribute('data-theme') === 'dark' ? 'light' : 'dark');
            });
        }

        // Show / hide password
        Array.prototype.forEach.call(document.querySelectorAll('[data-bw-pw-toggle]'), function (btn) {
            var input = document.getElementById(btn.getAttribute('aria-controls'));
            if (!input) { return; }
            btn.addEventListener('click', function () {
                var show = input.type === 'password';
                input.type = show ? 'text' : 'password';
                btn.setAttribute('aria-pressed', show ? 'true' : 'false');
                btn.setAttribute('aria-label', show ? 'Hide password' : 'Show password');
                input.focus();
            });
        });

        // Caps Lock hint on password fields
        Array.prototype.forEach.call(document.querySelectorAll('input[type="password"][data-bw-caps]'), function (input) {
            var hint = document.getElementById(input.getAttribute('data-bw-caps'));
            if (!hint) { return; }
            function check(e) {
                if (e.getModifierState) { hint.classList.toggle('is-on', e.getModifierState('CapsLock')); }
            }
            input.addEventListener('keydown', check);
            input.addEventListener('keyup', check);
            input.addEventListener('blur', function () { hint.classList.remove('is-on'); });
        });

        // Clear the red state as soon as the user edits a field
        Array.prototype.forEach.call(document.querySelectorAll('.bw-input.is-invalid'), function (input) {
            input.addEventListener('input', function () { input.classList.remove('is-invalid'); });
        });

        // Loading state on submit (prevents double posts)
        Array.prototype.forEach.call(document.querySelectorAll('form[data-bw-form]'), function (form) {
            form.addEventListener('submit', function () {
                var btn = form.querySelector('.bw-btn');
                if (btn) { btn.classList.add('is-loading'); btn.setAttribute('aria-busy', 'true'); }
            });
        });

        // If the page is restored from the back/forward cache, drop the spinner
        window.addEventListener('pageshow', function () {
            Array.prototype.forEach.call(document.querySelectorAll('.bw-btn.is-loading'), function (btn) {
                btn.classList.remove('is-loading');
                btn.removeAttribute('aria-busy');
            });
        });
    });
})();
