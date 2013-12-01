<?php
/* @var $this TestController */

$this->breadcrumbs=array(
	'Test',
);
?>

<div class="box _75">
	<div class="box-header">
		TEST
	</div>
	<div class="box-content">
	<?php echo CHtml::link('Take new test',array('take','start'=>1)); ?>
	<table class="static_table" style="border:1px solid #dfdfdf">
	<thead>
		<th>Started</th>
		<th>Status</th>
		<th>Score</th>
	</thead>
	<tbody>
		<?php
			foreach ($tests as $i => $test) {
				echo '<tr>';
				if ((!$test->status) && ($this->getTimeLapsed($test->id)<=45.0))
				{

					echo '<td>'.$test->start_time.'</td>';
					if ($test->last == 1)
						echo '<td>'.CHtml::link('Start',array('take','last'=>$test->last,'test_id'=>$test->id)).'</td>';
					else
						echo '<td>Last page: '.$test->last.' - '.CHtml::link('Continue',array('take','last'=>$test->last,'test_id'=>$test->id)).'</td>';
					echo '<td></td>';
				} else
				{
					echo '<td>'.$test->start_time.'</td>';
					echo '<td>FINISHED</td>';
					echo '<td>'.$this->getResult($test->id).'</td>';
				}
				echo '</tr>';
			}
			
		?>
	</tbody>
	</table>
	</div>
</div>