<?PHP

if (count($argv)!=2)  { echo ("Use <ID matterport>\n"); exit(0); }
$id = $argv[1];

$mp = new Mp($id);

$catalog = $mp->getCatalog();

foreach($catalog as $item) {
	echo("File ".$item."\n");
	if (	str_existe($item, "high") &&
		str_existe($item, "jpg")  &&
		str_existe($item, "skybox")  && 
		!str_existe($item, "dds") &&
		!str_existe($item, "zip") &&
		!str_existe($item, "lased") )
	{
		echo("Downloading... ".$item."\n");
		$mp->download($item);
	}
}

function 	 str_existe($pajar, $aguja)
{
	$pos1 = strpos($pajar, $aguja);
	if ($pos1===FALSE) return false;
	return true;
}

class Mp {
	var $id;
	var $ch;
	var $url_base;
	var $referer;
	var $catalog;

	public function Mp($id) {
		$this->id = $id;
		$this->updateUrlBase();
		$this->updateCatalog();
		$this->referer = "https://my.matterport.com/show/?m=".$this->id;
	}

	public function updateCatalog() {
		$url = $this->makeUrl("catalog.json");
		$data = $this->httpGet1($url);
		$arr = json_decode($data, true);
		$this->catalog = $arr["files"];
	}

	public function getCatalog() {
		return $this->catalog;
	}

	private function makeUrl($path) {
		return str_replace("{{filename}}", $path, $this->url_base);
	}

	public function updateUrlBase()
	{
		$url = "https://my.matterport.com/api/player/models/".$this->id."/files?type=3";
		$data = $this->httpGet1($url);
		$arr = json_decode($data, true);
		$arr2 = $arr["templates"];
		$this->url_base = $arr2[0];
	}

	private function httpGet1($url) {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		$headers = array();
		$headers[] = "Referer: ".$this->referer;
		$headers[] = "Accept: application/json";
		$headers[] = "Accept-Language: en-US,en;q=0.5";
		$headers[] = "Cookie: mp_mixpanel__c=0";

		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  

		$output = curl_exec($ch);  

		curl_close($ch); 

		return $output;
	}

	public function download($file) {
		$this->updateUrlBase();
		$url = $this->makeUrl($file);
		$path = dirname(__FILE__)."/".$this->formatFilename($file);
		if (file_exists($path)) return;
		$this->httpDownload($url, $path);
		
	}

	private function httpDownload($url, $path) {
		$fp = fopen($path, 'w+');
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		$headers = array();
		$headers[] = "Referer: ".$this->referer;
		$headers[] = "Accept: image/png,image/*;q=0.8,*/*;q=0.5";
		$headers[] = "Accept-Language: en-US,en;q=0.5";
		$headers[] = "origin: https://my.matterport.com";

		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36");
		curl_setopt($ch, CURLOPT_FILE, $fp); 
		curl_exec($ch);  

		curl_close($ch); 
		fclose($fp);
	}

	public function idValid($id) {
		return strlen($id)==11 && preg_match('/^[a-zA-Z0-9_\-]+$/', $id);
	}

	private function formatFilename($cad) {
		$cad = str_replace("/", "-", $cad);
		$cad = str_replace("_", "-", $cad);
		$imax = strlen($cad);
		$char_val = " ";
		$char_num = 0;
		$char_valid = false;

		$res = "";
		for ($i=0; $i<$imax; $i++) {
			$char_val = substr($cad, $i, 1);
			$char_num = ord($char_val);
			$char_valid = false;

			if ($char_num >= ord("0") && $char_num <= ord("9")) {
				$char_valid = true;
			}


			if ($char_num >= ord("a") && $char_num <= ord("z")) {
				$char_valid = true;
			}


			if ($char_num >= ord("A") && $char_num <= ord("Z")) {
				$char_valid = true;
			}

			if ($char_val==".") $char_valid = true;
			if ($char_val=="-") $char_valid = true;
			if ($char_val=="(") $char_valid = true;
			if ($char_val==")") $char_valid = true;

			if ($char_valid==true) {
				$res .= $char_val;
			}

		}
		return $res;
	}


}
?>
