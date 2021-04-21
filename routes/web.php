<?php




// One To One
Route::get('one-to-one','OneToOneController@OneToOne');

// One To One Inverso
Route::get('one-to-one-invers','OneToOneController@Invers');

// One To One Insert
Route::get('one-to-one-insert','OneToOneController@Insert');



//One To Many
Route::get('one-to-many', 'OneToManyController@OneToMany');

//Many To One
Route::get('many-to-one', 'OneToManyController@ManyToOne');

//One-to-Many-two
Route::get('one-to-many-two', 'OneToManyController@OneToManyTwo');

//One to Many - Insert
Route::get('one-to-many-insert', 'OneToManyController@OneToManyInsert');

//One to Many - Insert - two
Route::get('one-to-many-insert-two', 'OneToManyController@OneToManyInsertTwo');

//Has Many Through
Route::get('has-many-through', 'OneToManyController@hasManyThrough');

//Many To Many 
Route::get('many-to-many', 'ManyToManyController@ManyToMany');

//Many To Many inverse
Route::get('many-to-many-inverse', 'ManyToManyController@ManyToManyInverse');

//Many To Many insert
Route::get('many-to-many-insert', 'ManyToManyController@ManyToManyInsert');


//Relation Polymorphic
Route::get('polymorphics', 'PolymorphicController@Polymorphic');

//Polymorphic Insert
Route::get('polymorphic-insert', 'PolymorphicController@PolymorphicInsert');


Route::get('/', function () {
    return view('welcome');
});
