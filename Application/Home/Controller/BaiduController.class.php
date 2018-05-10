<?php
namespace Home\Controller;
use Common\Controller\HomeBaseController;
class BaiduController extends HomeBaseController {
    public $api_key = 'i8PP6YTQXE2c6adbsWyP1Vik';
    public $secret_key = 'OM2OzWLBXXUBOmLXKGIM14fvKFbgv6Nu';

    /**
     * [request_post 发送信息]
     * @param  string $url   [发送路径]
     * @param  string $param [post参数]
     */
    function request_post($url = '', $param = '') {
        if (empty($url) || empty($param)) {
            return false;
        }

        $postUrl = $url;
        $curlPost = $param;
        $curl = curl_init();//初始化curl
        curl_setopt($curl, CURLOPT_URL,$postUrl);//抓取指定网页
        curl_setopt($curl, CURLOPT_HEADER, 0);//设置header
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);//要求结果为字符串且输出到屏幕上
        curl_setopt($curl, CURLOPT_POST, 1);//post提交方式
        curl_setopt($curl, CURLOPT_POSTFIELDS, $curlPost);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); //跳过证书检查
        $data = curl_exec($curl);//运行curl
        curl_close($curl);

        return $data;
    }

    //获取token
    public function get_token(){
        $url = 'https://aip.baidubce.com/oauth/2.0/token';
        $post_data['grant_type']     = 'client_credentials';
        $post_data['client_id']      = $this->api_key;
        $post_data['client_secret']  = $this->secret_key;
        $o = "";
        foreach ( $post_data as $k => $v )
        {
            $o.= "$k=" . urlencode( $v ). "&" ;
        }
        $post_data = substr($o,0,-1);

        $res = $this->request_post($url, $post_data);
        $token = json_decode($res,true);
        $token = $token['access_token'];

        return $token;
    }

    //上传图片
    public function face_upload($saveName=''){
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     3145728 ;// 设置附件上传大小
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        // $root_path=rtrim($_SERVER['SCRIPT_NAME'],'/index.php');//根目录
        $upload->rootPath  =      './Upload/'; // 设置附件上传目录
        $upload->savePath  =      '/image/baidu_AI/'; // 设置附件上传目录
        if($saveName){
            $upload->saveName  =      'face';//固定上传文件名
        }else{
            $upload->saveName = array('uniqid','');
        }

        $upload->replace   =      true;//相同文件名是否覆盖
        // 上传文件
        $info   =   $upload->upload();
        if(!$info) {// 上传错误提示错误信息
            $this->error($upload->getError());
        }else{// 上传成功
            return $info;
        }
    }

    //人脸对比页
    public function matching(){
        $this->display();
    }

    //人脸对比
    public function face_matching()
    {
        $token = $this->get_token();
        $url = 'https://aip.baidubce.com/rest/2.0/face/v2/match?access_token=' . $token;

        $info = $this->face_upload();//上传图片
        // print_r($info);die;
        $url1 = './Upload/'.$info['face1']['savepath'].$info['face1']['savename'];
        $url2 = './Upload/'.$info['face2']['savepath'].$info['face2']['savename'];

        $img = file_get_contents($url1);
        $img = base64_encode($img);
        $img1 = file_get_contents($url2);
        $img1 = base64_encode($img1);
        // 上传错误提示错误信息
        if(!$img) {
            echo '图片一上传失败';die;
        }else if(!$img1){
            echo '图片二上传失败';die;
        }

        $bodys = array('images' => implode(',', array($img, $img1)));
        $res = $this->request_post($url, $bodys);
        echo $res;
    }

    //人脸检测页
    public function detection(){
        $this->display();
    }

    //百度AI人脸检测
    public function face_detection(){

        $token = $this->get_token();

        $url = 'https://aip.baidubce.com/rest/2.0/face/v1/detect?access_token='.$token;

        $info = $this->face_upload('face');//上传图片
        $img_url = './Upload/'.$info['face_detection']['savepath'].$info['face_detection']['savename'];

        $img = file_get_contents($img_url);
        $img = base64_encode($img);
        if(!$img) {// 上传错误提示错误信息
            $this->error($upload->getError());
        }else{// 上传成功
            $bodys = array(
                'max_face_num' => 5,//最大识别脸数
                'face_fields' => "age,beauty,expression,faceshape,gender,glasses,landmark,race,qualities",
                'image' => $img
            );
            $res = $this->request_post($url, $bodys);
            echo $res;
        }
    }


}
