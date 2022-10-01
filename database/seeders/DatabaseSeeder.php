<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name'=> 'Muhammad Abdullah',
            'verified'=>'approved',
            'email'=>'abdullahbutt3434@gmail.com',
            'status'=>'admin',
            'image'=>'ProfileImage/agent-1.jpg',
            'email_verified_at' => now(),
            'password'=>bcrypt('Royal782')

        ]);
        $user1 = User::create([
            'name'=> 'Muhammad Ali',
            'email'=>'usman03450308@gmail.com',
            'status'=>'registered',
            'verified'=>'approved',
            'phonenum'=>'(051) 2034 124',
            'mobilenum'=>'03087935377',
            'image'=>'ProfileImage/agent-2.jpg',
            'about'=>'I am giving properties on rent ',
            'email_verified_at' => now(),
            'password'=>bcrypt('Royal782')

        ]);
        $user2 = User::create([
            'name'=> 'Usman Ghani',
            'email'=>'abdullah.linkonix@gmail.com',
            'status'=>'registered',
            'phonenum'=>'(051) 2034 124',
            'mobilenum'=>'03087935377',
            'verified'=>'approved',
            'image'=>'ProfileImage/agent-3.jpg',
            'about'=>'Get property on rent at well developed areas ',
            'email_verified_at' => now(),
            'password'=>bcrypt('Royal782')

        ]);
        $user3 = User::create([
            'name'=> 'Jone Doe',
            'email'=>'Jonedoe@gmail.com',
            'status'=>'registered',
            'phonenum'=>'(051) 2034 124',
            'mobilenum'=>'03087935377',
            'verified'=>'approved',
            'image'=>'ProfileImage/agent-4.jpg',
            'about'=>'I am giving properties on rent first come first serve ',
            'email_verified_at' => now(),
            'password'=>bcrypt('Royal782')

        ]);

        $category1 = Category::create([
            'name' => 'shop'
        ]);

        $category2 = Category::create([
            'name' => 'flat'
        ]);

        $category3 = Category::create([
            'name' => 'housing'
        ]);

        $category4 = Category::create([
            'name'=>'plane field'
        ]);


        //flat
        $post1 = Post::create([
            'title' => 'Rent a house',
            'location'=>'DHA phase 2',
            'total_area'=>'2300ft',
            'rent'=>'12000',
            'condition'=>'Perfect',
            'image1'=>'PostImg/property-1.jpg',
            'image2'=>'PostImg/property-2.jpg',
            'image3'=>'PostImg/property-3.jpg',
            'description'=>'this is good place with lot of faclities book it now ',
            'status'=>'approved',
            'amenities'=>"Outdoor,Kitchen,Cable Tv,Balcony,Outdoor,Tennis Courts,Internet,Parking,garage",
            'bedroom'=>'4',
            'bathroom'=>'2',
            'kitchen'=>'1',
            'category_id'=>$category3->id,
            'user_id'=>$user1->id,
            'city'=>'Lahore'

        ]);
        $post2 = Post::create([
            'title' => 'Flat For rent ',
            'location'=>'Behria orchid',
            'total_area'=>'5350ft',
            'rent'=>'20000',
            'city'=>'karachi',
            'condition'=>'good',
            'description'=>'this is good place with lot of facalities',
            'image1'=>'PostImg/property-4.jpg',
            'image2'=>'PostImg/property-5.jpg',
            'image3'=>'PostImg/property-6.jpg',
            'status'=>'approved',
            'amenities'=>"Outdoor,Kitchen,Cable Tv,Balcony,Outdoor,Tennis Courts,Internet,Parking,garage",
            'bedroom'=>'5',
            'bathroom'=>'2',
            'kitchen'=>'1',
            'category_id'=>$category2->id,
            'user_id'=>$user1->id

        ]);
        $post5 = Post::create([
            'title' => 'Flat For rent ',
            'location'=>'6th Road',
            'total_area'=>'1050ft',
            'rent'=>'10000',
            'city'=>'rawalpindi',
            'condition'=>'good',
            'description'=>'this is good place with lot of facalities',
            'image1'=>'PostImg/property-5.jpg',
            'image2'=>'PostImg/property-4.jpg',
            'image3'=>'PostImg/property-10.jpg',
            'status'=>'approved',
            'amenities'=>"Outdoor,Kitchen,Cable Tv,Balcony,Internet,Parking,",
            'bedroom'=>'5',
            'bathroom'=>'2',
            'kitchen'=>'1',
            'category_id'=>$category2->id,
            'user_id'=>$user3->id

        ]);
        $post6 = Post::create([
            'title' => 'Flat For rent ',
            'location'=>'Behria orchid',
            'total_area'=>'5350ft',
            'rent'=>'20000',
            'city'=>'karachi',
            'condition'=>'good',
            'description'=>'this is good place with lot of facalities for booking contact now on given number',
            'amenities'=>"Outdoor,Kitchen,Cable Tv,Balcony,Outdoor,Tennis Courts,Internet,Parking,garage",
            'image1'=>'PostImg/property-1.jpg',
            'image2'=>'PostImg/property-6.jpg',
            'image3'=>'PostImg/property-11.jpg',
            'status'=>'pending',
            'bedroom'=>'5',
            'bathroom'=>'2',
            'kitchen'=>'1',
            'category_id'=>$category2->id,
            'user_id'=>$user1->id

        ]);



        //house
        $post3 = Post::create([
            'title' => 'this is house',
            'location'=>'Gulberg st 2',
            'total_area'=>'1233ft',
            'rent'=>'32000',
            'description'=>'this is good place with lot of facalities',
            'condition'=>'good',
            'amenities'=>"Outdoor,Kitchen,Cable Tv,Balcony,Outdoor,Tennis Courts,Internet,Parking,garage",
            'image1'=>'PostImg/property-6.jpg',
            'image2'=>'PostImg/property-7.jpg',
            'image3'=>'PostImg/property-4.jpg',
            'status'=>'approved',
            'bedroom'=>'5',
            'bathroom'=>'2',
            'kitchen'=>'2',
            'city'=>'Lahore',
            'category_id'=>$category3->id,
            'user_id'=>$user2->id

        ]);
        $post7 = Post::create([
            'title' => 'house for rent',
            'location'=>'Shahra-e-Faisal',
            'total_area'=>'1233ft',
            'rent'=>'17000',
            'description'=>'this is good place with lot of facalities',
            'condition'=>'good',
            'amenities'=>"Outdoor,Kitchen,Cable Tv,Balcony,Outdoor,Tennis Courts,Internet,Parking,garage",
            'image1'=>'PostImg/property-4.jpg',
            'image2'=>'PostImg/property-2.jpg',
            'image3'=>'PostImg/property-1.jpg',
            'status'=>'approved',
            'bedroom'=>'6',
            'bathroom'=>'2',
            'kitchen'=>'1',
            'city'=>'Karachi',
            'category_id'=>$category3->id,
            'user_id'=>$user3->id

        ]);
        $post8 = Post::create([
            'title' => 'house for rent',
            'location'=>'Rajput town st 2',
            'total_area'=>'1233ft',
            'rent'=>'42000',
            'amenities'=>"Outdoor,Kitchen,Cable Tv,Balcony,Outdoor,Tennis Courts,Internet,Parking,garage",
            'description'=>'this is good place with lot of facalities',
            'condition'=>'good',
            'image1'=>'PostImg/property-5.jpg',
            'image2'=>'PostImg/property-1.jpg',
            'image3'=>'PostImg/property-12.jpg',
            'status'=>'pending',
            'bedroom'=>'7',
            'bathroom'=>'2',
            'kitchen'=>'1',
            'city'=>'Fasialabad',
            'category_id'=>$category3->id,
            'user_id'=>$user1->id

        ]);



        //shop
        $post4 = Post::create([
            'title' => 'this is shop',
            'location'=>'sadar',
            'description'=>'this is good place with lot of facalities',
            'total_area'=>'500ft',
            'rent'=>'8000',
            'condition'=>'good',
            'image1'=>'PostImg/shop3.jpg',
            'image2'=>'PostImg/shop1.jpg',
            'image3'=>'PostImg/shop2.jpg',
            'status'=>'approved',
            'category_id'=>$category1->id,
            'user_id'=>$user2->id,
            'city'=>'Lahore',


        ]);
        $post9 = Post::create([
            'title' => 'shop on rent',
            'location'=>'sadar',
            'description'=>'Shop at good location with in city',
            'total_area'=>'500ft',
            'rent'=>'8000',
            'condition'=>'good',
            'image1'=>'PostImg/shop2.jpg',
            'image2'=>'PostImg/shop4.jpg',
            'image3'=>'PostImg/shop1.jpg',
            'status'=>'approved',
            'category_id'=>$category1->id,
            'user_id'=>$user3->id,
            'city'=>'Lahore',


        ]);




























        //shop
        $category1->posts()->attach([$post4->id]);
        $user2->posts()->attach([$post4->id]);

        $category1->posts()->attach([$post9->id]);
        $user3->posts()->attach([$post9->id]);

        //flat
        $category2->posts()->attach([$post2->id]);
        $user1->posts()->attach([$post2->id]);

        $category2->posts()->attach([$post5->id]);
        $user3->posts()->attach([$post5->id]);

        $category2->posts()->attach([$post6->id]);
        $user1->posts()->attach([$post6->id]);


        //house
        $category3->posts()->attach([$post1->id]);
        $user1->posts()->attach([$post1->id]);

        $category3->posts()->attach([$post3->id]);
        $user2->posts()->attach([$post3->id]);

        $category3->posts()->attach([$post7->id]);
        $user3->posts()->attach([$post7->id]);

        $category3->posts()->attach([$post8->id]);
        $user1->posts()->attach([$post8->id]);


    }

}
