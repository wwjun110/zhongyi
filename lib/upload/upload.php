<?php
/*
+---------------------------------------------------------------------------+
| ZYIIS.COM                                                                 |
| ==========                                                                |
|                                                                           |
| Copyright (c) 2005-2009 Zyiis Limited                                     |
| For contact details, see: http://www.zyiis.com/                           |
|                                                                           |
+---------------------------------------------------------------------------+
$Id: config.php 30 2009-08-10 07:14:27Z jian@zyiis.com $
*/
// ini_set('display_errors', 'On');
// error_reporting(E_ALL &~E_NOTICE);
class upload {
  
  public $max_size = 0;
  public $file_ext = "";
  public $file_name = "";
  public $file_type = "";
  public $file_size = "";
  public $upload_path = "";
  public $allowed_types = array ();
  public $new_file_name = "";
  
  public function upload($fa = array( )) {
    $this->max_size = $fa ['max_size'];
    $this->new_file_name = $fa ['file_name'];
    // echo "<BR>dsffdassdfsdf \$fa ['allowed_types']=====" . $fa ['allowed_types'];
    $this->allowed_types = explode ( "|", $fa ['allowed_types'] );
    $this->upload_path = $fa ['upload_path'];
  }
  
  public function up($field = "userfile") {
    $this->file_temp = $_FILES [$field] ['tmp_name'];
    $this->file_name = $this->slash ( $_FILES [$field] ['name'] );
    $this->file_size = $_FILES [$field] ['size'];
    $this->file_type = preg_replace ( "/^(.+?);.*\$/", "\\1", $_FILES [$field] ['type'] );
    
    $this->file_ext = $this->extvaliad ( $_FILES [$field] ['name'] );
    if (! isset ( $_FILES [$field] )) {
      $this->errmsg ( "upload_no_file_selected" );
    }
    if (0 < $this->file_size) {
      $this->file_size = round ( $this->file_size / 1024, 2 );
    }
    $this->checksize ();
    $this->rqtype ( strtolower ( $this->file_type ) );
    //echo "<BR>\$this->file_ext===" . $this->file_ext;
    //print_r ( $this->allowed_types );
    if (! in_array ( $this->file_ext, $this->allowed_types )) {
      $this->errmsg ( "upload_no_ext4" );
    }
    if (! $this->path ()) {
      $this->errmsg ( "upload_no_filepath123" );
    }
    if ($_SERVER ['HTTP_USER_AGENT'] == "") {
      $this->errmsg ( "upload_no_ua" );
    }
    if (! is_uploaded_file ( $_FILES [$field] ['tmp_name'] )) {
      $error = ! isset ( $_FILES [$field] ['error'] ) ? 4 : $_FILES [$field] ['error'];
      switch ($error) {
        case 1 :
          $this->errmsg ( "upload_file_exceeds_limit" );
          break;
        case 2 :
          $this->errmsg ( "upload_file_exceeds_form_limit" );
          break;
        case 3 :
          $this->errmsg ( "upload_file_partial" );
          break;
        case 4 :
          $this->errmsg ( "upload_no_file_selected" );
          break;
        case 6 :
          $this->errmsg ( "upload_no_temp_directory" );
          break;
        case 7 :
          $this->errmsg ( "upload_unable_to_write_file" );
          break;
        case 8 :
          $this->errmsg ( "upload_stopped_by_extension" );
          break;
          $this->errmsg ( "upload_no_file_selected" );
      }
    }
    if (in_array ( $this->file_ext, array ("php", "asp", "aspx", "jsp" ) )) {
      $this->errmsg ( "upload_no_ext5" );
    }
    $this->new_file_name = $this->new_file_name . "." . $this->file_ext;
    if (! @copy ( $this->file_temp, $this->upload_path . $this->new_file_name )) {
      if (! @move_uploaded_file ( $this->file_temp, $this->upload_path . $this->new_file_name )) {
        $this->errmsg ( "upload_destination_error" );
      }
    } else if (($content = @file_get_contents ( $this->upload_path . $this->new_file_name )) !== FALSE && $this->file_ext != "swf" && ($stream = @fopen ( $this->upload_path . $this->new_file_name, "r+b" ))) {
      $content = preg_replace ( "/<\\?(php)|passthru|exec|shell_exec|system|fopen|base64_decode|base64_encode/i", "", $content );
      flock ( $stream, LOCK_EX );
      fwrite ( $stream, $content );
      flock ( $stream, LOCK_UN );
      fclose ( $stream );
    }
  }
  
  public function slash($xstring) {
    $s = array ("<!--", "-->", "'", "<", ">", "\"", "&", "\$", "=", ";", "?", "/", "%20", "%22", "%3c", "%253c", "%3e", "%0e", "%28", "%29", "%2528", "%26", "%24", "%3f", "%3b", "%3d" );
    $xstring = str_replace ( $s, "", $xstring );
    return StripSlashes ( $xstring );
  }
  
  public function checksize() {
    if ($this->max_size != 0 && $this->max_size < $this->file_size) {
      $this->errmsg ( "上传的大小超出了限制，请上传小于" . $this->max_size . "的文件" );
    }
  }
  
  public function extension($xstring, $ext) {
    $string = $imgext = "";
    $string = @fopen ( $xstring, "rb" );
    if ($string) {
      $string = @fread ( $string, 1024 );
      @fclose ( $string );
    } else {
      $this->errmsg ( "upload_no_ext6" );
    }
    if ($imgext == "" && 2 <= strlen ( $string )) {
      if (substr ( $string, 0, 3 ) == "") {
        $imgext = "jpg";
        return $imgext;
      }
      if (substr ( $string, 0, 4 ) == "GIF8" && $ext != "txt") {
        $imgext = "gif";
        return $imgext;
      }
      // if (substr ( $string, 0, 8 ) == "塒NG\r\n\x1A\n") {
      if (substr ( $string, 0, 8 ) == "PNG\r\n\x1A\n") {
        $imgext = "png";
        return $imgext;
      }
      if (substr ( $string, 0, 2 ) == "BM" && $ext != "txt") {
        $imgext = "bmp";
        return $imgext;
      }
      if ((substr ( $string, 0, 3 ) == "CWS" || substr ( $string, 0, 3 ) == "FWS") && $ext != "txt") {
        $imgext = "swf";
      }
    }
    return $imgext;
  }
  
  public function rqtype($type) {
    //echo "<BR>\$type===" . $type;
    //echo "<BR>";
    //print_r ( $this->allowed_types );
    
    if (count ( $this->allowed_types ) == 0 || ! is_array ( $this->allowed_types )) {
      $this->errmsg ( "upload_no_ext1" );
    }
    $imgtype = array ("image/png", "image/x-png", "image/pjpeg", "image/gif", "image/jpeg", "image/bmp", "application/x-shockwave-flash" );
    //echo "<BR>\$type===" . $type;
    //print_r ( $imgtype );
    
    if (! in_array ( $type, $imgtype )) {
      $this->errmsg ( "upload_no_ext2" );
    }
  }
  
  public function extvaliad($xstring) {
    $ms = explode ( ".", $xstring );
    $ms = strtolower ( end ( &$ms ) );
    $extension = $this->extension ( $this->file_temp, $ms );
    //echo "<BR>$extension != $ms";
    if ($extension != $ms) {
      //$this->errmsg ( "upload_no_ext3" );
    }
    return $ms;
  }
  
  public function path() {
    if ($this->upload_path == "") {
      $this->errmsg ( "upload_no_filepath" );
    }
    if (function_exists ( "realpath" ) && realpath ( $this->upload_path ) !== FALSE) {
      $this->upload_path = str_replace ( "\\", "/", realpath ( $this->upload_path ) );
    }
    if (! is_dir ( $this->upload_path )) {
      //echo "<BR>mkdir====";
      mkdir ( $this->upload_path, 511 );
    }
    // echo "<BR>\$this->upload_path===" . $this->upload_path;
    // exit();
    if (! is_really_writable ( $this->upload_path )) {
      $this->errmsg ( "upload_not_writable" );
    }
    $this->upload_path = preg_replace ( "/(.+?)\\/*\$/", "\\1/", $this->upload_path );
    return TRUE;
  }
  
  public function errmsg($msg) {
    exit ( "Can not upload：" . $msg );
  }
  
  public function data() {
    return array ("file_name" => $this->new_file_name );
  }

}

?>
