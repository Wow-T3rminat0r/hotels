<?php
/** 外部ファイル読み込み */
require_once "../applications/database.php";
require_once "../applications/Hotel.php";
?>
<?php
$address = "";
if (isset($_REQUEST["address"])) {
	$address = $_REQUEST["address"];
}

$pdo = connectDatabase();

$sql = "select * from hotels where address like ?";
$pstmt = $pdo->prepare($sql);
$pstmt->bindValue(1, "%".$address."%");
$pstmt->execute();

$rs = $pstmt->fetchAll();

$hotels = [];
foreach ($rs as $record) {
	$id = intval($record["id"]);
	$name = $record["name"];
	$price = intval($record["price"]);
	$pref = $record["pref"];
	$city = $record["city"];
	$address = $record["address"];

	$memo = "";
	if (!is_null($record["memo"])) {
		$memo = $record["memo"];
	}

	$image = $record["image"];
	$hotel = new Hotel($id, $name, $price, $pref, $city, $address, $memo, $image);
	$hotels[] = $hotel;
}

?>
<!DOCTYPE html>
<html lang="ja">

<head>
	<meta charset="UTF-8">
	<title>ホテル検索結果一覧</title>
	<link rel="stylesheet" href="../assets/css/style.css" />
	<link rel="stylesheet" href="../assets/css/hotels.css" />
</head>

<body>
	<header>
		<h1>ホテル検索結果一覧</h1>
		<p><a href="./entry.php">検索ページに戻る</a></p>
	</header>
	<main>
		<article>
			<table>
				<?php foreach ($hotels as $hotel) {  ?>
				<tr>
					<td>
						<img src="../images/<?= $hotel->getImage() ?>" width="100" />
					</td>
					<td>
						<table class="detail">
							<tr>
								<td><?= $hotel->getName() ?><br /></td>
							</tr>
							<tr>
								<td><?= $hotel->getPref() ?><?= $hotel->getCity() ?><?= $hotel->getAddress() ?></td>
							</tr>
							<tr>
								<td>宿泊料：&yen;<?= number_format($hotel->getPrice()) ?></td>
							</tr>
							<tr>
								<td><?= $hotel->getMemo() ?></td>
							</tr>
						</table>
					</td>
				</tr>
				<?php } ?>
			</table>
		</article>
	</main>
	<footer>
		<div id="copyright">(C) 2019 The Web System Development Course</div>
	</footer>
</body>

</html>