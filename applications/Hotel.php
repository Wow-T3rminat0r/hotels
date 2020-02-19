<?php
class Hotel {
	/**
	 * 属性
	 */
	private $id;			/** int ホテルID */
	private $name;		/** string ホテル名 */
	private $price;		/** int 宿泊料 */
	private $pref;		/** string 所在地・都道府県：例）埼玉県 */
	private $city;		/** string 所在地・市区町村：例）新座市 */
	private $address;	/** string 所在地・所在地の情報のうち都道府県名と市区町村を除いた部分：例）東北2-33-10 */
	private $memo;		/** string メモ */
	private $image;		/** string 画像ファイル名 */

	/**
	 * コンストラクタ
	 * @param int $id
	 * @param string $name
	 * @param int $price
	 * @param string $pref
	 * @param string $city
	 * @param string $address
	 * @param string $memo
	 * @param string $image
	 */
	function __construct(int $id, string $name, int $price, string $pref, string $city, string $address, string $memo, string $image) {
		$this->id = $id;
		$this->name = $name;
		$this->price = $price;
		$this->pref = $pref;
		$this->city = $city;
		$this->address = $address;
		$this->memo = $memo;
		$this->image = $image;
	}

	/**
	 * アクセサメソッド群
	 * @property-read int $id
	 * @property-read string $name
	 * @property-read int $price
	 * @property-read string $pref
	 * @property-read string $city
	 * @property-read string $address
	 * @property-read string $memo
	 * @property-read string $image
	 */

	 function getId():int {
		 return $this->id;
	 }

	 function getName():string {
		return $this->name;
	}

	function getPrice():int {
		return $this->price;
	}

	function getPref():string {
		return $this->pref;
	}

	function getCity():string {
		return $this->city;
	}

	function getAddress():string {
		return $this->address;
	}

	function getMemo():string {
		return $this->memo;
	}

	function getImage():string {
		return $this->image;
	}

}
?>