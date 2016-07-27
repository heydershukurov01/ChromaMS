<?php 

return [

	'theme' => [

		'folder' => 'themes',
		'active' =>	'default'

	],
	'templates' =>[
		//Registering new Template

	'Home' => ChromaMS\Templates\HomeTemplate::class,
	'Blog' => ChromaMS\Templates\BlogTemplate::class,
	'blog.post' => ChromaMS\Templates\BlogPostTemplate::class,
	]

]

 ?>