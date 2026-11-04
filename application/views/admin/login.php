<?php
$this->load->view('bluewhale/auth_open', array('bw_portal' => 'admin'));
$username_error = form_error('username');
?>
                    <h2 class="bw-title">Welcome back</h2>
                    <p class="bw-lead">Sign in to manage your hospital&rsquo;s departments, patients and staff.</p>

                    <?php if (isset($error_message)) { ?>
                        <div class="bw-alert bw-alert--error" role="alert"><?php echo bw_icon('alert'); ?><p><?php echo $error_message; ?></p></div>
                    <?php } ?>
                    <?php if ($this->session->flashdata('message')) { ?>
                        <div class="bw-alert bw-alert--ok" role="status"><?php echo bw_icon('check'); ?><p><?php echo $this->session->flashdata('message'); ?></p></div>
                    <?php } ?>

                    <form action="<?php echo site_url('site/login') ?>" method="post" data-bw-form>
                        <?php echo $this->customlib->getCSRF(); ?>

                        <div class="bw-field">
                            <label class="bw-label" for="email"><?php echo $this->lang->line('email'); ?></label>
                            <div class="bw-control">
                                <?php echo bw_icon('mail'); ?>
                                <input type="text" name="username" id="email" class="bw-input<?php echo $username_error ? ' is-invalid' : ''; ?>"
                                       value="<?php echo set_value('username'); ?>" placeholder="you@hospital.com"
                                       autocomplete="username" inputmode="email" autocapitalize="none" spellcheck="false" autofocus required>
                            </div>
                            <?php if ($username_error) { ?><div class="bw-field__error"><?php echo $username_error; ?></div><?php } ?>
                        </div>

                        <?php
                        echo bw_password_field(array(
                            'label' => $this->lang->line('password'),
                            'error' => form_error('password'),
                            'aside' => '<a href="' . site_url('site/forgotpassword') . '">Forgot?</a>',
                        ));
                        ?>

                        <button type="submit" class="bw-btn">
                            <span><?php echo $this->lang->line('sign_in'); ?></span>
                            <?php echo bw_icon('arrow-right'); ?>
                            <span class="bw-btn__spinner" aria-hidden="true"></span>
                        </button>
                    </form>

                    <p class="bw-help">Need an account? Ask your hospital administrator.</p>
<?php $this->load->view('bluewhale/auth_close'); ?>
