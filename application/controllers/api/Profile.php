<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Profile extends REST_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Profile_model');

  }
  public function index_get()
  {
    $id = $this->get('nik');

    if ($id === null) {
      // $profile = $this->Profile_model->getProfile();
      $this->response([
        'status' => true,
        'message' => 'Post not found'
      ], REST_Controller::HTTP_NOT_FOUND);
    } else {
      $profile = $this->Profile_model->getProfile($id);
    }
    if ($profile) {
      $this->response([
        'status' => true,
        'data' => $profile
      ], REST_Controller::HTTP_OK);
    } else {
      $this->response([
        'status' => true,
        'message' => 'id not found'
      ], REST_Controller::HTTP_NOT_FOUND);
    }
  }
  public function index_delete()
  {
    $id = $this->delete('id');
    if ($id === null) {
      $this->response([
        'status' => true,
        'message' => 'provide an id!'
      ], REST_Controller::HTTP_BAD_REQUEST);
    } else {
      if ($this->Profile_model->deleteProfile($id) > 0) {
        $this->response([
          'status' => true,
          'id' => $id,
          'message' => 'deleted.'
        ], REST_Controller::HTTP_OK);
      } else {
        $this->response([
          'status' => false,
          'message' => 'id not found!'
        ], REST_Controller::HTTP_BAD_REQUEST);
      }
    }
  }

  public function index_post()
  {
    $data = [
      'nik' => $this->post('nik'),
      'gelar_non_akademis_depan' => $this->post('gelar_non_akademis_depan'),
      'gelar_akademis_depan' => $this->post('gelar_akademis_depan'),
      'status_pernikahan' => $this->post('status_pernikahan'),
      'tempat_lahir' => $this->post('tempat_lahir'),
      'alamat' => $this->post('alamat'),
      'rt' => $this->post('rt'),
      'rw' => $this->post('rw'),
      'provinsi' => $this->post('provinsi'),
      'kabupaten' => $this->post('kabupaten'),
      'kecamatan' => $this->post('kecamatan'),
      'kode_pos' => $this->post('kode_pos'),
      'pendidikan_terakhir' => $this->post('pendidikan_terakhir'),
      'gelar_non_akademis_belakang' => $this->post('gelar_non_akademis_belakang'),
      'gelar_akademis_belakang' => $this->post('gelar_akademis_belakang'),
      'agama' => $this->post('agama'),
      'tanggal_lahir' => $this->post('tanggal_lahir'),
      'golongan_darah' => $this->post('golongan_darah'),
      'formasi_jabatan' => $this->post('formasi_jabatan'),
      'nip' => $this->post('nip'),
      'email' => $this->post('email'),
      'password' => $this->post('password'),
      'image' => $this->post('image'),
    ];

    if ($this->Profile_model->createProfile($data) > 0) {
      $this->response([
        'status' => true,
        'message' => 'Profile has been created'
      ], REST_Controller::HTTP_CREATED);
    } else {
      $this->response([
        'status' => true,
        'message' => 'Failed to create new data!'
      ], REST_Controller::HTTP_BAD_REQUEST);
    }
  }
  public function index_put()
  {
    $id = $this->put('id');
    $data = [
      'nik' => $this->put('nik'),
      'gelar_non_akademis_depan' => $this->put('gelar_non_akademis_depan'),
      'gelar_akademis_depan' => $this->put('gelar_akademis_depan'),
      'status_pernikahan' => $this->put('status_pernikahan'),
      'tempat_lahir' => $this->put('tempat_lahir'),
      'alamat' => $this->put('alamat'),
      'rt' => $this->put('rt'),
      'rw' => $this->put('rw'),
      'provinsi' => $this->put('provinsi'),
      'kabupaten' => $this->put('kabupaten'),
      'kecamatan' => $this->put('kecamatan'),
      'kode_pos' => $this->put('kode_pos'),
      'pendidikan_terakhir' => $this->put('pendidikan_terakhir'),
      'gelar_non_akademis_belakang' => $this->put('gelar_non_akademis_belakang'),
      'gelar_akademis_belakang' => $this->put('gelar_akademis_belakang'),
      'agama' => $this->put('agama'),
      'tanggal_lahir' => $this->put('tanggal_lahir'),
      'golongan_darah' => $this->put('golongan_darah'),
      'formasi_jabatan' => $this->put('formasi_jabatan'),
      'nip' => $this->put('nip'),
      'email' => $this->put('email'),
      'password' => $this->put('password'),
      'image' => $this->put('image'),
    ];
    if ($this->Profile_model->updateProfile($data, $id) > 0) {
      $this->response([
        'status' => true,
        'message' => 'Profile has been update'
      ], REST_Controller::HTTP_CREATED);
    } else {
      $this->response([
        'status' => true,
        'message' => 'Failed to update data!'
      ], REST_Controller::HTTP_BAD_REQUEST);
    }
  }
}
