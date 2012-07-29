    <div class="content col grid-24">
      <div class="contentHead">
        <h1><?php echo $name; ?></h1>
      </div>
      <div class="contentBody">
        <section>
          <p class="error">
            <strong><?php echo __d('cake', 'Error'); ?>: </strong>
<?php echo __d('cake', 'An Internal Error Has Occurred.'); ?>
          </p>
<?php
if (Configure::read('debug') > 0 ):
	echo $this->element('exception_stack_trace');
endif;
?>
        </section>
      </div>
    </div>
