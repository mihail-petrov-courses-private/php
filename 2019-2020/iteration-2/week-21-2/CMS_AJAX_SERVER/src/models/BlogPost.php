<?php

class BlogPost {
    
    /**
     * @author Mihail Petrov
     * @example return all of the available blog post items
     * @return DatabaseObject
     */
    public static function getAll() {
        return Database::select('tb_blog_post')::build();
    }
    
    /**
     * 
     * @param type $id
     * @return type
     */
    public static function get($id) {

        return Database::select('tb_blog_post')
                       ::where(array('id' => $id))
                       ::buildSingle();
    }
    
    /**
     * 
     * @param type $categoryId
     * @return type
     */
    public static function getByCateogry($categoryId) {
        
        /**
         * return Database::join(array( 'tb_blog_post'              =>'a', 
         *                              'tb_blog_post__categories'  => 'b' ))
         *                ::where(array('a.id'          => 'b.blog_post_id',
         *                              'b.category_id' => $categoryId))
         *                ::build();
         */
        
        return Database::getAll("SELECT * FROM tb_blog_post a,
                                tb_blog_post__categories b
                                WHERE a.id = b.blog_post_id AND 
                                b.category_id = $categoryId");
    }
    
}