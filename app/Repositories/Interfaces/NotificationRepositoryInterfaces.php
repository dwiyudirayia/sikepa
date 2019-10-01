<?php
namespace App\Repositories\Interfaces;


interface NotificationRepositoryInterfaces
{
    public function storeSuccess($data);
    public function storeFailed($error);
    public function showSuccess($data);
    public function showFailed($error);
    public function deleteSuccess($data);
    public function deleteFailed($error);
    public function updateSuccess($data);
    public function updateFailed($error);
    public function generalSuccess($data);
    public function generalFailed($error);
}
