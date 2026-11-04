<?php
$this->load->view('bluewhale/auth_open', array('bw_portal' => 'admin', 'bw_show_switch' => false));
?>
                    <h2 class="bw-title">Choose a new password</h2>
                    <p class="bw-lead">Pick a strong password you haven&rsquo;t used before, then sign in again.</p>

                    <?php if (isset($error_message)) { ?>
                        <div class="bw-alert bw-alert--error" role="alert"><?php echo bw_icon('alert'); ?><p><?php echo $error_message; ?></p></div>
                    <?php } ?>
                    <?php if ($this->session->flashdata('message')) { ?>
                        <div class="bw-alert bw-alert--error" role="alert"><?php echo bw_icon('alert'); ?><p><?php echo $this->session->flashdata('message'); ?></p></div>
                    <?php } ?>

                    <form action="<?php echo site_url('admin/resetpassword/' . $verification_code) ?>" method="post" data-bw-form>
                        <?php echo $this->customlib->getCSRF(); ?>
                        <?php
                        echo bw_password_field(array(
                            'id'           => 'form-password',
                            'label'        => $this->lang->line('password'),
                            'error'        => form_error('password'),
                            'autocomplete' => 'new-password',
                            'autofocus'    => true,
                        ));
                        echo bw_password_field(array(
                            'name'         => 'confirm_password',
                            'id'           => 'form-confirm_password',
                            'label'        => $this->lang->line('confirm_password'),
                            'error'        => form_error('confirm_password'),
                            'autocomplete' => 'new-password',
                        ));
                        ?>
                        <button type="submit" class="bw-btn">
                            <span><?php echo $this->lang->line('submit'); ?></span>
                            <?php echo bw_icon('arrow-right'); ?>
                            <span class="bw-btn__spinner" aria-hidden="true"></span>
                        </button>
                    </form>

                    <p class="bw-help"><a class="bw-back" href="<?php echo site_url('site/login') ?>"><?php echo bw_icon('arrow-left'); ?> Back to <?php echo $this->lang->line('admin_login'); ?></a></p>
<?php $this->load->view('bluewhale/auth_close'); ?>
