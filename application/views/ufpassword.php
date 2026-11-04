<?php
$this->load->view('bluewhale/auth_open', array('bw_portal' => 'patient', 'bw_show_switch' => false));
$username_error = form_error('username');
$usertype_error = form_error('user[]');
?>
                    <h2 class="bw-title">Reset your password</h2>
                    <p class="bw-lead">Enter the email address you gave the hospital and we&rsquo;ll send you a link to choose a new password.</p>

                    <?php if (isset($error_message)) { ?>
                        <div class="bw-alert bw-alert--error" role="alert"><?php echo bw_icon('alert'); ?><p><?php echo $error_message; ?></p></div>
                    <?php } ?>
                    <?php if ($this->session->flashdata('message')) { ?>
                        <div class="bw-alert bw-alert--error" role="alert"><?php echo bw_icon('alert'); ?><p><?php echo $this->session->flashdata('message'); ?></p></div>
                    <?php } ?>

                    <form action="<?php echo site_url('site/ufpassword') ?>" method="post" data-bw-form>
                        <?php echo $this->customlib->getCSRF(); ?>
                        <div class="bw-field">
                            <label class="bw-label" for="form-username"><?php echo $this->lang->line('email'); ?></label>
                            <div class="bw-control">
                                <?php echo bw_icon('mail'); ?>
                                <input type="email" name="username" id="form-username" class="bw-input<?php echo $username_error ? ' is-invalid' : ''; ?>"
                                       value="<?php echo set_value('username'); ?>" placeholder="you@example.com"
                                       autocomplete="email" autocapitalize="none" spellcheck="false" autofocus required>
                            </div>
                            <?php if ($username_error) { ?><div class="bw-field__error"><?php echo $username_error; ?></div><?php } ?>
                        </div>

                        <div class="bw-field">
                            <span class="bw-label" style="margin-bottom:9px"><?php echo $this->lang->line('user_type'); ?></span>
                            <div class="bw-choice">
                                <label><input name="user[]" type="radio" value="patient" <?php echo set_radio('user[]', 'patient', true); ?>> Patient</label>
                            </div>
                            <?php if ($usertype_error) { ?><div class="bw-field__error"><?php echo $usertype_error; ?></div><?php } ?>
                        </div>

                        <button type="submit" class="bw-btn">
                            <span><?php echo $this->lang->line('submit'); ?></span>
                            <?php echo bw_icon('arrow-right'); ?>
                            <span class="bw-btn__spinner" aria-hidden="true"></span>
                        </button>
                    </form>

                    <p class="bw-help"><a class="bw-back" href="<?php echo site_url('site/userlogin') ?>"><?php echo bw_icon('arrow-left'); ?> Back to <?php echo $this->lang->line('user_login'); ?></a></p>
<?php $this->load->view('bluewhale/auth_close'); ?>
