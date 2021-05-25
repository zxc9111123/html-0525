<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Document</title>
    <script>
        function Welcome() {
            <?php
            if (!isset($_SESSION["firstLogin"]) && !isset($_POST["減法"])) {

                echo "alert('Hello,welcome!');";
                $_SESSION["firstLogin"] = true;
            }
            ?>

            document.addForm.減法.focus();
        }

        function check() {
            var 減法 = document.addForm.減法.value;
            if (減法.length == 0) {
                alert('注意:\n\n請提供作答內容!');
                document.addForm.減法.focus();
                return false;
            }
            return true;
        }
    </script>
</head>

<body background="https://cestmarie.com/wp-content/uploads/2019/01/Screenshot-3.png" onload="Welcome();">
<nav class="navbar navbar-expand-lg  navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">返回登入畫面</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
      <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="math+.php">加法計算</a>
        </li>
        <li class="nav-item">
          <a class="nav-link"aria-current="page" href="math-.php">減法計算</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page"href="mathx.php">乘法計算</a>
        </li>
        <li class="nav-item">
          <a class="nav-link"aria-current="page" href="math--.php">除法計算</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

    <?php
    if (!isset($_POST["減法"])) {
       
        $y1 = rand(10, 99); 
        $x1 = rand($y1, 99);

        $sub= (int)$x1 - (int)$y1;
    } else {
        $x1 = $_POST["x1"];
        $y1 = $_POST["y1"];

        $sub = (int)$x1 - (int)$y1;
    }
    ?>

<div class="container">
       <h1 class="col-lg-8">請開始計算以下試題</h1>
       <div class="row">
           
            <div class="col-lg-12 mb-4 ">
                <div class="card text-center border-warning">
                    <h2 class="card-header bg-info text-dark">    
                    <form action="" method="post">
                    請問<?php echo "$x1 - $y1 ="; ?>
                    <input type="text" name="減法">
                    <input class="btn btn-success" type="submit" value="確認作答">
                    <input type="hidden" name="x1" value="<?php echo $x1; ?>">
                    <input type="hidden" name="y1" value="<?php echo $y1; ?>">
                    <h1 class="text-default">你的作答是:</h1>
                    <?php
                            if(isset($_POST["減法"]))
                            {
                                $sub1 = $_POST["減法"];
                                echo "$sub1 <br>";
                            }
                    ?>
                    </form>
                    </h2>
                    <div class="card-body bg-default text-dark">  
                        <h1 class="text-dark">正確作答是:
                        <?php
                            if(isset($_POST["減法"]))
                            {
                                $sub1  = $_POST["減法"];
                                echo "$sub";
                            }
                            ?>
                        </h1>
                    </div>
                    <div class="card-body bg-info">  
                        <h1 class="text-light">    
                        <?php
                            if(isset($_POST["減法"]))
                            {
                                $sub1  = $_POST["減法"];
                                if($sub==$sub1 )
                                {
                                    echo "<h1 class='bg-light text-success'>作答正確</h1>";
                                    echo '<br><input class="btn btn-info type="button" value="下一題" onclick="document.location.href=\'math-.php\';">';
                                    echo "<script>
                                    var audio = new Audio('答對.wav');
                                    audio.play();
                                    </script>";
                                }
                                else
                                
                                {
                                    echo "<h1 class='text-danger'>作答錯誤</h1>";
                                    echo "<script>
                                    var audio = new Audio('答錯.wav');
                                    audio.play();
                                    </script>";
                                }
                            }
                        ?>
                        </h1>

                    </div>
               </div>
    
            </div>


       </div>
    </div>

  
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>