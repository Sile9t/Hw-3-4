<?php

function main($page = 'index', $id = '', $action = 'GET', $variables = [])
{
    // dump('page: ' . $page . ", id: " . $id . ", action: " . $action);
    switch ($page) {
        case 'index':
            render($page);
            break;

        case 'about':
            $phone = getPhone();

            render('about/index', [
                'phone' => $phone
            ]);
            break;

        case 'post':
            $post = getPost($id);

            render('posts/show', [
                'post' => $post
            ]);
            break;
        
        case 'post/update':
            $post = getPost($id);

            if ($action == 'POST' && !empty($post)) {
                $title = $_POST['title'];
                $description = $_POST['content'];
                $id = updatePost($id, $title, $description);
                
                return main('posts');
                break;
            }


            render('posts/update', [
                'post' => $post
            ]);
            break;

        case 'post/destroy':
            deletePost($id);
            
            return main('posts');
            break;

        case 'posts':
            $posts = getAllPosts();

            // var_dump($posts);

            render('posts/index', [
                'posts' => $posts
            ]);
            break;
            
        case 'posts/create':
        case 'post/create':
            dump("url: posts/create, action: $action");
            if ($action == 'POST') {
                $title = $_POST['title'];
                $description = $_POST['content'];
                $id = createPost($title, $description);
                
                return main('post', $id);
                break;
            }
            
            render('posts/create', []);
            break;
        default:
            render('404');
            break;
    }

}