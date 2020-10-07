<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $helloWorld = 'Hello World';

    return view('welcome', compact ('helloWorld'));
});

 Route::get('/model', function(){
     //$products = \App\Product::all(); //select * from products

//     $user = new \App\User();
//       $user = \App\User::find(1);
//       $user->name = 'Usuário Teste Editado...';

//     $user->save();
//     return
//    \App|User::all() - retorna todos os usuários
//    \App\User::find(3) - retorna o usuário com base no id
     //\App\User::where('name', 'Christelle Stiedemann')->first()// select * from users where name = 'Christelle Stiedemann'
     //\App\User::paginate(10); - paginar dados com laravel

     //Mass Assignment - Atribuição em Massa

     //$user = \App\User::create([
     //  'name' => 'Guilherme Ribeiro
     //   'email100@email.com'
     //  'password' =>bcrypt(123345566')
     // ]);

     //Mass Update
     // $user = \App\User::find(42);
     // $user->uodate([
     // 'name' => 'Atualizando com Mass Update'
     // ]);  //true ou false

      //como eu faria para pegar a loja de um usuário
     //$user= \App\User::find(4);

     //dd($user->store()->count()); //0 objeto único (Store) se for collection de Dados(Objetos)

    //Pegar os produtos de uma loja?
     $loja = \App\Store::find(1);
     // return $loja->products; | $loja->products()->where('id', 9)->get();

     //Pegar as lojas de uma categoria de uma loja?
     // $categoria = \App\Category::find(1);
     // $categoria->products;

     //Criar uma loja para um usuário
   //  $user = \App\User::find(10);
   //  $store = $user->store()->create([
         //      'name' =>'Loja Teste',
  //       'description' => 'Loja Teste de produtos de informática',
  //       'mobile_phone' => 'XX-XXXXX-XXXX',
  //       'phone' => 'XX-XXXXX-XXXX',
  //       'slug' =>  'loja-teste'
  //   ]);


     // Criar um produto para uma loja
   //  $store = \App\Store::find(41);
     // $store->products()->create([
       //  'name' => 'Notebook Dell',
         // 'description' => 'CORE I5 10GB',
         // 'body' => 'Qualquer coisa...',
         // 'price' => 2999.90,
         // 'slug' => 'notebook-dell',
     // ]);
     //
     // dd($product);


     //Criar uma categoria
    // \App\Category::create([
    //     'name' =>  'Games',
    //     'slug' => 'games'
    // ]);

    // \App\Category::create([
    //     'name' =>'Notebooks',
    //     'slug' => 'notebooks'
    //  ]);
     //
       //   return \App\Category::all();

//Adicionar um produto para uma categoria ou vice-versa

    // $product = \App\Product::find(49);
//
  //   dd($product->categories()->sync([1,2]));


     return \App\User::all();
 });

 Route::prefix('admin')->name('admin.')->namespace('admin')->group(function () {

     Route::prefix('stores')->name('stores.')->group(function () {


         Route::get('/', 'Admin\\StoreController@index');
         Route::get('/create', 'Admin\\StoreController@create');
         Route::post('/stores', 'Admin\\StoreController@stores');
         Route::get('/{stores}/edit', 'Admin\\StoreController@edit');
         Route::post('/update/{stores}', 'Admin\\StoreController@update');
         Route::get('/destroy/{stores}', 'Admin\\StoreController@destroy');

     });

     Route::resource('products', 'ProductController');

 });
