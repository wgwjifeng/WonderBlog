<div id="slider" class="sl-slider-wrapper">
    <div class="sl-slider">				
        <div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="-25" data-slice2-rotation="-25" data-slice1-scale="2" data-slice2-scale="2">
            <div class="sl-slide-inner">							
                <div class="salesdetails">
                    <?php if (inkthemes_get_option('colorway_slideheading1') != '') { ?>
                        <a href="<?php
                        if (inkthemes_get_option('colorway_slidelink1') != '') {
                            echo inkthemes_get_option('colorway_slidelink1');
                        } else {
                            echo "#";
                        }
                        ?>"><h1><?php echo inkthemes_get_option('colorway_slideheading1'); ?></h1></a>
                       <?php } else { ?>
                        <a href="#"><h1>
                                <?php _e('Your Site is faster to build.', 'colorway'); ?>
                            </h1></a>
                    <?php } ?>
                    <?php if (inkthemes_get_option('colorway_slidedescription1') != '') { ?>
                        <p><?php echo inkthemes_get_option('colorway_slidedescription1'); ?></p>
                    <?php } else { ?>
                        <p>
                            <?php _e('Premium WordPress Themes with Single Click Installation, Just a Click and your website is ready for use.', 'colorway'); ?>
                        </p>
                    <?php } ?>
                </div>
            </div>
            <?php
            //The strpos funtion is comparing the strings to allow uploading of the Videos & Images in the Slider
            $mystring1 = inkthemes_get_option('colorway_slideimage1');
            $value_img = array('.jpg', '.png', '.jpeg', '.gif', '.bmp', '.tiff', '.tif');
            $check_img_ofset = 0;
            foreach ($value_img as $get_value) {
                if (preg_match("/$get_value/", $mystring1)) {
                    $check_img_ofset = 1;
                }
            }
            // Note our use of ===.  Simply == would not work as expected
            // because the position of 'a' was the 0th (first) character.
            ?>
            <?php if ($check_img_ofset == 0 && inkthemes_get_option('colorway_slideimage1') != '') { ?>
                <div class="bg-img bg-img-1"><?php echo inkthemes_get_option('colorway_slideimage1'); ?></div>
            <?php } else { ?>  
                <div class="bg-img bg-img-1">
                    <?php if (inkthemes_get_option('colorway_slideimage1') != '') { ?>
                        <a href="<?php
                        if (inkthemes_get_option('colorway_slidelink1') != '') {
                            echo inkthemes_get_option('colorway_slidelink1');
                        }
                        ?>" >
                            <img  src="<?php echo inkthemes_get_option('colorway_slideimage1'); ?>" alt="<?php echo inkthemes_get_option('inkthemes_sliderheading1'); ?>"/></a>
                    <?php } else { ?>
                        <img  src="<?php echo get_template_directory_uri(); ?>/images/slider.jpg" alt="Slide Image 1"/>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>	
        <?php if (inkthemes_get_option('colorway_slideimage2') != '') { ?>
            <div class="sl-slide slide2" data-orientation="vertical" data-slice1-rotation="10" data-slice2-rotation="-15" data-slice1-scale="1.5" data-slice2-scale="1.5">
                <?php if (inkthemes_get_option('colorway_slideheading2') != '') { ?>
                    <div class="sl-slide-inner">
                        <div class="salesdetails">
                            <?php if (inkthemes_get_option('colorway_slideheading2') != '') { ?>
                                <a href="<?php
                                if (inkthemes_get_option('colorway_slidelink2') != '') {
                                    echo inkthemes_get_option('colorway_slidelink2');
                                } else {
                                    echo "#";
                                }
                                ?>"><h1><?php echo inkthemes_get_option('colorway_slideheading2'); ?></h1></a>
                               <?php }
							   if (inkthemes_get_option('colorway_slidedescription2') != '') { ?>
                                <p><?php echo inkthemes_get_option('colorway_slidedescription2'); ?></p>
                            <?php } ?>                                
                        </div>
                    </div>
                    <?php
                }
                //The strpos funtion is comparing the strings to allow uploading of the Videos & Images in the Slider
                $mystring2 = inkthemes_get_option('colorway_slideimage2');
                $value_img = array('.jpg', '.png', '.jpeg', '.gif', '.bmp', '.tiff', '.tif');
                $check_img_ofset = 0;
                foreach ($value_img as $get_value) {
                    if (preg_match("/$get_value/", $mystring2)) {
                        $check_img_ofset = 1;
                    }
                }
                // Note our use of ===.  Simply == would not work as expected
                // because the position of 'a' was the 0th (first) character.
                ?>
                <?php if ($check_img_ofset == 0 && inkthemes_get_option('colorway_slideimage2') != '') { ?>
                    <div class="bg-img bg-img-2"><?php echo inkthemes_get_option('colorway_slideimage2'); ?></div>
                <?php } else { ?>  
                    <div class="bg-img bg-img-2">
                        <?php if (inkthemes_get_option('colorway_slideimage2') != '') { ?>
                            <a href="<?php
                            if (inkthemes_get_option('colorway_slidelink2') != '') {
                                echo inkthemes_get_option('colorway_slidelink2');
                            }
                            ?>" >
                                <img  src="<?php echo inkthemes_get_option('colorway_slideimage2'); ?>" alt="<?php echo inkthemes_get_option('inkthemes_sliderheading2'); ?>"/></a>
                        <?php } else { ?>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
        <?php } else { ?>  	
            <div class="sl-slide slide2" data-orientation="vertical" data-slice1-rotation="10" data-slice2-rotation="-15" data-slice1-scale="1.5" data-slice2-scale="1.5">
                <div class="bg-img bg-img-2">
                    <img  src="<?php echo get_template_directory_uri(); ?>/images/slider2.jpg" alt="Slide Image 1"/>
                </div>
            </div>
        <?php } ?>
    </div><!-- /sl-slider -->
    <nav id="nav-arrows" class="nav-arrows">
        <span class="nav-arrow-prev"><?php _e('Previous', 'colorway'); ?></span>
        <span class="nav-arrow-next"><?php _e('Next', 'colorway'); ?></span>
    </nav>  
    <nav id="nav-dots" class="nav-dots">
        <span class="nav-dot-current"></span>
        <span class="slide2"></span>
    </nav>
</div>