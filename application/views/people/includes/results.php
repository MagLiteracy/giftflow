<?php if(!empty($results)) { ?>

	<?php if(!$row) { ?>
		<!-- Results List -->
		<ul class='results_list users <?php if($mini){ echo "mini"; } ?>'>
	<?php } ?>
	
		<?php foreach($results as $key=>$val) {?>
			<?php if($val->status != 'disabled') { ?>
		
			<!-- Result Row -->
			<li class='result_row users clearfix'>
			
				<!-- Image -->
				<a class='result_image user_image medium' href='<?php echo site_url('people/'.$val->id); ?>'>
					<img src='<?php if(isset($val->photo->url)) { echo $val->photo->thumb_url; } else { echo $val->default_photo->thumb_url; }?>'>
				</a>
				
				<!-- Metadata -->
				<div class='result_meta'>
				
					<!-- Screen Name -->
					<a href='<?php echo site_url('people/'.$val->id); ?>' class='title'>
						<?php echo $val->screen_name;?>
					</a>
					
					<?php if(in_array("location",$include) && !empty($val->location->city) && !empty($val->location->state)){ ?>
					
						<!-- Location -->
						<span class='metadata location'>
							<em>in</em> <?php echo $val->location->address; ?> <?php if(!in_array('created', $include)) { echo '('.round($val->location->distance).' miles away)'; } ?>
						</span>
						
					<?php } ?>
					
					<?php if(in_array("distance",$include) && !empty($val->location->distance)){ ?>
						<!-- Distance -->
						<span class='metadata distance'>
							<em>located</em>
							<?php echo round($val->location->distance);?> miles away
						</span>
					<?php } ?>
					<?php if(in_array("created",$include) && !empty($val->created)) {?>
						<!-- Created -->
						<span class="metadata created">
							<em>joined
							<?php echo user_date($val->created,"F jS Y");?>
							</em>
						</span>
					<?php } ?>
				</div>
				
				<!-- Follow / Following Button -->
				<?php if(isset($val->am_following) && $val->am_following){ ?>
					<div class='css_right'>
						<i class='icon-ok'></i> Following
					</div>
				<?php } else { ?>
					<button class="btn follow css_right" rel="<?php echo $val->id; ?>">
						<i class="icon-plus"></i>
						Follow
					</button>
				<?php } ?>
				
			</li>
			<!-- eof Result Row -->
			
		<?php } ?>
	<?php } ?>
	<?php if(!$row) { ?>
		</ul>
		<!-- eof Results List -->
	<?php } ?>
	
<?php } ?>
