<?php
/**
 * BlueWhale Stack auth shell — closing half (form panel footer + scripts).
 * Pair with bluewhale/auth_open.
 */
$titleresult = $this->customlib->getTitleName();
$bw_hospital = !empty($school['name']) ? $school['name'] : (!empty($titleresult["name"]) ? $titleresult["name"] : "");
?>
                </div><!-- /.bw-form-wrap -->

                <footer class="bw-foot">
                    <span>&copy; <?php echo date('Y'); ?> <?php echo $bw_hospital !== '' ? htmlspecialchars($bw_hospital, ENT_QUOTES, 'UTF-8') . ' &middot; ' : ''; ?>Powered by BlueWhale Stack</span>
                </footer>
            </main>
        </div><!-- /.bw-auth -->
        <script src="<?php echo base_url(); ?>backend/bluewhale/js/bw-auth.js"></script>
    </body>
</html>
