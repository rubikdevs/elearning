<?php 

class Navbar extends CWidget
{   

    public $items = array();;
    public $htmlOptions;
    public function init()
    {   
        if(isset($this->htmlOptions['id']))
            $this->id=$this->htmlOptions['id'];
        else
            $this->htmlOptions['id']=$this->id;
        $this->items=$this->filterItems($this->items);
    }
 
    public function run()
    {
        $this->renderNavbar($this->items);
    }

    protected function renderNavbar($items) {
        if (count($items)) {
            echo CHtml::openTag('ul',$this->htmlOptions)."\n";
            $this->renderItems($items);
            echo CHtml::closeTag('ul');
        }
    } 

    protected function renderItems($items) {

        foreach ($items as $item) {  
            $options = isset($item['itemOptions']) ? $item['itemOptions'] : array();
            $class = array();
            if($this->itemCssClass!==null) {
                $class[]=$this->itemCssClass;
                $options['class'] = implode(' ', $class);
            }
           
            if(empty($options['class']))
                $options['class']=implode(' ',$class);
            else
                $options['class'].=' '.implode(' ',$class);

             echo CHtml::openTag('li',$options)."\n";
                $label = $item['icon'].$item['label'];
                echo CHtml::link($label,$item['url'],isset($item['linkOptions']) ? $item['linkOptions'] : array()); 
             echo CHtml::closeTag('li');
        

        }
    }

    protected function filterItems($items) {

        foreach ($items as $i => $item) {
            if (isset($item['visible']) && !$item['visible']) {
                unset($items[$i]);
            }
       }
    }
}

