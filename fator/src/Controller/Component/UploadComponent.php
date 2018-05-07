<?php

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Utility\Text;

/**
 * Upload component
 */
class UploadComponent extends Component {

    public function send($data) {
        if (!empty($data)) {
            $filename = $data['name'];
            $file_tmp_name = $data['tmp_name'];
            $dir = WWW_ROOT . 'uploads';
            $allowed = array('png', 'jpg', 'jpeg', 'gif');
            if (!in_array(substr(strrchr($filename, '.'), 1), $allowed)) {
                $urlDBFile = 'erro_1';
            } elseif (is_uploaded_file($file_tmp_name)) {
                $urlDBFile = Text::uuid() . '-' . $filename;
                move_uploaded_file($file_tmp_name, $dir . DS . $urlDBFile);
            } else {
                $urlDBFile = 'erro_2';
            }
            return $urlDBFile;
        }
    }

}
