<?php

namespace App\Repositories;

use App\Repositories\Interfaces\NotificationRepositoryInterfaces;

class NotificationRepository implements NotificationRepositoryInterfaces
{
    public function storeSuccess($data)
    {
        $array = [
            'data' => $data,
            'messages' => 'Data Berhasil di Masukan',
            'status' => 200
        ];

        return $array;
    }
    public function storeFailed($error)
    {
        $array = [
            'messages' => $error->getMessage(),
            'status' => $error->getCode()
        ];

        return $array;
    }
    public function showSuccess($data)
    {
        $array = [
            'data' => $data,
            'messages' => 'Data Berhasil di Ambil',
            'status' => 200
        ];

        return $array;
    }
    public function showFailed($error)
    {
        $array = [
            'messages' => $error->getMessage(),
            'status' => $error->getCode()
        ];

        return $array;
    }
    public function deleteSuccess($data)
    {
        $array = [
            'data' => $data,
            'messages' => 'Data Berhasil di Hapus',
            'status' => 200
        ];

        return $array;
    }
    public function deleteFailed($error)
    {
        $array = [
            'messages' => $error->getMessage(),
            'status' => $error->getCode()
        ];

        return $array;
    }
    public function updateSuccess($data)
    {
        $data = [
            'data' => $data,
            'messages' => 'Data Berhasil di Ubah',
            'status' => 200
        ];

        return $data;
    }
    public function updateFailed($error)
    {
        $data = [
            'messages' => $error->getMessage(),
            'status' => $error->getCode()
        ];

        return $data;
    }
    public function generalSuccess($data)
    {
        $data = [
            'data' => $data,
            'messages' => 'Data Berhasil di Ambil',
            'status' => 200
        ];

        return $data;
    }
    public function generalFailed($error)
    {
        $data = [
            'messages' => $error->getMessage(),
            'status' => $error->getCode()
        ];

        return $data;
    }
}
