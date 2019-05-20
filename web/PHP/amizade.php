<?php include_once "nav.php"; ?>
	<div class="container">

		<!-- Side-Page - Profile -->
		<div class="profileSide">
			<div class="border-custom pt-4 pb-4"> 
				<a href="#">
					<img src="https://i1.sndcdn.com/artworks-000135411222-hzaga6-t500x500.jpg" width="30%">
					<h3 class="pt-2"> Profile Name </h3>
				</a>
			</div>
			<div class="border-custom"> 
				<h4> Profile Friends </h4>
				<ul class="profiles profiles-display3">
					<div>
						<a href="#">
							<img src="https://i.pinimg.com/236x/9c/13/fd/9c13fd0d8583cb9c42b3f4808a2b3916--non-non-biyori-place.jpg" width="100%">
							<p>Friend Name</p>
						</a>
					</div>
					<div>
						<a href="#">
							<img src="https://i.pinimg.com/236x/9c/13/fd/9c13fd0d8583cb9c42b3f4808a2b3916--non-non-biyori-place.jpg" width="100%">
							<p>Friend Name</p>
						</a>
					</div>
					<div>
						<a href="#">
							<img src="https://i.pinimg.com/236x/9c/13/fd/9c13fd0d8583cb9c42b3f4808a2b3916--non-non-biyori-place.jpg" width="100%">
							<p>Friend Name</p>
						</a>
					</div>
					<div>
						<a href="#">
							<img src="https://i.pinimg.com/236x/9c/13/fd/9c13fd0d8583cb9c42b3f4808a2b3916--non-non-biyori-place.jpg" width="100%">
							<p>Friend Name</p>
						</a>
					</div>
					<div>
						<a href="#">
							<img src="https://i.pinimg.com/236x/9c/13/fd/9c13fd0d8583cb9c42b3f4808a2b3916--non-non-biyori-place.jpg" width="100%">
							<p>Friend Name</p>
						</a>
					</div>
					<div>
						<a href="#">
							<img src="https://i.pinimg.com/236x/9c/13/fd/9c13fd0d8583cb9c42b3f4808a2b3916--non-non-biyori-place.jpg" width="100%">
							<p>Friend Name</p>
						</a>
					</div>
				</ul>
			</div>

		</div>	

	
	<!-- Main-Page - Friends -->
	<!--?php

    // Remove mensagem de alerta
    error_reporting(1);

	include_once "connect_bd.php";
	$friend_id = "friend_id";

    // Cria comando SQl
    $sql = "SELECT * 
            FROM user_info 
            WHERE user_id = "friend_id";-->

		<div class="page padding-style">
			<div class="border-custom"> 
				<form method="POST">
					<div class="form-group">
						<fieldset>
							<legend>Friends:</legend>
							<ul class="profiles profiles-display6">
								<div>
									<a href="#">
										<img src="https://i.pinimg.com/236x/9c/13/fd/9c13fd0d8583cb9c42b3f4808a2b3916--non-non-biyori-place.jpg" width="100%">
										<p>Friend Name</p>
									</a>
								</div>
								<div>
									<a href="#">
										<img src="https://i.pinimg.com/236x/9c/13/fd/9c13fd0d8583cb9c42b3f4808a2b3916--non-non-biyori-place.jpg" width="100%">
										<p>Friend Name</p>
									</a>
								</div>
								<div>
									<a href="#">
										<img src="https://i.pinimg.com/236x/9c/13/fd/9c13fd0d8583cb9c42b3f4808a2b3916--non-non-biyori-place.jpg" width="100%">
										<p>Friend Name</p>
									</a>
								</div>
								<div>
									<a href="#">
										<img src="https://i.pinimg.com/236x/9c/13/fd/9c13fd0d8583cb9c42b3f4808a2b3916--non-non-biyori-place.jpg" width="100%">
										<p>Friend Name</p>
									</a>
								</div>
								<div>
									<a href="#">
										<img src="https://i.pinimg.com/236x/9c/13/fd/9c13fd0d8583cb9c42b3f4808a2b3916--non-non-biyori-place.jpg" width="100%">
										<p>Friend Name</p>
									</a>
								</div>
								<div>
									<a href="#">
										<img src="https://i.pinimg.com/236x/9c/13/fd/9c13fd0d8583cb9c42b3f4808a2b3916--non-non-biyori-place.jpg" width="100%">
										<p>Friend Name</p>
									</a>
								</div>
							</ul>
						</fieldset>
					</div>
				</form>
			</div>
			<div class="border-custom"> 
				<fieldset>
					<legend> Recommended:</legend>
					<img src="https://media.giphy.com/media/puTOmvC98O40w/giphy.gif" width="30%">
				</fieldset>
			</div>
			
		</div>
	</div>
</body>
</html>