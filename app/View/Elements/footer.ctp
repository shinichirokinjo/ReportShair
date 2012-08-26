<footer class="footer wrap">
  <nav class="footerNav">
    <ul>
      <li><a href="/about/" title="<?=__('About')?>"><?=__('About')?></a></li>
      <li><a href="http://reportshair.tumblr.com/" title="<?=__('Blog')?>" target="_blank"><?=__('Blog')?></a></li>
      <li><a href="/terms" title="<?=__('Terms')?>"><?=__('Terms')?></a></li>
      <li><a href="/policy" title="<?=__('Policy')?>"><?=__('Policy')?></a></li>
      <li><a href="/contact/" title="<?=__('Contact')?>"><?=__('Contact')?></a></li>
    </ul>
  </nav>
  <p class="copright"><small>&copy; 2012 ReportShair.</small></p>
</footer><!-- .footer -->
<?php if ($loggedin): ?>
<script type="text/javascript">
$(function() {
  $(".createNav a").click(function() {
    RS.overlay.open('/reports/dialog/report', 'ajax');
    return false;
  });
  $(".createEvent a").click(function() {
    RS.overlay.open('/reports/dialog/event', 'ajax');
    return false;
  });
});
</script>
<?php endif; ?>
