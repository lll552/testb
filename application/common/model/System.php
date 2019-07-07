<?php

namespace app\common\model;

use think\Model;
use think\model\concern\SoftDelete;

class System extends Model
{
    //
    use SoftDelete;
    public function set($data){
        $validate = new \app\common\validate\System();
        if(!$validate->scene('set')->check($data)){
            return $validate->getError();
        }

        $webInfo = $this->find($data['id']);
        $webInfo['webname'] = $data['webname'];
        $webInfo['copyright'] = $data['copyright'];
        $return = $webInfo->save();
        if($return){
             return  1;
        }else{
            return '设置失败';
        }
    }
}
