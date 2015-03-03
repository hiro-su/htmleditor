<?php
session_start();

class View{
	public static function getDir ( $path ) { 
		if (!is_dir($path)) {   // �f�B���N�g���łȂ���� false ��Ԃ�
			return false;
		}

		$dir = array();    // �߂�l�p�̔z��

		if ($handle = opendir($path)) {
			while (false !== ($file = readdir($handle))) { 
				if ('.' == $file || '..' == $file) {
					// �������g�Ə�ʊK�w�̃f�B���N�g�������O
					continue;
				}
				if (is_dir($path.'/'.$file)) {
					// �f�B���N�g���Ȃ�Ύ������g���Ăяo��
					$dir[$file] = View::getDir($path.'/'.$file);
				} elseif (is_file($path.'/'.$file)) {
					// �t�@�C���Ȃ�΃p�X���i�[
					$dir[$file] = $path.'/'.$file;
				}
			}
			closedir($handle);
		}
		return $dir;
	}



	public static function showDir ( $tree ) {
		if (!is_array($tree)) {   // �z��łȂ���� false ��Ԃ� 
			return false;
		}

		static $count = 0;    // �C���f���g�̊K�w�̐[��
		$indent = ($count) ? str_repeat('&nbsp;', $count) : '';

		$count++;
		foreach ($tree as $key => $value) {
			if (is_array($value)) { 
				// �z��̏ꍇ�f�B���N�g������\�����ċA�ďo 
		echo '<div id="folder">';
				print('<div id="directory">' . $indent. $key. "</div>");
				View::showDir($value); 
			} elseif (preg_match('/\.(html|txt|php|css|xml)$/i', $value)) {
				// HTML��TEXT��PHP�̂݃A���J�[�����ăt�@�C������\�� 
				echo '<div id="link">';
				print($indent. '<input id="radio" type="radio" name="fileName" value="'.$value.'"><a id="file_link" href="'. $value. '" target="view">'. $key. "</a>");
				echo '</div>';
			}
		}
		echo "</div>";
		$count--;
		return true;
	}
}
?>
