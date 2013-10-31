<?php
	foreach($pages as $page)
	{
		echo CHtml::link($page->page_number, array('pages/view', 'id'=>$page->page_code)).' - ';
	}
?>