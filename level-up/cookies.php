<?php 
function process_form() {
	foreach( $_POST as $label => $value ) {
		if ( 'submit' !== $label ) {
			echo '<p><b>' . ucfirst( $label ) . '</b>: ' . $value . '</p>';
		}
	}
} 

if ( isset( $_POST['name'] ) ) {
	setcookie( 'name', $_POST['name'] );
	$_COOKIE['name'] = $_POST['name'];
}

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Process Form with Cookies</title>
		<style>
            body {
                background: #333333;
                font-size: 2rem;
            }
            main {
                width: 600px;
                margin: 0 auto;
                background: #FFFFFF;
                padding: 30px;
            }

            div {
                margin: 10px 5px;
            }

            input,
            textarea {
                width: 50%;
                padding: 7px;
                color: #333333;
                font-size: 2rem;
            }

            textarea {
                width: 100%;
                height: 400px;
            }

            input:submit {
                width: 250px;
            }

            pre {
                font-size: 1.2rem;
                color: #880000;
                background: #EFEFEF;
                padding: 15px;
                margin: 30px 0;
            }
        </style>
	</head>
	<body>
		<main>
			<?php 
				if ( isset( $_POST['submit'] ) ) {
					process_form();
				}
			?>
			<form name="contact" method="POST">
				<div>
					<label for="name">Name:</label>
					<input type="text" name="name" placeholder="What's Your Name?"" value="<?php echo isset( $_COOKIE['name'] ) ? $_COOKIE['name'] : ''; ?>" />
				</div>
				<div>
					<label for="email">Email:</label>
					<input type="email" name="email" placeholder="What's Your Email?" />
				</div>
				<div>
					<label for="message">Your Message:</label>
					<textarea name="message"></textarea>
				</div>
				<div><input type="submit" name="submit" value="Send Message" /></div>
			</form>	
		</main>
	</body>
</html>