<?php
/* @var $this ModulesController */
/* @var $data Modules */
?>



		<?php //echo CHtml::link('VIEW PAGES', array('modules/listpages', 'module_code'=>$data->module_code)); ?>
	
		<?php //echo CHtml::link('ADD PAGE', array('pages/create', 'module_code'=>$data->module_code)); ?>
		

<tr>
    
	<td><?php echo CHtml::link(CHtml::encode($data->module_code), array('view', 'id'=>CHtml::encode($data->module_code))); ?></td>
    <td><?php echo CHtml::encode($data->module_name); ?> </td>
    <td><?php echo CHtml::encode($data->creator); ?></td>
    <td><?php echo CHtml::encode($data->create_date); ?></td>
    <td><?php echo CHtml::encode($data->sort_order); ?></td>
    <td><?php
    	$toBeTrimmed ='';
		foreach ($data->pagesT as $page) 
			 $toBeTrimmed .= CHtml::link($page->page_number, array('pages/view', 'id'=>$page->page_code)).',';
		echo rtrim($toBeTrimmed,',');

		
    	?>
    </td>
    <td><?php 

//echo CHtml::link('<i class="icon-edit"></i>Manage Module', array('assign', 'id'=>CHtml::encode($data->id)), array('class'=>'grey display_but'));
//echo CHtml::link('<i class="icon-edit"></i>Edit', array('update', 'id'=>CHtml::encode($data->id)), array('class'=>'grey display_but'));
//echo CHtml::link('<i class="icon-trash"></i>Delete', array('delete', 'id'=>CHtml::encode($data->id)), array('class'=>'grey display_but'));
    echo CHtml::link('<i class="icon-edit"></i>Add Pages', array('pages/create', 'module_code'=>$data->module_code),array('class'=>'grey display_but')); 
    echo CHtml::link('<i class="icon-edit"></i>Edit', array('modules/update', 'id'=>$data->module_code),array('class'=>'grey display_but'));
    echo CHtml::link('<i class="icon-edit"></i>Delete', array('modules/delete', 'id'=>$data->module_code),array('class'=>'grey display_but'));
    ?>
    </td>

    

</tr>


