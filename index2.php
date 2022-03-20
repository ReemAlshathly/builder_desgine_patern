<?php
$connection = new PDO('mysql:host=localhost;dbname=my_database', 'username', 'password');

$hydrahon = new \ClanCats\Hydrahon\Builder('mysql', function($query, $queryString, $queryParameters) use($connection)
{
    $statement = $connection->prepare($queryString);
    $statement->execute($queryParameters);

    if ($query instanceof \ClanCats\Hydrahon\Query\Sql\FetchableInterface)
    {
        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }
});

$users = $h->table('users');

//////////////////////insrrt finction
$h->table('people')->insert(
    [
        [
            'name' => 'Ray',
            'age' => 25,
        ],
        [
            'name' => 'John',
            'age' => 30,
        ],
        [
            'name' => 'Ali',
            'age' => 22,
        ],
    ])->execute();
    /////////////////update
    $h->table('people')->update()->set('age', 26)->where('name', 'Ray')->execute();

    //////////////////////////////delet
    $h->table('people')->delete()->where('name', 'John')->execute();

    ///////////////////////select
    $h->table('people')->select()->get();

    ////////////////////////////////



    $users = $h->table('users');
    $users->select(['name'])->where('age', '>', 22)->get();
    $users->select()->where('name', 'jeffry')->one();
    $users->select()->first();
// or 
$users->select()->last();
$users->select()->where('active', 1)
$users->select()->where('active', 1)->where('age', '>', 18)
$users->select()
    ->where('age', '>', 18)
    ->where(function($q) {
        $q->where('active', 1)->orWhere('admin', 1);
    });
    $users->select()->where('id', 'in', [213, 32, 53, 43]);
    $users->select()->orderBy('name');
    $users->select()->orderBy('name', 'desc');
    $users->select()->orderBy('name')->orderBy('created_at');
    $users->select(['users.name', 'img.url'])
    ->join('user_images as img', 'users.id', '=', 'img.user_id')
    ->where('img.active', 1)














?>