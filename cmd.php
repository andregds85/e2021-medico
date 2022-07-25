Arrumar a parte dos usuários editar quando buscar a macro buscar somente os
hospais daquela macro.


php artisan migrate:reset

php artisan make:seeder PermissionTableSeeder

php artisan db:seed --class=PermissionTableSeeder

php artisan make:seeder macroSeeder

php artisan db:seed --class=macroSeeder

php artisan make:seeder CreateAdminUserSeeder

php artisan db:seed --class=CreateAdminUserSeeder

php artisan make:seeder CategoriaSeederM2
php artisan db:seed --class=CategoriaSeederM2

1	CER MACRO FOZ DO RIO ITAJAI 42C65 / certo
2	CER MACRO GF POLIS 42C15 /  certo 
3	CER MACRO GOESTE 42C56  /  certo    
4	CER MACRO MEIO OESTE 42C58  /  certo 
5	CER MACRO NORDESTE 42C68 / certo
6	CER MACRO SERRA 42C70  / 
7	CER MACRO SUL 42C67
8	CER MACRO VALE DO ITAJAI 42C63

Criar uma Model e Migrations
php artisan make:model nome da Model -m


Criar um Controller
php artisan make:controller PostController --resource
php artisan make:controller ManualController --resource



Criando um modulo
https://www.diegobrocanelli.com.br/php/laravel-module/


Criando a autenticação toda.
https://medium.com/@tm.talhamaqsood18/simple-authentication-in-laravel-8-9-0-step-by-step-with-images-a63149679f2b


Exportar CSV e EXCEL
<li><a class="nav-link" href="{{ url('https://websolutionstuff.com/post/laravel-8-import-export-csv-excel-file-example
') }}">Exportar CSV</a></li>


Mapas dos Layouts

Layouts         Principal

Layouts 2       Sou do Hospital

Layouts 3       Regulação

Layouts 4       Administrador

Layouts 5       Municipio

Layouts 6       Médico Regulador


php artisan make:model incluir_mapa_p2 -m       --

php artisan make:controller admController --resource

---------------------------------------------------------------------------
eloquent com dois where

$itensP = Pacientes::select("*")
->where([
["label", "=", 1],
["macro", "=", "$m"]
])->get();
?>

----------------------------------------------------------------------------
eloquent pra todos os dados da tabela com all().
eloquent para utilizar where   no where macro = id;

<?php
 use App\Models\Categoria;
 $tabela = categoria::all();
 $itensP = categoria::where('macro',$id)->get(); ?>
 ?>
----------------------------------------------------------------------------
Passagem de Paramero direto view

botão ou link
<a href="{{ route('users.create', ['id' => $item->id]) }}">Próxima Etapa</a>

pega na view com php
<?php
$id=$_GET['id'];
echo $id;
?>
-----------------------------------------------------------------------------
