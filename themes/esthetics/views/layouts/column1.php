<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<aside> 
                <div class="user"> 
                    <img src="images/user.jpg" alt="Esthetics Admin"> Akshay Kumar 
                    <p>UI Designer / Developer</p> 
                </div> 
                <ul id="main-nav"> 
                    <li> <a href="#" class="nav-top-item current"> User Interface Elements</a> 
                        <ul style="display: block; "> <li><a href="dynamic-table.html"> Dynamic Data Table </a></li> 
                            <li><a href="static-table.html"> Static Data Table</a></li> 
                            <li><a href="gride.html" class="active"> 960 Content Grid </a></li> 
                            <li><a href="wizard.html"> Step by Step Wizard </a></li> 
                        </ul> 
                    </li> 
                    <li> <a href="#" class="nav-top-item current"> Other Interface Elements</a> 
                        <ul style="display: block; "> 
                            <li><a href="gallery.html"> Image and Video Gallery</a></li> 
                            <li><a href="accordion.html"> Jquery Accordion </a></li> 
                            <li><a href="tabs.html"> Jquery Tabs </a></li> 
                            <li><a href="slider.html"> Jquery Horizontal / Vertical Slider </a></li> 
                        </ul> 
                    </li> 
                 </ul> 
                 <div class="submenu-footer"> <ul class="icons"> <li> <a href="#"><i class="icon-off"></i></a> </li> <li> <a href="#" id="messages"><i class="icon-inbox"></i></a> <div class="submenu-footer-tooltip messages_list"> <ul class="mail"> <li><a href="#"> <strong>10:15</strong>Need your Help!<small>From: John</small></a></li> <li><a href="#"> <strong>9:55</strong>New comment on you theme<small>From: themeforest</small></a></li> <li><a href="#"> <strong>Yest.</strong>Successfull backup<small>From: System</small></a></li> <li class="read"><a href="#"> <strong>2 days</strong>Bug report<small>From: Jane</small></a></li> <li><a href="#"> <strong>08:42</strong>Hi how r u doing today...<small>From: Ajay Kumar</small></a></li> <li class="read"><a href="#"> <strong>10:15</strong>Need your Help!<small>From: John</small></a></li> </ul> <img src="images/icons/arrow_down.png" class="arrow_w" alt="arrow"> </div> <!--SEARCH TOOLTIP ENDS--> </li> <li> <a href="#" id="search"><i class="icon-search"></i></a> <div class="submenu-footer-tooltip search_bar"> <input type="text" class="float_l _75" placeholder="Type Here To Search..."><a href="" class="grey"><i class="icon-search"></i></a><img src="images/icons/arrow_down.png" class="arrow_w" alt="arrow"> </div> <!--SEARCH TOOLTIP ENDS--> </li> </ul> <span>18 New Tasks</span> </div>
            </aside>
	<?php echo $content?>
</div><!-- content -->
<?php $this->endContent(); ?>