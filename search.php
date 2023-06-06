<?php
if (!empty($_POST['search'])) {
	$search = $_POST['search'];
	// $search = mb_eregi_replace("[^a-zа-яё0-9 ]", '', $search);
	// $search = trim($search);
    $dbh = new PDO('mysql:host=localhost;dbname=booksdb','root','root');
	$sth = $dbh->prepare("select * from books where name LIKE '{$search}%' ORDER BY name");
	$sth->execute();
	$result = $sth->fetchAll(PDO::FETCH_ASSOC);
 
	if ($result) {
		?>
		<div class="search_result">
			<table style="z-index:100">
				<?php foreach ($result as $row): ?>
				<tr>
					<td class="search_result-name">
						<a><?php echo $row['name']; ?></a>
					</td>
					<td class="search_result-btn">
						<input type="button" value="Купить">
					</td>
				</tr>
				<?php endforeach; ?>
			</table>
		</div>
		<?php
	}
}