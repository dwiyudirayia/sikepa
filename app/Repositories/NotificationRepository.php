<?php

namespace App\Repositories;

use App\Repositories\Interfaces\NotificationRepositoryInterfaces;

class NotificationRepository implements NotificationRepositoryInterfaces
{
    public function storeSuccess()
    {
        $data = [
            'messages' => 'Data Berhasil di Masukan',
            'status' => 200
        ];

        return $data;
    }
    public function storeFailed($error)
    {
        $data = [
            'messages' => $error->getMessage(),
            'status' => $error->getCode()
        ];

        return $data;
    }
    public function showSuccess($data)
    {
        $data = [
            'data' => $data,
            'messages' => 'Data Berhasil di Ambil',
            'status' => 200
        ];

        return $data;
    }
    public function showFailed($error)
    {
        $data = [
            'messages' => $error->getMessage(),
            'status' => $error->getCode()
        ];

        return $data;
    }
    public function deleteSuccess()
    {
        $data = [
            'messages' => 'Data Berhasil di Hapus',
            'status' => 200
        ];

        return $data;
    }
    public function deleteFailed($error)
    {
        $data = [
            'messages' => $error->getMessage(),
            'status' => $error->getCode()
        ];

        return $data;
    }
    public function updateSuccess()
    {
        $data = [
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
