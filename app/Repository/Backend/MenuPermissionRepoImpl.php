<?php

namespace App\Repository\Backend;

use App\Interfaces\EloquentBaseRepository;
use App\Interfaces\Repo\Backend\MenuPermissionRepo;
use App\Models\MenuAccessModel;
use Illuminate\Support\Facades\DB;

/**
 * Repository implementation of menu for the backend model.
 * they are backend menu info
 * @develop by fahim
 * @author Kohinurit limited
 * @since 2023-08-20
 */
class MenuPermissionRepoImpl extends EloquentBaseRepository implements MenuPermissionRepo
{
    protected $model;

    public function __construct(MenuAccessModel $model)
    {
        $this->model = $model;
    }

    public function getPermissionMenu($pid,$permission_type): array
    {
        $dbName = env('DB_DATABASE');
        return DB::select("SELECT t1.id,t1.menu_name,t1.parent_id,t1.slug,t1.menu_url,t1.icon,
acm.is_create,acm.is_edit,acm.is_delete,acm.is_view,acm.is_request,acm.is_approved
 FROM $dbName.access_menu  acm
LEFT JOIN $dbName.backend_menu t1 ON t1.id=acm.menu_id
WHERE acm.status=1 AND t1.parent_id='$pid' AND t1.status<>9  AND acm.user_type='$permission_type'
UNION
SELECT ms.ID,ms.menu_name,ms.parent_id,ms.slug,ms.menu_url,ms.icon,0 is_create,0 is_edit,0 is_delete,0 is_view,0 is_request,0 is_approved
 FROM $dbName.backend_menu ms WHERE ms.status<>9 AND  ms.parent_id='$pid' AND
  ms.ID NOT IN (
 SELECT pm.menu_id FROM $dbName.access_menu pm WHERE  pm.user_type='$permission_type'  AND  pm.status=1
 ) ORDER BY menu_name");
//        return DB::select("CALL permission_menu_access($pid,'$permission_type')");

    }

    public function findByUserType($userRoleType)
    {
        return $this->model->select('*')
        ->where(['user_type' => $userRoleType])
        ->get();
    }

    public function menuCheckByUserTypeAndMenuId($userRoleType, $menuId)
    {
        return $this->model->select('*')
        ->where(['user_type' => $userRoleType])
        ->where(['menu_id' => $menuId])
        ->first();
    }




}
