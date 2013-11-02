<?php
/* @var $this ModulesController */
/* @var $data Modules */
?>

            <?php
       
                
                    echo '<tr>';
                    echo '<td>'.CHtml::link($data->page_number, array('pages/view', 'id'=>CHtml::encode($data->page_code))) .'</td>';
                    echo '<td>'.$data->title.'</td>';
                    echo '<td>'
                        .CHtml::link('<i class="icon-arrow-up"></i>', array('pages/moveUp', 'id'=>$data->page_code, 'module_code'=>$data->module_code),array('class'=>'grey display_but'))
                        .CHtml::link('<i class="icon-arrow-down"></i>', array('pages/moveDown', 'id'=>$data->page_code,'module_code'=>$data->module_code),array('class'=>'grey display_but'))
                        .'</td>';
                    echo '<td>'
                        .CHtml::link('<i class="icon-edit"></i>Edit', array('pages/update', 'id'=>$data->page_code),array('class'=>'grey display_but'))
                        .CHtml::link('<i class="icon-edit"></i>Delete', array('pages/delete', 'id'=>$data->page_code, 'module_code'=>$data->module_code),array('class'=>'grey display_but'))
                        .'</td>';
                    echo '</tr>';
                
            ?>

