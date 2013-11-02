<?php
/* @var $this ModulesController */
/* @var $model Modules */
/* @var $dataProvider CActiveDataProvider */

	$modules = Modules::model()->attributeLabels();

	$this->breadcrumbs=array(
	'Modules'=>array('index'),
	'Viewing #'.$model->module_code,
	);


?>

<div class="box _75">
	<div class="box-header">Viewing Module #<?php  echo $model->module_code;?></div>
	<table class="static_table" style="border:1px solid #dfdfdf">
		<tbody>
			<tr>
				<td><?php echo $modules['module_code'] ?></td>
				<td><?php echo $model->module_code; ?></td>
			</tr>
			<tr>
				<td><?php echo $modules['module_name'] ?></td>
				<td><?php echo $model->module_name; ?></td>
			</tr>
			<tr>
				<td><?php echo $modules['create_date'] ?></td>
				<td><?php echo $model->create_date; ?></td>
			</tr>
			<tr>
				<td><?php echo $modules['sort_order'] ?></td>
				<td><?php echo $model->sort_order; ?></td>
			</tr>
			<tr>
				<td>Users assigned</td>
				<td><?php
					$toBeTrimmed ='';
					foreach ($model->users as $user) 
						 $toBeTrimmed .= $user->username.',';
					echo rtrim($toBeTrimmed,',');
				?></td>
			</tr>
		</tbody>
	</table>
</div>

<div class="_75 padd-10">
<?php echo CHtml::link('<i class="icon-edit"></i>Add Page', array('pages/create', 'module_code'=>$model->module_code),array('class'=>'grey display_but')); ?>
</div>

<div class="shortable-content">
    
    <div class="box _75">
        <div class="box-header">Modules</div>
        <div class="box-content">
            <table cellpadding="0" cellspacing="0" border="0" class="dataTable marianTable" id="dynamic" aria-describedby="dynamic_info">
                <thead>
                    <tr role="row">
                        <th  role="columnheader" tabindex="0" aria-controls="dynamic" rowspan="1" colspan="1" aria-label="Create Date">Page Number</th>
                        <th  role="columnheader" tabindex="0" aria-controls="dynamic" rowspan="1" colspan="1" aria-label="Pages">Page Title</th>
    					<th  role="columnheader" tabindex="0" aria-controls="dynamic" rowspan="1" colspan="1" aria-label="Sort Order">Sort</th>
    					<th  role="columnheader" tabindex="0" aria-controls="dynamic" rowspan="1" colspan="1" aria-label="Action">Action</th>               
                    </tr>
                </thead>
                <tbody role="alert" aria-live="polite" aria-relevant="all">
                <?php 
        	
                    $dataProvider->pagination->pageSize = 1000000;
                    


                    $this->widget('zii.widgets.CListView', array(
                        'template'=> "{items}",
                        'enablePagination'=>false,
                        'pager'=>false,
                        'dataProvider'=>$dataProvider,
    	                'itemView'=>'_pages',
                    )); 
                ?>
                </tbody>
            </table>
            
        </div>
    </div>
</div>



<?php /*

<div class="box _75">
	<div class="box-header">Pages</div>
	<table class="static_table" style="border:1px solid #dfdfdf">
		<thead>
			<tr>
				<th>Page Number</th>
				<th>Page Title</th>
				<th>Sort</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
				foreach ($model->pagesT as $page)
				{
					echo '<tr>';
					echo '<td>'.CHtml::link($page->page_number, array('pages/view', 'id'=>CHtml::encode($page->page_code))) .'</td>';
					echo '<td>'.$page->title.'</td>';
					echo '<td>'
						.CHtml::link('<i class="icon-arrow-up"></i>', array('pages/moveUp', 'id'=>$page->page_code, 'module_code'=>$page->module_code),array('class'=>'grey display_but'))
      					.CHtml::link('<i class="icon-arrow-down"></i>', array('pages/moveDown', 'id'=>$page->page_code,'module_code'=>$page->module_code),array('class'=>'grey display_but'))
						.'</td>';
					echo '<td>'
						.CHtml::link('<i class="icon-edit"></i>Edit', array('pages/update', 'id'=>$page->page_code),array('class'=>'grey display_but'))
						.CHtml::link('<i class="icon-edit"></i>Delete', array('pages/delete', 'id'=>$page->page_code, 'module_code'=>$model->module_code),array('class'=>'grey display_but'))
						.'</td>';
					echo '</tr>';
				}
			?>
		</tbody>
	</table>

</div> */ ?>