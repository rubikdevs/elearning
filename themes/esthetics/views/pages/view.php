<?php	$this->breadcrumbs=array(
	'Modules'=>array('modules/index'),
	'Module #'.$model->module_code=>array('modules/view&id='.$model->module_code),
	'Viewing Page #'.$model->page_code
	);?>
	<script>

		CKEDITOR.disableAutoInline = true;

		$( document ).ready( function() {
			$( '#editor1' ).ckeditor(); // Use CKEDITOR.replace() if element is <textarea>.
			$( '#editable' ).ckeditor(); // Use CKEDITOR.inline().
		} );

		function setValue() {
			$( '#editor1' ).val( $( 'input#val' ).val() );
		}

	</script>

	<div class="non-shortable-content">
		<h1>Viewing page #<?php echo $model->page_code; ?></h1>
	</div>
	
	<div class="box _75">
		<div class="box-header"> Description</div>
		<div class="box-content padd-10">
			<div id="editable" contenteditable="false">
				<?php echo $model->description; ?>
			</div>
		</div>
	</div>	
	
	<div class="box _75">
		<div class="box-header"> Question</div>
		<div class="box-content padd-10">
			<?php echo $question->description; ?>
		</div>
	</div>

	<div class="box _75">
		<div class="box-header"> Correct Answer</div>
		<div class="box-content padd-10">
			<?php echo $question->correct_answer; ?>
		</div>
	</div>	

	<div class="box _75">
		<div class="box-header"> Minimum Time</div>
		<div class="box-content padd-10">
			<?php echo $model->minimum_time; ?>
		</div>
	</div>	