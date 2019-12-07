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
      $host = 'http://127.0.0.1:8000/';
        // $this->call(UsersTableSeeder::class);

                // $this->call(UsersTableSeeder::class);

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


                DB::table('page_status')->insert([
                  'id' => '1',
                  'name' => 'Published',
                  'name_en' => 'Diterbitkan',
                  'created_at' => date('Y-m-d H:i:s'),
                  'updated_at' => date('Y-m-d H:i:s')
                ]);
                DB::table('page_status')->insert([
                  'id' => '2',
                  'name' => 'Draft',
                  'name_en' => 'Draf',
                  'created_at' => date('Y-m-d H:i:s'),
                  'updated_at' => date('Y-m-d H:i:s')
                ]);
                DB::table('page_status')->insert([
                  'id' => '3',
                  'name' => 'Trash',
                  'name_en' => 'Dihapus',
                  'created_at' => date('Y-m-d H:i:s'),
                  'updated_at' => date('Y-m-d H:i:s')
                ]);

                // seeding pages table
                DB::table('pages')->insert([
                  'id' => '1',
                  'name' => 'Home',
                  'name_en' => 'Home',
                  'id_page_status' => '1',
                  'created_at' => date('Y-m-d H:i:s'),
                  'updated_at' => date('Y-m-d H:i:s')
                ]);
                DB::table('pages')->insert([
                  'id' => '2',
                  'name' => 'Blog',
                  'name_en' => 'Blog',
                  'id_page_status' => '1',
                  'created_at' => date('Y-m-d H:i:s'),
                  'updated_at' => date('Y-m-d H:i:s')
                ]);

                // seeding menus table
                DB::table('menus')->insert([
                  'id' => '1',
                  'name' => 'Beranda',
                  'name_en' => 'Home',
                  'id_pages' => '1',
                  'href' => '/#home',
                  'created_at' => date('Y-m-d H:i:s'),
                  'updated_at' => date('Y-m-d H:i:s')
                ]);

                DB::table('menus')->insert([
                  'id' => '2',
                  'name' => 'Produk',
                  'name_en' => 'Product',
                  'id_pages' => '1',
                  'href' => '/#produk',
                  'created_at' => date('Y-m-d H:i:s'),
                  'updated_at' => date('Y-m-d H:i:s')
                ]);

                DB::table('menus')->insert([
                  'id' => '3',
                  'name' => 'Fitur',
                  'name_en' => 'Feature',
                  'id_pages' => '1',
                  'href' => '/#fitur',
                  'created_at' => date('Y-m-d H:i:s'),
                  'updated_at' => date('Y-m-d H:i:s')
                ]);

                DB::table('menus')->insert([
                  'id' => '4',
                  'name' => 'Kontak',
                  'name_en' => 'Contact',
                  'id_pages' => '1',
                  'href' => '/#kontak',
                  'created_at' => date('Y-m-d H:i:s'),
                  'updated_at' => date('Y-m-d H:i:s')
                ]);

                DB::table('menus')->insert([
                  'id' => '5',
                  'name' => 'Blog',
                  'name_en' => 'Blog',
                  'id_pages' => '1',
                  'href' => 'blogs',
                  'created_at' => date('Y-m-d H:i:s'),
                  'updated_at' => date('Y-m-d H:i:s')
                ]);

                // seeding website_text table

                DB::table('website_text')->insert([
                  'label' => 'Teks Header 1',
                  'label_en' => 'Header Text 1',
                  'content' => '<p class="title-drive">You drive <br>We\'ll handle the rest</p>',
                  'content_en' => '<p class="title-drive">You drive <br>We\'ll handle the rest</p>',
                  'prefix' => '',
                  'need_editor' => '1',
                  'created_at' => date('Y-m-d H:i:s'),
                  'updated_at' => date('Y-m-d H:i:s'),
                  'id_pages' => '1'
                ]);
                DB::table('website_text')->insert([
                  'label' => 'Teks Header 2',
                  'label_en' => 'Header Text 2',
                  'content' => '<p class=""><span class="title">iParkir </span> adalah aplikasi mobile yang digunakan untuk memesan tempat parkir.iParkir bersifat real time dan multiplatform, tersedia di berbagai perangkat elektronik.</p>',
                  'content_en' => '<p class=""><span class="title">iParkir </span> is a mobile application used to book a parking space.<br />iParkir is real time and multiplatform, available on various electronic devices.</p>',
                  'prefix' => '',
                  'need_editor' => '1',
                  'created_at' => date('Y-m-d H:i:s'),
                  'updated_at' => date('Y-m-d H:i:s'),
                  'id_pages' => '1'
                ]);

                DB::table('website_text')->insert([
                  'label' => 'Produk - Judul iParkir Aplikasi Mobile',
                  'label_en' => 'Product - iParkir Mobile Application Title',
                  'content' => 'iParkir Aplikasi Mobile',
                  'content_en' => 'iParkir Application Mobile',
                  'prefix' => '',
                  'created_at' => date('Y-m-d H:i:s'),
                  'updated_at' => date('Y-m-d H:i:s'),
                  'id_pages' => '1'
                ]);

                DB::table('website_text')->insert([
                  'label' => 'Produk - Teks iParkir Aplikasi Mobile',
                  'label_en' => 'Product - iParkir Mobile Application Text',
                  'content' => '<p>iParkir adalah aplikasi mobile yang digunakan untuk memesan tempat parkir. iParkir bersifat real time dan multiplatform, tersedia di berbagai perangkat elektronik.</p>',
                  'content_en' => '<p>iParkir is a mobile application used to book a parking space. iParkir is real time and multiplatform, available on various electronic devices.</p>',
                  'prefix' => '',
                  'need_editor' => '1',
                  'created_at' => date('Y-m-d H:i:s'),
                  'updated_at' => date('Y-m-d H:i:s'),
                  'id_pages' => '1'
                ]);

                DB::table('website_text')->insert([
                  'label' => 'Produk - Judul Sangat mudah menggunakan iParkir',
                  'label_en' => 'Product - It\'s easy to use iParking Title',
                  'content' => 'Sangat mudah menggunakan iParkir',
                  'content_en' => 'It\'s easy to use iParkir',
                  'prefix' => '',
                  'created_at' => date('Y-m-d H:i:s'),
                  'updated_at' => date('Y-m-d H:i:s'),
                  'id_pages' => '1'
                ]);

                DB::table('website_text')->insert([
                  'label' => 'Produk - Teks Sangat mudah menggunakan iParkir',
                  'label_en' => 'Product - It\'s easy to use iParking Text',
                  'content' => '<ul>
                    <li><span><i class="fas fa-search"></i></span> 1. Cari lokasi diinginkan</li>
                    <li><span><i class="fab fa-android"></i></span>2. Memesan tempat parkir melalui iParkir</li>
                    <li><span><i class="fas fa-car"></i></span>3. Parkir kendaraan anda</li>
                  </ul>',
                  'content_en' => '<ul>
                     <li> <span> <i class="fas fa-search"> </i> </span> 1. Search for desired location </li>
                     <li> <span> <i class="fab fa-android"> </i> </span> 2. Book a parking space through iParkir </li>
                     <li> <span> <i class="fa-car fas"> </i> </span> 3. Park your vehicle </li>
                   </ul>',
                  'prefix' => '',
                  'need_editor' => '1',
                  'created_at' => date('Y-m-d H:i:s'),
                  'updated_at' => date('Y-m-d H:i:s'),
                  'id_pages' => '1'
                ]);

                DB::table('website_text')->insert([
                  'label' => 'Produk - Judul Metode Pembayaran',
                  'label_en' => 'Product - Payment method title',
                  'content' => 'Metode Pembayaran',
                  'content_en' => 'Payment Method',
                  'prefix' => '',
                  'created_at' => date('Y-m-d H:i:s'),
                  'updated_at' => date('Y-m-d H:i:s'),
                  'id_pages' => '1'
                ]);
                DB::table('website_text')->insert([
                  'label' => 'Produk - Teks Metode Pembayaran',
                  'label_en' => 'Product - Payment method text',
                  'content' => '<ul><li><span><i class="fas fa-calendar-alt"></i></span> 1. Berlangganan Bulanan</li>
                  <li><span><i class="fas fa-money-check-alt"></i></span>2. Bayar per transaksi</li></ul>',
                  'content_en' => '<ul><li><span><i class="fas fa-calendar-alt"></i></span> 1. Monthly Subscription</li>
                    <li><span><i class="fas fa-money-check-alt"></i></span>2. Pay per transaction</li></ul>',
                  'prefix' => '',
                  'need_editor' => '1',
                  'created_at' => date('Y-m-d H:i:s'),
                  'updated_at' => date('Y-m-d H:i:s'),
                  'id_pages' => '1'
                ]);

                DB::table('website_text')->insert([
                  'label' => 'Produk - Judul Dapatkan dan gunakan iParkir sekarang juga',
                  'label_en' => 'Product - Get and use iParkir now title',
                  'content' => 'Dapatkan dan gunakan iParkir sekarang juga',
                  'content_en' => 'Get and use iParkir now',
                  'prefix' => '',
                  'need_editor' => '1',
                  'created_at' => date('Y-m-d H:i:s'),
                  'updated_at' => date('Y-m-d H:i:s'),
                  'id_pages' => '1'
                ]);

                DB::table('website_text')->insert([
                  'label' => 'Produk - Judul Mengapa menggunakan iParkir',
                  'label_en' => 'Product - Why use iParkir title',
                  'content' => '<p class="display-4">
                    <strong>Mengapa menggunakan iParkir ?</strong>
                  </p>
                  <p class="display-4">
                    <small>Berikut beberapa alasan mengapa menggunakan iParkir</small>
                  </p>',
                  'content_en' => '<p class="display-4">
                     <strong> Why use iParkir ? </strong>
                   </p>
                   <p class="display-4">
                     <small> Here are some reasons why to use iParkir </small>
                   </p>',
                   'need_editor' => '1',
                  'prefix' => '',
                  'created_at' => date('Y-m-d H:i:s'),
                  'updated_at' => date('Y-m-d H:i:s'),
                  'id_pages' => '1'
                ]);

                DB::table('website_text')->insert([
                  'label' => 'Produk - Mengapa menggunakan iParkir teks 1',
                  'label_en' => 'Product - Why use iParkir text 1',
                  'content' => '<p>Parkir di mana saja, kapan saja jadi mudah dengan iParkir</p>',
                  'content_en' => '<p> Parking anywhere, anytime is easy with iParkir </p>',
                  'prefix' => '',
                  'need_editor' => '1',
                  'created_at' => date('Y-m-d H:i:s'),
                  'updated_at' => date('Y-m-d H:i:s'),
                  'id_pages' => '1'
                ]);

                DB::table('website_text')->insert([
                  'label' => 'Produk - Mengapa menggunakan iParkir teks 2',
                  'label_en' => 'Product - Why use iParkir text 2',
                  'content' => '<p>Terpercaya, iParkir menjamin kualitas pelayanan dengan sebaik-baiknya</p>',
                  'content_en' => '<p> Trusted, iParkir guarantees the best quality of service </p>',
                  'prefix' => '',
                  'need_editor' => '1',
                  'created_at' => date('Y-m-d H:i:s'),
                  'updated_at' => date('Y-m-d H:i:s'),
                  'id_pages' => '1'
                ]);
                DB::table('website_text')->insert([
                  'label' => 'Produk - Mengapa menggunakan iParkir teks 3',
                  'label_en' => 'Product - Why use iParkir text 3',
                  'content' => '<p>Hanya dengan menggunakan smartphone, dapatkan akses parkir di berbagai wilayah Indonesia</p>',
                  'content_en' => '<p> Only by using a smartphone, get parking access in various parts of Indonesia </p>',
                  'prefix' => '',
                  'need_editor' => '1',
                  'created_at' => date('Y-m-d H:i:s'),
                  'updated_at' => date('Y-m-d H:i:s'),
                  'id_pages' => '1'
                ]);


                DB::table('website_text')->insert([
                  'label' => 'Fitur - Judul',
                  'label_en' => 'Fitur - Title',
                  'content' => '<p class="title">iParkir memiliki fitur-fitur sebagai berikut :</p>',
                  'content_en' => '<p class="title"> iParkir has the following features: </p>',
                  'prefix' => '',
                  'need_editor' => '1',
                  'created_at' => date('Y-m-d H:i:s'),
                  'updated_at' => date('Y-m-d H:i:s'),
                  'id_pages' => '1'
                ]);

                DB::table('website_text')->insert([
                  'label' => 'Fitur - Detail 1',
                  'label_en' => 'Fitur - Detail 1',
                  'content' => 'Mencari tempat parkir hanya dengan 1 kali klik',
                  'content_en' => 'Look for a parking space with just 1 click',
                  'prefix' => 'detail fitur',
                  'created_at' => date('Y-m-d H:i:s'),
                  'updated_at' => date('Y-m-d H:i:s'),
                  'id_pages' => '1'
                ]);

                DB::table('website_text')->insert([
                  'label' => 'Fitur - Detail 2',
                  'label_en' => 'Fitur - Detail 2',
                  'content' => 'Memiliki berbagai promo diskon harga',
                  'content_en' => 'Have various price discount promos',
                  'prefix' => 'detail fitur',
                  'created_at' => date('Y-m-d H:i:s'),
                  'updated_at' => date('Y-m-d H:i:s'),
                  'id_pages' => '1'
                ]);

                DB::table('website_text')->insert([
                  'label' => 'Fitur - Detail 3',
                  'label_en' => 'Fitur - Detail 3',
                  'content' => 'Memiliki fitur chat langsung dengan juru parkir',
                  'content_en' => 'Has a live chat feature with a parking interpreter',
                  'prefix' => 'detail fitur',
                  'created_at' => date('Y-m-d H:i:s'),
                  'updated_at' => date('Y-m-d H:i:s'),
                  'id_pages' => '1'
                ]);


                DB::table('website_text')->insert([
                  'label' => 'Fitur - Detail 4',
                  'label_en' => 'Fitur - Detail 4',
                  'content' => 'Keamanan transaksi dapat dilindungi oleh asuransi',
                  'content_en' => 'Transaction security can be protected by insurance',
                  'prefix' => 'detail fitur',
                  'created_at' => date('Y-m-d H:i:s'),
                  'updated_at' => date('Y-m-d H:i:s'),
                  'id_pages' => '1'
                ]);

                DB::table('website_text')->insert([
                  'label' => 'Fitur - Detail 5',
                  'label_en' => 'Fitur - Detail 5',
                  'content' => 'Fitur saran & kritik, untuk pengguna mengadukan keluhan',
                  'content_en' => 'Features suggestions & criticism, for users to complain about complaints',
                  'prefix' => 'detail fitur',
                  'created_at' => date('Y-m-d H:i:s'),
                  'updated_at' => date('Y-m-d H:i:s'),
                  'id_pages' => '1'
                ]);


                DB::table('website_text')->insert([
                  'label' => 'Subscribe',
                  'label_en' => 'Subscribe',
                  'content' => '<p class="display-4"><strong>Tertarik dengan iParkir ?</strong></p>
                  <p class="display-4">Ayo berlangganan dan dapatkan berita serta berbagai promo terbaru dari <strong>iParkir</strong></p>',
                  'content_en' => '<p class="display-4"> <strong> Interested in iParkir? </strong> </p>
                 <p class="display-4"> Subscribe and get the latest news and various promos from <strong> iParkir </strong> </p>',
                 'need_editor' => '1',
                  'created_at' => date('Y-m-d H:i:s'),
                  'updated_at' => date('Y-m-d H:i:s'),
                  'id_pages' => '1'
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

// post
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


                DB::table('contacts')->insert([
                  'id' => '1',
                  'name' => 'Altin Danu Putut Arisa',
                  'position' => 'Founder / Direktur Utama',
                  'email' => 'paltindanu@gmail.com',
                  'phone' => '+62 821-1363-5169',
                  'foto' => 'img/pak-danu (1).jpg',
                  'created_at' => date('Y-m-d H:i:s'),
                  'updated_at' => date('Y-m-d H:i:s')
                ]);
                DB::table('contacts')->insert([
                  'id' => '2',
                  'name' => 'Holy Sie',
                  'position' => 'Co. Founder / Dir. Keuangan',
                  'email' => 'ihcholy@gmail.com',
                  'phone' => '+62 857-7222-2979',
                  'foto' => 'img/foto-holy.jpg',
                  'created_at' => date('Y-m-d H:i:s'),
                  'updated_at' => date('Y-m-d H:i:s')
                ]);
                DB::table('contacts')->insert([
                  'id' => '3',
                  'name' => 'Bagus T. Prabawa',
                  'position' => 'Co. Founder / Dir. Teknik',
                  'email' => 'bagustp@gmail.com',
                  'phone' => '+62 813-1066-3842',
                  'foto' => 'img/pak-bagus (1).jpg',
                  'created_at' => date('Y-m-d H:i:s'),
                  'updated_at' => date('Y-m-d H:i:s')
                ]);
                DB::table('contacts')->insert([
                  'id' => '4',
                  'name' => 'Ivan',
                  'position' => 'Co. Founder / Dir. Marketing',
                  'email' => 'ivankawa007@gmail.com',
                  'phone' => '+62 821-1717-1747',
                  'foto' => 'img/foto-ivan.jpg',
                  'created_at' => date('Y-m-d H:i:s'),
                  'updated_at' => date('Y-m-d H:i:s')
                ]);

                // tenants dll

                DB::table('tenants')->insert([
                  'id' => '1',
                  'name' => 'KFC Kemang',
                  'description' => 'Fast Food, American',
                  'phone' => ' 0217182745',
                  'more_info' => 'Breakfast <br>
                                  Home Delivery <br>
                                  Takeaway Available <br>
                                  No Alcohol Available <br>
                                  Wifi <br>
                                  Indoor Seating <br>
                                  Outdoor Seating',
                  'created_at' => date('Y-m-d H:i:s'),
                  'updated_at' => date('Y-m-d H:i:s'),
                  'id_users' => '2',
                ]);

                $days = ['senin', 'selasa', 'rabu', 'kamis', 'jum\'at', 'sabtu', 'minggu'];
                foreach ($days as $key => $value) {
                  DB::table('tenants_opening_hours')->insert([
                    'day' => $value,
                    'open_time' => '12:00 AM',
                    'close_time' => '11:59 PM',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                    'id_tenants' => '1',
                  ]);
                }
                DB::table('tenants_locations')->insert([
                  'name' => 'KFC Kemang',
                  'address' => 'Jl. Kemang Raya No. 14A, Kemang, Jakarta',
                  'lat' => '-6.2557966',
                  'lng' => '106.8094954',
                  'created_at' => date('Y-m-d H:i:s'),
                  'updated_at' => date('Y-m-d H:i:s'),
                  'id_tenants' => '1',
                ]);
                DB::table('tenants_fotos')->insert([
                  'name' => '90e235654f437a67c60ee8515fbbe9b8.png.jpg',
                  'path' => 'img/Tenants/1/90e235654f437a67c60ee8515fbbe9b8.png.jpg',
                  'created_at' => date('Y-m-d H:i:s'),
                  'updated_at' => date('Y-m-d H:i:s'),
                  'id_tenants' => '1',
                ]);
                DB::table('tenants_fotos')->insert([
                  'name' => '920369a517e1002923f41a818a4d103d.jpg',
                  'path' => 'img/Tenants/1/920369a517e1002923f41a818a4d103d.jpg',
                  'created_at' => date('Y-m-d H:i:s'),
                  'updated_at' => date('Y-m-d H:i:s'),
                  'id_tenants' => '1',
                ]);
                DB::table('tenants_fotos')->insert([
                  'name' => 'c93accd634cc90d716f5f0072fb6f688.jpg',
                  'path' => 'img/Tenants/1/c93accd634cc90d716f5f0072fb6f688.jpg',
                  'created_at' => date('Y-m-d H:i:s'),
                  'updated_at' => date('Y-m-d H:i:s'),
                  'id_tenants' => '1',
                ]);
                DB::table('tenants_promo')->insert([
                  'product_name' => 'Paket Ayam Favorite',
                  'promo_date' => '2019-09-14',
                  'promo_end_date' => '2019-10-14',
                  'description' => 'lorem ipsum',
                  'more_info' => 'lorem ipsum',
                  'created_at' => date('Y-m-d H:i:s'),
                  'updated_at' => date('Y-m-d H:i:s'),
                  'id_tenants' => '1',
                ]);
                DB::table('tenants_promo_locations')->insert([
                  'name' => 'KFC Kemang',
                  'address' => 'Jl. Kemang Raya No. 14A, Kemang, Jakarta',
                  'lat' => '-6.2557966',
                  'lng' => '106.8094954',
                  'created_at' => date('Y-m-d H:i:s'),
                  'updated_at' => date('Y-m-d H:i:s'),
                  'id_tenants_promo' => '1',
                ]);
                DB::table('tenants_promo_fotos')->insert([
                  'name' => 'favorite.jpg',
                  'path' => 'img/Tenants/1/promo_tenants/favorite.jpg',
                  'created_at' => date('Y-m-d H:i:s'),
                  'updated_at' => date('Y-m-d H:i:s'),
                  'id_tenants_promo' => '1',
                ]);
    }
}
