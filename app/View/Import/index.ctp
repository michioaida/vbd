<div>
	<h2><?php echo __('Data Import'); ?></h2>
	<table cellpadding="0" cellspacing="0">
		<tr>
			<td>
				Select a file to upload: <br />
				<form action="/VoterDB/Import/import" method="post" enctype="multipart/form-data">
					<input type="file" name="uploadfile" size="50" />
					<br />
					<input type="submit" value="Upload File" />
				</form>
			</td>
		</tr>
	</table>
</div>