<?php
function theme_data_setup()
{	
	return $theme_options=array(
			//Logo and Fevicon header			
			'home_feature' => QUALITY_TEMPLATE_DIR_URI .'/images/slider/slide.jpg',
			'upload_image_logo'=>'',
			'height'=>'80',
			'width'=>'200',
			'text_title'=>false,
			'upload_image_favicon'=>'',	
			
			/* Home Image */
			'home_image_title' => __('Theme Feature Goes Here!','quality'),
			'home_image_sub_title' => __('Wordpress Premium Theme','quality'),
			'home_image_description' => __('Fully Responsive Theme Amazing Design.','quality'),

			'service_title'=>'What We Do',
			'service_description' =>'We provide best WordPress solutions for your business. Thanks to our framework you will get more happy customers.',
			
			'service_enable' => true,
			'service_one_title' => 'Fully Responsive',
			'service_two_title' => 'SEO Friendly',
			'service_three_title' => 'Easy Customization',
			'service_four_title' => 'Well Documentation',
			
			'service_one_icon' => 'fa fa-shield',
			'service_two_icon' => 'fa fa-tablet',
			'service_three_icon' => 'fa fa-edit',
			'service_four_icon' => 'fa fa-star-half-o',
			
			'service_one_text' => 'Lorem Ipsum which looks reason able. The generated Lorem Ipsum is ',
			'service_two_text' => 'Lorem Ipsum Lorem Ipsum which looks reason able. The generated Lorem Ipsum is which looks reason able. The generated Lorem Ipsum is ',
			'service_three_text' => 'fLorem Ipsum which looks reason able. The generated Lorem Ipsum is t',
			'service_four_text' => 'Lorem Ipsum which looks reason able. The generated Lorem Ipsum is-o',
			//Projects Section Settings
			'home_projects_enabled' => true,
			'project_heading_one' => 'Featured Portfolio Projects',
			'project_tagline' => 'Maecenas sit amet tincidunt elit. Pellentesque habitant morbi tristique senectus et netus et Nulla facilisi.',
			
			'project_one_thumb' => QUALITY_TEMPLATE_DIR_URI .'/images/project_thumb.png',
			'project_one_title' => 'Lorem Ipsum',
			
		    'project_two_thumb' => QUALITY_TEMPLATE_DIR_URI .'/images/project_thumb.png',
			'project_two_title' => 'Postao je popularan',
			
			'project_three_thumb' => QUALITY_TEMPLATE_DIR_URI .'/images/project_thumb.png',
			'project_three_title' => 'kojekakve promjene s',
			
			'project_four_thumb' => QUALITY_TEMPLATE_DIR_URI .'/images/project_thumb.png',
			'project_four_title' => 'kojekakve promjene s',
			
			//BLOG
			'home_blog_enabled' => true,
			'blog_heading' => 'Latest <span>From</span> Blog',
			
			//Custom css
			'webrit_custom_css'=>'',						
			//Footer Customization
			'footer_copyright_text' => '<p>@ Copyright 2014 Quality Center Design And Developed by  <a href="'.esc_url('http://www.webriti.com').'" target="_blank">WordPress Theme</a></p>',
		);
}
?>