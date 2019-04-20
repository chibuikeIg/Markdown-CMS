<?php

class Roark{
    protected $slug;
    protected $template_type;
    protected $categories;
    protected $template ='default';


    public function __construct()
    {
        $this->categories = get_categories();
        $this->slug = $this->get_slug();
        
        $this->set_template();
    }

    protected function get_slug()
    {
        $query = filter_input(INPUT_GET,'q');

       if(false === $query || null === $query )
       {
           return 'home';
       }

       $parts = explode('/',$query);
       $count = count($parts);

       if($count > 2)
       {
           return '404';
       }
       elseif( $count == 2 )
       {
           if($parts[0] == 'category' )
           {
               return sprintf('category-%s',$parts[1]);
           }
       }
       else
       {
           return array_pop($parts);
       }

       return false;
    }

    protected function set_template()
    {
        switch(true){
            case ($this->slug == 'home' ):
                $this->template_type = 'home';
            break;

            case ($this->slug == 'feed' ):

            $this->template_type = 'rss';

            break;

            case $this->is_page($this->slug):
                 $this->template_type ='page';
                 break;
            case $this->is_post($this->slug):
                 $this->template_type = 'post';
                 break;

            case $this->is_category($this->slug):
                 $this->template_type = 'category';
                 break;

            default :
                $this->slug = '404';
                $this->template_type = 'page';

        }
    }

    protected function is_page($slug)
    {
        $path = get_content_path('page',$slug);

        if(file_exists($path))
        {
            return true;
        }

        return false;
    }

    protected function is_post($slug)
    {
        $path = get_content_path('posts',$slug);

        if(file_exists($path))
        {
            return true;
        }

        return false;
    }

    protected function is_category($slug)
    {
        $parts = explode('-',$slug);
        $slug = array_pop($parts);

        if(!empty($this->categories) && !empty($slug) )
        {
            $cats = array_keys($this->categories);

            if(in_array($slug,$cats))
            {
                $this->slug = $slug;

                return true;
            }
        }

        return false;
        
    }

    public function do_page()
    {
        global $page;

        switch($this->template_type)
        {
            case 'category' :
                 $category = $this->categories[$this->slug];
                 
                 $page = new stdClass;
                 $page->title = $category['name'];
                 $page->content = $category['content'];
                 $page->posts__in = $category['posts'];

                 break;
            case 'rss':
            break;
            case 'home' :
                $page = get_page('home');
                break;
            case 'page':
             $page = get_page($this->slug);
             break;

             case 'post' :
                $page = get_post($this->slug);
                break;
            
            default : 
                $page = get_page('404');
                break;
        }
        $this->load_template();
    }

    protected function load_template()
    {
        global $template_type,$page_slug;

        $page_slug = $this->slug;
        $template_type = $this->template_type;

        $template_path= sprintf('%s/templates/%s/%s.php',ABS_PATH,$this->template,$this->template_type);

        include($template_path);
    }


}