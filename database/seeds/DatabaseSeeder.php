<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        $host = 'http://127.0.0.1:8000/';
        // seeding params table
        DB::table('params')->insert([
          'id' => '001',
          'description' => 'files',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('params')->insert([
          'id' => '002',
          'description' => 'sticky note',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('params')->insert([
          'id' => '003',
          'description' => 'tables',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('param_details')->insert([
          'id' => '0010',
          'description' => 'blogs',
          'id_params' => '001',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('param_details')->insert([
          'id' => '0020',
          'description' => 'Every day may not be good... but there\'s something good in every day.',
          'id_params' => '002',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('param_details')->insert([
          'id' => '0030',
          'description' => 'tenants',
          'id_params' => '003',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('param_details')->insert([
          'id' => '0031',
          'description' => 'tenants_promo',
          'id_params' => '003',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s'),
        ]);
        // seeding user_roles table
        DB::table('user_roles')->insert([
          'id' => '1',
          'name' => 'admin',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('user_roles')->insert([
           'id' => '2',
           'name' => 'pengelola parkir',
           'created_at' => date('Y-m-d H:i:s'),
           'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('user_roles')->insert([
           'id' => '3',
           'name' => 'customer',
           'created_at' => date('Y-m-d H:i:s'),
           'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('user_roles')->insert([
           'id' => '4',
           'name' => 'juru parkir',
           'created_at' => date('Y-m-d H:i:s'),
           'updated_at' => date('Y-m-d H:i:s'),
        ]);
        // seeding users table
        DB::table('users')->insert([
          'name' => 'admin',
          'username' => 'admin',
          'email' => 'admin@iparkir.com',
          'password' => bcrypt('admin123'),
          'dp' => 'photos/1/thumbs/dp.jpg',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s'),
          'id_user_roles' => '1'
        ]);
        DB::table('users')->insert([
          'name' => 'Ling Ling',
          'username' => 'lingling',
          'email' => 'lingling@gmail.com',
          'password' => bcrypt('lingling'),
          'dp' => 'photos/1/thumbs/dp.jpg',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s'),
          'id_user_roles' => '2'
        ]);


        // seeding post_status table
        DB::table('post_status')->insert([
          'id' => '1',
          'name' => 'Published',
          'name_en' => 'Diterbitkan',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('post_status')->insert([
          'id' => '2',
          'name' => 'Draft',
          'name_en' => 'Draf',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('post_status')->insert([
          'id' => '3',
          'name' => 'Trash',
          'name_en' => 'Dihapus',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s')
        ]);

        for ($i=1; $i <= 10; $i++) {
          DB::table('posts')->insert([
            'id' => $i,
            'title' => 'Lorem Ipsum Dolor '. $i,
            'title_en' => 'Lorem Ipsum Dolor '. $i,
            'content' => '<img class="img-fluid first-image" src="'.$host.'photos/1/blog-'.(($i-1)%7+1).'.jpg" alt="">
            <br><br>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>',
            'content_en' => '<img class="img-fluid first-image" src="'.$host.'photos/1/blog-'.(($i-1)%7+1).'.jpg" alt="">
            <br><br>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>',
            'title_slug' => 'lorem-ipsum-dolor-'. $i,
            'thumbnail' => 'photos/1/blog-'. (($i-1)%7+1) . '.jpg',
            'likes' => 0,
            'views' => 0,
            'id_post_status' => 1,
            'created_by' => 1,
            'updated_by' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
          ]);
        }


        DB::table('categories')->insert([
          'id' => '1',
          'name' => 'lorem',
          'name_en' => 'lorem',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('categories')->insert([
          'id' => '2',
          'name' => 'ipsum',
          'name_en' => 'ipsum',
          'parent' => '1',
          'level' => '1',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('categories')->insert([
          'id' => '3',
          'name' => 'dolor',
          'name_en' => 'dolor',
          'parent' => '2',
          'level' => '2',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('categories')->insert([
          'id' => '4',
          'name' => 'ipsum',
          'name_en' => 'ipsum',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('categories')->insert([
          'id' => '5',
          'name' => 'dolor',
          'name_en' => 'dolor',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('tags')->insert([
          'id' => '1',
          'name' => 'lorem',
          'name_en' => 'lorem',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('tags')->insert([
          'id' => '2',
          'name' => 'ipsum',
          'name_en' => 'ipsum',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('tags')->insert([
          'id' => '3',
          'name' => 'dolor',
          'name_en' => 'dolor',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s')
        ]);

        for ($i=1; $i <= 7; $i++) {
          DB::table('categories_posts')->insert([
            'id_posts' => $i,
            'id_categories' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
          ]);
          DB::table('categories_posts')->insert([
            'id_posts' => $i,
            'id_categories' => '2',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
          ]);
          DB::table('categories_posts')->insert([
            'id_posts' => $i,
            'id_categories' => '3',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
          ]);

          DB::table('tags_posts')->insert([
            'id_posts' => $i,
            'id_tags' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
          ]);
          DB::table('tags_posts')->insert([
            'id_posts' => $i,
            'id_tags' => '2',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
          ]);
          DB::table('tags_posts')->insert([
            'id_posts' => $i,
            'id_tags' => '3',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
          ]);
        }
    }
}
