<?php
session_start();

class View{
	public static function getDir ( $path ) { 
		if (!is_dir($path)) {   // ディレクトリでなければ false を返す
			return false;
		}

		$dir = array();    // 戻り値用の配列

		if ($handle = opendir($path)) {
			while (false !== ($file = readdir($handle))) { 
				if ('.' == $file || '..' == $file) {
					// 自分自身と上位階層のディレクトリを除外
					continue;
				}
				if (is_dir($path.'/'.$file)) {
					// ディレクトリならば自分自身を呼び出し
					$dir[$file] = View::getDir($path.'/'.$file);
				} elseif (is_file($path.'/'.$file)) {
					// ファイルならばパスを格納
					$dir[$file] = $path.'/'.$file;
				}
			}
			closedir($handle);
		}
		return $dir;
	}



	public static function showDir ( $tree ) {
		if (!is_array($tree)) {   // 配列でなければ false を返す 
			return false;
		}

		static $count = 0;    // インデントの階層の深さ
		$indent = ($count) ? str_repeat('&nbsp;', $count) : '';

		$count++;
		foreach ($tree as $key => $value) {
			if (is_array($value)) { 
				// 配列の場合ディレクトリ名を表示し再帰呼出 
		echo '<div id="folder">';
				print('<div id="directory">' . $indent. $key. "</div>");
				View::showDir($value); 
			} elseif (preg_match('/\.(html|txt|php|css|xml)$/i', $value)) {
				// HTMLとTEXTとPHPのみアンカーをつけてファイル名を表示 
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
