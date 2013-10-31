<?php
/* @var $this ModulesController */
/* @var $dataProvider CActiveDataProvider */

?>
<div class="non-shortable-content padd-30"></div>
<div class="padd-30"></div>
<div class="shortable-content">
    
    <div class="box _100">
        <div class="box-header">Modules</div>
        <div class="box-content">
            <table cellpadding="0" cellspacing="0" border="0" class="dataTable dTable" id="dynamic" aria-describedby="dynamic_info">
                <thead>
                    <tr role="row">
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="dynamic" rowspan="1" colspan="1" aria-label="Module Code">Code</th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="dynamic" rowspan="1" colspan="1" aria-label="Module Name">Name</th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="dynamic" rowspan="1" colspan="1" aria-label="Creator">Creator</th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="dynamic" rowspan="1" colspan="1" aria-label="Create Date">Create Date</th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="dynamic" rowspan="1" colspan="1" aria-label="Sort Order">Sort Order</th>
    					<th class="sorting" role="columnheader" tabindex="0" aria-controls="dynamic" rowspan="1" colspan="1" aria-label="Pages">Pages</th>
    					<th class="sorting" role="columnheader" tabindex="0" aria-controls="dynamic" rowspan="1" colspan="1" aria-label="Action">Action</th>               
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
    	                'itemView'=>'_view',
                    )); 
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

