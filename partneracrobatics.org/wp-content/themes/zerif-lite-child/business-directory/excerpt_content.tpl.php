<div class="listing-title">
    <?php echo $fields->t_title->value; ?>
</div>

<div class="excerpt-content">
    <?php if ( $images->thumbnail ): ?>
        <?php echo $images->thumbnail->html; ?>
    <?php endif; ?>

    <div class="listing-details">

			<div>
			<?php echo ($fields->level->value); ?>
			</div>

        <?php if ( $fields->_h_address ): ?>
        <div class="address-info">
            <label><?php _ex( '', 'themes/default', 'WPBDM' ); ?></label>
            <?php echo $fields->_h_address; ?>
        </div>
        <?php endif; ?>


    </div>

</div>
