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
			
			//$page->addStylesheetToHead(URL . '/extensions/mobile_phone_Backend/assets/stylesheet.css', 'only screen and (max-device-width: 480px)', 50002);
			$page->addStylesheetToHead(URL . '/extensions/mobile_phone_Backend/assets/stylesheet.css', 'screen', 50002);
			if($this->_Parent->Author->isDeveloper()) { /* meh, I need to do this to hide the Blueprints/System menu items */
				$page->addStylesheetToHead(URL . '/extensions/mobile_phone_Backend/assets/dev-stylesheet.css', 'screen', 50003);
			}
			$page->addElementToHead(new XMLElement("meta", $style, array("name" => "viewport", "content" => "width=240,user-scalable=no")));
		}
			
	}

?>