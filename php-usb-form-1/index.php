<?php

//Conectar a la DB
$connect = mysqli_connect('localhost', 'matt', '1234', 'sandbox1');
$email= isset($_POST['email'])?$_POST['email']:'';
$message= isset($_POST['message'])?$_POST['message']:'';
$email_error='';
$message_error='';


//Evaluar información proveniente de las cajas de texto
// isset -> si la variable existe y no es vacia
if(count($_POST))
{
    $errors = 0 ;

    if($_POST['email']=='')
    {
        $email_error='Please enter an email address';
        $errors ++;
    }
    if($_POST['message']=='')
    {
        $message_error='Please enter a message';
        $errors ++;
    }

    if($errors==0)
    {
        $query='INSERT INTO contact(
            email,
            message
        )VALUES (
            "'.addslashes($_POST['email']).'",
            "'.addslashes($_POST['message']).'"

        )';
        
        mysqli_query($connect,$query);

        //rnviar correo

        $message='You have received a contact form submission:
Email : '.$_POST['email'].'
Message : '.$_POST['message'];
            
    mail('mateorrego@gmail.com',
            'contact form submission',
            $message
        );

    header('location: thankyou.html');
    die();

    }

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Subscription List</h1>
    <form method="post" action="">
        Your name:
        <br>
        <!-- aqui se crea el input para atrapar el email del usuario -->
        <input placeholder="Your name" type="text" name="email" value="<?php echo $email;?>">
        <?php echo $email_error;?>
        <br><br>

        Your email:

        <br>
        <textarea name="message" placeholder="Your Email"> <?php echo $message;?></textarea>
        <?php echo $message_error;?>


        <br><br>

        Your Mobile Number:

        <br>
        <textarea  name="message"> <?php echo $message;?></textarea>
        <?php echo $message_error;?>


        <br><br>
        
        <select>
        <option>1</option>
        <option selected="selected">Software Development Projects</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        </select>

        <br><br>
        <input type = "submit" value="submit">

        

    


    </form>
</body>
</html>