<?php $a = \Lumiart\SecretFileManager\lumi_sfm_template('AdminPage'); ?>
<div class="wrap lumi_sfm">
	<h2>Skryté soubory<a class="add-new-h2" href="<?= admin_url('admin.php?page=lumi-secret-files&check_new_files=true'); ?>">Importovat nové soubory</a></h2>
	<?php $notices = $a->get_notices(); ?>
	<?php if( $notices !== false ) : ?>
		<?php foreach( $notices as $notice ) : ?>
			<div class="<?= $notice['type']; ?>">
				<p><strong><?= $notice['message']; ?></strong></p>
			</div>
		<?php endforeach; ?>
	<?php endif; ?>
	<?php $storage_attributes = $a->storage_attributes(); ?>
	<div class="widefat stuffbox lumi_sfm__size_div">
		<span>Obsazeno:&nbsp;</span>
		<meter class="lumi_sfm__size_div__meter"
		       max="<?= $storage_attributes['available']; ?>"
		       high="<?= $storage_attributes['available'] * 0.8; ?>"
		       value="<?= $storage_attributes['used']; ?>"></meter><span>&nbsp;<?= $storage_attributes['used_friendly']; ?>&nbsp;/&nbsp;<?= $storage_attributes['available_friendly']; ?></span>
	</div>
	<table class="wp-list-table widefat">
		<thead>
			<tr>
				<th class="manage-column">Název</th>
				<th class="manage-column">Odkaz</th>
				<th class="manage-column">Počet stažení</th>
				<th class="manage-column">Datum přidání</th>
				<th class="manage-column">Velikost</th>
			</tr>
		</thead>
		<tbody>
			<?php $files = $a->get_files(); ?>
			<?php foreach( $files as $file ) : ?>
				<tr>
					<td class="post-title"><strong><?= $file['title']; ?></strong>
						<div class="row-actions">
							<span class="trash">
								<a class="submitdelete" title="Smazat" href="<?= admin_url('admin.php?page=lumi-secret-files&delete=' . $file['id']); ?>">Odstranit</a>
							</span>
						</div>
					</td>
					<td>
						<input type="text" disabled value="<?= $file['url']; ?>" size="60"/>
						<button type="button" class="copy_to_clipboard" data-clipboard-text="<?= $file['url']; ?>">Kopírovat URL do schránky</button>
					</td>
					<td><?= $file['download_count']; ?></td>
					<td><?= $file['date']; ?></td>
					<td><?= $file['file_size']; ?></td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>