<?php require_once "controllerUserData.php"; ?>
<?php 
$email = $_SESSION['email'];
$password = $_SESSION['password'];
if($email != false && $password != false){
    $sql = "SELECT * FROM usertable WHERE email = '$email'";
    $run_Sql = mysqli_query($con, $sql);
    if($run_Sql){
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        $status = $fetch_info['status'];
        $code = $fetch_info['code'];
        if($status == "verified"){
            if($code != 0){
                header('Location: reset-code.php');
            }
        }else{
            header('Location: user-otp.php');
        }
    }
}else{
    header('Location: login-user.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $fetch_info['name'] ?> | Home</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
		/* *{
			border: 3px solid red;
		} */
    </style>
</head>




<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$stmt = $pdo->query('SELECT * FROM images ORDER BY uploaded_date DESC');
$images = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?=template_header('Gallery')?>

</html>

<div class="content home">
	<p>Welcome to the gallery</p>
	<a href="upload.php" class="upload-image">Upload Image</a>
	<div class="images">
		<?php foreach ($images as $image): ?>
		<?php if (file_exists($image['filepath'])): ?>
<div style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
			<a href="#" id="zoom">
				<img style="width: 300px; height: 200px;" src="<?=$image['filepath']?>" alt="<?=$image['description']?>" data-id="<?=$image['id']?>" data-title="<?=$image['title']?>">
				<span><?=$image['description']?></span>
			</a>
		</div>
		<?php endif; ?>
		<?php endforeach; ?>
	</div>
</div>

<div class="image-popup"></div>

<script>
let image_popup = document.querySelector('.image-popup');
document.querySelectorAll('.images #zoom').forEach(img_link => {
	img_link.onclick = e => {
		e.preventDefault();
		let img_meta = img_link.querySelector('img');
		let img = new Image();
		img.onload = () => {
			image_popup.innerHTML = `
				<div class="con">
					<h3>${img_meta.dataset.title}</h3>
					<p>${img_meta.alt}</p>
					<img src="${img.src}" width="1600px" height="900px">
					<a href="delete.php?id=${img_meta.dataset.id}" class="trash" title="Delete Image"><i class="fas fa-trash fa-xs"></i></a>
				</div>
			`;
			image_popup.style.display = 'flex';
		};
		img.src = img_meta.src;
	};
});
image_popup.onclick = e => {
	if (e.target.className == 'image-popup') {
		image_popup.style.display = "none";
	}
};
</script>
<?=template_footer()?>

