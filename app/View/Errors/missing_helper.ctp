    <div class="content col grid-24">
      <div class="contentHead">
        <h1><?php echo __d('cake', 'Missing Helper'); ?></h1>
      </div>
      <div class="contentBody">
        <section>
          <p class="error">
            <strong><?php echo __d('cake', 'Error'); ?>: </strong>
          </p>
<?php
if (Configure::read('debug') > 0):
	echo $this->element('exception_stack_trace');
endif;
?>
        </section>
      </div>
    </div>
