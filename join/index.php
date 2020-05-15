<?php
session_start();

if(!empty($_POST)) {
	//エラー項目の確認
	if ($_POST['name'] == '') {
		$error['name'] = 'blank';
	}
	if ($_POST['email'] == '') {
		$error['email'] = 'blank';
	}
	if (strlen($_POST['password']) < 4) {
		$error['password'] = 'length';
	}
	if ($_POST['password'] == '') {
		$error['password'] = 'blank';
	}

	if (empty($error)) {
		$_SESSION['join'] = $_POST;
		header('Location: check.php');
		exit();
	}
}
?>
<!doctype html>
<html lang="ja">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="../css/style.css">

<title>よくわかるPHPの教科書</title>
</head>

<body>
<div id="wrap">
	<div id="head">
	<h1>会員登録</h1>
	</div>
	<div id="content">
		<form action="" method="post" enctype="multipart/form-data">
			<dl>
				<dt>ニックネーム<span class="required">必須</span></dt>
				<dd>
					<input type="text" name="name" size="35" maxlength="255" value="<?php if(isset($error['name'])): echo htmlspecialchars($_POST['name'], ENT_QUOTES); endif; ?>" />
					<?php if(isset($error['name']) && $error['name'] == 'blank'): ?>
						<p class="error">* ニックネームを入力してください</p>
					<?php endif; ?>
				</dd>

				<dt>メールアドレス<span class="required">必須</span></dt>
				<dd>
					<input type="text" name="email" size="35" maxlength="255" value="<?php if(isset($error['email'])): echo htmlspecialchars($_POST['email'], ENT_QUOTES); endif; ?>" />
					<?php if(isset($error['email']) && $error['email'] == 'blank'): ?>
						<p class="error">* メールアドレスを入力してください</p>
					<?php endif; ?>
				</dd>

				<dt>パスワード<span class="required">必須</span></dt>
				<dd>
					<input type="password" name="password" size="10" maxlength="20" value="<?php echo htmlspecialchars($_POST['password'], ENT_QUOTES); ?>" />
					<?php if(isset($error['password']) && $error['password'] == 'blank'): ?>
						<p class="error">* パスワードを入力してください</p>
					<?php endif; ?>
					<?php if(isset($error['password']) && $error['password'] == 'length'): ?>
						<p class="error">* パスワードは４文字以上で入力してください</p>
					<?php endif; ?>
				</dd>

				<dt>写真など</dt>
				<dd><input type="file" name="image" size="35" /></dd>
			</dl>

			<div><input type="submit" value="入力内容を確認する" /></div>
		</form>
	</div>
</div>

</body>
</html>