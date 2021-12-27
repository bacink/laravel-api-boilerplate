<?php

use Dingo\Api\Routing\Router;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*
 * Welcome route - link to any public API documentation here
 */

Route::get('/', function () {
    echo 'Welcome to our API';
});


/** @var \Dingo\Api\Routing\Router $api */
$api = app('Dingo\Api\Routing\Router');
$api->version('v1', ['middleware' => ['api']], function (Router $api) {

    /*
     * Authentication
     */
    $api->group(['prefix' => 'auth'], function (Router $api) {
        $api->group(['prefix' => 'jwt'], function (Router $api) {
            $api->get('/token', 'App\Http\Controllers\Auth\AuthController@token');
            $api->post('/login', 'App\Http\Controllers\Auth\AuthController@login');
            $api->post('/logout', 'App\Http\Controllers\Auth\AuthController@logout');
        });
    });

    /*
         * Export To Office
         */
    $api->group(['prefix' => 'document'], function (Router $api) {
        $api->get('/seleksi-pendidikan/{pengajuanId}', 'App\Http\Controllers\ExportToOfficeController@seleksiPendidikan');
    });

    /*
     * Authenticated routes
     */
    $api->group(['middleware' => ['api.auth']], function (Router $api) {
        /*
         * Authentication
         */
        $api->group(['prefix' => 'auth'], function (Router $api) {
            $api->group(['prefix' => 'jwt'], function (Router $api) {
                $api->get('/refresh', 'App\Http\Controllers\Auth\AuthController@refresh');
                $api->delete('/token', 'App\Http\Controllers\Auth\AuthController@logout');
            });

            $api->get('/me', 'App\Http\Controllers\Auth\AuthController@me');
        });

        /*
         * Users
         */
        $api->group(['prefix' => 'users', 'middleware' => 'check_role:admin'], function (Router $api) {
            $api->get('/', 'App\Http\Controllers\UserController@getAll');
            $api->get('/{uuid}', 'App\Http\Controllers\UserController@get');
            $api->post('/', 'App\Http\Controllers\UserController@post');
            $api->put('/{uuid}', 'App\Http\Controllers\UserController@put');
            $api->patch('/{uuid}', 'App\Http\Controllers\UserController@patch');
            $api->delete('/{uuid}', 'App\Http\Controllers\UserController@delete');
        });

        /*
         * Roles
         */
        $api->group(['prefix' => 'roles'], function (Router $api) {
            $api->get('/', 'App\Http\Controllers\RoleController@getAll');
        });

        /*
        * SyaratPengajuans
        */
        $api->group(['prefix' => 'syarat-pengajuan'], function (Router $api) {
            $api->get('/', 'App\Http\Controllers\SyaratPengajuanController@getAll');
            $api->get('/{uuid}', 'App\Http\Controllers\SyaratPengajuanController@get');
            $api->post('/', 'App\Http\Controllers\SyaratPengajuanController@post');
            $api->patch('/{uuid}', 'App\Http\Controllers\SyaratPengajuanController@patch');
            $api->delete('/{uuid}', 'App\Http\Controllers\SyaratPengajuanController@delete');
        });

        /*
        * JenisPengajuans
        */
        $api->group(['prefix' => 'jenis-pengajuan'], function (Router $api) {
            $api->get('/', 'App\Http\Controllers\JenisPengajuanController@getAll');
            $api->get('/{uuid}', 'App\Http\Controllers\JenisPengajuanController@get');
            $api->post('/', 'App\Http\Controllers\JenisPengajuanController@post');
            $api->patch('/{uuid}', 'App\Http\Controllers\JenisPengajuanController@patch');
            $api->delete('/{uuid}', 'App\Http\Controllers\JenisPengajuanController@delete');
        });

        /* 
        * Pengajuan 
        */

        $api->group(['prefix' => 'pengajuan'], function (Router $api) {
            $api->get('/', 'App\Http\Controllers\PengajuanController@getAll');
            $api->get('/{uuid}', 'App\Http\Controllers\PengajuanController@get');
            $api->post('/', 'App\Http\Controllers\PengajuanController@post');
            $api->patch('/{uuid}', 'App\Http\Controllers\PengajuanController@patch');
            $api->delete('/{uuid}', 'App\Http\Controllers\PengajuanController@delete');
        });

        /*
         * Pegawai
         */
        $api->group(['prefix' => 'pegawai', 'as' => 'pegawai'], function (Router $api) {
            $api->get('/', 'App\Http\Controllers\PegawaiController@getAll')->name('.index');
            $api->get('/search', 'App\Http\Controllers\PegawaiController@search')->name('.search');
            $api->get('/{pegawaiId}', 'App\Http\Controllers\PegawaiController@get')->name('.detail');
        });

        /*
         * Pendidikan Tingkat
         */
        $api->group(['prefix' => 'pendidikan-tingkat'], function (Router $api) {
            $api->get('/', 'App\Http\Controllers\PendidikanTingkatController@getAll');
            $api->get('/search', 'App\Http\Controllers\PendidikanTingkatController@search');
            $api->get('/{perguruanTinggiId}', 'App\Http\Controllers\PendidikanTingkatController@get');
        });

        /*
         * Pendidikan Perguruan Tinggi
         */
        $api->group(['prefix' => 'pendidikan-perguruan-tinggi'], function (Router $api) {
            $api->get('/', 'App\Http\Controllers\PendidikanPerguruanTinggiController@getAll');
            $api->get('/search', 'App\Http\Controllers\PendidikanPerguruanTinggiController@search');
            $api->get('/{perguruanTinggiId}', 'App\Http\Controllers\PendidikanPerguruanTinggiController@get');
        });

        /*
         * Pendidikan Sekolah
         */
        $api->group(['prefix' => 'pendidikan-sekolah'], function (Router $api) {
            $api->get('/', 'App\Http\Controllers\PendidikanSekolahController@getAll');
            $api->get('/search', 'App\Http\Controllers\PendidikanSekolahController@search');
            $api->get('/{perguruanTinggiId}', 'App\Http\Controllers\PendidikanSekolahController@get');
        });

        /*
         * Jabatan
         */
        $api->group(['prefix' => 'jabatan'], function (Router $api) {
            $api->get('/kepala/{skpdId}', 'App\Http\Controllers\JabatanController@kepala');
        });

        /*
         * Jabatan AKtif
         */
        $api->group(['prefix' => 'jabatan-aktif'], function (Router $api) {
            $api->get('/', 'App\Http\Controllers\JabatanAktifController@getAll');
        });
    });
});
