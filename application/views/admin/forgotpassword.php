<?php
$this->load->view('bluewhale/auth_open', array('bw_portal' => 'admin', 'bw_show_switch' => false));
$email_error = form_error('email');
?>
                    <h2 class="bw-title">Reset your password</h2>
                    <p class="bw-lead">Enter the email address of your staff account and we&rsquo;ll send you a link to choose a new password.</p>

                    <?php if (isset($error_message)) { ?>
                        <div class="bw-alert bw-alert--error" role="alert"><?php echo bw_icon('alert'); ?><p><?php echo $error_message; ?></p></div>
                    <?php } ?>
                    <?php if ($this->session->flashdata('message')) { ?>
                        <div class="bw-alert bw-alert--error" role="alert"><?php echo bw_icon('alert'); ?><p><?php echo $this->session->flashdata('message'); ?></p></div>
                    <?php } ?>

                    <form action="<?php echo site_url('site/forgotpassword') ?>" method="post" data-bw-form>
                        <?php echo $this->customlib->getCSRF(); ?>
                        <div class="bw-field">
                            <label class="bw-label" for="form-username"><?php echo $this->lang->line('email'); ?></label>
                            <div class="bw-control">
                                <?php echo bw_icon('mail'); ?>
                                <input type="email" name="email" id="form-username" class="bw-input<?php echo $email_error ? ' is-invalid' : ''; ?>"
                                       value="<?php echo set_value('email'); ?>" placeholder="you@hospital.com"
                                       autocomplete="email" autocapitalize="none" spellcheck="false" autofocus required>
                            </div>
                            <?php if ($email_error) { ?><div class="bw-field__error"><?php echo $email_error; ?></div><?php } ?>
                        </div>

                        <button type="submit" class="bw-btn">
                            <span><?php echo $this->lang->line('submit'); ?></span>
                            <?php echo bw_icon('arrow-right'); ?>
                            <span class="bw-btn__spinner" aria-hidden="true"></span>
                        </button>
                    </form>

                    <p class="bw-help"><a class="bw-back" href="<?php echo site_url('site/login') ?>"><?php echo bw_icon('arrow-left'); ?> Back to <?php echo $this->lang->line('admin_login'); ?></a></p>
<?php $this->load->view('bluewhale/auth_close'); ?>
