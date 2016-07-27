<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Presenters
    |--------------------------------------------------------------------------
    |
    | Define your objects and their corrosponding presenters here to have them
    | automatically decorated when resolved in a view. The array key should
    | be your object and the value will be the presenter. Remember to use
    | the class names and not actual instances.
    |
    */

    ChromaMS\Page::class => ChromaMS\Presenters\PagePresenter::class,
    ChromaMS\Post::class => ChromaMS\Presenters\PostPresenter::class,
    ChromaMS\User::class => ChromaMS\Presenters\UserPresenter::class,

];
