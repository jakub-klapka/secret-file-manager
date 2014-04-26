<?php $a = \Lumiart\SecretFileManager\lumi_sfm_template('AdminPage'); ?>
<div class="wrap">
	<h2>Skryté soubory<a class="add-new-h2" href="<?= admin_url('admin.php?page=lumi-secret-files&check_new_files=true'); ?>">Importovat nové soubory</a></h2>
	<?php $notices = $a->get_notices(); ?>
	<?php if( $notices !== false ) : ?>
		<?php foreach( $notices as $notice ) : ?>
			<div class="<?= $notice['type']; ?>">
				<p><strong><?= $notice['message']; ?></strong></p>
			</div>
		<?php endforeach; ?>
	<?php endif; ?>
	<table class="wp-list-table widefat">
		<thead>
			<tr>
				<th class="manage-column">Název</th>
				<th class="manage-column">Odkaz</th>
				<th class="manage-column">Datum přidání</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Test</td>
				<td>Odkaz</td>
				<td>Datum</td>
			</tr>
			<tr>
				<td>Test</td>
				<td>Odkaz</td>
				<td>Datum</td>
			</tr>
			<tr>
				<td>Test</td>
				<td>Odkaz</td>
				<td>Datum</td>
			</tr>

		</tbody>
	</table>
</div>