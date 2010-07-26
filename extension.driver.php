<?php

	Class extension_mobile_phone_backend extends Extension{
	
		public function about(){
			return array('name' => 'Mobile Phone Backend',
						 'version' => '1.0',
						 'release-date' => '2009-09-30',
						 'author' => array('name' => 'Nils Werner',
										   'website' => 'http://www.phoque.com/projekte/symphony',
										   'email' => 'nils.werner@gmail.com')
				 		);
		}
		
		
		public function getSubscribedDelegates() {
			return array(
				array(
					'page'		=> '/backend/',
					'delegate'	=> 'InitaliseAdminPageHead',
					'callback'	=> 'initaliseAdminPageHead'
				)
			);
		}

		public function initaliseAdminPageHead($context) {
			$page = $context['parent']->Page;
			
			$css_query = 'only screen and (max-device-width: 480px)';  // CSS Query for mobile devices
			//$css_query = 'screen'; // CSS Query for debugging
			
			// Stylesheets
			$page->addStylesheetToHead(URL . '/extensions/mobile_phone_Backend/assets/stylesheet.css', $css_query, 50002);
			if($this->_Parent->Author->isDeveloper()) { /* meh, I need to do this to hide the Blueprints/System menu items */
				$page->addStylesheetToHead(URL . '/extensions/mobile_phone_Backend/assets/dev-stylesheet.css', $css_query, 50003);
			}
			
			// Viewport
			$page->addElementToHead(new XMLElement("meta", $style, array("name" => "viewport", "content" => "width=240,user-scalable=no")));
		}
			
	}

?>